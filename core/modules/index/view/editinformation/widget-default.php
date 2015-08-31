<?php

$levels =LevelData::getAll();

?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user));?>
<?php Action::execute("_infomenu",array());?>

    </div>
    <div class="col-md-7">
<h1>Editar Informacion</h1>

<form role="form" enctype="multipart/form-data" method="post" action="./?action=updateinformation">
  <div class="form-group">
    <label for="exampleInputFile">Imagen de Perfil (100x100)</label>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" name="title" class="form-control"  placeholder="A que te dedicas??">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Sobre ti</label>
    <textarea name="bio"  class="form-control" placeholder="Hablanos de ti"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Intereses</label>
    <textarea name="likes"  class="form-control" placeholder="Que te gusta?"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">No intereses</label>
    <textarea name="dislikes"  class="form-control" placeholder="Que no te gusta?"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Actualizar Informacion</button>
</form>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>