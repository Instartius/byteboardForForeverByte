<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/11/13
 * Panel rotativo de imagenes en donde se encuentra
 * el slider principal, el carrusel y el review
 */
?>
<div id="slider">
    <div class="container">
        <div class="container-slider">
            <ul id="images-slider">
                <?php Dasher::Slider() ?>
            </ul>
        </div>
        <div class="container-carrousel">
            <ul id="images-carrousel">
                <?php Dasher::Carousel() ?>
            </ul>
        </div>
        <div class="container-featured">
            <ul id="images-featured">
                <?php Dasher::Review() ?>
            </ul>
        </div>
    </div>
</div>