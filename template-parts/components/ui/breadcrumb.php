<?php $currentLang = pll_current_language(); ?> 
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
				<?php 
					if (wp_get_post_parent_id(get_the_ID())) { ?>
						<li class="breadcrumb-item">
							<a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title($post->post_parent) ?></a>
						</li>
					<?php } 
				?>
				<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
			</ol>
		</nav>
	</div>
</section>