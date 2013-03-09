<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see loop.php
 */

class Loop
{
    static function PostPermalink()
    {
        the_permalink();
    }

    static function PostTitle()
    {
        the_title();
    }

    static function PostTime()
    {
        the_time('j \d\e F \d\e\l Y');
    }

    static function PostContent()
    {
        the_content(__('Leer más'));
    }

    static function NumberCommentsLink()
    {
        comments_popup_link('0', '1', '%');
    }

    static function AuthorPostsLink()
    {
        the_author_posts_link();
    }
}

?>