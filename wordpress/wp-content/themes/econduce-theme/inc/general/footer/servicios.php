<div class="grid__col-1-4 footer__col-servicios">
	<div class="grid__box grid__box--footer">
		<h2 class="footer__titles show-menu__JS">
			<?php if (has_nav_menu('footer-menu-servicios')): ?>
				SERVICIOS <span class="footer__titles--right-arrow">&#10095;</span>
			<?php else: ?>
				&nbsp;
			<?php endif ?>
		</h2>
		<div class="footer__titles-border"></div>
		<?php wp_nav_menu(array( 
			'theme_location' => 'footer-menu-servicios',
			'container' => false,
			'fallback_cb' => false,
			'menu_class' => 'footer__menu'
		)); ?>
	</div>
</div>
