<?php get_header(); ?>
<div id="et-boc">
			<div id="content" class="ta-blog-template">

				<div id="inner-content">
					
					<div class="et-boc et-l" id="et-boc">
						<div class="et_builder_inner_content et_pb_gutters3">
							
							<div class="et_pb_section et_pb_fullwidth_section et_pb_with_background et_section_regular ta-header-border clearfix">
								<div class="et_pb_column et_pb_column_4_4">
									<?php get_divi_library_item(312); // Brand Bar ?>
								</div>
							</div>
							
							<?php if( in_category('blog') ): ?>
								<?php get_divi_library_item(1319); // Back to Blog ?>
							<?php elseif( in_category('news') ): ?>
								<?php get_divi_library_item(1375); // Back to Blog ?>
							<?php endif; ?>
							
							<div class="et_pb_section ta-angle-bg et_section_regular et_section_transparent ta-blog-template">
								
								<div class="et_pb_row ta-blog-row">
			
									<div class="et_pb_column et_pb_column_2_3  et_pb_column_1">
										
										<div class="et_pb_module">
												
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
													<?php 
													    $id = get_the_ID();
													    $size = "full";
													    $get_thumbnail =  wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
													    
													    $default_thumbnail = '/wp-content/themes/tuckerallen/library/images/tuckerallen-default.jpg';
													    $default_width = '988';
													    $default_height = '659';
													    
													    $thumbnail = is_array($get_thumbnail) && !empty($get_thumbnail) ? $get_thumbnail[0] : $default_thumbnail;
													    
													    $width = is_array($get_thumbnail) && !empty($get_thumbnail) ? $get_thumbnail[1] : $default_width;
													    
													    $height = is_array($get_thumbnail) && !empty($get_thumbnail) ? $get_thumbnail[2] : $default_height;
													?>
													<div class="ta-blog-image">

													    <h1 class="entry-title"><?php the_title(); ?></h1>
														
														<?php if( in_category('blog') ): ?>
													    <div class="ta-blog-post">
													       <div class="ta-post-top">
													           
													           <div class="ta-post-fw-thumbnail">
													               <img src="<?php echo $thumbnail ?>" width="<?php echo $width ?>" height="<?php echo $height ?>">
													           </div>
													       
													           <div class="ta-post-meta">
													               <span class="pc-post-date"><?php the_date(); ?></span>
													           </div>
													       </div>
													       
													    </div>
														<?php endif;?>
													</div>
													
													<?php if( in_category('blog') ): ?>
													<div class="ta-add-this clearfix">
														<div class="addthis_sharing_toolbox"></div>
													</div>
													<?php endif;?>
													   
													<?php get_template_part( 'post-formats/format', get_post_format() ); ?>

													<?php if( in_category('blog') ): ?>
													<div class="ta-add-this clearfix">
														<div class="addthis_sharing_toolbox"></div>
													</div>
													<?php endif;?>
													
												</div>

												<?php if( in_category('blog') ): ?>
													<?php get_divi_library_item(2554); // Blog Post Navigation ?>
												<?php endif;?>

												<?php if( in_category('blog') ): ?>
													<?php echo do_shortcode('[related_posts_by_tax taxonomies="category" posts_per_page="3" format="excerpts" order="RAND"]'); ?>
												<?php endif;?>
						
												<?php endwhile; ?>
						
												<?php else : ?>
						
													<article id="post-not-found" class="hentry cf">
															<header class="article-header">
																<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
															</header>
															<section class="entry-content">
																<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
															</section>
															<footer class="article-footer">
																	<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
															</footer>
													</article>
						
												<?php endif; ?>
												
											
										
									</div>
									
									<div class="et_pb_column et_pb_column_1_3  et_pb_column_2">
										
										<?php if( in_category('news') ): ?>
										<div class="ta-add-this clearfix">
											<h2>Share</h2>
											<div class="addthis_sharing_toolbox"></div>
										</div>
										<?php endif;?>
										
										<?php if( in_category('blog') ): ?>
										<div class="et_pb_widget_area et_pb_widget_area_right clearfix et_pb_module et_pb_bg_layout_light  et_pb_sidebar_0">
											<?php get_sidebar('single-post-sidebar'); ?>
										</div>
										<?php endif;?>
										
									</div>
									
								</div>
								
							</div>
							
						</div>
					</div>

				</div>

			</div>
			
			<div class="et-boc et-l" id="et-boc">
				<div class="et_builder_inner_content et_pb_gutters3">
					
					<div class="et_pb_section et_pb_fullwidth_section et_pb_with_background et_section_regular  ta-header-border clearfix">
						<div class="et_pb_column et_pb_column_4_4">
							<?php get_divi_library_item(156); // Schedule a consultation ?>
						</div>
					</div>
					
					<div class="et_pb_section et_pb_fullwidth_section et_pb_with_background et_section_regular  ta-header-border clearfix">
						<div class="et_pb_column et_pb_column_4_4">
							<?php get_divi_library_item(312); // Brand Bar ?>
						</div>
					</div>
					
				</div>
			</div>
</div>
<?php get_footer(); ?>
