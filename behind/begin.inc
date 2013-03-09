<?php
/**
 * @author Instartius Corporation
 * @version 0.0.1
 * @package ByteBoard.Behind
 * CodeBehind del componente begin.php
 * @see begin.php
 */

class Begin
{
    /**
     * Imprime los atributos de la etiqueta HTML que debe
     * tener todo blog desarrollado con WordPress
     */
    static function HtmlAttributes()
    {
        language_attributes();
    }

    /**
     * Imprime todas las clases (incluyendo el atributo)
     * que debe tener el cuerpo de todo blog desarrollado
     * con WordPress
     */
    static function BodyClasses()
    {
        body_class();
    }
}
?>