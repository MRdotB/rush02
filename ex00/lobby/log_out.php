<?php
session_start();
unset($_SESSION['login']);
header('Location: lobby.php')
?>
