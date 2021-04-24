
	<!-- Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark"><?=$this->lang->line('addEdit_scr');?></h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
	 <div class="col-sm-12 col-xs-12">
		<div class="form-wrap">
		 <form action="<?=base_url()?>permissions/addEdit_screen" method="post">
			  <input type="hidden" id="s_code" name="s_code" value="<?= !empty($s_code)? $s_code:""?>"/>
<div class="form-body">
  <hr class="light-grey-hr"/>
	 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label mb-10"><?=$this->lang->line('s_name');?></label>
					<input type="text" id="s_name"   name="s_name" value="<?= !empty($s_name)? $s_name:""?>" 
					class="form-control" placeholder="">
				 </div>
			</div>

		   <div class="col-md-6">
			<div class="form-group">
				<label class="control-label mb-10"><?=$this->lang->line('s_menu_code');?></label>
				<select class="form-control" id="s_menu_code" name="s_menu_code">
					<option value="" ><?=$this->lang->line('choose');?></option>
					<?php foreach($menu_res as $men){?>
					<option value="<?=$men->m_code?>" <?= !empty($s_menu_code) && $s_menu_code == $men->m_code?"selected=selected" : ""?>>
						<?=$men->m_name?>
					</option>
					<?php } ?>

				</select>
			 </div>
		 </div>  
   </div>

   <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label mb-10"><?=$this->lang->line('s_url');?></label>
					<input type="text" id="s_url"   name="s_url" value="<?= !empty($s_url)? $s_url:""?>" 
					class="form-control" placeholder="">
				 </div>
			</div>

		   <div class="col-md-6">
			<div class="form-group">
				<label class="control-label mb-10"><?=$this->lang->line('s_symbol');?></label> 
				<input type="text" id="s_symbol"   name="s_symbol" value="<?= !empty($s_symbol)? $s_symbol:""?>" 
					class="form-control" placeholder="">

			 </div>
		 </div>  
	   <div class="col-md-12">
		   <div class="col-md-3">
 			   <?=$this->lang->line('s_is_backend');?>
		   </div>
		  <div class="col-md-1">
  		   <input type="checkbox" class="form-control" <?=!empty($s_is_backend)? "checked=checked" :""?> name="s_is_backend" id="s_is_backend" /> </div>
	   </div>
   </div>

</div>

			<div class="form-actions mt-10">
		 <button type="submit" class="btn btn-success  mr-10">
			  <?=$this->lang->line('Save');?> </button>
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
										<th><?=$this->lang->line('b_name')?></th>
										<th><?=$this->lang->line('m_name')?></th> 
										<th><?=$this->lang->line('active')?></th>
										<th><?=$this->lang->line('opt')?></th>

									</tr>
								</thead>
								<tfoot>
									<tr>
										<th><?=$this->lang->line('b_name')?></th>
										<th><?=$this->lang->line('m_name')?></th>
										<th><?=$this->lang->line('active')?></th>
										<th><?=$this->lang->line('opt')?></th>
									</tr>
								</tfoot>
								<tbody>
									<?php 
										foreach($scr_res as $scr){
											if($scr->s_active ==1)
											 $ac =   $this->lang->line('active') ;
											 else
											 $ac = $this->lang->line('inactive') ;
									?> 
									<tr>
										<td><?=$scr->s_name?></td>
										<td><?=$scr->m_name?></td>
										<td><?=$ac?></td>
										<td>
											 <a href="<?=base_url()?>permissions/del_screen/<?=$scr->s_code?>"><i class="fa fa-remove"></i></a>   | 
											 <a href="<?=base_url()?>permissions/addEdit_screen/<?=$scr->s_code?>"><i class="fa fa-edit"></i></a>
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