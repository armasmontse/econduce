<?php

class Cltvo_Vacante extends Cltvo_PostTypeCustom_Master
{
    const nombre_plural = 'Vacantes';
    const nombre_singular = 'vacante';
    const slug = 'vacantes';

	// args
	// const publico = true;
	// const publicly_queryable = true;
	// const show_ui = true;
	// const show_in_menu = true;
	// const query_var = true;
	// const capability_type = 'post';
	// const has_archive = true;
	// const hierarchical = false;
	// const menu_position = 6;
	protected static $supports = array( 'title', 'editor', 'thumbnail');

	public $firstList;
	public $secondList;
	public $thirdList;


    public function setMetas()
    {
    	$this->firstList = Cltvo_Vacancy_Experience::getMetaValue($this->post);
    	$this->secondList = Cltvo_Vacancy_Habilities::getMetaValue($this->post);
    	$this->thirdList = Cltvo_Vacancy_Responsabilities::getMetaValue($this->post);
    }

}
