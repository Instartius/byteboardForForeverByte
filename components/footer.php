<?php
/**
 * @author Instartius Corporatio
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * La parte final inferior de la pagina donde se encuentran
 * los modulos:
 *              Panel de acerca de la comunidad: aboutus.php
 *              El navegador de Blogs de la comunidad: bottomnav.php
 *              La publicidad de Instartius: instartius.php
 *              El copyright: copyright: copyright.php
 */
?>
<div id="footer">
    <footer>
        <div id="about-us">
            <? Render('aboutus') ?>
        </div>
        <div id="footer-content">
            <? Render('bottomnav') ?>
        </div>
        <div id="blog-meta">
            <div class="container">
                <? Render('instartius') ?>
                <? Render('copyright') ?>
            </div>
        </div>
    </footer>
</div>