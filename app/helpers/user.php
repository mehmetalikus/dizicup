<?php 

function getUserByURL($url, $conn)
{
    $x = new User();
    $x->userFromURL($url, $conn);
    
    return $x;
}

function getUserByID($userId, $conn)
{
    $x = new User();
    $x->userFromID($userId, $conn);

    return $x;
}

function watch_log($userId, $conn)
{
    return User::watchLog($userId, $conn);
}

function isLogin(){
    if(isset($_SESSION["loginState"]) && $_SESSION["loginState"])
        return true;
    else
        return false;
}

function agentWatch($episodeId, $conn)
{
    $query = $conn->prepare("
        INSERT INTO watch_log(userId, episodeId)
        VALUES(:u_id, :ep_id)
    ");
    $query->bindValue(":u_id", $_SESSION["userId"]);
    $query->bindValue(":ep_id", $episodeId);
    if($query->execute() && $query->rowCount() > 0)
        return true;
    return false;
}