<?php

include('../config.inc');
include('../usefull_queries.php');
session_start();
$query_no=  mysql_escape_String($_POST['query']);

if($query_no==1){
    
    $type=$_POST['type'];
    $name=$_POST['name'];
   // $pro_price=get_product_price($pro_id);
    $PRICE=$_POST['price'];
    $cost=$_POST['cost'];
   // $user=$_SESSION['user_id'];
    
    $sql="INSERT INTO `product`(`type_id`, `name`, `price`, `cost`) VALUES ($type,'$name',$PRICE,$cost)";
   $done= mysql_query($sql);
   if($done){
       //$_SESSION['table_no']=$tab_id;
       //$_SESSION['order']=$id;
   }else{
       echo $sql;
   }
   
}else if($query_no==2){
    $name=$_POST['name'];
    $sql="INSERT INTO `product_type`(`name`) VALUES ('$name')";
    $done= mysql_query($sql);
   if($done){
       //$_SESSION['table_no']=$tab_id;
       //$_SESSION['order']=$id;
   }else{
       echo $sql;
   }
   
}
?>
