<?php
include('../config.inc');
include('../usefull_queries.php');
session_start();
$query_no=  mysql_escape_String($_POST['query']);

if($query_no==1){
    $id=mysql_escape_String($_POST['id']);
$name=mysql_escape_String($_POST['name']);
$cost=mysql_escape_String($_POST['cost']);
$price=mysql_escape_String($_POST['price']);
$sql = "update product set name='$name',cost='$cost',price='$price' where id='$id'";
mysql_query($sql);

}else if($query_no==2){
    $id=mysql_escape_String($_POST['id']);
$sql = "delete from product where id='$id'";
mysql_query($sql);
}
?>
