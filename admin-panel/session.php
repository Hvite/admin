<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['logged_user'];
   
   $ses_sql = mysqli_query($db, "select id, username from Users where username = '$user_check' ");
   
   $row = mysqli_fetch_assoc($ses_sql); //,MYSQLI_ASSOC
   
   $user = $row['username'];
   $userId = $row['id'];
   
   if(!isset($_SESSION['logged_user'])){
      header("location:login.php");
   }
?>