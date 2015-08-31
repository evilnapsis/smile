<?php

if(isset($_SESSION["user_id"])){
	$fs = FriendData::getFriendship($_SESSION["user_id"], $_GET["recid"]);
	$fs->accept();
	Core::redir("./?view=user&id=".$_GET["recid"]);
}


?>