$(document).ready(function(){
    
    
    $(".edit_order").live('click', function()
    {
        var order_no=$(this).attr('id');
        var table_no=$(this).attr('table');
        var boy_no=$(this).attr('boy_id');
        var data='order='+order_no+'&table='+table_no+'&query=1'+'&boy='+boy_no;
       // alert(data);
        $.ajax({
        type: "POST",
        url: "status/status_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   // alert("i was here");
   $('#master').load('order/order.php');
}
})
    });
    $(".end_proc").live('click', function()
    {
        var order_no=$(this).attr('id');
        var table_no=$(this).attr('table');
        var boy_no=$(this).attr('boy_id');
        var data='order='+order_no+'&table='+table_no+'&query=2'+'&boy='+boy_no;
       // alert(data);
        $.ajax({
        type: "POST",
        url: "status/status_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   // alert("i was here");
    window.location.href = "home.php";
  
}
});
    });
    
    $(".just_print").live('click', function()
    {
        var order_no=$(this).attr('id');
        var table_no=$(this).attr('table');
        var boy_no=$(this).attr('boy_id');
        var data='order='+order_no+'&table='+table_no+'&query=3'+'&boy='+boy_no;
       // alert(data);
        $.ajax({
        type: "POST",
        url: "status/status_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   // alert("i was here");
  window.location.href = "printer.php";
 // window.location.href = "kp_test.php";
}
});
    });
    
    $('.big_detail_status').live('click', function() {
       
        var id = $(this).attr('id');
        $.post('report/sell_report.php',{order:id,who:3},function(result){
            $('#sub_port').html(result);
        });
});

});
