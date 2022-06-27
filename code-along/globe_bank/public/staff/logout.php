<?php
require_once('../../private/initialize.php');

unset($_SESSION['username']);//ends the current session
// or you could use
// $_SESSION['username'] = NULL;

redirect_to(url_for('/staff/login.php'));//redirect user to login

?>
