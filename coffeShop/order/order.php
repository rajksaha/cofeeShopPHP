<head>
    
    <style>
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
  
}

</style>
</head>
<?php
session_start();
include('../config.inc');
include('re_use.php');
include('../usefull_queries.php');
$product=  get_product();
$qnt=  get_qnt();
//$discount=  get_discount();
$order=$_SESSION['order'];
$add=  get_add($order);
$table_no=$_SESSION['table_no'];
$table=get_table($table_no);
$boy_no=$_SESSION['boy_no'];
$boy=get_boy($boy_no);
//echo "Order NO: $order --- table NO: $table_no---Boy no: $boy_no";
?>
<body>
    
<center>
    <table>
    
    </table>
</center>
<table class="">
    <tr><th>Select Table</th></tr>
    <tr><td><?php echo $table;?></td></tr>
    <tr><th>Select Boy</th></tr>
    <tr><td><?php echo $boy;?></td></tr>
    <tr><th>Product</th><th>Quantity</th><th>Add</th></tr>
    <tr><td id="change_to_product"><?php echo $product;?></td><td><?php echo $qnt;?></td><td><?php echo $add;?></td></tr>
</table>
<div id="order_page">
<table class="bordered" style="width:100%">
  
    <?php
    if($order!=-1){
        $data="<tr><th>Delete</th><th>Product Name</th><th>Net Price</th><th>Quantity</th><th>Price</th></tr>";
         $query=  mysql_query("select * from sub_order where order_id=$order");
         $total=0;
  while($row=  mysql_fetch_array($query)){
        $sub_id=$row['id'];
        $product_id=$row['product_id'];
        $product_name=  get_product_name($product_id);
        $qnt_b=$row['qnt'];
        $pro_price=$row['product_price'];
        $price=$qnt_b*$pro_price;
        $total=$total+$price;
		$vat= ($total * 15) /100;
		$totalDue = $total + $vat;
        $data.= "<tr><td ><button class='del_sub' id='$sub_id'>X</button></td><td >$product_name</td><td >$pro_price</td><td >$qnt_b</td><td >$price</td></tr>";
    }
    $data.="<tr><th>&nbsp;&nbsp;&nbsp;</th><th></th><th></th><th>Total</th><th>$total</th></tr>";
    $final_dis=get_final_discount($total);
     $data.= "<tr><td ></td><td ></td><td>-Special Discount</td><td >$final_dis</td><td id='total_discount'>0</td></tr>";
	 $data.= "<tr><td ></td><td ></td><td>+ VAT</td><td ></td><td id='total_vat'>$vat</td></tr>";
     $data.="<tr><th>&nbsp;&nbsp;&nbsp;</th><th></th><th style='display: none' id='amountWithOutVat'>$total</th><th>Ammount Due</th><th id='final_am'>$totalDue</th></tr>";
    echo $data;
}
   
    ?>
</table>
    <a href='#' class="main_print button orange medium rounded" style="float: right"id="<?php echo $order; ?>">Print</a>
     </div>
   </body>             