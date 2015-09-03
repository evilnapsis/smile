<?php
/**
* @author evilnapsis
* @class ConversationData
* @brief Modelo de base de datos para la tabla de conversaciones
**/
class ConversationData {
	public static $tablename = "conversation";


	public function ConversationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getSender(){ return UserData::getById($this->sender_id); }
	public function getReceptor(){ return UserData::getById($this->receptor_id); }


	public function add(){
		$sql = "insert into conversation (sender_id,receptor_id,created_at) ";
		$sql .= "value (\"$this->sender_id\",\"$this->receptor_id\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ConversationData previamente utilizamos el contexto
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
		return Model::one($query[0],new ConversationData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConversationData());
	}

	public static function getConversations($user_id){
		$sql = "select * from ".self::$tablename." where sender_id=$user_id or receptor_id=$user_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConversationData());
	}

	public static function getConversation($user_id,$friend_id){
		$sql = "select * from ".self::$tablename." where (sender_id=$user_id and receptor_id=$friend_id) or (receptor_id=$user_id and sender_id=$friend_id) ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FriendData());
	}


	public static function getUnAccepteds($user_id){
		$sql = "select * from ".self::$tablename." where receptor_id=$user_id and is_accepted=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConversationData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConversationData());
	}


}

?>