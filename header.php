<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/favicon-128.png" sizes="128x128" />
		<meta name="application-name" content="TuckerAllen"/>
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicon_2020/mstile-310x310.png" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<!-- Begin Inspectlet Embed Code -->
		<script type="text/javascript" id="inspectletjs">
		window.__insp = window.__insp || [];
		__insp.push(['wid', 827773448]);
		(function() {
		function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
		setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
		})();
		</script>
		<!-- End Inspectlet Embed Code -->

		<?php if ( TUCKERALLEN_ENVIRONMENT_NAME == 'production' ) { ?>
			<!-- Google Code for Remarketing Tag -->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 864820922;
			var google_custom_params = window.google_tag_params;
			var google_remarketing_only = true;
			/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/864820922/?guid=ON&amp;script=0"/>
			</div>
			</noscript>
			<!-- END Google Code for Remarketing Tag -->
		<?php } else { ?>
			<!-- Google Code for Remarketing Tag would go here in production, but is disabled for development environment. -->
		<?php } ?>

		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-M9XSMJX');</script>
		<!-- End Google Tag Manager -->

		<?php if ( TUCKERALLEN_ENVIRONMENT_NAME == 'production' ) { ?>
			<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '208909164329938');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=208909164329938&ev=PageView&noscript=1"
/></noscript>
<!-- Facebook Pixel Code -->
<!-- <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '502522733573514');
  fbq('track', 'PageView');
  console.log("facebook");
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=502522733573514&ev=PageView&noscript=1"
/></noscript> -->
<!-- End Facebook Pixel Code -->

		<?php } else { ?>
			<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '208909164329938');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=208909164329938&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
		<?php } ?>

		<?php if ( TUCKERALLEN_ENVIRONMENT_NAME == 'production' ) { ?>
			<!-- Begin Amazon Pixel -->
			<!-- Use of this pixel is subject to the Amazon ad specs and policies at http://www.amazon.com/b/?&node=7253015011 -->
			<script type='text/javascript'>var _pix = document.getElementById('_pix_id_affd6d22-7d52-79b6-415e-7ddce9614367');if (!_pix) { var protocol = '//'; var a = Math.random() * 1000000000000000000; _pix = document.createElement('img'); _pix.style.display = 'none'; _pix.setAttribute('src', protocol + 's.amazon-adsystem.com/iu3?d=forester-did&ex-fargs=%3Fid%3Daffd6d22-7d52-79b6-415e-7ddce9614367%26type%3D55%26m%3D1&ex-fch=416613&ex-src=https://tuckerallen.com/&ex-hargs=v%3D1.0%3Bc%3D9506434650701%3Bp%3DAFFD6D22-7D52-79B6-415E-7DDCE9614367' + '&cb=' + a); _pix.setAttribute('id','_pix_id_affd6d22-7d52-79b6-415e-7ddce9614367'); document.body.appendChild(_pix);}</script><noscript> <img height='1' width='1' border='0' alt='' src='https://s.amazon-adsystem.com/iui3?d=forester-did&ex-fargs=%3Fid%3Daffd6d22-7d52-79b6-415e-7ddce9614367%26type%3D55%26m%3D1&ex-fch=416613&ex-src=https://tuckerallen.com/&ex-hargs=v%3D1.0%3Bc%3D9506434650701%3Bp%3DAFFD6D22-7D52-79B6-415E-7DDCE9614367' /></noscript>
			<!-- End Amazon Pixel -->
		<?php } else { ?>
			<!-- Amazon Pixel Code would go here in production, but is disabled for development environment. -->
		<?php } ?>
<img src="https://udxsva.com/tag?id=10744" alt="" style="display:none !important;" />

<!-- Adform Tracking Code BEGIN -->
<script type="text/javascript">
    window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : (window._adftrack ? [window._adftrack] : []);
    window._adftrack.push({
        pm: 2055021
    });
    (function () { var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = 'https://a2.adform.net/serving/scripts/trackpoint/async/'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); })();

</script>
<noscript>
    <p style="margin:0;padding:0;border:0;">
        <img src="https://a2.adform.net/Serving/TrackPoint/?pm=2055021" width="1" height="1" alt="" />
    </p>
</noscript>
<!-- Adform Tracking Code END -->


	</head>

	<?php
		$additionalBodyClasses = '';
		if (isTAAdmin()) $additionalBodyClasses .= 'ta-admin';
	?>

	<?php
		if (is_active_sidebar('top-banner-area')) {
			$bodyPadding = 'padding-top: 203px;';
		} else {
			$bodyPadding = 'padding-top: 153px;';
		}
	?>

	<body <?php body_class($additionalBodyClasses); ?> itemscope itemtype="http://schema.org/WebPage" style="<?php echo $bodyPadding ?>">

		<div id="ta_tracking_snippets"><?php ta_page_specific_tracking_snippets();	?></div>
 <?php
        // When Page 50940 (ID) is being displayed.
        if (is_page (50940) || is_page (50948) )
        { ?>
         <iframe src="https://tucker-allen-legacy-builder.azurewebsites.net/" style="display:block; width:100%; height:100vh;"></iframe>
     <?php   }  ?>
		<div id="container">

			<header class="header sticky-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">

				<?php get_sidebar( 'top-banner-area' ); ?>

					<div id="hamburger"></div>

					<div id="mobile-menu">

						<?php if (TUCKERALLEN_ENVIRONMENT_NAME!='portal') { get_search_form(); } ?>

						<nav class="mobile-primary" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
	    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
	    					         'theme_location' => 'main-nav',                 // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
						</nav>
						<nav class="mobile-secondary" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Secondary Menu', 'bonestheme' ),  // nav name
	    					         'menu_class' => 'nav secondary-nav cf',               // adding custom nav class
	    					         'theme_location' => 'secondary-nav',                // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
							<?php if (is_user_logged_in()) { ?>
								<ul class="logout"><li><a href="<?php echo wp_logout_url( '/' ); ?>">Logout</a></li></ul>
							<?php } ?>
						</nav>
					</div>

					<div class="top panel">

						<nav class="secondary" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

							<?php if (TUCKERALLEN_ENVIRONMENT_NAME!='portal') { get_search_form(); } ?>

							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Secondary Menu', 'bonestheme' ),  // nav name
	    					         'menu_class' => 'nav secondary-nav cf',               // adding custom nav class
	    					         'theme_location' => 'secondary-nav',                // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
							<?php if (is_user_logged_in()) { ?>
								<ul class="logout"><li><a href="<?php echo wp_logout_url( '/' ); ?>">Logout</a></li></ul>
							<?php } ?>

						</nav>

						<div id="logo" itemscope itemtype="http://schema.org/Organization">
							<?php $urlForLogo = ( TUCKERALLEN_ENVIRONMENT_NAME == 'portal' ) ? 'https://tuckerallen.com' : home_url(); ?>
							<a href="<?php echo $urlForLogo; ?>" rel="nofollow">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/tuckerallen-logo-2020.png">
							</a>
						</div>

					</div> <!-- /.top.panel -->

					<div class="nav panel">

						<nav class="primary" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
	    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
	    					         'theme_location' => 'main-nav',                 // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>

						</nav>

						<nav class="mobile-visible">
							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Mobile Visible Menu', 'bonestheme' ),  // nav name
	    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
	    					         'theme_location' => 'mobile-visible',            // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
						</nav>

					</div> <!-- /.nav.panel -->

				</div>
   
			</header>