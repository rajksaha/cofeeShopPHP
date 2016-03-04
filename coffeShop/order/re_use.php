<?php

include('../config.inc');
//session_start();
function get_product(){
    $result=  mysql_query("SELECT * from product_type");
    if($_SESSION['table_no']==0){
        $data="<select size='10' disabled='disabled' class='product_list'>";
    }else{
        $data="<select size='10'  class='product_list'>";
    }

while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
        $data.="<option value='$tab_id'>$tab_name</option>";

    
}

$data.="</select>";
return $data;
}
function get_qnt(){
    $data="<select disabled='disabled' class='qnt_list'>";
$i=0;
while($i<100){
    $data.="<option value='$i'>$i</option>";
    $i++;
}
$data.="</select>";
return $data;
}
function get_discount(){
    $data="<select disabled='disabled' class='discount_list'>";
$i=0;
while($i<65){
    $data.="<option value='$i'>$i%</option>";
    $i=$i+5;
}
$data.="</select>";
return $data;
}
function get_table($table_no){
    //$table_no=$_SESSION['table_no'];
    if($table_no!=0){
         $data="<select class='sel_tab' disabled='disabled'>";
		 $result=  mysql_query("SELECT * from tab");
		while($row=mysql_fetch_array($result)){
			$tab_id=$row['id'];
			$tab_name=$row['name'];
			$status=$row['cur_order'];
			
			if($tab_id==$table_no){
				$data.="<option value='$tab_id' selected='selected'>$tab_name</option>";
			}else{
				$data.="<option value='$tab_id'>$tab_name</option>";
			}
			
}
$data.="</select>";
    }else{
        $data="<select class='sel_tab'>";
    
    $result=  mysql_query("SELECT * from tab");
while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
    $status=$row['cur_order'];
    if($status==0){
    $data.="<option value='$tab_id'>$tab_name</option>";
    }
}
$data.="</select>";
}

return $data;
}
function get_boy($boy_no){
    //$table_no=$_SESSION['table_no'];
    if($boy_no!=0){
         $data="<select class='sel_boy' disabled='disabled'>";
		 $result=  mysql_query("SELECT * from bell_boy");
		while($row=mysql_fetch_array($result)){
			$boy_from=$row['id'];
			$boy_name=$row['name'];
			//$status=$row['cur_order'];
			
			if($boy_from==$boy_no){
				$data.="<option value='$boy_no' selected='selected'>$boy_name</option>";
			}else{
				$data.="<option value='$boy_from'>$boy_name</option>";
			}
			
}
$data.="</select>";
    }else{
        $data="<select class='sel_boy'>";
    
    $result=  mysql_query("SELECT * from bell_boy");
while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
    //$status=$row['cur_order'];
   // if($status==0){
    $data.="<option value='$tab_id'>$tab_name</option>";
   // }
}
$data.="</select>";
}

return $data;
}
function get_add($order){
    $table_no=$_SESSION['table_no'];
    if($table_no==0){
        $sql= "SELECT max( order_id ) as order_id FROM sub_order";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $add_id = $row['order_id']+1;
       
    }else if($order==-1){
        $sql= "SELECT max( order_id ) as order_id FROM sub_order";
    $ad = mysql_query($sql);
    $row = mysql_fetch_array($ad);
    $add_id = $row['order_id'];
   //echo "$table_no---$add_id";
    
    
}else{
     $add_id =$order;
}
$data="<input type='button' value='Add Item' disabled='disabled' class='add_main_item button green medium rounded' id='$add_id'/>";
    return $data;
}

function get_final_discount($total){
    $data="<select class='dis_final_list' id='$total'>";
$i=0;
while($i<20){
    $data.="<option value='$i'>$i%</option>";
    $i=$i+5;
}
$data.="</select>";
return $data;
}
?>
