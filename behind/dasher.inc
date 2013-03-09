<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * Code Behind del componente @see dasher.php
 */

class Dasher
{
    static function Slider()
    {
        $featucat = "featured";
        //$featucount = get_option('grft_gldct');
        //$my_query = new WP_Query('showposts='. $featucount .'&category_name='. $featucat .'');
        $my_query = new WP_Query('&category_name=' . $featucat . '');
        if ($my_query->have_posts())
        {
            $number = 0;
            while ($my_query->have_posts() && $number < 5)
            {
                $my_query->the_post();
                $do_not_duplicate = $post->ID;
                if (has_post_thumbnail())
                {
                    echo "<li>";
                    //echo '<img src="' . get_the_post_thumbnail() . '" alt="" />' ;
                    echo '<a href="' . get_permalink() . '">';
                    the_post_thumbnail();
                    //echo '<img src="' . get_the_post_thumbnail() . '" alt="" />' ;
                    echo '</a>';
                    echo '<div class="title-slide">';
                    echo '<p>';
                    the_title();
                    echo '</p>';
                    echo '</div>';
                    echo "</li>";
                    $number++;
                }
            }
        }
    }

    static function Review()
    {
        $featucat = "review";
        //$featucount = get_option('grft_gldct');
        //$my_query = new WP_Query('showposts='. $featucount .'&category_name='. $featucat .'');
        $my_query = new WP_Query('&category_name=' . $featucat . '');
        if ($my_query->have_posts())
        {
            //while ($my_query->have_posts())
            //{
            $my_query->the_post();
            $do_not_duplicate = $post->ID;
            if (has_post_thumbnail())
            {
                echo "<li>";
                //echo '<img src="' . get_the_post_thumbnail() . '" alt="" />' ;
                echo '<a href="' . get_permalink() . '">';
                the_post_thumbnail();
                echo '</a>';
                echo "</li>";
            }
            //}
        }
    }

    static function Carousel()
    {
        $featucat = "carousel";
        //$featucount = get_option('grft_gldct');
        //$my_query = new WP_Query('showposts='. $featucount .'&category_name='. $featucat .'');
        $my_query = new WP_Query('&category_name=' . $featucat . '');
        if ($my_query->have_posts())
        {
            $number = 0;
            while ($my_query->have_posts() && $number < 10)
            {
                $my_query->the_post();
                $do_not_duplicate = $post->ID;
                if (has_post_thumbnail())
                {
                    echo "<li>";
                    //echo '<img src="' . get_the_post_thumbnail() . '" alt="" />' ;
                    the_post_thumbnail();
                    echo '<a href="' . get_permalink() . '">';
                    echo '<div class="title-item-carrousel">';
                    echo '<p>' . the_title() . '</p>';
                    echo '</div>';
                    echo '</a>';
                    echo "</li>";
                    $number++;
                }
            }
        }
    }
}
