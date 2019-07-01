<?php get_header(); ?>
	<!-- Slider portada -->
	<div class="grid">

		<!-- header -->
		<?php  themeInc('/inc/general/header.php');  ?>
		
		<!-- heder responsive -->
		<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>
		
		<!-- slider-header -->
		<?php  include get_stylesheet_directory() . '/inc/home/slider.php'  ?>

		<!-- seccion 'como funciona' -->
		<?php  include get_stylesheet_directory() . '/inc/home/como-funciona.php'  ?>

		<!-- seccion 'mapa' -->
		<?php   include get_stylesheet_directory() . '/inc/ubicaciones/mapa.php'  ?>

		<!-- seccion 'empieza hoy' -->
		<?php  include get_stylesheet_directory() . '/inc/home/empieza-hoy.php'  ?>

		<!-- seccion 'precios' -->
		<?php  include get_stylesheet_directory() . '/inc/home/precios.php'  ?>

		<!-- seccion 'app' -->
		<?php  include get_stylesheet_directory() . '/inc/home/app.php'  ?>

		<!-- seccion 'recomendaciones en medios' -->
		<?php  include get_stylesheet_directory() . '/inc/home/medios.php'  ?>

		<!-- seccion 'contador e imagen en movimiento' -->
		<div id="home_counter">
			<?php  makeAnimationWithCounter(false, 'Viajes hasta la fecha')  ?>
		</div>

		<!-- seccion 'footer' -->
		<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>

	</div>

<?php get_footer('home'); ?>
