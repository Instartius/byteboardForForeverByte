<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/1/13
 * Time: 1:46 AM
 */

class Html
{
    public static function Open($tag, $arguments = array())
    {
        $builder = '<' . $tag;
        if(!is_null($arguments) && sizeof($arguments) != 0)
            foreach($arguments as $key => $value)
                $builder .= ' ' . $key . '="' . $value . '"';
        $builder .= '>';
        echo $builder;
    }

    public static function Close($tag)
    {
        $builder = '</' . $tag . '>';
        echo $builder;
    }

    /**
     * @param $tag
     * @param array $arguments
     */
    public static function Tag($tag, $arguments = array())
    {
        $builder = '<' . $tag;
        if(!is_null($arguments) && sizeof($arguments) != 0)
            foreach($arguments as $key => $value)
                $builder .= ' ' . $key . '="' . $value . '"';
        $builder .= '/>';
        echo $builder;
    }

    /**
     * Crea la etiqueta link para llamar a un estilo externo con el nombre $filename.css.
     * El archivo debe estar en la carpeta css dentro de la ruta de la carpeta del tema especificada
     * @param $filename El nombre del archivo sin la extension css (por ahora solo se admiten archivos css)
     */
    public static function Style($filename)
    {
        $theme_url = get_bloginfo('template_url');
        echo '<link rel="stylesheet" type="text/css" href="' . $theme_url . '/styles/' . $filename . '.css" media="screen" />';
    }

    /**
     * Crea la etiqueta link para llamar al estilo predeterminado del tema activo
     */
    public static function ThemeStyle()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_url') . '" media="screen" />';
    }

    /**
     * Crea el tagpair script para llamar a un script externo con el nombre $filename.js.
     * El archivo debe estar en la carpeta js dentro de la ruta de la carpeta del tema especificado
     * @param $filename El nombre del archivo sin la extension js (por ahora solo se admiten archivos js)
     */
    public static function Script($filename)
    {
        $theme_url = get_bloginfo('template_url');
        echo '<script type="application/javascript" src="' . $theme_url . '/scripts/' . $filename . '.js"></script>';
    }

    /**
     * Crea el tagpair script para llamar a un script DART externo con el nombre $filename.dart o $filename.dart.js
     * en caso de que el navegador que hizo el request no soporte el lenguaje Dart
     * @param $filename El nombre del archivo sin extension dart (por ahora solo se admiten archivos dart)
     */
    function DartScript($filename)
    {
        $theme_url = get_bloginfo('template_url');
        echo '<script type="application/dart" src="' . $theme_url . '/scripts/' . $filename . '.dart"></script>';
    }

    /**
     * Carga el Script JavaScript remoto de los repositorios de Google para soportar todas las funciones
     * del lenguaje Dart. Llame a esta funcion solo en caso de que vaya a usar el lenguaje Dart para Scripting
     */
    function DartLangSupport()
    {
        echo '<script src="https://dart.googlecode.com/svn/branches/bleeding_edge/dart/client/dart.js"></script>';
    }

    /**
     * Crea la etiqueta img para llamar y renderizar una imagen con el nombre $filename (con extension) y mostrarlo
     * en la pagina que lo invoque
     * @param $filename El nombre del archivo con extension incluida
     * @param null $alternative El texto alternativo para la imagen (opcional)
     * @param null $id El identificador unico de la imagen en el documento (opcional)
     */
    function Image($filename, $alternative = null, $id = null)
    {
        $theme_url = get_bloginfo('template_url');
        $tagrender = '<img src="' . $theme_url . '/images/' . $filename . '"';
        if ($alternative != null)
            $tagrender .= ' alt="' . $alternative . '"';
        if ($id != null)
            $tagrender .= ' id="' . $id . '"';
        $tagrender .= ' />';
        echo $tagrender;
    }

    /**
     * Imprime la etiqueta img correspondiente a la imagen del avatar del autor, ca
     * @param string $size El tamaño del avatar
     */
    function TagForAvatar($size = '128')
    {
        echo get_avatar(get_the_author_meta('e-mail'), $size);
    }
}

?>