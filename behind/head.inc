<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * El Code Behind del componente @see head.php
 * @created 1/19/13
 */

class Head
{
    static function Title()
    {
        if (is_category())
        {
            echo 'Noticias de la Categoría &quot;';
            single_cat_title();
            echo '&quot; | ';
            bloginfo('name');
        }
        elseif (is_tag())
        {
            echo 'Noticias del Tag &quot;';
            single_tag_title();
            echo '&quot; | ';
            bloginfo('name');
        }
        elseif (is_archive())
        {
            wp_title('');
            echo ' Historial de Noticias | ';
            bloginfo('name');
        }
        elseif (is_search())
        {
            echo 'Búsqueda de &quot;'.wp_specialchars($s).'&quot; | ';
            bloginfo('name');
        }
        elseif (is_home())
        {
            bloginfo('name');
            echo ' | ';
            bloginfo('description');
        }
        elseif (is_404())
        {
            echo 'Error 404 Elemento no Encontrado | ';
            bloginfo('name');
        }
        elseif (is_single())
        {
            wp_title('');
        }
        else
        {
            echo wp_title('');
            echo ' | ';
            bloginfo('name');
        }
    }

    static function MetaDescription()
    {
        wp_title(''); echo ' | '; bloginfo( 'description' );
    }

    static function MetaCharset()
    {
        bloginfo('charset');
    }

    static function PingBackUrl()
    {
        bloginfo('pingback_url');
    }

    static function SiteName()
    {
        bloginfo('name');
    }

    static function Rss2Url()
    {
        bloginfo('rss2_url');
    }

    static function AtomUrl()
    {
        bloginfo('atom_url');
    }
}
