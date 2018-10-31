<?php


if(isset($_URL[1]) && !empty($_URL[1])){
    
    $quote = getQuote($db);
    $userURL = filterSTR($_URL[1]);
    $user = getUserByURL($userURL, $db); // data from db
    $userWatchLogs = watch_log($user->getUserId(), $db);

    require view("profil");
}