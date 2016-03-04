$(document).ready(function(){
    
    $('#plus_item').live('click', function() {
       // alert("data");
        var type=$(".product_type").val();
        var name=$("#name_item").val();
        var price=$("#price_item").val();
        var cost=$("#cost_item").val();
       // alert(price);
        if(price==''){
            price=0;
        }
        if(cost==''){
            cost=0;
        }
        var  data='query='+1+'&type='+type+'&name='+name+'&price='+price+'&cost='+cost;
      //  alert(data);
        $.ajax({
        type: "POST",
        url: "add/add_query.php",
        data: data,
        cache: false,
        success: function(e)
{
   $('#master').load('add/add_item.php');
}
});
    });
    
    $('#plus_type').live('click', function() {
       // alert("data");
       
        var name=$("#name_type").val();
     
        
        var  data='query='+2+'&name='+name;
       // alert(data);
        $.ajax({
        type: "POST",
        url: "add/add_query.php",
        data: data,
        cache: false,
        success: function(e)
{
    //alert(e);
   $('#master').load('add/add_item.php');
}
});
    });
});


