<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$currentLang = pll_current_language();

?>
<form role="search" method="get" class="searchform search-box" action="
<?php if ($currentLang=='en') {?>
    <?php echo esc_url( home_url( '/' ) ); ?>
<?php } elseif ($currentLang=='id') { ?>
    <?php echo esc_url( home_url( '/id/' ) ); ?>
<?php } ?>
">
    <div class="search-box__inner">
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field form-control text search-input search-box__input" placeholder="<?php echo pll__('Search All Products'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button class="btn search-box__btn" id="button-addon2" type="submit">
            <svg class="search-box__icon" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                <path d="M27.125 27.125L19.375 19.375L27.125 27.125ZM21.9583 12.9167C21.9583 14.104 21.7245 15.2798 21.2701 16.3768C20.8157 17.4737 20.1497 18.4705 19.3101 19.3101C18.4705 20.1497 17.4737 20.8157 16.3768 21.2701C15.2798 21.7245 14.104 21.9583 12.9167 21.9583C11.7293 21.9583 10.5536 21.7245 9.45657 21.2701C8.35959 20.8157 7.36284 20.1497 6.52324 19.3101C5.68365 18.4705 5.01764 17.4737 4.56326 16.3768C4.10887 15.2798 3.875 14.104 3.875 12.9167C3.875 10.5187 4.8276 8.21888 6.52324 6.52324C8.21888 4.8276 10.5187 3.875 12.9167 3.875C15.3147 3.875 17.6144 4.8276 19.3101 6.52324C21.0057 8.21888 21.9583 10.5187 21.9583 12.9167Z" stroke="#607D8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>
