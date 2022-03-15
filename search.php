<?php get_header(); ?>

<hr class="brand-divider">

<div class="safe-zone">

	<main id="main" role="main">

		<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

					<div class="summary-parts">

						<section class="summary-description">

							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

							<?php //the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>

						</section>

					</div>

				</article>

			<?php endwhile; ?>

			<?php bones_page_navi(); ?>

		<?php else : ?>

			<article id="post-not-found">
				<header>
					<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
				</header>
				<section>
					<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
				</section>
			</article>

		<?php endif; ?>

	</main>

</div>

<?php get_footer(); ?>
