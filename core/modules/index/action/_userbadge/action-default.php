<?php
$from = $params["from"];
$user = $params["user"];
$profile = $params["profile"];

$url = "storage/users/".$user->id."/profile/".$profile->image;
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
<h5><?php echo $user->getFullname(); ?></h5>
<?php if($from=="logout"):?>
<!-- NO se muestra ningun boton -->
<?php else:?>
<?php if($user->id==Session::$user->id):?>
<a href="./?view=editinformation" class="btn btn-default btn-xs">Editar Informacion</a>
<?php else:?>
<a href="./?action=sendfriendreq" class="btn btn-default btn-xs">Solicitud de Amistad</a>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
</div>