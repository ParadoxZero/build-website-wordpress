<?php
/**
 * Clean Retina defining constants, adding files and WordPress core functionality.
 *
 * Defining some constants, loading all the required files and Adding some core functionality.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @package Theme Horse
 * @subpackage Clean_Retina
 * @since Clean Retina 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;

add_action( 'cleanretina_init', 'cleanretina_constants', 10 );
/**
 * This function defines the Clean Retina theme constants
 *
 * @since 1.0
 */
function cleanretina_constants() {

	/** Define Directory Location Constants */
	define( 'CLEANRETINA_PARENT_DIR', get_template_directory() );
	define( 'CLEANRETINA_CHILD_DIR', get_stylesheet_directory() );
	define( 'CLEANRETINA_IMAGES_DIR', CLEANRETINA_PARENT_DIR . '/images' );
	define( 'CLEANRETINA_LIBRARY_DIR', CLEANRETINA_PARENT_DIR. '/library' );
	define( 'CLEANRETINA_ADMIN_DIR', CLEANRETINA_LIBRARY_DIR . '/admin' );
	define( 'CLEANRETINA_JS_DIR', CLEANRETINA_LIBRARY_DIR . '/js' );
	define( 'CLEANRETINA_CSS_DIR', CLEANRETINA_LIBRARY_DIR . '/css' );	
	define( 'CLEANRETINA_FUNCTIONS_DIR', CLEANRETINA_LIBRARY_DIR . '/functions' );
	define( 'CLEANRETINA_SHORTCODES_DIR', CLEANRETINA_LIBRARY_DIR . '/footer_info' );
	define( 'CLEANRETINA_STRUCTURE_DIR', CLEANRETINA_LIBRARY_DIR . '/structure' );
	if ( ! defined( 'CLEANRETINA_LANGUAGES_DIR' ) ) /** So we can define with a child theme */
		define( 'CLEANRETINA_LANGUAGES_DIR', CLEANRETINA_LIBRARY_DIR . '/languages' );
	define( 'CLEANRETINA_WIDGETS_DIR', CLEANRETINA_LIBRARY_DIR . '/widgets' );

	/** Define URL Location Constants */
	define( 'CLEANRETINA_PARENT_URL', get_template_directory_uri() );
	define( 'CLEANRETINA_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'CLEANRETINA_IMAGES_URL', CLEANRETINA_PARENT_URL . '/images' );
	define( 'CLEANRETINA_LIBRARY_URL', CLEANRETINA_PARENT_URL . '/library' );
	define( 'CLEANRETINA_ADMIN_URL', CLEANRETINA_LIBRARY_URL . '/admin' );
	define( 'CLEANRETINA_JS_URL', CLEANRETINA_LIBRARY_URL . '/js' );
	define( 'CLEANRETINA_CSS_URL', CLEANRETINA_LIBRARY_URL . '/css' );
	define( 'CLEANRETINA_FUNCTIONS_URL', CLEANRETINA_LIBRARY_URL . '/functions' );
	define( 'CLEANRETINA_SHORTCODES_URL', CLEANRETINA_LIBRARY_URL . '/footer_info' );
	define( 'CLEANRETINA_STRUCTURE_URL', CLEANRETINA_LIBRARY_URL . '/structure' );
	if ( ! defined( 'CLEANRETINA_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'CLEANRETINA_LANGUAGES_URL', CLEANRETINA_LIBRARY_URL . '/languages' );
	define( 'CLEANRETINA_WIDGETS_URL', CLEANRETINA_LIBRARY_URL . '/widgets' );

}

add_action( 'cleanretina_init', 'cleanretina_load_files', 15 );
/**
 * Loading the included files.
 *
 * @since 1.0
 */
function cleanretina_load_files() {
	/** 
	 * cleanretina_add_files hook
	 *
	 * Adding other addtional files if needed.
	 */
	do_action( 'cleanretina_add_files' );

	/** Load functions */
	require_once( CLEANRETINA_FUNCTIONS_DIR . '/i18n.php' );
	require_once( CLEANRETINA_FUNCTIONS_DIR . '/custom-header.php' );
	require_once( CLEANRETINA_FUNCTIONS_DIR . '/functions.php' );
	require_once( CLEANRETINA_FUNCTIONS_DIR . '/customizer.php' );

	require_once( CLEANRETINA_ADMIN_DIR . '/cleanretina-themeoptions-defaults.php' );
	require_once( CLEANRETINA_ADMIN_DIR . '/cleanretina-metaboxes.php' );
	require_once( CLEANRETINA_ADMIN_DIR . '/cleanretina-custom-post-types.php' );
	require_once( CLEANRETINA_ADMIN_DIR . '/cleanretina-show-post-id.php' );

	/** Load Shortcodes */
	require_once( CLEANRETINA_SHORTCODES_DIR . '/cleanretina-footer_info.php' );

	/** Load Structure */
	require_once( CLEANRETINA_STRUCTURE_DIR . '/header-extensions.php' );
	require_once( CLEANRETINA_STRUCTURE_DIR . '/searchform-extensions.php' );
	require_once( CLEANRETINA_STRUCTURE_DIR . '/sidebar-extensions.php' );
	require_once( CLEANRETINA_STRUCTURE_DIR . '/footer-extensions.php' );
	require_once( CLEANRETINA_STRUCTURE_DIR . '/archive-gallery-extensions.php' );
	require_once( CLEANRETINA_STRUCTURE_DIR . '/page-template-corporate-extensions.php' );

	/** Load Widgets and Widgetized Area */
	require_once( CLEANRETINA_WIDGETS_DIR . '/cleanretina_widgets.php' );
}

add_action( 'cleanretina_init', 'cleanretina_core_functionality', 20 );
/**
 * Adding the core functionality of WordPess.
 *
 * @since 1.0
 */
function cleanretina_core_functionality() {
	/** 
	 * cleanretina_add_functionality hook
	 *
	 * Adding other addtional functionality if needed.
	 */
	do_action( 'cleanretina_add_functionality' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' ); 
		
	// Remove WordPress version from header for security concern
	remove_action( 'wp_head', 'wp_generator' );
 
	// This theme uses wp_nav_menu() in header menu location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'cleanretina' ) );

	// Add Clean Retina custom image sizes
	add_image_size( 'featured', 700, 290, true);
	add_image_size( 'featured-medium', 330, 330, true);
	add_image_size( 'slider', 962, 390, true); 		// used on Featured Slider on Homepage Header
	add_image_size( 'gallery', 330, 230, true); 		// used to show gallery all images

	/**
	 * This theme supports custom background color and image
	 */
	add_theme_support( 'custom-background' );

	// Adding excerpt option box for pages as well
	add_post_type_support( 'page', 'excerpt' );
}

/** 
 * cleanretina_init hook
 *
 * Hooking some functions of functions.php file to this action hook.
 */
do_action( 'cleanretina_init' );


/* redirect users to front page after login */
function redirect_to_front_page() {
global $redirect_to;
if (!isset($_GET['redirect_to'])) {
$redirect_to = get_option('siteurl');
}
}
add_action('login_form', 'redirect_to_front_page');

function remove_admin_bar_links() {
    global $wp_admin_bar, $current_user;
    
    if ($current_user->ID != 1) {
        $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
        $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
        $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
        $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
        $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
        $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
        //$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
        $wp_admin_bar->remove_menu('new-content');      // Remove the content link
        $wp_admin_bar->remove_menu('updates');          // Remove the updates link
        $wp_admin_bar->remove_menu('comments');         // Remove the comments link
        $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
    }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function remove_admin_menu_items() {
	if ($current_user->ID != 1) {
	$remove_menu_items = array(__('Comments'),__('Tools'),__('Profile'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
	}
}

add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    //if (!is_admin() || 'default' != $domain)
    //    return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}

add_action('admin_menu', 'remove_admin_menu_items');
function remove_the_dashboard () {
if (current_user_can('level_10')) {
return;}else {
global $menu, $submenu, $user_ID;
$the_user = new WP_User($user_ID);
reset($menu); $page = key($menu);
while ((__('Dashboard') != $menu[$page][0]) && next($menu))
$page = key($menu);
if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
reset($menu); $page = key($menu);
while (!$the_user->has_cap($menu[$page][1]) && next($menu))
$page = key($menu);
if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
wp_redirect(get_option('siteurl') . '/wp-admin/post-new.php');}}
add_action('admin_menu', 'remove_the_dashboard');
?>