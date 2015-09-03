<?php
/**
* @author evilnapsis
* @class ProfileData
* @brief Modelo de base de datos para la tabla de perfiles de usuarios
**/
class ProfileData {
	public static $tablename = "profile";


	public function ProfileData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	function getFullname(){ return $this->name." ".$this->lastname; }

	public function add(){
		$sql = "insert into profile (user_id) ";
		$sql .= "value (\"$this->user_id\")";
		return Executor::doit($sql);
	}

	public static function delete($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProfileData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nick=\"$this->nick\",name=\"$this->name\",mail=\"$this->mail\",image=\"$this->image\",password=\"$this->password\",status_id=".$this->status->id.",usertype_id=".$this->usertype->id.",is_admin=$this->is_admin,is_verified=$this->is_verified,created_at=$this->created_at where id=$this->id";
		Executor::doit($sql);
	}

	public function update_info(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",image=\"$this->image\",bio=\"$this->bio\",likes=\"$this->likes\",dislikes=\"$this->dislikes\" where user_id=$this->user_id";
		Executor::doit($sql);
	}

	public function update_basic(){
		$sql = "update ".self::$tablename." set day_of_birth=\"$this->day_of_birth\",gender=\"$this->gender\",country_id=\"$this->country_id\",sentimental_id=\"$this->sentimental_id\" where user_id=$this->user_id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";	
		Executor::doit($sql);
	}


	public function activate(){
		$sql = "update ".self::$tablename." set is_active=1 where id=$this->id";	
	Executor::doit($sql);
	}

	public static function getByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());
	}


	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());
	}


}

?>