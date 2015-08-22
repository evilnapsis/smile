<?php
/**
* @author evilnapsis
* @brief Agregar likes apartir del id y tipo de referencia con el usuario logeado.
**/

if(Session::exists("user_id") && !empty($_POST)){
	$h = HeartData::getByRUT($_POST["r"],$_SESSION["user_id"],$_POST["t"]);
	if($h==null){
	$h = new HeartData();
	$h->ref_id = $_POST["r"];
	$h->user_id = $_SESSION["user_id"];
	$h->type_id = $_POST["t"];
	$h->add();
	echo HeartData::countByRT($_POST["r"],$_POST["t"])->c;
	}
}

?>
