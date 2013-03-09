<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see copyright.php
 */

class Copyright
{
    static function SiteUrl()
    {
        bloginfo('url');
    }

    static function SiteDescription()
    {
        bloginfo('description');
    }

    static function SiteName()
    {
        bloginfo('name');
    }

    static function Year()
    {
        echo date("Y");
    }
}
