<?php
/**
* @author evilnapsis
* @class ImageData
* @brief Modelo de base de datos para la tabla de imagenes
**/
class ImageData {
	public static $tablename = "image";


	public function ImageData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getUser(){ return UserData::getByid($this->user_id); }
	public function getFullpath(){ return "storage/users/".$this->user_id."/images/".$this->src;}

	public function add(){
		$sql = "insert into ".self::$tablename." (src,level_id,user_id,created_at) ";
		$sql .= "value (\"$this->src\",\"$this->level_id\",\"$this->user_id\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ImageData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}

	public static function getUserId($id){
		$sql = "select user_id from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}

	public static function countByUserId($id){
		$sql = "select count(*) as c from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}


}

?>