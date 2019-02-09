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


// Review user account submit start
if(isset($_POST['submit'])){ 
	 global $wpdb;  
    $tablename='wp_users';
    $date= new DateTime(); 
    $date= date_format($date,'Y-m-d H:i:s');
    $email=$_POST['email'];
    $myrows = $wpdb->get_results("SELECT * FROM wp_users WHERE user_email = '".$email."'");  
    if(!empty($myrows)){ 
    	$_SESSION['email'] = 'Email already exists';

    // echo "Email already exists."; 
    // header('Location:'.home_url().'/reviewer-registration/');
    	echo '<script>window.location="'.home_url().'/reviewer-registration/";</script>';
    }else{ 
	     
	    $data = array(
			'user_login'    =>  $_POST['user_name'],
			'user_email'    =>  $_POST['email'],
			'user_pass'     =>  wp_hash_password($_POST['password']), 
			'first_name'    =>  $_POST['name'],
			'last_name'     =>  $_POST['l_name'], 
			'display_name'   =>  $_POST['name'],
			'role' 			=> 'Reviewer'
			);
	     $user_id = wp_insert_user($data); 
	    if ( $user_id && !is_wp_error( $user_id ) ) {
	        $code = sha1( $user_id . time() );
	        $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink( /* YOUR ACTIVATION PAGE ID HERE */ )); 
	        add_user_meta( $user_id, 'has_to_be_activated', $code, true );
	        wp_mail( $email, 'ACTIVATION SUBJECT', 'CONGRATS BLA BLA BLA. HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
	    }
	    echo '<script>window.location="'.home_url().'/reviewer-registration/";</script>';
 	}
}
// Review user account submit exit
// Business user account submit start
if(isset($_POST['business'])){ 
     global $wpdb;  
    $tablename='wp_users';
    $date= new DateTime(); 
    $date= date_format($date,'Y-m-d H:i:s');
    $email=$_POST['email'];
    $user=$_POST['user_name'];
    $myrows = $wpdb->get_results("SELECT * FROM wp_users WHERE user_email = '".$email."'");  
    $user_ = $wpdb->get_results("SELECT * FROM wp_users WHERE user_login = '".$user."'");  
    if(!empty($myrows)){ 
        $_SESSION['email'] = 'Email already exists'; 
        echo '<script>window.location="'.home_url().'/package-register-free/";</script>';
    }else{  
        if(!empty($user_)){ 
            $_SESSION['email'] = 'User Name already exists'; 
            echo '<script>window.location="'.home_url().'/package-register-free/";</script>';
        }else{
            $data = array(
                'user_login'    =>  $_POST['user_name'],
                'user_email'    =>  $_POST['email'],
                'user_pass'     =>  wp_hash_password($_POST['password']), 
                'first_name'    =>  $_POST['f_name'],
                'last_name'     =>  $_POST['l_name'], 
                'display_name'   =>  $_POST['f_name'],
                // 'business_name'   =>  $_POST['name'],
                // 'category'   =>  $_POST['cat'],
                'role'          => 'Business'
                );
            // echo "<pre>";
            // print_r($data);
            // exit;
             $user_id = wp_insert_user($data); 
                add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
                add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

                function my_save_extra_profile_fields( $user_id ) {

                    if ( !current_user_can( 'edit_user', $user_id ) )
                        return false;

                    update_usermeta( $user_id, 'business_name', $_POST['name'] );
                }

            if ( $user_id && !is_wp_error( $user_id ) ) {
                $code = sha1( $user_id . time() );
                $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink( /* YOUR ACTIVATION PAGE ID HERE */ )); 
                add_user_meta( $user_id, 'has_to_be_activated', $code, true );
                wp_mail( $email, 'ACTIVATION SUBJECT', 'CONGRATS BLA BLA BLA. HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
            }
            echo '<script>window.location="'.home_url().'/package-register-free/";</script>';
        }
    }
}
// Business user account submit exit
// Review Submit form insert start
// Business user account submit start
if(isset($_POST['review'])){ 
     global $wpdb;  
    $tablename='wp_users';
    $date= new DateTime(); 
    $date= date_format($date,'Y-m-d H:i:s'); 
     
            $data = array(
                'post_title'    =>  $_POST['title'],
                'post_content'    =>  $_POST['content'],
                'post_status'     =>  'publish', 
                'post_author'    =>  get_current_user_id(), 
                'post_type'    =>  'reviews', 
                'comment_status'    =>  'open', 
                'post_content_filtered'    =>  $_POST['rating'], 
                'post_date'     =>$date
                ); 
             $user_id = wp_insert_post($data);  
 
            echo '<script>window.location="'.home_url().'/write-a-review/";</script>';
        
}
// Review submit form insert exit
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

 function Business_cat() {
  register_post_type( 'Business Category',
    array(
      'labels' => array(
        'name' => __( 'Business Category' ),
        'singular_name' => __( 'bin_cat' )
      ), 
      'supports'            => array( 'title'), 
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
        'capability_type'     => 'post',
    )
  );
}
add_action( 'init', 'Business_cat' );

 

//Custom User Role create
// function add_new_user_role_reviewer(){
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
// add_action( 'admin_init', 'add_new_user_role_reviewer', 4 );

// function new_user_role_reviewer_caps() {
//     $roles = array('Reviewer');
//     foreach($roles as $the_role) {
//         $role = get_role($the_role);
//         $role->add_cap( 'read' );
//         $role->add_cap( 'read_blog');
        
//     }
// }
// add_action('admin_init', 'new_user_role_reviewer_caps', 5 );

$result = add_role(
    'basic_reviewer1',
    __( 'Basic Reviewer' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);
 


function wporg_simple_role_caps()
{ 
    $role = get_role('basic_reviewer1'); 
    $role->add_cap('delete_posts', true);
    $role->add_cap('edit_others_posts', true);
}
 
// add simple_role capabilities, priority must be after the initial role definition
add_action('init', 'wporg_simple_role_caps', 11);


function my_login_redirect( $url, $request, $user ){
if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
if( $user->has_cap( 'administrator') or $user->has_cap( 'author')) {
$url = admin_url();
} else {
$url = home_url('/');
}
}
return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );

// 

 
 
 

 // BUsiness Role create
function add_new_user_role_business(){
    add_role(
        'Business',
        'Business',
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
            'publish_posts' => false,
            'upload_files' => true
        )
    );
}
add_action( 'admin_init', 'add_new_user_role_business', 4 );

function new_user_role_business_caps() {
    $roles = array('Business');
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
add_action('admin_init', 'new_user_role_business_caps', 5 );