<div class="footer__responsive">
	<div class="grid__row">
		<div class="grid__container">
			<div class="grid__col-1-1">
				<div class="footer__logo-responsive">
					<ul class='footer__logo--social-media'>
						<?php if (!empty($contacto->social_net['twitter']['link'])): ?>
							<li class="footer__logo--social-media-items">
								<a href="<?php echo $contacto->social_net['twitter']['link'] ?>" target="_blank"><img src="<?php echoImg('icons/twitterIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondTwitter.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/twitterIcon.svg') ?>'" alt="icono de twitter"></a>
							</li>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['facebook']['link'])): ?>
						<li class="footer__logo--social-media-items">
							<a href="<?php echo $contacto->social_net['facebook']['link'] ?>" target="_blank"><img src="<?php echoImg('icons/facebookIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondFacebook.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/facebookIcon.svg') ?>'" alt="icono de facebook"></a>
						</li>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['instagram']['link'])): ?>
						<li class="footer__logo--social-media-items">
							<a href="<?php echo $contacto->social_net['instagram']['link'] ?>" target="_blank"><img src="<?php echoImg('icons/instagramIcon.svg') ?>"  onmouseover="this.src='<?php echoImg('icons/secondInstagram.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/instagramIcon.svg') ?>'" alt="icono de instagram"></a>
						</li>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['telefono'])): ?>
						<li class="footer__logo--social-media-items">
							<a href="https://api.whatsapp.com/send?phone=<?php echo $contacto->social_net['telefono'] ?>" target="_blank"><img src="<?php echoImg('icons/whatsappIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondWhatsapp.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/whatsappIcon.svg') ?>'" alt="icono de whatsapp"></a>
						</li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
