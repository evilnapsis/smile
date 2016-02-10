<?php
$user = $params["user"];
$team_id = $params["team_id"];
$team = TeamData::getById($team_id);
$url = "storage/teams/".$team->id."/".$team->image;
$gotourl = "";
 $gotourl= "./?view=team&id=".$team->id;
?>
<div class="well">
<div class="row">
<div class="col-md-4">
<?php if($team->image!=""):?>
<img src="<?php echo $url; ?>" class="img-responsive img-thumbnail">
<?php else:?>
	[No hay Imagen]
<?php endif; ?>
</div>
<div class="col-md-8">
<h5><a href="<?php echo $gotourl; ?>"><?php echo $team->title; ?></a></h5>
<?php if($team->user_id==Session::$user->id):?>
<a href="./?view=editteam&id=<?php echo $team_id;?>" class="btn btn-default btn-xs">Editar Informacion</a>
<?php endif; ?>
</div>
</div>
</div>