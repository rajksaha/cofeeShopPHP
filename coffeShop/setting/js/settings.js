$(document).ready(function()
{   
    $('.div_selector').live('click', function() {
         var id = $(this).attr('id');
         $('.all_div').hide();
         $('.'+id).show();
          $('#view_port').html('');
          $('#sub_sub_port').html('');
          $('#sub_port').html('');
    });

    $('#submit_button').live('click', function() {
        
        var old_pwd = $("#old_pwd").val();
        var new_pwd = $("#new_pwd").val();
        var re_new_pwd = $("#re_new_pwd").val();

        if (new_pwd !== re_new_pwd) {
            alert("Passwords do not match! Please re-type");
            $("#re_new_pwd").focus();
        }
        else
            $.post("setting/set_query.php", {'old_pwd': old_pwd, 'pwd': new_pwd,'query':1}, function(data) {

                var check = $.trim(data);
                if (check == "success") {
                    alert("Password updated");
                    location.reload();
                }
                else {

                    alert(check);
                    $("#old_pwd").focus();
                }
            });


    });
    

    $('#pass_div').live('click', function() {
        $('.all_div').hide();
        $('#pass').toggle();

    });
    $('#new_div').live('click', function() {
        $('.all_div').hide();
        $('#new').toggle();

    });
    $(".edit_table").live('click',function()
{
var ID=$(this).attr('id');

$("#one_"+ID).hide();
$("#one_input_"+ID).show();


}).live('change',function(e)
{
var ID=$(this).attr('id');

var one_val=$("#one_input_"+ID).val();

var dataString = 'id='+ ID +'&name='+one_val+'&query=2';
if(one_val.length>0)
{

$.ajax({
type: "POST",
url: "setting/set_query.php",
data: dataString,
cache: false,
success: function(e)
{

$("#one_"+ID).html(one_val);

e.stopImmediatePropagation();

}
});
}
else
{
alert('Enter something.');
}

});
$(".edit_boy").live('click',function()
{
var ID=$(this).attr('id');

$("#boy_"+ID).hide();
$("#boy_input_"+ID).show();

});
$(".edit_boy").live('change',function(e)
{
var ID=$(this).attr('id');

var one_val=$("#boy_input_"+ID).val();

var dataString = 'id='+ ID +'&name='+one_val+'&query=3';
//alert(dataString);
if(one_val.length>0)
{

$.ajax({
type: "POST",
url: "setting/set_query.php",
data: dataString,
cache: false,
success: function(e)
{

$("#boy_"+ID).html(one_val);

e.stopImmediatePropagation();

}
});
}
else
{
alert('Enter something.');
}

});

$(".delete_tab").live('click',function()
{
var id = $(this).attr('id');
var b=$(this).parent().parent();
var dataString = 'id='+ id+'&query=4';
if(confirm("Sure you want to delete this update? There is NO undo!"))
{
	$.ajax({
type: "POST",
url: "setting/set_query.php",
data: dataString,
cache: false,
success: function(e)
{
b.hide();
e.stopImmediatePropagation();
}
		   });
	return false;
}
});

$(".delete_boy").live('click',function()
{
var id = $(this).attr('id');
var b=$(this).parent().parent();
var dataString = 'id='+ id+'&query=5';
if(confirm("Sure you want to delete this update? There is NO undo!"))
{
	$.ajax({
type: "POST",
url: "setting/set_query.php",
data: dataString,
cache: false,
success: function(e)
{
b.hide();
e.stopImmediatePropagation();
}
		   });
	return false;
}
});
$('#plus_table').live('click', function() {
           // alert("data");
       
        var name=$("#name_table").val();
        
       
        var  data='query='+6+'&name='+name;
      //  alert(data);
        $.ajax({
        type: "POST",
        url: "setting/set_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   $('#master').load('setting/setting.php');
}
});
    });
    
    $('#plus_boy').live('click', function() {
       // alert("data");
       
        var name=$("#name_boy").val();
        
       
        var  data='query='+7+'&name='+name;
      //  alert(data);
        $.ajax({
        type: "POST",
        url: "setting/set_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   $('#master').load('setting/setting.php');
}
});
    });
    
    $(".edit_user").live('click',function()
{
var ID=$(this).attr('id');

$("#user1_"+ID).hide();
$("#user1_input_"+ID).show();
$("#user2_"+ID).hide();
$("#user2_input_"+ID).show();

});
$(".edit_user").live('change',function(e)
{
var ID=$(this).attr('id');

var one_val=$("#user1_input_"+ID).val();
var two_val=$("#user2_input_"+ID).val();

var dataString = 'id='+ ID +'&name='+one_val+'&query=8'+'&username='+two_val;
//alert(dataString);
if(one_val.length>0)
{

$.ajax({
type: "POST",
url: "setting/set_query.php",
data: dataString,
cache: false,
success: function(e)
{

$("#user1_"+ID).html(one_val);
$("#user2_"+ID).html(two_val);

e.stopImmediatePropagation();

}
});
}
else
{
alert('Enter something.');
}

});

});
