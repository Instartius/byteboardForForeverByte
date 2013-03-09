<?php
/**
 * Created by Zheref
 * User: Sergio Daniel Lozano
 * Date: 1/19/13
 * Time: 9:49 AM
 */
abstract class CodeBehind
{
    public abstract static function get_instance();

    public static function put($data)
    {
        $me = self::get_instance();
        if (isset($me->$data))
            echo $me->$data;
        else
            echo $me->$data();
    }
}
