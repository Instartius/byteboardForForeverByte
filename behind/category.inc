<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/20/13
 * Code Behind de acceso directo a @see category.php
 */

class Category
{
    static function SuperiorImageUrl()
    {
        $str_xbox= "XBox";
        $str_ps= "PlayStation";
        $str_nintendo= "Nintendo";
        $str_pc= "PC";
        $str_others= "Others";
        $str_resource= "Resource";
        $str_companias= "Compañias";
        $str_especiales= "Especiales";
        $str_next= "Next";
        $filename = "";

        if(strcasecmp(single_cat_title('', false ), $str_xbox) == 0)
            $filename = "categorias/xbox.jpg";
        else if(strcasecmp(single_cat_title('', false), $str_ps) == 0)
            $filename = "categorias/playstation.jpg";
        else if( strcasecmp(single_cat_title( '', false ), $str_nintendo) == 0)
            $filename = "categorias/nintendo.jpg";
        else if( strcasecmp(single_cat_title( '', false ), $str_pc) == 0)
            $filename = "categorias/none.jpg";
        else if(strcasecmp(single_cat_title('', false), $str_others) == 0)
            $filename = "categorias/none.jpg";
        else if( strcasecmp(single_cat_title('', false), $str_resource) == 0)
            $filename = "categorias/none.jpg";
        else if( strcasecmp(single_cat_title('', false), $str_companias) == 0)
            $filename = "categorias/none.jpg";
        else if( strcasecmp(single_cat_title('', false), $str_especiales) == 0)
            $filename = "categorias/none.jpg";
        else if( strcasecmp(single_cat_title('', false), $str_next) == 0)
            $filename = "categorias/none.jpg";
        else
            $filename = "";

        if(strlen($filename) == 0)
            echo " " . single_cat_title( '', false );
        else
        {
            $tag = '<img id="header-categoria" alt="' . "Categoria " . single_cat_title('', false) . '" src="' . get_image($filename) . '" />';
            echo $tag;
        }


    }
}
