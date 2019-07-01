<div class="counter__main counter__main_JS">
    <h2 class="counter__main-ttl"><?= $counter_copy ?></h2>
    <div class="counter__container">

        <?php if(isset($is_ubicaciones) ? $is_ubicaciones : false) : ?>
	        <div class="flex counter__container_JS" style="opacity: 1"></div>
    	<?php else : ?> 
    		<a href="https://mi.econduce.mx/viajes/mapa" target="_blank">
        		<div class="flex counter__container_JS" style="opacity: 1"></div>
    		</a>
    	<?php endif ?>

        <?php if(isset($is_ubicaciones) ? $is_ubicaciones : false) : ?>
            <div class="flex">
                <?php foreach(['t','o','n'] as $letter) : ?>
                    <ul class="counter">
                        <li class="active">
                            <span>
                                <div class="up">
                                    <div class="shadow"></div>
                                    <div class="inn"><?= $letter ?></div>
                                </div>
                                <div class="down">
                                    <div class="shadow"></div>
                                    <div class="inn"><?= $letter ?></div>
                                </div>
                            </span>
                        </li>
                    </ul>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</div>
