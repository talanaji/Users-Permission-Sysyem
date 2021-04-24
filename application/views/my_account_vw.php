			
                    <!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><?=$this->lang->line('pMy_account');?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                         <form action="Myaccount/update_changes" method="post">
                              <input type="hidden" id="u_code" name="u_code" value="<?=$this->session->userdata('User_code');?>"/>
        <div class="form-body">
            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i><?=$this->lang->line('PersonInfo')?></h6>
                 <hr class="light-grey-hr"/>
                     <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label mb-10"><?=$this->lang->line('User_name');?></label>
                                    <input type="text" id="u_username" readonly="readonly" name="u_username" value="<?=$this->session->userdata('User_name');?>" class="form-control" placeholder="">
                                    <span class="help-block">   </span> 
                                </div>
                            </div>
                                                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group has-error">
                            <label class="control-label mb-10"><?=$this->lang->line('User_fullname');?></label>
                            <input type="text" id="u_fname" value="<?=$this->session->userdata('User_fullname');?>" name="u_fname" class="form-control" placeholder="">
                            <span class="help-block"> </span> 
                        </div>
                    </div> <!--/span-->
                 </div>
                 
				 <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-10"><?=$this->lang->line('User_email');?></label>
                                <input type="text" id="u_email" name="u_email" value="<?=$this->session->userdata('User_email');?>" class="form-control" placeholder="">
                                <span class="help-block">   </span> 
                            </div>
                        </div>
                        <!--/span-->
                       <div class="col-md-6">
                         <div class="form-group has-error">
                            <label class="control-label mb-10"><?=$this->lang->line('User_password');?></label>
                            <input type="password" id="u_password" name="u_password" class="form-control" autocomplete="off" placeholder="">
                            <span class="help-block"> </span> 
                        </div>
                    </div> <!--/span-->
                 </div>						
               <!--------------- /Row ----------------->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10"><?=$this->lang->line('User_sex');?></label>
                            <select class="form-control" id="u_sex" name="u_sex">
                                <option value="Male" <?= $this->session->userdata('User_sex') == 'Male'?"selected=selected":""; ?>>Male</option>
                                <option value="Female" <?= $this->session->userdata('User_sex') == 'Female'?"selected=selected":""; ?>>Female</option>
                            </select>
                         </div>
                    </div>
                    <!------------- /span -------------->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10"><?=$this->lang->line('User_birthday');?></label>
                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" value="<?=$this->session->userdata('User_birthday');?>" id="u_birthday" name="u_birthday">
                        </div>
                    </div>
                    <!--/span-->
                </div>
 			 <!-- /Row -->
              	<!-- /Row -->
															
           <div class="seprator-block"></div>
                <h6 class="txt-dark capitalize-font">
                <i class="zmdi zmdi-account-box mr-10"></i><?=$this->lang->line('User_address');?></h6>
                <hr class="light-grey-hr"/>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label class="control-label mb-10"><?=$this->lang->line('User_address');?></label>
                            <input type="text" class="form-control" id="u_address" name="u_address" value="<?=$this->session->userdata('User_address');?>">
                        </div>
                    </div>
                </div>
 			 <!-- /Row -->
 		   </div>
            <!--<div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox checkbox-success">
                        <input id="checkbox_34" type="checkbox">
                        <label for="checkbox_34">Check me out !</label>
                    </div>
                </div>
            </div>-->
                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-success  mr-10"><?=$this->lang->line('Save');?> </button>
                             </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>		
        </div>
    </div>
 	<!-- /Row -->