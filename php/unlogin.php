<?php
session_start();

unset($_SESSION["user_name"]);
unset($_SESSION['password']);

session_unset();

session_destroy();

header("Location: ../index.php?ocultar=true#home");
?>