      <?php
        $medios = [
          [ 'logo_name'=> 'expansion',
            'name' => 'Expansión',
            'quote' => 'Emprendedores del año 2016',
            // 'source_url' => 'http://expansion.mx/emprendedores/2016/09/01/los-emprendedores-del-ano-de-la-revista-expansion'
          ],
          [ 'logo_name'=> 'el_financiero',
            'name' => 'El Financiero',
            'quote' => 'Una opción para moverse en la CDMX sin contaminar',
            // 'source_url' => 'https://www.youtube.com/watch?v=hPFWcE1KVMw&feature=youtu.be'
          ],
          [ 'logo_name'=> 'entrepreneur',
            'name' => 'Entrepreneur',
            'quote' => 'Econduce, alternativa para los problemas de movilidad',
            // 'source_url' => 'https://www.entrepreneur.com/article/276871'
          ],
          [ 'logo_name'=> 'endeavor',
            'name' => 'Endeavor',
            'quote' => 'Econduce está reduciendo la contaminación de la CDMX',
            // 'source_url' => 'http://endeavor.org/events/isp-67-medellin/'
          ],
          [ 'logo_name'=> 'el_universal',
            'name' => 'El Universal',
            'quote' => 'Econduce no contamina y circula todo los días',
            // 'source_url' => 'http://www.eluniversal.com.mx/articulo/metropoli/df/2016/03/15/econduce-una-opcion-ante-la-contingencia'
          ],
          [ 'logo_name'=> 'el_economista',
            'name' => 'El Economista',
            'quote' => 'Transporte eléctrico abre camino en la CDMX',
            // 'source_url' => 'http://eleconomista.com.mx/sociedad/2016/04/25/transporte-electrico-busca-camino-cdmx'
          ],
          [ 'logo_name'=> 'azteca',
            'name' => 'Azteca Noticias',
            'quote' => 'La CDMX necesita transporte sustentable',
            // 'source_url' => 'http://www.aztecanoticias.com.mx/capitulos/finanzas/199571/video-cdmx-necesita-transporte-sustentable'
          ],
          [ 'logo_name'=> 'unotv',
            'name' => 'UNO TV',
            'quote' => 'Scooters eléctricos, circulan todos los días y son amigables con el medio ambiente',
            // 'source_url' => 'http://www.unotv.com/noticias/portal/investigaciones-especiales/detalle/scooters-electricos-hoy-si-circulan-905045/'
          ],
          [ 'logo_name'=> 'google',
            'name' => 'Google Developers',
            'quote' => 'Econduce forma parte de Launchpad Accelerator',
            // 'source_url' => 'http://www.eluniversal.com.mx/articulo/techbit/2016/11/22/arranca-tercera-generacion-de-launchpad-accelerator'
          ]
        ];?>

<div class="slider slider-for">
    <?php foreach ($medios as $medio): ?>
      <div class="grid__box--emprendedores emprendedores">
        <div class="emprendedores__container">

        <p class="emprendedores__phrase">“<?= $medio['name']?>”</p>
        <p class="emprendedores__cite">- <?= $medio['quote']?></p>
        </div>
      </div>
    <?php endforeach ?>
</div>

<div class="slider__with-media-icons-container">
    <img class="slider__with-media-icons-selected-slide-arrow" src="<?php echoImg('slider-selected-slide-arrow.svg'); ?>" alt="">
    <div class="slider slider-nav slider__bgc">

      <?php foreach ($medios as $logo): ?>
        <div class="slider__logo slider__logo--<?= $logo['logo_name']?>">
            <div class="slider__slide slider__slide--<?= $logo['logo_name']?>" style="">
                <!-- <a href="<?= $logo['source_url'] ?>" target="_blank"> -->
                  <img class="slider__img slider__img-JS" src="<?php echoImg('logos-medios/'.$logo['logo_name'].'.png'); ?>" alt="logo de <?= $logo['logo_name']?>">
                  <img class="slider__img slider__img--selected slider__img-JS" src="<?php echoImg('logos-medios/'.$logo['logo_name'].'_select.png'); ?>" alt="logo de <?= $logo['logo_name']?>">
                <!-- </a> -->
            </div>
        </div>
      <?php endforeach ?>

    </div>
</div>
