<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model
      {
		  
		 public function get_settings($code)
		 {
			 $this->db->where("property" , $code);
 			 $out = $this->db->get("settings")->row();
			 return $out->value ;
  		 }
		 public function get_perm_scr_menu($menu) // draw permission screens //
		 {  
			 $where = '';
			  if($this->session->userdata('User_scr_priv') == 'all')
				  $where = " ";
			 elseif($this->session->userdata('User_scr_priv') != '' ||$this->session->userdata('User_scr_priv') != NULL )
				 $where = "screens.s_code in (".$this->session->userdata('User_scr_priv').") and ";
			 else
			 
				redirect("Welcome");
	 
				 
 			 $query = $this->db->query("select * from screens , users, menus  where ".
			                                 $where ." screens.s_menu_code = menus.m_code
											  and   screens.s_menu_code = '".$menu."'
											   and  users.u_code = '".$this->session->userdata('User_code')."'")->result(); 
  			return  $query ; 
		 }
	     public function get_menus()
		  {
		            $this->db->where("m_active",1);
  			 $out = $this->db->get("menus")->result();
			 return $out;
  		  }  
		  public function get_screens($m_code) //Screen for admin pages , screens
		  {
 			  $this->db->where("s_menu_code",$m_code);
              $this->db->where("s_active",1);
			  $this->db->where("s_is_backend", 1); // Admin Pages
			  $out = $this->db->get('screens')->result();
			  return $out;
		  }
		  public function get_buttons()
		  {
  			 $out = $this->db->get("buttons")->result();
			 return $out;
  		  }
		 public function get_users_btnprivs($usr_code_session)
		  {
			  $this->db->where("u_code",$usr_code_session);
			  $out = $this->db->get("users")->row();
			  return $out->u_btn_priv;
		  }
		  
		  public function  availble_rooms_count($check_date=NULL)
		  {
			  $room = $this->db->query("select count(*) ctt   from rooms 
 				where 
						 room_code not in (select res_room_code  from reservations where DATE_FORMAT(res_time_end,'%Y-%m-%d') =  '2019-01-01' )
				   and
						room_code not in(select reg_room_code from registration_courses  where DATE_FORMAT(reg_end_date,'%Y-%m-%d')   = '2019-01-01')
  					")->row();
			  return $room->ctt+1;
		  }
		  public function get_availble_rooms($check_date=NULL)
		  {
			  $room = $this->db->query("select room_name  from rooms 
 				where 
						 room_code not in (select res_room_code  from reservations where DATE_FORMAT(res_time_end,'%Y-%m-%d') =  '2019-01-01' )
				   and
						room_code not in(select reg_room_code from registration_courses  where DATE_FORMAT(reg_end_date,'%Y-%m-%d')   = '2019-01-01')
  					")->result();
			  return $room;
		  }
			public function adfly($url, $key, $uid, $domain = 'adf.ly', $advert_type = 'int')
			{
			  $api = 'http://api.adf.ly/api.php?';
			  // api queries
			  $query = array(
				'key' => $key,
				'uid' => $uid,
				'advert_type' => $advert_type,
				'domain' => $domain,
				'url' => $url
			  );
			  // full api url with query string
			  $api = $api . http_build_query($query);
			  // get data
			  if ($data = file_get_contents($api))
				return $data;
		}
		   
	  }
	?>