<div class="grid__col-1-4">
	<div class="grid__box grid__box--footer footer__col-informacion">
		<h2 class="footer__titles show-menu__JS">
			<?php if (has_nav_menu('footer-menu-informacion')): ?>
				INFORMACIÓN <span class="footer__titles--right-arrow">&#10095;</span>
			<?php else: ?>
				&nbsp;
			<?php endif ?>
		</h2>
		<div class="footer__titles-border"></div>
		<?php wp_nav_menu(array( 
			'theme_location' => 'footer-menu-informacion',
			'container' => false,
			'fallback_cb' => false,
			'menu_class' => 'footer__menu'
		)); ?>
	</div>
</div>
