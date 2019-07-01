
<h2 class="footer__titles">DESCARGAR APP</h2>
<div class="footer__titles-border"></div>
<div class="footer__logo__descargar-app-row">
	<div class="grid__row grid__row--no-padding">
		<div class="grid__container">
			<div class="grid__col-1-2-app">
				<div class="footer__app-box">
					<a href="https://play.google.com/store/apps/details?id=com.astrata.econduce" target="_blank" class="footer__app-box-logo"><img  src="<?php echoImg('logos/logoAndroid.svg') ?>" alt="logo de play store"
					onmouseover="this.src='<?php echoImg('boton_stores-02.svg') ?>'" onmouseout="this.src='<?php echoImg('logos/logoAndroid.svg') ?>'"></a>
					<a href="https://itunes.apple.com/us/app/econduce/id1034866648?ls=1&mt=8" target="_blank" class="footer__app-box-logo"><img  src="<?php echoImg('logos/logoApplw.svg') ?>" onmouseover="this.src='<?php echoImg('boton_stores-01.svg') ?>'" onmouseout="this.src='<?php echoImg('logos/logoApplw.svg') ?>'"alt="logo de app store"></a>
				</div>
			</div>
			<div class="grid__col-1-2-app">
				<div class="footer__icons">
					<div class='footer__logo--social-media'>
						<?php if (!empty($contacto->social_net['twitter']['link'])): ?>
							<a href="<?php echo $contacto->social_net['twitter']['link'] ?>" target="_blank" class="footer__logo--social-media-items"><img class="footer__logo-icon" src="<?php echoImg('icons/twitterIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondTwitter.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/twitterIcon.svg') ?>'" alt="icono de twitter"></a>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['facebook']['link'])): ?>
							<a href="<?php echo $contacto->social_net['facebook']['link'] ?>" target="_blank" class="footer__logo--social-media-items"><img class="footer__logo-icon" src="<?php echoImg('icons/facebookIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondFacebook.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/facebookIcon.svg') ?>'" alt="icono de facebook"></a>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['instagram']['link'])): ?>
							<a href="<?php echo $contacto->social_net['instagram']['link'] ?>" target="_blank" class="footer__logo--social-media-items"><img class="footer__logo-icon" src="<?php echoImg('icons/instagramIcon.svg') ?>"  onmouseover="this.src='<?php echoImg('icons/secondInstagram.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/instagramIcon.svg') ?>'" alt="icono de instagram"></a>
						<?php endif ?>
						<?php if (!empty($contacto->social_net['telefono'])): ?>
							<a href="https://api.whatsapp.com/send?phone=<?php echo $contacto->social_net['telefono'] ?>" target="_blank" class="footer__logo--social-media-items"><img class="footer__logo-icon" src="<?php echoImg('icons/whatsappIcon.svg') ?>" onmouseover="this.src='<?php echoImg('icons/secondWhatsapp.svg') ?>'" onmouseout="this.src='<?php echoImg('icons/whatsappIcon.svg') ?>'" alt="icono de whatsapp"></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
