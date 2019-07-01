<div class="vacantes__info">

	<div class="vacantes__info-container">
		<h2 class="vacantes__info-ttl">Vacantes</h2>
		<p class="vacantes__info-cont">Siempre estamos buscando gente excepcional apasionada por el servicio, la calidad y con un fuerte deseo por marcar una diferencia y trascender.</p>

		<!-- Vacante -->
		<?php foreach ($vacantes->vacantes as $vacante): ?>
			<a href="<?php echo $vacante->permalink ?>">
				<div class="vacantes__foto" <?php if (! empty($vacante->thumbail_img)): ?> style="background-image: url('<?php echo $vacante->thumbail_img->getImgSrc('full') ?>');" <?php endif ?>>
					<h1 class="vacantes__foto-ttl"><?php echo $vacante->post->post_title ?></h1>
					<div class="vacantes__foto-flecha">
						<?php include get_stylesheet_directory() . '/images/vacantes/flecha_vacantes.php' ?>
					</div>
				</div>
			</a>
		<?php endforeach ?>
	</div>

</div>