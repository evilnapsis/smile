<?php

if(isset($_SESSION["user_id"])){
	$fs = FriendData::getFriendship($_SESSION["user_id"], $_GET["recid"]);
	if($fs==null){
		$fs = new FriendData();
		$fs->sender_id = $_SESSION["user_id"];
		$fs->receptor_id = $_GET["recid"];
		$fs->add();
	}
	Core::redir("./?view=user&id=".$_GET["recid"]);
}


?>