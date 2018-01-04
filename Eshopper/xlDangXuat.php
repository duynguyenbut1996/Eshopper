<?php
	session_start();
	session_destroy();

	include "./inc_func.php";
	ChangeURL("./index.php");
?>