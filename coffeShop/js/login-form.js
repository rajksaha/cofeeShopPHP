$(document).ready(function(){
    

$(".trust_me").live('click',function()
{
   
    var one_val=$('.username').val();
    var two_val=$('.password').val();
    
    if((one_val == "") || (two_val == "")){
        alert("please enter username and password");
        return false;
    }
        
     var dataString = 'username='+one_val+'&query='+200+'&password='+two_val;
    // alert(dataString);
         $.ajax({
type: "POST",
url: "query.php",
data: dataString,
cache: false,
success: function(e)
{
    if(e==0){
        $("#error").html('The username or password given is not Correct please try again.');
    $('.username').val('');
    $('.password').val('');
}else{
    window.location = "home.php";
}
}
});
    
});

});

$(document).keypress(function(e) {
    if(e.which == 13) {
    var one_val=$('.username').val();
    var two_val=$('.password').val();
    
    if((one_val == "") || (two_val == "")){
        alert("please enter username and password");
        return false;
    }
        
     var dataString = 'username='+one_val+'&query='+200+'&password='+two_val;
    // alert(dataString);
         $.ajax({
type: "POST",
url: "query.php",
data: dataString,
cache: false,
success: function(e)
{
    if(e==0){
        $("#error").html('The username or password given is not Correct please try again.');
    $('.username').val('');
    $('.password').val('');
}else{
    window.location = "home.php";
}
}
});
    }
});