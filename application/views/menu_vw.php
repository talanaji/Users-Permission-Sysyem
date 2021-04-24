			
                    <!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><?=$this->lang->line('addEdit_menu');?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                         <form action="<?=base_url()?>permissions/addEdit_menu" method="post">
                              <input type="hidden" id="m_code" name="m_code" value="<?= !empty($m_code)? $m_code:""?>"/>
        <div class="form-body">
                  <hr class="light-grey-hr"/>
                     <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label mb-10"><?=$this->lang->line('m_name');?></label>
                                    <input type="text" id="m_name"   name="m_name" value="<?= !empty($m_name)? $m_name:""?>" class="form-control" placeholder="">
                                 </div>
                            </div>
                   </div>
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
														<th><?=$this->lang->line('active')?></th>
														<th><?=$this->lang->line('opt')?></th>
														 
													</tr>
												</thead>
												<tfoot>
													<tr>
													    <th><?=$this->lang->line('b_name')?></th>
														<th><?=$this->lang->line('active')?></th>
														<th><?=$this->lang->line('opt')?></th>
 													</tr>
												</tfoot>
												<tbody>
													<?php 
														foreach($menu_res as $men){
															if($men->m_active ==1)
															 $ac =   $this->lang->line('active') ;
															 else
															 $ac = $this->lang->line('inactive') ;
													?> 
													<tr>
														<td><?=$men->m_name?></td>
														<td><?=$ac?></td>
														<td>
                                                             <a href="<?=base_url()?>permissions/del_menu/<?=$men->m_code?>">حذف</a>   |
                                                             <a href="<?=base_url()?>permissions/addEdit_menu/<?=$men->m_code?>">تعديل</a>
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