<?php

$error=''; 

include "inc/koneksi.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $password = md5($password);
    $level      = $_POST['level'];
                    
    $query = mysql_query( "SELECT * FROM tb_login WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysql_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "admin" && $level=="1")
        {
            
            header("Location: index_admin.php");
        }
        else if($row['level'] =="dokter" && $level=="2")
        {
            header("Location: index_dokter.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
}
