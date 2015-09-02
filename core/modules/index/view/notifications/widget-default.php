<?php
$notifications = NotificationData::getAllByUserId($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Notificaciones</h2>
    <?php if(count($notifications)>0):?>
      <table class="table table-bordered">
      <thead>
        <th>Notificacion</th>
      </thead>
      <?php foreach($notifications as $noti):?>
        <tr class="<?php if(!$noti->is_readed){ echo "warning";}?>">
          <td>
<?php if($noti->not_type_id==1){ echo "<i class='fa fa-thumbs-up'></i> Nuevo Like"; }
                    else if($noti->not_type_id==2){ echo "<i class='fa fa-comment'></i> Nuevo Comentario"; }
                    ?>
                    en 
                    <?php if($noti->type_id==1){ echo "Publicacion"; }
                    else if($noti->type_id==2){ echo "Imagen"; }
                    ?>
                    por 
          <b><?php echo $noti->getSender()->getFullname();?></b>
          </td>
        </tr>
      <?php 
      $noti->read();
      endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay notificaciones</h2>
      </div>
    <?php endif;?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>