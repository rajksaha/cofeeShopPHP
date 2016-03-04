<?php
include('../config.inc');
include('../usefull_queries.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .all_div{display: none}
            
        </style>
        <script type="text/javascript">
$(function() {
	$('#start_date1').datepick({dateFormat: 'yy-mm-dd'});
        $('#end_date1').datepick({dateFormat: 'yy-mm-dd'});
        $('#start_date2').datepick({dateFormat: 'yy-mm-dd'});
        $('#end_date2').datepick({dateFormat: 'yy-mm-dd'});
        $('#start_date3').datepick({dateFormat: 'yy-mm-dd'});
        $('#end_date3').datepick({dateFormat: 'yy-mm-dd'});
        $('#start_date4').datepick({dateFormat: 'yy-mm-dd'});
        $('#end_date4').datepick({dateFormat: 'yy-mm-dd'});
        // $(".date").datepick()({dateFormat: 'yy-mm-dd'});
});

</script>
    </head>
    <body>
      <center>  
<a href='#' class="button big gray div_selector" id="total_sell">Total Sale</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="product_sell">Product Wise Sale</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="manager_sell">Manager Based Sale</a>&nbsp;&nbsp;&nbsp;
<a href='#' class="button big gray div_selector" id="boy_sell">Waiter Based Sale</a></center>
<br></br>
<div class="total_sell all_div">
    <center><h2>Total Sell</h2></center>
    <br></br>
   Select A Start Date:&nbsp;&nbsp;&nbsp;<input type="date" id="start_date1">-------Select A End Date:&nbsp;&nbsp;&nbsp;<input type="date" id="end_date1">
   &nbsp;&nbsp;&nbsp;<a href='#' class="button big green" id="give_sell">GO</a>
   
</div>
<div class="product_sell all_div">
    Select A Start Date:&nbsp;&nbsp;&nbsp;<input type="date" id="start_date2">-------Select A End Date:&nbsp;&nbsp;&nbsp;<input type="date" id="end_date2">
   &nbsp;&nbsp;&nbsp;<a href='#' class="button big green" id="give_product">GO</a>
    <?php // echo get_max_pro();?>
</div>
<div class="manager_sell all_div">
    Select A Start Date:&nbsp;&nbsp;&nbsp;<input type="date" id="start_date3">-------Select A End Date:&nbsp;&nbsp;&nbsp;<input type="date" id="end_date3">
   &nbsp;&nbsp;&nbsp;<a href='#' class="button big green" id="give_user">GO</a>
   
</div>
<div class="boy_sell all_div">
   Select A Start Date:&nbsp;&nbsp;&nbsp;<input type="date" id="start_date4">-------Select A End Date:&nbsp;&nbsp;&nbsp;<input type="date" id="end_date4">
   &nbsp;&nbsp;&nbsp;<a href='#' class="button big green" id="give_boy">GO</a>
</div>



<div class="row-fluid">

                    <div id="view_port" style="float: left" class="span6"></div>
                    <div class="span6" style="float: right">
                        <div id="sub_port"></div>
                        <div id="sub_sub_port"></div>
                    </div>
                  
                
</div>
    </body>