<?php

class Cltvo_Call_Action extends Cltvo_Metabox_Master{

    /**
     * sobre escribiendo las opcciones del master
     */
    protected $description_metabox = "Información de la imagen";
    protected $post_type = "page";
    protected $position = "normal"; // posicion
    protected $prioridad = "default"; //prioridad
    // protected $button_label = "Call to Action";

    /* Array de metas */
    // protected static $buttons = [
    //     'viewApp'     => 'View App Store',
    //     'viewGoogle'  => 'View Google Play',
    //     'copie'       => 'Copie',
    //     'urlBtn'      => 'url button',
    //     'targBlank'   => 'target blank'
    // ];
    /* Es la funcion que muestra el contenido del metabox
    * @param object $object en principio es un objeto de WP_post
    */

    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){

        $meta = is_array($meta) ? $meta : array();

        $meta["button"] = isset($meta["button"] ) && is_array($meta["button"] ) ? $meta["button"]  : array();
        $meta["button"] = static::setMetaLink( $meta["button"] );

        $meta["app_store"] = isset($meta["app_store"] ) ? true  : false;
        $meta["play_store"] = isset($meta["play_store"] ) ? true  : false;

        $meta["subtitle"] = isset($meta["subtitle"] ) ? $meta["subtitle"]  : "";

        return $meta;
    }


    public static function setMetaLink( array $button)
    {

        $button["url"] = isset($button["url"] ) && is_string($button["url"] ) ? $button["url"]  : "";
        $button["copy"] = isset($button["copy"] ) && is_string($button["copy"] ) ? $button["copy"]  : "";
        $button["tblank"] = isset($button["tblank"] ) ? true  : false;

        return $button;
    }




    public static function metaboxDisplayRule(){
        return (isset($_GET['post']) && $_GET['post'] ) ? 'template-page.php' == get_post_meta($_GET['post'], '_wp_page_template', true) : false;
    }

	public function CltvoDisplayMetabox( $object ){
        ?>

        <input type="hidden" name="<?= $this->meta_key; ?>[init]" value="1">

		<table class="ancho_100" style="width:100%;">
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_subtitle">
                            <b>Texto de imagen</b>
                        </label>
                    </td>
                    <td>
                        <textarea id="<?= $this->meta_key; ?>_subtitle" style="width:100%;" name="<?= $this->meta_key; ?>[subtitle]" rows="4" ><?= $this->meta_value["subtitle"]  ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_app_store">
                            <b>Mostrar bóton de App Store:</b>
                        </label>
                    </td>
                    <td>
                        <input
                        type="checkbox"
                        class="ancho_100"
                        id="<?= $this->meta_key; ?>_app_store"
                        name="<?= $this->meta_key; ?>[app_store]"
                        value="1"
                        <?php if ($this->meta_value['app_store']): ?>
                            checked
                        <?php endif; ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_play_store">
                            <b>Mostrar bóton de Google Play:</b>
                        </label>
                    </td>
                    <td>
                        <input
                        type="checkbox"
                        class="ancho_100"
                        id="<?= $this->meta_key; ?>_play_store"
                        name="<?= $this->meta_key; ?>[play_store]"
                        value="1"
                        <?php if ($this->meta_value['play_store']): ?>
                            checked
                        <?php endif; ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_button_copy">
                            <b>Copie de bóton:</b>
                        </label>
                    </td>
                    <td>
                        <input
                        type="text"
                        style="width:100%;"
                        placeholder="Registrate"
                        class="ancho_100"
                        id="<?= $this->meta_key; ?>_button_copy"
                        name="<?= $this->meta_key; ?>[button][copy]"
                        value="<?= $this->meta_value['button']['copy']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_button_url">
                            <b>Url de bóton:</b>
                        </label>
                    </td>
                    <td>
                        <input
                        type="url"
                        style="width:100%;"
                        placeholder="http://"
                        class="ancho_100"
                        id="<?= $this->meta_key; ?>_button_url"
                        name="<?= $this->meta_key; ?>[button][url]"
                        value="<?= $this->meta_value['button']['url']; ?>" />

                    </td>
                </tr>
                <tr>
                    <td style="width:190px">
                        <label for="<?= $this->meta_key; ?>_button_tblank">
                            <b>Abrir en una nueva pestaña:</b>
                        </label>
                    </td>
                    <td>
                        <input
                        type="checkbox"
                        class="ancho_100"
                        id="<?= $this->meta_key; ?>_button_tblank"
                        name="<?= $this->meta_key; ?>[button][tblank]"
                        value="1"
                        <?php if ($this->meta_value['button']['tblank']): ?>
                            checked
                        <?php endif; ?>
                        />
                    </td>
                </tr>
            </table>
		<?php
	}

}
