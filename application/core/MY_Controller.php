<?php 
 class MY_Controller extends CI_Controller 
	{
		public $dbfile;
		public $expire;
		public $viss;
		public $data;
		public $scr_code ;
		public $usr_privs ;
		
		public function __construct()
		{
			parent::__construct();
			error_reporting(0);
             if($this->is_logged_in())
		     {
				 $link = '';
			    switch($this->session->userdata('lang'))
				{
					case 'portg':$this->lang->load("cperm","portuguese");break;
					case 'arabic':$this->lang->load("cperm","arabic");break;
					default:
					       if($this->session->userdata('lang') !='')
						   {
					        $this->session->sess_destroy();
					 		 redirect("login");
						   }else
						   {$this->lang->load("cperm","arabic");}
						   break;
				}	
			 if(empty($_POST))
			 {
				if($this->session->userdata('User_type') == 2)// Normal User 
				{ 
					  if($this->uri->segment('1')!= NULL &&  $this->uri->segment('2')!=NULL)
						  $link =  $this->uri->segment('1').'/'. $this->uri->segment('2');
						else
						  $link =  $this->uri->segment('1');

					$this->scr_code = $this->get_scr_code($link) ;
					$per_arr = explode(',',$this->get_users_scrprivs($this->session->userdata('User_code')));


						if(in_array($this->scr_code,$per_arr))
						{return true;}
						else
						{
							redirect('Home/?err=perm');
						}
					}
				else
				{
					return true;
				}
			 }
  		   }
		   else
		   {
   				
			
		   }
			
 		}
		
		public function get_teachers($te_code='')
		{
			if($te_code !='')
				$this->db->where("te_code",$te_code);
			$this->db->where("te_active",1);
  			$teachers = $this->db->get("teachers");
			return $teachers;
		}
		public function times_increment_30()
		{
			$begin = new DateTime("08:00");
			$end   = new DateTime("20:30");

			$interval = DateInterval::createFromDateString('30 min');
			$times    = new DatePeriod($begin, $interval, $end);
            return $times;
			 
		}
		public function get_rooms()
		{ // get Data set of rooms
			$this->db->where("room_active",1);
			$rooms = $this->db->get("rooms");
			return $rooms;
		}
	 public function get_reservation_per_teacher($res_teach_code=NULL,
												 $res_room_code=NULL,
												 $tm_row=NULL,
												 $res_todate)
		{ // get Data set of today Reservation for this teacher 
 			$where = " and res_todate = '". date("Y-m-d")."'";
		 if(!empty($res_todate))
			 $where = " and res_todate  = '".date('Y-m-d',strtotime($res_todate))."'";
		 
			
	 
 			$reservs = $this->db->query("select Distinct res_admin_note from 
										 reservations  
 			                 where    res_teach_code = ".$res_teach_code."
							 and      res_room_code  = ".$res_room_code."
							 and      DATE_FORMAT(res_time_start, '%H:%i') <= '".$tm_row."'
							 and      DATE_FORMAT(res_time_end, '%H:%i') >= '".$tm_row."' ".
						     $where .
 							 " order by res_code desc ")->result();
 			 //	 
	 
			return $reservs;
		}
		public function get_users_btnprivs($btn_code , $usr_code_session,$user_type)
		{
 			//get_users_btnprivs($btn_code=5 , $usr_code_session=NULL,1) // admin
			if($user_type == 1) // admin , super admin 
			{
				return 1 ; 
			}
		   else 
		   {
  			  $this->db->where("u_code",$usr_code_session);
			  $this->db->where("u_type !=" , 1);
			  $out = $this->db->get("users")->row();
			  $btns_arr = explode(',', $out->u_btn_priv);
			  if(in_array($btn_code,$btns_arr))
				  return  1; 
			  else 
				  return  0;
			  } 
		}
		public function get_users_btnprivs_ajax($btn_code , $usr_code_session,$user_type)
		{
 			//get_users_btnprivs($btn_code=5 , $usr_code_session=NULL,1) // admin
			if($user_type == 1) // admin , super admin 
			{
				echo 1 ; 
			}
		   else 
		   {
  			  $this->db->where("u_code",$usr_code_session);
			  $this->db->where("u_type !=" , 1);
			  $out = $this->db->get("users")->row();
			  $btns_arr = explode(',', $out->u_btn_priv);
			  if(in_array($btn_code,$btns_arr))
				  echo  1; 
			  else 
				  echo  0;
			  } 
		}
	    public function get_users_scrprivs($usr_code_session)
	    {
			  $this->db->where("u_code",$usr_code_session);
			  $this->db->where("u_type !=" , 1);
			  $out = $this->db->get("users")->row();
			  return $out->u_scr_priv;
		}
 		public function get_scr_code($link)
		{
			$this->db->where("s_url" , $link);
			$s = $this->db->get("screens")->row();
			return $s->s_code;
		}
	    public function is_logged_in()
		{
		  if($this->session->userdata('User_code') || $this->session->userdata('User_name'))
				return 1; 
			else 
				redirect("login"); 
		}
		public function get_all_items($table)
		{
			$q = $this->db->get($table)->result();
			return $q;
		}
 		public function get_counts($table , $ilias ,$cond=array())
		{
			$this->db->select("count(*) as ".$ilias);
			$this->db->where($cond);
			$c = $this->db->get($table)->row();
			return $c->$ilias;
		}
        public function del_one_item($table,$where_col , $val)
		{
 			$this->db->where($where_col,$val);
			$d = $this->db->delete($table);
			return $d;
 		}
	  public function upload_photo($file , $path ,$prefix_type, $sub_id , $sub_title ,$P_is_slider ,$P_active ) 
	    {// Upload photo for any subject + store sub_code and sub_title in photo table DB
		   //echo $file .' -- '. $path  .' -- '.$prefix_type .' -- '. $sub_id  .' -- '. $sub_title  .' -- '.$P_is_slider  .' -- '.$P_active ; exit;
   	    foreach($_FILES[$file]["name"] as $key=>$val) {	  
 			if(isset($_FILES[$file]["type"][$key]))
			{
				$new_image_name   = time().'_'.$_FILES[$file]["name"][$key];
 				$validextensions = array("jpeg", "jpg", "png","gif","doc","pdf","txt","docx");
				$temporary = explode(".", $new_image_name);
				$file_extension = end($temporary);
				if ( in_array($file_extension, $validextensions)) 
				{
				  if(($_FILES[$file]["size"][$key] > 20000))//Approx. 100kb files can be uploaded.
				  {
					if ($_FILES[$file]["error"][$key] > 0)
					{
						$out = "Return Code: " . $_FILES[$file]["error"][$key] . "<br/><br/>";
					}
					else
					{
						if (file_exists($path."/" . $new_image_name)) {
							$out = $new_image_name . " <span id='invalid'><b>already exists.</b></span> ";
						}
						else
						{
							$sourcePath = $_FILES[$file]['tmp_name'][$key]; //Storing source path of the file in a variable
							$targetPath = $path.$new_image_name; // Target path where file is to be stored
					    // water mark here 
							$photo_data = array(
							 					"P_title_ar" =>$sub_title ,
												"P_title_en" =>$sub_title ,
								                "P_desc_ar" =>'' ,
												"P_desc_en" =>'' ,
												"P_photo" => $targetPath , 
												"P_is_slider" => $P_is_slider ,
												"P_active" => $P_active);
 							move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
							$this->db->where("prefix_type",$prefix_type);
							$this->db->where("Rcu_id",$sub_id);
							$this->db->update("subject_photos" , array("is_main" => 0 ));  //make all old photos zero main ...
							$this->db->insert("photos",$photo_data);
							$generated_photo_id = $this->db->insert_id();
							if($key == 0)
							  $is_main = 1;
							  else
							  $is_main = 0;
							$this->db->insert("subject_photos" , 
							                   array("Rcu_id" => $sub_id ,
											         "Photo_id"=> $generated_photo_id ,
													 "prefix_type"=> $prefix_type ,
													 "is_main" => $is_main,
													 "S_active" => $P_active
        											 ));
							}
						  }
				  }
				  else
				  {
					  echo  $this->lang->line('not_upload_photo');
				  }
			   }
		     }
		   }
	     }
		 
	  public function get_photos($rcu=-1 ,$prefix_type , $active=-1) // Draw table for draw Tr's of table Get Data to get array data 
	  {
 		  $qr =array();
		  if($rcu == -1)
		  {
			 $qr = $this->get_all_items("photos" , 0 , false);
		  }
		  else
		  {
			  $this->db->where("Rcu_id" , $rcu);
			  $this->db->where("prefix_type" , $prefix_type);
			  $qr_photo_codes = $this->db->get("subject_photos")->result();
	
			  for($i=0; $i<=count($qr_photo_codes)-1; $i++)
			  {
				  $this->db->select("*");
				  $this->db->from("photos");
				  if($active >= 0)
				  $this->db->where("P_active" ,$active );
				  $this->db->where("P_code",$qr_photo_codes[$i]->Photo_id);
				  $this->db->join('subject_photos', 'photo_id = P_code','left');
				  $qr[] = $this->db->get()->result();
 			  }
 		  }
  				 return $qr;
 	  }
		
	  public function draw_fetched_photos($rcu , $prefix_type , $active)
	  {
		  if($this->is_logged_in() == 1)
		  {
			 $validextensions = array("jpeg", "jpg", "png","gif","pdf","doc","docx","txt");
			 $filee='';	
		     $fetch_photos = $this->get_photos($rcu , $prefix_type , $active);
			  if(!empty($fetch_photos))
			  {
			  echo '<table id="example" class="display table table-striped table-bordered" cellspacing="0">
								  <thead>
									 <tr>
										<th>'.$this->lang->line("files").'</th>
										<th>'.$this->lang->line("st_name").'</th>
										<th>'.$this->lang->line("photo_main").'</th>
										<th>'.$this->lang->line("photo_slider").'</th>
										<th>'.$this->lang->line("active").'</th>
										<th>'.$this->lang->line("operations").'</th>
									</tr>
									</thead>
									<tfoot>
										 <tr>
											<th>'.$this->lang->line("files").'</th>
											<th>'.$this->lang->line("st_name").'</th>
											<th>'.$this->lang->line("photo_main").'</th>
										    <th>'.$this->lang->line("photo_slider").'</th>
											<th>'.$this->lang->line("active").'</th>
											<th>'.$this->lang->line("operations").'</th>
										</tr>
									</tfoot>
									<tbody id="tdata">';
				  
				  for($i=0 ; $i<=count($fetch_photos)-1 ; $i++)
				  {
					    $temporary = explode(".", $fetch_photos[$i][0]->P_photo);
						$file_extension = end($temporary);
					    $filee = '<a href="'.base_url().$fetch_photos[$i][0]->P_photo.'" target="_blank" style="text-decoration:none">
						<i class="fa fa-file">ملف نصي</i></a>' ;
					   if($fetch_photos[$i][0]->is_main == 1)
					    $ism = 'checked=checked';
						else
						$ism = '';
					  
					   if($fetch_photos[$i][0]->P_is_slider == 1)
					    $ps = 'checked=checked';
						else
						$ps = '';
		  
						if($fetch_photos[$i][0]->S_active == 1)
					    $ac = 'checked=checked';
						else
						$ac = '';
					 if(
						  $file_extension=="jpg" ||
						  $file_extension=="gif" ||
						  $file_extension=="png" ||
						  $file_extension=="jpeg"  
						)
					  { 
						   $xx = '<td><input type="checkbox" class="photo_main" title="'.$fetch_photos[$i][0]->is_main.'" '.$ism .'/></td>'.
						   '<td><input type="checkbox" class="photo_slider" title="'.$fetch_photos[$i][0]->P_is_slider.'" '.$ps .'/></td>';
						  $filee ='<img src="'.base_url().$fetch_photos[$i][0]->P_photo.'" alt="'.$fetch_photos[$i][0]->P_title_ar.'" width="100" height="100"/>';
					  }
					  else{
						   $xx = '<td>...</td>'.
						   '<td>...</td>';
					  }
					 
						
					echo '<tr S_code="'.$fetch_photos[$i][0]->S_code.'" rcu="'.$fetch_photos[$i][0]->Rcu_id.'" P_code="'.$fetch_photos[$i][0]->P_code.'" >'.
						   '<td>'.$filee.'</td>'.
						   '<td>'.$fetch_photos[$i][0]->P_title_ar.'</td>'.
					        $xx .
						   '<td><input type="checkbox" class="photo_active" title="'.$fetch_photos[$i][0]->S_active.'" '.$ac.'/></td>'.
						   '<td><a style="cursor:pointer" class="Del_photo" 
								   title="'.$fetch_photos[$i][0]->P_code.'"
								   rcu = "'.$rcu.'"><i class="fa fa-remove"></i></a>'.
						   '</td>'.
						'</tr>';
				  }
					  echo '</tbody></table>';
			  }
			  else
			  {
				  echo $this->lang->line("image_not_found");
			  }
		  }
		  else
		  {
			  echo $this->lang->line("must_login"); 
		  }
	  }
		
	  public function delete_photos($photo_code =0 , $rcu=0 , $prefix_type)
	  { 
	          $this->db->where('P_code',$photo_code);
			  $row = $this->db->get("photos")->row();
	    if($rcu == 0) // there no record in subject photo
		  {
 				$this->db->where("P_code",$photo_code);
		    	$this->db->delete("photos");
				unlink($row->P_photo);
		  }
		  else
		  { 
			    $this->db->where("Rcu_id",$rcu);
				$this->db->where("prefix_type",$prefix_type);
			    $this->db->where("Photo_id",$photo_code);
		    	$this->db->delete("subject_photos");
				
			    $this->db->where("P_code",$photo_code);
		    	$this->db->delete("photos");
				unlink($row->P_photo);
		  }
	  }

	  public function loader_gif($pic_name)
	  {
		  return "<img src='".base_url()."public/img/".$pic_name."'/>";
	  }
		
	} 
?>