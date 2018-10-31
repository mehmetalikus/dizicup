<?php 

$config = [];

$config["db"] = [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbName" => "dizicup",
    "charset" => "utf-8"
];

define('DIRECTORY', realpath('.'));
define('CONTROLLER', DIRECTORY . '/app/controller/');
define('VIEW', DIRECTORY . '/app/view/');
define('BASE_URL', "http://" . $_SERVER["SERVER_NAME"] . "/webProjects/phpMVC/");

define('SITE_NAME', "dizicup");