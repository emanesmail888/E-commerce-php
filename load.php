<?php

session_start();

include("include/db.php");

include("functions/function.php");







if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
  $get_products = "SELECT * FROM products WHERE product_price BETWEEN '".$_GET["start"]."' AND '".$_GET["end"]."' ORDER BY product_price ASC ";
    



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


else {


    
switch($_REQUEST['sAction']){

    default :
    
    getProducts();
    
    break;
    
    case'getPaginator';
    
    getPaginator();
    
    break;
    
    }
}
?>

  


