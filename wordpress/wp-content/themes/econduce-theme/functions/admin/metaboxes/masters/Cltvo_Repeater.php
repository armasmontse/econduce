<?php 

class Cltvo_Repeater extends Cltvo_Metabox_Master
{

    /* Sobre escribiendo las opcciones del master */
	protected $post_type = 'cltvo_vacante';

	/* Repeater Fields */
	private $detalles = array(
		'detalle' => 'Descripción',
	);

	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta_value){
		if (is_array($meta_value)) {
			foreach ($meta_value as $key => $value) {
				foreach ((new static)->detalles as $detalle_key => $item) {
					$meta_value[$key][$detalle_key] = (isset($meta_value[$key][$detalle_key]) && !empty($meta_value[$key][$detalle_key])) ? $meta_value[$key][$detalle_key] : '';
				}
			}
		} else {
			$meta_value = array(
				0 => array(
					'detalle' => '',
					'contenido' => ''
				)
			);
		}

		return $meta_value;
	}


	/*
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
	 public function CltvoDisplayMetabox($object){ ?>

		<br>

		<div class="<?php echo $this->meta_key; ?>">
			
			<table style="width:100%;" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<?php foreach ($this->detalles as $item): ?>
							<th align="left" style="padding-bottom:10px;">
								<?php echo $item; ?>
							</th>
						<?php endforeach; ?>
						<th style="padding-bottom:10px;">
							&nbsp;
						</th>
					</tr>
				</thead>
				<tbody class="tbody_JS">
					<?php $this->drawTemplate($this->meta_value); ?>
				</tbody>
			</table>

			<button type="button"
					class="button add_JS"
					style="display:block; margin-top:0px;"
					meta-name="<?php echo $this->meta_key; ?>">Agregar item
			</button>

			<table style="display:none;">
				<tr class="clone-JS tr_sortable">
					<?php foreach ($this->detalles as $key => $item): ?>
						<td style="padding-bottom:10px;" input-name="<?php echo $key; ?>">
							<input type="text" style="width: calc(100% - 10px);"
							id="<?php echo $this->meta_key; ?>__<?php echo $key; ?>"
							name="<?php echo $this->meta_key; ?>[][<?php echo $key; ?>]"
							value=""
							disabled />
						</td>
					<?php endforeach; ?>
					<td>
						<button meta-name="<?php echo $this->meta_key; ?>" class="button delete_JS">Eliminar</button>
						<!-- <button class="button move">&varr;</button> -->
					</td>
				</tr>
			</table>

		</div>

	<?php }

	public function drawTemplate($meta_value) {

		foreach ($meta_value as $key_value => $value): ?>
			<tr class="tr_sortable" meta-key="<?php echo $key_value; ?>" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>">
				<?php foreach ($this->detalles as $key => $item): ?>
						<td style="padding-bottom: 10px;" input-name="<?php echo $key; ?>">
							<input type="text" style="width: calc(100% - 10px);"
							id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>_<?php echo $key; ?>"
							name="<?php echo $this->meta_key; ?>[<?php echo $key_value; ?>][<?php echo $key; ?>]"
							value="<?php echo $value[$key]; ?>" />
						</td>
				<?php endforeach; ?>
				<td>
					<button meta-name="<?php echo $this->meta_key; ?>" class="button delete_JS">Eliminar</button>
					<!-- <button class="button move">&varr;</button> -->
				</td>
			</tr>
		<?php endforeach;

	}

}