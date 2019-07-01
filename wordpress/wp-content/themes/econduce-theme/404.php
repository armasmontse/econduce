<?php get_header(); ?>

<!-- Page Ubicaciones -->
<div class="grid">

<!-- Header -->
	<?php  themeInc('/inc/general/header.php');  ?>

<!-- Header responsive -->
	<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

<!-- Error 404 -->

	<!-- Seccion 'contador e imagen en movimiento' -->
	<section class="error_404">

		<div id="ubicaciones_counter">
			<?php
				makeAnimationWithCounter(true,
					' <div class="error_404--ttl">404</div> '.
					'<div></div>'.
					' <div class="error_404--subttl">No hemos encontrado esta página.</div>'
				)
			 ?>
		</div>

	</section>

	<!-- seccion 'mapa' -->
	<?php   include get_stylesheet_directory() . '/inc/ubicaciones/mapa.php'  ?>

	

	

<!-- Seccion 'footer' -->
<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
</div>

<?php get_footer('home'); ?>
