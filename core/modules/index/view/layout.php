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

<ul class="nav navbar-nav navbar-right">
<?php if(Session::exists("user_id")):?>
  <li><a href="./?view=friendreqs"><i class="fa fa-male"></i> <?php $fq = FriendData::countUnReads(Session::$user->id); if($fq->c>0){ echo "<span class='label label-danger'>$fq->c</span>";} else{ echo "<span class='label label-default'>0</span>";} ?></a></li>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Session::$user->name;?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./?view=home">Perfil</a></li>
          <li><a href="./?view=user&id=<?php echo Session::$user->id; ?>">Perfil Publico</a></li>
          <li><a href="./?view=editinformation">Editar Informacion</a></li>
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
<div class="container">
<div class="row">
<div class="col-md-3">
<h4>ENLACES</h4>
<ul>
  <li><a href="./?view=changelog">Log de Cambios</a></li>
  <li><a href="http://evilnapsis.com">Evilnapsis HomePage</a></li>
</ul>
</div>
</div>
</div>
<script src="res/jquery.min.js"></script>
<script src="res/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>