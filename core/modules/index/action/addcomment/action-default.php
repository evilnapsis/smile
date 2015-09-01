<?php
/**
* @author evilnapsis
* @brief Agregar likes apartir del id y tipo de referencia con el usuario logeado.
**/
print_r($_POST);
if(Session::exists("user_id") && !empty($_POST)){
	if($_POST["content"]!=""){
	$h = new CommentData();
	$h->ref_id = $_POST["r"];
	$h->user_id = $_SESSION["user_id"];
	$h->type_id = $_POST["t"];
	$h->content = $_POST["content"];
	$h->add();
	}
}

?>
