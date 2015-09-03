<?php

if(!empty($_POST)){
	$profile = ProfileData::getByUserId($_SESSION["user_id"]);
	$profile->day_of_birth =$_POST["day_of_birth"];
	$profile->gender =$_POST["gender"];
	$profile->country_id =$_POST["country_id"];
	$profile->sentimental_id =$_POST["sentimental_id"];




$profile->update_basic();
Core::redir("./?view=editbasicinfo");
}


?>