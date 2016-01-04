<?php
class PostData {
	public static $tablename = "post";


	public function PostData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getAuthor(){ return UserData::getById($this->author_ref_id); }
	public function getReceptor(){ return UserData::getById($this->receptor_ref_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (content,author_ref_id,receptor_type_id,receptor_ref_id,level_id,created_at) ";
		$sql .= "value (\"$this->content\",\"$this->author_ref_id\",$this->receptor_type_id,$this->receptor_ref_id,1,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PostData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",content=\"$this->content\",image=\"$this->image\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}

	public static function getReceptorId($id){
		$sql = "select receptor_ref_id,author_ref_id from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where (author_ref_id=$user_id or receptor_ref_id=$user_id) and receptor_type_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getAllByUserIdTeamId($user_id,$team_id){
		$sql = "select * from ".self::$tablename." where author_ref_id=$user_id and receptor_ref_id=$team_id and receptor_type_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}


}

?>