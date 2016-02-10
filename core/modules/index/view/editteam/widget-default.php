<?php
$team = TeamData::getById($_GET["id"]);

?>
<div class="container">
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-7">
    <a href="./?view=team&id=<?php echo $team->id; ?>" class="btn btn-default">Regresar</a>
<h1>Editar Grupo</h1>

<form role="form" enctype="multipart/form-data" method="post" action="./?action=updateteaminformation">
  <div class="form-group">
    <label for="exampleInputFile">Imagen (100x100)</label>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" name="title" value="<?php echo $team->title; ?>" class="form-control"  placeholder="A que te dedicas??">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea name="description"  class="form-control" placeholder="Hablanos de ti"><?php echo $team->description; ?></textarea>
  </div>
  <input type="hidden" name="team_id" value="<?php echo $team->id; ?>">
  <button type="submit" class="btn btn-success">Actualizar Grupo</button>
</form>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>