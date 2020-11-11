<?php
session_start();
if (session_status()) {
	if (isset($_SESSION["user"])) {
		session_destroy();
		header("Location: login.php");
	}
}