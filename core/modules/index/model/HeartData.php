<?php
/**
* @author evilnapsis
* @class HeartData
* @brief Modelo de base de datos para la tabla de likes
**/
class HeartData {
	public static $tablename = "heart";


	public function HeartData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getImage(){ return ImageData::getById($this->image_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (type_id,ref_id,user_id,created_at) ";
		$sql .= "value (\"$this->type_id\",\"$this->ref_id\",\"$this->user_id\",NOW())";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto HeartData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HeartData());
	}

	public static function getByRUT($ref_id,$user_id,$type_id){
		$sql = "select * from ".self::$tablename." where ref_id=$ref_id and user_id=$user_id and type_id=$type_id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HeartData());
	}

	public static function countByRT($r,$t){
		$sql = "select count(*) as c from ".self::$tablename." where ref_id=$r and type_id=$t";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HeartData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new HeartData());
	}
	
	public static function getAllByPostId($id){
		$sql = "select * from ".self::$tablename." where post_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new HeartData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HeartData());
	}


}

?>