<?php
$friends = FriendData::countFriends(Session::$user->id);
$images = ImageData::countByUserId(Session::$user->id);
?>
<div class="list-group">
  <a href="./?view=myfriends" class="list-group-item">Amigos <span class="label label-default pull-right"><?php echo $friends->c; ?></span></a>
  <a href="./?view=myphotos" class="list-group-item">Fotos <span class="label label-default pull-right"><?php echo $images->c; ?></span></a>
  <a href="./?view=conversations" class="list-group-item">Mensajes</a>
  <a href="./?view=teams" class="list-group-item">Grupos</a>
<!--  <a href="#" class="list-group-item">Grupos</a> -->
</div>
