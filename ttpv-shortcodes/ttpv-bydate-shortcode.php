<?php
add_action( 'init', 'register_bydate_shortcodes');
function register_bydate_shortcodes(){
    
    global $opt_val, $bydate_catstr, $bydate_authstr;

    if($opt_val['ttpv_chk_bydate_shortcode'] == 'on'){
        
        if($opt_val['ttpv_drp_bydate_shortcode_category'][0] != "Any"){
            $catid = get_categories_id(implode(",",($opt_val['ttpv_drp_bydate_shortcode_category'])));
            $bydate_catstr = implode(",", $catid);    
        }
    
        if($opt_val['ttpv_drp_bydate_shortcode_authors'][0]!="Any"){
            $bydate_authstr = get_authors_id($opt_val['ttpv_drp_bydate_shortcode_authors']);
        }
        add_shortcode('ttpv-bydate', 'bydateposts_function');
    }
}

function bydateposts_function($atts){
    global $opt_val, $bydate_catstr, $bydate_authstr;
    
    $postnum = empty($opt_val['ttpv_txt_bydate_shortcode_number']) ? 10 : $opt_val['ttpv_txt_bydate_shortcode_number'];
    $length = empty($opt_val['ttpv_txt_bydate_shortcode_excerpt_number']) ? 10 : $opt_val['ttpv_txt_bydate_shortcode_excerpt_number'];
        
    extract(shortcode_atts(array(
                                'posts' => $postnum,
                                'cats' => $bydate_catstr,
                                'auths' => $bydate_authstr,
                                'disp' => $opt_val['ttpv_drp_bydate_shortcode_postdisplay'],
                                'title' => $opt_val['ttpv_txt_bydate_title'],
                                'exrpt' => $opt_val['ttpv_drp_bydate_shortcode_excerpt'],
                                'exrptlen' => $length,
                                'from_date' => $opt_val['ttpv_txt_bydate_shortcode_datepick1'],
                                'to_date' => $opt_val['ttpv_txt_bydate_shortcode_datepick2']
                            ), $atts));
    
    $from_arr = explode("-", $from_date);
    $to_arr = explode("-", $to_date);
    
    $output_str = "";
        
    $output_str = '<div class="shortcode-area">';
    
        if(!empty($title)){
            $output_str .= "<h2>" . $title . "</h2>";
        }else{
            $output_str .= "<h2>Posts from " .$from_date. " to " . $to_date . " </h2>";
        }
        
        $output_str .= "<ul>";
        
            $parameters = array(
				'date_query' => array(
					array(
						'after'    => array(
							'year'  => $from_arr[2],
							'month' => $from_arr[1],
							'day'   => $from_arr[0]
						),
						'before'    => array(
							'year'  => $to_arr[2],
							'month' => $to_arr[1],
							'day'   => $to_arr[0]
						),
						'inclusive' => true,
					),
				),
				'posts_per_page' => $posts,
				'ignore_sticky_posts' => 1,
				'author' => $auths,
				'cat' => $cats,
				'orderby' => 'date',
				'order' => 'DESC'
			);
            
            $bydate_posts = new WP_Query( $parameters );
                        
            while ($bydate_posts->have_posts()){
                $bydate_posts->the_post();
                
                $output_str .= "<li>";
                
                if(strtolower($disp) == "thumbnail"){
                    $output_str .= "<div class='shortcode-thumb'>";
                    if(has_post_thumbnail()){
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($bydate_posts->ID),
                                                           'postarea-thumb', false, '' );
                        $output_str .= "<a href='" . get_permalink() . "'><img src='".$src[0]."' /></a>";        
                    }else{
                        $output_str .= "<a href='" . get_permalink() . "'>";
                        
                        $output_str .= "<img src='". plugins_url( 'tt-post-viewer/images/default-image.png') . "' "
                                        . "width='". $opt_val['ttpv_txt_postarea_thumbnail_width_number'] ."'"
                                        . "height='". $opt_val['ttpv_txt_postarea_thumbnail_height_number'] ."' /></a>";
                    }
                    $output_str .= "</div>";
                }    
                $output_str .= "<div class='shortcode-title'><a href='" . get_permalink($bydate_posts->ID). "' title= '" . esc_attr(get_the_title()). "' >" . get_the_title() . "</a>";
                
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
}

?>