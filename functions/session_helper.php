<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: login.php");
	}
	include __DIR__."/../autoload.php";