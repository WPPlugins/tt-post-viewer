<?php
function load_field_details(){
    
    $fields = array(
/*----------------------------------------------------------------------------------------------------------------
						Fields for General Settings
------------------------------------------------------------------------------------------------------------------*/
			/*===========================================================
						Sidebar Thumbnail Settings 
			=============================================================*/
    			array( //label
				'field-id' => 'ttpv_lbl_sidebar_thumbnail',
                                'field-title' => 'Widget Thumbnail Size: ',
                                'section' => 'ttpv_sidebar_thumbnail_settings_section',
				'class' => 'general-lebel'
				
			      ),
			array(
			      //textbox 
                                'field-id' => 'ttpv_txt_sidebar_thumbnail_width_number',
                                'field-title' => "<div class='general-thumb-width'>Width in pixel: </div>",
                                'section' => 'ttpv_sidebar_thumbnail_settings_section',
				'class' => 'general-thumb'
                                
			      ),
			array(
			      //textbox 
                                'field-id' => 'ttpv_txt_sidebar_thumbnail_height_number',
                                'field-title' => "<div class='general-thumb-height'>Height in pixel: </div>",
                                'section' => 'ttpv_sidebar_thumbnail_settings_section',
				'class' => 'general-thumb'    
			      ),
			
			/*===========================================================
						Post Area Thumbnail Settings 
			=============================================================*/
    			array( //label
				'field-id' => 'ttpv_lbl_postarea_thumbnail',
                                'field-title' => 'Post Area Thumbnail Size: ',
                                'section' => 'ttpv_postarea_thumbnail_settings_section',
				'class' => 'general-lebel'
				
			      ),
			array(
			      //textbox 
                                'field-id' => 'ttpv_txt_postarea_thumbnail_width_number',
                                'field-title' => "<div class='general-thumb-width'>Width in pixel: </div>",
                                'section' => 'ttpv_postarea_thumbnail_settings_section',
				'class' => 'general-thumb'
                                
			      ),
			array(
			      //textbox 
                                'field-id' => 'ttpv_txt_postarea_thumbnail_height_number',
                                'field-title' => "<div class='general-thumb-height'>Height in pixel: </div>",
                                'section' => 'ttpv_postarea_thumbnail_settings_section',
				'class' => 'general-thumb'    
			      ),

			
			      
/*----------------------------------------------------------------------------------------------------------------
*					       Fields for Recentpost 
-----------------------------------------------------------------------------------------------------------------*/

			/*===========================================================
					    Recent post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_recentpost_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_recentpost_title_section',
				'class' => 'recentpost'
                                ),
			/*===========================================================
						Recent Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_recentpost_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_recentpost_widget_section',
				'class' => 'recentpost-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_recentpost_widget_number',
                                'field-title' => "<div class='recentpost-widget'>Number of posts</div>",
                                'section' => 'ttpv_recentpost_widget_section',
				'class' => 'recentpost-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_recentpost_widget_postdisplay',
                                'field-title' => "<div class='recentpost-widget'>Display Posts as</div>",
                                'section' => 'ttpv_recentpost_widget_section',
				'class' => 'recentpost-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_recentpost_widget_authors',
                                'field-title' => "<div class='recentpost-widget'>By Author</div>",
                                'section' => 'ttpv_recentpost_widget_section',
				'class' => 'recentpost-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_recentpost_widget_category',
                                'field-title' => "<div class='recentpost-widget'>By Category</div>",
                                'section' => 'ttpv_recentpost_widget_section',
				'class' => 'recentpost-widget'
                                ),
			/*===========================================================
						Recent Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_recentpost_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_recentpost_shortcode_number',
                                'field-title' => "<div class='recentpost-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_recentpost_shortcode_postdisplay',
                                'field-title' => "<div class='recentpost-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
			        ),
			
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_recentpost_shortcode_excerpt',
                                'field-title' => "<div class='recentpost-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_recentpost_shortcode_excerpt_number',
                                'field-title' => "<div class='recentpost-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
                                ),
			
			array(  //dropdown
                                'field-id' => 'ttpv_drp_recentpost_shortcode_authors',
                                'field-title' => "<div class='recentpost-shortcode'>By Author</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_recentpost_shortcode_category',
                                'field-title' => "<div class='recentpost-shortcode'>By Category</div>",
                                'section' => 'ttpv_recentpost_shortcode_section',
				'class' => 'recentpost-shortcode'
                                ),
			
			

/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Most Popular Posts
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Most Popular post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_mostpopular_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_mostpopular_title_section',
				'class' => 'mostpopular'
                                ),
			/*===========================================================
						Most Popular Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_mostpopular_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_mostpopular_widget_section',
				'class' => 'mostpopular-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostpopular_widget_number',
                                'field-title' => "<div class='mostpopular-widget'>Number of posts</div>",
                                'section' => 'ttpv_mostpopular_widget_section',
				'class' => 'mostpopular-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostpopular_widget_postdisplay',
                                'field-title' => "<div class='mostpopular-widget'>Display Posts as</div>",
                                'section' => 'ttpv_mostpopular_widget_section',
				'class' => 'mostpopular-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostpopular_widget_authors',
                                'field-title' => "<div class='mostpopular-widget'>By Author</div>",
                                'section' => 'ttpv_mostpopular_widget_section',
				'class' => 'mostpopular-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_mostpopular_widget_category',
                                'field-title' => "<div class='mostpopular-widget'>By Category</div>",
                                'section' => 'ttpv_mostpopular_widget_section',
				'class' => 'mostpopular-widget'
                                ),
			/*===========================================================
						Most Popular Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_mostpopular_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostpopular_shortcode_number',
                                'field-title' => "<div class='mostpopular-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostpopular_shortcode_postdisplay',
                                'field-title' => "<div class='mostpopular-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
				
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostpopular_shortcode_excerpt',
                                'field-title' => "<div class='mostpopular-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostpopular_shortcode_excerpt_number',
                                'field-title' => "<div class='mostpopular-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
                                ),
			
			array(  //dropdown
                                'field-id' => 'ttpv_drp_mostpopular_shortcode_authors',
                                'field-title' => "<div class='mostpopular-shortcode'>By Author</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostpopular_shortcode_category',
                                'field-title' => "<div class='mostpopular-shortcode'>By Category</div>",
                                'section' => 'ttpv_mostpopular_shortcode_section',
				'class' => 'mostpopular-shortcode'
                                ),
			
                        
/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Most Commented Posts
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Most Commented post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_mostcommented_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_mostcommented_title_section',
				'class' => 'mostcommented'
                                ),
			/*===========================================================
						Most Commented Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_mostcommented_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_mostcommented_widget_section',
				'class' => 'mostcommented-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostcommented_widget_number',
                                'field-title' => "<div class='mostcommented-widget'>Number of posts</div>",
                                'section' => 'ttpv_mostcommented_widget_section',
				'class' => 'mostcommented-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostcommented_widget_postdisplay',
                                'field-title' => "<div class='mostcommented-widget'>Display Posts as</div>",
                                'section' => 'ttpv_mostcommented_widget_section',
				'class' => 'mostcommented-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostcommented_widget_authors',
                                'field-title' => "<div class='mostcommented-widget'>By Author</div>",
                                'section' => 'ttpv_mostcommented_widget_section',
				'class' => 'mostcommented-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_mostcommented_widget_category',
                                'field-title' => "<div class='mostcommented-widget'>By Category</div>",
                                'section' => 'ttpv_mostcommented_widget_section',
				'class' => 'mostcommented-widget'
                                ),
			/*===========================================================
						Most Commented Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_mostcommented_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostcommented_shortcode_number',
                                'field-title' => "<div class='mostcommented-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostcommented_shortcode_postdisplay',
                                'field-title' => "<div class='mostcommented-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
				
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostcommented_shortcode_excerpt',
                                'field-title' => "<div class='mostcommented-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_mostcommented_shortcode_excerpt_number',
                                'field-title' => "<div class='mostcommented-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_mostcommented_shortcode_authors',
                                'field-title' => "<div class='mostcommented-shortcode'>By Author</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_mostcommented_shortcode_category',
                                'field-title' => "<div class='mostcommented-shortcode'>By Category</div>",
                                'section' => 'ttpv_mostcommented_shortcode_section',
				'class' => 'mostcommented-shortcode'
                                ),
			
/*----------------------------------------------------------------------------------------------------------------
*					       Fields for Relatedpost 
-----------------------------------------------------------------------------------------------------------------*/
			/*===========================================================
					    Related post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_related_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_related_title_section',
				'class' => 'related'
                                ),
			/*===========================================================
						Related Post Widget		    
		        =============================================================*/
			array(  //checkbox 
                                'field-id' => 'ttpv_chk_related_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_related_widget_section',
				'class' => 'related-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_related_widget_number',
                                'field-title' => "<div class='related-widget'>Number of posts</div>",
                                'section' => 'ttpv_related_widget_section',
				'class' => 'related-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_related_widget_postdisplay',
                                'field-title' => "<div class='related-widget'>Display Posts as</div>",
                                'section' => 'ttpv_related_widget_section',
				'class' => 'related-widget'
				),
			/*===========================================================
						Related Post Shortcode		    
		        =============================================================*/
			array(  //checkbox 
                                'field-id' => 'ttpv_chk_related_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_related_shortcode_section',
				'class' => 'related-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_related_shortcode_number',
                                'field-title' => "<div class='related-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_related_shortcode_section',
				'class' => 'related-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_related_shortcode_postdisplay',
                                'field-title' => "<div class='related-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_related_shortcode_section',
				'class' => 'related-shortcode'
				),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_related_shortcode_excerpt',
                                'field-title' => "<div class='related-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_related_shortcode_section',
				'class' => 'related-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_related_shortcode_excerpt_number',
                                'field-title' => "<div class='related-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_related_shortcode_section',
				'class' => 'related-shortcode'
                                ),
			
/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Featured Posts
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Featured post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_featured_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_featured_title_section',
				'class' => 'featured'
                                ),
			/*===========================================================
						Featured Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_featured_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_featured_widget_section',
				'class' => 'featured-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_featured_widget_number',
                                'field-title' => "<div class='featured-widget'>Number of posts</div>",
                                'section' => 'ttpv_featured_widget_section',
				'class' => 'featured-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_featured_widget_postdisplay',
                                'field-title' => "<div class='featured-widget'>Display Posts as</div>",
                                'section' => 'ttpv_featured_widget_section',
				'class' => 'featured-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_featured_widget_authors',
                                'field-title' => "<div class='featured-widget'>By Author</div>",
                                'section' => 'ttpv_featured_widget_section',
				'class' => 'featured-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_featured_widget_category',
                                'field-title' => "<div class='featured-widget'>By Category</div>",
                                'section' => 'ttpv_featured_widget_section',
				'class' => 'featured-widget'
                                ),
			/*===========================================================
						Featured Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_featured_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_featured_shortcode_number',
                                'field-title' => "<div class='featured-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_featured_shortcode_postdisplay',
                                'field-title' => "<div class='featured-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
				
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_featured_shortcode_excerpt',
                                'field-title' => "<div class='featured-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_featured_shortcode_excerpt_number',
                                'field-title' => "<div class='featured-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_featured_shortcode_authors',
                                'field-title' => "<div class='featured-shortcode'>By Author</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_featured_shortcode_category',
                                'field-title' => "<div class='featured-shortcode'>By Category</div>",
                                'section' => 'ttpv_featured_shortcode_section',
				'class' => 'featured-shortcode'
                                ),
			
/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Authors Posts
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Authors post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_authors_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_authors_title_section',
				'class' => 'authors'
                                ),
			/*===========================================================
						Authors Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_authors_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_authors_widget_section',
				'class' => 'authors-widget-chk'
                                ),
                        array(  //dropdown 
                                'field-id' => 'ttpv_drp_authors_widget_authors',
                                'field-title' => "<div class='authors-widget'>By Author</div>",
                                'section' => 'ttpv_authors_widget_section',
				'class' => 'authors-widget'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_authors_widget_number',
                                'field-title' => "<div class='authors-widget'>Number of posts</div>",
                                'section' => 'ttpv_authors_widget_section',
				'class' => 'authors-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_authors_widget_postdisplay',
                                'field-title' => "<div class='authors-widget'>Display Posts as</div>",
                                'section' => 'ttpv_authors_widget_section',
				'class' => 'authors-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_authors_widget_category',
                                'field-title' => "<div class='authors-widget'>By Category</div>",
                                'section' => 'ttpv_authors_widget_section',
				'class' => 'authors-widget'
                                ),
			/*===========================================================
						Authors Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_authors_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode-chk'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_authors_shortcode_authors',
                                'field-title' => "<div class='authors-shortcode'>By Author</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
                                ),
                        array(  //textbox 
                                'field-id' => 'ttpv_txt_authors_shortcode_number',
                                'field-title' => "<div class='authors-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_authors_shortcode_postdisplay',
                                'field-title' => "<div class='authors-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
				
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_authors_shortcode_excerpt',
                                'field-title' => "<div class='authors-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_authors_shortcode_excerpt_number',
                                'field-title' => "<div class='authors-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_authors_shortcode_category',
                                'field-title' => "<div class='authors-shortcode'>By Category</div>",
                                'section' => 'ttpv_authors_shortcode_section',
				'class' => 'authors-shortcode'
                                ),
			
/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Category Posts
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Category post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_category_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_category_title_section',
				'class' => 'category'
                                ),
			/*===========================================================
						Category Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_category_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_category_widget_section',
				'class' => 'category-widget-chk'
                                ),
                        array(  //dropdown 
                                'field-id' => 'ttpv_drp_category_widget_category',
                                'field-title' => "<div class='category-widget'>By Author</div>",
                                'section' => 'ttpv_category_widget_section',
				'class' => 'category-widget'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_category_widget_number',
                                'field-title' => "<div class='category-widget'>Number of posts</div>",
                                'section' => 'ttpv_category_widget_section',
				'class' => 'category-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_category_widget_postdisplay',
                                'field-title' => "<div class='category-widget'>Display Posts as</div>",
                                'section' => 'ttpv_category_widget_section',
				'class' => 'category-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_category_widget_category',
                                'field-title' => "<div class='category-widget'>By Category</div>",
                                'section' => 'ttpv_category_widget_section',
				'class' => 'category-widget'
                                ),
			/*===========================================================
						Category Post Shortcode		    
		        =============================================================*/
                        array(  //checkbox
                                'field-id' => 'ttpv_chk_category_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode-chk'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_category_shortcode_category',
                                'field-title' => "<div class='category-shortcode'>By Author</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
                                ),
                        array(  //textbox 
                                'field-id' => 'ttpv_txt_category_shortcode_number',
                                'field-title' => "<div class='category-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_category_shortcode_postdisplay',
                                'field-title' => "<div class='category-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
				
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_category_shortcode_excerpt',
                                'field-title' => "<div class='category-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_category_shortcode_excerpt_number',
                                'field-title' => "<div class='category-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_category_shortcode_category',
                                'field-title' => "<div class='category-shortcode'>By Category</div>",
                                'section' => 'ttpv_category_shortcode_section',
				'class' => 'category-shortcode'
                                ),
			
/*-------------------------------------------------------------------------------------------------------------------------
 *						Fields for Posts By Date
 --------------------------------------------------------------------------------------------------------------------------*/
			
			/*===========================================================
					    Bydate post Title Text Box		    
		        =============================================================*/
			array(  //Textbox
                                'field-id' => 'ttpv_txt_bydate_title',
                                'field-title' => 'Title',
                                'section' => 'ttpv_bydate_title_section',
				'class' => 'bydate'
                                ),
			/*===========================================================
						Bydate Post Widget		    
		        =============================================================*/
                        array(  //checkbox 
                                'field-id' => 'ttpv_chk_bydate_widget',
                                'field-title' => 'Enable Sidebar Widget',
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_bydate_widget_number',
                                'field-title' => "<div class='bydate-widget'>Number of posts</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_bydate_widget_postdisplay',
                                'field-title' => "<div class='bydate-widget'>Display Posts as</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget'
                                ),
			array(  //textbox
                                'field-id' => 'ttpv_txt_bydate_widget_datepick1',
                                'field-title' => "<div class='bydate-widget'>From</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget',
				'id' => 'cp1'
                                ),
			array(  //textbox
                                'field-id' => 'ttpv_txt_bydate_widget_datepick2',
                                'field-title' => "<div class='bydate-widget'>To</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget',
				'id' => 'cp2'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_bydate_widget_authors',
                                'field-title' => "<div class='bydate-widget'>By Author</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_bydate_widget_category',
                                'field-title' => "<div class='bydate-widget'>By Category</div>",
                                'section' => 'ttpv_bydate_widget_section',
				'class' => 'bydate-widget'
                                ),
			/*===========================================================
						Bydate Post Shortcode		    
		        =============================================================*/
			array(  //checkbox
                                'field-id' => 'ttpv_chk_bydate_shortcode',
                                'field-title' => 'Enable Shortcode',
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode-chk'
                                ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_bydate_shortcode_number',
                                'field-title' => "<div class='bydate-shortcode'>Number of posts</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_bydate_shortcode_postdisplay',
                                'field-title' => "<div class='bydate-shortcode'>Display Posts as</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
                                ),
			array(  //textbox
                                'field-id' => 'ttpv_txt_bydate_shortcode_datepick1',
                                'field-title' => "<div class='bydate-shortcode'>From</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode',
				'id' => 'cp1'
                                ),
			array(  //textbox
                                'field-id' => 'ttpv_txt_bydate_shortcode_datepick2',
                                'field-title' => "<div class='bydate-shortcode'>To</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode',
				'id' => 'cp2'
                                ),
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_bydate_shortcode_excerpt',
                                'field-title' => "<div class='bydate-shortcode'>Show Excerpt</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
			        ),
			array(  //textbox 
                                'field-id' => 'ttpv_txt_bydate_shortcode_excerpt_number',
                                'field-title' => "<div class='bydate-shortcode'>Excerpt Size</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
                                ),
			
			array(  //dropdown 
                                'field-id' => 'ttpv_drp_bydate_shortcode_authors',
                                'field-title' => "<div class='bydate-shortcode'>By Author</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
                                ),
			array(  //dropdown
                                'field-id' => 'ttpv_drp_bydate_shortcode_category',
                                'field-title' => "<div class='bydate-shortcode'>By Category</div>",
                                'section' => 'ttpv_bydate_shortcode_section',
				'class' => 'bydate-shortcode'
                                )
			

		);

return $fields;
}
?>