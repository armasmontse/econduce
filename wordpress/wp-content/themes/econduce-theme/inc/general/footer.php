<?php $contacto = new Cltvo_Page_Contacto; ?>

<div class="footer">

	<div class="grid__row">
		<div class="grid__container grid__container--footer">
			<div class="grid__col-1-2--flex">
				<!-- seccion 'nosotros' -->
				<?php include get_stylesheet_directory() . '/inc/general/footer/nosotros.php'  ?>
				<!-- seccion 'informacion' -->
				<?php include get_stylesheet_directory() . '/inc/general/footer/informacion.php'  ?>
				<!-- seccion 'legales' -->
				<?php include get_stylesheet_directory() . '/inc/general/footer/legales.php'  ?>
				<!-- seccion 'servicios' -->
				<?php include get_stylesheet_directory() . '/inc/general/footer/servicios.php'  ?>
			</div>
			<div class="grid__col-1-2--static">
				<!-- seccion 'horarios' -->
				<?php include get_stylesheet_directory() . '/inc/general/footer/horarios.php'  ?>
			</div>
		</div>
	</div>

	<div class="footer__none">
		<div class="grid__row">
			<div class="grid__container">
				<div class="grid__col-1-1">
					<!-- seccion 'descargarApp y redes sociales' -->
					<?php include get_stylesheet_directory() . '/inc/general/footer/descargarApp.php'  ?>
				</div>
			</div>
		</div>
	</div>

	<div class="grid__row footer__second">
		<div class="grid__container">
			<!-- seccion 'descargarApp y redes sociales' -->
			<?php include get_stylesheet_directory() . '/inc/general/footer/copyright.php'  ?>
		</div>
	</div>

	<!-- seccion 'descargarApp y redes sociales responsive' -->
	<?php include get_stylesheet_directory() . '/inc/general/footer/responsive.php'  ?>
</div>
