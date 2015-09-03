<script type="text/javascript">
  function loadcomments(t,r){
    $.post("./?action=loadcomments","t="+t+"&r="+r, function(data){
      $("#comments-"+t+"-"+r).html(data);
    });
  }
</script>
<?php 

$from = $params["from"];
$user = $params["user"];

$posts = ImageData::getAllByUserId($user->id);
?>
<?php if(count($posts)>0):?>
	<div id="statuses">
<table class="table table-bordered">
<?php 
/* Obtener las imagenes asociadas a un post/status */
foreach($posts as $p):
//$ps = $p->getPIS();
?>
<tr>
<td>
      <div class="caption" style="padding-bottom:0;">
<?php 
$authordata = $p->getUser();
$pf = ProfileData::getByUserId($authordata->id);
if($pf->image!=""):?>
<img src="<?php echo "storage/users/".$authordata->id."/profile/".$pf->image;?>" class="img-circle" style="width:38px;float:left;">
<?php endif; ?>
      <h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?></h4>
<p style="margin:0px;margin-left:48px;font-size:10px;" class="text-muted"><?php echo date("d/M/Y h:i:s",strtotime($p->created_at));?></p>
<div class="clearfix"></div>
      <hr style="margin:5px;">
        <p><?php echo $p->title; ?></p>
<?php 
$fullpath = $p->getFullpath();
if(file_exists($fullpath)):?>
<img src="<?php echo $fullpath; ?>" class="img-responsive">

<br>
<?php endif; ?>
        <p>
        <?php 
        $l=null;
        if($from=="logged"){
        $l = HeartData::getByRUT($p->id,$user->id,2);
        }
        $c = HeartData::countByRT($p->id,2)->c;
        $b = "btn-default";
        if($l!=null){ $b="btn-primary";}
        ?>
        <?php if($l==null):?>
        <a href="javascript:void()" onclick="like(2,<?php echo $p->id; ?>)" id="ilk-<?php echo $p->id; ?>" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php else:?>
        <a href="javascript:void()" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
      <?php endif; ?>
</p>
<div id="comments-2-<?php echo $p->id?>"></div>
<script>
  loadcomments(2,<?php echo $p->id; ?>);
</script>
<?php if($from=="logged"):?>
<form role="form" id="status-<?php echo $p->id;?>">
  <div class="form-group" style="max-width:100%;">
    <input type="hidden" name="t" value="2">
    <input type="hidden" name="r" value="<?php echo $p->id; ?>">
    <textarea rows="1" id="ta-<?php echo $p->id; ?>" name="content" class="form-control" placeholder="Escribe un comentario"></textarea>
  </div>
</form>
<script>
  document.getElementById("ta-"+<?php echo $p->id?>).onkeypress = function(e){
    if(e.keyCode==13){
      e.preventDefault();
      $.post("./?action=addcomment",$("#status-<?php echo $p->id;?>").serialize(), function(data){
        document.getElementById("ta-<?php echo $p->id;?>").value ="";
        loadcomments(2,<?php echo $p->id; ?>);
      });
    }
  }
</script>
<?php endif; ?>
      </div>
      </td>
    </tr>
<?php endforeach;?>
</table>
</div>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay fotos</h2>
  </div>
<?php endif;?>
