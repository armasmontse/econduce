<div class="header__responsive">
	<div class="grid__row">
		<div class="grid__container header__responsive__container">
			<div style="display: flex;">
				<div id="mobile-button_JS" class="header__mobile__btn">
					&#9776;
				</div>
				<div style="padding-left: 10px;" class="header__responsive__logo header__responsive__box--logo">
					<a href="<?php BLOGURL?>/">
						<img src="<?php echoImg('logo_mobile.svg'); ?>" alt="logo econduce para dispositivos moviles">
					</a>
				</div>
			</div>
			<div class="header__responsive__box--buttons">
				<a href="https://mi.econduce.mx/registro" class="header__buttons-group header__buttons-group-btn-registrate header__responsive-resgistrate-button">Regístrate</a>
			</div>
		</div>
	</div>
	<div class="grid__row grid__row--no-padding">
		<div id="mobile-menu_JS" class="header__responsive-menu">
			<a href="https://mi.econduce.mx/login" class="header__responsive-ingresa-button">Ingresa</a>
			<?php cltvo_superInc('/inc/general/menu-links.php',  ['module' => 'header__responsive']) ?>	<!-- , ['module' => 'header'] -->
			<div class="header__responsive-contact">
				<div class="">
					<p>Horarios de atención telefónica:</p>
					<p>Lunes a viernes 8:00 - 21:00</p>
					<p>Sábado y domingo 9:00 - 15:00</p>
				</div>
				<div class="">
					<p class="header__responsive-contact--blue-text">Escribe al:</p>
					<p>55 49 49 50 48</p>
				</div>
				<div class="">
					<p class="header__responsive-contact--blue-text">o llama al: </p>
					<p>4333 2005</p>
				</div>
				<div class="header__responsive-contact-icon" src="<?php echoImg('Recurso2.png'); ?>">
					<?php include get_stylesheet_directory() . '/images/Recurso2.php' ?>
				</div>
			</div>
		</div>
	</div>
</div>
