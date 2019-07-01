<?php get_header(); ?>

<?php $vacantes = new Cltvo_Page_Vacantes; ?>

<!-- Page Ubicaciones -->
<div class="grid">
	<div class="vacantes">

		<!-- Header -->
		<?php  themeInc('/inc/general/header.php');  ?>

		<!-- Header responsive -->
		<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

		<div class="vacantes-header">
			<!-- Header image function -->
			<?php headerImage(
				 'vacantes/foto1.jpg',
				 'Lo que nos mueve es mejorar nuestra ciudad, brindándote la mejor experiencia de movilidad.',
				 '',
				 '',
				 'https://play.google.com/store/apps/details?id=com.astrata.econduce',
				 'Recurso41.svg',
				 'boton_stores-02.svg',
				 'Recurso41.svg',
				 'https://itunes.apple.com/us/app/econduce/id1034866648?ls=1&mt=8',
				 'Recurso43.svg',
				 'boton_stores-01.svg',
				 'Recurso43.svg',
				 '#vacantesFundadores'
			);?>
		</div>

		<!-- Sección Cofundadores -->
		<?php  include get_stylesheet_directory() . '/inc/vacantes/fundadores.php'  ?>

		<!-- Sección Valores -->
		<?php  include get_stylesheet_directory() . '/inc/vacantes/valores.php'  ?>

		<!-- Sección Vacantes -->
		<?php  include get_stylesheet_directory() . '/inc/vacantes/info-vacantes.php'  ?>

		<!-- Sección Beneficios  -->
		<?php  include get_stylesheet_directory() . '/inc/vacantes/beneficios-slider.php'  ?>

		<!-- Sección Vacantes Preguntas -->
		<div class="grid__container blueContent__background vacantes__preguntas">
			<div class="grid__col-1-2 blueContent__grid border-bottom">
				<div class="grid__box blueContent__line">
					<h3 class="vacantes__preguntas-ttl">¿Qué puedes esperar?</h3>
					<p class="vacantes__preguntas-cont">Un equipo entusiasta y apasionado por mejorar el pais, a través de una compañia sustentable, innovadora y con enfoque en servicio y experiencia de usuario. Aquí las cosas se mueven rápido y encontrarás un ambiente de cambio constante.</p>
				</div>
			</div>

			<div class="grid__col-1-2 blueContent__grid border-left">
				<div class="grid__box blueContent__line">
					<h3 class="vacantes__preguntas-ttl">¿Qué buscamos en un candidato?</h3>
					<p class="vacantes__preguntas-cont">Como punto de partida, buscámos gente con la habilidad para relizar su trabajo de manera excepcional. Valoramos cualidades como: ganas de aprender, motivación para mejorar, simplicidad y sentido común, independencia, eficiencia, frugalidad y vocación de servicio.</p>
				</div>
			</div>

		</div>

		<!-- Seccion 'footer' -->
		<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
	</div>
</div>

<?php get_footer(); ?>
