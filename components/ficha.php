<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/9/13
 * Time: 2:30 PM
 */
?>
<?php
global $post;
if (get_post_type($post) == 'ficha_tecnica')
{
    ?>
<div class="related">
    <?php
    global $tagQuery;
    $myQuery = new WP_Query('tag=' . $tagQuery);
    ?>
    <div class="related">
        <?php if ($myQuery->have_posts()) : ?>
        <h3><span id='related-caption'>Articulos relacionados</span></h3>
        <?php endif; ?>
        <ul>
            <?php if ($myQuery->have_posts()) : while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
            <li>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
            </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>
</div>
<?php
}
?>