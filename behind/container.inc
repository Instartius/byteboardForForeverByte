<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see container.php
 */

class Container
{
    /**
     * Devuelve true si hay posts en el query actual, false de lo contrario
     * @return mixed
     */
    static function HavePosts()
    {
        return have_posts();
    }

    /**
     * Devuelve true si aun quedan publicaciones para fetch, false de lo contrario
     * En caso de que queden, hace fetch al siguiente post
     * @return mixed
     */
    static function PostsLeft()
    {
        $left = have_posts();
        if($left)
            the_post();
        return $left;
    }

    /**
     * Carga el Sidebar "InsSidebar"
     */
    static function Sidebar()
    {
        dynamic_sidebar('InsSidebar');
    }
}
