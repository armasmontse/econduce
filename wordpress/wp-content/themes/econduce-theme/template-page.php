<?php
/**
 * Template Name: Plantilla Template
 */
 get_header();
 $template_page = new Cltvo_Page_Plantilla_Template($post);
 ?>

 <div class="grid plantilla">
	 <!-- header -->
	 <?php  themeInc('/inc/general/header.php');  ?>
	 <!-- heder responsive -->
	 <?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>
	<div class="plantilla__imageFull absolute">
		<img src="<?= $template_page->thumbail_img ? $template_page->thumbail_img->getImgSrc('full') : THEMEURL.'/images/foto1.jpg' ?>" alt="" />
	</div>
	<div class="plantilla__container">
		<div class="plantilla--ttl">
			<div class="grid__container">
				<div class="grid__col-1-1--portada slide-header__box-text grid__col-1-1--portada--mleft21">
					<span class="slide-header__box-text slide-header__box-text--shadow-text headerImage--title">
						<?=  $template_page->splash_info["subtitle"] ?>
					</span>

					<?php if ($template_page->splash_info["app_store"]): ?>
						<a href="https://itunes.apple.com/us/app/econduce/id1034866648?ls=1&mt=8" class="app__logo" target="_blank">
							<img src="<?php echoImg('Recurso43.svg'); ?>" alt="" onmouseover="this.src='<?php echoImg('boton_stores-01.svg'); ?>'" onmouseout="this.src='<?php echoImg('Recurso43.svg'); ?>'">
						</a>
					<?php endif; ?>

					<?php if ($template_page->splash_info["play_store"]): ?>
						<a href="https://play.google.com/store/apps/details?id=com.astrata.econduce" class="app__logo" target="_blank">
							<img src="<?php echoImg('Recurso41.svg'); ?>" alt="" onmouseover="this.src='<?php echoImg('boton_stores-02.svg'); ?>'" onmouseout="this.src='<?php echoImg('Recurso41.svg'); ?>'">
						</a>
					<?php endif; ?>

					<?php if (!empty($template_page->splash_info["button"]["copy"]) && !empty($template_page->splash_info["button"]["url"]) && filter_var($template_page->splash_info["button"]["url"], FILTER_VALIDATE_URL) ): ?>
						<a class="plantilla--btn app__logo" href="<?= $template_page->splash_info["button"]["url"] ?>" <?php if ($template_page->splash_info["button"]["tblank"]): ?> target="_blank"<?php endif; ?> ><button class="slide-header__box__btn"><?=  $template_page->splash_info["button"]["copy"] ?></button></a>

					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
	<a href="#plantContainerText" class="headerImage__arrows">
		<div class="slide-header__arrows-down arrows"></div>
	</a>

	<div class="grid__container">
		<div class="grid__row">
			<div class="plantilla__container-text" id="plantContainerText">
				<h2 class="title"> <?= $template_page->post->post_title ?> </h2>
				<?php echo apply_filters('the_content', $template_page->post->post_content) ?>
			</div>
		</div>
	</div>

	<!-- seccion 'footer' -->
	<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
</div>
<?php get_footer(); ?>
