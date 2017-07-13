<?php
add_action( 'init', 'register_mostpopular_shortcodes');
function register_mostpopular_shortcodes(){
    
    global $opt_val, $popular_catstr, $popular_authstr;

    if($opt_val['ttpv_chk_mostpopular_shortcode'] == 'on'){
        
        if($opt_val['ttpv_drp_mostpopular_shortcode_category'][0] != "Any"){
            $catid = get_categories_id(implode(",",($opt_val['ttpv_drp_mostpopular_shortcode_category'])));
            $popular_catstr = implode(",", $catid);    
        }
    
        if($opt_val['ttpv_drp_mostpopular_shortcode_authors'][0]!="Any"){
            $popular_authstr = get_authors_id($opt_val['ttpv_drp_mostpopular_shortcode_authors']);
        }
        add_shortcode('ttpv-mostpopular', 'popularposts_function');      
    }
}

function popularposts_function($atts){
    global $opt_val, $popular_catstr, $popular_authstr;
    
    $postnum = empty($opt_val['ttpv_txt_mostpopular_shortcode_number']) ? 10 : $opt_val['ttpv_txt_mostpopular_shortcode_number'];
    $length = empty($opt_val['ttpv_txt_mostpopular_shortcode_excerpt_number']) ? 10 : $opt_val['ttpv_txt_mostpopular_shortcode_excerpt_number'];
    
    extract(shortcode_atts(array(
                                'posts' => $postnum,
                                'cats' => $popular_catstr,
                                'auths' => $popular_authstr,
                                'disp' => $opt_val['ttpv_drp_mostpopular_shortcode_postdisplay'],
                                'title' => $opt_val['ttpv_txt_mostpopular_title'],
                                'exrpt' => $opt_val['ttpv_drp_mostpopular_shortcode_excerpt'],
                                'exrptlen' => $length
                            ), $atts));
    
    
    $output_str = "";
        
    $output_str = '<div class="shortcode-area">';
    
        if(!empty($title)){
            $output_str .= "<h2>" . $title . "</h2>";
        }else{
            $output_str .= "<h2>Most Popular Posts</h2>";
        }
        
        $output_str .= "<ul>";
            
            $parameters = array(    'posts_per_page' => $posts,
                                    'cat'=>$cats,
                                    'author' => $auths,
                                    'post__not_in' => get_option( 'sticky_posts' ),
				    'meta_key' => 'ttpv_post_views_count',
                                    'orderby' => 'meta_value_num',
				    'order' => 'DESC'
                                    );  
            $mostpopular_posts = new WP_Query( $parameters );
                        
            while ($mostpopular_posts->have_posts()){
                $mostpopular_posts->the_post();
                
                $output_str .= "<li>";
                
                if(strtolower($disp) == "thumbnail"){
                    $output_str .= "<div class='shortcode-thumb'>";
                    if(has_post_thumbnail()){
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($mostpopular_posts->ID),
                                                           'postarea-thumb', false, '' );
                        $output_str .= "<a href='#'><img src='".$src[0]."' /></a>";        
                    }else{
                        $output_str .= "<a href='" . get_permalink() . "'>";
                        
                        $output_str .= "<img src='". plugins_url( 'tt-post-viewer/images/default-image.png') . "' "
                                        . "width='". $opt_val['ttpv_txt_postarea_thumbnail_width_number'] ."'"
                                        . "height='". $opt_val['ttpv_txt_postarea_thumbnail_height_number'] ."' /></a>";
                    }
                    $output_str .= "</div>";
                }    
                $output_str .= "<div class='shortcode-title'><a href='" . get_permalink($mostpopular_posts->ID). "' title= '" . esc_attr(get_the_title()). "' >" . get_the_title() . "</a>";
                
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