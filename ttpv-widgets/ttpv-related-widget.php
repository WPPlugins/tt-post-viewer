<?php

add_action( 'widgets_init', 'initialize_related_widget' );
function initialize_related_widget() {
        global $opt_val;

        if($opt_val['ttpv_chk_related_widget'] == 'on'){
            register_widget( 'TTPV_Related_Widget' );
        }
}

class TTPV_Related_Widget extends WP_Widget {
	function __construct(){
	$options = array(
		'description' => "TTPV Widget: Display Related Posts",
		'name' => 'TTPV: Related Posts'
		);
	parent::__construct('TTPV_Related_Widget','',$options);
	}


	public function form($instance){
                global $opt_val;
		$defaults = array( 'title' => $opt_val['ttpv_txt_related_title'],
                                  'num_post' => $opt_val['ttpv_txt_related_widget_number'],
                                  'displaytype' => $opt_val['ttpv_drp_related_widget_postdisplay']
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
                                    echo esc_attr($opt_val['ttpv_txt_related_title']);
                                }
                                ?>"  />
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
                                    echo esc_attr($opt_val['ttpv_txt_related_widget_number']);
                                }
                                ?>"  />
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
                
                
                <?php	    
        }
        
        function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_post'] = strip_tags( $new_instance['num_post'] );
	        $instance['displaytype'] = strip_tags( $new_instance['displaytype'] );
        	
		return $instance;
	}
        
        public function widget($args, $instance){
		if(is_single()){
		
			global $opt_val;
			extract($args);
			extract($instance);
		
			
			global $post;  
			$tags = wp_get_post_tags($post->ID);  
      
			if($tags){  
				$tag_ids = array();  
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
		    
				$parameters = array( 	'posts_per_page' => $num_post,
							'tag__in' => $tag_ids,  
							'post__not_in' => array($post->ID),  
							'ignore_sticky_posts' => 1  
							);
		    
				$related_posts = new WP_Query( $parameters );
				
				echo $before_widget;
				echo $before_title;
				if(!empty($title)){
					echo $title;
				}else{
					echo "Related Posts";
				}
				echo $after_title;	
				?>
				
				<ul>
				<?php
					while ($related_posts->have_posts()){
						$related_posts->the_post();?>
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
					} //End While
				?>
				</ul>
				<?php
				echo $after_widget;
				wp_reset_postdata();
			} //End of if($tags)		
		} //End of if (is_single)
        }
}
?>