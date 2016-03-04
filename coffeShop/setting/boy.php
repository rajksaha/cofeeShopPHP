<?php

    $query_pag_data = "SELECT * from bell_boy";
    $result_pag_data = mysql_query($query_pag_data);
    $tablehead="<tr><th>Name</th><th>Delete</th></tr>";
    $tabledata="";
// Table Data Loop
while($row = mysql_fetch_array($result_pag_data))
{
$id=$row['id'];
$name=htmlentities($row['name']);
if($id==0){
    continue;
}

$tabledata.="<tr id='$id' class='edit_boy'>

<td class='edit_td' >
<span id='boy_$id' class='text'>$name</span>
<input type='text' value='$name' class='editbox' style='display:none' id='boy_input_$id' />
</td>
<td><a href='#' class='delete_boy' id='$id'> X </a></td>


</tr>";
}
// Loop End
$finaldata = "<table width='100%'>". $tablehead . $tabledata . "</table>";
echo $finaldata;
    ?>
