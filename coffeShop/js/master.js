
$(document).ready(function(){
$(".what_to_do").live('click', function()
    {
       // alert("i'm here");
        var id = $(this).attr('id');
        if (id == 1) {
                window.location.reload();
        }else{
    var add=["","","order/order.php",
        "add/add_item.php",
        "edit/edit_item.php",
        "report/report_list.php",
        "logout.php",
        "status/table_stat.php",
        "setting/setting.php"];
        //alert(add[id]);
     $('#master').load(add[id]);
        }
        
});


});