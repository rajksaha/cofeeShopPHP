<?php
    session_start();
    $user_id=$_SESSION['user_id'];
    $query_pag_data = "SELECT * from user where user_id=$user_id";
    $result_pag_data = mysql_query($query_pag_data);
    $tablehead="<tr><th>Name</th><th>User Name</th></tr>";
    $tabledata="";
// Table Data Loop
$row = mysql_fetch_array($result_pag_data);

$id=$user_id;
$name=htmlentities($row['name']);
$username=htmlentities($row['username']);


$tabledata.="<tr id='$id' class='edit_user'>

<td class='edit_td' >
<span id='user1_$id' class='text'>$name</span>
<input type='text' value='$name' class='editbox' style='display:none' id='user1_input_$id' />
</td>
<td class='edit_td' >
<span id='user2_$id' class='text'>$username</span>
<input type='text' value='$username' class='editbox' style='display:none' id='user2_input_$id' />
</td>



</tr>";

// Loop End
$finaldata = "<table width='100%'>". $tablehead . $tabledata . "</table>";
echo $finaldata;
?>
