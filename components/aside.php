<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/9/13
 * Time: 2:28 PM
 */
?>
<div id="post-meta">
    <p><?php _e('Escrito en '); the_time('F j, Y'); ?><?php _e(',  por '); the_author_posts_link() ?></p>
    <p><?php _e(' Categorias: '); the_category(', ') ?></p>
    <p><?php the_tags('Etiquetas: ', ', ', ' '); ?></p>
</div><!--#post-meta-->
<div id="post-author">
    <p class="gravatar">
        <?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?>
    </p>
    <div id="authorDescription">
        <?php the_author_meta('description') ?>
        <div id="author-link">
            <p><?php _e('Más articulos de '); the_author_posts_link() ?></p>
        </div><!--#author-link-->
    </div><!--#author-description -->
</div><!--#post-author-->