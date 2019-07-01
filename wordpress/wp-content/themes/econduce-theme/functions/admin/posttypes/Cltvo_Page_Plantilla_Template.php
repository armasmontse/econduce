<?php

class Cltvo_Page_Plantilla_Template extends Cltvo_Page
{

    public $splash_info;

    public function setMetas()
    {
        $this->splash_info = CLtvo_Call_Action::getMetaValue($this->post);
    }

}
