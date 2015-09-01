<?php
$user = UserData::getById($_GET["id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Enviar Mensaje</h2>
<form role="form" method="post" action="./?action=sendmsg">
  <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $user->getFullname(); ?>" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mensaje</label>
    <textarea class="form-control" name="content" required placeholder="Mensaje" rows="5"></textarea>
  </div>
  <input type="hidden" name="ref" value="new">
  <input type="hidden" name="receptor_id" value="<?php echo $user->id; ?>">
  <button type="submit" class="btn btn-default">Enviar</button>
</form>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>