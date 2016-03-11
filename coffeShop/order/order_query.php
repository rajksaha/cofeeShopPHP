<?php
include('../config.inc');
include('../usefull_queries.php');
session_start();
$query_no=  mysql_escape_String($_POST['query']);

if($query_no==1){
    $id=$_POST['id'];
    $tab_id=$_POST['table'];
    $pro_id=$_POST['pro_id'];
    $pro_price=get_product_price($pro_id);
    $qnt=$_POST['qnt'];
    //$discount=$_POST['discount'];
    $boy=$_POST['boy'];
    $num=0;
	echo $id;
    $val=  mysql_fetch_array(mysql_query("select * from main_order where order_id=$id"));
    echo" value: $val<br>";
    if($val!=""){
    $check=  mysql_fetch_array(mysql_query("select max(discount_rate) from sub_order where order_id=$id"));
    $num=$check['max(discount_rate)'];
    echo "max_id: $num <br>";
    if($_SESSION['from_edit']==1){
        $num=$num+1;
        $_SESSION['from_edit']=0;
    }
    
    echo "Final num: $num";
    }
    $sql="INSERT INTO `sub_order`(`order_id`, `product_id`, `qnt`, `discount_rate`, `product_price`) VALUES ($id,$pro_id,$qnt,$num,$pro_price)";
   $done= mysql_query($sql);
   if($done){
       $_SESSION['table_no']=$tab_id;
       $_SESSION['order']=$id;
       $_SESSION['boy_no']=$boy;
       
   }
   
}
else if($query_no==2){
    $order_id=$_SESSION['order'];
    $user=$_SESSION['user_id'];
    $table_id=$_SESSION['table_no'];
    $boy_id=$_SESSION['boy_no'];
    $discount=$_POST['value'];
    $final=$_POST['final'];

	echo $final;
	echo $vat;
   // $user=$_SESSION['user_id'];
    $time = date("Y-m-d H:i:s");
    $date = date("Y-m-d");
    $timestamp = strtotime($time);
    $timestamp += 6 * 3600;
    $time = date('Y-m-d H:i:s', $timestamp);
    $sql="INSERT INTO `main_order`(`order_id`, `user_id`, `table_id`, `boy_id`,`discount_rate`, `total`,`date`,`time`) VALUES ($order_id,$user,$table_id,$boy_id,$discount,$final,'$date','$time')";
   $done= mysql_query($sql);
   //echo $sql;
   if($done){
     //  $_SESSION['user_id']=1;
      // $_SESSION['order']=-1;
       mysql_query("UPDATE `tab` set `cur_order`=$order_id WHERE id=$table_id");
   }else{
       $sql="UPDATE `main_order` SET`discount_rate`=$discount,`total`=$final WHERE order_id=$order_id";
       $done= mysql_query($sql);
       if($done){
       
       mysql_query("UPDATE `tab` set `cur_order`=$order_id WHERE id=$table_id");
   }
   }
   
   
   
}else if($query_no==3){
    $id=$_POST['id'];
    mysql_query("DELETE FROM `sub_order` WHERE id=$id");
}
?>
