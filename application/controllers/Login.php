<?php 
	class Login extends CI_Controller
	  {
		public function __construct()
		{
			parent::__construct();
			error_reporting(0);
			$this->lang->load("cperm","portuguese");
		}
		public function index()
		{
			$this->load->view("login");
		}
		 public function auth()
		  {
            extract($_POST);
  			if(!empty($email) && !empty($password))
			{	
			  if($choose_lang == "arabic") 
			  {
				  $this->lang->load("cperm","arabic");
 				  $lang_sess = "arabic";	
			  }
			  elseif($choose_lang == "english")
			  {
				  $this->lang->load("cperm","portuguese");
				  $lang_sess = "portg"; //$this->session->set_userdata('lang',"");
			  }
				$this->db->where("u_active" , 1);
				$this->db->where("u_username",$email);
				$this->db->where("u_password",md5($password));
  		   		$query = $this->db->get("users");
			
			   if($query -> num_rows() == 1)
			   {
			       $r = $query->result() ;
				  if($r[0]->u_active == 1 ){
 				   $arr = array(
				   	"User_code" => $r[0]->u_code , 
					"User_name" => $r[0]->u_username , 
					"User_fullname" => $r[0]->u_fname ,
					"User_email" => $r[0]->u_email ,
					"User_type" => $r[0]->u_type,
					"User_birthday" => $r[0]->u_birthday,
					"User_address" => $r[0]->u_address,
					"User_sex" => $r[0]->u_sex,
					"User_scr_priv" => $r[0]->u_scr_priv,
					"User_btn_priv" => $r[0]->u_btn_priv,
					"lang"  => $lang_sess
  				   );
				   $this->session->set_userdata($arr);
 				   redirect("Home");
				  }
				  else
				   $data["err"] = $this->lang->line('inactive_user');
  			   }
			   else
			   {
				   $data["title"]  = "تسجيل دخول المدير | لوحة التحكم";
				   $data["err"] = "خطأ في اسم المستخدم اول كلمة المرور";
				   $this->load->view('login' , $data);
 				   return false;
			   }
			}
			else
			{
				redirect("login");
			}
     	  }
          public function logout()
		  {
			  $this->session->sess_destroy();
			  redirect("login");
		  }
	  }
?>