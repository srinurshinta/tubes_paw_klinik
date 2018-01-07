<?php
if(!isset($_SESSION['username'])){
  die("Anda belum Login");
}

if($_SESSION['level']!="admin")
{
  die("Anda bukan Admin");
}
?>