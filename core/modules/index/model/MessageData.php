<?php
/**
* @author evilnapsis
* @class MessageData
* @brief Modelo de base de datos para la tabla de mensajes
**/
class MessageData {
	public static $tablename = "message";


	public function MessageData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getUser(){ return UserData::getById($this->user_id); }


	public function add(){
		$sql = "insert into message (content,user_id,conversation_id,created_at) ";
		$sql .= "value (\"$this->content\",\"$this->user_id\",\"$this->conversation_id\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto MessageData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public function accept(){
		$sql = "update ".self::$tablename." set is_accepted=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function read(){
		$sql = "update ".self::$tablename." set is_readed=1 where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MessageData());
	}

	public static function countUnReadsByUC($uid,$id){
		$sql = "select count(*) as c from ".self::$tablename." where is_readed=0 and user_id!=$uid and conversation_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MessageData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new MessageData());
	}

	public static function getAllByConversationId($id){
		$sql = "select * from ".self::$tablename." where conversation_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new MessageData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MessageData());
	}


}

?>