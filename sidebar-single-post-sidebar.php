				<div id="single-post-sidebar" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

					<?php if ( is_active_sidebar( 'single-post-sidebar' ) ) : ?>

						<?php dynamic_sidebar( 'single-post-sidebar' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
						</div>

					<?php endif; ?>

				</div>
