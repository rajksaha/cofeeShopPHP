<?php
include('../config.inc');
session_start();

$query_no=  mysql_escape_String($_POST['query']);

if($query_no==1){
$order=$_POST['order'];
$table=$_POST['table'];
$boy=$_POST['boy'];
 $_SESSION['table_no']=$table;
 $_SESSION['order']=$order;
 $_SESSION['boy_no']=$boy;
 $_SESSION['from_edit']=1;
 //mysql_query("UPDATE `tab` set `cur_order`=0 WHERE id='$table'");
}


if($query_no==2){
    $order=$_POST['order'];
    $table=$_POST['table'];
    $boy=$_POST['boy'];
    $_SESSION['table_no']=$table;
    $_SESSION['order']=$order;
    $_SESSION['boy_no']=$boy;
    mysql_query("UPDATE `tab` set `cur_order`=0 WHERE id='$table'");
    }
    if($query_no==3){
    $order=$_POST['order'];
    $table=$_POST['table'];
    $boy=$_POST['boy'];
    $_SESSION['table_no']=$table;
    $_SESSION['order']=$order;
    $_SESSION['boy_no']=$boy;
    
    }
?>
