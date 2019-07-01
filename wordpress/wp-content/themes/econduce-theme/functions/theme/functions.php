<?php

/**
 * En este archivo se incluyen las funciones del tema
 *
 */


/** ==============================================================================================================
 *                                              FUNCIONES DEL TEMA
 *  ==============================================================================================================
 */



// funciones aqui ...


//Funcion para imagen al princio de la pagina

function headerImage($img_url = '', $title = '', $btnLink = '', $btnttl = '', $link1 = '', $image = '', $imageHover = '', $imageOut ='' ,$link2 = '', $image2 = '', $imageHover2 = '', $imageOut2 ='', $arrows_id = ''){ ?>
    <div class="headerImage" style="background-image: url('<?php echoImg($img_url); ?>');">
        <div class="headerImage__container">
          <div class="grid__container">
            <div class="grid__col-1-1--portada slide-header__box-text grid__col-1-1--portada--mleft21">
              <div class="slide-header__column--big">
                  <span class="slide-header__box-text slide-header__box-text--shadow-text headerImage--title"><?= $title ?></span>
                  <br>
                  <?php if (!empty($btnttl)): ?>
                    <a href="<?= $btnLink ?>" target="_blank" class="slide-header__btn"><?= $btnttl ?></a>
                  <?php endif ?>
              </div>
            </div>
          </div>

          <?php if (!empty($image)): ?>
          <div class="headerImage__logos app__logos aprende_button">
              <a href="<?= $link1 ?>" class="app__logo headerImage__logos--img" target="_blank">
              <img src="<?php echoImg($image); ?>" alt="" onmouseover="this.src='<?php echoImg($imageHover); ?>'" onmouseout="this.src='<?php echoImg($imageOut); ?>'">
            </a>

            <a href="<?= $link2 ?>" class="app__logo headerImage__logos--img" target="_blank">
              <img src="<?php echoImg($image2); ?>" alt="" onmouseover="this.src='<?php echoImg($imageHover2); ?>'" onmouseout="this.src='<?php echoImg($imageOut2); ?>'">
            </a>
          </div>
          <?php endif ?>
        </div>

    </div>
    <a href="<?= $arrows_id ?>" class="headerImage__arrows">
      <div class="slide-header__arrows-down aprende_arrow"></div>
    </a>

<?php }

//Funcion para textos

function titleContent($idArrows = '', $title, $text = '') { ?>
  <div class="grid__col-1-1 title-content" id="<?= $idArrows ?>">
		<div class="estaciones__title-container section__containerText">
<!--       <div class="section__containerText--left estaciones__line estaciones__line--left"></div> -->
      	<h2 class="estaciones__title"><?= $title ?></h2>
<!--       <div class="estaciones__line section__containerText--right"></div>-->
      <p class="section__descrption"><?= $text ?></p>
		</div>
	</div>
<?php }

function iconWithText($text = '', $image='', $title='', $hover_text ='', $hover_id = '', $ttl = '', $link_page = '') {?>
    <div class="grid__box grid__box--steps ">
        <?php if ($title != ''): ?>
          <h3 class="estaciones__title three-images__title" style="height:35px"><?= $title ?></h3>
        <?php else : ?>
            <div class="three-images__title" style="height:35px"></div>
        <?php endif ?>
        <div class="empieza-hoy__image empieza-hoy__image-side">
            <img src="<?php echoImg($image); ?>" alt="">
            <?php if ($hover_text != ''): ?>
                <a href="<?= $link_page ?>">
                    <div class="icon__circle centerXY" id="<?= $hover_id ?>">
                        <div class="icon__circle-text">
                          <?= $hover_text ?>
                        </div>
                    </div>
                </a>
            <?php endif ?>
        </div>
        <div class="empieza-hoy__paragraph">
            <p class=""><?php echo $ttl ?></p>
            <p class=""><?php echo $text ?></p>
        </div>
    </div>
<?php ; }

//Funcion para cuadritos en columnas de 3
function oneOfThree($text = '', $image = '', $title='', $hover_text ='', $hover_id = '', $ttl = '', $link_page = '') { ?>
    <div class="grid__col-1-3 empieza-hoy__lineas" id="botalo">
        <?php iconWithText($text, $image, $title, $hover_text, $hover_id, $ttl, $link_page) ?>
    </div>
<?php }

//Funcion en pagina ¿que es? cuadritos en columnas de 4
function oneOfFour($text = '', $image = '', $title='', $hover_text='', $hover_id='', $ttl='') { ?>
    <div class="grid__col-1-4 empieza-hoy__lineas columnsFour__padd">
        <?php iconWithText($text, $image, $title, $hover_text, $hover_id, $ttl) ?>
    </div>
<?php }

function iconsInThreeColumns($icons_arr) {// $icon = ['text', 'img']
    ?><div class="grid__container"><?php
        foreach ($icons_arr as $icon):
            oneOfThree(
              $icon['text'],
              $icon['img'],
              isset($icon['title']) ? $icon['title'] : '',
              isset($icon['hover_text']) ? $icon['hover_text'] : '',
              isset($icon['hover_id']) ? $icon['hover_id'] : '',
              isset($icon['ttl']) ? $icon['ttl'] : '',
              isset($icon['link_page']) ? $icon['link_page'] : ''
          );
        endforeach;
    ?></div><?php
}

function iconsInFourColumns($icons_arr) {// $icon = ['text', 'img']
    ?><div class="grid__container columnsFour"><?php
        foreach ($icons_arr as $icon):
            oneOfFour(
              $icon['text'],
              $icon['img'],
              $icon['title'],
              $icon['hover_text'],
              $icon['hover_id'],
              $icon['ttl']);
        endforeach;
    ?></div><?php
}

function makeAnimationWithCounter($is_ubicaciones, $counter_copy) {?>
    <div class="contador contador_JS">
        <div class="cycles__container">
            <?php include get_stylesheet_directory() . '/inc/counter.php'  ?>
            <div class="cycles__city-container">
                <?php themeInc('/images/ciudad-v2.svg') ?>
            </div>
            <div class="cycles">
                <div class="cycles-semaforo1__container"><?php themeInc('/images/semaforo-v2.svg');  ?></div>
                <div class="cycles-semaforo2__container"><?php themeInc('/images/semaforo-v2.svg');  ?></div>
                <div class="cycles-muneco1__container"><?php themeInc('/images/muneco1-v2.svg');  ?></div>
                <div class="cycles-muneco2__container"><?php themeInc('/images/muneco2-v2.svg');  ?></div>
                <div class="cycles-muneco3__container"><?php themeInc('/images/muneco3-v2.svg');  ?></div>
                <div class="contador-cycle__aspect-ratio-container"></div>
            </div>
        </div>
        <div class="grid__row grid__row--no-padding">
            <div class="grid__container">
                <div class="grid__col-1-1">
                </div>
            </div>
        </div>
    </div>
<?php }


//funcion para agregar metabox en plantilla
