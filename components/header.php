<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * La cabecera (parte superior) de la pagina.
 * Submodulos:
 *              Cabecera como tal: upheader.php
*               Barra de navegacion: navbar.php
 */
?>
<div id="header">
    <?php Render('upheader') ?>
</div>
<div id="nav-primary" class="nav">
    <?php Render('navbar') ?>
</div>