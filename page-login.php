<?php
/*   Template Name: Page Login */
$currentLang = pll_current_language();
get_header();
$loginId=getPageData('login')->ID;
?>
<section class="section-login section-padding">
    <div class="container">
        <?php
            the_content()
        ?>
    </div>
</section>
<?php
get_footer();
?>
