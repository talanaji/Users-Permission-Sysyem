<?php class Myaccount extends MY_Controller
	  {
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$data["page_title"] = $this->lang->line("pMy_account");
		    $this->load->view('templates/header',$data);
			$this->load->view('my_account_vw',$data);
			$this->load->view('templates/footer',$data);
		}
		public function update_changes()
		{
			extract($_POST);
 			
	       $this->db->where("u_code",$u_code);
		   $curr_user = $this->db->get("users")->row();
		   if(!empty($u_password))
		    {
				$arr = array("u_username" => $u_username ,
			              "u_fname" => $u_fname ,
			              "u_password" => md5($u_password) ,
			              "u_sex" => $u_sex ,
						  "u_email" => $u_sex ,
			              "u_birthday" => $u_birthday ,
			              "u_address" => $u_address  
			              );
				}
				  else
				  {
					  $arr = array("u_username" => $u_username ,
			              "u_fname" => $u_fname ,
						  "u_email" => $u_email ,
			              "u_sex" => $u_sex ,
			              "u_birthday" => $u_birthday ,
			              "u_address" => $u_address  
			              );
				  }
				   $arrsess = array(
 					"User_fullname" => $u_fname ,
					"User_email" => $u_email ,
 					"User_birthday" => $u_birthday,
					"User_address" => $u_address,
					"User_sex" => $u_sex ,
					"User_scr_priv" =>$curr_user->u_scr_priv,
					"User_btn_priv" =>$curr_user->u_btn_priv
  				   );
				   $this->session->set_userdata($arrsess); 
				$this->db->where("u_code",$u_code);
			    $this->db->update("users",$arr);
				redirect('Myaccount');
				
 	  		}
	  } 
	
?>