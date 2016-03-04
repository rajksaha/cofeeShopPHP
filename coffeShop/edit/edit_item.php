<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<html>
    <head>
	<?php 
	session_start();
include('../config.inc');
include('../usefull_queries.php');
	?>
        <title>Live Edit and Delete Records</title>
        <script type="text/javascript" src="EditDeletePage.js"></script> 
        

        <style type="text/css">
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:arial;color:#999;
			}
			.editbox
			{
			display:none;
			
			}
			td, th
			{
			width:20%;
			text-align:left;;
			padding:5px;
			}
			.editbox
			{
			padding:4px;
			
			}
			
			

        </style>

    </head>
    <body>
	



        
		
		
<body> 


<div>
    <?php
    $query_pag_data = "SELECT * from product";
    $result_pag_data = mysql_query($query_pag_data);
    $tablehead="<tr><th>Product Name</th><th>Selling Price</th><th> Production Cost</th><th>Delete</th></tr>";
    $tabledata="";
// Table Data Loop
while($row = mysql_fetch_array($result_pag_data))
{
$id=$row['id'];
$name=htmlentities($row['name']);
$price=htmlentities($row['price']);
$cost=htmlentities($row['cost']);

$tabledata.="<tr id='$id' class='edit_tr'>

<td class='edit_td' >
<span id='one_$id' class='text'>$name</span>
<input type='text' value='$name' class='editbox' style='display:none' id='one_input_$id' />
</td>
<td class='edit_td' >
<span id='three_$id' class='text'>$price </span>
<input type='text' value='$price' class='editbox' style='display:none' id='three_input_$id'/>
</td>

<td class='edit_td' >
<span id='two_$id' class='text'>$cost</span>
<input type='text' value='$cost' class='editbox'  style='display:none' id='two_input_$id'/>
</td>



<td><a href='#' class='delete' id='$id'> X </a></td>


</tr>";
}
// Loop End
$finaldata = "<table width='100%'>". $tablehead . $tabledata . "</table>";
echo $finaldata;
    ?>
   
</div>

		
    </body>
</html>
