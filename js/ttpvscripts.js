
jQuery( document ).ready( function( $ ) {

	// close postboxes that should be closed
        $( '.if-js-closed' ) .removeClass( 'if-js-closed' ).addClass( 'closed' );

	// postboxes setup
	postboxes.add_postbox_toggles( '<?php echo $options_page; ?>' );
        
        jQuery('.MyDate').datepicker({
		dateFormat : 'dd-mm-yy'
        });
        
	jQuery('.inside').ready(function() {
		jQuery('.inside').find('table').each( function() {
			var selector = ".".concat(jQuery(this).find(':checkbox').attr('class'));
			hideandshow(selector);	
		});
	} );
	
		
});


function hideandshow(selector) {
		
                var len = selector.length;
                var selectedclass = selector.slice(0,len-4);
		var checked = jQuery(selector).attr('checked');
                var sub = selector.slice(len-10,len);

		if (checked){
			jQuery(selectedclass).show();
			if (selectedclass == ".bydate-widget") {
				jQuery('.bydatewidget .MyDate').show();
			}else if (selectedclass == ".bydate-shortcode") {
				jQuery('.bydateshortcode .MyDate').show();
			}else if (selectedclass == ".bydate-bopost") {
				jQuery('.bydatebopost .MyDate').show();
			}			
		}else{
			jQuery(selectedclass).hide();
			if (selectedclass == ".bydate-widget") {
				jQuery('.bydatewidget .MyDate').hide();
			}else if (selectedclass == ".bydate-shortcode") {
				jQuery('.bydateshortcode .MyDate').hide();
			}else if (selectedclass == ".bydate-bopost") {
				jQuery('.bydatebopost .MyDate').hide();
			}
                }
};

