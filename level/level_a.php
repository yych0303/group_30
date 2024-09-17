<?php
//level a
if ($_SESSION["level"] != 9) {
	header("Location:login.php?url=admin.php");
}
?>