<?php class Common extends MY_Controller
       {
		   public function __construct()
		   {
			   parent::__construct();
			    if($this->is_logged_in() != 1)
			    {
				   redirect("login");
			    }
		   }
		    public function get_root_country() // send city code primay key to it!.
		    {
			   extract($_POST);
 			   $country_id_city   = $this->get_all_items("cities",1,array("id"=>$city_code));
 			   $root_country= $this->get_all_items("country" , 1 , array("id" =>$country_id_city[0]->country_id ));
			   echo $root_country[0]->id;
		   }
		    public function fetch_this_photos()
		    {
			  extract($_POST);
			  $this->draw_fetched_photos($post_val , $prefix_type , $active);
		    }
			public function set_photo_main()
			{
				extract($_POST);
				$this->db->where("S_code",$S_code);
				$this->db->where("prefix_type" , $prefix_type);
				$this->db->where("Rcu_id" , $rcu);
				$this->db->update("subject_photos" , array("is_main"=>$is_main));
				
				$this->db->where("S_code !=",$S_code);
				$this->db->where("prefix_type" , $prefix_type);
				$this->db->where("Rcu_id" , $rcu);
				$this->db->update("subject_photos" , array("is_main"=> 0));
			}
			public function set_photo_slider()
			{
				extract($_POST);
				$this->db->where("P_code" , $P_code);
				$this->db->update("photos" , array("P_is_slider"=>$is_slider));
			}
			public function set_photo_active()
			{
				extract($_POST);
 				$this->db->where("S_code",$S_code);
 				$this->db->update("subject_photos" , array("S_active"=>$active));
 			}
		    public function del_this_photo($photo_code =0 , $rcu=0 , $prefix_type)
			{
				  $this->delete_photos($photo_code , $rcu , $prefix_type);
				  echo $this->lang->line("alert_success");
			}
			public function update_photo_title()
			{
				extract($_POST);
				$arr = array("P_title_ar"=>$title_post);
				$this->db->where("P_code",$photo_code_post);
				if($this->db->update("photos",$arr))
				  echo 1 ; 
				  else
				  echo 0;
			}

	   }
	?>