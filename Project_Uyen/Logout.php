<?php
session_start();
unset($_SESSION['user_info']);
unset($_SESSION['logout']);
header("location:Login.php");
?>