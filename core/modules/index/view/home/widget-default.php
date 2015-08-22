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
<form role="form" id="status" enctype="multipart/form-data" method="post" action="./?r=users/publish">
  <div class="form-group">
    <textarea rows="1" name="content" id="statusarea" class="form-control" placeholder="Publicar Estado"></textarea>
    <input type="hidden" name="receptor_type_id" value="1">
    <input type="hidden" name="receptor_ref_id" value="2">
  </div>
<div class="buttons">
  <div class="form-group">
  <div class="row">
  <div class="col-md-4">
  </div>
<div class="col-md-4">
<input type="file" name="image" class="btn btn-defalt btn-block">
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
      <!-- -->
  <div id="statuses">
<div class="thumbnail" style="padding-bottom:0;">
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
<img src="storage/users/1/profile/10891730_1554215584795116_4898980287516756955_n_1.jpg" class="img-circle" style="width:38px;float:left;">
<h4 style="margin:0px;margin-left:48px;">Agustin Ramos</h4>

<p style="margin:0px;margin-left:48px;" class="text-muted">24/Feb/2015 10:04:39</p>
<div class="clearfix"></div>
      <hr style="margin:5px;">
        <p>Para ti wey</p>
<a data-toggle="modal" href="#imgModal-2"><img src="storage/users/1/images/evil01.png" class="img-responsive"></a>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade"  id="imgModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Para ti wey</h4>
        </div>
        <div class="modal-body">
<img src="storage/users/1/images/evil01.png" class="img-responsive">
        </div>
        <div class="modal-footer">
<!--          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->

        
        <a href="javascript:void()" onclick="like(3,6)" id="ilk-2" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up"></i> 2</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<br>        <p>
                <a href="javascript:void()" onclick="like(1,6)" id="lk-6" class="btn btn-sm btn-default"><i class="fa fa-thumbs-up"></i> </a>


<form role="form" id="status">
  <div class="form-group" style="max-width:100%;">

    <textarea rows="1" name="content" class="form-control" placeholder="Escribe un comentario"></textarea>
  </div>
</form>

      </div>
    </div><br>

</div>


    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
