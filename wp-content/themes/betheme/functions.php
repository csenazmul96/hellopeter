<?php
/**
 * Theme Functions
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'betheme' );
define( 'THEME_VERSION', '20.1' );

define( 'LIBS_DIR', THEME_DIR. '/functions' );
define( 'LIBS_URI', THEME_URI. '/functions' );
define( 'LANG_DIR', THEME_DIR. '/languages' );

add_filter( 'widget_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop' );
add_filter( 'the_excerpt', 'do_shortcode' );


/* ----------------------------------------------------------------------------
 * White Label
 * IMPORTANT: We recommend the use of Child Theme to change this
 * ---------------------------------------------------------------------------- */
defined( 'WHITE_LABEL' ) or define( 'WHITE_LABEL', false );


/* ----------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------- */
load_theme_textdomain( 'betheme',  LANG_DIR );	// frontend
load_theme_textdomain( 'mfn-opts', LANG_DIR );	// backend


/* ----------------------------------------------------------------------------
 * Loads the Options Panel
 * ---------------------------------------------------------------------------- */
if( ! function_exists( 'mfn_admin_scripts' ) )
{
	function mfn_admin_scripts() {
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
}   
add_action( 'wp_enqueue_scripts', 'mfn_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'mfn_admin_scripts' );
	
require( THEME_DIR .'/muffin-options/theme-options.php' );


/* ----------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------- */

$theme_disable = mfn_opts_get( 'theme-disable' );

// Functions ------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-functions.php' );

// Header ---------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-head.php' );

// Menu -----------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-menu.php' );
if( ! isset( $theme_disable['mega-menu'] ) ){
	require_once( LIBS_DIR .'/theme-mega-menu.php' );
}

// Muffin Builder -------------------------------------------------------------
require_once( LIBS_DIR .'/builder/fields.php' );
require_once( LIBS_DIR .'/builder/back.php' );
require_once( LIBS_DIR .'/builder/front.php' );

// Custom post types ----------------------------------------------------------
$post_types_disable = mfn_opts_get( 'post-type-disable' );

if( ! isset( $post_types_disable['client'] ) ){
	require_once( LIBS_DIR .'/meta-client.php' );
}
if( ! isset( $post_types_disable['offer'] ) ){
	require_once( LIBS_DIR .'/meta-offer.php' );
}
if( ! isset( $post_types_disable['portfolio'] ) ){
	require_once( LIBS_DIR .'/meta-portfolio.php' );
}
if( ! isset( $post_types_disable['slide'] ) ){
	require_once( LIBS_DIR .'/meta-slide.php' );
}
if( ! isset( $post_types_disable['testimonial'] ) ){
	require_once( LIBS_DIR .'/meta-testimonial.php' );
}

if( ! isset( $post_types_disable['layout'] ) ){
	require_once( LIBS_DIR .'/meta-layout.php' );
}
if( ! isset( $post_types_disable['template'] ) ){
	require_once( LIBS_DIR .'/meta-template.php' );
}

require_once( LIBS_DIR .'/meta-page.php' );
require_once( LIBS_DIR .'/meta-post.php' );

// Content --------------------------------------------------------------------
require_once( THEME_DIR .'/includes/content-post.php' );
require_once( THEME_DIR .'/includes/content-portfolio.php' );

// Shortcodes -----------------------------------------------------------------
require_once( LIBS_DIR .'/theme-shortcodes.php' );
require_once( LIBS_DIR .'/custom_shortcodes.php' );

// Hooks ----------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-hooks.php' );

// Widgets --------------------------------------------------------------------
require_once( LIBS_DIR .'/widget-functions.php' );

require_once( LIBS_DIR .'/widget-flickr.php' );
require_once( LIBS_DIR .'/widget-login.php' );
require_once( LIBS_DIR .'/widget-menu.php' );
require_once( LIBS_DIR .'/widget-recent-comments.php' );
require_once( LIBS_DIR .'/widget-recent-posts.php' );
require_once( LIBS_DIR .'/widget-tag-cloud.php' );

// TinyMCE --------------------------------------------------------------------
require_once( LIBS_DIR .'/tinymce/tinymce.php' );

// Plugins --------------------------------------------------------------------
require_once( LIBS_DIR .'/class-love.php' );
require_once( LIBS_DIR .'/plugins/visual-composer.php' );

// WooCommerce specified functions
if( function_exists( 'is_woocommerce' ) ){
	require_once( LIBS_DIR .'/theme-woocommerce.php' );
}

// Disable responsive images in WP 4.4+ if Retina.js enabled
if( mfn_opts_get( 'retina-js' ) ){
	add_filter( 'wp_calculate_image_srcset', '__return_false' );
}

// Hide activation and update specific parts ----------------------------------

// Slider Revolution
if( ! mfn_opts_get( 'plugin-rev' ) ){
	if( function_exists( 'set_revslider_as_theme' ) ){
		set_revslider_as_theme();
	}
}

// LayerSlider
if( ! mfn_opts_get( 'plugin-layer' ) ){
	add_action( 'layerslider_ready', 'mfn_layerslider_overrides' );
	function mfn_layerslider_overrides() {
		// Disable auto-updates
		$GLOBALS['lsAutoUpdateBox'] = false;
	}
}

// Visual Composer 
if( ! mfn_opts_get( 'plugin-visual' ) ){
	add_action( 'vc_before_init', 'mfn_vcSetAsTheme' );
	function mfn_vcSetAsTheme() {
		vc_set_as_theme();
	}
}

// Dashboard ------------------------------------------------------------------
if( is_admin() ){
	
	require_once LIBS_DIR .'/admin/class-mfn-api.php';
	require_once LIBS_DIR .'/admin/class-mfn-helper.php';
	require_once LIBS_DIR .'/admin/class-mfn-update.php';
	
	require_once LIBS_DIR .'/admin/class-mfn-dashboard.php';
	$mfn_dashboard = new Mfn_Dashboard();
	
	if( ! isset( $theme_disable['demo-data'] ) ){
		require_once LIBS_DIR .'/importer/class-mfn-importer.php';
	}

	require_once LIBS_DIR .'/admin/tgm/class-mfn-tgmpa.php';
	require_once LIBS_DIR .'/admin/class-mfn-status.php';
	require_once LIBS_DIR .'/admin/class-mfn-support.php';
	require_once LIBS_DIR .'/admin/class-mfn-changelog.php';
}

if(isset($_POST['submit'])){ 
	 global $wpdb;  
    $tablename='wp_users';
    $date= new DateTime(); 
    $date= date_format($date,'Y-m-d H:i:s');
    $email=$_POST['email'];
    $myrows = $wpdb->get_results("SELECT * FROM wp_users WHERE user_email = '".$email."'");  
    if(!empty($myrows)){  
    	echo "<script language='javascript'> window.location = 'http://localhost/wpbetheme/user-registation/' </script>";
    }else{ 
	    $data=array(
	        'user_login' => $_POST['user_name'], 
	        'user_pass' => wp_hash_password($_POST['password']),
	        'user_nicename' => $_POST['name'], 
	        'user_email' => $_POST['email'],
	        'user_phone' => $_POST['number'], 
	        'user_url' => ' dfgfdg', 
	        'user_activation_key'=>'',
	        'user_registered' => $date, 
	        'display_name' => $_POST['user_name']); 

	     $user_id = wp_insert_user($data);
	    if ( $user_id && !is_wp_error( $user_id ) ) {
	        $code = sha1( $user_id . time() );
	        $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink( /* YOUR ACTIVATION PAGE ID HERE */ )); 
	        add_user_meta( $user_id, 'has_to_be_activated', $code, true );
	        wp_mail( $email, 'ACTIVATION SUBJECT', 'CONGRATS BLA BLA BLA. HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
	    }
	    echo "<script language='javascript'> window.location = 'http://localhost/wpbetheme/user-registation/' </script>";
 	}
}
// Custom REview post type create
 function create_post_type() {
  register_post_type( 'Reviews',
    array(
      'labels' => array(
        'name' => __( 'Reviews' ),
        'singular_name' => __( 'Reviews' )
      ),
      'taxonomies' => array('recordings', 'category', 'whatever'),
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ), 
      'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    )
  );
}
add_action( 'init', 'create_post_type' );
 
 // Custom User Role create
// function add_blog_manager_role(){
//     add_role(
//         'Reviewer',
//         'Reviewer',
//         array(
//             'read' => true,
//             'edit_posts' => false,
//             'delete_posts' => false,
//             'publish_posts' => false,
//             'upload_files' => true
//         )
//     );
// }
// add_action( 'admin_init', 'add_blog_manager_role', 4 );

function add_blog_role_caps() {
    $roles = array('Reviewer');
    foreach($roles as $the_role) {
        $role = get_role($the_role);
        $role->add_cap( 'read' );
        $role->add_cap( 'read_blog');
        $role->add_cap( 'read_private_blog' );
        $role->add_cap( 'edit_blog' );
        $role->add_cap( 'edit_others_blog' );
        $role->add_cap( 'edit_published_blog' );
        $role->add_cap( 'publish_blog' );
        $role->add_cap( 'delete_others_blog' );
        $role->add_cap( 'delete_private_blog' );
        $role->add_cap( 'delete_published_blog' );
    }
}
add_action('admin_init', 'add_blog_role_caps', 5 );

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'author' );
 
    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_others_posts' ); 
}
add_action( 'admin_init', 'add_theme_caps');

// user Redirect
// function my_login_redirect( $url, $request, $user ){
// if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
// if( $user->has_cap( 'Reviewer')) {
// $url = admin_url();
// } else {
// $url = home_url('/custom-page /');
// }
// }
// return $url;
// }
// add_filter('login_redirect', 'my_login_redirect', 10, 3 );