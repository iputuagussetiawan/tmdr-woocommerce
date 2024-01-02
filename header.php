<!DOCTYPE html>
<html lang="<?php echo getCurrentLang(); ?>">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”format-detection” content=”telephone=no”>
    <meta name="theme-color" content="#10AF13">
    
    <?php wp_head(); ?>
</head>

<body>
    
    <?php wp_body_open(); ?>
    
    <header>
        <div class="top-nav">
            <div class="container-fluid">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'top_menu',
                        'depth'          => 3,
                        'container'      => 'false',
                        'menu_class'     => 'top-nav__holder',
                        'add_li_class'   => 'top-nav__menu-item',
                        'link_class'     => 'top-nav__menu-link',
                        'fallback_cb' 	 => '__return_false',
                        'walker'         => new bootstrap_5_wp_nav_menu_walker()
                        )
                    );
                ?>
            </div>
        </div>
        <nav class="navbar navbar-custom navbar-expand-lg">
            <div class="container-fluid navbar-custom__container">
                <?php
                    if(function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <?php 
							wp_nav_menu(array(
                                'theme_location' => 'main_menu',
                                'depth' => 2,
                                'container' => false,
                                'menu_class' => ' navbar-custom__left me-auto',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="navbar-nav%2$s">%3$s</ul>',
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                            ));
						?>

                        <div class="cart-wishlist-holder">
                            <?php 
                                wp_nav_menu(array(
                                    'theme_location' => 'secondary_menu',
                                    'depth'          => 3,
                                    'container'      => 'false',
                                    'menu_class'     => ' navbar-custom__right mr-auto',
                                    'fallback_cb' 	 => '__return_false',
                                    'items_wrap' => '<ul id="%1$s" class="navbar-nav%2$s">%3$s</ul>',
                                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                                    )
                                );
                            ?>
                        </div>
                        <div  id="searchform" class="search-box-container">
                            <?php wc_get_template_part('product', 'searchform');?>
                        </div>   
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
