<?php
function isLoggedIn() {
    if (!isset($_SESSION['adminIsLoggedIn']) || $_SESSION['adminIsLoggedIn'] !== true) {
        return false;
    }
    return true;
}

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}
