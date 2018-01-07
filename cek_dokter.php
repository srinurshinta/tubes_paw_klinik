<?php

if(!isset($_SESSION['username'])){
  die("Anda belum Login");
}

if($_SESSION['level']!="dokter")
{
  die("Anda bukan Dokter");
}
?>