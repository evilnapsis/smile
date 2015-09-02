<?php
/**
* @author evilnapsis
* @brief Proceso de registo, obtiene los valores post del formulario de registro y los guarda en la bd.
**/

		if(!empty($_POST)){
			if($_POST["name"]!=""&&$_POST["lastname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""){
				$user = UserData::getByEmail($_POST["email"]);
				if($user==null){
					$str = "abcdefghijklmopqrstuvwxyz1234567890";
					$code = "";
					for ($i=0; $i < 6; $i++) { 
						$code .= $str[rand(0,strlen($str)-1)];
					}
					
	
					$user = new UserData();
					$user->name = $_POST["name"];
					$user->lastname = $_POST["lastname"];
					$user->email = $_POST["email"];
					$user->password = sha1(md5($_POST["password"]));
					$user->code = $code;
					$u = $user->add();

					$p =  new ProfileData();
					$p->user_id = $u[1];
					$p->add();


					$msg = "<body><h1>Registro Exitoso</h1>
					<p>Ahora debes activar tu cuenta en el siguiente link:</p>
					<p><a href='http://youhost/app/index.php?r=index/processactivation&e=".sha1(md5($_POST["email"]))."&c=".sha1(md5($code))."'>Activa tu cuenta:</a></p>
					<p>O tambien puedes usar el siguiente codigo de activacion: ".$code."</p>
					</body>";
	
					mail($_POST["email"], "Registro Exitoso", $msg);
					/* $f = fopen (ROOT."/register.txt","w");
					fwrite($f, $msg);
					fclose($f);
					*/
					Core::alert("Registro Exitoso!, se ha enviado un correo electronico con los datos necesarios para activar su cuenta.");
					Core::redir("./");
				}else{
					Core::alert("El email proporcionado ya esta registrado.");
					Core::redir("./");

				}
			}else{
				Core::alert("No puede dejar campos vacios");				
				Core::redir("./");
			}
		}

//		Core::redir("./");
		//View::render($this,"index",array("meta"=>$meta));
	





?>