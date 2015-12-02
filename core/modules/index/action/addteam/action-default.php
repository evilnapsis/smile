<?php

if(!empty($_POST) && isset($_SESSION["user_id"])){
$t = new TeamData();
$t->title = $_POST["title"];
$t->user_id = $_SESSION["user_id"];
$ti = $t->add();

Core::redir("./?view=team&id=".$ti[1]);
}
Core::redir("./");

?>