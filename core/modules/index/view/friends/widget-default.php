<?php
$user = UserData::getById($_GET["uid"]);
$profile= ProfileData::getByUserId($user->id);
$frs = FriendData::getFriends($_GET["uid"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>$user,"profile"=>$profile,"from"=>"logged" ));?>
<?php Action::execute("_usermenu",array("user"=>$user,"from"=>"logged"));?>
    </div>
    <div class="col-md-7">
    <h2>Amigos</h2>
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

          if($fr->receptor_id==$user->id){
          echo $fr->getSender()->getFullname();
        }else{
          echo $fr->getReceptor()->getFullname();          
        }
          ?></td>
          <td style="width:90px;">

          <a href="./?view=user&id=<?php if($fr->sender_id==$user->id){ echo $fr->receptor_id; }else { echo $fr->sender_id; } ?>" class="btn btn-default btn-xs">Ver Perfil</a>

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