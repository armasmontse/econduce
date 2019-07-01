<div id="header_JS" class="header">
	<div class="grid__row">
		<div class="grid__container header__container">
			<div class="header__box--logo">
				<div id="logo-top_JS" class="header__logo--top">
					<a href="<?php BLOGURL ?>/">
						<img src="<?php echo THEMEURL?>/images/logos/logoHeader.svg" alt="Logo">
					</a>
				</div>
				<div id="logo-fix_JS" class="header__logo--fix">
					<a href="<?php BLOGURL ?>/">
						<img src="<?php echo THEMEURL?>/images/logos/logoResponsiveMenu.svg" alt="Logo">
					</a>
				</div>
				<?php cltvo_superInc('/inc/general/menu-links.php',  ['module' => 'header']) ?>
			</div>
			<div class="header__box--buttons">
				<a class="header__buttons-group header__buttons-group-btn-registrate" href="https://mi.econduce.mx/registro">Regístrate</a>
				<a class="header__buttons-group header__buttons-group-btn-ingresa" href="https://mi.econduce.mx/login">Ingresa</a>
			</div>
		</div>
	</div>
</div>
