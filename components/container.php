<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * El contenedor principal de publicaciones, contenido y sidebar
 */
?>
<div class="container">
    <div id="content">
        <? if (Container::HavePosts()) : ?>
            <? while (Container::PostsLeft()) : ?>
                <div class="post-single">
                    <? Render('loop') ?>
                </div>
            <? endwhile ?>
        <? else : ?>
            <div class="no-results">
                <?php Render('noresults') ?>
            </div>
        <? endif ?>
        <? Render('paginationloop') ?>
    </div><!--#content-->
    <div id="sidebar">
        <ul>
            <? Container::Sidebar() ?>
        </ul>
    </div>
    <div class="clear"></div>
</div><!--.container-->