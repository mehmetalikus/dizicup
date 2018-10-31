<?php

class Helper {

    public static function Load()
    {
        $helperDirectory = realpath('.') . '/app/helpers/';
        if($folder = opendir($helperDirectory)){
            while($file = readdir($folder)){
                if(is_file($helperDirectory . $file)){
                    require_once $helperDirectory . $file;
                }
            }
        }
    }
}