<?php

if(Session::exists("user_id")){
  Session::$user = UserData::getById(Session::get("user_id"));
  Session::$profile = ProfileData::getByUserId(Session::get("user_id"));
}

?>
<html>
<head>
<title>SMILE :) | Red Social de Proposito General</title>
<link rel="stylesheet" type="text/css" href="res/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="res/messages.css">
<script src="res/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">

</head>

<body>
<header class="navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./"><i class="fa fa-smile-o"></i> SMILE</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
<?php if(!Session::exists("user_id")):?>
          <li><a href="./">INICIO</a></li>
        <?php else:?>
          <li><a href="./?view=home">INICIO</a></li>
        <?php endif; ?>
      </ul>

<?php if(Session::exists("user_id")):?>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
      <input type="hidden" name="view" value="search">
        <input type="text" class="form-control" name="q" placeholder="Buscar personas ...">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
    </form>
<?php endif; ?>


<ul class="nav navbar-nav navbar-right">
<?php if(Session::exists("user_id")):
$conversations = ConversationData::getConversations($_SESSION["user_id"]);
$nmsgs = 0;
foreach ($conversations as $conversation) {
  $nmsg = MessageData::countUnReadsByUC($_SESSION["user_id"],$conversation->id);
//  print_r($nmsg);
  $nmsgs += $nmsg->c;
}
$nnots = NotificationData::countUnReads($_SESSION["user_id"]);
?>
<li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="label <?php if($nnots->c>0){ echo "label-danger"; }else{ echo "label-default"; }?>"><?php echo $nnots->c;?></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <?php if($nnots->c>0):
              $notifications=NotificationData::getLast5($_SESSION["user_id"]);
              ?>

                <li class="dropdown-header"><?php echo $nnots->c; ?> Notificaciones</li>
                <?php foreach($notifications as $noti):
                $s = $noti->getSender();
                $sp = ProfileData::getByUserId($s->id);
                $img_url ="";
                if($sp->image!=""){
                $img_url = "storage/users/".$s->id."/profile/".$sp->image;
                }
                ?>
                <li class="message-preview">
                  <a href="#" >
                    <span class="avatar"><img src="<?php echo $img_url; ?>" style='width:40px;'></span>
                    <span class="name"><?php echo $s->getFullname(); ?></span>
                    <span class="message">
                    <?php if($noti->not_type_id==1){ echo "<i class='fa fa-thumbs-up'></i> Nuevo Like"; }
                    else if($noti->not_type_id==2){ echo "<i class='fa fa-comment'></i> Nuevo Comentario"; }
                    ?>
                    en 
                    <?php if($noti->type_id==1){ echo "Publicacion"; }
                    else if($noti->type_id==2){ echo "Imagen"; }
                    ?>
                    </span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
              <?php endforeach; ?>
              <?php endif; ?>
                <li><a href="./?view=notifications">Ver notificaciones</a></li>
              </ul>
            </li>
        
<li><a href="./?view=friendreqs"><i class="fa fa-male"></i> <?php $fq = FriendData::countUnReads(Session::$user->id); if($fq->c>0){ echo "<span class='label label-danger'>$fq->c</span>";} else{ echo "<span class='label label-default'>0</span>";} ?></a></li>
<li><a href="./?view=conversations"><i class="fa fa-envelope-o"></i> <?php if($nmsgs>0){ echo "<span class='label label-danger'>$nmsgs</span>";} else{ echo "<span class='label label-default'>0</span>";} ?></a></li>

<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Session::$user->name;?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./?view=home">Perfil</a></li>
          <li><a href="./?view=user&id=<?php echo Session::$user->id; ?>">Perfil Publico</a></li>
          <li><a href="./?view=editinformation">Editar Informacion</a></li>
          <li><a href="./?view=configuration">Configuraci&oacute;n</a></li>
          <li class="divider"></li>
          <li><a href="./?action=processlogout">Salir</a></li>
        </ul>
      </li>
  <?php else:?>
<li>
      <form class="navbar-form navbar-left" role="search" method="post" action="./?action=processlogin">
      <div class="form-group">
      <input type="hidden" name="r" value="search/results">
<div class="row">
<div class="col-md-6">
        <input type="text"  name="email" class="form-control" placeholder="Email" required>
</div>
<div class="col-md-6">
        <input type="password"  name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
</div>
</div>
      </div>
      <button type="submit" class="btn btn-default">Entrar</button>
    </form>
</li>
<?php endif; ?>
</ul>


    </nav>
  </div>
</header>
<!-- - - - - - - - - - - - - - - -->
<?php 
	View::load("index");
?>
<!-- - - - - - - - - - - - - - - -->
<br><br>
<div class="container">
<div class="row">
<div class="col-md-12">
<hr/>
</div>
</div>
<div class="row">
<div class="col-md-3">
<h4>ENLACES</h4>
<ul>
  <li><a href="./?view=changelog">Log de Cambios</a></li>
  <li><a href="http://evilnapsis.com">Evilnapsis HomePage</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p>Evilnapsis &copy; 2015. Todos los Derechos Reservados</p>
</div>
</div>
</div>
<br>
<script src="res/jquery.min.js"></script>
<script src="res/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>