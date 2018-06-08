<?php
include '../entrance.php';
unset($_SESSION['aid']);
session_destroy();
	header("Location: ../index.php");
?>