<div id="footer" style="background-color:#5542;">
    <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-6">
            <h4>pages</h4>
<ul>
<li><a href="cart.php">Shopping Cart</a></li>

<li><a href="contact.php">Contact Us</a></li>

<li><a href="shop.php">Shop</a></li>

<li>

<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >My Account</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>

</li>
    
</ul>  
<h4>User Section</h4> 
<ul>

<li>

<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >Login</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>

</li>

<li><a href="customer_register.php">Register</a></li>

<li><a href="terms.php">Terms And Conditions </a></li>




</ul>        
<hr class="hidden-md hidden-lg hidden-sm"> 




</div> <!-- col-md-3 -->   


<div class="col-md-3 col-sm-6">
            <h4>categories</h4>
<ul>
<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while($row_p_cats = mysqli_fetch_array($run_p_cats)){

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<li> <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";

}

?>
    
</ul>  
    
<hr class="hidden-md hidden-lg hidden-sm"> 




</div> <!-- col-md-3 -->   



<div class="col-md-3 col-sm-6">
    <h4> Where To Find Us</h4>
    <p>
        <strong>Computer Fast</strong>
        <br>cairo
        <br>Egypt
        <br>010034562177
        <br>negma.oula@yahoo.com
        <br><strong>Eman Esmail</strong>
    </p>
    <a href="contact.php">Go To Contact Us Page</a>
    <hr class="hidden-md hidden-lg hidden-sm"> 



</div><!-- col-md-3 -->




<div class="col-md-3 col-sm-6">
    <h4>Get The News</h4>
    <p class="text-muted">subscribe your Email.</p>

    <form class="mb-4" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/emailVerifySubmit?feedId=6861', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Starts -->

<div class="input-group  ">
<input type="text" class="form-control " style="border:1px solid #5555;" name="email">

<input type="hidden" value="computer" name="uri"/>
<input type="hidden" name="loc" value="en_US"/>

<span class="input-group-btn">

<input type="submit" value="subscribe" class="btn d-block  btn-secondary">

</span>

</div>

</form>


                 <ul class=" social justify-content-around ">
                                    <li><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter "></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
             </ul>

</div><!-- col-md -3 -->

        </div><!-- row -->
    </div><!-- container -->
</div><!-- footer -->