$(document).ready(function(){
    
   $(".del_sub").live('click',function()
{
    

var id = $(this).attr('id');
var b=$(this).parent().parent();
var dataString = 'id='+ id+'&query='+3;

if(confirm("Sure you want to delete this entry?"))
{
	$.ajax({
type: "POST",
url: "order/order_query.php",
data: dataString,
cache: false,
success: function(e)
{
    b.hide();
}
		   });
	return false;
}
}); 

$(".sel_tab").live('change',function()
{
   // $('.product_list').removeclass('disabled');
    $('.product_list').removeAttr('disabled');
});
$(".product_list").live('change',function()
{
    var ID=$(".product_list").val();
    
    $.post('order/order_help.php',{query:1,type_id:ID},function(result){
    $('#change_to_product').html('');
    $('#change_to_product').html(result);

});
});
$(".real_product_list").live('change',function()
{   var val=$(this).val();
    if(val!=-1){ $('.qnt_list').removeAttr('disabled');}
   

});
$(".qnt_list").live('change',function()
{
   // $('.product_list').removeclass('disabled');
    $('.discount_list').removeAttr('disabled');
    $('.add_main_item').removeAttr('disabled');
});

$('.add_main_item').live('click', function() {
        var id = $(this).attr('id');
        var table=$(".sel_tab").val();
        var boy=$(".sel_boy").val();
        var product_id=$(".real_product_list").val();
        var qnt=$(".qnt_list").val();
        //var discount=$(".discount_list").val();
        var  data='id='+id+'&query='+1+'&table='+table+'&pro_id='+product_id+'&qnt='+qnt+'&table='+table+'&boy='+boy;
       // alert(data);
         $.ajax({
        type: "POST",
        url: "order/order_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   $('#master').load('order/order.php');
   $('.main_print').show();
}
});


});

$('.main_menu').live('click', function() {
    
    $.post('order/order_help.php',{query:2},function(result){
    $('#change_to_product').html('');
    $('#change_to_product').html(result);
   // $('.qnt_list').addClass('disabled');
   $( ".qnt_list" ).prop( "disabled", false );
    

});
   
});
    
    $(".dis_final_list").live('change',function()
{
    var id = $(this).attr('id');
    var value=$(this).val();
    $.post('order/order_help.php',{query:3,rate:value,total:id},function(result){
      // alert(result);
    $('#total_discount').html('');
    $('#total_discount').html(result);
    $('#final_am').html('');
	var finalAmount = id - result;
	var subToal = finalAmount;
	var vat = (finalAmount * 15) / 100;
	finalAmount = finalAmount + vat;
    $('#final_am').html(finalAmount);
    $('#total_vat').html('');
    $('#total_vat').html(vat);
	$('#amountWithOutVat').html('');
    $('#amountWithOutVat').html(subToal);
	//need to change the vat amount

});
});

$('.main_print').live('click', function() {
var value=$('.dis_final_list').val();
var final_am=$('#amountWithOutVat').html();
var  data='value='+value+'&query='+2+'&final='+final_am;
$.ajax({
        type: "POST",
        url: "order/order_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   // alert("lol");
 //window.location.href = "kp_test.php";
   window.location.href = "kichen_print.php";
}
});

});


});
