<?php
$user = $params["user"];
?>
<div class="list-group">
  <a href="./?view=userinfo&uid=<?php echo $user->id; ?>" class="list-group-item">Informacion</a>
  <a href="./?view=friends&uid=<?php echo $user->id; ?>" class="list-group-item">Amigos</a>
  <a href="./?view=photos&uid=<?php echo $user->id; ?>" class="list-group-item">Fotos</a>
</div>