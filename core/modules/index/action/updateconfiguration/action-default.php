<?php

if(isset($_SESSION["user_id"]) && !empty($_POST)){
	$user = UserData::getById($_SESSION["user_id"]);
	$is_active = 0;
	if(isset($_POST["is_active"])){ $is_active=1;}
	$user->username = $_POST["username"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->email = $_POST["email"];
	$user->is_active = $is_active;
	$user->update();
	Core::redir("./?view=configuration");
}



?>