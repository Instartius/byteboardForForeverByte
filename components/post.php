<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/9/13
 * Time: 12:46 PM
 * El presente archivo consiste en el LOOP
 * con query de 1 unico single POST para mostrarse
 * en el single.php que corresponde a la vista de
 * articulo único y que tiene como subcomponentes:
 * - article -> El contenido del articulo como tal
 * - aside -> El meta del autor y otros detalles del articulo
 * - pagination -> Para permitir navegar entre diferentes articulos consecutivamente
 */
?>
<div class="container">
    <div id="content" class="article">
        <?php if (have_posts()) while (have_posts()) : the_post() ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <?php render('article') ?>
                <?php render('aside') ?>
                <br/>
                <?php echo do_shortcode('[fbcomments num="15" count="on" countmsg="comentarios" title="Comenta con Facebook" width="640"]'); ?>
            </div><!-- #post-## -->
            <?php render('pagination') ?>
        <?php endwhile ?>
    </div><!--#content-->
    <?php get_sidebar() ?>
</div>