<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
wp_enqueue_style('product', get_stylesheet_directory_uri().'/assets/css/pages/shop.css', array(), '1.0.0', 'all');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
	do_action( 'woocommerce_before_main_content' );
	$currentLang = pll_current_language();
	$image = get_field('banner_image', 6); //"6" is product id please change yang your page product id
	$pageHeaderImage=esc_url($image['url']);
	$pageHeaderTitle="";
	if (is_product_category()) : 
		$productCategory = get_queried_object();
		$catId			 = $productCategory->taxonomy . '_' . $productCategory->term_id;
		$pageHeaderTitle = $productCategory->name;
	elseif (is_search()) :
		$pageHeaderTitle=pll__('Search Result for').' '.get_search_query() ;
	else:
		$pageHeaderTitle= pll__('Products');
	endif;
	get_template_part('template-parts/sections/page', 'header', array(
			'page-header-thumb' => $pageHeaderImage,
			'page-header-title' =>  $pageHeaderTitle,
	));
?>
<section class="product">
	<div class="container">
		<div class="product-holder">
			<div class="row">
				<div class="woo-notice col-md-12">
					<?php woocommerce_output_all_notices() ?>
				</div>
				<!-- PRODUCT PAGE -->
				<?php if (is_shop()): ?>
				<div class="col-lg-3 filter-holder">
					<div class="product-filter d-lg-block d-none">
						<?php echo do_shortcode('[woof]') ?>
					</div>
					<div class="accordion" id="productFilter">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingFilter">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">Collection</button>
							</h2>
							<div id="collapseFilter" class="accordion-collapse collapse" aria-labelledby="headingFilter" data-bs-parent="#productFilter">
								<div class="product-filter d-lg-none">
									<?php echo do_shortcode('[woof]') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9" id="product-holder">
					<div class="total-post clearfix">
						<?php woocommerce_result_count() ?>
						<?php woocommerce_catalog_ordering() ?>
					</div>
					<div class="product-container">
						<?php 
						if ( woocommerce_product_loop() ) : 
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									do_action( 'woocommerce_shop_loop' );?>

									<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-6 product-list">
										<?php wc_get_template_part('content', 'product');?>
									</div>
								<?php }
							}
							woocommerce_product_loop_end();
						else:
							do_action( 'woocommerce_no_products_found' );
						endif;
						?>
						<div class="text-center mt-5">
							<?php woocommerce_pagination() ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<!-- CATEGORY PAGE -->
				<?php 
				if( is_product_category() ) {?>

				<div class="
					<?php  
					$term = get_queried_object();
					$children = get_terms( $term->taxonomy, array(
					'parent'    => $term->term_id,
					'hide_empty' => false
					) );
					if($children) { 
						echo 'col-lg-3';
					} else {
						echo 'col-lg-12 d-none';
					}
					?>
				filter-holder">
					<div class="product-filter d-lg-block d-none">
						<?php echo do_shortcode('[woof]') ?>
					</div>
					<div class="accordion" id="productFilter">
					  	<div class="accordion-item">
						    <h2 class="accordion-header" id="headingFilter">
						      	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">Collection</button>
						    </h2>
						    <div id="collapseFilter" class="accordion-collapse collapse" aria-labelledby="headingFilter" data-bs-parent="#productFilter">
						    	<div class="product-filter d-lg-none">
									<?php echo do_shortcode('[woof]') ?>
								</div>
						    </div>
					  	</div>
					</div>
				</div>

				<div
				<?php  
				if( is_product_category() ) {
				    $term = get_queried_object();
					$children = get_terms( $term->taxonomy, array(
					'parent'    => $term->term_id,
					'hide_empty' => false
					) );
					if($children) { 
						echo 'class="col-lg-9" id="product-holder"';
					} else {
						echo 'class="col-lg-12"';
					}
				}
				?>
				data-aos="fade-up">
					<div class="total-post clearfix">
						<?php woocommerce_result_count() ?>
						<?php woocommerce_catalog_ordering() ?>
					</div>
	                <div class="product-container">
						<?php 
						if ( woocommerce_product_loop() ) : 
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									do_action( 'woocommerce_shop_loop' );?>

									<?php 
								    $term = get_queried_object();
									$children = get_terms( $term->taxonomy, array(
									'parent'    => $term->term_id,
									'hide_empty' => false
									) );
									if($children) { 
										echo '<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-6 product-list">';
									} else {
										echo '<div class="col-xl-3 col-md-4 col-sm-6 col-6 product-list">';
									}
									?>
						       			<?php wc_get_template_part('content', 'product');?>
						       		</div>
								<?php }
							}
							woocommerce_product_loop_end();

						else:
			
							do_action( 'woocommerce_no_products_found' );
						endif;
						?>
						<div class="text-center mt-5">
							<?php woocommerce_pagination() ?>
						</div>
					</div>
				</div>

				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
else  
    $url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI']; 

if (is_product_category()) : 
	$productCategory = get_queried_object();
	$catId			 = $productCategory->taxonomy . '_' . $productCategory->term_id;
	?>
	<section class="breadcrumb-section">
		<div class="container">
			<nav aria-label="breadcrumb" data-aos="fade-up">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>">Home</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>/product">Product</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id/produk">Produk</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $productCategory->name ?></li>
				</ol>
			</nav>
		</div>
	</section>
<?php elseif (strpos($url, "category")!==false): ?>
	<?php
		$str = explode("/","$url");
		$catSlug = $str[count($str)-2];
		$category = get_term_by( 'slug', $catSlug, 'product_cat' );
	?>
	<section class="breadcrumb-section">
		<div class="container">
			<nav aria-label="breadcrumb" data-aos="fade-up">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>">Home</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>/product">Product</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id/produk">Produk</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $category->name; ?></li>
				</ol>
			</nav>
		</div>
	</section>
<?php elseif (strpos($url, "product/?swoof")!==false): ?>
	<section class="breadcrumb-section">
		<div class="container">
			<nav aria-label="breadcrumb" data-aos="fade-up">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>">Home</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item active">
						<?php if ($currentLang=='en') {?>
							Product
						<?php } elseif ($currentLang=='id') { ?>
							Produk
						<?php } ?>
					</li>
				</ol>
			</nav>
		</div>
	</section>
<?php else: ?>
	<section class="breadcrumb-section">
		<div class="container">
			<nav aria-label="breadcrumb" data-aos="fade-up">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php if ($currentLang=='en') {?>
							<a href="<?php echo get_option("siteurl"); ?>">Home</a>
						<?php } elseif ($currentLang=='id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo pll__('Products'); ?></li>
				</ol>
			</nav>
		</div>
	</section>
<?php endif; ?>
	<!-- <script type="text/javascript">
		console.log('loading');
	</script> -->
<?php get_footer();
