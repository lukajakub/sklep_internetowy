<?php
session_start();
unset($_SESSION['zalogowany']);
unset($_SESSION['rola']);
unset($_SESSION['uzytkownik']);
session_destroy();
header('location: logowanie.php');
?>