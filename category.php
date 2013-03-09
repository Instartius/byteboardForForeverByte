<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Direct
 * @version 0.0.1
 * @created 1/19/13
 * Plantilla de acceso directo a pagina de categorias
 * @changed by Ander when? what did you do?
 * @changed 13/01/20/09:40:XX -> Code Behind Ready. Logica transferida a Code Behind
 */
process_code_behind('category');
?>
<? begin_html() ?>
    <? Render('header') ?>
    <div class="container">
        <? Category::SuperiorImageUrl() ?>
    </div>
    <? Render('container') ?>
    <? Render('footer') ?>
<? end_html() ?>