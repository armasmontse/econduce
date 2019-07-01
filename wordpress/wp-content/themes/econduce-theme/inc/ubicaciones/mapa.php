<div  class="grid__row grid__row--no-padding" id="ubicaciones-mapa">
	<div class="grid__container">
		<div class="grid__row">
			<div class="grid__container">
			 	<div class="estaciones__title-container">
					<?php if ( ! is_page('ubicaciones') ): ?>
						<h2 class="estaciones__title desktop">
							Ubica tu scooter más cercano							
						</h2>
						<h2 class="estaciones__title mobile">
							Ubicaciones
						</h2>
					<?php endif ?>
					<?php if ( is_page('ubicaciones') ): ?>
						<h2 class="estaciones__title">
							¡Encuentra tu scooter más cercano!
						</h2>
					<?php endif ?>
			 	</div>
			</div>
		</div>
	</div>

	<div class="map__container">
		<div id="map" class="map"></div>
		<div class="map__search-container" id="map-search-container">

			<!-- Input locación del ususario -->
			<div id="user_input_container" class="map__search-input-container map__search-input-container--top">
				<input id="user-address" class="map__search-input" type="text" placeholder="¿Cuál es tu punto de partida?">
				<span class="map__search-limpiar"><button type="button" id="map__reset-address" class="map__search-limpiar--js"><?php include get_stylesheet_directory().'/images/icon-close2.svg';?></button></span>
				<span class="map__search-marker"><?php include get_stylesheet_directory().'/images/logo-search-marker-A.svg';?></span>
		        <span id="user_location_icon" class="map__search-find"><?php include get_stylesheet_directory().'/images/logo-search-find.svg';?></span>
				<!-- Select de opciones de  LOCACIÓN actual del usuario -->
				<div id="map__search-options-container--main" class="map__search-options-container map__search-options-container--main">
					<div id="map-search-options" class="map__search-options"></div>
				</div>
			</div>



			<!-- Input DESTINO del ususario -->
			<div id="user_input_container--destination" class="map__search-input-container map__search-input-container--destination">
				<input id="user-address--destination" class="map__search-input map__search-input--destination" type="text" placeholder="¿Hacia dónde vas?">
				<span class="map__search-limpiar"><button type="button" id="map__reset-destination" class="map__search-limpiar--js"><?php include get_stylesheet_directory().'/images/icon-close2.svg';?></button></span>
				<span class="map__search-marker"><?php include get_stylesheet_directory().'/images/logo-search-marker-B.svg';?></span>
				<!-- Select de busqueda de DESTINO del usuario -->
				<div id="map__search-options-container--destination" class="map__search-options-container map__search-options-container--main">
					<div id="map-search-options--destination" class="map__search-options map__search-options--destination"></div>
				</div>
			</div>


			<!-- Widget de info de estación -->
			<div id="map-station-widget-container" class="map-station-widget-container"></div>

		</div>


		<!-- Filters en un slider-->
		<div class="map-filters__container">
		    <div class="map-filters__overflow-container">

				<div class="swiper-container map-filters map-slider_JS">
				    <div id="filters-desktop" class="swiper-wrapper map-filters_JS"><!-- Slides --></div>
			    </div>
			    <!-- Navigation -->
			    <div class="map-filters__arrow-container map-slider__nav--prev_JS">
				    <div class="swiper-button-prev  map-filters__arrow" style="background-image: url(<?php echoImg('map-filter-arrow.svg'); ?>)"></div>
			    </div>
			    <div class="map-filters__arrow-container map-filters__arrow-container--right map-slider__nav--next_JS">
				    <div class="swiper-button-next map-filters__arrow" style="background-image: url(<?php echoImg('map-filter-arrow-right.svg'); ?>)"></div>
				</div>

			</div>
		</div>
		<!-- Version Mobil de los filtros -->
		<div id="map-mobile-filters__container" class="map-mobile-filters__container">
			<div class="map-mobile-filters__selecciona "><span>Selecciona tu colonia</span> <img src="<?php echoImg('flecha-selecciona-colonia.svg'); ?>" alt=""></div>
			<div id="filters-mobile" class="map-mobile-filters__filters-container map-filters_JS">
				<div class="map-mobile-filters__filters"></div>
			</div>
		</div>
	</div>
</div>
<!-- Iconos -->
<script>
	var user_marker_ = "<?php echoImg('marker-user.png');?>"
	var origin_marker = "<?php echoImg('marker-initial-location.png');?>"
	var destination_marker = "<?php echoImg('marker-destination-location.png');?>"
	var scooter_marker = "<?php echoImg('marker-station.png');?>"
	var charger_marker = "<?php echoImg('marker-charger.png');?>"
	var selected_scooter_marker = "<?php echoImg('marker-charger--selected.png');?>"
	var selected_charger_marker = "<?php echoImg('marker-charger--selected.png');?>"
	var widget_marker = "<?php echoImg('icon-widget-marker.png');?>"
	var widget_address = "<?php echoImg('icon-widget-address.png');?>"
	var widget_hours = "<?php echoImg('icon-widget-hours.png');?>"
	var widget_route = "<?php echoImg('icon-widget-route.png');?>"	
</script>
