<?php

function get_sidebar($user_id){
    if($user_id==1){
        return "&nbsp;&nbsp;&nbsp;<a href='#' class='what_to_do button big orange' id='2'>Place a Order</a>&nbsp;&nbsp;&nbsp;
                <a href='#' class='what_to_do button big orange' id='7'>Table Status</a>";
    }else{
        return "&nbsp;&nbsp;&nbsp;<a href='#' class='what_to_do  button big orange' id='3'>Add Product</a>&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;<a href='#' class='what_to_do  button big orange' id='4'>Edit Product</a>&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;<a href='#' class='what_to_do  button big orange' id='5'>Reports</a>&nbsp;&nbsp;&nbsp;";
    }
    
}
?>
