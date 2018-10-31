<?php 

if(post("type")) {
	if(file_exists(DIRECTORY . "/app/ajax/" . post("type") . ".php")){
		require DIRECTORY . "/app/ajax/" . post("type") . ".php";
	}
}
else
	echo json_encode(["error-message" => "POST YOK"], JSON_UNESCAPED_UNICODE);