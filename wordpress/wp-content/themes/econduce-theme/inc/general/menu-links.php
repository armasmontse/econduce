<?php wp_nav_menu(array( 
	'theme_location' => 'header-menu',
	'container' => false,
	'fallback_cb' => false,
	'menu_class' => $opts['module'] . '__menu'
));