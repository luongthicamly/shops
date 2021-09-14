<?php
   include('../config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   var_dump($user_check);
   
   $ses_sql = mysqli_query($db,"select user from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login_index.php");
      die();
   }
?>