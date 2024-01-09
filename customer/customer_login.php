<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->


<h1 class="text-center">Login</h1>

<p class="lead text-center" >Already our Customer</p>



<p class="text-muted text-center" >
If you already our customer please login here and if you not you can register ,we are hoping to be our dear customer.
</p>




</div><!-- box-header Ends -->

<form action="checkout.php" method="post" >

<div class="form-group d-flex w-100" >

<label class="w-25">Email</label>

<input type="text" class="form-control " name="c_email" required >

</div><!-- form-group Ends -->


<div class="form-group d-flex w-100" >

<label class="w-25 ">Password</label>

<input type="password" class="form-control" name="c_pass" required >

</div><!-- form-group Ends -->



<div class="text-center" >
<h4 >

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

<button name="login" value="Login" class="btn btn-secondary" >

<i class="fa fa-sign-in" ></i> Log in

</button>


</div><!-- text-center Ends -->


</form><!--form Ends -->


<a href="customer_register.php"  class="text-center">

<h3>New ? Register Here</h3>

</a>




</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 


}

?>