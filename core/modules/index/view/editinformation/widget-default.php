<?php

$levels =LevelData::getAll();

?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<div class="well">
<?php Action::execute("_userbadge",array("user"=>Session::$user));?>
<div class="list-group">
  <a href="./?view=editinformation" class="list-group-item">Informacion Personal</a>
</div>
    </div>
    <div class="col-md-7">
<h1>Editar Informacion</h1>

<form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>