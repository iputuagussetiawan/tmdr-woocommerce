<?php
    $pageHeaderThumb=isset($args['page-header-thumb']) ? $args['page-header-thumb'] : null ;
    $pageHeaderTitle=isset($args['page-header-title']) ? $args['page-header-title'] : null ;
?>
<section class="page-header">
    <div class="page-header__image-container">
        <img src="<?php echo  $pageHeaderThumb ?>" alt="<?php echo $pageHeaderTitle; ?>" class="page-header__image ratio-item">
    </div>
    <div class="container page-header__container">
        <h1 class="page-header__title" data-aos="fade-up"><?php echo $pageHeaderTitle;  ?></h1>
    </div>
</section>