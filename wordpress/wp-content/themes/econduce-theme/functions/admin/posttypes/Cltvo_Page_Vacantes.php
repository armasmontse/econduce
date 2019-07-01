<?php

class Cltvo_Page_Vacantes extends Cltvo_Page
{
    public $vacantes;

    function __construct(){
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['vacantes']));

        $query = new WP_Query(array(
            'post_type' => 'cltvo_vacante',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'title'
        ));

        $this->vacantes = array_map(function($vacante) {
            return new Cltvo_Vacante($vacante);
        }, $query->posts);
    }

    public function setMetas()
    {

    }

}
