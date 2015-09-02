<?php
$user = UserData::getById($_GET["id"]);
if($user!=null):
//if($user==Session::$user){ Core::redir("./?view=home");}
$profile = ProfileData::getByUserId($_GET["id"]);

?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php 
$from = "logout";
if(isset($_SESSION["user_id"])){ $from="logged"; }
Action::execute("_userbadge",array("user"=>$user,"profile"=>$profile ,"from"=>$from));
Action::execute("_usermenu",array("user"=>$user,"from"=>$from));
?>


    </div>
    <div class="col-md-7">

    <?php echo Action::execute("_statuses",array("user"=>$user,"profile"=>$profile,"from"=>$from));?>



    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<script>
function like(type,id){
  var base = "lk";
  if(type==2){ base = "ilk"; }
  $.post("index.php?action=addheart","t="+type+"&r="+id,function(data){
  $("a#"+base+"-"+id).html("<i class='fa fa-thumbs-up'></i> "+data);
  });


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
<?php else:?>
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="jumbotron">
<h2>No se encontro el usuario</h2>
</div>
</div>
</div>
</div>
<?php endif; ?>
<br><br>
<br><br>
<br><br>
