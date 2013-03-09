<?php
/**
 * @author Instartius Corporation
 * @version 0.0.1
 * @package ByteBoard.Direct
 * El archivo principal del tema a donde llegan todo el ruteo
 * en caso de que no se encuentre un archivo de mayor
 * prioridad para WordPress.
 * La pagina principal del sitio hasta cuando se cree front-page.php
 * @change 13/01/19/01:01:XX : Agregada documentacion y primer cambio
 */
?>
<?php begin_html() ?>
    <?php Render('header') ?>
    <?php Render('dasher') ?>
    <?php Render('container') ?>
    <?php Render('footer') ?>
<?php end_html() ?>