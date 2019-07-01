
<style>
    body {padding-top: 100px;}
    .blaa {
        font-size: 50px;
    }

    .blaa-container .blaa{
        font-weight: bold;
    }
</style>


<?php
function headerImage($img_url, $title, $button_html) {
    ?>
        <div class="blaa"><?= $img_url ?></div>
        <div><?= $title ?></div>
        <div><?= $button_html ?></div>
    <?php
};

headerImage('woaaaa.jpg', 'Mira','<button>Hola</button>');

function button($text) {
    return '<button>'.$text.'</button>';
}

?>


<div class="blaa-container">
    <?php headerImage('wossss.jpg', 'Ira', button('Hola').button('Adios')); ?>
    <?php headerImage('wossss.jpg', 'Ira', '<button>Hola</button>'); ?>
</div>

<?php foreach ([echoImg('moto.svg'),2,3] as $key): ?>
    <?php echo $key ?>
    
<?php endforeach ?>