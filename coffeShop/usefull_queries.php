<?php
include('../config.inc');

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
function get_product_type(){
    $result=  mysql_query("SELECT * from product_type");

        $data="<select size='10'  class='product_type'>";


while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
    $data.="<option value='$tab_id'>$tab_name</option>";
}

$data.="</select>";
return $data;
}
function get_max_pro(){
    $sql= "SELECT max( id ) as large FROM product";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];

$total=array_fill(1, $max,0);
$sorted=array();
$result=  mysql_query("select * from sub_order");
while($row=  mysql_fetch_array($result)){
    $product_id=$row['product_id'];
    $qnt=$row['qnt'];
    $total[$product_id]=$total[$product_id]+$qnt;
}
$later_on=$total;
$j=1;
while(true){
        $the_index=array_search(max($total), $total);
        $the_val=  max($total);
    if($the_val==0){
        break;
    }else{
    $sorted[$j]=$the_index;
    $j++;
    $total[$the_index]=0;
    }
    
}
$data="";
$data.="<tr><th>Product Name</th><th>Total Sale</th><th>Product Price</th><th>Product Cost</th><th>Profit</th></tr>";
$total_profit=0;
$total_cost=0;
$total_sale=0;
for($i=1;$i<sizeof($sorted);$i++){
    $deta=get_product_name($sorted[$i]);
    $num=$later_on[$sorted[$i]];
    $price=  get_product_price($sorted[$i]);
    $cost=  get_product_cost($sorted[$i]);
    $profit=($num*$price)-($num*$cost);
        $total_cost+=$num*$cost;
	$total_profit+=$profit;
        $total_sale+=$num*$price;
        
    $data.= "<tr><td>$deta</td><td>$num</td><td>$price</td><td>$cost</td><td>$profit</td></tr>";
}
$data.= "<tr><th></th><th></th><th></th><th>Sale</th><th>$total_sale</th></tr>";
$data.= "<tr><th></th><th></th><th></th><th>Cost</th><th>$total_cost</th></tr>";
$data.= "<tr><th></th><th></th><th></th><th>Profit</th><th>$total_profit</th></tr>";
return "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}
function get_max_user(){
    $sql= "SELECT max( user_id ) as large FROM user";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];
    //$goal=array();
$data="";
$data.="<tr><th>User Name</th><th>Total Sale</th><th>Number of Sale</th><th>Detail</th></tr>";
for($i=1;$i<=$max;$i++){
    $count=  mysql_query("select count(date) from main_order where user_id=$i");
    $ring=  mysql_fetch_array($count);
    $count = $ring[0];
    $sum=mysql_query("select sum(total) from main_order where user_id=$i");
    $ring=  mysql_fetch_array($sum);
    $goal=$ring[0];
    $name=get_user_name($i);
    if($goal>0){
        $data.= "<tr><td>$name</td><td>$goal</td><td>$count</td><td><button class='get_by_user' id='$i'>+</button></td></tr>";
    }
    
}
return "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}
function get_max_boy(){
    $sql= "SELECT max( id ) as large FROM bell_boy";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];
    //$goal=array();
$data="";
$data.="<tr><th>Name</th><th>Total Sale</th><th>Number of Sale</th><th>Detail</th></tr>";
for($i=1;$i<=$max;$i++){
    $count=  mysql_query("select count(date) from main_order where boy_id=$i");
    $ring=  mysql_fetch_array($count);
    $count = $ring[0];
    $sum=mysql_query("select sum(total) from main_order where boy_id=$i");
    $ring=  mysql_fetch_array($sum);
    $goal=$ring[0];
    $name=get_boy_name($i);
    if($goal>0){
        $data.= "<tr><td>$name</td><td>$goal</td><td>$count</td><td><button class='get_by_user' id='$i'>+</button></td></tr>";
    }
    
}
return "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}
function get_final_due($order){
    $result=  mysql_query("SELECT `total`, `date`, `time` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['total'];
}
function get_boy_id($order){
    $result=  mysql_query("SELECT  `boy_id` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['boy_id'];
}
function get_boy_name($pro_id){
     $result=  mysql_query("select `name` from `bell_boy` where `id`=$pro_id");
     $row=  mysql_fetch_array($result);
     return $row['name'];
}
function get_time($order) {
    $result=  mysql_query("SELECT  `time` FROM `main_order` WHERE `order_id`=$order");
    $row=  mysql_fetch_array($result);
    return $row['time'];
}
?>
