<?php get_header(); ?>
<!-- Slider portada -->
	<div class="grid">

		<!-- header -->
		<?php  themeInc('/inc/general/header.php');  ?>

		<!-- heder responsive -->
		<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

		<!--header image -->
		<?php
		headerImage(
			'Botalo2.jpg',
			'Si no puedes regresar tu scooter a la estación, puedes utilizar nuestro servicio "bótalo" y nosotros nos encargamos de recogerlo.',
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
			'#botalo'
		);


   ?>

		<!-- cuadricula 3 -->
		 <div class="botalo__titleCuadricula">
			<?php echo titleContent( '', 'Cómo lo utilizo') ; ?>
		</div>
		<div class="ubicaciones__threeColumns ubic">
			<?php
			iconsInThreeColumns([
				[
					'title' => '',
					'img' => 'Botalo_estacionate.png',
					'ttl'	=>	"",
					'text' => "Deja tu scooter <br> bien estacionado",
					'hover_text' => 'Más información',
					'hover_id' => 'toModalEstacionado',
					'link_page'	=> '#modalEstacionado'
				],
				[
					'title' => 'Cómo lo utilizo',
					'img' => 'Botalo_notificanos.png',
					'text' => "Notifícanos:<br> Whatsapp 55 4949 5048<br> hola@econduce.mx",
					'hover_text' => '',
					'hover_id' => 'hover_id'

				],
				[
					'title' =>"",
					'img' => 'Botalo_ubicacion.png',
					'text' => "Especifica la dirección <br> exacta del lugar donde <br>lo estacionaste"
				]
			]);
		?>
		</div>
		<!--Texto-->
		<hr class="botalo__line">
		<div>
			<?php echo titleContent('', 'Zonas de servicio','Haz clic en el mapa para conocer el precio del servicio por zona.' ) ; ?>
		</div>
		<!-- mapa -->
		<div id="botalo-map" style="height: 600px; width: 100%"></div>
		<!--tabla -->
		<?php  themeInc( '/inc/botalo/table.php');  ?>
		<!--politicas-->
		<div class="botalo__politicas-container">
			<?php echo titleContent( '','Políticas',
						'Tu viaje termina cuando te notifquemos que recibimos tu solicitud.<br>'.
						'El scooter es tu responsabilidad hasta que nosotros lo recojamos.<br>'.
						'El tiempo de recolección del scooter depende de la carga de trabajo de nuestro equipo operativo.<br>'.
						'En caso de que el scooter sea robado o llevado al corralón, los gastos que incurran serán responsabilidad del usuario.<br>'.
						'Si no se notifca el haberlo dejado, califca como abandono y habrá una penalización de $1,500 pesos.<br>'
					) ; ?>
		</div>

		<!-- slider politicas mobile-->
			<div style="margin: 0 auto;">
				<div class="relative botalo__slider">
					<div class="botalo__slider-title">
						<?php echo titleContent( '','Políticas',''); ?>
					</div>
					<div id="botalo-slider" class="">
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">
							  Tu viaje termina cuando te notifquemos que recibimos tu solicitud.
							</p>
						</div>
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">
							  El scooter es tu responsabilidad hasta que nosotros lo recojamos.
							</p>
						</div>
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">El tiempo de recolección del scooter depende de la carga de trabajo de nuestro equipo operativo.</p>
						</div>
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">En caso de que el scooter sea robado o llevado al corralón,</p>
						</div>
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">los gastos que incurran serán responsabilidad del usuario.</div>
						<div class="botalo__slider-slide">
							<p class="botalo__slider-slide_text">Si no se notifca el haberlo dejado, califca como abandono y habrá una penalización de $1,500 pesos.</p>
						</div>
					</div>
				</div>
			</div>


			
			<?php

				function makeModal_sinImg($path_to_content_file, $img_name, $modal_id) {
					?><div class="ubicaciones__modal"><!-- abre div de modal -->
						<?php cltvo_superInc($path_to_content_file, ['img_name' => $img_name, 'modal_id' => $modal_id]);	?>
					</div><!-- cierra div de modal -->
					<?php
				};

				makeModal_sinImg('/inc/ubicaciones/modal-content-estacionamiento.php', '', '');

			?>
				<script>

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
			



			<script>
				jQuery(document).ready(function() {
					jQuery('#botalo-slider').slick();
				})
			</script>

		<!-- seccion 'footer' -->
		<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>

	</div>

<?php get_footer('botalo'); ?>
