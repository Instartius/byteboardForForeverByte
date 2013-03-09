<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/9/13
 * Time: 12:46 PM
 */
?>
<article>
    <h1>
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
            <?php the_title() ?>
        </a>
    </h1>
    <?php edit_post_link('<small>Editar post</small>','','') ?>
    <div class="post-content">
        <?php the_content() ?>
        <?php wp_link_pages('before=<div class="pagination">&after=</div>') ?>
    </div><!--.post-content-->
    <?php render('ficha'); ?>
</article>