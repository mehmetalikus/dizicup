<?php

function controller($controllerName){
    return CONTROLLER . "controller." . $controllerName . ".php";
}

function view($viewName){
    return VIEW . "view." .$viewName . ".php";
}