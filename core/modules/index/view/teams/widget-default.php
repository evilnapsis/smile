<?php if(!isset($_SESSION["user_id"])){ Core::redir("./");}?>
<?php
$frs = TeamData::getAllByUserId($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Grupos</h2>

<h4>Nuevo Grupo</h4>
<form role="form" method="post" action="./?action=addteam">
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo del grupo</label>
    <input type="text" value="" name="title" class="form-control" required placeholder="Titulo del Grupo">
  </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>


    <?php if(count($frs)>0):?>
      <h4>Grupos creados por mi</h4>
      <table class="table table-bordered">
      <thead>
        <th></th>
        <th>Grupo</th>
      </thead>
      <?php foreach($frs as $fr):?>
        <tr>
        <td style="width:105px;">
          <a href="./?view=team&id=<?php echo $fr->id;?>" class="btn btn-default btn-xs"> <i class="fa fa-chevron-right"></i></a>
          <a href="./?view=editteam&id=<?php echo $fr->id;?>" class="btn btn-default btn-xs"> <i class="fa fa-edit"></i></a>
          <a href="./?view=configteam&id=<?php echo $fr->id;?>" class="btn btn-default btn-xs"> <i class="fa fa-cogs"></i></a>
        </td>
          <td>
          <?php echo $fr->title;?>
          </td>
        </tr>
      <?php 
      endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay Grupos</h2>
      </div>
    <?php endif;?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>