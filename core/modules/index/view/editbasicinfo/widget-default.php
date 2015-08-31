<?php
$profile = Session::$profile;
$levels =LevelData::getAll();
$countries =CountryData::getAll();
$sentimentals =SentimentalData::getAll();
$genders = array("h"=>"Hombre","m"=>"Mujer");
?>
<div class="container">
<div class="row">
    <div class="col-md-3">
<?php Action::execute("_userbadge",array("user"=>Session::$user,"profile"=>Session::$profile ,"from"=>"logged"));?>
<?php Action::execute("_infomenu",array());?>

    </div>
    <div class="col-md-7">
<h1>Editar Informacion Basica</h1>

<form role="form" method="post" action="./?action=updatebasicinfo">
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha de nacimiento</label>
    <input type="date" value="<?php echo $profile->day_of_birth; ?>" name="day_of_birth" class="form-control" required placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Sexo</label>
    <select name="gender" class="form-control" required>
      <option value="">-- SELECCIONE -- </option>
    <?php foreach($genders as $k =>$v):?>
      <option value="<?php echo $k; ?>" <?php if($k==$profile->gender){ echo "selected"; }?>><?php echo $v; ?></option>
    <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Pais</label>
    <select name="country_id" class="form-control" required>
      <option value="">-- SELECCIONE -- </option>
    <?php foreach($countries as $c):?>
      <option value="<?php echo $c->id; ?>" <?php if($c->id==$profile->country_id){ echo "selected"; }?>><?php echo $c->name; ?></option>
    <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Situacion Sentimental</label>
    <select name="sentimental_id" class="form-control" required>
      <option value="">-- SELECCIONE -- </option>
    <?php foreach($sentimentals as $c):?>
      <option value="<?php echo $c->id; ?>" <?php if($c->id==$profile->sentimental_id){ echo "selected"; }?>><?php echo $c->name; ?></option>
    <?php endforeach;?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Actualizar Informacion</button>
</form>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
<br><br><br><br><br>