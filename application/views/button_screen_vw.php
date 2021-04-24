			
                    <!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><?=$this->lang->line('addbutton_screen');?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
        <form action="<?=base_url()?>permissions/addbutton_screen" method="post">
             <div class="form-body">
                  <hr class="light-grey-hr"/>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-10"><?=$this->lang->line('s_name');?></label>
                                <select class="form-control" id="s_code" name="s_code" onchange="get_btns(this.value)">
                                    <option value="" ><?=$this->lang->line('choose');?></option>
                                    <?php foreach($scr_res as $scr){?>
                                    <option value="<?=$scr->s_code?>">
										<?=$scr->s_name?>
                                    </option>
                                    <?php } ?>
                                    
                                </select>
                             </div>
                         </div>  
                   </div>
                    
                   <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <?php foreach($btn_res as $btn){?>
                                 <div class="col-md-3">
                                      <div class="checkbox checkbox-success">
                                          <input id="checkbox_<?=$btn->b_code?>" class="all_btns" name="b_code[]" value="<?=$btn->b_code?>" type="checkbox"  />
                                          <label for="checkbox_<?=$btn->b_code?>"><?= $btn->b_name?></label>
                                        </div>
                                 </div>
                                 <?php }?>
                                
                             </div>
                         </div>  
                   </div>
       		   </div>
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
     <script type="text/javascript">
     	function get_btns(v)
		{
			$(".all_btns").prop("checked",false); 
 			$.ajax({
				url:'<?=base_url()?>permissions/get_btns_ajax',
				type:'POST',
				data:{random:Math.random(),
				 code_post : v 
				},
				success: function(data)
				{
					var obj = data;
				    $.each(JSON.parse(obj), function(i , elm) {
				      $(".all_btns").each(function(index, element) {
                         if( elm.scrbtn_btn_code == $(this).val())
						     $(this).prop("checked",true); 
                     });
 				   });
				}
			});
		}
     </script>