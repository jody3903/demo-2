<?php
/*
 Template Name: Employee Tools
 *
*/



?>

<?php get_header(); ?>

	<?php if (isTAAdmin()) { ?>

		<div id="content" class="employee-tools<?php if (customerIsSelected()) echo ' customer-selected' ?>">

			<div id="inner-content" class="wrap cf">

					<main ng-app="ta.app.module" id="main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>

							<section class="entry-content">
								<?php the_content(); ?>
							</section>

						</article>

						<?php endwhile; endif; ?>

					</main>

			</div>

		</div>

	<?php } else { ?>

		<h1>Sorry</h1>
		<p>This page is available only to TuckerAllen Employees.</p>

	<?php } ?>

<?php get_footer(); ?>

<?php TACustomerDocPostHandler::instance()->showErrorStateOnPage(); ?>