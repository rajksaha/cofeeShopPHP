<?php
include('../config.inc');
session_start();
//$order=$_SESSION['order'];
$query_no=$_POST['query'];
if($query_no==1){
$val = mysql_real_escape_string($_POST['type_id']);
//echo "$val-am i visivle";
$result=  mysql_query("SELECT * from product where type_id=$val");
$data="<select size='10' class='real_product_list'>";
while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
    $data.="<option value='$tab_id'>$tab_name</option>";
}
$data.="<option value='-1' class='main_menu'>Back</option>";
$data.="</select>";
echo $data;
}else if($query_no==2){
    $result=  mysql_query("SELECT * from product_type");

        $data="<select size='10'  class='product_list'>";
    while($row=mysql_fetch_array($result)){
    $tab_id=$row['id'];
    $tab_name=$row['name'];
    $data.="<option value='$tab_id'>$tab_name</option>";
}

$data.="</select>";
echo $data;
}else if($query_no==3){
    $val = mysql_real_escape_string($_POST['rate']);
     $total = mysql_real_escape_string($_POST['total']);
     $dis=($val*$total)/100;
     echo $dis;
}
?>
