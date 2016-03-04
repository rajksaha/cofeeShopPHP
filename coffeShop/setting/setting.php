<?php
include('../config.inc');
include('../usefull_queries.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .all_div{display: none}
            #password_set{
                display: none;
            }
            #submit_button{
                padding:10px;
                font-weight: 700;
                height: 60px;
                width: 180px;
                border-radius: 6px;
                background-color:#33AADD; 
                color:#000;
            }
            #submit_button:active{
                background-color:#00BFFF; 
                color:whitesmoke;
            }
            #login-input{
                font-size:14px;
            }
            fieldset{
                font-size: 20px;
            }
            legend td{
                font-size: 14px;
            }
            .t td{
                font-size: 15px;
                font-weight: 400;
            }
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
        <script type="text/javascript">
$(function() {
	$('#start_date1').datepick({dateFormat: 'yy-mm-dd'});
        $('#end_date1').datepick({dateFormat: 'yy-mm-dd'});
        // $(".date").datepick()({dateFormat: 'yy-mm-dd'});
});

</script>
    </head>
    <body>
      <center>  
<a href='#' class="button big gray div_selector" id="password_func">Password Change</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="table_func">Table Function</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="boy_func">Boy Function</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="name_change">Rename Name</a>&nbsp;&nbsp;&nbsp;
<br></br>
<div class="password_func all_div">
                <fieldset id='paw'>
                    <legend id='pass_div'>Password</legend>
                <table  id='pass' class='t'>

                <tr><td>Old Password</td><td><input type='password' id='old_pwd'></td></tr>
                <tr><td>New Password</td><td><input type='password' id='new_pwd'></td></tr>
                <tr><td>Re-type new Password</td><td><input type='password' id='re_new_pwd'></td></tr>
                <tr><td></td><td><input type='button' id='submit_button'  value='Change Password'></td></tr>
                </table>
                </fieldset>
   
</div>
<div class="table_func all_div">
    <table class="">
    <tr><th>Add Table</th><th></th></tr>
    <tr><td><input type="text" id="name_table"/></td><td><input type="button" id="plus_table" class='add_main_item button green medium rounded' value="Add"/></td></tr>
</table>
    <?php include'table.php';?>
</div>
<div class="boy_func all_div">
   <table class="">
    <tr><th>Add Boy</th><th></th></tr>
    <tr><td><input type="text" id="name_boy"/></td><td><input type="button" id="plus_boy" class='add_main_item button green medium rounded' value="Add"/></td></tr>
</table>
  <?php include'boy.php';?>
</div>
<div class="name_change all_div">
    <?php include'rename.php';?>
</div>



<div class="row-fluid">

                    <div id="view_port" style="float: left" class="span6"></div>
                    <div class="span6" style="float: right">
                        <div id="sub_port"></div>
                        <div id="sub_sub_port"></div>
                    </div>
                  
                
</div>
    </body>