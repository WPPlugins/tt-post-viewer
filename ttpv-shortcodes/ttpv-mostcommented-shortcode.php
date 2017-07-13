<?php
add_action( 'init', 'register_mostcommented_shortcodes');
function register_mostcommented_shortcodes(){
    
    global $opt_val, $commented_catstr, $commented_authstr;

    if($opt_val['ttpv_chk_mostcommented_shortcode'] == 'on'){
        
        if($opt_val['ttpv_drp_mostcommented_shortcode_category'][0] != "Any"){
            $catid = get_categories_id(implode(",",($opt_val['ttpv_drp_mostcommented_shortcode_category'])));
            $commented_catstr = implode(",", $catid);    
        }
    
        if($opt_val['ttpv_drp_mostcommented_shortcode_authors'][0]!="Any"){
            $commented_authstr = get_authors_id($opt_val['ttpv_drp_mostcommented_shortcode_authors']);
        }
        add_shortcode('ttpv-mostcommented', 'commentedposts_function');      
    }
}

function commentedposts_function($atts){
    global $opt_val, $commented_catstr, $commented_authstr;
    
    $postnum = empty($opt_val['ttpv_txt_mostcommented_shortcode_number']) ? 10 : $opt_val['ttpv_txt_mostcommented_shortcode_number'];
    $length = empty($opt_val['ttpv_txt_mostcommented_shortcode_excerpt_number']) ? 10 : $opt_val['ttpv_txt_mostcommented_shortcode_excerpt_number'];
    
    extract(shortcode_atts(array(
                                'posts' => $postnum,
                                'cats' => $commented_catstr,
                                'auths' => $commented_authstr,
                                'disp' => $opt_val['ttpv_drp_mostcommented_shortcode_postdisplay'],
                                'title' => $opt_val['ttpv_txt_mostcommented_title'],
                                'exrpt' => $opt_val['ttpv_drp_mostcommented_shortcode_excerpt'],
                                'exrptlen' => $length
                            ), $atts));
    
    
    $output_str = "";
        
    $output_str = '<div class="shortcode-area">';
    
        if(!empty($title)){
            $output_str .= "<h2>" . $title . "</h2>";
        }else{
            $output_str .= "<h2>Most Commented Posts</h2>";
        }
        
        $output_str .= "<ul>";
            
            $parameters = array(    'posts_per_page' => $posts,
                                    'cat'=>$cats,
                                    'author' => $auths,
                                    'post__not_in' => get_option( 'sticky_posts' ),
				    'orderby' => 'comment_count',
				    'order' => 'DESC'
                                    );  
            $mostcommented_posts = new WP_Query( $parameters );
                        
            while ($mostcommented_posts->have_posts()){
                $mostcommented_posts->the_post();
                               
                $output_str .= "<li>";
                
                if(strtolower($disp) == "thumbnail"){
                    $output_str .= "<div class='shortcode-thumb'>";
                    if(has_post_thumbnail()){
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($mostcommented_posts->ID),
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
                $output_str .= "<div class='shortcode-title'><a href='" . get_permalink($mostcommented_posts->ID). "' title= '" . esc_attr(get_the_title()). "' >" . get_the_title() . "</a>";
                
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