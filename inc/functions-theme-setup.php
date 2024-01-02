<?php

/**
 * This function is use to get image background and logo for login page
 * The background image is set from admin page 
 */
function tmdr_custom_admin_login() {
    
    // Add Background Image to Admin Login Page
    if(class_exists('ACF')) {
        if(get_field('login_image', 'login')) {
            echo '
            <style type="text/css">
                body.login:before {
                    background-image: url("' . get_field('login_background_image', 'login')['sizes']['large'] . '");
                }
            </style>
            ';
        }
    }

    // Add Custom Logo to Admin Login Page
    $custom_logo = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
    
    echo '<style type="text/css">
    #login h1 a {
        background-image: url(' . $logo[0] . ');
    }
    </style>';
    
}
add_action('login_enqueue_scripts', 'tmdr_custom_admin_login');

/**
 * Function to set the logo link in login page to our website home page
 * If we didn't change it, it will redirect to wordpress.org website
 */
function tmdr_logo_url_login() {
    return home_url();
}
add_filter('login_headerurl', 'tmdr_logo_url_login');

/**
 * Change logo alt text in login page to match the website name
 */
function tmdr_logo_url_title_login() {
    return wp_get_theme()->get('Theme Name');
}
add_filter('login_headertitle', 'tmdr_logo_url_title_login');

/**
 * Add google recaptcha badge in login page
 */
function tmdr_recaptcha_badge_login() { 
    ?>
    
    <div class="message captcha-text">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer noopener">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer noopener">Terms of Service</a> apply.</div>
    
    <?php 
}
add_action('login_form','tmdr_recaptcha_badge_login');

/**
 * Change login logo title
 */
function tmdr_custom_title_login($origtitle) { 
    
    return get_bloginfo('name').' - Login';
    
}
add_filter('login_title', 'tmdr_custom_title_login', 99);

/**
 * Function to move language switcher on login page
 * Add javascript to move language switcher inside element with id login
 * Insert the language switcher to last element using appendChild
 */
function move_login_language_dropdown() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const languageDropdown = document.querySelector('.language-switcher');
            const loginForm = document.querySelector('#login');
            if (languageDropdown && loginForm) {
                loginForm.appendChild(languageDropdown);
            }
        });
    </script>
    <?php
}
add_action('login_enqueue_scripts', 'move_login_language_dropdown');

/**
 * Function to add custom logo upload via menu appearance > customize
 * This function also add support for <title> tag in wp_head, so you dont need to add it manually
 */
function tmdr_theme_setup() {
    /**
     * Enable title tag for wordpress
     * @link https://codex.wordpress.org/Title_Tag
     */
    add_theme_support( 'title-tag' );

    // Enable custom logo upload
    $defaults = array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme','tmdr_theme_setup');

/**
 * Enable wordpress submenu in admin under menu appearance
 * Also register starter menu which is main navbar and footer navbar
 * register_nav_menu need 2 parameter
 * First parameter is location identifier, like a slug
 * Second parameter is location descriptive text
 * @link https://developer.wordpress.org/reference/functions/register_nav_menu/
 */
function tmdr_menu_setup() {
    add_theme_support('menus');

    register_nav_menu('top_menu', 'Top Navbar');
    register_nav_menu('main_menu', 'Main Navbar');
    register_nav_menu('secondary_menu', 'Secondary Navbar');
    register_nav_menu('footer', 'Footer Navbar');
    
}
add_action('init', 'tmdr_menu_setup');

/**
 * Replace custom logo class
 */
function tmdr_change_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    $html = str_replace('custom-logo', 'img-responsive', $html);
    return $html;
}
add_filter('get_custom_logo', 'tmdr_change_logo_class');

/**
 * Run the function add_example_separators() to add separator in admin menu
 * You can find the function in function-custom.php file
 * Find wordpress menu position in link below
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
 */
function tmdr_add_separators() {
    // Add a separator after the "Pages" menu.
    // add_admin_menu_separator('edit.php?post_type=page');

    // Add a separator after the "Comments" menu.
    add_admin_menu_separator(57);
}
add_action('admin_menu', 'tmdr_add_separators');

/**
 * Register new color scheme for admin in profile menu
 */
function tmdr_admin_color_scheme(){
	//Get the theme directory
	$theme_dir = get_template_directory_uri();

	//Timedoor
	wp_admin_css_color( 'timedoor', __( 'Timedoor' ),
		$theme_dir . '/source/scss/tmdr-admin-color-scheme.scss',
		array( '#242e3b', '#fff', '#d54e21' , '#10af13')
	);
}
add_action('admin_init', 'tmdr_admin_color_scheme');