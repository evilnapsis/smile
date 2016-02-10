<?php
/**
* @author evilnapsis
* @class TeamData
* @brief Modelo de base de datos para la tabla de grupos
**/
class TeamData {
	public static $tablename = "team";


	public function TeamData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getUser(){ return UserData::getByid($this->user_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (title,user_id,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->user_id\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto TeamData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set image=\"$this->image\",title=\"$this->title\",description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TeamData());
	}

	public static function getUserId($id){
		$sql = "select user_id from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TeamData());
	}

	public static function countByUserId($id){
		$sql = "select count(*) as c from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TeamData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TeamData());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TeamData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TeamData());
	}


}

?>