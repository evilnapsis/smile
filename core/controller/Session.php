<?php


// 24 de Marzo del 2015
// Session.php
// @brief esto es algo mucho mas magico

class Session {

	public static $user= null;
	public static $profile= null;

	public static $flashmsg = array();

	public static function get($key){
		if(Session::exists($key)){
			return $_SESSION[$key];
		}
	}

	public static function exists($key){
		if(isset($_SESSION[$key])){
			return true;
		}
		return false;
	}

	/*
	* type: success, info, warning, danger
	*/
	public static function alert($name, $message, $type){
		if(isset($_SESSION[$name])){
			echo "<p class='alert alert-$type'>$message</p>";
			unset($_SESSION[$name]);
		}
	}

	public static function set($key,$value){
		$_SESSION[$key]=$value;

	}

	public static function delete($key){
		unset($_SESSION[$key]);
	}


	public function setFlashMsg($name,$message){
		Session::set("_flash_".$name,$message);
	}

	public function getFlashMsgs(){
		$arr = array();
		foreach($_SESSION as $k=>$v){
			$trig = "_flash_";
			//echo $session;
			if(strlen($k)>strlen($trig)){
				$fl = substr($k, 0,strlen($trig));
				if($fl==$trig){
					$arr[]=Session::get($k);
					Session::delete($k);
				}
			}
		}
		return $arr;
	}


	public function deleteFlashMsg($name){
		Session::delete("_flash_".$name);
	}


	public function getFlashMsg($name){
		if(Session::exists("_flash_".$name)){
		print_r($_SESSION[$name]);
			$v= Session::get("_flash_".$name);
			Session::deleteFlashMsg($name);
			return $v;
		}else{
			return false;
		}
	}

}



?>