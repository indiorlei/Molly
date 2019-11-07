<?php
function isLoggedIn() {
    if (!isset($_SESSION['clienteIsLoggedIn']) || $_SESSION['clienteIsLoggedIn'] !== true) {
        return false;
    }
    return true;
}

if (!isLoggedIn()) {
    header('Location: /app/login.php');
    exit();
}
