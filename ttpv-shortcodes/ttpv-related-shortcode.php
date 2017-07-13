<?php
add_action( 'init', 'register_related_shortcodes');
function register_related_shortcodes(){
    
    global $opt_val, $related_catstr, $related_authstr;

    if($opt_val['ttpv_chk_related_shortcode'] == 'on'){
        add_shortcode('ttpv-related', 'relatedposts_function');      
    }
}

function relatedposts_function($atts){
    global $opt_val;
    
    $postnum = empty($opt_val['ttpv_txt_related_shortcode_number']) ? 10 : $opt_val['ttpv_txt_related_shortcode_number'];
    $length = empty($opt_val['ttpv_txt_related_shortcode_excerpt_number']) ? 10 : $opt_val['ttpv_txt_related_shortcode_excerpt_number'];
    
    extract(shortcode_atts(array(
                                'posts' => $postnum,
                                'disp' => $opt_val['ttpv_drp_related_shortcode_postdisplay'],
                                'title' => $opt_val['ttpv_txt_related_title'],
                                'exrpt' => $opt_val['ttpv_drp_related_shortcode_excerpt'],
                                'exrptlen' => $length
                            ), $atts));

    global $post;  
    $tags = wp_get_post_tags($post->ID);

    if($tags){
	$tag_ids = array();  
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$output_str = "";
	
	$output_str = '<div class="shortcode-area">';
	
	if(!empty($title)){
	    $output_str .= "<h2>" . $title . "</h2>";
	}else{
	    $output_str .= "<h2>Related Posts</h2>";
	}
	
	$output_str .= "<ul>";
	    $parameters = array(    'posts_per_page' => $posts,
				    'ignore_sticky_posts' => 1,
				    'tag__in' => $tag_ids,  
				    'post__not_in' => array($post->ID)  
				    );  
	
	    $related_posts = new WP_Query( $parameters );
	    while ($related_posts->have_posts()){
		
		$related_posts->the_post();
		
		$output_str .= "<li>";
		
		if(strtolower($disp) == "thumbnail"){
		    $output_str .= "<div class='shortcode-thumb'>";
		    if(has_post_thumbnail()){
			$src = wp_get_attachment_image_src( get_post_thumbnail_id($related_posts->ID),
							   'postarea-thumb', false, '' );
			$output_str .= "<a href='" . get_permalink() . "'><img src='".$src[0]."' />"."</a>";        
		    }else{
			$output_str .= "<a href='" . get_permalink() . "'>";
			$output_str .= "<img src='". plugins_url( 'tt-post-viewer/images/default-image.png') . "' "
					. "width='". $opt_val['ttpv_txt_postarea_thumbnail_width_number'] ."'"
					. "height='". $opt_val['ttpv_txt_postarea_thumbnail_height_number'] ."' />"."</a>";
		    }
		    $output_str .= "</div>";
		}
		$output_str .= "<div class='shortcode-title'><a href='" . get_permalink($related_posts->ID). " title= '" . esc_attr(get_the_title()). " >" . get_the_title() . "</a>";
		
		if(strtolower($exrpt)=="yes"){
                    $output_str .= "<p>" . string_limit_words(get_the_excerpt(), $exrptlen)." <a id='more' href='". get_permalink() ."'>[more]</a>";
                }
		$output_str .= "</p></div>";
		$output_str .= "</li>";
	    }
	    wp_reset_query();
	$output_str .= "</ul>";
	$output_str .= "</div>";
	return $output_str;
	
    }//End of if($tags)
}
?>