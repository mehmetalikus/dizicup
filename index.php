<?php
    require "app/init.php";

    $_URL = get("url");
    $_URL = array_filter(explode("/", $_URL));

    if(!isset($_URL[0])) {
        $_URL[0] = "index";
    }

    if(!file_exists(controller($_URL[0]))) {
        $_URL[0] = "index";
    }
 
    require controller($_URL[0]);
    
