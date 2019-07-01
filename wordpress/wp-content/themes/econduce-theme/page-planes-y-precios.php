<?php get_header(); ?>

<!-- Slider portada -->
<div class="grid">

	<!-- header -->
	<?php  themeInc('/inc/general/header.php');  ?>

	<!-- heder responsive -->
	<?php  include get_stylesheet_directory() . '/inc/general/menu-responsive.php'  ?>

	<!-- tablas mobile -->
    <?php  include get_stylesheet_directory() . '/inc/precios/tables-mobile.php'  ?>

	<!--header image -->
	<div class="precios__headerImage" id="headerImage_JS" style="background-image: url('<?php echoImg('slides-precios.jpg'); ?>');">
	 	<div class="precios__headerImage--info headerImage__preciosText-info" id="info_JS">
	     	<p class="precios__headerImage--infoText">Te regalamos tu primera<br>mensualidad de PRO</p>
			<a href="https://mi.econduce.mx/registro" target="_blank"><button class="precios__headerImage--infoButton">Regístrate</button></a>
	    </div>
        <!-- tablas -->
		<?php themeInc( '/inc/precios/tables.php');?>
	 </div>

	 <!-- slider pasos fondo azul -->
	 <?php  include get_stylesheet_directory() . '/inc/precios/slider-pasos.php'  ?>

	 <!-- seccion moverte -->
	 <div class="precios__headerImage precios__headerImage--diff-position precios__imagesSection" style="background-image: url('<?php echoImg('moverte.jpg'); ?>');">
	    <div class="precios__headerImage--info">
	    	<p class="precios__headerImage--infoText">¡Moverte por la ciudad nunca había sido tan fácil!</p>
			<a href="https://mi.econduce.mx/registro" target="_blank"><button class="precios__headerImage--infoButton precios__imagesSection--button">¡Empieza hoy!</button></a>
	    </div>
	</div>

    <!-- slider testimonios -->
    <div style="margin: 0 auto;">
    	<div class="relative precios__quotes-slider">
        	<div class="precios__quotes-title">
            	<?php echo titleContent( '','¿Por qué nuestros usuarios nos prefieren?',''); ?>
          	</div>
          	<div class="quotes_JS precios__quotes">
            	<div class="precios__quotes-slide">
              		<div class="precios__quotes-container">
                		<div class="precios__quotes-1-2--small">
                  			<img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio1.jpg" alt="">
                  			<div class="precios__quotes-divisor"></div>
                		</div>
                		<div class="precios__quotes-1-2--big">
                  			<p class="precios__quotes-name">JOSÉ MARÍA DE TAVIRA | <span class="precios__quotes-name precios__quotes-user" >@JMdeTavira</span></p>
                  			<p class="precios__quotes-text">
                    			“Un día de trámites y traslados se convierte en un delicioso paseo por la ciudad gracias a @econducemx”
                  			</p>
                	  </div>
              		</div>
            	</div>

	            <!-- testimonio 2 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio2.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">ALFREDO MEJÍA | <span class="precios__quotes-name precios__quotes-user" >@annoyingMejia</span></p>
	                  <p class="precios__quotes-text">
	                    “Bye bye @uber, see y latter @cabify_Mexico, HOLA @econducemx”
	                  </p>
	                </div>

	              </div>
	            </div>

	            <!-- testimonio 3 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">

	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio3.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">XABI LICEAGA | <span class="precios__quotes-name precios__quotes-user" > @xabilice</span></p>
	                  <p class="precios__quotes-text">
	                    “Andar en moto me hace feliz, ahorrarme horas en #CDMX me da la vida y no contaminar me hace sentir bien @econducemx, heavy user & fan”
	                  </p>
	                </div>
	              </div>
	            </div>

	            <!-- testimonio 4 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio4.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">JEAN HERERRA | <span class="precios__quotes-name precios__quotes-user" > @JEANHERRERA11</span></p>
	                  <p class="precios__quotes-text">
	                    “Aplausos por este sistema de motos eléctricas que aportan muchísimo a la ciudad y al planeta, no más contaminación!! ”
	                  </p>
	                </div>
	              </div>
	            </div>

	            <!-- testimonio 5 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio5.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">ANA KAREN | <span class="precios__quotes-name precios__quotes-user" > @KarenSann</span></p>
	                  <p class="precios__quotes-text">
	                    “¡Súper proyecto! Siempre los recomendaré al mil. Agradezco haberlos conocido! TOP! Por una ciudad más limpia y con gente más feliz”
	                  </p>
	                </div>
	              </div>
	            </div>

	            <!-- testimonio 6 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio6.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">TROY BOLTON | <span class="precios__quotes-name precios__quotes-user" > @JuanitoJicamas</span></p>
	                  <p class="precios__quotes-text">
	                    “Ayer gracias a @econducemx fue un viernes de quincena sin tráfico”
	                  </p>
	                </div>
	              </div>
	            </div>

	            <!-- testimonio 7 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                  <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio7.jpg" alt="">
	                  <div class="precios__quotes-divisor"></div>
	                </div>
	                <div class="precios__quotes-1-2--big">
	                  <p class="precios__quotes-name">MARCO ADRIÁN HNZ | <span class="precios__quotes-name precios__quotes-user" > @themarcohr</span></p>
	                  <p class="precios__quotes-text">
	                    “A esta hora y con este tráfico en #CDMX... 15 min de Condesa a Polanco thx”
	                  </p>
	                </div>
	              </div>
	            </div>

	            <!-- testimonio 8 -->
	            <div class="precios__quotes-slide">
	              <div class="precios__quotes-container">
	                <div class="precios__quotes-1-2--small">
	                <img class="precios__quotes-img" src="<?php bloginfo('template_url') ?>/images/testimonio8.jpg" alt="">
	                <div class="precios__quotes-divisor"></div>
	              </div>
	              <div class="precios__quotes-1-2--big">
	                <p class="precios__quotes-name">RAFA RUÍZ | <span class="precios__quotes-name precios__quotes-user" > @rafaelruizc</span></p>
	                <p class="precios__quotes-text">
	                  	"Sin @econducemx no habría podido conocer tantos lugares en la CDMX con tanta libertad"
	                </p>
	              </div>
	              </div>
	            </div>
          	</div>
         </div>
      </div>

	  <!-- seccion planes empresariales -->
	  <div class="precios__headerImage precios__imagesSection precios__imagesSection2" style="background-image: url('<?php echoImg('planesempresariales.jpg'); ?>');">
	  	<div class="precios__headerImage--info precios__imagesSection2-info">
			<div class="precios__headerImage--infoText precios__imagesSection--textContainer">
				<p>Planes Empresariales</p>
				<span>Tenemos planes a la medida para empresas</span>
			</div>
			<a href="mailto:hola@econduce.mx?Subject=Planes%20empresariales" target="_blank"><button class="precios__headerImage--infoButton">Contáctanos</button></a>
		</div>
	 </div>
  </div>
	<!-- seccion 'footer' -->
	<?php  include get_stylesheet_directory() . '/inc/general/footer.php'  ?>

<?php get_footer(); ?>
