<?php if(!isset($_SESSION["user_id"])){ Core::redir("./");}?>
<?php
$frs = FriendData::getFriends($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Mis Amigos</h2>
    <?php if(count($frs)>0):?>
      <table class="table table-bordered">
      <thead>
        <th>Amigo</th>
        <th></th>
      </thead>
      <?php foreach($frs as $fr):?>
        <tr>
          <td>
          <?php  

          if($fr->receptor_id==Session::$user->id){
          echo $fr->getSender()->getFullname();
        }else{
          echo $fr->getReceptor()->getFullname();          
        }
          ?></td>
          <td style="width:190px;">
          <a href="./?view=user&id=<?php if($fr->sender_id==Session::$user->id){ echo $fr->receptor_id; }else { echo $fr->sender_id; } ?>" class="btn btn-default btn-xs">Ver Perfil</a>
          <a href="./?view=sendmsg&id=<?php if($fr->sender_id==Session::$user->id){ echo $fr->receptor_id; }else { echo $fr->sender_id; } ?>" class="btn btn-default btn-xs">Enviar Mensaje</a>
          </td>
        </tr>
      <?php 
      $fr->read();
      endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay Amigos</h2>
      </div>
    <?php endif;?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>