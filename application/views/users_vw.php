
		<!-- Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><?=$this->lang->line('Manage_Users');?></h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
<div class="panel-body">
	<div class="row">
		 <div class="col-sm-12 col-xs-12">
		  <strong><?=$al;?></strong>
			<div class="form-wrap">
			 <form action="<?=base_url()?>Permissions/addEdit_users" method="post">
				  <input type="hidden" id="u_code" name="u_code" value="<?= !empty($u_code)?$u_code :"" ;?>"/>
<div class="form-body">
<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i><?=$this->lang->line('PersonInfo')?></h6>
	 <hr class="light-grey-hr"/>
		 <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label mb-10"><?=$this->lang->line('User_name');?></label>
						<input type="text" id="u_username"  name="u_username" value="<?= !empty($u_username)?$u_username :"" ;?>" class="form-control" placeholder="">
						<span class="help-block">   </span> 
					</div>
				</div>
										<!--/span-->
		<div class="col-md-6">
			<div class="form-group has-error">
				<label class="control-label mb-10"><?=$this->lang->line('User_fullname');?></label>
				<input type="text" id="u_fname" value="<?= !empty($u_fname)?$u_fname :"" ;?>" name="u_fname" class="form-control" placeholder="">
				<span class="help-block"> </span> 
			</div>
		</div> <!--/span-->
	 </div>

	 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label mb-10"><?=$this->lang->line('User_email');?></label>
					<input type="text" id="u_email" name="u_email" value="<?= !empty($u_email)?$u_email :"" ;?>" class="form-control" placeholder="">
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
					<option value="Male" <?= !empty($u_sex) && $u_sex=="Male"? "selected=selected" :"" ;?>>Male</option>
					<option value="Female" <?= !empty($u_sex) && $u_sex=="Female"? "selected=selected" :"" ;?>>Female</option>
				</select>
			 </div>
		</div>
		<!------------- /span -------------->
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label mb-10"><?=$this->lang->line('User_birthday');?></label>
				<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="<?= !empty($u_birthday)?$u_birthday :"" ;?>" id="u_birthday" name="u_birthday">
			</div>
		</div>
		<!--/span-->

		 <!------------- /span -------------->
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label mb-10"><?=$this->lang->line('User_type');?></label>
				<select class="form-control" id="u_type" name="u_type">
					 <option value="" disabled><?=$this->lang->line('choose');?></option>
					 <option value="1"  selected="selected"><?=$this->lang->line('admin_option');?></option>
<!--					 <option value="2" --><?//= !empty($u_type) && $u_type=="2"? "selected=selected" :"" ;?><!-->--><?//=$this->lang->line('teach_option');?><!--</option>-->
<!--					 <option value="3" --><?//= !empty($u_type) && $u_type=="3"? "selected=selected" :"" ;?><!-->--><?//=$this->lang->line('std_option');?><!--</option>-->
				</select>
			</div>
		</div>
		<!--/span-->

		<!------------- /span -------------->
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label mb-10"><?=$this->lang->line('active');?></label>
				<select class="form-control" id="u_active" name="u_active">
					 <option value=""><?=$this->lang->line('choose');?></option>
					 <option value="1" <?= !empty($u_active) && $u_active== 1 ? "selected=selected" :""  ?>><?=$this->lang->line('active_option');?></option>
					 <option value="0" <?= !empty($u_active) && $u_active== 0 ? "selected=selected" :""  ?>><?=$this->lang->line('inactive_option');?></option>
				</select>
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
				<input type="text" class="form-control" id="u_address" name="u_address" value="<?= !empty($u_address)?$u_address :"" ;?>">
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
<!-- /Row -->
<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Complex Header</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								 <table id="datable_2" class="table table-hover table-bordered display mb-30" >
									<thead>
									  <tr>
											<th><?=$this->lang->line('User_name')?></th>
											<th><?=$this->lang->line('User_email')?></th>
											<th><?=$this->lang->line('User_type')?></th>
											<th><?=$this->lang->line('active')?></th>
											<th><?=$this->lang->line('opt')?></th>

										</tr>
									</thead>
									<tfoot>
										<tr>
											<th><?=$this->lang->line('User_name')?></th>
											<th><?=$this->lang->line('User_email')?></th>
											<th><?=$this->lang->line('User_type')?></th>
											<th><?=$this->lang->line('active')?></th>
											<th><?=$this->lang->line('opt')?></th>
										</tr>
									</tfoot>
									<tbody>
										<?php 
											foreach($users_res as $usr){
												if($usr->u_active ==1)
												 $ac =   $this->lang->line('active') ;
												 else
												 $ac = $this->lang->line('inactive_user') ;

												 if($usr->u_type ==1)
												 $typ =   $this->lang->line('admin_option') ;
												 elseif($usr->u_type ==2)
												 $typ = $this->lang->line('teach_option') ; elseif($usr->u_type ==3)
												 $typ = $this->lang->line('std_option') ;

										?> 
										<tr>
											<td><?=$usr->u_username?></td>
											<td><?=$usr->u_email?></td>
											<td><?=$typ?></td>
											<td><?=$ac?></td>
											<td>
<a onclick="return confirm('<?=$this->lang->line('are_you_sure')?>')" href="<?=base_url()?>permissions/del_users/<?=$usr->u_code?>"><i class="fa fa-remove"></i></a>   | 
<a href="<?=base_url()?>permissions/addEdit_users/<?=$usr->u_code?>"><i class="fa fa-edit"></i></a>
											   </td>
										</tr>

										 <?php 
											} 
										?> 
									</tbody>
								</table>
							</div>
						</div>	
					</div>	
				</div>	
			</div>	
		</div>
	</div>