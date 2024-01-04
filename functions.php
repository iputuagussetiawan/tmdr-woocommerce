<?php

// ======================================
// Functions Partial -- start
// ======================================

include_once 'inc/functions-custom.php';
include_once 'inc/functions-plugin.php';
include_once 'inc/functions-style-script.php';
include_once 'inc/functions-acf.php';
include_once 'inc/functions-polylang.php';
include_once 'inc/functions-theme-setup.php';
include_once 'inc/functions-woocommerce.php';


// ======================================
// Functions Partial -- end
// ======================================

//Register Navwalker
function register_navwalker()
{
    include_once 'inc/WP_Bootstrap_Navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// Add WooCommerce support
function theme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_add_woocommerce_support');


function add_membership_in_menu($items, $args){
    if ($args->theme_location == 'main_menu') {
        $cat_args = array(
            'number'     => 7,
            'hide_empty' => false,
            'parent' => 0
        );
        $product_categories = get_terms('product_cat', $cat_args);
        $currentLang = pll_current_language();
        $item = '<li class="menu-item dropdown nav-item has-megamenu order-3">';
                if ($currentLang=='en') {
                    $productEN = get_field('product_categories_en', 'option');
                    $item .= '<a href="'. $productEN .'" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link"><span itemprop="name">Products</span></a>';
                } elseif ($currentLang=='id') {
                    $productID = get_field('product_categories_id', 'option');
                    $item .= '<a href="'. $productID .'" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link"><span itemprop="name">Produk</span></a>';
                }
                $item .= '<div class="dropdown-menu megamenu">';
                    $item .= '<div class="megamenu__grid">';
                    foreach ($product_categories as $category) {
                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
                            $item .= '<div class="menu-item nav-item megamenu-item">';
                            $item .= '<a href="' . get_category_link($category->term_id) . '" class="dropdown-item megamenu-item__link">';
                            $item .= '<div class="megamenu-item__image-container">';
                            $item .= '<img class="megamenu-item__image" src="'. $image[0]. '" alt="'. $category->name .'">';
                            $item .= '</div>';
                            $item .= '<div class="megamenu-item__title">'. $category->name .'</div>';
                            $item .= '</a>';
                            $item .= '</div>';
                        }
                        $item .= '<div class="menu-item nav-item text-center megamenu-item">';
                                if ($currentLang=='en') {
                                    $categoriPage = get_field('product_categories_en', 'option');
                                    $item .= '<a href="/product" class="btn-standard">explore more</a>';
                                } elseif ($currentLang=='id') {
                                    $categoriPageID = get_field('product_categories_id', 'option');
                                    $item .= '<a href="/product" class="btn-standard">selengkapnya</a>';
                                }
                        $item .= '</div>';
                $item .= '</div>';
            $item .= '</div>';
        $item .= '</li>';
        $items .= $item;
    }
    if ($args->theme_location == 'secondary_menu') {
        $currentLang = pll_current_language();  
        // SEARCH
        $item = '<li class="order-2 nav-item search">';
        $item .= '<a class="nav-link search-toggle">
                        <svg class="nav-link__img-search" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M27.125 27.125L19.375 19.375L27.125 27.125ZM21.9583 12.9167C21.9583 14.104 21.7245 15.2798 21.2701 16.3768C20.8157 17.4737 20.1497 18.4705 19.3101 19.3101C18.4705 20.1497 17.4737 20.8157 16.3768 21.2701C15.2798 21.7245 14.104 21.9583 12.9167 21.9583C11.7293 21.9583 10.5536 21.7245 9.45657 21.2701C8.35959 20.8157 7.36284 20.1497 6.52324 19.3101C5.68365 18.4705 5.01764 17.4737 4.56326 16.3768C4.10887 15.2798 3.875 14.104 3.875 12.9167C3.875 10.5187 4.8276 8.21888 6.52324 6.52324C8.21888 4.8276 10.5187 3.875 12.9167 3.875C15.3147 3.875 17.6144 4.8276 19.3101 6.52324C21.0057 8.21888 21.9583 10.5187 21.9583 12.9167Z" stroke="#607D8B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <svg class="nav-link__img-close"  xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M27 27L4 4" stroke="#607D8B" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
                            <path d="M4 27L27 4" stroke="#607D8B" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
                        </svg>
                    </a>';
        $item .= '</li>';
        // CART
        $item .= '<li class="shop menu-item mini-cart nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <svg class="nav-link-icon" width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6665 14.2083V15.2083H21.6665V14.2083H19.6665ZM20.6665 9.04167H21.6665H20.6665ZM15.4998 3.875V2.875V3.875ZM10.3332 9.04167H9.33317H10.3332ZM9.33317 14.2083V15.2083H11.3332V14.2083H9.33317ZM6.45817 11.625V10.625H5.53804L5.46162 11.542L6.45817 11.625ZM24.5415 11.625L25.538 11.542L25.4616 10.625H24.5415V11.625ZM25.8332 27.125V28.125H26.92L26.8297 27.042L25.8332 27.125ZM5.1665 27.125L4.16996 27.042L4.0797 28.125H5.1665V27.125ZM21.6665 14.2083V9.04167H19.6665V14.2083H21.6665ZM21.6665 9.04167C21.6665 7.40616 21.0168 5.83765 19.8603 4.68117L18.4461 6.09539C19.2275 6.87679 19.6665 7.9366 19.6665 9.04167H21.6665ZM19.8603 4.68117C18.7039 3.5247 17.1353 2.875 15.4998 2.875V4.875C16.6049 4.875 17.6647 5.31399 18.4461 6.09539L19.8603 4.68117ZM15.4998 2.875C13.8643 2.875 12.2958 3.5247 11.1393 4.68117L12.5536 6.09539C13.335 5.31399 14.3948 4.875 15.4998 4.875V2.875ZM11.1393 4.68117C9.98287 5.83765 9.33317 7.40616 9.33317 9.04167H11.3332C11.3332 7.9366 11.7722 6.87679 12.5536 6.09539L11.1393 4.68117ZM9.33317 9.04167V14.2083H11.3332V9.04167H9.33317ZM6.45817 12.625H24.5415V10.625H6.45817V12.625ZM23.545 11.708L24.8366 27.208L26.8297 27.042L25.538 11.542L23.545 11.708ZM25.8332 26.125H5.1665V28.125H25.8332V26.125ZM6.16305 27.208L7.45472 11.708L5.46162 11.542L4.16996 27.042L6.16305 27.208Z" fill="#607D8B"/>
                        </svg>
                    </a>
                    <span class="mini-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>
                </li>';
        // WISHLIST
        $item .= '<li class="shop menu-item wishlist nav-item">'. do_shortcode('[yith_wcwl_items_count]') .'</li>';
        $items .= $item;
    }
    if ($args->theme_location == 'fourth') {
        $currentLang = pll_current_language();
        if ($currentLang=='en') {
            if( have_rows('catalogs_navbar', 61) ):
                while( have_rows('catalogs_navbar', 61) ): the_row();
                $catalog = get_sub_field('title_nav_catalogs');
                $file = get_sub_field('file_nav_catalogs');

                $item = '<li class="order-1 nav-item catalog">';
                $item .= '<a itemprop="url" href="'. $file .'" class="nav-link" target="_blank"><span itemprop="name">'. $catalog . '</span></a>';
                $item .= '</li>';
                endwhile;
            endif;
        } elseif ($currentLang=='id') { 
            if( have_rows('catalogs_navbar', 63) ):
                while( have_rows('catalogs_navbar', 63) ): the_row();
                $catalog = get_sub_field('title_nav_catalogs');
                $file = get_sub_field('file_nav_catalogs');

                $item = '<li class="order-1 nav-item catalog">';
                $item .= '<a itemprop="url" href="'. $file .'" class="nav-link" target="_blank"><span itemprop="name">'. $catalog . '</span></a>';
                $item .= '</li>';
                endwhile;
            endif;
        }
        $imgSearch = get_stylesheet_directory_uri() . 'assets/images/icon/magnifying-glass.svg';
        $index = isset( $index ) ? absint( $index ) : 0;
        $item .= '<li class="order-2 nav-item search">';
        $item .= '<form role="search" method="get" class="searchform search-box" action="'. esc_url( home_url( '/' ) ).'">
                    <div class="input-group mb-3">
                    <input type="search" id="woocommerce-product-search-field-' . $index .'" class="search-field form-control text search-input" placeholder="'. esc_attr__( 'Search All Products', 'woocommerce' ) .'" value="'. get_search_query() .'" name="s" />
                    <button class="btn btn-outline-secondary" id="button-addon2" type="submit"><img src="'.$imgSearch.'" alt="search icon"></button>
                    <input type="hidden" name="post_type" value="product" />
                    </div>
                </form>';
        $item .=  '</li>';
        $items .= $item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_membership_in_menu', 10, 2);

function redirect_after_login() {
    return home_url('/my-account'); // Change '/my-account' to the desired URL
}
add_filter('woocommerce_login_redirect', 'redirect_after_login');

// Redirect users to the home page after logout
function redirect_after_logout() {
    wp_redirect(home_url()); // Redirect to the home page
    exit();
}
add_action('wp_logout', 'redirect_after_logout');