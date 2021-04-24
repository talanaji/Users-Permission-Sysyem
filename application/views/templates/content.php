<!-- Row -->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
	<h6 class="panel-title txt-dark"><?= !empty($_GET["err"]) ? $this->lang->line('dont_have_permission'): "";?></h6>
</div>
<div class="clearfix"></div>
</div>
<?php if(1 == 2) {?>
<div class="panel-wrapper collapse in">
<div class="panel-body">
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<div class="form-wrap">
				<form action="#">
					<div class="form-body">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Person's Info</h6>
						<hr class="light-grey-hr"/>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">First Name</label>
									<input type="text" id="firstName" class="form-control" placeholder="John doe">
									<span class="help-block"> This is inline help </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group has-error">
									<label class="control-label mb-10">Last Name</label>
									<input type="text" id="lastName" class="form-control" placeholder="12n">
									<span class="help-block"> This field has error. </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<!-- /Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Gender</label>
									<select class="form-control">
										<option value="">Male</option>
										<option value="">Female</option>
									</select>
									<span class="help-block"> Select your gender </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Date of Birth</label>
									<input type="text" class="form-control" placeholder="dd/mm/yyyy">
								</div>
							</div>
							<!--/span-->
						</div>
						<!-- /Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Category</label>
									<select class="form-control" data-placeholder="Choose a Category" tabindex="1">
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Membership</label>
									<div class="radio-list">
										<div class="radio-inline pl-0">
											<span class="radio radio-info">
																	<input type="radio" name="radio5" id="radio_5" value="option1">
															<label for="radio_5">Option 1</label>
															</span>

										</div>
										<div class="radio-inline">
											<span class="radio radio-info">
																	<input type="radio" name="radio5" id="radio_6" value="option2">
															<label for="radio_6">Option 2 </label>
															</span>

										</div>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!-- /Row -->

						<div class="seprator-block"></div>

						<h6 class="txt-dark capitalize-font">
											<i class="zmdi zmdi-account-box mr-10"></i>address</h6>

						<hr class="light-grey-hr"/>
						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label mb-10">Street</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">City</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">State</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<!--/span-->
						</div>
						<!-- /Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Post Code</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Country</label>
									<select class="form-control">
										<option>--Select your Country--</option>
										<option>India</option>
										<option>Sri Lanka</option>
										<option>USA</option>
									</select>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<div class="checkbox checkbox-success">
								<input id="checkbox_34" type="checkbox">
								<label for="checkbox_34">Check me out !</label>
							</div>
						</div>
					</div>
					<div class="form-actions mt-10">
						<button type="submit" class="btn btn-success  mr-10"> Save</button>
						<button type="button" class="btn btn-default">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<!-- /Row -->
<!-- Row -->
<div class="row">
</div>
<!-- /Row -->
<!-- Row --> 
<?php if(1 == 2) {?>
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
			<table id="datable_2" class="table table-hover table-bordered display mb-30">
				<thead>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Salary</th>
						<th>Office</th>
						<th>Extn.</th>
						<th>E-mail</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Salary</th>
						<th>Office</th>
						<th>Extn.</th>
						<th>E-mail</th>
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>$320,800</td>
						<td>Edinburgh</td>
						<td>5421</td>
						<td>t.nixon@datatables.net</td>
					</tr>
					<tr>
						<td>Garrett Winters</td>
						<td>Accountant</td>
						<td>$170,750</td>
						<td>Tokyo</td>
						<td>8422</td>
						<td>g.winters@datatables.net</td>
					</tr>
					<tr>
						<td>Ashton Cox</td>
						<td>Junior Technical Author</td>
						<td>$86,000</td>
						<td>San Francisco</td>
						<td>1562</td>
						<td>a.cox@datatables.net</td>
					</tr>
					<tr>
						<td>Cedric Kelly</td>
						<td>Senior Javascript Developer</td>
						<td>$433,060</td>
						<td>Edinburgh</td>
						<td>6224</td>
						<td>c.kelly@datatables.net</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<!-- /Row -->
<?php } ?>