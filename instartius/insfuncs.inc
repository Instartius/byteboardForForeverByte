<?php
/**
 * @author Instartius Corporation
 * @package Tenrou
 * @version 0.0.1
 * @change 13/01/19/10:38:XX -> Agregado metodo process_code_behind
 * @change 13/01/19/11:34:XX -> Agregada validacion de si CodeBehind para el componente existe en process_code_behind para evitar detencion por componentes que carezcan del CodeBehind
 * @change 13/01/19/21:35:XX -> Agregado metodo para cargar archivo directamente desde la raiz, como por ejemplo el favicon
 * @change 13/01/20/09:38:XX -> Agregados metodos getters de URL de imagenes, estilos y scripts para acceso en Code Behinds
 */

require_once('getfuncs.inc');
require_once('renderfuncs.inc');
require_once('htmlfuncs.inc');

/**
 * Imprime en pantalla el valor actual de la variable
 * de contexto en caso de encontrar un metodo que lo imprima
 * o lo devuelva.
 * @param $var El nombre de la variable a imprimir
 */
function p($var)
{
    $func = 'the_' . $var;
    $func2 = 'get_' . $var;
    $result = get_bloginfo($var);
    if(function_exists($func))
        $func();
    else if(function_exists($func2))
        echo $func2();
    else if(strlen($result) > 0)
        bloginfo($var);
    else
        echo 'NO SE ENCONTRO GETTER PARA ' . $var;
}

function the_($var) { p($var); }

/**
 * Devuelve la ruta absoluta completa del recurso en el paquete especificado
 * @param $nombre El nombre del recurso/archivo con extension
 * @param $paquete El nombre del paquete/directorio donde se encuentra dentro del tema
 */
function get_file_path($nombre, $paquete)
{
    $theme_url = get_bloginfo('template_url');
    return $theme_url . '/' . $paquete . '/' . $nombre;
}

function archive($name, $folder)
{
    $theme_url = get_bloginfo('template_url');
    echo $theme_url . '/' . $folder . '/' . $name;
}

function get_archive($name, $folder)
{
    $theme_url = get_bloginfo('template_url');
    return $theme_url . '/' . $folder . '/' . $name;
}

/**
 * Imprime la ruta de un archivo sobre la raiz de la plantilla
 * especificando el nombre del archivo con su extension correspondiente
 * @param $filename El nombre del archivo con extension
 */
function archive_from_root($filename)
{
    $theme_url = get_bloginfo('template_url');
    echo $theme_url . '/' . $filename;
}

function image($name)
{
    archive($name, 'images');
}

function get_image($name)
{
    return get_archive($name, 'images');
}

function style($name)
{
    archive($name, 'styles');
}

function get_style($name)
{
    return get_archive($name, 'styles');
}

function script($name)
{
    archive($name, 'scripts');
}

function get_script($name)
{
    return get_archive($name, 'scripts');
}

function resource($name)
{
    archive($name, 'resources');
}

function my_style()
{
    if(is_front_page())
        archive('front-page.css', 'styles');
}

function my_script()
{
    if(is_front_page())
        archive('front-page.js', 'scripts');
}

function ins_title()
{
    $sitename = get_bloginfo('name');
    if(is_front_page() || is_home())
        echo $sitename;
    else if(is_archive())
        echo $sitename . " | Earlier posts";
    else if(is_author())
        echo $sitename . " | Publicaciones del autor";
    else if(is_category())
        echo $sitename . ' | Cagegoria "' . get_category_template() . '"';
}

/**
 * Procesa todo el CodeBehind o logica detras de cierto componente
 * @param $filename El nombre del archivo/directo/componente a cargar el CodeBehind
 */
function process_code_behind($filename)
{
    $path = TEMPLATEPATH . '/behind/' . $filename . '.inc';
    if (file_exists($path))
        require_once($path);
}

?>