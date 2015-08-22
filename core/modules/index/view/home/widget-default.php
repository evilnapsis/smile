<?php

$levels =LevelData::getAll();

?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<div class="well">
<div class="row">
<div class="col-md-4">
<img src="res/images/yo.jpg" class="img-responsive img-thumbnail">
</div>
<div class="col-md-8">
<h5><?php echo Session::$user->getFullname(); ?></h5>
<a href="./?view=editprofile" class="btn btn-default btn-xs">Editar perfil</a>
</div>
</div>
</div>
<div class="list-group">
  <a href="./?view=myfriends" class="list-group-item">Amigos</a>
  <a href="./?view=myphotos" class="list-group-item">Fotos</a>
  <a href="#" class="list-group-item">Mensajes</a>
  <a href="#" class="list-group-item">Grupos</a>
</div>
    </div>
    <div class="col-md-7">
    <!-- -->
        <div class="panel panel-default">
    <div class="panel-heading"> 
      Publicar Estado
        </div>
    <div class="panel-body">
<form role="form" id="status" enctype="multipart/form-data" method="post" action="./?action=publish">
  <div class="form-group">
    <textarea rows="2" name="content" id="statusarea" class="form-control" placeholder="Publicar Estado"></textarea>
    <input type="hidden" name="receptor_type_id" value="1">
    <input type="hidden" name="receptor_ref_id" value="2">
  </div>
<div class="buttons">
  <div class="form-group">
  <div class="row">
<div class="col-md-4">
<input type="file" name="image" class="btn btn-defalt btn-block">
  </div>
  <div class="col-md-4">
  <select class="form-control" name="level_id">
    <?php foreach ($levels as $level): ?>
      <option value="<?php echo $level->id;?>"><?php echo $level->name;?></option>
    <?php endforeach;?>
  </select>
  </div>
<div class="col-md-4">
<!--  <button type="button" id="publish" class="btn btn-primary btn-block">Publicar</button>-->
  <button type="submit" id="publish" class="btn btn-primary btn-block">Publicar</button>
  </div>

  </div>
  </div>
  </div>
</form>
    </div>
    </div>
    <?php echo Action::execute("_statuses",null);?>
      <!-- -->



    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<script>
  $(".buttons").hide();
  $("#statusarea").focus(function(){
    $(".buttons").show("fast");
    $(this).prop("rows",3);
  });

  $("#statusarea").blur(function(){
    if($(this).val()==""){
      $(".buttons").hide("fast");
      $(this).prop("rows",1);
    }
  });
function like(type,id){
  var base = "lk";
  if(type==2){ base = "ilk"; }
  $.post("index.php?action=addheart","t="+type+"&r="+id,function(data){
  $("a#"+base+"-"+id).html("<i class='fa fa-thumbs-up'></i> "+data);
  });

  console.log($("a#"+base+"-"+id));


  if($("a#"+base+"-"+id).hasClass("btn-default")){
    $("a#"+base+"-"+id).removeClass("btn-default");
    $("a#"+base+"-"+id).addClass("btn-primary");
  }else if($("a#"+base+"-"+id).hasClass("btn-primary")){
    $("a#"+base+"-"+id).removeClass("btn-primary");
    $("a#"+base+"-"+id).addClass("btn-default");   
  }


}
/*  $("#publish").click(function(){
    var data = $("#status").serialize();
    var xhr = new XMLHttpRequest();
    xhr.open("GET","./?r=users/publish&"+data,false);
    xhr.send();
    $("#statuses").prepend(xhr.responseText);
    $("#statusarea").val("");
    $(".buttons").hide("fast");
    $("#statusarea").prop("rows",2);

  });
*/
</script>