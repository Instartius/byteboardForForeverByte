<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see aboutus.php
 */

class AboutUs
{
    static function HeaderImage()
    {
        header_image();
    }

    static function EsloganSitio()
    {
        global $byteinfo;
        echo $byteinfo['eslogan'];
    }

    static function LinkAcercaDe()
    {
        global $byteinfo;
        echo $byteinfo['link_acercade'];
    }
}