<?php get_header(); ?>

<!-- Page Ubicaciones -->
<div class="grid">

<!-- Header -->
	<?php  themeInc('/inc/general/header.php');  ?>

<!-- Header responsive -->
	<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

<!-- Page ubicaciones -->

	<!-- Header image -->
	 	<?php
	        headerImage(
	          'ubicaciones/Slider-ubicaciones.jpg',
	          'Puedes tomar y dejar tu scooter en cualquier Zona Econduce o estación de recarga.',
	          '#econduce-recarga',
	          'Dime más',
	          '',
	          '',
	          '',
	          '',
	          '',
	          '',
	          '',
	          '',
	          '#econduce-recarga'
	        );
	    ?>
	</div>

	<!-- Econduce Recarga -->
		<?php include get_stylesheet_directory() . '/inc/ubicaciones/econduce-recarga.php' ?>

	<!-- Seccion 'mapa' -->
		<?php   include get_stylesheet_directory() . '/inc/ubicaciones/mapa.php'  ?>

	<!-- Seccion Registro -->
		<div class="registro">
			<a href="https://mi.econduce.mx/registro"><button class="registro--btn">Regístrate</button></a>
			<h5 class="registro--title">y empieza a viajar ahora</h5>
		</div>

	<!-- Cuadricula 3 -->
		<div class="ubicaciones__threeColumns ubic">
		<?php
			iconsInThreeColumns([
				[
					'title' => '',
					'img' => 'ubicaciones/llevatelo.png',
					'ttl'	=>	"LLévatelo a donde quieras",
					'text' => "",
					'hover_text' => '',
					'hover_id' => '',
					'link_page'	=> ''
				],
				[
					'title' => 'Beneficios',
					'img' => 'ubicaciones/sinlimites.png',
					'ttl'	=>	"Sin límites de tiempo,",
					'text' => " paga sólo el tiempo que lo tengas",
					'hover_text' => 'Ver precios',
					'hover_id' => '',
					'link_page'	=> '../planes-y-precios'
				],
				[
					'title' => '',
					'img' => 'ubicaciones/botalo.png',
					'ttl'	=>	"Si no puedes devolverlo,",
					'text' => "bótalo y nos encargamos de ir por tu scooter",
					'hover_text' => 'Más información',
					'hover_id' => 'toModalBotalo',
					'link_page'	=> '#modal-botalo'

				]
			]);
		?>
		</div>
			<?php
				function makeModal($img_name, $path_to_content_file) {
					?><div class="ubicaciones__modal"><!-- abre div de modal -->
						<img src="<?php echoImg($img_name) ?>" alt="" class="ubicaciones__modal--img">
						<?php themeInc($path_to_content_file);	?>

					</div><!-- cierra div de modal -->
					<?php
				};

				function makeModal_sinImg($path_to_content_file, $img_name, $modal_id) {
					?><div class="ubicaciones__modal"><!-- abre div de modal -->
						<?php cltvo_superInc($path_to_content_file, ['img_name' => $img_name, 'modal_id' => $modal_id]);	?>
					</div><!-- cierra div de modal -->
					<?php
				};

				makeModal_sinImg('/inc/ubicaciones/modal-content-botalo.php', 'ubicaciones/botalo2.jpg', 'ModalBotalo');//el tercer parámetro aun no está integrado en el template

				makeModal_sinImg('/inc/ubicaciones/modal-content-estacionamiento.php', '', '');

			?>
				<script>
					var span_close_botalo = document.getElementsByClassName("closeModalBotalo")[0];
					var modalBotalo = document.getElementById('ModalBotalo');
					var btnBotalo = document.getElementById("toModalBotalo");
					btnBotalo.onclick = function() {
					    modalBotalo.style.display = "block";
					}

					span_close_botalo.onclick = function() {
					    modalBotalo.style.display = "none";
					}

					window.onclick = function(event) {
					    if (event.target == modalBotalo) {
					        modalBotalo.style.display = "none";
					    }
					}

					var span_close_estacionado = document.getElementsByClassName("closeModalEstacionado")[0];
					var modalEstacionado = document.getElementById('ModalEstacionado');
					var btnEstacionado = document.getElementById("toModalEstacionado");
					btnEstacionado.onclick = function() {
					    modalEstacionado.style.display = "block";
					}

					span_close_estacionado.onclick = function() {
					    modalEstacionado.style.display = "none";
					}

					window.onclick = function(event) {
					    if (event.target == modalEstacionado) {
					        modalEstacionado.style.display = "none";
					    }
					}
				</script>

	<!-- Seccion newsletter mailchimp -->
		<?php include get_stylesheet_directory() . '/inc/general/newsletter-mailchimp.php' ?>


	<!-- Seccion 'contador e imagen en movimiento' -->
		<div id="ubicaciones_counter">
			<?php
				makeAnimationWithCounter(true,
					' Emisiones CO'.
					'<span class="ubicaciones__counter-subscript">2e</span>'.
					' ahorradas a la fecha'
				)
			 ?>
		</div>

<!-- Seccion 'footer' -->
<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
</div>

<?php get_footer('home'); ?>
