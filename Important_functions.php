<?php
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

    if (!is_admin() || 'default' != $domain)
        return $translated;

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