<?php
/**
 * @author Instartius Corporation
 * @version 0.0.1
 * @package ByteBoard.Components
 * El presente documento tiene como objetivo inicializar todo
 * el contenido de alrededor del cuerpo visual de cualquier
 * pagina de acceso directo del template. Esto significa que
 * este componente esta diseñado para renderizar hasta como
 * maximo el término del HEAD y el comienzo logico del BODY (no visual)
 * @change 13/01/19/10:25:XX -> Code Behind Ready
 */
?>
<!DOCTYPE html>
<html <?php Begin::HtmlAttributes() ?>>
    <?php Render('head') ?>
    <body <?php Begin::BodyClasses() ?>>
        <div id="fb-root"></div>
<?php // CIERRE SIMULADO ?>