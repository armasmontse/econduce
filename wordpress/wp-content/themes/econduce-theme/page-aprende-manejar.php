<?php get_header(); ?>
	<div class="grid">
		<!-- header -->
		<?php  themeInc('/inc/general/header.php');  ?>

		<!-- heder responsive -->
		<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>
		<!--header image -->

		<?php
			headerImage(
		 'portada.jpg',
		 '¡Cualquiera que sepa andar en bici, fácilmente aprende a andar en scooter!',
		 'https://mi.econduce.mx/registro',
		 'Aprende a manejar',
		 '',
		 '',
		 '',
		 '',
		 '',
		 '',
		 '',
		 '',
		 '#aprendeManejar'
	   );
	   ?>
		<!-- section text -->
		<div class="grid__col-1-1 botalo__politicas" id="aprendeManejar">
			<div class="estaciones__title-container section__containerText">
				<p class="estaciones__title botalo__politicas--text aprende__title-nolines">

					Nosotros te enseñamos a manejar. En tu registro verás un breve video donde aprenderás a utilizar el servicio y lo necesario  para manejar tu scooter.
				</p>
			</div>
		</div>
	
		<!-- toma una clase de manejo -->
		<div class="grid__container blueContent__background" >
			<div class="grid__col-1-2 blueContent__grid">
				<div class="grid__box grid__box--steps blueContent">
					<div class="blueContent__container">
						<img class="blueContent__container--images" src="<?php echoImg('ThumbsUp.png'); ?>" alt="">
					</div>

					 <div class="blueContent__container">
						 <img class="blueContent__container--images" src="<?php echoImg('Manejo.png'); ?>" alt="">
					 </div>

					 <div class="blueContent__container">
						 <img class="blueContent__container--images" src="<?php echoImg('Econduce.png'); ?>" alt="">
					 </div>

				</div>
			</div>

			<div class="grid__col-1-2 blueContent__grid" style="border-left:solid 1px white">
				<div class="grid__box grid__box--steps blueContent__line blueContent__textContainer">
					<h3 class="blueContent__title estaciones__title title__blueContent" style="color:white">Toma una clase de manejo</h3>
					<div class="blueContent__text-container">
						<p class="blueContent__text">Tu seguridad es primero, por lo que te recomendamos tomar una clase de manejo con un instructor ¡está incluída en el servicio!</p><br>
						<p class="blueContent__text" >Agéndala cuando termines tu registro. Escoge el horario y la ubicación que más te acomode, de lunes a domingo.</p>
					</div>
				</div>
			</div>
		</div>


		 <!--app-->

		<div class="grid__row aprende__container">
			<div class="grid__container">
				<div class="grid__col-1-2-app app__text-box app__aprende">
					<div class="app__title aprende__app--title">
						Descarga tu app y aprende a manejar hoy mismo
					</div>
					<div class="app__logos aprende__app--logos">
						<a href="https://play.google.com/store/apps/details?id=com.astrata.econduce" target="_blank" class="app__logo--min">
						  <img src="<?php echoImg('Recurso41.svg'); ?>" alt="" onmouseover="this.src='<?php echoImg('boton_stores-02.svg'); ?>'" onmouseout="this.src='<?php echoImg('Recurso41.svg'); ?>'">
						</a>
						<a href="https://itunes.apple.com/us/app/econduce/id1034866648?ls=1&mt=8" target="_blank" class="app__logo--min">
						  <img src="<?php echoImg('Recurso43.svg'); ?>" alt="" onmouseover="this.src='<?php echoImg('boton_stores-01.svg'); ?>'" onmouseout="this.src='<?php echoImg('Recurso43.svg'); ?>'">
						</a>



					</div>
				</div>
				<div class="grid__col-1-2-app app__image-box aprende__celApp">
					<img class="app__phone aprende__celApp--img" src="<?php bloginfo('template_url') ?>/images/app-mockup.png" alt="">
				</div>
			</div>
		</div>
<!--   reglamento  -->
<!-- <div class="grid__row reglamento">
	<div class="grid__container reglamento__grid">
		<div class="grid__col-1 reglamento__container">
				<p class="reglamento__container--title">Reglamento de tránsito</p>
				 <div class="reglamento__container--line"></div>
				 <div class="reglamento__container--text">
					 Descarga el reglamento de tránsito para que te familiarices<br>
					 con las normas de conducción de un scooter por la ciudad.
				 </div>
				 <a class="reglamento__container--button" href="http://www.ssp.df.gob.mx/reglamentodetransito/documentos/nuevo_reglamento_transito.pdf">Descargar <i class="fa fa-long-arrow-right reglamento__container--button-icon" aria-hidden="true"></i></a>
		</div>
	</div>
</div> -->

		<!-- seccion 'footer' -->
		<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>

	</div>

	<script src="https://player.vimeo.com/api/player.js"></script>

<?php get_footer(); ?>
