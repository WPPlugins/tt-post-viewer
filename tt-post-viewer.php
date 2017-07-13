<?php

/*
  Plugin Name: TT Post Viewer Plugin
  Plugin URI: http://www.technologiestoday.com.au/guide-to-use-tt-post-viewer-plugin-for-wordpress-2/
  Description: Displays Recent Posts, Most Popular Posts, Most Commented Posts, Featured Posts, Related Posts, Posts by Authors, Posts by Categories, Posts by Date. Posts can be displayed in widget area or post or page content area. 
  Tags: post, posts, widget, thumbnail, shortcode, excerpt, latest, recent, commented, related, popular, sidebar, sidebar widget, plugin, related post, popular post, post by date, post by author, post by category, list, comments, images, image
  Author: Rashed Latif
  Author URI: http://www.technologiestoday.com.au/rashed-latif
  Donate link: http://www.technologiestoday.com.au/donate
  Requires at least: 3.0.1
  Tested up to: 4.0
  Version: 1.0
*/

error_reporting(0); 
include dirname( __FILE__ ) .'/includes.php';

class TT_PostViewer{
		
	public function __construct(){
		$this->add_featured_meta();//\\
		$this->field_array = array();
		$this->load_scripts_and_styles();
		$this->get_option_values();
		$this->options = $this->get_option_values();
		$this->register_settings_and_fields();
		$this->initiate_helpscreen_and_metaboxes();
	}
	public function add_featured_meta(){
		add_action( 'add_meta_boxes', array($this, 'ttpv_featured_meta' ));
		add_action( 'save_post', array($this, 'ttpv_meta_save') );
	}
	
	public function ttpv_featured_meta() {
		add_meta_box( 'ttpv_meta', __( 'Featured Post', 'ttpv-textdomain' ), array($this, 'ttpv_featured_meta_callback'), 'post' );
	}
	
	function ttpv_featured_meta_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'ttpv_nonce' );
		$ttpv_stored_meta = get_post_meta( $post->ID );
		?>
		<p>
		
		<div class="ttpv-row-content">
			<label for="featured-checkbox">
				<input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $ttpv_stored_meta['featured-checkbox'] ) ) checked( $ttpv_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
				<?php _e( 'Select as Featured Post', 'ttpv-textdomain' )?>
			</label>
		</div>
		</p>
 	<?php
	}
	
	public function ttpv_meta_save( $post_id ) {
 
		// Checks save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'ttpv_nonce' ] ) && wp_verify_nonce( $_POST[ 'ttpv_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	 
		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		    return;
		}
	 
		// Checks for input and saves
		if( isset( $_POST[ 'featured-checkbox' ] ) ) {
			update_post_meta( $post_id, 'featured-checkbox', 'yes' );
		} else {
			update_post_meta( $post_id, 'featured-checkbox', '' );
		}
 
	
	}
	
	public function get_option_values(){
		return get_option('ttpv_plugin_options');
	}
	
	public function load_scripts_and_styles(){
		require_once('initialize-default-values.php');		
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-style', plugins_url('jquery-ui.css',__FILE__));
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_script('ttpvscripts', plugins_url('js/ttpvscripts.js',__FILE__));
	}
	
	public function add_menu_page(){
		global $option_page;
		$option_page = add_options_page('Post Viewer Options', 'Post Viewer Options', 'administrator', __FILE__, array('TT_PostViewer','display_option_page'));		
	}
	
		
	public function display_option_page(){
	?>
	<div class="wrap">
		
		<?php screen_icon(); ?>
		<h2>Post Viewer Options</h2>
		<form method="post" name="ttpvform" action="options.php">
			<div id="poststuff" class="metabox-holder">
				<div id="post-body">
					<div id="post-body-content">
					<?php do_meta_boxes( $options_page, 'advanced', 'ttpv_plugin_options' ) ; ?>
					</div>
				</div>
				<br class="clear"/>
			</div      
			<p class="submit">	
				<input name="submit" type="submit" class="button-primary" value="Save Changes" />	
			</p>
		</form>
            
        </div>
	
	<?php
	}
		
	public function register_settings_and_fields(){
		
		$this->field_array = load_field_details();
		register_setting('ttpv_plugin_options', 'ttpv_plugin_options'); //3rd Param is options CB --> 2nd param is used to access this option
		foreach ($this->field_array as $field=>$key){	
				add_settings_field($key['field-id'],$key['field-title'],array($this,'generate_settings_field'),__FILE__,$key['section'],$key);	
		}
	}
	
	public function generate_settings_field($key){
		
		$field_type = substr($key['field-id'],5,3);
		$name = "ttpv_plugin_options[" . $key['field-id']."]";
		$class_name = $key['class'];
				
		if($field_type == 'txt'){
			generate_textfields($key, $name, $class_name, $this);				
		}elseif($field_type == 'chk'){
			generate_checkboxes($key, $name, $class_name, $this);
		}elseif($field_type == 'drp'){
			generate_dropdownbox($key, $name, $class_name, $this);
		}
	}
	
	public function ttpv_main_section_cb(){
		//optional
	}
	
	/*Creates help screen and displays metaboxes*/
	public function initiate_helpscreen_and_metaboxes(){
		global $option_page;
		add_action('load-'.$option_page, 'add_helpscreen_and_metaboxes');
		
		function add_helpscreen_and_metaboxes(){
			$screen = get_current_screen();
			if($screen->id == "settings_page_tt-post-viewer/tt-post-viewer"){
				wp_enqueue_style('tt-post-viewer-style', plugins_url('tt-post-viewer.css',__FILE__));	
			}
			$screen->add_help_tab( array(
					'id'       => 'ttpv-plugin-help-instructions',
					'title'    => 'Instructions',
					'callback' => 'ttpv_plugin_help_instructions',
				) );
			$screen->add_help_tab( array(
					'id'       => 'ttpv-plugin-help-faq',
					'title'    => 'FAQ',
					'callback' => 'ttpv_plugin_help_faq',
				) );

			$screen->set_help_sidebar( '<p>This is the sidebar content</p>' );
			add_meta_box('ttpv_generalsettings_meta_box', 'General Settings', 'ttpv_generalsettings_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_recentpost_meta_box', 'Recent Posts', 'ttpv_recentpost_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_mostpopular_meta_box', 'Most Popular Posts', 'ttpv_mostpopular_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_mostcommented_meta_box', 'Most Commented Posts', 'ttpv_mostcommented_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_related_meta_box', 'Related Posts', 'ttpv_related_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_featured_meta_box', 'Featured Posts', 'ttpv_featured_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_authors_meta_box', 'Posts by Authors', 'ttpv_authors_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_category_meta_box', 'Posts by Categories', 'ttpv_category_display_metabox', $option_page, 'advanced', 'core');
			add_meta_box('ttpv_bydate_meta_box', 'Posts By Date', 'ttpv_bydate_display_metabox', $option_page, 'advanced', 'core');
			
			
		}
		
		function ttpv_plugin_help_instructions() {
			$str = help_string();
			echo "<p>" . help_string() . "</p>";
		}

		function ttpv_plugin_help_faq() {
			echo "<p>No Frequently asked questions listed yet.</p>";
		}
		
		function ttpv_generalsettings_display_metabox(){
			ttpv_display_metabox('generalsettings',__FILE__);
		}
		
		function ttpv_recentpost_display_metabox(){
			ttpv_display_metabox('recentpost',__FILE__);
		}
		
		function ttpv_mostpopular_display_metabox(){
			ttpv_display_metabox('mostpopular', __FILE__);
		}
		function ttpv_mostcommented_display_metabox(){
			ttpv_display_metabox('mostcommented', __FILE__);
		}
		function ttpv_related_display_metabox(){
			ttpv_display_metabox('related', __FILE__);
		}
		function ttpv_featured_display_metabox(){
			ttpv_display_metabox('featured', __FILE__);
		}
		function ttpv_authors_display_metabox(){
			ttpv_display_metabox('authors', __FILE__);
		}
		function ttpv_category_display_metabox(){
			ttpv_display_metabox('category', __FILE__);
		}
		function ttpv_bydate_display_metabox(){
			ttpv_display_metabox('bydate', __FILE__);
		}
	}	
}

add_action( 'wp_enqueue_scripts', 'load_stylesheet' );
function load_stylesheet(){
	wp_enqueue_style('ttpv-style', plugins_url('ttpv-style.css',__FILE__));
}

add_action('admin_menu', 'initiate_menu_page');
function initiate_menu_page(){
	TT_PostViewer::add_menu_page();
}

add_action('admin_init', 'initiate_ttpv_object');
function initiate_ttpv_object(){
	$ttpvObj = new TT_PostViewer();
	set_thumbnail_size($ttpvObj);
}



?>