			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<div id="footer-logo" itemscope itemtype="http://schema.org/Organization">
						<?php $urlForLogo = ( TUCKERALLEN_ENVIRONMENT_NAME == 'portal' ) ? 'https://tuckerallen.com' : home_url(); ?>
						<a href="<?php echo $urlForLogo; ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/tuckerallen-logo-2020.png">
						</a>
					</div>

					<div class="footer_social" style="text-align: center;">
						<a class="facebook" href="https://www.facebook.com/tuckerallenestateplanning/" target="_blank"><span>Facebook</span></a>
						<a class="linkedin" href="https://www.linkedin.com/company/tuckerallen" target="_blank"><span>LinkedIn</span></a>
						<a class="twitter" href="https://twitter.com/TuckerAllen_EP" target="_blank"><span>Twitter</span></a>
						<a class="instagram" href="https://www.instagram.com/tuckerallen_ep/" target="_blank"><span>Instagram</span></a>
						<a class="youtube" href="https://www.youtube.com/channel/UCCsKylvlO3_4NqdfppQ_Thg" target="_blank"><span>Youtube</span></a>
					</div>


					<nav role="navigation" class="footer-primary">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-primary-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<nav role="navigation" class='footer-secondary'>
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-secondary-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>

				</div>
<script type="text/javascript">
_linkedin_partner_id = "1116978";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=1116978&fmt=gif" />
</noscript>
			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
