<style>
/*  .slider {
  height: 100vh;
  width: 100%;
}
.slider__slide {
  height: 100vh;
}

.slider__pagination {
  bottom: 18px;
}
.swiper-pagination-bullet {
  width: 15px;
  height: 15px;
  opacity: 1;
  background: rgba(0,0,0,0.2);
}
.swiper-pagination-bullet-active {
  color:#fff;
  background: pink;
}
.swiper-pagination {
  position: absolute;
  left: 45%;
}*/



</style>

<?php

	$slider = [
		[
			'image' => 'h5.jpg',
			'title' => 'Llega más rápido y sin contaminar',
			'action' => '¡Regístrate hoy!',
			'actionUrl' => 'https://mi.econduce.mx/registro',
			'app' => false,
		],
		[
			'image' => 'h2.jpg',
			'title' => '¡Fácil! Tu celular es tu llave Descarga la app',
			'app' => true
		],
		[
			'image' => 'h3.jpg',
			'title' => 'Olvídate del tráfico, disfruta de la ciudad',
			'action' => 'Ubicaciones',
			'actionUrl' => BLOGURL . '/ubicaciones',
			'app' => false,
		],
		[
			'image' => 'h4.jpg',
			'title' => 'Incluye casco, seguro y clase de manejo',
			'action' => 'Más información',
			'actionUrl' => '#como-funciona',
			'app' => false,
		],
		[
			'image' => 'Slide1.png',
			'title' => 'Adiós parquímetros y trámites, hola Econduce',
			'action' => 'Ver precios',
			'actionUrl' => BLOGURL . '/planes-y-precios',
			'app' => false,
		],
		[
			'image' => 'h6.jpg',
			'title' => 'Eléctrico, sustentable',
			'action' => '¿Cómo funciona?',
			'actionUrl' => '#como-funciona',
			'app' => false,
		]
	]

 ?>

<!-- Slider main container -->
<div class="swiper-container slide-header header-slider_JS">
	<!-- Additional required wrapper -->
    <div class="swiper-wrapper slide-header__wrapper">
		<!-- Slides -->
		<?php $i = 1 ?>
		<?php foreach ($slider as $slide): ?>
        	<div class="swiper-slide slide-header__slide" style="background-image: url('<?php echoImg($slide['image']); ?>');">
				<div class="slide-header__box">
					<div class="grid__row">
						<div class="grid__container">
							<div class="grid__col-1-1--portada slide-header__text-box">
								<div class="slide-header__column--small">
									<span class="slide-header__text slide-header__text--big-number"><?php echo sprintf("%02d", $i) ?></span>
									<small class="slide-header__text slide-header__text--normal-number">/<?php echo sprintf("%02d", count($slider)) ?></small>
								</div>
								<div class="slide-header__column--big">
									<span class="slide-header__ttl slide-header__text--shadow"><?php echo $slide['title'] ?></span>
									<div class="slide-header__btn-box">
										<?php if (!empty($slide['actionUrl'])): ?>
											<a href="<?php echo $slide['actionUrl'] ?>" class="slide-header__btn"><?php echo $slide['action'] ?></a>
										<?php endif ?>
										<?php if ($slide['app']): ?>
											<a href="https://play.google.com/store/apps/details?id=com.astrata.econduce" class="slide-header__btn--app" target="_blank">
												<img src="<?php bloginfo('template_url') ?>/images/Recurso41.svg" alt="" onmouseover="this.src='wp-content/themes/econduce-theme/images/boton_stores-02.svg'" onmouseout="this.src='wp-content/themes/econduce-theme/images/Recurso41.svg'">
											</a>
											<a href="https://itunes.apple.com/us/app/econduce/id1034866648?ls=1&mt=8" class="slide-header__btn--app" target="_blank">
												<img src="<?php bloginfo('template_url') ?>/images/Recurso43.svg" alt="" onmouseover="this.src='wp-content/themes/econduce-theme/images/boton_stores-01.svg'" onmouseout="this.src='wp-content/themes/econduce-theme/images/Recurso43.svg'">
											</a>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
        	</div>
			<?php $i++ ?>
		<?php endforeach ?>
    </div>

    <a href="#S1">
        <div class="slide-header__arrows-down"></div>
    </a>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev slider__nav--prev header-slider__nav--prev_JS slide-header__arrows-left"></div>
    <div class="swiper-button-next slider__nav--next header-slider__nav--next_JS slide-header__arrows-right"></div>

</div>
