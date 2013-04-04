<?php
function ansimuz_admin_head(){
?>
<link rel='stylesheet' id='ansimuz-admin-css' href='<?php echo ANSIMUZ_THEME_DIR; ?>/functions/css/admin.css' type='text/css' media='all' />
<link rel='stylesheet' id='ansimuz-admin-css' href='<?php echo ANSIMUZ_THEME_DIR; ?>/functions/css/checkbox.css' type='text/css' media='all' />
<link rel='stylesheet' id='ansimuz-prettyphoto-css' href='<?php echo ANSIMUZ_THEME_DIR; ?>/functions/scripts/prettyPhoto/css/prettyPhoto.css' type='text/css' media='all' />



<script type="text/javascript" src="<?php echo ANSIMUZ_THEME_DIR; ?>/functions/scripts/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo ANSIMUZ_THEME_DIR; ?>/functions/scripts/ajaxupload.js"></script>


<script type="text/javascript" src="<?php echo ANSIMUZ_THEME_DIR; ?>/functions/scripts/jquery.miniColors-0.1/jquery.miniColors.min.js"></script>

<link rel='stylesheet' id='ansimuz-admin-css' href='<?php echo ANSIMUZ_THEME_DIR; ?>/functions/scripts/jquery.miniColors-0.1/jquery.miniColors.css' type='text/css' media='all' />

<script type="text/javascript">
	jQuery(document).ready(function() {
						
			jQuery('.ansimuz_super_check').checkbox({empty:'<?php echo ANSIMUZ_THEME_DIR; ?>/functions/css/empty.png'});
				
			//Check if element exists
			jQuery.fn.exists = function(){return jQuery(this).length;}
			
			
			// color picker
			jQuery(".colorpicker").miniColors({
							
				change: function(hex, rgb) {
					jQuery("#console").prepend('HEX: ' + hex + ' (RGB: ' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ')<br />');
				}
				
			});

		  	//AJAX upload
			jQuery('.ansimuz_upload').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).prev();
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'ansimuz_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								var image_preview='<img src="' + response + '" class="ansimuz_image_preview" />';							
								
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button ansimuz_remove" id="'+remove_button_id+'">Remove Image</span>');
									}
								
								
								the_button.next().next().html(image_preview);
							}
								
								
							
						}
				});
			});
			
			//AJAX image remove
			jQuery('.ansimuz_remove').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'ansimuz_ajax_remove',
					data: image_remove_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.prev().prev().val('');
					remove_button.next().html('');
					remove_button.remove();
				});
				
			});
			
			
			init_slider();
			//AJAX upload slider (uses timthumb to make the pic fit)
			function init_slider(){
			jQuery('.ansimuz_upload_slider').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).parent().children('.input-img-url');
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'ansimuz_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								
								// Apply timthumb
								response = "<?php echo ANSIMUZ_THEME_DIR . "/php/timthumb.php?src=" ?>"+response+ "&w=100&h=98";
								
								var image_preview='<img src="' + response + '" class="ansimuz_image_preview" />';							
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button ansimuz_remove_slider" id="'+remove_button_id+'">Remove Image</span>');
									}
																	
								// display the preview
								the_button.parent().next().html(image_preview);
							}
								
								
							
						}
				});
			});
			};

			
			
			//AJAX image remove Slider
			jQuery('.ansimuz_remove_slider').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'ansimuz_ajax_remove',
					data: image_remove_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.parent().children('.input-img-url').val('');
					remove_button.parent().next().html('');
					remove_button.remove();
				});
				
			});
			
			
			// sortable table for manager
			
			// Return a helper with preserved width of cells
			var fixHelper = function(e, ui) {
			    ui.children().each(function() {
			        jQuery(this).width(jQuery(this).width());
			    });
			    return ui;
			};
			
			jQuery('#sort-table tbody').sortable({
				helper: fixHelper,
				cursor: 'move'
			});
			
			
			


}); // jquery ready	



</script>
<?php
}
?>