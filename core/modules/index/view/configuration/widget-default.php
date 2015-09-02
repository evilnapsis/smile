<?php

// $levels =LevelData::getAll();
$profile = ProfileData::getByUserId($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile ,"from"=>"logged"));?>

    </div>
    <div class="col-md-7">
<h1>Configuracion</h1>
<?php
Session::alert("password_updated","Contrase&ntilde;a actualizada exitosamente!","success");
?>
<form role="form" method="post" action="./?action=updateconfiguration">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de usuario</label>
    <input type="text" name="username" value="<?php echo Session::$user->username; ?>" class="form-control"  placeholder="Tu nombre de usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" value="<?php echo Session::$user->name; ?>" class="form-control"  placeholder="Tu nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellido</label>
    <input type="text" name="lastname" value="<?php echo Session::$user->lastname; ?>" class="form-control"  placeholder="Tus apellidos">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name="email" value="<?php echo Session::$user->email; ?>" class="form-control"  placeholder="Tu email">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if(Session::$user->is_active){ echo "checked"; }?>> Usuario activo
    </label>
  </div>
  <button type="submit" class="btn btn-success">Actualizar Configuacion</button>
</form>
<br>
<h1>Cambiar Contrase&ntilde;a</h1>
<form role="form" method="post" action="./?action=updatepassword" id="changepassword">
  <div class="form-group">
    <label for="exampleInputEmail1">Contrase&ntilde;a Actual</label>
    <input type="password" required name="password" value="" class="form-control"  placeholder="Contrase&ntilde;a Actual">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contrase&ntilde;a Nueva</label>
    <input type="password" required name="new_password" id="new_password" value="" class="form-control"  placeholder="Contrase&ntilde;a Nueva">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Configurar Contrase&ntilde;a</label>
    <input type="password" required name="confirm_password" id="confirm_password" value="" class="form-control"  placeholder="Configurar Contrase&ntilde;a">
  </div>
  <button type="submit" class="btn btn-success">Actualizar Contrase&ntilde;a</button>
</form>
<script>
$("#changepassword").submit(function(e){
  if($("#new_password").val()!=$("#confirm_password").val()){
    e.preventDefault();
    alert("Las contrase~as no coinciden");
  }
});
</script>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>