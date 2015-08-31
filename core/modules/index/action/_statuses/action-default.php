<?php 
$posts = PostData::getAllByUserId(Session::get("user_id"));
?>
<?php if(count($posts)>0):?>
	<div id="statuses">
<table class="table table-bordered">
<?php 
/* Obtener las imagenes asociadas a un post/status */
foreach($posts as $p):
//$pis = $p->getPIS();
?>
<tr>
<td>
      <div class="caption" style="padding-bottom:0;">

<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle btn-xs " data-toggle="dropdown">
    <i class="fa fa-chevron-down"></i>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Editar</a></li>
    <li class="divider"></li>
    <li><a href="#">Eliminar</a></li>
  </ul>
</div>
<?php 
$authordata = $p->getAuthor();
$pf = ProfileData::getByUserId($authordata->id);
if($pf->image!=""):?>
<img src="<?php echo "storage/users/".$authordata->id."/profile/".$pf->image;?>" class="img-circle" style="width:38px;float:left;">
<?php endif; ?>
      <h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?></h4>
<p style="margin:0px;margin-left:48px;font-size:10px;" class="text-muted"><?php echo date("d/M/Y h:i:s",strtotime($p->created_at));?></p>
<div class="clearfix"></div>
      <hr style="margin:5px;">
        <p><?php echo $p->content; ?></p>
<?php 
$pis = PostImageData::getAllByPostId($p->id);
if(count($pis)==1):?>
<?php foreach($pis as $pi):?>
<?php 
$fullpath = $pi->getImage()->getFullpath();
if(file_exists($fullpath)):?>
<a data-toggle="modal" href="#imgModal-<?php echo $pi->image_id;?>"><img src="<?php echo $fullpath; ?>" class="img-responsive"></a>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade"  id="imgModal-<?php echo $pi->image_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?php echo $p->content;?></h4>
        </div>
        <div class="modal-body">
<img src="<?php echo $fullpath; ?>" class="img-responsive">
<p>
        <?php 
        $l = HeartData::getByRUT($pi->image_id,$_SESSION["user_id"],2);
        $c = HeartData::countByRT($pi->image_id,2)->c;
        $b = "btn-default";
        if($l!=null){ $b="btn-primary";}
        ?>
        <?php if($l==null):?>
        <a href="javascript:void()" onclick="like(2,<?php echo $pi->image_id; ?>)" id="ilk-<?php echo $p->id; ?>" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php else:?>
        <a href="javascript:void()" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php endif; ?>
</p>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<br><?php endif; ?>
<?php endforeach;?>
<?php endif; ?>
        <p>
        <?php 
        $l = HeartData::getByRUT($p->id,$_SESSION["user_id"],1);
        $c = HeartData::countByRT($p->id,1)->c;
        $b = "btn-default";
        if($l!=null){ $b="btn-primary";}
        ?>
        <?php if($l==null):?>
        <a href="javascript:void()" onclick="like(1,<?php echo $p->id; ?>)" id="lk-<?php echo $p->id; ?>" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php else:?>
        <a href="javascript:void()" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php endif; ?>
</p>
<form role="form" id="status">
  <div class="form-group" style="max-width:100%;">

    <textarea rows="1" name="content" class="form-control" placeholder="Escribe un comentario"></textarea>
  </div>
</form>

      </div>
      </td>
    </tr>
<?php endforeach;?>
</table>
</div>
<?php endif;?>
