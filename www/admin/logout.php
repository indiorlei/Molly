<?php
session_start();
// Não necessita, pois vamos destruir a sessão
// $_SESSION['adminIsLoggedIn'] = false;
session_destroy();
header('Location: login.php');
exit();