$(document).ready(function(){
    
    $('.div_selector').live('click', function() {
         var id = $(this).attr('id');
         $('.all_div').hide();
         $('.'+id).show();
          $('#view_port').html('');
          $('#sub_sub_port').html('');
          $('#sub_port').html('');
    });
    $('#give_sell').live('click', function() {
        var s_date=$('#start_date1').val();
        var e_date=$('#end_date1').val();
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{date1:s_date,date2:e_date,who:1},function(result){
            $('#view_port').html(result);
        });
    });
    $('#give_product').live('click', function() {
        var s_date=$('#start_date2').val();
        var e_date=$('#end_date2').val();
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{date1:s_date,date2:e_date,who:5},function(result){
            //alert(result);
            $('#view_port').html(result);
        });
    });
    $('#give_user').live('click', function() {
        var s_date=$('#start_date3').val();
        var e_date=$('#end_date3').val();
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{date1:s_date,date2:e_date,who:6},function(result){
            //alert(result);
            $('#view_port').html(result);
        });
    });
    $('#give_boy').live('click', function() {
        var s_date=$('#start_date4').val();
        var e_date=$('#end_date4').val();
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{date1:s_date,date2:e_date,who:7},function(result){
            //alert(result);
            $('#view_port').html(result);
        });
    });
    
    $('.small_detail').live('click', function() {
        var id = $(this).attr('id');
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{date:id,who:2},function(result){
            $('#sub_port').html(result);
        });
    });
    $('.big_detail').live('click', function() {
        var id = $(this).attr('id');
        $.post('report/sell_report.php',{order:id,who:3},function(result){
            $('#sub_sub_port').html(result);
        });
    });
    $('.get_by_user').live('click', function() {
         var id = $(this).attr('id');
        //alert(s_date+"---"+e_date);
        $.post('report/sell_report.php',{user:id,who:4},function(result){
            $('#sub_port').html(result);
        });
    });
});