<?php
session_start();
    include('config.inc');
    include('usefull_queries_2.php');
    if (!isset($_SESSION['username'])) {
            header('Location: index.php');
    }
    
     $date = date('d M, Y');
     $time = date("Y-m-d H:i:s");
    $timestamp = strtotime($time);
    $timestamp += 6 * 3600;
    $time = date('H:i:s', $timestamp);
    $time=date("g:i a", strtotime($time));
    $order=$_SESSION['order'];
    $check=  mysql_fetch_array(mysql_query("select max(discount_rate) from sub_order where order_id=$order"));
    $num=$check['max(discount_rate)'];
    //echo"max:$num<br>";
    $query=  mysql_query("select * from sub_order where order_id=$order and discount_rate=$num");
         $kichen_print=0;
  while($row=  mysql_fetch_array($query)){
        $product_id=$row['product_id'];

       if($product_id<=25){
           $juice_bar=1;
       }else{
          $kichen_print=1;
          break;
       }
    }if($kichen_print==0){
        header('Location: juice_print.php');
    }else{
if($p = printer_open("Posiflex PP8000 Partial Cut v3.01")){
   printer_set_option($p, PRINTER_ORIENTATION, PRINTER_ORIENTATION_LANDSCAPE);
   
printer_set_option($p,PRINTER_PAPER_FORMAT,PRINTER_FORMAT_CUSTOM);

//printer_set_option($p,PRINTER_PAPER_LENGTH,175);

printer_set_option($p,PRINTER_PAPER_WIDTH,84);
printer_start_doc($p, "Memo");
printer_start_page($p);
$pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
$font = printer_create_font("Courier", 12, 6, PRINTER_FW_NORMAL, false, false, false, 0);

printer_select_pen($p, $pen);
printer_select_font($p, $font);
//printer_delete_pen($pen);
$the_y=25;
$the_x=25;
$fdoc_name = printer_create_font("Arial", 18, 15, 60, false, false, false, 0);
printer_select_font($p, $fdoc_name);
printer_draw_text($p, "Cherry Drops " , $the_x, $the_y);  // name
printer_delete_font($fdoc_name);
$data_date=date('y-m-d');
$game=  mysql_query("select * from main_order where date='$data_date'");
$count=0;
while ($row99 = mysql_fetch_array($game)) {
    $o_id=$row99['order_id'];
    $count++;
    if($o_id==$order){
        break;
    }
}



$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
$the_y+=30;
$the_x-=15;

$table_id=  get_table_from_order($order);
$table_name=get_table_name($table_id);
$boy_id=get_boy_id($order);
$boy_name=get_boy_name($boy_id);
printer_draw_text($p, "Kitchen Copy ", $the_x, $the_y);
$the_y+=15;
printer_delete_font($fdoc_name);
$fdoc_name = printer_create_font("Arial", 70, 50, 60, false, false, false, 0);
printer_select_font($p, $fdoc_name);
printer_draw_text($p, "$count" , $the_x+150, $the_y);  // name
printer_delete_font($fdoc_name);

$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
printer_draw_text($p, "Table: ".$table_name, $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Boy: ".$boy_name, $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Order No: ".$order, $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Date:$date", $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Time:$time", $the_x, $the_y);

$user_id=$_SESSION['user_id'];
$res=  mysql_fetch_array(mysql_query("select * from user where user_id=$user_id"));
$username=$res['name'];



$the_y+=15;
printer_draw_text($p, "SP: ".$username, $the_x, $the_y);

printer_delete_font($fdoc_id);

//Major 
$fdoc_name = printer_create_font("Arial", 14, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_name);
$the_y+=30;
$str=5;
$mid=200;
printer_draw_line($p, 0,$the_y,300,$the_y);
$the_y+=5;
printer_draw_text($p, "Item", $str, $the_y);
printer_draw_text($p, "Qnt", $mid, $the_y);
$the_y+=15;
printer_draw_line($p, 0,$the_y,300,$the_y);
printer_delete_font($fdoc_name);
$the_y+=25;



$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
$check=  mysql_fetch_array(mysql_query("select max(discount_rate) from sub_order where order_id=$order"));
    $num=$check['max(discount_rate)'];
    $query=  mysql_query("select * from sub_order where order_id=$order and discount_rate=$num");
         $total=0;
         $u=1;
         $juice_bar=0;
  while($row=  mysql_fetch_array($query)){
       // $sub_id=$row['id'];
        $product_id=$row['product_id'];
        $product_name=  get_product_name($product_id);
        $qnt_b=$row['qnt'];
        $pro_price=$row['product_price'];
        $price=$qnt_b*$pro_price;
        $total=$total+$price;
       if($product_id<=25){
           $juice_bar=1;
       }else{
           printer_draw_text($p, $u.". $product_name", $str, $the_y); 
        printer_draw_text($p, $qnt_b, $mid, $the_y);
          $u++;
          $the_y=$the_y + 20;
       }
        
        
    }
    printer_draw_line($p, 0,$the_y,300,$the_y);
//Minor


//signature
$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
//printer_delete_pen($sig_pen);
$the_y+=80;
printer_draw_text($p,"Developed By: BOTTOM UP", 25,$the_y);
$the_y+=15;
printer_draw_text($p,"Phn:+8801552444940", 45,$the_y);
//for ($i = 0; $i < 6700; $i+=100)
//{
//printer_draw_line($p, 0,$i,4600,$i);
//printer_draw_text($p,$i,0,$i);
//}

printer_delete_font($font);
printer_delete_pen($pen);
printer_end_page($p);
printer_end_doc($p);
printer_close($p);
if($juice_bar==1){
    header('Location: juice_print.php');
}else{
$_SESSION['order']=-1;
header('Location: home.php');
}
echo "Done";
}else{
    echo "404";
}
    }

?><?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
