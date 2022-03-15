<?php get_header(); ?>

	<div id="content" class="ta-blog-template">
		<div id="et-boc" class="et-boc">
		<div id="inner-content">
			<div class="et-boc et-l" id="et-boc">
				<div class="et_builder_inner_content et_pb_gutters3">
					
					<div class="et_pb_section et_pb_fullwidth_section et_pb_with_background et_section_regular ta-header-border clearfix">
						<div class="et_pb_column et_pb_column_4_4">
							<?php get_divi_library_item(312); ?>
						</div>
					</div>
					
					<div class="et_pb_section et_pb_with_background et_section_regular ta-blog-heading">
						<div class="et_pb_row">
							<div class="et_pb_column et_pb_column_4_4">
								<div class="et_pb_module">
									<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="et_pb_section ta-angle-bg et_section_regular et_section_transparent ta-blog-template">
						
						<div class="et_pb_row ta-blog-row">
	
							<div class="et_pb_column et_pb_column_2_3  et_pb_column_1">
								
								<div class="et_pb_module">
									<div class="ta-blog-display">
									
									
										
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										
										<?php 
										   $id = get_the_ID();
										   $get_thumbnail =  wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
										   
										   $default_thumbnail = '/wp-content/themes/tuckerallen/library/images/tuckerallen-default.jpg';
										   
										   $thumbnail = is_array($get_thumbnail) && !empty($get_thumbnail) ? reset($get_thumbnail) : $default_thumbnail;
										?>
											   
										   <div class="ta-blog-post">
											   <div class="ta-post-top">
												   <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="ta-post-image" style="background-image:url(<?php echo $thumbnail ?>)"></a>
											   
												   <div class="ta-post-meta">
													   <span class="ta-post-date"><?php echo get_the_date(); ?></span>
												   </div>
											   </div>
											   
											   <div class="ta-post-bottom">
												   <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												   <p class="ta-post-excerpt"><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="ta-post-more">Read more&hellip;</a></p>
											   </div>
										   </div>
											
									<?php endwhile; ?>
									</div>
									<?php 
									$bignum = 999999999;
										if ( max_num_pages > 1 )
										echo '<nav class="pagination">';
										echo paginate_links( array(
											'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
											'format'       => '',
											'current'      => max( 1, get_query_var('paged') ),
											'total'        => max_num_pages,
											'prev_text'    => '&#xf053;',
											'next_text'    => '&#xf054;',
											'type'         => 'list',
											'end_size'     => 3,
											'mid_size'     => 3
											) );
											echo '</nav>';
									?>
											
									<?php else : ?>
											
											<article id="post-not-found" class="hentry cf">
												<header class="article-header">
													<h1><?php _e( 'Post Not Found.', 'bonestheme' ); ?></h1>
												</header>
											</article>
											
									<?php endif; ?>
								</div>
							</div>
							<?php wp_reset_postdata(); ?>
							
							<div class="et_pb_column et_pb_column_1_3  et_pb_column_2">
								
								<div class="et_pb_widget_area et_pb_widget_area_right clearfix et_pb_module et_pb_bg_layout_light  et_pb_sidebar_0">
									<?php get_sidebar(); ?>
								</div>
								
							</div>
							
						</div>
						
					</div>

				</div>

			</div>

		</div>
	</div>
	</div>
	<div id="et-boc">
	<div class="et-boc et-l" id="et-boc">
		<div class="et_builder_inner_content et_pb_gutters3">
			
			<div class="et_pb_section et_pb_fullwidth_section et_pb_with_background et_section_regular  ta-header-border clearfix">
				<div class="et_pb_column et_pb_column_4_4">
					<?php get_divi_library_item(312); ?>
				</div>
			</div>
			<?php get_divi_library_item(153); ?>
			
			<?php //get_divi_library_item(67); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
