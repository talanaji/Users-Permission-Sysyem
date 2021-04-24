<?php

if ( ! function_exists('redundancy_where_value_s'))
{
      function redundancy_where_value_s($table , $where_coll , $val , $other_conds)
	  {
		 $ci=& get_instance();
		 $sel = $ci->db->query("select count(*) CT from ".$table." where ".$where_coll." = '".$val."'  ".$other_conds)->row();
 		return $sel->CT;
	  }
}
if ( ! function_exists('draw_lists'))
{
 	function draw_lists($table , $select_id , $select_txt , $activation_column ,$active_val)
	{
		 
		$ci= & get_instance();
		if(!empty($activation_column) && !empty($active_val))
		{
			$seld =  $ci->db->query("select ".$select_id." , ".$select_txt." from ".$table." where  ".$activation_column."= ".$active_val." order by ".$select_id."  asc")->result();
	    }
		else{
			$seld =  $ci->db->query("select ".$select_id." , ".$select_txt." from ".$table."  order by ".$select_id."  asc")->result();
		}
		foreach($seld as $rowsd)
		{
			echo "<option value='".$rowsd->$select_id ."'>".$rowsd->$select_txt ."</option>";
		}
	}
}

?>