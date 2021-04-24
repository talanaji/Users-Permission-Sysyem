			
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
        <form action="<?=base_url()?>permissions" method="post">
             <div class="form-body">
                  <hr class="light-grey-hr"/>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-10">
                                <?=$this->lang->line('User_name');?></label>
                                <select class="form-control" id="u_code" name="u_code" onchange="get_scr_btns(this.value)">
                                    <option value="0" ><?=$this->lang->line('choose');?></option>
                                    <?php foreach($users_res as $usr){?>
                                    <option value="<?=$usr->u_code?>">
										<?=$usr->u_fname .' - ( '. $usr->u_username . ')';?>
                                    </option>
                                    <?php } ?>
                                    
                                </select>
                             </div>
                         </div>  
                   </div>
                    
                   <div class="row">
                   
                   <div class="col-md-12">
                         <h4><?=$this->lang->line('Thescreens');?></h4>
                            <div class="form-group">
                                 <?php foreach($scr_res as $scr){
									    $this->db->where('s_code',$scr->s_code);
										$srow = $this->db->get('screens')->row();
										if($srow->s_active == 1 )
										{
									 ?>
                                 <div class="col-md-6">
                                  <div class="checkbox checkbox-success">
                                  <input id="checkboxscr_<?=$scr->s_code?>" class="all_scrs" name="s_code[]" value="<?=$scr->s_code?>" type="checkbox"  />
                                          <label for="checkboxscr_<?=$scr->s_code?>"><?= $scr->s_name?></label>
                                        </div>
                                 </div>
                                 <?php 
								     } 
								   }?>
                                
                             </div>
                         </div>
                   
                        <div class="col-md-12">
                         <h4><?=$this->lang->line('TheButtons');?></h4>
                            <div class="form-group">
                                 <?php foreach($btn_res as $btn){?>
                                 <div class="col-md-3">
                                      <div class="checkbox checkbox-success">
                                          <input id="checkboxbtn_<?=$btn->b_code?>" class="all_btns" name="b_code[]" value="<?=$btn->b_code?>" type="checkbox"  />
                                          <label for="checkboxbtn_<?=$btn->b_code?>"><?= $btn->b_name?></label>
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
     	function get_scr_btns(v)
		{
			$(".all_btns").prop("checked",false); 
		 if(v != 0 ){
 			$.ajax({
				url:'<?=base_url()?>permissions/get_btn_and_scr_ajax',
				type:'POST',
				data:{
					random:Math.random(),
				    code_post : v 
				},
				success: function(data)
				{
 					var spscr ;
					var spbtn ;
					var obj = data;
				 	var i;
					var j;
				    $.each(JSON.parse(obj), function(i , elm) {
				      $(".all_scrs").each(function(index, element) {
						  spscr = elm.u_scr_priv.split(',');
						  for(i=0; i<=spscr.length;i++)
						  {
							 if(spscr[i]  == $(this).val())
								 $(this).prop("checked",true); 
						  }
                      });
					  
					  $(".all_btns").each(function(index, element) {
						  spbtn = elm.u_btn_priv.split(',');
						  for(j=0; j<=spbtn.length;j++)
						  {
							 if(spbtn[j]  == $(this).val())
								 $(this).prop("checked",true); 
						  }
                      });
					  
					 
 				   });
				}
			});
		  }
		}
     </script>