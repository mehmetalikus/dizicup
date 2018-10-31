<?php 

function starring($serId, $conn)
{
    return Actor::Starring($serId, $conn);
}

?>