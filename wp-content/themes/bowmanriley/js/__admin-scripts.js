jQuery(document).ready(function() {
 
var wp_media_post_id = wp.media.model.settings.post.id;

jQuery('.attachment-select').on('click',function(e){
	e.preventDefault();
	var set_to_post_id = jQuery(this).attr('data-postid');
	var parent = jQuery(this).parents('td');
	var custom_uploader;

	 if (custom_uploader) {
				custome_uploader.uploader.uploader.param('post_id',set_to_post_id);
	            custom_uploader.open();
	            return;
	        } else {
				wp.media.model.settings.post.id = set_to_post_id;
			}

			 //Extend the wp.media object
	        custom_uploader = wp.media.frames.file_frame = wp.media({
	            title: 'Choose File',
	            button: {
	                text: 'Choose File'
	            },
	            multiple: false
	        });

	         custom_uploader.on('select', function() {
	
	            attachment = custom_uploader.state().get('selection').first().toJSON();
	            //console.log(attachment);
	            //console.log(attachment.sizes['square-tn']['url'])

	            jQuery('input.attachment-id',parent).val(attachment.id);
				jQuery('input.attachment-url',parent).val(attachment.filename);
				jQuery('.attachment-icon',parent).show().attr('src',attachment.sizes['square-tn']['url']);
				
				wp.media.model.settings.post.id = wp_media_post_id;
			});

	          custom_uploader.open();

	      });
});