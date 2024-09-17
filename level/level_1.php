<?php
//level 1
if ($_SESSION["level"] < 2) {
	header("Location:login.php");
}
?>