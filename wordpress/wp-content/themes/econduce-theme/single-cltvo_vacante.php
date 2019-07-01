<?php get_header(); ?>

	<?php $vacante = new Cltvo_Vacante; ?>

	<div class="grid">
		<!-- header -->
		<?php  themeInc('/inc/general/header.php');  ?>

		<!-- heder responsive -->
		<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

		<div class="headerImage" style="<?php if (! empty($vacante->thumbail_img)): ?>background-image: url('<?php echo $vacante->thumbail_img->getImgSrc('full') ?>');<?php endif ?>height: 60vh; background-color: whitesmoke;"></div>

		<section class="vacante-single">
			<div class="vacante-single__ttl-box">
				<h1 class="vacante-single__ttl"><?php echo $vacante->post->post_title ?></h1>
			</div>
		</section>

		<section>
			<div class="grid__container" style="width: 100%; max-width: 1080px;">
				<div class="vacante-single__row">
					<div class="vacante-single__col">
						<div class="vacante-single__content">
							<?php echo apply_filters('the_content', $vacante->post->post_content); ?>
						</div>
					</div>
					<?php if (!empty($vacante->firstList['title']) && !empty($vacante->firstList['items'])): ?>
						<div class="vacante-single__col">
							<h2 class="vacante-single__subttl"><?php echo $vacante->firstList['title'] ?></h2>
							<div class="vacante-single__content">
								<ul>
									<?php foreach ($vacante->firstList['items'] as $item): ?>
										<li><?php echo $item['detalle'] ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endif ?>
					<?php if (!empty($vacante->secondList['title']) && !empty($vacante->secondList['items'])): ?>
						<div class="vacante-single__col">
							<h2 class="vacante-single__subttl"><?php echo $vacante->secondList['title'] ?></h2>
							<div class="vacante-single__content">
								<ul>
									<?php foreach ($vacante->secondList['items'] as $item): ?>
										<li><?php echo $item['detalle'] ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endif ?>
					<?php if (!empty($vacante->thirdList['title']) && !empty($vacante->thirdList['items'])): ?>
						<div class="vacante-single__col">
							<h2 class="vacante-single__subttl"><?php echo $vacante->thirdList['title'] ?></h2>
							<div class="vacante-single__content--two-columns">
								<ul>
									<?php foreach ($vacante->thirdList['items'] as $item): ?>
										<li><?php echo $item['detalle'] ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</section>

		<!-- seccion 'footer' -->
		<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>
	</div>

<?php get_footer(); ?>
