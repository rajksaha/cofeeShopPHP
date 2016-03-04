<?php
include('../config.inc');
include('../usefull_queries.php');
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div class="row-fluid">

                    <div id="view_port" class="span9"> 
                        <?php
                    $tablehead="<tr><th>Table Name</th><th>Status</th><th>Start Time</th><th>Details</th><th>Print Bill</th><th>End Process</th><th>Edit</th><th>Served by</th></tr>";
                    $tabledata="";
                    $result=  mysql_query("select * from tab");
                    while($row=mysql_fetch_array($result)){
                         $tab_id=$row['id'];
                        $tab_name=$row['name'];
                        $status=$row['cur_order'];
            
           // $boy_name=get_boy_name($boy_id);
            if($tab_id==0){
                
            }else if($status==0){
                 $tabledata.="<tr class='detail'><td>$tab_name</td><td>Free</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            }else{
                $boy_id=get_boy_id($status);
                $time=get_time($status);
                 $time=date("g:i a", strtotime($time));
           //$result2=  mysql_query("SELECT * FROM `bell_boy` WHERE `id`= $boy_id");
            //$row1=  mysql_fetch_assoc($result2);
            $boy_name= get_boy_name($boy_id);
                $tabledata.="<tr class='detail'><td>$tab_name</td><td>On-going</td><td>$time</td><td><button class='big_detail_status' id='$status' table='$tab_id'>+</button></td><td><button class='just_print' id='$status' table='$tab_id' boy_id='$boy_id'>Print</button></td><td><button class='end_proc' id='$status' table='$tab_id' boy_id='$boy_id'>X</button></td><td><button class='edit_order' id='$status' table='$tab_id' boy_id='$boy_id'>Edit</button></td><td>$boy_name</td></tr>";
            }
        }
        $finaldata = "<table width='100%' id='rounded-corner' >". $tablehead . $tabledata . "</table></tr>";
                    echo $finaldata;  ?>
                        
                    </div>
                    <div class="span3" id="sub_port">
                      
                       
                    </div>
                  
                
</div>
    </body>
</html>
