<?php if(!isset($_SESSION["user_id"])){ Core::redir("./");}?>
<?php
$frs = ConversationData::getConversations($_SESSION["user_id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Conversaciones</h2>
    <?php if(count($frs)>0):?>
      <table class="table table-bordered">
      <thead>
        <th>Amigo</th>
      </thead>
      <?php foreach($frs as $fr):?>
        <tr>
          <td>

          <?php
   $nmsg = MessageData::countUnReadsByUC($_SESSION["user_id"],$fr->id);
          $color = "label-default";
          if($nmsg->c>0){ $color="label-danger"; }
   echo "<span class='label $color pull-right'>".$nmsg->c."</span>";
          echo "<a href='./?view=conversation&id=$fr->id'>";

          if($fr->receptor_id==Session::$user->id){
          echo $fr->getSender()->getFullname();
        }else{
          echo $fr->getReceptor()->getFullname();          
        }

        echo "</a>";
          ?>

          </td>
        </tr>
      <?php 
      $fr->read();
      endforeach; ?>
      </table>
    <?php else:?>
      <div class="jumbotron">
      <h2>No hay Mensajes</h2>
      </div>
    <?php endif;?>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>