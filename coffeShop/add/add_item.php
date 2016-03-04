<?php

session_start();
include('../config.inc');
include('../usefull_queries.php');
$product=  get_product_type();
?>

<table class="">
    <tr><th>Product Type Name</th><th>Add</th></tr>
    <tr><td><input type="text" id="name_type"/></td><td><input type="button" id="plus_type" class='add_main_item button green medium rounded' value="Add"/></td></tr>
</table>
<table class="">
    <tr><th>Product Type</th><th>Name</th><th>Selling Price</th><th>Production Cost</th><th>Add</th></tr>
    <tr><td id=""><?php echo $product;?></td><td><input type="text" id="name_item"/></td><td><input type="text" id="price_item"/></td><td><input type="text" id="cost_item"/></td><td><input type="button" id="plus_item"class='add_main_item button green medium rounded' value="Add"/></td></tr>
</table>