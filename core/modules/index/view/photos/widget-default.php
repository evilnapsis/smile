<?php
$user = UserData::getById($_GET["uid"]);
$profile= ProfileData::getByUserId($user->id);
?>

<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>$user,"profile"=>$profile,"from"=>"logged" ));?>
<?php Action::execute("_usermenu",array("user"=>$user));?>
    </div>
    <div class="col-md-7">
    <!-- -->
    <?php echo Action::execute("_photos",array("user"=>$user,"profile"=>$profile,"from"=>"logged"));?>
      <!-- -->
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
</script> 