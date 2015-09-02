<?php
$user = UserData::getById($_GET["uid"]);
if($user!=null):
//if($user==Session::$user){ Core::redir("./?view=home");}
$profile = ProfileData::getByUserId($_GET["uid"]);

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
    <h2>Informacion</h2>
    <table class="table table-bordered">
      <tr>
        <td><b>Nombre</b></td>
        <td><?php echo $user->getFullname(); ?></td>
      </tr>
      <?php if($profile->title!=""):?>
      <tr>
        <td><b>Ocupacion</b></td>
        <td><?php echo $profile->title; ?></td>
      </tr>
      <?php endif;?>
      <?php if($profile->bio!=""):?>
      <tr>
        <td><b>Sobre mi</b></td>
        <td><?php echo $profile->bio; ?></td>
      </tr>
      <?php endif;?>

        <tr>
          <td colspan="2"><b>Datos personales</b></td>
        </tr>
      <?php if($profile->country_id!=null):?>
      <tr>
        <td><b>Pais</b></td>
        <td><?php echo CountryData::getById($profile->country_id)->name; ?></td>
      </tr>
      <?php endif;?>

      <?php if($profile->gender!=""): $genders = array("h"=>"Hombre","m"=>"Mujer")?>
      <tr>
        <td><b>Sexo</b></td>
        <td><?php echo $genders[$profile->gender]; ?></td>
      </tr>
      <?php endif;?>
      <?php if($profile->day_of_birth!="0000-00-00"):?>
      <tr>
        <td><b>Fecha de nacimiento</b></td>
        <td><?php echo $profile->day_of_birth; ?></td>
      </tr>
      <?php endif;?>
      <?php if($profile->sentimental_id!=null):?>
      <tr>
        <td><b>Situacion sentimental</b></td>
        <td><?php echo SentimentalData::getById($profile->sentimental_id)->name; ?></td>
      </tr>
      <?php endif;?>
        <tr>
          <td colspan="2"><b>Intereses</b></td>
        </tr>
      <?php if($profile->likes!=null):?>
      <tr>
        <td><b>Me gusta</b></td>
        <td><?php echo $profile->likes; ?></td>
      </tr>
      <?php endif;?>
      <?php if($profile->dislikes!=null):?>
      <tr>
        <td><b>No Me gusta</b></td>
        <td><?php echo $profile->dislikes; ?></td>
      </tr>
      <?php endif;?>
    </table>


    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


</div>
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
