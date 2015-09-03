<?php if(!isset($_SESSION["user_id"])){ Core::redir("./");}?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Buscar</h2>
    <p class="text-muted">Termino: <?php echo $_GET["q"]; ?></p>
    <?php 
    $users = UserData::getLike($_GET["q"]);
    // print_r($users);
    ?>
    <?php if(count($users)>0):?>
      <table class="table table-bordered">
        <thead>
        <th>&nbsp;<i class="fa fa-picture-o"></i></th>
          <th>Usuario</th>
        </thead>
        <?php foreach($users as $u):?>
          <tr>
          <td style="width:60px;">
          <?php if($u->image!=""):?>
            <img src="storage/users/<?php echo $u->id;?>/profile/<?php echo $u->image; ?>" class="img-responsive">
          <?php endif; ?>
          </td>
            <td>
            <p><b><a href="./?view=user&id=<?php echo $u->id;?>"><?php echo $u->getFullname(); ?></a></b><br><?php echo $u->title;?></p>

            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay Resultados</h2>
      </div>
    <?php endif; ?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
