<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 */

class PostSocial
{
    static function PostPermalink()
    {
        the_permalink();
    }

    static function PostTitle()
    {
        the_title();
    }
}
