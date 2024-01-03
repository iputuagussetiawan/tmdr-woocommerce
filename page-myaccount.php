<?php
/*   Template Name: Page MyAccount */
get_header();
?>
<main>
    <section class="my-account section-padding">
        <div class="container">
            <?php
                the_content()
            ?>
        </div>
    </section>
    <?php 
        get_template_part('template-parts/components/ui/breadcrumb');
    ?>
</main>
<?php
get_footer();
?>
