<?php
/**
* @author evilnapsis
* @brief Algoritmo para cambiar la contrase~a
**/
if(isset($_SESSION["user_id"]) && !empty($_POST)){
	$user = UserData::getById($_SESSION["user_id"]);

	if($user->password==sha1(md5($_POST["password"])) ){
		if($_POST["new_password"]==$_POST["confirm_password"]){

			$user->password = sha1(md5($_POST["new_password"]));
			$user->update_passwd();
			$_SESSION["password_updated"]=true;
			Core::alert("La contrase~a ha sido actualizada exitosamente!");
			Core::redir("./?view=configuration");			

		}else{
			Core::alert("Las contrase~as no coinciden.");
			Core::redir("./?view=configuration");			
		}

	}else{
		Core::alert("La contrase~a introducida es incorrecta.");
		Core::redir("./?view=configuration");
	}
}



?>