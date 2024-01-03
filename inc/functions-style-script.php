<?php 

/**
 * This function is used to make the enqueue script shorter
 * You just need to pass the file name and file path as parameters
 * File path is relative to theme folder
 * File versioning will automatically follow version in style.css
 */
function tmdr_print_css($name, $filePath) {
    $themeVersion = wp_get_theme()->get('Version');
    $cssPath = get_template_directory_uri() . '/assets/css/';
    return wp_enqueue_style($name,  $cssPath . $filePath, array(), $themeVersion, 'all');
}

function tmdr_print_js($name, $filePath) {
    $themeVersion = wp_get_theme()->get('Version');
    $jsPath = get_template_directory_uri() . '/assets/js/';
    wp_enqueue_script($name, $jsPath . $filePath, array(), $themeVersion, true);
}

/**
 * This function load login page style
 * We use custom login page style to make better layout
 */
function tmdr_login_css() {
    tmdr_print_css('tmdradmincss', 'tmdr-admin.css');
}
add_action( 'login_enqueue_scripts', 'tmdr_login_css' );

/**
 * Function for load google font
 * No need to change anything, just change the google_font_url variable to your theme font
 */
function tmdr_add_google_fonts() {
    $google_font_url = 'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap';
    
    $onloadVal = "this.media='all'";
    
    echo '
    <link rel="preconnect" href = "https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as = "style" href="' . $google_font_url .  '" />
    <link rel="stylesheet" href="' . $google_font_url . '" media="print" onload="' . $onloadVal . '" />
    <noscript>
        <link rel="stylesheet" href="' . $google_font_url . '" />
    </noscript>
    ';
}
add_action('wp_enqueue_scripts', 'tmdr_add_google_fonts');

/**
 * Function for enqueue css and js from our template
 * Please reminder to enqueue spesific css or js to spesific page
 * @link https://developer.wordpress.org/reference/functions/
 */
function tmdr_script_enqueue() {
    
    // Global CSS
    tmdr_print_css('layoutCss', 'layout.css');
    
    // Global JS
    tmdr_print_js('layoutJS', 'layout.js');
    
    // example code to add CSS and JS to Page Template
    // example is for page-home.php page template

    if (is_page_template('page-login.php')) {
        tmdr_print_css('loginCss', 'pages/login.css');
        tmdr_print_js('loginJs', 'pages/login.js');
    }
    
    
    // example code to add CSS and JS to Singular Page
    /*
    if (is_singular('post_type')) {
        tmdr_print_css('nameCss', 'page/filePath.css');
        tmdr_print_js('nameJs', 'page/filePath.js');
    }
    */
    
    // example code to add CSS and JS to Archive Page
    /*
    if (is_archive('post_type')) {
        tmdr_print_css('nameCss', 'page/filePath.css');
        tmdr_print_js('nameJs', 'page/filePath.js');
    }
    */
    
    // example code to add CSS and JS to 404 Page
    /*
    if (is_404()) {
        tmdr_print_css('404Css', 'page/404.css');
        tmdr_print_js('404Js', 'page/404.js');
    }
    */
    
}
add_action('wp_enqueue_scripts', 'tmdr_script_enqueue');