<?php
$frs = FriendData::getUnAccepteds($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Solicitudes de Amistad</h2>
    <?php if(count($frs)>0):?>
      <table class="table table-bordered">
      <thead>
        <th>Persona</th>
        <th></th>
      </thead>
      <?php foreach($frs as $fr):?>
        <tr>
          <td><?php echo $fr->getSender()->getFullname();?></td>
          <td style="width:60px;">  <a href="./?action=acceptfriendreq&recid=<?php echo $fr->sender_id; ?>" class="btn btn-success btn-xs">Aceptar Solicitud</a></td>
        </tr>
      <?php 
      $fr->read();
      endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay solicitudes</h2>
      </div>
    <?php endif;?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>