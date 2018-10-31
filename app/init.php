<?php

function __autoload($className){
    $classFiles = realpath('.') . "/app/classes/class." . strtolower($className) . ".php";
    if(file_exists($classFiles)){
        require_once $classFiles;
    }   
}

Helper::Load();
require_once "system/config.php";

try {

    $db = new PDO("mysql:host=".$config["db"]["host"].";dbname=".$config["db"]["dbName"].";charset=utf8", $config["db"]["username"], $config["db"]["password"]);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
}
catch(PDOException $e){
    echo $e->getMessage();
}



