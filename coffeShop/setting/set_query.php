<?php
session_start();
include('../config.inc');
    if (!isset($_SESSION['user_id'])) {
            header('Location: index.php');
    }
    $query=$_POST['query'];
    if($query==1){
        $op = $_POST['old_pwd'];
        $new_pwd = $_POST['pwd'];
    

       
        $username = $_SESSION['user_id'];
        $sql = mysql_query("SELECT * FROM user WHERE user_id='$username'");
        $rec = mysql_fetch_array($sql);
        //$doc_id = $rec['id'];
        $pwd = $rec['password'];
        
        if ($op === $pwd){
         mysql_query("UPDATE user SET password=$new_pwd where user_id='$username'");
            echo "success";
        }else{
            echo "Incorrect old password. Please enter correct one.";
        }
    }else if($query==2){
        $name = $_POST['name'];
        $id = $_POST['id'];
        mysql_query("UPDATE `tab` SET `name`='$name' WHERE id=$id");
    }else if($query==3){
        $name = $_POST['name'];
        $id = $_POST['id'];
        mysql_query("UPDATE `bell_boy` SET `name`='$name' WHERE id=$id");
    }else if($query==4){
    $id=mysql_escape_String($_POST['id']);
$sql = "delete from tab where id='$id'";
mysql_query($sql);
}else if($query==5){
    $id=mysql_escape_String($_POST['id']);
$sql = "delete from bell_boy where id='$id'";
mysql_query($sql);
}else if($query==6){
    $name=$_POST['name'];
    $sql="INSERT INTO `tab`(`name`) VALUES ('$name')";
    $done= mysql_query($sql);
   
   
}else if($query==7){
    $name=$_POST['name'];
    $sql="INSERT INTO `bell_boy`(`name`) VALUES ('$name')";
    $done= mysql_query($sql);
   
   
}if($query==8){
        $name = $_POST['name'];
        $username = $_POST['username'];
    

       
        $id = $_POST['id'];
        $sql = mysql_query("UPDATE `user` SET `name`='$name',`username`='$username' WHERE user_id=$id");
        $rec = mysql_fetch_array($sql);

    }
    
        
 ?>
