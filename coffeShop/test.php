<?php
session_start();
    include('config.inc');
    include('usefull_queries_2.php');
    if (!isset($_SESSION['username'])) {
            header('Location: index.php');
    }
    
    $order=$_SESSION['order'];
    
    $query=  mysql_query("select * from sub_order where order_id=$order");
    
	 $total=0;
    while($row=  mysql_fetch_array($query)){
    	// $sub_id=$row['id'];
    	$product_id=$row['product_id'];
    	$product_name=  get_product_name($product_id);
    	$qnt_b=$row['qnt'];
    	$pro_price=$row['product_price'];
    	$price=$qnt_b*$pro_price;
    	$total=$total+$price;
    	$str="($pro_price)$qnt_b";
    	echo "$product_name - $str - $price";
    	echo "<br>";
    
    }
	
	$final=get_final_due($order);
	$final_dis=  $total-$final;
	$vat = ($final * 15) / 100 ;
	$finalWithVat = $final + $vat;
	
	echo "final - $final <br>";
	echo "Sub Total - $total <br>";
	echo "Discount - $final_dis <br>";
	echo "Vat - $vat <br>";
	echo "Final - $finalWithVat <br> $order";
	
	
?>