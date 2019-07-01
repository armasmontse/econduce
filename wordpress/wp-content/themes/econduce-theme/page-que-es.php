<?php get_header(); 

//Funcion para template ¿Que es? caracteristicas
function caractColumns($icon) { ?>
  <div class="grid__col-1-3">
	<div class="grid__box estampita__box <?php echo $icon['class'] ?>">
	  <div class="estampita">

		<a>
			<div class="estampita__img" style="background-image: url(<?php echoImg($icon['img']); ?>)"></div>
		</a>
		<div class="estampita__img--hover" style="background-image: url(<?php echoImg($icon['imageHover']); ?>)"></div>

		<div class="estampita__content">
	  		<p class="estampita__text"><?php echo $icon['text'] ?></p>
		  	<h3 class="estampita__ttl"><?php echo $icon['title'] ?></h3>
		</div>

	  </div>
	</div>
  </div>
<?php }

?>

<!-- Slider portada -->
<div class="grid">
	<!-- header -->
	<?php  themeInc('/inc/general/header.php');  ?>
	<!-- heder responsive -->
	<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

	<!-- heder image -->
	<?php
	   headerImage(
		'slides-que-es.jpg',
		'Cientos de scooters eléctricos, para que te muevas sin complicaciones.',
		'https://mi.econduce.mx/registro',
		'¡Empieza ya!',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'#porque'
	   );
   ?>
	<!-- section text -->
	<?php echo titleContent( 'porque', '¿Por qué Econduce?','Somos urbanos y nos encanta la ciudad, pero todos los días nos enfrentamos al tráfico y la contaminación. Te ayudamos a que te muevas de manera fácil, económica, ecológica y divertida para que vuelvas a disfrutar tus trayectos.' ) ; ?>
	<!-- cuadricula 4 -->
	<?php
		iconsInFourColumns([
			[
				'text' => "usando un scooter eléctrico.",
				'img' => 'Medio-ambiente1.png',
				'title' => '',
				'hover_text' => '',
				'hover_id' => '',
				'ttl' => 'Ayuda al medio ambiente'
			],
			[
				'img' => 'calidad-vida1.png',
				'ttl' => 'Mejora tu calidad de vida',
				'title' => '',
				'hover_text' => '',
				'hover_id' => '',
				'text' => "evitando horas en el tráfico.",
			],
			[
				'img' => 'circula-diario1.png',
				'ttl' => 'Circula todos los días',
				'title' => '',
				'hover_text' => '',
				'hover_id' => '',
				'text' => "y llega siempre a tu destino.",
			],
						[
				'img' => 'estacionate-sinproblema1.png',
				'ttl' => 'Estaciónate sin problemas',
				'title' => '',
				'hover_text' => '',
				'hover_id' => '',
				'text' => "olvídate de parquímetros, tenencias y trámites.",
			]
		]);
	?>
	<!-- banner scooter -->
	<?php  include get_stylesheet_directory() . '/inc/que-es/scooter.php'  ?>
	<!-- section text -->
	<?php echo titleContent( '', '¡Tan fácil como andar en bici!','Nuestros scooters están diseñados para que te muevas por la ciudad de manera ágil y sin complicaciones. Tu scooter es fácil de conducir, ligero, rápido y amigable con el medio ambiente.' ) ; ?>
	<div class="divisor"></div>
	<!-- caracteristicas-->
	<div class="grid__container characteristics">
	<?php echo titleContent( '', 'Características') ; ?>
	
	<?php
		$iconsCaract = [
			[
				'img' => 'Bateria1.jpg',
				'title' => "Batería",
				'class' => 'right',
				'imageHover' => 'marco1.png',
				'text' => "Batería de ion-litio, eficiente, duradera y amigable con el medio ambiente."
			],
			[
				'img' => 'Rango1.png',
				'title' => "Rango / Autonomía",
				'class' => '',
				'imageHover' => 'marco2.png',
				'text' => "Hasta 35 kilómetros con carga completa, + - dependiendo de la aceleración, inclinación del terreno, etc."
			],
			[
				'img' => 'velocidad1.jpg',
				'title' => "Velocidad",
				'class' => 'left',
				'imageHover' => 'marco3.png',
				'text' => "55 km/hr, preciso para un medio urbano."
			],
			[
				'img' => 'cero-emisiones1.png',
				'title' => "Cero emisiones",
				'imageHover' => 'marco4.png',
				'class' => 'right',
				'text' => "Muévete de manera inteligente y sustentable. La eficiencia del motor es del 80%, comparado con sólo 20% de uno de gasolina. Tu scooter no contamina y no hace ruido."
			],
			[
				'img' => 'recarga1.png',
				'title' => "Recarga",
				'class' => '',
				'imageHover' => 'marco3.png',
				'class' => '',
				'text' => "Puedes recargar en nuestras estaciones o en cualquier enchufe convencional de 110V."
			],
			[
				'title' => "Casco",
				'img' => 'casco1.png',
				'imageHover' => 'marco5.png',
				'class' => 'left',
				'text' => "Tu scooter va con cascos incluidos, recuerda, tu seguridad es primero"
			]
		];
	?>
	<?php foreach ($iconsCaract as $icon):
		caractColumns($icon);
	endforeach ?>
	</div>





	<!-- banner descargar app -->
	<?php  include get_stylesheet_directory() . '/inc/que-es/descargaApp.php'  ?>
	<!-- seccion 'footer' -->
	<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
</div>

<?php get_footer(); ?>
