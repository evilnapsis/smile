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
	/////////// send notifications
	$user_id = null;
	$author_id = null;
	if($_POST["t"]==1){
	$post = PostData::getReceptorId($_POST["r"]);
		$user_id = $post->receptor_ref_id;
		$author_id = $post->author_ref_id;
	}
	else if($_POST["t"]==2){
	$post = ImageData::getUserId($_POST["r"]);
		$user_id = $post->user_id;
		$author_id = $post->user_id;
	}

	if($author_id!=$_SESSION["user_id"] && $user_id!=$_SESSION["user_id"]){ // si es el mismo autor del post, entonces no le notificamos
		$notification = new NotificationData();
		$notification->not_type_id=1; // like
		$notification->type_id = $_POST["t"]; // al mismo que nos referenciamos en al crear el comentario
		$notification->ref_id = $_POST["r"]; // =
		$notification->receptor_id = $user_id; // en este caso nos referimos a quien va dirigida la notificacion
		$notification->sender_id = $_SESSION["user_id"]; // ahora al usuario implicado
		$notification->add();
	}

	///////////


	}
}

?>
