<?php
include('config.inc');
session_start();
$query_no=  mysql_escape_String($_POST['query']);
 if($query_no==200){
     $username=mysql_escape_String($_POST['username']);
     $password=mysql_escape_String($_POST['password']);
      $sql=mysql_query("SELECT * FROM user WHERE username='$username'");
      $rec=  mysql_fetch_array($sql);
      if(($rec['username']==$username)&&($rec['password']==$password)){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['user_id'] = $rec['user_id'];

        echo 1;
      }else{
          echo 0;
      }
 }
?>
