<?php 
	session_start();

	if (isset($_SESSION["LOGIN"])) {
		$nome = $_SESSION["NOME"];
		$login = $_SESSION["LOGIN"];
		$codigo  = $_SESSION["CODIGO"];
	}
	else {
		header("Location: index.php");
	}
?>