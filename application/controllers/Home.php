<?php class Home extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
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
			 }
		}
		public function index()
		{
			$data["page_title"] = "الصفحة الرئيسية";
  		    $this->load->view('templates/header',$data);
			$this->load->view('templates/content',$data);
			$this->load->view('templates/footer',$data);
		    
  		}
		public function is_logged_in()
		{
		  if($this->session->userdata('User_code') || $this->session->userdata('User_name'))
				return 1; 
			else 
				redirect("login"); 
		}
		 
	}
?>