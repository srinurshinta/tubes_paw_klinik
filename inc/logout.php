<?php
@session_start();

session_destroy();

header("location: /tubespaw/indexuser.php")
?>