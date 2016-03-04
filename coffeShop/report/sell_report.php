<?php
include('../config.inc');
include('../usefull_queries.php');
$who=$_POST['who'];
if($who==1){
   $s_date=$_POST['date1'];
$e_date=$_POST['date2'];

$sql=  mysql_query("select DISTINCT date from main_order where (date BETWEEN '$s_date' AND '$e_date')");
$tablehead="<tr><th>Date</th><th>Total Order</th><th>Ammount Sell</th><th>Details</th></tr>";
$tabledata="";
$total_of_sum=0;
$num=1;
while($row =  mysql_fetch_array($sql)){
    $num+=1;
    $date=$row['date'];
    $count=  mysql_query("select count(date) from main_order where date='$date'");
    $ring=  mysql_fetch_array($count);
    $count = $ring[0];
    $sum=  mysql_query("select sum(total) from main_order where  date='$date'");
    $ring=  mysql_fetch_array($sum);
    $sum=$ring[0];
	$vat= ($sum * 15) /100;
	$sumVat = $sum+ $vat;
    $formated_date=date("d/m/Y", strtotime($date));
    $total_of_sum+=$sum;
     $tabledata.="<tr  ><td>$formated_date</td><td>$count</td><td>$sum + $vat = $sumVat</td><td><a href='#' class='small_detail button small green' id='$date'>+</a></td></tr>";
}
$tabledata.="<tr><th></th><th>Total Sale</th><th>$total_of_sum</th><th>$num Days</th></tr>";
$finaldata = "<table width='100%' id='rounded-corner'>". $tablehead . $tabledata . "</table>";
echo $finaldata; 
}elseif ($who==2) {
    $date=$_POST['date'];
    $sql=  mysql_query("select * from main_order where date='$date'");
$tablehead="<tr><th>Ammount Sell</th><th>Discount Rate</th><th>Details</th></tr></tr>";
$tabledata="";
while($row =  mysql_fetch_array($sql)){
    $order_id=$row['order_id'];
    $discount=$row['discount_rate'];
    $total=$row['total'];
	$vat= ($total * 15) /100;
	$sub = $total;
	$total = $total+ $vat;
     $tabledata.="<tr id='tr1_$date' class='detail'><td>$sub + $vat = $total</td><td>$discount</td><td><a href='#' class='big_detail button small gray' id='$order_id'>+</a></td></tr></tr>";
}
$finaldata = "<table width='100%' id='rounded-corner' >". $tablehead . $tabledata . "</table></tr>";
echo $finaldata; 


}elseif ($who==3) {
    $order=$_POST['order'];
    $sql=  mysql_query("select * from sub_order where order_id='$order'");
$tablehead="<tr><th>Product</th><th>Quantity</th><th>Price</th><th>VAT</th></tr></tr>";
$tabledata="";
$total_price=0;
while($row =  mysql_fetch_array($sql)){
    $pro_id=$row['product_id'];
    $name=  get_product_name($pro_id);
    $qnt=$row['qnt'];
    $price=$row['product_price'];
    $total_price+=$qnt*$price;
	$perVat= ($price * 15) /100;
     $tabledata.="<tr id='' class='detail'><td>$name</td><td>$qnt</td><td>$price</td><td>$perVat</td></tr></tr>";
}

	$vat= ($total_price * 15) /100;
	$subTotal = $total_price;
	$total_price = $total_price+ $vat;

$tabledata.="<tr><th>Sub Total : $subTotal</th><th>Total Vat : $vat</th><th></th><th>Total: $total_price </th></tr></tr>";
$finaldata = "<table width='100%' id='rounded-corner' >". $tablehead . $tabledata . "</table></tr>";
echo $finaldata; 


}elseif ($who==4) {
    $user=$_POST['user'];
    $sql=  mysql_query("select * from main_order where user_id='$user'");
$tablehead="<tr><th>Date</th><th>Ammount Sell</th><th>Discount Rate</th><th>Details</th></tr></tr>";
$tabledata="";
while($row =  mysql_fetch_array($sql)){
    $order_id=$row['order_id'];
    $discount=$row['discount_rate'];
    $subTotal=$row['total'];
    $date=$row['date'];
	$vat= ($subTotal * 15) /100;
	$total = $subTotal+ $vat;
    $formated_date=date("d/m/Y", strtotime($date));
     $tabledata.="<tr class='detail'><td>$formated_date</td><td>$subTotal + $vat = $total</td><td>$discount</td><td><a href='#' class='big_detail button small gray' id='$order_id'>+</a></td></tr></tr>";
}
$finaldata = "<table width='100%' id='rounded-corner' >". $tablehead . $tabledata . "</table></tr>";
echo $finaldata; 


}elseif($who==5){
    $start_date=$_POST['date1'];
    $end_date=$_POST['date2'];
    $sql= "SELECT max( id ) as large FROM product";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];

$total=array_fill(1, $max,0);
$sorted=array();
$result=  mysql_query("Select a.product_id,a.qnt from sub_order a,main_order b where a.order_id=b.order_id and (date BETWEEN '$start_date' AND '$end_date')");
//echo "Select a.product_id,a.qnt,b.date from sub_order a,main_order b where a.order_id=b.order_id and (date BETWEEN '$start_date' AND '$end_date')";
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
echo "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}elseif($who==6){
    $start_date=$_POST['date1'];
    $end_date=$_POST['date2'];
    
    $sql= "SELECT max( user_id ) as large FROM user";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];
    //$goal=array();
$data="";
$data.="<tr><th>User Name</th><th>Total Sale</th><th>Number of Sale</th><th>Detail</th></tr>";
for($i=1;$i<=$max;$i++){
    $count=  mysql_query("select count(date) from main_order where user_id=$i and (date BETWEEN '$start_date' AND '$end_date')");
    $ring=  mysql_fetch_array($count);
    $count = $ring[0];
    $sum=mysql_query("select sum(total) from main_order where user_id=$i and (date BETWEEN '$start_date' AND '$end_date')");
    $ring=  mysql_fetch_array($sum);
    $goal=$ring[0];
    $name=get_user_name($i);
    if($goal>0){
		$vat= ($goal * 15) /100;
		$total = $goal + $vat;
        $data.= "<tr><td>$name</td><td>$goal + $vat = $total</td><td>$count</td><td><button class='get_by_user' id='$i'>+</button></td></tr>";
    }
    
}
echo "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}elseif($who==7){
    $start_date=$_POST['date1'];
    $end_date=$_POST['date2'];
     $sql= "SELECT max( id ) as large FROM bell_boy";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $max = $row['large'];
    //$goal=array();
$data="";
$data.="<tr><th>Name</th><th>Total Sale</th><th>Number of Sale</th><th>Detail</th></tr>";
for($i=1;$i<=$max;$i++){
    $count=  mysql_query("select count(date) from main_order where boy_id=$i and (date BETWEEN '$start_date' AND '$end_date')");
    $ring=  mysql_fetch_array($count);
    $count = $ring[0];
    $sum=mysql_query("select sum(total) from main_order where boy_id=$i and (date BETWEEN '$start_date' AND '$end_date')");
    $ring=  mysql_fetch_array($sum);
    $goal=$ring[0];
    $name=get_boy_name($i);
    if($goal>0){
		$vat= ($goal * 15) /100;
		$total = $goal + $vat;
        $data.= "<tr><td>$name</td><td>$goal + $vat = $total</td><td>$count</td><td><button class='get_by_user' id='$i'>+</button></td></tr>";
    }
    
}
echo "<table width='100%' id='rounded-corner' >"  . $data . "</table>";
}


?>
