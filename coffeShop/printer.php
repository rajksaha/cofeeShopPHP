<?php
session_start();
    include('config.inc');
    include('usefull_queries_2.php');
    if (!isset($_SESSION['username'])) {
            header('Location: index.php');
    }
    
     $date = date('d M, Y');                 
//$p = printer_open("PP-6900 Thermal Printer");
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


$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
$the_y+=30;
$the_x-=15;
printer_draw_text($p, "Vat Reg No : 19041077232", $the_x, $the_y);
$the_x-=15;
printer_draw_text($p, "572/A Block-C Khilgaon Chowdhury Para", $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Dhaka-1219 Cell:+8801674915636", $the_x, $the_y);
$the_y+=15;
printer_draw_text($p, "Date:$date", $the_x, $the_y);
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
printer_draw_text($p, "Total", $mid, $the_y);
$the_y+=15;
printer_draw_line($p, 0,$the_y,300,$the_y);
printer_delete_font($fdoc_name);
$the_y+=25;

$order=$_SESSION['order'];

$fdoc_id = printer_create_font("Arial", 12, 8, 80, false, false, false, 0);
printer_select_font($p, $fdoc_id);
$query=  mysql_query("select * from sub_order where order_id=$order");
         $total=0;
         $u=1;
  while($row=  mysql_fetch_array($query)){
       // $sub_id=$row['id'];
        $product_id=$row['product_id'];
        $product_name=  get_product_name($product_id);
        $qnt_b=$row['qnt'];
        $pro_price=$row['product_price'];
        $price=$qnt_b*$pro_price;
        $total=$total+$price;
        $str="($pro_price)$qnt_b";
        printer_draw_text($p, $u.". ".$product_name."-".$str, $str, $the_y); 
        printer_draw_text($p, $price, $mid, $the_y);
          $u++;
          $the_y=$the_y + 20;
        
    }
    printer_draw_line($p, 0,$the_y,300,$the_y);
    $the_y+=10;
    printer_draw_text($p, "Sub Total", $str, $the_y); 
    printer_draw_text($p, $total, $mid, $the_y);
    
    $the_y=$the_y + 15;
    printer_draw_line($p, 0,$the_y,300,$the_y);
    $the_y+=10;
    $final=get_final_due($order);
    $final_dis=  $total-$final;
	$vat = ($final * 15) / 100 ;
	$finalWithVat = $final + $vat;
    printer_draw_text($p, "-Special Discount:", $str, $the_y); 
    printer_draw_text($p, $final_dis, $mid, $the_y);
    $the_y=$the_y + 15;
    printer_draw_line($p, 0,$the_y,300,$the_y);
    $the_y+=10;
	printer_draw_text($p, "VAT:", $str, $the_y); 
    printer_draw_text($p, $vat, $mid, $the_y);
    $the_y=$the_y + 15;
    printer_draw_line($p, 0,$the_y,300,$the_y);
	$the_y+=10;
    printer_draw_text($p, "Amount Due:", $str, $the_y); 
    printer_draw_text($p, $finalWithVat, $mid, $the_y);
    $the_y+=15;
    printer_draw_line($p, 0,$the_y,3200,$the_y);
    $the_y+=10;
printer_delete_font($fdoc_id);
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
//$_SESSION['order']=-1;
header('Location: home.php');
echo "Done";
}else{
    echo "404";
}

?>