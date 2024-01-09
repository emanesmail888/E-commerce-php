<?php

$db = mysqli_connect("localhost","root","","ecommerce");

/// IP address code starts
// The first case checks if the HTTP_X_REAL_IP server variable is not empty (!empty($_SERVER['HTTP_X_REAL_IP'])). If it's not empty, it returns the value of $_SERVER['HTTP_X_REAL_IP'], which represents the real IP address of the user.

// If the first case condition is not met, the execution moves to the second case, which checks if the HTTP_CLIENT_IP server variable is not empty (!empty($_SERVER['HTTP_CLIENT_IP'])). If it's not empty, it returns the value of $_SERVER['HTTP_CLIENT_IP'], which represents the IP address of the client.

// If the second case condition is not met, the execution moves to the third case, which checks if the HTTP_X_FORWARDED_FOR server variable is not empty (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])). If it's not empty, it returns the value of $_SERVER['HTTP_X_FORWARDED_FOR'], which represents the IP address of the client as forwarded by an intermediate proxy server.

// If none of the previous case conditions are met, the default case is executed, which returns the value of $_SERVER['REMOTE_ADDR']. This variable represents the IP address of the client as provided by the web server.

// In summary, the getRealUserIp() function attempts to retrieve the real IP address of the user by checking various server variables in order of priority. It provides a fallback option by returning $_SERVER['REMOTE_ADDR'] if none of the other variables are available or contain a value.

function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////

/// add_cart function Starts /////

function add_cart(){
global $db;

if(isset($_GET['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $_GET['add_cart'];

$product_qty = $_POST['product_qty'];

$product_size = $_POST['product_size'];


$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($db,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('This Product is already added in cart')</script>";

echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

}
else {

$query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";

$run_query = mysqli_query($db,$query);

echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

}

}



}


/// add_cart function Ends /////


// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}


// items function Ends ///

// total_price function Starts //


function total_price(){

    global $db;
    
    $ip_add = getRealUserIp();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
    
    $pro_id = $record['p_id'];
    
    $pro_qty = $record['qty'];
    
    
    $sub_total = $record['p_price']*$pro_qty;
    
    $total += $sub_total;
    
    
    
    
    
    
    }
    
    echo "$" . $total;
    
    
    
    }

// function total_price(){

// global $db;

// $ip_add = getRealUserIp();

// $total = 0;

// $select_cart = "select * from cart where ip_add='$ip_add'";

// $run_cart = mysqli_query($db,$select_cart);

// while($record=mysqli_fetch_array($run_cart)){

// $pro_id = $record['p_id'];

// $pro_qty = $record['qty'];

// $get_price = "select * from products where product_id='$pro_id'";

// $run_price = mysqli_query($db,$get_price);

// while($row_price=mysqli_fetch_array($run_price)){


// $sub_total = $row_price['product_price']*$pro_qty;

// $total += $sub_total;



// }





// }

// echo "$" . $total;

//}




function getPro(){

    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
     
    while($row_products=mysqli_fetch_array($run_products)){
    
    $pro_id = $row_products['product_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_label = $row_products['product_label'];
    
    $manufacturer_id = $row_products['manufacturer_id'];
    
    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
    
    $run_manufacturer = mysqli_query($db,$get_manufacturer);
    
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    
    $manufacturer_name = $row_manufacturer['manufacturer_title'];
    
    $pro_psp_price = $row_products['product_psp_price'];
    
    $pro_url = $row_products['product_url'];
    $status=$row_products['status'];

    
    if($pro_label == "Sale" or $pro_label == "Gift"){
    
    $product_price = "<del> $$pro_price </del>";
    
    $product_psp_price = "| $$pro_psp_price";
    
    }
    else{
    
    $product_psp_price = "";
    
    $product_price = "$$pro_price";
    
    }
    
    
    if($pro_label == ""){
    
    
    }
    else {
    
    $product_label = "
    
    <a class='label sale ' href='#' style='color:black;'>
    
    <div class='thelabel '>$pro_label</div>
    
    
    </a>
    
    ";
    
    }
    
    
    echo "
    
    <div class='col-md-3 col-sm-6 ' >
    
    <div class='product'style=' height:610px;' >
    
    <a href='#' >
    
    <img src='admin_area/product_images/$pro_img1' class='img-fluid w-100'  style='height:280px;' />
    
    </a>
    
    <div class='text' >
    
    <center>
    
    <p class='btn btn-info w-100'> $manufacturer_name </p>
    
    </center>
    
    <hr>
    
    <h3><a href='#' >$pro_title</a></h3>
    
    <p class='price' > $product_price $product_psp_price </p>
    
    <p class='buttons d-block' >

    <a href='details.php?pro_id=$pro_id' class='btn w-100' style='  background-color:#e42c5a; color: white;' >View details</a>
    
    <a href='details.php?pro_id=$pro_id' class='btn w-100 mb-2' style='  background-color:#e42c5a; color: white;'>
    
    <i class='fa fa-shopping-cart' ></i> Add To Cart
    
    </a>
    
    
    
    </p>
    
    </div>
    
     $product_label
     
    
    
    </div>
    
    </div>
    
    ";
    
    }
    
    }
    
   




  



function getProducts(){

    /// getProducts function Code Starts ///
    
    global $db;
    
    $aWhere = array();
    
    /// Manufacturers Code Starts ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
    
    foreach($_REQUEST['man'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'manufacturer_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Manufacturers Code Ends ///
    
    /// Products Categories Code Starts ///
    
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
    
    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'p_cat_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Products Categories Code Ends ///
    
    /// Categories Code Starts ///
    
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    
    foreach($_REQUEST['cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'cat_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Categories Code Ends ///


 
    
    $per_page=6;
    
    if(isset($_GET['page'])){
    
    $page = $_GET['page'];
    
    }else {
    
    $page=1;
    
    }
    
    $start_from = ($page-1) * $per_page ;
    
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    
    $get_products = "select * from products  ".$sWhere;
    
    $run_products = mysqli_query($db,$get_products);
    $count = mysqli_num_rows($run_products);
    
    if($count==0){
    
    echo "
    
    <div class='box w-100' >
    
    <h1> No Products Found Yet ! </h1>

    </div>
    <img src='admin_area/categories_images/no-product-found.png' class='img-fluid w-100  ' style='height:100vh;' >


    
   
    
    
    ";
    
    
    }
 

    
    while($row_products=mysqli_fetch_array($run_products)){
    
    $pro_id = $row_products['product_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_label = $row_products['product_label'];
    
    $manufacturer_id = $row_products['manufacturer_id'];
    
    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
    
    $run_manufacturer = mysqli_query($db,$get_manufacturer);
    
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    
    $manufacturer_name = $row_manufacturer['manufacturer_title'];
    
    $pro_psp_price = $row_products['product_psp_price'];
    
    $pro_url = $row_products['product_url'];
    
    
    if($pro_label == "Sale" or $pro_label == "Gift"){
    
    $product_price = "<del> $$pro_price </del>";
    
    $product_psp_price = "| $$pro_psp_price";
    
    }
    else{
    
    $product_psp_price = "";
    
    $product_price = "$$pro_price";
    
    }
    
    
    if($pro_label == ""){
    
    
    }
    else{
    
    $product_label = "
    
    <a class='label sale' href='#' style='color:black;'>
    
    <div class='thelabel'>$pro_label</div>
    
    <div class='label-background'> </div>
    
    </a>
    
    ";
    
    }
    
    
    echo "
    
    <div class='col-md-4 col-sm-6 ' >
    
    <div class='product' style='height:610px;' >
    
    <a href='#' >
    
    <img src='admin_area/product_images/$pro_img1' class='img-fluid w-100  ' style='height:300px;' >
    
    </a>
    
    <div class='text' >
    
    
    <p class='btn btn-info w-100'> $manufacturer_name </p>
    
    
    <hr>
    
    <h3><a href='#' >$pro_title</a></h3>
    
    <p class='price' > $product_price $product_psp_price </p>
    
    <p class='buttons d-block' >

    <a href='details.php?pro_id=$pro_id' class='btn w-100' style='  background-color:#e42c5a; color: white;' >View details</a>

    <a href='details.php?pro_id=$pro_id' class='btn w-100 mb-2' style='  background-color:#e42c5a; color: white;'>

    <i class='fa fa-shopping-cart' ></i> Add To Cart

    </a>

    </p>
    
    </div>
    
    $product_label
    
    
    </div>
    
    </div>
    
    ";
    
    }
    /// getProducts function Code Ends ///
    
    
    
    
}
    
    

    





    
    /// getPaginator Function Starts ///
    
    function getPaginator(){
    
    /// getPaginator Function Code Starts ///
    
    $per_page = 6;
    
    global $db;
    
    $aWhere = array();
    
    $aPath = '';
    
    /// Manufacturers Code Starts ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
    
    foreach($_REQUEST['man'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'manufacturer_id='.(int)$sVal;
    
    $aPath .= 'man[]='.(int)$sVal.'&';
    
    }
    
    }
    
    }
    
    /// Manufacturers Code Ends ///
    
    /// Products Categories Code Starts ///
    
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
    
    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'p_cat_id='.(int)$sVal;
    
    $aPath .= 'p_cat[]='.(int)$sVal.'&';
    
    }
    
    }
    
    }
    
    /// Products Categories Code Ends ///
    
    /// Categories Code Starts ///
    
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    
    foreach($_REQUEST['cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'cat_id='.(int)$sVal;
    
    $aPath .= 'cat[]='.(int)$sVal.'&';
    
    }
    
    }
    
    }
    
    /// Categories Code Ends ///
   
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    
    $query = "select * from products ".$sWhere;
    
    $result = mysqli_query($db,$query);
    
    $total_records = mysqli_num_rows($result); 
    $total_pages = ceil($total_records / $per_page);
    
    echo "<li ><a href='shop.php?page=1 ";

        if(!empty($aPath)){ echo "&".$aPath; }
    
    echo "'  style='color: #e42c5a;' >".'First Page'."</a></li>";
    
    for ($i=1; $i<=$total_pages; $i++){
    
    echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'  class='mx-1 p-2'  style='color: white; background:#e42c5a;' >".$i."</a></li>";
    
    };
    
    echo "<li><a href='shop.php?page=$total_pages";
    
    if(!empty($aPath)){ echo "&".$aPath; }
    
    echo "'  style='color: #e42c5a;' >".'Last Page'."</a></li>";
    
    /// getPaginator Function Code Ends ///

   
    
    
    }

    /// getPaginator Function Ends ///
    
?>



