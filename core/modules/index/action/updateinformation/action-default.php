<?php

if(!empty($_POST)){
	$profile = ProfileData::getByUserId($_SESSION["user_id"]);
	$profile->title =$_POST["title"];
	$profile->bio =$_POST["bio"];
	$profile->likes =$_POST["likes"];
	$profile->dislikes =$_POST["dislikes"];


$image = new Upload($_FILES["image"]);
if($image->uploaded){
	$image->Process("storage/users/".$_SESSION["user_id"]."/profile/");
	if($image->processed){
		$profile->image = $image->file_dst_name;
	}else{
		echo "Error: ".$image->error;
	}
}

$profile->update_info();
Core::redir("./?view=editinformation");
}


?>