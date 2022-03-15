<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

require_once( 'includes/user-data-api.php' );

require_once( 'includes/person-display.php' );
require_once( 'includes/document-management.php' );
require_once( 'includes/document-handler.php');
require_once( 'includes/booking-process.php');
require_once( 'includes/booking-process-simplified.php');
require_once( 'includes/client-status.php' );
require_once( 'includes/customer-lookup.php' );
require_once( 'includes/employee-tools.php' );
require_once( 'includes/attorney-assignment.php' );

require_once( 'includes/customer-doc-management.php' );
require_once( 'includes/customer-doc-post-handler.php' );
require_once( 'includes/customer-doc-manager-display.php' );
require_once( 'includes/customer-doc-customer-display.php' );


// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

	//Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// launching operation cleanup
	add_action( 'init', 'bones_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'bones_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'bones_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	bones_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'bones_register_sidebars' );

	// cleaning up random code around images
	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );

//Disable automatic plugin updates
add_filter( 'auto_update_plugin', '__return_false' );
//Disable automatic theme updates
add_filter( 'auto_update_theme', '__return_false' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'bones-thumb-600' => __('600px by 150px'),
				'bones-thumb-300' => __('300px by 100px'),
		) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
	A good tutorial for creating your own Sections, Controls and Settings:
	http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

	Good articles on modifying the default options:
	http://natko.com/changing-default-wordpress-theme-customization-api-sections/
	http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

	To do:
	- Create a js for the postmessage transport method
	- Create some sanitize functions to sanitize inputs
	- Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
	// $wp_customize calls go here.
	//
	// Uncomment the below lines to remove the default customize sections

	// $wp_customize->remove_section('title_tagline');
	// $wp_customize->remove_section('colors');
	// $wp_customize->remove_section('background_image');
	// $wp_customize->remove_section('static_front_page');
	// $wp_customize->remove_section('nav');

	// Uncomment the below lines to remove the default controls
	// $wp_customize->remove_control('blogdescription');

	// Uncomment the following to change the default section titles
	// $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
	// $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'single-post-sidebar',
		'name' => __( 'Single Posts Sidebar', 'bonestheme' ),
		'description' => __( 'Sidebar displayed on a single post page', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'top-banner-area',
		'name' => __( 'Top Banner Area', 'bonestheme' ),
		'description' => __( 'Area for messages displayed above the site navbar', 'bonestheme' ),
		'before_widget' => '<div class="top-banner-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p>',
		'after_title' => '</p>',
	));


	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	 $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
		<article  class="cf">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content cf">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

show_admin_bar(false);

/*
Added the following code to get shortcodes for use in pages.
*/

function myshortcode_title( ){
	 return get_the_title();
}
add_shortcode( 'page_title', 'myshortcode_title' );

/*
Adjusting sizes for tag cloud.
*/
add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );
function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20;
	$args['largest'] = 16;
	$args['smallest'] = 9;
	$args['unit'] = 'px';
	return $args;
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );



function isTAAdmin(){
	return current_user_can('list_users');
}

function unparse_url($parsed_url) {
	$scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
	$host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
	$port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
	$user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
	$pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
	$pass     = ($user || $pass) ? "$pass@" : '';
	$path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
	$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
	$fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
	return "$scheme$user$pass$host$port$path$query$fragment";
}

function getTuckerAllenData() {
	$customer = getTuckerAllenCustomer();
	$json = get_user_meta($customer->ID,'tuckerallenjson',true);
	$json = str_replace('www.flexbooker.com', 'a.flexbooker.com', $json);
	$tuckerAllenJSON = json_decode($json,true);
	return $tuckerAllenJSON;
}

function getTuckerAllenDocuments() {
	$ta = getTuckerAllenData();
	if (isset($ta['Documents'])) return $ta['Documents'];
	return;
}

function getTuckerAllenCustomer() {
	$user = wp_get_current_user();
	$selectedCustomer = getSelectedCustomer();
	if ($selectedCustomer) $user = $selectedCustomer;
	return $user;
}

function getSelectedCustomer() {
	$user = false;
	if (isTAAdmin()) {
		if (isset($_GET['id'])) {
			$requestedUser = get_user_by('id',$_GET['id']);
			if ($requestedUser) $user = $requestedUser;
		}
		if (isset($_GET['email'])) {
			$requestedUser = get_user_by('email',$_GET['email']);
			if ($requestedUser) $user = $requestedUser;
		}
		if (isset($_GET['slug'])) {
			$requestedUser = get_user_by('slug',$_GET['slug']);
			if ($requestedUser) $user = $requestedUser;
		}
	}
	return $user;
}

function customerIsSelected() {
	return getSelectedCustomer() != false;
}

function getCurrentDateTime() {
	return new DateTime();
}

function getLastAppointment() {
	$ta = getTuckerAllenData();
	if (isset($ta['Booking'])) {
		$booking = $ta['Booking'];
		if (isset($booking['Last'])) {
			return $booking['Last'];
		}
	}
	return false;
}

function getFutureAppointment() {
	$last = getLastAppointment();
	if ($last) {
		if (isset($last['ISO'])) {
			$bookedAt = new DateTime($last['ISO']);
			$now = getCurrentDateTime();
			if ($bookedAt > $now) {
				return $last;
			}
		}
	}
	return false;
}

function getTuckerAllenDeliveryPhase() {
	$customer = getTuckerAllenCustomer();

	// NEW WAY
	$visibleDocs = TACustomerDocCustomerDisplay::instance()->getVisibleDocumentsForID($customer->ID);

	if (count($visibleDocs)>0) {
		$final = 0;
		$draft = 0;
		$empty = 0;
		foreach ($visibleDocs as $key=>$customerDoc ) {
			if ($customerDoc['viewState']=='draft') $draft++;
			if ($customerDoc['viewState']=='pdf') $draft++;
			if ($customerDoc['viewState']=='final') $final++;
			if ($customerDoc['viewState']=='signed') $final++;
		}
		if ($draft>0) return 'draft-documents';
		if ($final>0) return 'final-documents';
		return 'no-documents';
	}

	return 'no-documents';

	// OLD WAY
	$currentDocs = getDocumentsInfoForUser($customer->ID);

	if (count(get_object_vars($currentDocs))>0) {
		$final = 0;
		$draft = 0;
		$empty = 0;
		foreach ($currentDocs as $key=>$value ) {
			if (strtolower($value->State)=='draft') $draft++;
			if (strtolower($value->State)=='final') $final++;
			if (strtolower($value->State)=='empty') $empty++;
		}
		if ($draft>0) return 'draft-documents';
		if ($final>0) return 'final-documents';
		return 'no-documents';
	}

	return 'no-documents';
}

function getFollowupURL() {
	if (getFutureAppointment()) return false; // no followups if we have a future appointment already booked
	$ta = getTuckerAllenData();
	if (isset($ta['Booking'])) {
		$booking = $ta['Booking'];
		if (isset($booking['Last']) && isset($booking['FollowupURL'])) { // must have a past appointment to book a followup
			$followupURL = $booking['FollowupURL'];
			if (is_string($followupURL)) return $followupURL;
			if (is_array($followupURL) && isset($followupURL['prod'])) return $followupURL['prod'];
		}
	}
	return false;
}

function getLastLocationId() {
	$last = getLastAppointment();
	if ($last) {
		return $last['LocationID'];
	}
	return false;
}

function getLastAttorneyId() {
	$last = getLastAppointment();
	if ($last) {
		return $last['EmployeeID'];
	}
	return false;
}

function addFollowupServices($url) {
	return setURLParameter($url, 'serviceIds', '13022,13023');
}

function addFollowupCallService($url) {
	return setURLParameter($url, 'serviceIds', '13023');
}

function addFollowupMeetingService($url) {
	return setURLParameter($url, 'serviceIds', '13022');
}

function addSigningService($url) {
	return setURLParameter($url, 'serviceIds', '13024');
}

function addAttorney($url) {
	$customer = getTuckerAllenCustomer();
	$attorneyId = TAAttorneyAssignment::instance()->getFlexbookerEmployeeIdForClient($customer->ID);
	//$attorneyId = getLastAttorneyId();
	if ($attorneyId) return setURLParameter($url, 'employeeId', $attorneyId);
	return $url;
}

function addLocation($url) {
	$locationId = getLastLocationId();
	if ($locationId) return setURLParameter($url, 'locationId', $locationId);
	return $url;
}

function setURLParameter($url, $name, $value) {
	$parsed_url = parse_url($url);
	$query = explode('&',$parsed_url['query']);
	if ($query[0]=='') array_unshift($query);
	$doesntExist = true;
	foreach ($query as $key => $pair) {
		$parts = explode('=',$pair);
		if ($parts[0] == $name) {
			$doesntExist = false;
			$query[$key] = $name.'='.$value;
		}
	}
	if ($doesntExist) array_push($query, $name.'='.$value);
	$parsed_url['query'] = implode('&',$query);
	return unparse_url($parsed_url);
}

// DEPRECATED
function ta_my_documents_function( $atts, $content = "" ) {

	$atts = shortcode_atts( array(
		'class' => '',
		'includetypes' => '',
		'excludetypes' => ''
	), $atts, 'ta_my_documents' );

	$classes = explode(' ', $atts['class']);
	if ($classes[0]=='') array_shift($classes);
	array_push($classes, 'ta-documents-list');

	$ta = getTuckerAllenData();
	$html = '';
	$html .= '<div class="'. implode(' ', $classes) . '">';

	$includeTypes = explode(',', $atts['includetypes']);
	$excludeTypes = explode(',', $atts['excludetypes']);

	/*
	if (isset($ta['Documents'])) {
		$documents = $ta['Documents'];
		*/
	$docs = getTuckerAllenDocuments();
	if (isset($docs)) {
		$documents = $docs;
		//

		ksort($documents);
		$html .= '<ul>';
		foreach ($documents as $key=>$value ) {
			$type = $value['Type'];
			if ( !in_array($type, $excludeTypes) ) {
				if ( ($includeTypes[0]=='') || (in_array($type, $includeTypes)) ) {
					$html .= '<li>';
					$html .= '<a href="' . $value['URL'] . '" target="_blank">' . $key . '</a>';
					$html .= '<div class="document-data">';
					$html .= '<span class="document-state ' . strToLower($value['State']) . '">' . $value['State'] . '</span>';
					//$html .= '<span class="last-modified-date">' . date("F j, Y" , strtotime($value['Updated'])) . '</span>';
					$html .= '</div>';
					$html .= '</li>';
				}
			}
		}
		$html .= '</ul>';
	} else {
		$html .= '<p>No documents are currently available.</p>';
	}

	$html .= '</div>';

	return $html;

}

add_shortcode( 'ta_my_documents', 'ta_my_documents_function' );



function ta_attorney_info_function( $atts, $content = "" ) {

	$atts = shortcode_atts( array(
		'value' => 'FullName',
		'link' => 'false'
	), $atts, 'ta_attorney_info' );

	$ta = getTuckerAllenData();
	$html = '<span class="ta-attorney-info error">(Unavailable)</span>';

	if (isset($ta['Attorney'])) {
		$attorney = $ta['Attorney'];
		$requestedValue = $attorney[$atts['value']];
		if ($atts['value']=='Email' && $atts['link']) {
			$html = '<a  href="mailto:' . $requestedValue . '" class="ta-attorney-info ' . $atts['value'] . '">' . $requestedValue . '</a>';
		} else {
			$html = '<span class="ta-attorney-info ' . $atts['value'] . '">' . $requestedValue . '</span>';
		}
	}

	return $html;
}

add_shortcode( 'ta_attorney_info', 'ta_attorney_info_function' );



function ta_customer_info_function( $atts, $content = "" ) {

	$atts = shortcode_atts( array(
		'value' => 'name',
		'link' => 'false'
	), $atts, 'ta_customer_info' );

	$tac = getTuckerAllenCustomer();
	$requestedValue = $tac->{'display_name'};

	$html = '<span class="ta-customer-info ' . $atts['value'] . '">' . $requestedValue . '</span>';

	return $html;
}

add_shortcode( 'ta_customer_info', 'ta_customer_info_function' );


function ta_selected_customer_info_function( $atts, $content = "" ) {

	$atts = shortcode_atts( array(
		'value' => 'display_name'
	), $atts, 'ta_selected_customer_info' );

	$html = "";

	$sc = getSelectedCustomer();
	if ($sc) {
		$requestedValue = $sc->{$atts['value']};
		$html = '<span class="ta-customer-info ' . $atts['value'] . '">' . $requestedValue . '</span>';
	}

	return $html;
}

add_shortcode( 'ta_selected_customer_info', 'ta_selected_customer_info_function' );

function ta_if_function( $atts, $content = "" ) {

	$atts = shortcode_atts( array(
		'futureappointment' => '',
		'documentstate' => ''
	), $atts, 'ta_if' );

	if (!empty($atts['documentstate'])) {
		if ($atts['documentstate']!= getTuckerAllenDeliveryPhase()) return '';
	}

	if (!empty($atts['futureappointment'])) {
		if (($atts['futureappointment'] == 'true') && !getFutureAppointment()) return '';
		if (($atts['futureappointment'] == 'false') && getFutureAppointment()) return '';
	}

	return do_shortcode($content);
}

add_shortcode( 'ta_if', 'ta_if_function' );


function ta_current_booking_function( $atts, $content = "" ) {

	$html = '';

	$futureAppt = getFutureAppointment();
	if ($futureAppt) {
		$html  = '<div class="ta-current-booking">';
			$html .= '<h2>Next Appointment</h2>';
			$html .= '<div><strong>' . $futureAppt['BookingDescription'] . '</strong></div>';
			$html .= '<div>' . $futureAppt['Date'] . '</div>';
			$html .= '<div><strong>' . $futureAppt['LocationName'] . '</strong></div>';
			$html .= '<div>' . $futureAppt['LocationAddress'] . '</div>';
			$html .= '<div class="user-choices">';
				$html .= '<a class="button" href="' . $futureAppt['InvitationURL'] . '"><span>Add to calendar</span></a> ';
				$html .= '<div><span class="change-or-cancel booking-trigger" data-bookingurl="' . $futureAppt['ChangeURL'] . '"><span>I need to change or cancel this appointment</span></span></div>';
			$html .= '</div>';
		$html .= '</div>';
	}

	return $html;
}

add_shortcode( 'ta_current_booking', 'ta_current_booking_function' );



/* NO LONGER IN USE

function ta_book_followup_function( $atts, $content = "" ) {

	$html = '';

	if (getFutureAppointment()) return $html;
	if (getTuckerAllenDeliveryPhase()=='draft-documents') {
		$url = getFollowupURL();
		if ($url) {
			//$url = addAttorney($url);
			$url = addLocation($url);
			$notSigningURL = addFollowupServices($url);
			$phonecallURL = addFollowupCallService($url);
			$meetingURL = addFollowupMeetingService($url);
			$signingURL = addSigningService($url);
			$html  = '<div class="ta-followup-options">';
				$html .= '<h2>What comes next?</h2>';
				$html .= '<div>';
					$html .= '<span class="button booking-trigger phone" data-bookingurl="' . $phonecallURL . '"><span>Schedule a phone call</span></span>';
					$html .= '<span class="button booking-trigger meeting" data-bookingurl="' . $meetingURL . '"><span>Schedule a meeting</span></span>';
					$html .= '<span class="button booking-trigger signing" data-bookingurl="' . $signingURL . '"><span>I\'m Ready to Sign</span></span> ';
					//$html .= '<span class="button booking-trigger" data-bookingurl="' . $notSigningURL . '"><span>I Have Questions</span></span>';
				$html .= '</div>';
			$html .= '</div>';
		}
	}

	return $html;
}

add_shortcode( 'ta_book_followup', 'ta_book_followup_function' );

*/


function ta_book_signing_button_function( $atts, $content = "" ) {
	$html = '';
	if (getFutureAppointment()) return $html;
	$url = getFollowupURL();
	if ($url) {
		$url = addAttorney($url);
		$url = addLocation($url);
		$signingURL = addSigningService($url);
		$html  = '<div class="ta-followup-options">';
			$html .= '<span class="button booking-trigger signing" data-bookingurl="' . $signingURL . '"><span>Schedule Signing Appointment</span></span> ';
		$html .= '</div>';
	}
	return $html;
}
add_shortcode( 'ta_book_signing_button', 'ta_book_signing_button_function' );



function ta_book_phonecall_button_function( $atts, $content = "" ) {
	$html = '';
	$url = getFollowupURL();
	if ($url) {
		$url = addAttorney($url);
		$url = addLocation($url);
		$phonecallURL = addFollowupCallService($url);
		$html  = '<div class="ta-followup-options">';
		$html .= '<span class="button booking-trigger phone" data-bookingurl="' . $phonecallURL . '"><span>Schedule a phone call</span></span>';
		$html .= '</div>';
	}
	return $html;
}
add_shortcode( 'ta_book_phonecall_button', 'ta_book_phonecall_button_function' );



function ta_book_meeting_button_function( $atts, $content = "" ) {
	$html = '';
	$url = getFollowupURL();
	if ($url) {
		$url = addAttorney($url);
		$url = addLocation($url);
		$meetingURL = addFollowupMeetingService($url);
		$html  = '<div class="ta-followup-options">';
		$html .= '<span class="button booking-trigger meeting" data-bookingurl="' . $meetingURL . '"><span>Schedule a meeting</span></span>';
		$html .= '</div>';
	}
	return $html;
}
add_shortcode( 'ta_book_meeting_button', 'ta_book_meeting_button_function' );



function ta_send_email_button_function( $atts, $content = "" ) {
	$html = '';
	$ta = getTuckerAllenData();
	if (isset($ta['Attorney'])) {
		$email = $ta['Attorney']['Email'];
		if (isset($email)) {
			$html  = '<div class="ta-followup-options">';
			$html .= '<a href="mailto:'.$email.'" class="button email"><span>Send an email</span></a>';
			$html .= '</div>';
		}
	}
	return $html;
}
add_shortcode( 'ta_send_email_button', 'ta_send_email_button_function' );



function ta_delivery_phase_function( $atts, $content = "" ) {

	$html = 'No documents yet';
	if (getTuckerAllenDeliveryPhase()=='draft-documents') $html = 'Draft documents';
	if (getTuckerAllenDeliveryPhase()=='final-documents') $html = 'Final documents';
	return $html;
}

add_shortcode( 'ta_delivery_phase', 'ta_delivery_phase_function' );




// USED BY FOLLOWUP BOOKINGS

function ta_booking_widget_function( $atts, $content = "" ) {

	$html = '<div class="booking-form"><iframe id="flexbooker-booking-form" style="border:none; width: 100%;" scrolling="no"></iframe></div>';

	return $html;
}

add_shortcode( 'ta_booking_widget', 'ta_booking_widget_function' );




/* SHORTCODE FOR PAGE TITLE */

function page_title_function( ){
	 return get_the_title();
}
add_shortcode( 'page_title', 'page_title_function' );


function add_this_function( $atts, $content = "" ) {

	$html = '<div class="addthis_sharing_toolbox"></div>';

	return $html;
}

add_shortcode( 'add_this', 'add_this_function' );


/* Enable Divi Builder on all post types with an editor box */
function myprefix_add_post_types($post_types) {
	foreach(get_post_types() as $pt) {
		if (!in_array($pt, $post_types) and post_type_supports($pt, 'editor')) {
			$post_types[] = $pt;
		}
	}
	return $post_types;
}
add_filter('et_builder_post_types', 'myprefix_add_post_types');

/* Add Divi Custom Post Settings box */
function myprefix_add_meta_boxes() {
	foreach(get_post_types() as $pt) {
		if (post_type_supports($pt, 'editor') and function_exists('et_single_settings_meta_box')) {
			add_meta_box('et_settings_meta_box', __('Divi Custom Post Settings', 'Divi'), 'et_single_settings_meta_box', $pt, 'side', 'high');
		}
	}
}
add_action('add_meta_boxes', 'myprefix_add_meta_boxes');

/* Ensure Divi Builder appears in correct location */
function myprefix_admin_js() {
	$s = get_current_screen();
	if(!empty($s->post_type) and $s->post_type!='page' and $s->post_type!='post') {
?>
<script>
jQuery(function($){
	$('#et_pb_layout').insertAfter($('#et_pb_main_editor_wrap'));
});
</script>
<style>
#et_pb_layout { margin-top:20px; margin-bottom:0px }
</style>
<?php
	}
}
add_action('admin_head', 'myprefix_admin_js');

function get_divi_library_item($my_postid) {

  $content_post = get_post($my_postid);
  $content = $content_post->post_content;
  $expanded = do_shortcode($content);
  //$content = apply_filters('the_content', $content);
  //$expanded = str_replace(']]>', ']]&gt;', $expanded);

 echo $expanded;

}

function my_loginURL() {
    return 'https://tuckerallen.com';
}
add_filter('login_headerurl', 'my_loginURL');

function login_message_filter($content){
	//$site_url = get_site_url();
	if (TUCKERALLEN_SHOW_ENVIRONMENT_WARNING) {
		$content .= '<div class="devsite-warning">Warning: This is the '.TUCKERALLEN_ENVIRONMENT_NAME.' site.</div>';
	}
	if (TUCKERALLEN_ENVIRONMENT_NAME=='portal') {
		$email = antispambot('helpdesk@tuckerallen.com');
		//$content .= '<style>#login>h1:first-child {display:none;} </style>';
		//$content .= '<h1><a href="https://tuckerallen.com" title="TuckerAllen Estate Planning Attorneys" tabindex="-1">TuckerAllen Estate Planning Attorneys</a></h1>';
		$content .= '<h3>Welcome to the TuckerAllen client portal.</h3>';
		$content .= '<p>As a client of TuckerAllen, you may securely access your estate planning documents by logging in.</p>';
		$content .= '<p>If you have any problems or questions, please call <a style="white-space:nowrap;" href="tel:314-335-1100">314-335-1100</a> or email <a href="mailto:'.$email.'">'.$email.'</a>.</p>';
	}
	return $content;
}

add_filter ( 'login_message', 'login_message_filter');

function login_custom_footer($content) {
	if (TUCKERALLEN_ENVIRONMENT_NAME=='portal') {
		echo '<style>
			#backtoblog {display:none;}
			.replacement-backtoblog {width:272px; margin:16px auto;}
			.replacement-backtoblog a {text-decoration: none; color: #555d66;}
			.replacement-backtoblog a:hover {color: #00a0d2;}
		</style>
		<div class="replacement-backtoblog"><a href="https://tuckerallen.com">← Back to TuckerAllen</a></div>';
	}
}
add_action('login_footer','login_custom_footer');

// Include excerpt field for pages

function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}

add_action('init', 'my_custom_init');


// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');


/**
 * Hide email from Spam Bots using a shortcode.
 *
 * @param array  $atts    Shortcode attributes. Not used.
 * @param string $content The shortcode content. Should be an email address.
 *
 * @return string The obfuscated email address.
 */
function wpcodex_hide_email_shortcode( $atts , $content = null ) {
	$atts = shortcode_atts( array(
		'class' => '',
		'data-tracking-location' => ''
	), $atts, 'email' );
	if ( ! is_email( $content ) ) {
		return;
	}

	$html = '<a href="mailto:' . antispambot( $content ) . '"' .
			( empty($atts['class']) ? '' : ' class="' . $atts['class'] . '"' ) .
			( empty($atts['data-tracking-location']) ? '' : ' data-tracking-location="' . $atts['data-tracking-location'] . '"' ) .
			'>' . antispambot( $content ) . '</a>';
	return $html;
}
add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );



// USED IN PAGE HEADER
function ta_page_specific_tracking_snippets() {
	global $wp_query;
	$thisPostID = $wp_query->post->ID;
	if ($thisPostID) {
		$snippet = get_post_meta($thisPostID,'page-specific-tracking-snippets', true);
		echo $snippet;
	}
}


/* NO LONGER IN USE

function attorney_tools_function( ){
	 if (!isTAAdmin()) return;

	$html = '<div class="attorney-tools">';
	$html .= '<div class="non-divi-content">';
	$html .= '<h3>Attorney Tools</h3>';
	$html .= '<input type="text" name="customer" id="customer-search" />';
	// $html .= '<span>Select a customer:</span> ';
	// $html .= '<select id="customer-selector">';
	// $html .= '<option value="">Myself</option>';
	// $html .= '</select>';
	$html .= '</div>';
	$html .= '</div>';
	return $html;
}

add_shortcode( 'attorney_tools', 'attorney_tools_function' );

*/





function getDataToExposeInJavascript() {
	$data = array();
	try {
		$customer = getTuckerAllenCustomer();
		$data['slug']				= get_post_field( 'post_name', get_post() );
		$data['currentCustomerId'] 	= $customer->ID;
		$data['restAPINonce'] 		= wp_create_nonce( 'wp_rest' );
		$data['environment'] 		= TUCKERALLEN_ENVIRONMENT_NAME;
		$data['locations']			= get_locations();
		$data['booking']			= get_booking_data();
		$data['services']			= get_services();
		$data['employee']			= isTAAdmin();
	}
	catch (Exception $e) {

	}
	return $data;
}

function print_menu_shortcode($atts, $content = null) {
	if (is_admin()) return'';
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
	if( is_tag() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});

/* remove srcset */
add_filter('wp_get_attachment_image_attributes', function($attr) {
    if (isset($attr['sizes'])) unset($attr['sizes']);
    if (isset($attr['srcset'])) unset($attr['srcset']);
    return $attr;
}, PHP_INT_MAX);
add_filter('wp_calculate_image_sizes', '__return_false', PHP_INT_MAX);
add_filter('wp_calculate_image_srcset', '__return_false', PHP_INT_MAX);
remove_filter('the_content', 'wp_make_content_images_responsive');

/* Legacy Builder Styling */
function legacy_custom_css() {
	 if (is_page (50940)) {
  wp_register_style('my_custom_css', get_template_directory_uri() . '/library/css/legacybuilder.css');
  wp_enqueue_style( 'my_custom_css');
	}
}
add_action('wp_enqueue_scripts', 'legacy_custom_css', 1000);

/* DON'T DELETE THIS CLOSING TAG */ ?>