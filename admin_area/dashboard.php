
<h1 class="page-header text-center">Dashboard</h1>

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard

</li>

</ol><!-- breadcrumb Ends -->


<div class="row mb-5"><!-- 2 row Starts -->

<div class="col-md-3 col-sm-6 "><!-- col-lg-3 col-md-6 Starts -->
<div class="panel bg-primary ">
    <div class="panel-heading  bg-primary h-75 d-flex">
       
    <i class="fa fa-tasks fa-5x text-white p-3 mr-auto"> </i>

            <div class="d-block p-3 text-white text-bold text-right">
            <h3 class="pr-4 "><?php echo $count_products; ?>  </h3>

            <h5 class="">Products</h5>
            </div>


    </div><!--panel-heading  -->
    <a href="index.php?view_products">
    <div class="panel-footer d-flex bg-white">
    <span class="text-primary mr-5 pl-2 p-4  "> View Details </span>
 
    <span class="text-right"><i class="fa fa-arrow-circle-right text-primary "></i> </span>
</a>


    </div><!-- panel-footer -->
    
</div><!-- panel -->
</div><!-- col-lg-3 col-md-6 Ends -->








<div class="col-md-3 col-sm-6 "><!-- col-lg-3 col-md-6 Starts -->
<div class="panel panel1 bg-success">
    <div class="panel-heading  bg-success h-75 d-flex">
       
    <i class="fa fa-comments fa-5x text-white p-3 mr-auto"> </i>

            <div class="d-block p-3 text-white text-bold text-right">
            <h3 class="pr-5 "> <?php echo $count_customers; ?> </h3>

            <h5 class="">Customers</h5>
            </div>


    </div><!--panel-heading  -->
    <a href="index.php?view_products">
    <div class="panel-footer d-flex bg-white">
    <span class="text-success mr-5 pl-2 p-4 "> View Details </span>
 
    <span class="text-right"><i class="fa fa-arrow-circle-right text-success "></i> </span>
</a>


    </div><!-- panel-footer -->
    

</div><!-- panel -->
</div><!-- col-lg-3 col-md-6 Ends -->




<div class="col-md-3 col-sm-6 "><!-- col-lg-3 col-md-6 Starts -->
<div class="panel panel1 bg-warning">
    <div class="panel-heading  bg-warning h-75 d-flex">
       
    <i class="fa fa-shopping-cart fa-5x text-white p-3 mr-auto"> </i>

            <div class="d-block p-3 text-white text-bold text-right">
            <h3 class="pr-5 "> <?php echo $count_p_categories; ?> </h3>

            <h5 class=" ">Products Categories</h5>
            </div>


    </div><!--panel-heading  -->
    <a href="index.php?view_products">
    <div class="panel-footer d-flex bg-white">
    <span class="text-warning mr-5 pl-2 p-4 "> View Details </span>
 
    <span class="text-right"><i class="fa fa-arrow-circle-right text-warning "></i> </span>
</a>


    </div><!-- panel-footer -->
    

</div><!-- panel -->
</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-md-3 col-sm-6 "><!-- col-lg-3 col-md-6 Starts -->
<div class="panel panel1 bg-danger ">
    <div class="panel-heading  bg-danger h-75 d-flex">
       
    <i class=" fas fa-superpowers fa-5x text-white p-3 mr-auto"> </i>

            <div class="d-block p-3 text-white text-bold text-right">
            <h3 class="pr-4  "><?php echo $count_p_categories; ?> </h3>

            <h5 class="">Orders</h5>
            </div>


    </div><!--panel-heading  -->
    <a href="index.php?view_products">
    <div class="panel-footer d-flex  bg-white">
    <span class=" text-danger mr-5 pl-2 p-4 "> View Details </span>
 
    <span class="text-right"><i class="fa fa-arrow-circle-right text-danger "></i> </span>
</a>


    </div><!-- panel-footer -->
    

</div><!-- panel -->
</div><!-- col-lg-3 col-md-6 Ends -->

</div><!-- 2 row Ends -->


<div class="container">
<div class="row" ><!-- 3 row Starts -->

<div class="col-md-8" ><!-- col-lg-8 Starts -->

<div class="panel panel1  " ><!-- panel  Starts -->


<div class="panel-heading  bg-primary" ><!-- panel-heading Starts -->

<h3 class=" text-white" >

<i class="fa fa-money fa-fw" ></i> New Orders

</h3>

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<table class="table table-bordered  table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>Order No:</th>
<th>Customer Email:</th>
<th>Invoice No:</th>
<th>Product ID:</th>
<th>Product Qty:</th>
<th>Product Size:</th>
<th>Status:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
$run_order = mysqli_query($con,$get_order);

while($row_order=mysqli_fetch_array($run_order)){


$order_id = $row_order['order_id'];

$c_id = $row_order['customer_id'];

$invoice_no = $row_order['invoice_no'];

$product_id = $row_order['product_id'];

$qty = $row_order['qty'];

$size = $row_order['size'];

$order_status = $row_order['order_status'];


$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td>
<?php

$get_customer = "select * from customers where customer_id='$c_id'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_email = $row_customer['customer_email'];
echo $customer_email;
?>

</td>

<td><?php echo $invoice_no; ?></td>
<td><?php echo $product_id; ?></td>
<td><?php echo $qty; ?></td>
<td><?php echo $size; ?></td>
<td>
<?php
if($order_status=='pending'){

echo $order_status='pending';

}
else {

echo $order_status='Complete';

}

?>
</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->


</table><!-- table  table-striped Ends -->


<div class="text-right" ><!-- text-right Starts -->

<a href="index.php?view_orders" >

View All Orders <i class="fa fa-arrow-circle-right" ></i>

</a>

</div><!-- text-right Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-primary Ends -->

</div><!-- col-md-8 Ends -->



<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel info h-75"><!-- panel Starts -->

<div class="panel-heading text-center h-50 w-100  ">

<img src="admin_images/<?php echo $admin_image; ?>" class="w-100 h-100  img-fluid">
 </div>

<div class="panel-body   h-50 " style="color: rgb(158, 21, 55);">
<h3 class="text-center"> <?php echo $admin_name; ?> </h3>

<h5 class="text-center"> <?php echo $admin_job; ?> </h5>
<i class="fa fa-user"></i> <span>Email: </span> <?php echo $admin_email; ?>  <br>
<i class="fa fa-user"></i> <span>Country: </span> <?php echo $admin_country; ?>   <br>
<i class="fa fa-user"></i> <span>Contact: </span> <?php echo $admin_contact; ?>   <br>


<hr class="dotted short">

<h5 class="">About</h5>

<p class="">
<?php echo $admin_about; ?>
</p>

</div><!--panel-body  -->


</div><!-- panel Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 3 row Ends -->
</div>
