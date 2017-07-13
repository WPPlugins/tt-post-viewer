<?php

function generate_textfields($key, $name, $class_name, $TT_Viewer_obj){
    
    $size = (substr_compare($key['field-id'],'number',-6,6)==0) ? '3' : '';
    $type = (substr_compare($key['field-id'],'number',-6,6)==0) ? 'number' : 'text';
    if ($type == "number"){$limit = "min='0' max='1000'";}else{$limit = "";} 
    if( $key['field-id'] == 'ttpv_txt_bydate_widget_datepick1' or
	$key['field-id'] == 'ttpv_txt_bydate_widget_datepick2' or
	$key['field-id'] == 'ttpv_txt_bydate_shortcode_datepick1' or
	$key['field-id'] == 'ttpv_txt_bydate_shortcode_datepick2' or
	$key['field-id'] == 'ttpv_txt_bydate_bopost_datepick1' or
	$key['field-id'] == 'ttpv_txt_bydate_bopost_datepick2'){
	$class_name = "MyDate";
	$size = '8';
        $id = $key['id'];
    }
    echo "<input name='$name'
            type='$type'
            size='$size'
            class='$class_name'"
            .$id=(isset($id)? "id='".$id."' " : " ")
            ."value='{$TT_Viewer_obj->options[$key['field-id']]}'"
            .$limit
            ."/>";  
}


function generate_checkboxes($key, $name, $class_name, $TT_Viewer_obj){
    ?>
    <input name= '<?php echo $name; ?>'
    type='checkbox'
    class = '<?php echo $class_name; ?>'
    onclick='hideandshow(<?php echo  json_encode(".".$key['class']); ?>)'
    <?php checked($TT_Viewer_obj->options[$key['field-id']],'on'); ?>
    />
    <?php
}

function generate_dropdownbox($key, $name, $class_name, $TT_Viewer_Obj){
    
    $select_str = substr($key['field-id'],20);
    $multiple = "multiple=multiple";
    $new_list = array();
    
    if (substr_compare($key['field-id'],'authors',-7,7)==0){
	$items = array();
        $authors = get_authors_list();
        foreach ($authors as $author){
            array_push($items, $author->user_login);
        }
        $name = $name."[]";
    }
    elseif(substr_compare($key['field-id'],'postdisplay',-11,11)==0){
	$items = array('List','Thumbnail');
        $multiple = "";
    
    }elseif(substr_compare($key['field-id'],'category',-8,8)==0){
        
        
        $items = get_category_lists();        
        //$items = array('Any','Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5');
        $name = $name."[]";
    
    
    }elseif(substr_compare($key['field-id'],'excerpt',-7,7)==0){
	$items = array("Yes", "No");
	$multiple="";
	
    }
//////////////////////////////////////////////////////////////////    
    if( ($multiple != "") && empty($TT_Viewer_Obj->options[$key['field-id']]) ){
       $TT_Viewer_Obj->options[$key['field-id']][] = $items[0];

    } 
    $new_list = $TT_Viewer_Obj->options[$key['field-id']]; 
////////////////////////////////////////////////////////////////    
    echo "<select $multiple name='$name' class='$class_name'>";
    foreach ($items as $item){
	
        
        
        if($multiple == ""  && isset($TT_Viewer_Obj->options[$key['field-id']])){
            $selected = ($TT_Viewer_Obj->options[$key['field-id']] == $item) ? 'selected="selected"' : '';
        }elseif($multiple != "") {
            $selected = (in_array($item, $new_list)) ? 'selected="selected"' : '';
        }
        echo "<option value='$item' $selected>$item</option>";
    }			
    echo "</select>";
}

function ttpv_display_metabox($metaname, $pagename){
    settings_fields('ttpv_plugin_options');
    if($metaname == 'generalsettings'){
	?>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_sidebar_thumbnail_settings_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_postarea_thumbnail_settings_section'); ?> </tbody></table>

	<?php
    }
    elseif($metaname == 'recentpost'){
	
        ?>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_recentpost_title_section'); ?> </tbody></table>
	
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_recentpost_widget_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_recentpost_shortcode_section'); ?> </tbody></table>
		
	<?php
        
    }elseif($metaname == 'mostpopular'){
        
        ?>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostpopular_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostpopular_widget_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostpopular_shortcode_section'); ?> </tbody></table>
	
	<?php    
    }elseif($metaname == 'mostcommented'){
        
        ?>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostcommented_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostcommented_widget_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_mostcommented_shortcode_section'); ?> </tbody></table>
	
	<?php    
    }elseif($metaname == 'related'){
        
        ?>
        <label class='notice'>Related Posts will only be applicable on single post and pages</label>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_related_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_related_widget_section'); ?> </tbody></table>
        <table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_related_shortcode_section'); ?> </tbody></table>
      
        <?php    
    }elseif($metaname == 'featured'){
        
        ?>
        
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_featured_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_featured_widget_section'); ?> </tbody></table>
        <table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_featured_shortcode_section'); ?> </tbody></table>
       
        <?php    
    }elseif($metaname == 'authors'){
        
        ?>
        
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_authors_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_authors_widget_section'); ?> </tbody></table>
        <table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_authors_shortcode_section'); ?> </tbody></table>
        	
        <?php    
    }elseif($metaname == 'category'){
        
        ?>
        
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_category_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_category_widget_section'); ?> </tbody></table>
        <table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_category_shortcode_section'); ?> </tbody></table>
        		
        <?php    
    }elseif($metaname == 'bydate'){
        
        ?>
	<table class='form-table'><tbody> <?php do_settings_fields($pagename,'ttpv_bydate_title_section'); ?> </tbody></table>
	<table class='form-table'><tbody class='bydatewidget'> <?php do_settings_fields($pagename,'ttpv_bydate_widget_section'); ?> </tbody></table>
        <table class='form-table'><tbody class='bydateshortcode'> <?php do_settings_fields($pagename,'ttpv_bydate_shortcode_section'); ?> </tbody></table>
       
	<?php
    }
}

/* This function generates a list of all categories to be used for dropdown box */
function get_category_lists(){
    $categories = array();
    $catlist = array("Any");
    $categories = get_categories();
    $i=1;
        
    foreach ($categories as $cat){
        $catlist[$i++] = $cat->cat_name;
    }
    return $catlist;
}

/* This function will generate an array of category ID for all available categories. This array will be used for query */
function get_categories_id($categorylist){
    $catid = array();
    $categories = explode(",", $categorylist);
                    
    foreach($categories as $catlist){
        array_push($catid, get_cat_ID($catlist));
    }
    
    return $catid;    
}

function get_authors_list(){
    $excluded_user = get_users(array('role'=>'subscriber'));
    $excluded_user_id = array();
    foreach($excluded_user as $user){
        array_push($excluded_user_id, $user->ID);
    }
    $authors_list = get_users(array('exclude' => $excluded_user_id));
    $temp = new WP_User();
    $temp->user_login = "Any";
    $temp->ID = 0;
    array_unshift($authors_list, $temp);

    return $authors_list;
}

function get_authors_id($authors){
    $author_id_arr = array();
    
    foreach( $authors as $author_login ){

	$user = get_user_by( 'login', $author_login );
	array_push($author_id_arr,$user->ID);
    }
    $author_id = implode(',', $author_id_arr);
    return $author_id;
}

function string_limit_words($string, $word_limit){
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function set_thumbnail_size($ttpvObj){
        
	if ( function_exists( 'add_image_size' )) {
	    if(!empty($ttpvObj->options['ttpv_txt_sidebar_thumbnail_width_number'])
	    && !empty($ttpvObj->options['ttpv_txt_sidebar_thumbnail_height_number'])){
		add_image_size('sidebar-thumb',
				$ttpvObj->options['ttpv_txt_sidebar_thumbnail_width_number'],
				$ttpvObj->options['ttpv_txt_sidebar_thumbnail_height_number'], true);
	    }
		
	    if(!empty($ttpvObj->options['ttpv_txt_postarea_thumbnail_width_number'])
	    && !empty($ttpvObj->options['ttpv_txt_postarea_thumbnail_height_number'])){
		add_image_size('postarea-thumb',
				$ttpvObj->options['ttpv_txt_postarea_thumbnail_width_number'],
				$ttpvObj->options['ttpv_txt_postarea_thumbnail_height_number'], true);
	    }
		
	    if(!empty($ttpvObj->options['ttpv_txt_bopost_thumbnail_width_number'])
	    && !empty($ttpvObj->options['ttpv_txt_bopost_thumbnail_height_number'])){
		add_image_size('bopost-thumb',
				$ttpvObj->options['ttpv_txt_bopost_thumbnail_width_number'],
				$ttpvObj->options['ttpv_txt_bopost_thumbnail_height_number'], true);
	    }
	}

}


function ttpv_set_post_views($postID){
    
    $count_key = 'ttpv_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function ttpv_track_post_views ($post_id){
    
    if (!is_single()) return;
    if (empty($post_id)){
	global $post;
        $post_id = $post->ID;    
    }
    ttpv_set_post_views($post_id);
}
add_action( 'wp_head', 'ttpv_track_post_views');

function ttpv_get_post_views($postID){
    $count_key = 'ttpv_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return '<span id="view-count"> ' . $count.' Views' . '</span>';
}

?>
