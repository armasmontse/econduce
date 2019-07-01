<?php

/**
 * En este archivo se incluyen el menu y sus funciones
 * el menu debe ser creado como una Funcion 
 *
 */




/** ==============================================================================================================
 *                                                     MENU
 *  ==============================================================================================================
 */

// crea el menu 
function ctlvo_menu_theme(){ ?>


<?php }


/** ==============================================================================================================
 *                                              FUNCIONES DEL MENU
 *  ==============================================================================================================
 */

function register_menus() {
  register_nav_menus(
    array(
    	'header-menu' => __( 'Header Menu' ),
		'footer-menu-nosotros' => __( 'Footer Menu [Nosotros]' ),
		'footer-menu-informacion' => __( 'Footer Menu [Información]' ),
		'footer-menu-legales' => __( 'Footer Menu [Legales]' ),
		'footer-menu-servicios' => __( 'Footer Menu [Servicios]' ),
    )
  );
}
add_action( 'init', 'register_menus' );



?>