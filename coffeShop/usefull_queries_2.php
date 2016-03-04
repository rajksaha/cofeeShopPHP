<?php
include('config.inc');

function get_product_price($pro_id){
     $result=  mysql_query("select price from product where id=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['price'];
}
function get_product_name($pro_id){
     $result=  mysql_query("select name from product where id=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['name'];
}
function get_table_name($pro_id){
     $result=  mysql_query("select name from tab where id=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['name'];
}
function get_product_cost($pro_id){
     $result=  mysql_query("select cost from product where id=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['cost'];
}
function get_user_name($user_id){
     $result=  mysql_query("select name from user where user_id=$user_id");
     $row=  mysql_fetch_array($result);
     return $row['name'];
}
function get_final_due($order){
    $result=  mysql_query("SELECT `total`, `date`, `time` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['total'];
}
function get_table_from_order($order){
   $result=  mysql_query("SELECT  `table_id` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['table_id'];
}
function get_boy_id($order){
    $result=  mysql_query("SELECT  `boy_id` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['boy_id'];
}
function get_boy_name($pro_id){
     $result=  mysql_query("select name from bell_boy where id=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['name'];
}
?>
