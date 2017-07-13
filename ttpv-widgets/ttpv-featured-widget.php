<?php

add_action( 'widgets_init', 'initialize_featured_widget' );
function initialize_featured_widget() {
        global $opt_val;

        if($opt_val['ttpv_chk_featured_widget'] == 'on'){
            register_widget( 'TTPV_Featured_Widget' );
        }
}

class TTPV_Featured_Widget extends WP_Widget {
	function __construct(){
	$options = array(
		'description' => "TTPV Widget: Display Featured Posts",
		'name' => 'TTPV: Featured Posts'
		);
	parent::__construct('TTPV_Featured_Widget','',$options);
	}


	public function form($instance){
                global $opt_val;
		$defaults = array( 'title' => $opt_val['ttpv_txt_featured_title'],
                                  'num_post' => $opt_val['ttpv_txt_featured_widget_number'],
                                  'authorslist' => implode(',', $opt_val['ttpv_drp_featured_widget_authors']),
                                  'displaytype' => $opt_val['ttpv_drp_featured_widget_postdisplay'],
                                  'categorylist' => implode(',', $opt_val['ttpv_drp_featured_widget_category'])
                                  );
		$instance = wp_parse_args( (array) $instance, $defaults );
		extract($instance);
		?>
                <!-- Field for Title -->
                <p>
                    <label for= "<?php echo $this->get_field_id('title');?>">Title: </label>
                    
                    <input type="text" 
                    class="widefat" 
                    id="<?php echo $this->get_field_id('title');?>"
                    name="<?php echo $this->get_field_name('title');?>"
                    value="<?php if(isset($title)){
                                    echo esc_attr($title);
                                }else{
                                    echo esc_attr($opt_val['ttpv_txt_featured_title']);
                                }
                                ?>"  />
                </p>
                
                <!-- Field for author selction -->
                <p>
			<?php
                        $items = array('Any', 'admin','Rashed Latif', 'Testuser'); 
                        $authors_list = explode( ',' , $authorslist );
                        ?>
			<label for="<?php echo $this->get_field_id( 'authorslist' ); ?>">Select Authors: </label>
			<select multiple="multiple"  style="width:225px; min-height: 70px; height: auto;" id="<?php echo $this->get_field_id( 'authorslist' ); ?>[]" name="<?php echo $this->get_field_name( 'authorslist' ); ?>[]">
				<?php foreach ($items as $item) { ?>
				<option value="<?php echo $item ?>" <?php if ( in_array( $item , $authors_list ) ) { echo ' selected="selected"' ; } ?>><?php echo $item; ?></option>
				<?php } ?>
			</select>
		</p>
                
                <!-- Field for Category selction -->
                <p>
			<?php
                        $items = array('Any','Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5');
                        $category_list = explode( ',' , $categorylist );
                        ?>
			<label for="<?php echo $this->get_field_id( 'categorylist' ); ?>">Select Category: </label>
			<select multiple="multiple"  style="width:225px; min-height: 70px; height: auto;" id="<?php echo $this->get_field_id( 'categorylist' ); ?>[]" name="<?php echo $this->get_field_name( 'categorylist' ); ?>[]">
				<?php foreach ($items as $item) { ?>
                                    <option value="<?php echo $item ?>" <?php if ( in_array( $item , $category_list ) ) { echo ' selected="selected"' ; } ?>><?php echo $item; ?></option>
				<?php } ?>
			</select>
		</p>
                
                               
                <!-- Field for Display type option-->
                <p>
			<?php
                        $items = array('List','Thumbnail');
                        ?>
			<label for="<?php echo $this->get_field_id( 'displaytype' ); ?>">Display as: </label>
			<select id="<?php echo $this->get_field_id( 'displaytype' ); ?>" name="<?php echo $this->get_field_name( 'displaytype' ); ?>">
				<?php foreach ($items as $item) { ?>
                                    <option value="<?php echo $item ?>" <?php if ( $item == $displaytype )  { echo ' selected="selected"' ; } ?>><?php echo $item; ?></option>
				<?php } ?>
			</select>
		</p>
                
                <!-- Field for number of post -->
                <p>
                    <label for= "<?php echo $this->get_field_id('num_post');?>">Number of Posts: </label>
                    
                    <input type="number"
                    min = "0"
                    max = "100"
                    class="widefat" 
                    style="width:55px;"
                    
                    id="<?php echo $this->get_field_id('num_post');?>"
                    name="<?php echo $this->get_field_name('num_post');?>"
                    value="<?php if(isset($num_post)){
                                    echo esc_attr($num_post);
                                }else{
                                    echo esc_attr($opt_val['ttpv_txt_featured_widget_number']);
                                }
                                ?>"  />
                </p>
                <?php	    
        }
        
        function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_post'] = strip_tags( $new_instance['num_post'] );
		$instance['authorslist'] = implode(',' , $new_instance['authorslist']  );
                $instance['displaytype'] = strip_tags( $new_instance['displaytype'] );
                $instance['categorylist'] = implode(',' , $new_instance['categorylist']  );
		
		return $instance;
	}
        
        public function widget($args, $instance){
		global $opt_val;
		extract($args);
		extract($instance);
		
		echo $before_widget;
		echo $before_title;
			if(!empty($title)){
				echo $title;
			}else{
				echo "Recent Posts";
			}
		echo $after_title;
		?>
		
		<ul>
                    <?php
                    $categories = explode(",", $categorylist);
                    $catid = get_categories_id($categorylist);
                    
                    $authors_array = explode(",", $authorslist);
		    $authors_id = get_authors_id($authors_array);

                    
		    if($categories[0]=="Any" && $authors_array[0] == "Any"){
                        $parameters = array( 'posts_per_page' => $num_post, 'author' => '', 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1 );
		    }
		    elseif($categories[0]!="Any" && $authors_array[0] == "Any"){
			$parameters = array( 'posts_per_page' => $num_post, 'category__in' => $catid, 'author' => '', 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1 );
		    }
		    elseif($categories[0]=="Any" && $authors_array[0] != "Any"){
			$parameters = array( 'posts_per_page' => $num_post, 'author' => $authors_id, 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1 );
		    }
                    else{			
                        $parameters = array( 'posts_per_page' => $num_post, 'category__in' => $catid, 'author' => $authors_id, 'meta_key' => 'featured-checkbox', 'meta_value' => 'yes', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1 );
                    }
                    
                    $recent_posts = new WP_Query( $parameters );
                
                    while ($recent_posts->have_posts()){
                        $recent_posts->the_post();?>
			<li>
			<?php
			if($displaytype == "Thumbnail"){
				$dispid = "thmb";
			?>
			<div class="sidebar-thumb">
			<?php
			if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>"
								       title="<?php the_title(); ?>">
								       <?php the_post_thumbnail(array($opt_val['ttpv_txt_sidebar_thumbnail_width_number'],
												      $opt_val['ttpv_txt_sidebar_thumbnail_height_number']),
												array('title' => get_the_title()));
								       ?>
							</a>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark"
									title="<?php the_title(); ?>"><img
									src="<?php echo plugins_url( 'tt-post-viewer/images/default-image.png'); ?>"
									width="<?php echo $opt_val['ttpv_txt_sidebar_thumbnail_width_number']; ?>"
									height="<?php echo $opt_val['ttpv_txt_sidebar_thumbnail_height_number']; ?>"
									alt="<?php the_title(); ?>" />
							</a>
						<?php } ?>
			</div>
			<?php
			}//End of if statement -- Thumbnail check
			?>
			<div class="sidebar-thumb-title" id="<?php echo $dispid; ?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			
			</li>
			<?php    
		    }
                    
                    ?>
                </ul>
		
                <?php
                echo $after_widget;
		// Resets Post Data
		wp_reset_postdata();
		
		
		
        }
}
?>
