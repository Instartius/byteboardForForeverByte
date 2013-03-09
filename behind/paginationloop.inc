<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see paginationloop.php
 */

class PaginationLoop
{
    static function NextHistoryLink()
    {
        previous_posts_link('Posteriores publicaciones &raquo;');
    }

    static function BackHistoryLink()
    {
        next_posts_link('&laquo; Anteriores publicaciones');
    }
}

?>