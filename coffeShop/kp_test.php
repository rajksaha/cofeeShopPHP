<?php
	//echo"i'm here";
    session_start();
    include('config.inc');
    include('usefull_queries_2.php');
    $date = date('y-m-d');
    $order=$_SESSION['order'];
    $game=  mysql_query("select * from main_order where date='$date'");
	$count=0;
while ($row99 = mysql_fetch_array($game)) {
	//echo"no no no";
    $o_id=$row99['order_id'];
    $count++;
    if($o_id==$order){
        break;
    }
}
echo $count;
?>
<br></br>
<a href="home.php">Back</a>