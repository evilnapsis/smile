<?php

$levels =LevelData::getAll();

?>

        <div class="panel panel-default">
    <div class="panel-heading"> 
      Publicar Estado
        </div>
    <div class="panel-body">
<form role="form" id="status" enctype="multipart/form-data" method="post" action="./?action=publish">
  <div class="form-group">
    <textarea rows="2" name="content" id="statusarea" class="form-control" placeholder="Publicar Estado"></textarea>
    <input type="hidden" name="receptor_type_id" value="1">
    <input type="hidden" name="receptor_ref_id" value="2">
  </div>
<div class="buttons">
  <div class="form-group">
  <div class="row">
<div class="col-md-4">
<input type="file" name="image" class="btn btn-defalt btn-block">
  </div>
  <div class="col-md-4">
  <select class="form-control" name="level_id">
    <?php foreach ($levels as $level): ?>
      <option value="<?php echo $level->id;?>"><?php echo $level->name;?></option>
    <?php endforeach;?>
  </select>
  </div>
<div class="col-md-4">
<!--  <button type="button" id="publish" class="btn btn-primary btn-block">Publicar</button>-->
  <button type="submit" id="publish" class="btn btn-primary btn-block">Publicar</button>
  </div>

  </div>
  </div>
  </div>
</form>
    </div>
    </div>