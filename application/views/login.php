<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title> تسجيل دخول المدير / المستخدمين</title>
 		<meta name="author" content="Mismail"/>
 		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?=base_url()?>public/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="<?=base_url()?>public/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="#">
						<img class="brand-img mr-10" src="<?=base_url()?>public/dist/img/logo.png" alt="brand"/>
						<span class="brand-text">لوحة التحكم</span>
					</a>
				</div>
	 
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10"><?= $this->lang->line('login_title')?></h3>
 										</div>	
      <div class="form-wrap">
                <form action="<?=base_url()?>login/auth" method="POST">
                 <div class="form-group">
                 <label class="control-label mb-10" for="exampleInputEmail_2"><?= $this->lang->line('User_name')?></label>
                 <input type="text" class="form-control" required id="email" name="email" placeholder="<?= $this->lang->line('username_placeholder')?>">
     </div>
     <div class="form-group">
                <label class="pull-left control-label mb-10" for="exampleInputpwd_2"><?= $this->lang->line('User_password')?></label>
                 <div class="clearfix"></div>
                <input type="password" class="form-control" required id="password" name="password" placeholder="<?= $this->lang->line('password_placeholder')?>">
    </div>
												
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<select id="choose_lang" name="choose_lang">
                                                         <option value="arabic">Arabic</option>
                                                         <option value="english">english</option>
                                                        </select>
														 
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" name="submit" class="btn btn-info btn-rounded"><?= $this->lang->line('Login_btn')?></button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?=base_url()?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?=base_url()?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>public/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?=base_url()?>public/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?=base_url()?>public/dist/js/init.js"></script>
	</body>
</html>