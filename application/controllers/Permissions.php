<?php 
	class Permissions extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$data["page_title"] = $this->lang->line("user_permissions");
			$this->db->where("u_type !=", 1);
			$data["users_res"] =$this->db->get('users')->result();
 			$data["btn_res"] = $this->db->get('buttons')->result(); // get all buttons 
			$data["scr_res"] = $this->db->get('screens')->result(); // get all buttons 
			
			if(!empty($_POST))
			{
 				extract($_POST);
			    $all_scrs = '';
				$all_btns = '';
			
				if(!empty($u_code)){
					$this->db->where("u_code",$u_code);
					$this->db->update("users",array("u_scr_priv"=>NULL , "u_btn_priv"=>NULL));
					for($i=0 ;$i<=count($s_code)-1 ; $i++)
					{
 							$all_scrs .= $s_code[$i].',';
 					}
					for($j=0 ;$j<=count($b_code)-1 ; $j++)
					{
 							$all_btns .= $b_code[$j].',';
 					}
					
					 $this->db->where("u_code",$u_code);
					 $this->db->update("users",array("u_scr_priv"=>rtrim($all_scrs,',') , "u_btn_priv"=>rtrim($all_btns,',')));
				}
			}
			
		    $this->load->view('templates/header',$data);
			$this->load->view('user_button_screen_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function addEdit_button($edit_moad=NULL)
		{
			$data["page_title"] = $this->lang->line("addedit_button");
                                $this->db->where("b_active",1);
			$data["btn_res"] =  $this->db->get('buttons')->result();
			
			if(!empty($_POST))
			{
				extract($_POST);
				$arr = array();
				  $arr=array(
					     "b_name"=>$b_name,
						 "b_active"=>1
					);
				if(empty($b_code))
				{
					$this->db->insert('buttons',$arr);
				}
				else
				{
				  $this->db->where("b_code",$b_code);
				  $this->db->update('buttons',$arr);
				}
				unset($_POST);
				redirect('permissions/addEdit_button');
			}
			if($edit_moad !=NULL)
			{
				$this->db->where("b_code",$edit_moad);
				$cu = $this->db->get('buttons')->row();
				$data["b_code"] = $cu->b_code;
				$data["b_name"] = $cu->b_name;
			}
		    $this->load->view('templates/header',$data);
			$this->load->view('button_vw',$data);
			$this->load->view('templates/footer',$data);
		}
	    public function addEdit_menu($edit_moad=NULL)
		{
			$data["page_title"] = $this->lang->line("addEdit_menu");
			$this->db->where("m_active",1);
			$data["menu_res"] =  $this->db->get('menus')->result();
			
			if(!empty($_POST))
			{
				extract($_POST);
				$arr = array();
				  $arr=array(
					     "m_name"=>$m_name,
						 "m_active"=>1
					);
				if(empty($m_code))
				{
					$this->db->insert('menus',$arr);
				}
				else
				{
				  $this->db->where("m_code",$m_code);
				  $this->db->update('menus',$arr);
				}
				unset($_POST);
				redirect('permissions/addEdit_menu');
			}
			if($edit_moad !=NULL)
			{
				$this->db->where("m_code",$edit_moad);
				$cu = $this->db->get('menus')->row();
				$data["m_code"] = $cu->m_code;
				$data["m_name"] = $cu->m_name;
			}
		    $this->load->view('templates/header',$data);
			$this->load->view('menu_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function addEdit_users($edit_moad=NULL)
		{
			$data["page_title"] = $this->lang->line("addEdit_users");
			$this->db->where("u_active",1);
 			$data["users_res"] =  $this->db->get('users')->result();
 			if(!empty($_POST))
			{
				extract($_POST);
				$arr = array();
				$al = '<ul>';
 				if(empty($u_type))
				{ 
				  $data['al'] .= "<ol>".$this->lang->line('err_type')."</ol>";
 				}
				elseif(empty($u_fname))
				   $data['al'] .= "<ol>".$this->lang->line('err_ufname')."</ol>";
				elseif(empty($u_username))
				   $data['al'] .= "<ol>".$this->lang->line('err_username')."</ol>";
			 
				else{
					if($u_type=='1') //admin select 
					 {
						 $uc = "all";
						 $ub = "all";
					 }
					 else
					 {
						 $uc = "";
						 $ub = "";
					 }
						if(!empty($u_password))
						{
						  $arr=array(
 								 "u_fname"=>$u_fname,
								 "u_sex"=>$u_sex,
								 "u_email"=>$u_email,
								 "u_username"=>$u_username,
								 "u_password"=>md5($u_password),
								 "u_type"=>$u_type,
								 "u_birthday"=>$u_birthday,
								 "u_address"=>$u_address,
 								 "u_scr_priv"=>$uc,
								 "u_btn_priv"=>$ub,
								 "u_active"=>$u_active 
							);
						}
						else
						{
							$arr=array(
 								 "u_fname"=>$u_fname,
								 "u_sex"=>$u_sex,
								 "u_email"=>$u_email,
								 "u_username"=>$u_username,
								 "u_type"=>$u_type,
								 "u_birthday"=>$u_birthday,
								 "u_address"=>$u_address,
								 "u_scr_priv"=>$uc,
								 "u_btn_priv"=>$ub,
								 "u_active"=>$u_active 
							);
						}
						
					if(empty($u_code))
					{
						 $oldrow = $this->db->query("select u_code from users where u_username ='".$u_username."' or u_email='".$u_email."'")->row();
						 if($oldrow->u_code > 0)
						  $data["al"] = $this->lang->line('exist');
						  else
						 $cc = $this->db->insert('users',$arr);
					}
					elseif(!empty($u_code) && $u_code != 1)
					{
						 $oldrow = $this->db->query("select u_code from users 
						 						where (u_username ='".$u_username."' 
												or u_email='".$u_email."') 
												and u_code <> '".$u_code."'")->row();
					 
						 if($oldrow->u_code > 0)
						 {
						     $data["al"] = $this->lang->line('exist');
						 }
						  else
						  {
 							   $this->db->where("u_code",$u_code);
							   $cc = $this->db->update('users',$arr);
						  }
					}
					else
 						$data["al"] = $this->lang->line('admin_cannot_update');
 						unset($_POST);
						$cc==true? $data['al'] .= "<ol>".$this->lang->line('success_operation')."</ol>":"";
					redirect('Permissions/addEdit_users');
				}
				$data['al'] .="</ul>";
				
			}
			if($edit_moad !=NULL)
			{
				$this->db->where("u_code",$edit_moad);
				$cu = $this->db->get('users')->row();
				$data["u_code"] = $cu->u_code;
				$data["u_username"] = $cu->u_username;
				$data["u_fname"] = $cu->u_fname;
				$data["u_type"] = $cu->u_type;
				$data["u_sex"] = $cu->u_sex;
				$data["u_email"] = $cu->u_email;
				$data["u_birthday"] = $cu->u_birthday;
				$data["u_address"] = $cu->u_address;
				$data["u_active"] = $cu->u_active;
 				
				
			}
		    $this->load->view('templates/header',$data);
			$this->load->view('users_vw',$data);
			$this->load->view('templates/footer',$data);
			
		}
		public function addEdit_screen($edit_moad=NULL)
		{
			$data["page_title"] = $this->lang->line("addEdit_scr");
			                    $this->db->join("menus","screens.s_menu_code = menus.m_code");
			$data["scr_res"] =  $this->db->get('screens')->result();
			$data["menu_res"] =  $this->db->get('menus')->result();
			
			if(!empty($_POST))
			{
				extract($_POST);
				if($s_is_backend == 'on')
				   $s_is_backend= 1;
				else
					$s_is_backend = 0;
				$arr = array();
				  $arr=array(
					     "s_name"=>$s_name,
						 "s_menu_code"=>$s_menu_code ,
						 "s_url"=>$s_url ,
						 "s_symbol"=>$s_symbol ,
						 "s_is_backend"=>$s_is_backend ,
  						 "s_active"=>1
					);
				if(empty($s_code))
				{
					$this->db->insert('screens',$arr);
				}
				else
				{
				  $this->db->where("s_code",$s_code);
				  $this->db->update('screens',$arr);
				}
				unset($_POST);
				redirect('permissions/addEdit_screen');
			}
			if($edit_moad !=NULL)
			{
				$this->db->where("s_code",$edit_moad);
				$cu = $this->db->get('screens')->row();
				$data["s_code"] = $cu->s_code;
				$data["s_name"] = $cu->s_name;
				$data["s_menu_code"] = $cu->s_menu_code;
				$data["s_url"] = $cu->s_url;
				$data["s_is_backend"] = $cu->s_is_backend;
				$data["s_symbol"] = $cu->s_symbol;
 				
			}
		    $this->load->view('templates/header',$data);
			$this->load->view('screen_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function addbutton_screen($edit_moad=NULL)
		{
			$data["page_title"] = $this->lang->line("addbutton_screen");
			                    $this->db->join("menus","screens.s_menu_code = menus.m_code");
			$data["scr_res"] =  $this->db->get('screens')->result();
 			$data["btn_res"] =  $this->db->get('buttons')->result();
			if(!empty($_POST))
			{
				extract($_POST);
				 $this->db->where("scrbtn_scr_code",$s_code);
				 $this->db->delete('scr_has_btn');
 				  for($i=0;$i<=count($b_code)-1;$i++)
				  {
 					$this->db->insert('scr_has_btn',array("scrbtn_scr_code"=>$s_code , "scrbtn_btn_code"=>$b_code[$i]));
				  }
 				unset($_POST);
				redirect('permissions/addbutton_screen');
			}
			 
		    $this->load->view('templates/header',$data);
			$this->load->view('button_screen_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function get_btns_ajax()
		{
			extract($_POST);
 	        
			$query = $this->db->query("select screens.s_code , scr_has_btn.scrbtn_btn_code from screens , buttons,scr_has_btn 
			                            where scr_has_btn.scrbtn_scr_code = screens.s_code 
										 and  scr_has_btn.scrbtn_btn_code = buttons.b_code
										 and   screens.s_code = '".$code_post."'
										 and   screens.s_active = 1 ")->result(); 
					//	print_r($query);exit;
			echo json_encode($query);
		}
		public function get_btn_and_scr_ajax()
		{
			extract($_POST);
			$query = $this->db->query("select users.u_scr_priv , users.u_btn_priv from users  
			                            where   users.u_code = '".$code_post."'")->result(); 
					//	print_r($query);exit;
			echo json_encode($query);
		}
		public function del_users($u_code)
		{
			$this->db->where("u_code",$u_code);
			$this->db->where("u_code !=",1);
			$this->db->update("users",array("u_active"=>0));
 		    redirect('permissions/addEdit_users');
		}
        public function del_button($b_code)
        {
            $this->db->where("b_code",$b_code);
            $this->db->where("b_code !=",1);
            $this->db->update("buttons",array("b_active"=>0));
            redirect('permissions/addEdit_button');
        }
        public function del_menu($m_code)
        {
            $this->db->where("m_code",$m_code);
            $this->db->where("m_code !=",1);
            $this->db->update("menus",array("m_active"=>0));
            redirect('permissions/addEdit_menu');
        }

	}
?>