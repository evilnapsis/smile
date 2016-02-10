<?php

if(!empty($_POST)){
	$profile = TeamData::getById($_SESSION["user_id"]);
	$profile->title =$_POST["title"];
	$profile->description =$_POST["description"];


$image = new Upload($_FILES["image"]);
if($image->uploaded){
	$image->Process("storage/teams/".$_POST["team_id"]."/");
	if($image->processed){
		$profile->image = $image->file_dst_name;
	}else{
		echo "Error: ".$image->error;
	}
}

$profile->update();
Core::redir("./?view=editteam&id=$_POST[team_id]");
}


?>