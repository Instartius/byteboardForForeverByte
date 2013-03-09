<?php
/**
 * @author Instartius Corporation
 * @package Tenrou
 * @version 0.0.1
 * @change 13/01/19/10:58:XX -> Process Code Behind cuando Render hook before
 */

/**
 * Renderiza el archivo con el nombre especificado (sin la extension php)
 * Se asume extension php. Si se requiere cargar otro tipo de archivo, usar
 * la funcion _r para renderizar archivos con extension especificada
 * @param $nombre El nombre del archivo sin extension (se asume .php)
 */
function render($nombre)
{
    process_code_behind($nombre);
    include(TEMPLATEPATH . '/components/' . $nombre . '.php');
}

/**
 * Renderiza el archivo con el nombre y extension especificados
 * Se asume el formato tipico de nomenclatura de archivo.extension.
 * @param $nombre El nombre del archivo con extension
 */
function _r($nombre)
{
    include(TEMPLATEPATH . '/components/' . $nombre);
}

/**
 * Renderiza el componente que normalmente se encarga de inicializar
 * Los tags primeros y primordiales del HTML, como lo es la etiqueta
 * de apertura del HTML, los namespace (en caso de XHTML), el doctype
 * y OPCIONALMENTE cargar el HEAD ahi mismo.
 * Archivo -> begin.php
 */
function begin_html()
{
    process_code_behind('begin');
    render('begin');
}

/**
 * Renderiza el componente que normalmente se encarga de finalizar
 * y cerrar todos los tags de ambito mas global (cercanos al document HTML)
 * Archivo -> end.php
 */
function end_html()
{
    process_code_behind('end');
    render('end');
}

/**
 * Renderiza el componente HTML que se encarga exclusivamente de
 * las etiquetas méticas del HEAD como lo son los metadatos, el titulo,
 * los recursos, los estilos, las varibles de entorno cliente, los scripts,
 * las bases, entre otros posibles elementos.
 * @param null $slug El slug alternativo
 */
function ins_head($slug = null)
{
    if(!is_null($slug))
        render('head' . '-' . $slug);
    else
        render('head');
}

/**
 * Renderiza el componente visual HTML responsable de la cabecera de la pagina
 * PUEDE contener el logo, algunos navs y algunos widgetbars
 * @param null $slug El slug alternativo
 */
function ins_header($slug = null)
{
    if(!is_null($slug))
        render('header' . '-' . $slug);
    else
        render('header');
}

/**
 * Renderiza el componente visual HTML responsable del logo del proyecto,
 * empresa o producto. Puede incluir un nav a nivel de DropDown
 * @param null $slug El slug alternativo
 */
function ins_logo($slug = null)
{
    if(!is_null($slug))
        render('logo' . '-' . $slug);
    else
        render('logo');
}

/**
 * Renderiza el componente visual HTML responsable de los navs de la pagina
 * PUEDEN contener mas de un nav
 * @param null $slug El slug alternativo
 */
function ins_nav($slug = null)
{
    if(!is_null($slug))
        render('nav' . '-' . $slug);
    else
        render('nav');
}



?>