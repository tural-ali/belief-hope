<?php

/**
 * Created by PhpStorm.
 * User: Tural
 * Date: 12/30/13
 * Time: 2:39 PM
 */
class Debug
{

    public static function fb($what)
    {
        echo Yii::trace(CVarDumper::dumpAsString($what), 'vardump');
    }

} 