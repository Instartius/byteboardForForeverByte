<?php
/**
 * @author Instartius Corporation
 * @package Byteboard.Tenrou
 * @version 0.0.1
 * @created 13/01/19
 * Code Behind del componente @see upheader.php
 */

class UpHeader
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

    static function HeaderImage()
    {
        header_image();
    }

    static function Sidebar($slugname)
    {
        return dynamic_sidebar($slugname);
    }
}
