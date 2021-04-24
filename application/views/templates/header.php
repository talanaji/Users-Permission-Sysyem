<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?=$page_title?></title>
	 
	<meta name="author" content="Mismail"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!-- Bootstrap   CSS -->
		<link href="<?=base_url()?>public/vendors/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<!-- Morris Charts CSS -->
    <link href="<?=base_url()?>public/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    
    <!-- Morris Charts CSS -->
    <link href="<?=base_url()?>public/dist/css/select2.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?=base_url()?>public/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?=base_url()?>public/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <!-- Data table CSS -->
	<link href="<?=base_url()?>public/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap Datetimepicker CSS -->
		<link href="<?=base_url()?>public/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Bootstrap Daterangepicker CSS -->
		<link href="<?=base_url()?>public/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
	
  	<!-- Custom CSS -->
	<link href="<?=base_url()?>public/dist/css/style.css" rel="stylesheet" type="text/css">
	    	<script type="text/javascript" src="<?=base_url()?>public/dist/js/jquery.js"></script>
	    	<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
	function chkBox(selector)
	{
		if($(selector).is(":checked"))
		{
			return 1;
		}
		else{ return 0;}
	}
	function draw(url , selector )
	{
		 $.ajax({
				url : url , 
				 beforeSend: function ( xhr )
				 {
					 xhr.overrideMimeType("text/plain; charset=utf-8");
				 } ,
				type: 'POST',  
				data:{random:Math.random()} ,  
				success:function(data) 
				 {
					 $(selector).html(data);
					 setTimeout(function(){$('#example').DataTable();},700);
				 }
			 });
    }
	
	function draw_such_params(url , selector , params )
	{
		//var arr =  $("param_selector,param_selector").serialize()
		 $.ajax({
				url : url , 
				 beforeSend: function ( xhr )
				 {
					 xhr.overrideMimeType("text/plain; charset=utf-8");
				 } ,
				type: 'POST',  
				data:   params   ,  
				success:function(data) 
				 {
					 $(selector).html(data);
					 setTimeout(function(){$('#example').DataTable();},700);
				 }
			 });
    }
		
    function _PREFIX()
    {
	  return m_PREFIX = document.getElementById("_PRIFIX").value;
    }
		function get_chkbox_val(selector)
		{
			if($(selector).is(":checked"))
			{
				return 1;
			}
			else{ return 0;}
		}
      	function fetch_all(url , selector)
		{  
			$.ajax({
			   url : url, 
			   type:'POST', 
			   data:{random:Math.random()} , 
			   success: function(data)
			   { $(selector).html(data);$('#example').DataTable();}
			 });
		}
		function fetch_per_params(url , selector ,  right_val , prfx_type , actv=-1)
		{
 			$.ajax({
			   url : url, 
			   type:'POST', 
			   data:{random:Math.random() , 
			      post_val    : right_val ,
				  prefix_type : prfx_type , 
				  active      : actv
			   } , 
			   success: function(data)
			   { $(selector).html(data);$('#example').DataTable();}
			 });
		}
		function get_root_country(city)
		{
 			$.ajax({
			    url:'<?=base_url()?>common/get_root_country',
				type:'POST',
				data:{random:Math.random(),
				  city_code : city
				}	,
				success: function(data)
				{
 					$("#global_country").val(data);
				}
			});
  		}
</script>
</head>

<body>
		 <?php  
		     $menus = $this->main_model->get_menus(); 	
			 
		 ?>

 	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			 <div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="#">
							<img class="brand-img" src="<?=base_url()?>public/dist/img/logo.png" alt="brand"/>
							<span class="brand-text"><?=$this->lang->line("sysname");?></span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			 <div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<!--<li>
						<a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
					</li>-->
					<!--<li class="dropdown app-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
						<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
							<li>
								<div class="app-nicescroll-bar">
									<ul class="app-icon-wrap pa-10">
										<li>
											<a href="weather.html" class="connection-item">
											<i class="zmdi zmdi-cloud-outline txt-info"></i>
											<span class="block">weather</span>
											</a>
										</li>
										<li>
											<a href="inbox.html" class="connection-item">
											<i class="zmdi zmdi-email-open txt-success"></i>
											<span class="block">e-mail</span>
											</a>
										</li>
										<li>
											<a href="calendar.html" class="connection-item">
											<i class="zmdi zmdi-calendar-check txt-primary"></i>
											<span class="block">calendar</span>
											</a>
										</li>
										<li>
											<a href="vector-map.html" class="connection-item">
											<i class="zmdi zmdi-map txt-danger"></i>
											<span class="block">map</span>
											</a>
										</li>
										<li>
											<a href="chats.html" class="connection-item">
											<i class="zmdi zmdi-comment-outline txt-warning"></i>
											<span class="block">chat</span>
											</a>
										</li>
										<li>
											<a href="contact-card.html" class="connection-item">
											<i class="zmdi zmdi-assignment-account"></i>
											<span class="block">contact</span>
											</a>
										</li>
									</ul>
								</div>	
							</li>
							<li>
								<div class="app-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> more </a>
								</div>
							</li>
						</ul>
					</li>-->
					<!--<li class="dropdown full-width-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
						<ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li class="product-nicescroll-bar row">
								<ul class="pa-20">
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="index.html">Analytical</a>
											</li>
											<li>
												<a  href="index2.html">Demographic</a>
											</li>
											<li>
												<a href="index3.html">Project</a>
											</li>
											<li>
												<a href="profile.html">profile</a>
											</li>
										</ul>
										<a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<a href="documentation.html"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">documentation</span></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
									</li>
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);">
											<div class="pull-left">
												<i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span>
											</div>	
											<div class="pull-right"><span class="label label-success">hot</span>
											</div>
											<div class="clearfix"></div>
										</a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="e-commerce.html">Dashboard</a>
											</li>
											<li>
												<a href="product.html">Products</a>
											</li>
											<li>
												<a href="product-detail.html">Product Detail</a>
											</li>
											<li>
												<a href="add-products.html">Add Product</a>
											</li>
											<li>
												<a href="product-orders.html">Orders</a>
											</li>
											<li>
												<a href="product-cart.html">Cart</a>
											</li>
											<li>
												<a href="product-checkout.html">Checkout</a>
											</li>
										</ul>
									</li>
									<li class="col-md-6 col-xs-12 preview-carousel">
										<a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<div class="product-carousel owl-carousel owl-theme text-center">
											<a href="#">
												<img src="dist/img/chair.jpg" alt="chair">
												<span>Circle chair</span>
											</a>
											<a href="#">
												<img src="dist/img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>
											<a href="#">
												<img src="dist/img/chair3.jpg" alt="chair">
												<span>semi circle chair</span>
											</a>
											<a href="#">
												<img src="dist/img/chair4.jpg" alt="chair">
												<span>wooden chair</span>
											</a>
											<a href="#">
												<img src="dist/img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>								
										</div>
									</li>
								</ul>
							</li>	
						</ul>
					</li>-->
					<!--<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">notifications</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-green">
												<i class="zmdi zmdi-flag"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">
												New subscription created</span>
												<span class="inline-block font-11  pull-right notifications-time">2pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-yellow">
												<i class="zmdi zmdi-trending-down"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
												<span class="inline-block font-11 pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Some technical error occurred needs to be resolved.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-blue">
												<i class="zmdi zmdi-email"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
												<span class="inline-block font-11  pull-right notifications-time">4pm</span>
												<div class="clearfix"></div>
												<p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="sl-avatar">
												<img class="img-responsive" src="dist/img/avatar.jpg" alt="avatar"/>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-red">
												<i class="zmdi zmdi-storage"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">consectetur, adipisci velit.</p>
											</div>
										</a>	
									</div>
								</div>
							</li>
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>-->
					    <li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
						<img src="<?=base_url()?>public/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
						<span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?=base_url()?>Myaccount"><i class="zmdi zmdi-account"></i><span><?= $this->lang->line("profile");?></span></a>
							</li>
 							<!--<li>
								<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
							</li>-->
							<li>
								<a href="#"><i class="zmdi zmdi-settings"></i><span><?= $this->lang->line("Settings");?></span></a>
							</li>
 							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>login/logout"><i class="zmdi zmdi-power"></i><span><?= $this->lang->line("LogOut");?></span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		<!-- Left Sidebar Menu -->
	    <div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span><?=$this->lang->line("Main");?></span> 
					<i class="zmdi zmdi-more"></i>
				</li>
             <?php 
 			   if($this->main_model->get_settings('is_with_permission') == 1)
			   {
 			      if($this->session->userdata('User_type') == 1 && $this->session->userdata('User_code') == 1)
				   {
				    
					  foreach($menus as $me){
					 	 $scren = $this->main_model->get_screens($me->m_code);
						  if(count($scren) > 0 )
						   {
				 ?>   
				<li>
		 <a href="javascript:void(0);" data-toggle="collapse" data-target="#menu<?=$me->m_code?>">
                        <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i>
                        <span class="right-nav-text"><?=$me->m_name?></span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                     </a>
					<ul id="menu<?=$me->m_code?>" class="collapse collapse-level-1">
                      <?php  foreach($scren as $scr){?>
						<li>
							<a class="active-page" href="<?=base_url().$scr->s_url?>" title="<?=$scr->s_symbol?>"><?=$scr->s_name?></a>
						</li>
						<?php  }?> 
					</ul>
				</li>
                <?php 
						  } 
					  }
				 	} 
				 else
					{
 						foreach($menus as $me)
						{
					 	   $scren = $this->main_model->get_perm_scr_menu($me->m_code);
							if(count($scren) > 0 )
							{
 						 ?>
						<li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#menu<?=$me->m_code?>">
                                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i>
                                <span class="right-nav-text"><?=$me->m_name?></span></div>
                                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                             </a>
                            <ul id="menu<?=$me->m_code?>" class="collapse collapse-level-1">
                              <?php  foreach($scren as $scr){?>
                                <li>
                                    <a class="active-page" href="<?=base_url().$scr->s_url?>" title="<?=$scr->s_symbol?>"><?=$scr->s_name?></a>
                                </li>
                                <?php  }?> 
                            </ul>
                        </li>
					<?php 
							}
					   }
					
					}
			   }
				   else {  // Manual Screens
                       foreach ($menus as $me) {
                           $scren = $this->main_model->get_screens($me->m_code);
                           if (count($scren) > 0) {
                               ?>
                               <li>
                                   <a href="javascript:void(0);" data-toggle="collapse"
                                      data-target="#menu<?= $me->m_code ?>">
                                       <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i>
                                           <span class="right-nav-text"><?= $me->m_name ?></span></div>
                                       <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                       <div class="clearfix"></div>
                                   </a>
                                   <ul id="menu<?= $me->m_code ?>" class="collapse collapse-level-1">
                                       <?php foreach ($scren as $scr) { ?>
                                           <li>
                                               <a class="active-page" href="<?= base_url() . $scr->s_url ?>"
                                                  title="<?= $scr->s_symbol ?>"><?= $scr->s_name ?></a>
                                           </li>
                                       <?php } ?>
                                   </ul>
                               </li>
                               <!-- <li>
                                       <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span></div><div class="pull-right"><span class="label label-success">hot</span></div><div class="clearfix"></div></a>
                                       <ul id="ecom_dr" class="collapse collapse-level-1">
                                           <li>
                                               <a href="e-commerce.html">Dashboard</a>
                                           </li>
                                           <li>
                                               <a href="product.html">Products</a>
                                           </li>

                                           <li>
                                               <a href="product-detail.html">Product Detail</a>
                                           </li>
                                           <li>
                                               <a href="add-products.html">Add Product</a>
                                           </li>
                                           <li>
                                               <a href="product-orders.html">Orders</a>
                                           </li>
                                           <li>
                                               <a href="product-cart.html">Cart</a>
                                           </li>
                                           <li>
                                               <a href="product-checkout.html">Checkout</a>
                                           </li>
                                       </ul>
                                   </li>
                                    <li>
                                       <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Apps </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                       <ul id="app_dr" class="collapse collapse-level-1">
                                           <li>
                                               <a href="chats.html">chats</a>
                                           </li>
                                           <li>
                                               <a href="calendar.html">calendar</a>
                                           </li>
                                           <li>
                                               <a href="weather.html">weather</a>
                                           </li>
                                           <li>
                                               <a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                               <ul id="email_dr" class="collapse collapse-level-2">
                                                   <li>
                                                       <a href="inbox.html">inbox</a>
                                                   </li>
                                                   <li>
                                                       <a href="inbox-detail.html">detail email</a>
                                                   </li>
                                               </ul>
                                           </li>
                                           <li>
                                               <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                               <ul id="contact_dr" class="collapse collapse-level-2">
                                                   <li>
                                                       <a href="contact-list.html">list</a>
                                                   </li>
                                                   <li>
                                                       <a href="contact-card.html">cards</a>
                                                   </li>
                                               </ul>
                                           </li>
                                           <li>
                                               <a href="file-manager.html">File Manager</a>
                                           </li>
                                           <li>
                                               <a href="todo-tasklist.html">To Do/Tasklist</a>
                                           </li>
                                       </ul>
                                   </li>
                                    <li>
                                       <a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
                                   </li> -->
                               <?php
                           }
                       }
                   }
				  ?>
				<li><hr class="light-grey-hr mb-10"/></li>
				<!--<li class="navigation-header">
					<span>component</span> 
					<i class="zmdi zmdi-more"></i>
				</li>-->
				<!--<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">UI Elements</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="panels-wells.html">Panels & Wells</a>
						</li>
						<li>
							<a href="modals.html">Modals</a>
						</li>
						<li>
							<a href="sweetalert.html">Sweet Alerts</a>
						</li>
						<li>
							<a href="notifications.html">notifications</a>
						</li>
						<li>
							<a href="typography.html">Typography</a>
						</li>
						<li>
							<a href="buttons.html">Buttons</a>
						</li>
						<li>
							<a href="accordion-toggle.html">Accordion / Toggles</a>
						</li>
						<li>
							<a href="tabs.html">Tabs</a>
						</li>
						<li>
							<a href="progressbars.html">Progress bars</a>
						</li>
						<li>
							<a href="skills-counter.html">Skills & Counters</a>
						</li>
						<li>
							<a href="pricing.html">Pricing Tables</a>
						</li>
						<li>
							<a href="nestable.html">Nestables</a>
						</li>
						<li>
							<a href="dorpdown.html">Dropdowns</a>
						</li>
						<li>
							<a href="bootstrap-treeview.html">Tree View</a>
						</li>
						<li>
							<a href="carousel.html">Carousel</a>
						</li>
						<li>
							<a href="range-slider.html">Range Slider</a>
						</li>
						<li>
							<a href="grid-styles.html">Grid</a>
						</li>
						<li>
							<a href="bootstrap-ui.html">Bootstrap UI</a>
						</li>
					</ul>
				</li>-->
 			</ul>
	    </div>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<!--<div class="fixed-sidebar-right">-->
			 
	  </div>
		<!-- /Right Sidebar Menu -->
		
        <!-- Main Content -->
		<div class="page-wrapper">
             <!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark"><?=$page_title?></h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="Home">Dashboard</a></li>
						<li><a href="Home"><span><?=$page_title?></span></a></li>
 					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->