<?php
/**
* @author evilnapsis
* @brief Proceso de cerrar session
**/

Session::delete("user_id");
session_destroy();
Core::redir("./");

?>