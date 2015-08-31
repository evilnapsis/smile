<?php
/**
* @author evilnapsis
* @class FriendData
* @brief Modelo de base de datos para la tabla de amigos
**/
class FriendData {
	public static $tablename = "friend";


	public function FriendData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}


	public function add(){
		$sql = "insert into friend (sender_id,receptor_id,created_at) ";
		$sql .= "value (\"$this->sender_id\",\"$this->receptor_id\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto FriendData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FriendData());
	}

	public static function getFriendship($user_id,$friend_id){
		$sql = "select * from ".self::$tablename." where (sender_id=$user_id and receptor_id=$friend_id) or (receptor_id=$user_id and sender_id=$friend_id) ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FriendData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FriendData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FriendData());
	}


}

?>