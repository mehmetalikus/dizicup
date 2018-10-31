<?php 

    if(isset($_POST) && isLogin())
    {
        $episode_id = intval($_POST["episodeId"]);
        if( is_numeric($episode_id) ) {       
            if(agentWatch($episode_id, $db))
                echo json_encode(["status" => true], JSON_UNESCAPED_UNICODE);
            else 
                echo json_encode(["status" => false], JSON_UNESCAPED_UNICODE);
        }
    }

?>