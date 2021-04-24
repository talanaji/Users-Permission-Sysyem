<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2017 &copy; <a href="https://khamsat.com/user/mismail" target="_BLANK">Mismail</a> ,<a href="https://supersanp.com" target="_BLANK">SuperSnap</a>   </p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
<!--    <script src="<? //=base_url()?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>-->
    <script src="<?=base_url()?>public/dist/js/select2.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="<?=base_url()?>public/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>public/dist/js/dataTables-data.js"></script>
 	
	<!-- simpleWeather JavaScript -->
	<script src="<?=base_url()?>public/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="<?=base_url()?>public/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="<?=base_url()?>public/dist/js/simpleweather-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="<?=base_url()?>public/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?=base_url()?>public/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?=base_url()?>public/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="<?=base_url()?>public/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?=base_url()?>public/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="<?=base_url()?>public/vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>public/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>public/vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="<?=base_url()?>public/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
 <!-- Moment JavaScript -->
		<script type="text/javascript" src="<?=base_url()?>public/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
		
		<!-- Bootstrap Colorpicker JavaScript -->
		<script src="<?=base_url()?>public/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
				
		<!-- Bootstrap Datetimepicker JavaScript -->
 		<script type="text/javascript" src="<?=base_url()?>public/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js">
 </script>
		<!-- Bootstrap Daterangepicker JavaScript -->
		<script src="<?=base_url()?>public/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		
		<!-- Form Picker Init JavaScript -->
		<script src="<?=base_url()?>public/dist/js/form-picker-data.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?=base_url()?>public/dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="<?=base_url()?>public/dist/js/dropdown-bootstrap-extended.js"></script>
	<!-- Init JavaScript -->
	<script src="<?=base_url()?>public/dist/js/init.js"></script>
	<script>
		function previewImages() {

		  var preview = document.querySelector('#image_preview');
			while (preview.hasChildNodes()) {   
				preview.removeChild(preview.firstChild);
			}
		  if (this.files) {
			[].forEach.call(this.files, readAndPreview);
		  }

		  function readAndPreview(file) {
			 
			// Make sure `file.name` matches our extensions criteria
			if (!/\.(jpe?g|png|gif|doc|pdf|docx|xls|txt)$/i.test(file.name)) {
			  return alert(file.name + " is not an image");
			} // else...

			var reader = new FileReader();

			reader.addEventListener("load", function() {
			  var image = new Image();
			  image.height = 100;
			  image.title  = file.name;
			  image.src    = this.result;
			  preview.appendChild(image);      
				// preview.html("<div id='" + file.name + "' class='removeimg'  style='left:0; top:0'>x</div>"); 
			}, false);

			reader.readAsDataURL(file);

		  }

		}
		
		document.querySelector('#file').addEventListener("change", previewImages, false);


		$(document).ready(function() 
		 {
			$(document).on('click','.photo_main',function(){	
 				if(confirm('<?php echo $this->lang->line("are_you_sure");?>'))
					{
						 var s_code = $(this).parent().parent().attr('S_code');
						 var Rcus = $(this).parent().parent().attr('rcu');
					  	 var ismain = 0;
						   if($(this).is(":checked"))
							  ismain = 1
							  else
							  ismain = 0;
						  var  prefix = _PREFIX();
						$.ajax({
							url : 'common/set_photo_main' , 
							type: 'POST' , 
							data: {random:Math.random() ,
							  S_code : s_code , 
							  is_main : ismain , 
							  prefix_type : prefix, 
							  rcu         : Rcus
 							 },
							success: function(data)
							{
 								fetch_per_params('common/fetch_this_photos' , '#this_photos'  , Rcus , _PREFIX());// fetch all photos
 							}
						});
					}
			 });
		    $(document).on('click','.photo_slider',function(){	
 		    	if(confirm('<?php echo $this->lang->line("are_you_sure");?>'))
					{
						 var s_code = $(this).parent().parent().attr('S_code');
						 var Rcus = $(this).parent().parent().attr('rcu');
						 var Pcode = $(this).parent().parent().attr('P_code');
					  	 var isslider = 0;
						   if($(this).is(":checked"))
							  isslider = 1
							  else
							  isslider = 0;
						  var  prefix = _PREFIX();
						$.ajax({
							url : 'common/set_photo_slider' , 
							type: 'POST' , 
							data: {random:Math.random() ,
							  S_code : s_code , 
							  is_slider : isslider , 
							  prefix_type : prefix, 
							  rcu         : Rcus , 
							  P_code      : Pcode
 							 },
							success: function(data)
							{
 								fetch_per_params('common/fetch_this_photos' , '#this_photos'  , Rcus , _PREFIX());// fetch all photos
 							}
						});
					}
			 });
			$(document).on('click','.photo_active',function(){	
						if(confirm('<?php echo $this->lang->line("are_you_sure");?>'))
							{
								 var s_code = $(this).parent().parent().attr('S_code');
								 var actives = 0;
								   if($(this).is(":checked"))
									  actives = 1
									  else
									  actives = 0;
								  var  prefix = _PREFIX();
								$.ajax({
									url : 'common/set_photo_active' , 
									type: 'POST' , 
									data: {random:Math.random() ,
									  S_code : s_code , 
									  active : actives  
									 },
									success: function(data)
									{
										fetch_per_params('common/fetch_this_photos' , '#this_photos'  , Rcus , _PREFIX());// fetch all photos
									}
								});
							}
					 });
					  
			$(document).on('click','.Del_photo',function(){
							var pk = $(this).attr('title');
							var rcu = $(this).attr('rcu'); // FK for item in subject photo
							if(confirm('<?php echo $this->lang->line("Confirm_del");?>'))
							{
								$.ajax({
									url : 'common/del_this_photo/'+pk + '/'+rcu + '/'+ _PREFIX(), 
									type: 'POST' , 
									data: {random:Math.random() 
									 },
									success: function(data)
									{
										alert(data);
										fetch_per_params('common/fetch_this_photos' , '#this_photos'  , rcu , _PREFIX());// fetch all photos
									}
								});
							}
							else{alert('<?php echo $this->lang->line("cancel_Confirm_del");?>');}
						}); // Photo Delete Event for all 
	     });
	 
			function imageIsLoaded(e) {
					$("#file").css("color","#f90");
					$('#image_preview').css("display", "block");
					$('#previewing').attr('src', e.target.result);
					$('#previewing').attr('width', '100px');
					$('#previewing').attr('height', '100px');
					}
		function showSelectsd(selector_id){
			var selO = document.getElementsByName(selector_id)[0];
			var selValues = [];
			for(i=0; i < selO.length; i++){
				if(selO.options[i].selected){
					selValues.push(selO.options[i].value);
				}
			}
		}
			 
     </script>
 </body>

</html>
