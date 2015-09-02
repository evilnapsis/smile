<?php
$from = $params["from"];
$user = $params["user"];
$profile = $params["profile"];

$url = "storage/users/".$user->id."/profile/".$profile->image;
$gotourl = "";
if($from=="logged" && $user->id==$_SESSION["user_id"]){ $gotourl = "./?view=home"; }
else{ $gotourl= "./?view=user&id=".$user->id; }
?>
<div class="well">
<div class="row">
<div class="col-md-4">
<?php if($profile->image!=""):?>
<img src="<?php echo $url; ?>" class="img-responsive img-thumbnail">
<?php else:?>
	[No hay Imagen]
<?php endif; ?>
</div>
<div class="col-md-8">
<h5><a href="<?php echo $gotourl; ?>"><?php echo $user->getFullname(); ?></a></h5>
<?php if($from=="logout"):?>
<!-- NO se muestra ningun boton -->
<?php else:?>
<?php if($user->id==Session::$user->id):?>
<a href="./?view=editinformation" class="btn btn-default btn-xs">Editar Informacion</a>
<?php else:
	$fs = FriendData::getFriendship($_SESSION["user_id"], $user->id);
?>
<?php if($fs==null):?>
<a href="./?action=sendfriendreq&recid=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Solicitud de Amistad</a>
<?php else:?>
	<?php if($fs->is_accepted):?>
	<button class="btn btn-primary btn-xs">Amigos</button>
	<?php else:?>
		<?php if($_SESSION["user_id"]!=$user->id):?>
	<button class="btn btn-success btn-xs">Solicitud Enviada</button>
	<?php else:
	$fs->read();
	?>
	<a href="./?action=acceptfriendreq&recid=<?php echo $user->id; ?>" class="btn btn-success btn-xs">Aceptar Solicitud</a>
	<?php endif;?>
	<?php endif;?>
<?php endif; ?>


<?php endif; ?>
<?php endif; ?>
</div>
</div>
</div>