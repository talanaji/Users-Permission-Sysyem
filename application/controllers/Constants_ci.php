<?php 
	class Constants_ci extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function courses()
		{
			$data["page_title"] = $this->lang->line("cousrses_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('cousrses_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function schools()
		{
			$data["page_title"] = $this->lang->line("schools_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('schools_vw',$data);
			$this->load->view('templates/footer',$data);
		}
	    public function payment_methods()
		{
			$data["page_title"] = $this->lang->line("payments_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('payments_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function subscribes()
		{
			$data["page_title"] = $this->lang->line("subscribes_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('subscribes_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function rooms()
		{
			$data["page_title"] = $this->lang->line("rooms_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('rooms_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function trainings()
		{
			$data["page_title"] = $this->lang->line("training_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('trainings_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function get_trainings()
		{
			$d = $this->get_all_items("Training_courses");
 			 foreach($d as  $dd )
			 {
				 if($dd->tr_active == 1)
					 $ac = 'checked=checked';
				 else $ac = '';
				 echo "<tr>  
 			           <td>".$dd->tr_title."</td>
						<td><input type='checkbox'  ".$ac."  disabled='disabled'/></td>
 						<td><a style='cursor:pointer' class='Del' title='".$dd->tr_code."'><i class='fa fa-remove'></i></a> |
						     <a style='cursor:pointer'  class='Edit'
								title= '".$dd->tr_code."'
								tr_title = '".$dd->tr_title."'
								tr_hour_no = '".$dd->tr_hour_no."'
								tr_price = '".$dd->tr_price."'
								tr_desc = '".$dd->tr_desc."'
 								tr_active = '".$dd->tr_active."'><i class='fa fa-edit'></i> </a>
								</td>
					         </tr>";
			 }
		}
		public function reserv_state()
		{
			$data["page_title"] = $this->lang->line("reservst_title");
		    $this->load->view('templates/header',$data);
			$this->load->view('reserv_state_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function std_status()
		{
			$data["page_title"] = $this->lang->line("status_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('std_status_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function tr_groups() //training groups managments
		{
			$data["page_title"] = $this->lang->line("tr_groups_managment");
		    $this->load->view('templates/header',$data);
			$this->load->view('tr_groups_vw',$data);
			$this->load->view('templates/footer',$data);
		}
				
		public function AddEdit_courses()
		{
			extract($_POST);
			if(empty($c_name) || $c_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("R_title");
			  exit();
		    }
			if(empty($c_type) || $c_type== '')
			{
				echo $this->lang->line("required").$this->lang->line("c_type");
			   exit();
			}
			if($c_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("c_name"=>$c_name , 
							  "c_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL){
				if(redundancy_where_value_s("courses" , "c_name" , $c_name , "") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    } 
 				 $doo = $this->db->insert("courses",$arr);
			 } 
			else
			{
				if(redundancy_where_value_s("courses" , "c_name" , $c_name , " and c_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
				
				$this->db->where("c_code",$curr_code);
				$doo = $this->db->update("courses",$arr);
				
			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
	    public function AddEdit_schools()
		{
			extract($_POST);
				
			if(empty($sc_name) || $sc_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("sc_name");
			  exit();
		    }
	 
			
			if($sc_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("sc_name"=>$sc_name , 
						 "sc_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("schools" , "sc_name" , $sc_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("schools",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("schools" , "sc_name" , $sc_name , " and sc_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("sc_code",$curr_code);
				$doo = $this->db->update("schools",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
	    public function AddEdit_payment_methods()
		{
			extract($_POST);
 			if(empty($m_name) || $m_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("m_name");
			  exit();
		    }
	 
			
			if($m_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("m_name"=>$m_name , 
						 "m_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("payment_methods" , "m_name" , $m_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("payment_methods",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("payment_methods" , "m_name" , $m_name , " and m_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("m_code",$curr_code);
				$doo = $this->db->update("payment_methods",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
	    public function AddEdit_subscribes()
		{
			extract($_POST);
 			if(empty($sub_name) || $sub_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("sub_name");
			  exit();
		    }
  			if($sub_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("sub_name"=>$sub_name , 
						 "sub_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("subscribe_type" , "sub_name" , $sub_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("subscribe_type",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("subscribe_type" , "sub_name" , $sub_name , " and sub_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("sub_code",$curr_code);
				$doo = $this->db->update("subscribe_type",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}	    
		
		public function AddEdit_rooms()
		{
			extract($_POST);
 			if(empty($room_name) || $room_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("room_name");
			  exit();
		    }
  			if($room_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("room_name"=>$room_name , 
						 "room_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("rooms" , "room_name" , $room_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("rooms",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("rooms" , "room_name" , $room_name , " and room_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("room_code",$curr_code);
				$doo = $this->db->update("rooms",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
		
		public function AddEdit_trgroups()
		{
			extract($_POST);
 			if(empty($trg_name) || $trg_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("trg_name");
			  exit();
		    }
  			if($trg_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("trg_name"=>$trg_name , 
						 "trg_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("Training_groups" , "trg_name" , $trg_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("Training_groups",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("Training_groups" , "trg_name" , $trg_name , " and trg_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("trg_code",$curr_code);
				$doo = $this->db->update("Training_groups",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
		
		
		public function AddEdit_trainings()
		{
			extract($_POST);
  			if(empty($tr_title) || $tr_title == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("tr_title");
			  exit();
		    }
			if(empty($tr_hour_no) || $tr_hour_no == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("tr_hour_no");
			  exit();
		    }
			if(empty($tr_price) || $tr_price == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("tr_price");
			  exit();
		    }
			 
			
  			if($tr_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array(
				         "tr_title"=>$tr_title , 
				         "tr_hour_no"=>$tr_hour_no , 
				         "tr_price"=>$tr_price , 
				         "tr_desc"=>$tr_desc , 
 						 "tr_active" => $ac) ;
		 if($curr_code == '' || $curr_code == NULL)
		 {
			 if(redundancy_where_value_s("Training_courses" , "tr_title" , $tr_title , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("Training_courses",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("Training_courses" , "tr_title" , $tr_title , " and tr_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("tr_code",$curr_code);
				$doo = $this->db->update("Training_courses",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}
		
		
	    public function AddEdit_stdStatus()
		{
			extract($_POST);
 			if(empty($std_name) || $std_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("std_name");
			  exit();
		    }
  			if(std_active == 0)
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("std_name"=>$std_name , 
						 "std_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("std_status" , "std_name" , $std_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("std_status",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("std_status" , "std_name" , $std_name , " and std_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("std_code",$curr_code);
				$doo = $this->db->update("std_status",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}	
		
		public function AddEdit_reserv_state()
		{
			extract($_POST);
 			if(empty($rest_name) || $rest_name == '')
		    {
			  echo $this->lang->line("required").$this->lang->line("rest_name");
			  exit();
		    }
  			if($rest_active == 'on')
				$ac = 1;
			else 
				$ac = 0;
			$arr = array("rest_name"=>$rest_name , 
						 "rest_color"=>$rest_color , 
						 "rest_active" => $ac) ;
			 if($curr_code == '' || $curr_code == NULL)
			 {
				 if(redundancy_where_value_s("reservation_status" , "rest_name" , $rest_name , "") > 0 )
			     {
					echo $this->lang->line('item_exists');
					exit;
			    }
  			   $doo = $this->db->insert("reservation_status",$arr);
			 } 
			else
			{ 
				if(redundancy_where_value_s("reservation_status" , "rest_name" , $std_name , " and rest_code <> '".$curr_code."'") > 0 )
			    {
					echo $this->lang->line('item_exists');
					exit;
			    }
 				$this->db->where("rest_code",$curr_code);
				$doo = $this->db->update("reservation_status",$arr);
 			}
			 if($doo)
				{
				  echo $this->lang->line('alert_success');
				}
				else
				  {
					 echo $this->lang->line('alert_error');
 				  }
		}	
		
		
		
 		public function get_items($table,$primary_key, $txt , $chbox , $ext=NULL)
	    {
			if(empty($ext) || $ext == NULL)
			  $ext = "!";
			
 			 $d = $this->get_all_items($table);
 			 foreach($d as  $dd )
			 {
				 if($dd->$chbox == 1)
					 $ac = 'checked=checked';
				 else $ac = '';
				 echo "<tr>  
 			           <td>".$dd->$txt."</td>
						<td><input type='checkbox' class='".$chbox."'".$ac." disabled='disabled'/></td>
 						<td><a style='cursor:pointer' class='Del' title='".$dd->$primary_key."'><i class='fa fa-remove'></i></a> |
						     <a style='cursor:pointer'  class='Edit'
								title= '".$dd->$primary_key."'
								$txt = '".$dd->$txt."'
								$ext = '".$dd->$ext."'
								$chbox = '".$dd->$chbox."'><i class='fa fa-edit'></i> </a>
								</td>
					         </tr>";
			 }
		 }
	    public function del_items($table,$where_col , $val)
	    {
			 $this->del_one_item($table,$where_col , $val);
		}
		
	}
?>