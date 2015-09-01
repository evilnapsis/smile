<?php
$conversation = ConversationData::getById($_GET["id"]);
$frs = MessageData::getAllByConversationId($_GET["id"]);
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile,"from"=>"logged" ));?>
<?php Action::execute("_mainmenu",array());?>
    </div>
    <div class="col-md-7">
    <h2>Conversacion</h2>
    <?php if(count($frs)>0):?>
      <table class="table table-bordered">
      <thead>
        <th>Mensajes</th>
      </thead>
      <tr>
        <td>
          <form role="form" method="post" action="./?action=sendmsg">
<div class="form-group">
    <textarea class="form-control" name="content" required placeholder="Mensaje" rows="3"></textarea>
  </div>
  <input type="hidden" name="ref" value="conversation">
  <input type="hidden" name="conversation_id" value="<?php echo $conversation->id; ?>">
  <button type="submit" class="btn btn-default">Enviar</button>
</form>
        </td>
      </tr>
      <?php foreach($frs as $fr):?>
        <tr>
          <td>
          <b><?php  
          echo $fr->getUser()->getFullname();          
          ?></b>
          <p><?php echo $fr->content; ?></p>
          <p style="font-size:10px;" class="text-muted"><?php echo $fr->created_at?></p>

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