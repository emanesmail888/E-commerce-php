<?php
include("nav.php");
?>

  <div id="content">
    <div class="container">

      <div class="col-md-12">
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>

          <li>Contact Us</li>

        </ul><!-- breadcrumb Ends -->



      </div>
      <!--- col-md-12 Ends -->


      <div class="row">

        


        <div class="col-md-12">

          <div class="box">

            <div class="box-header">


              <?php

              $get_contact_us = "select * from contact_us";

              $run_conatct_us = mysqli_query($con, $get_contact_us);

              $row_conatct_us = mysqli_fetch_array($run_conatct_us);

              $contact_heading = $row_conatct_us['contact_heading'];

              $contact_desc = $row_conatct_us['contact_desc'];

              $contact_email = $row_conatct_us['contact_email'];

              ?>
              <h2 class="text-center"> <?php echo $contact_heading; ?> </h2>

              <p class="text-muted  text-center">
                <?php echo $contact_desc; ?>
              </p>
            </div><!-- box-header Ends -->

            <form action="contact.php" method="post">

              <div class="form-group d-flex w-100">
                <label class="w-25 ml-1">Name</label>

                <input type="text" class="form-control w-75 mr-1" name="name" required>

              </div><!-- form-group Ends -->


              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1">Email</label>

                <input type="text" class="form-control w-75 mr-1" name="email" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">
                <label class="w-25 ml-1"> Subject </label>

                <input type="text" class="form-control w-75 mr-1" name="subject" required>

              </div><!-- form-group Ends -->


              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Message </label>

                <textarea class="form-control w-75 mr-1" name="message"> </textarea>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Select Enquiry Type </label>


                <select name="enquiry_type" class="form-control w-75 mr-1">

                  <option> Select Enquiry Type </option>

                  <?php

                  $get_enquiry_types = "select * from enquiry_types";

                  $run_enquiry_types = mysqli_query($con, $get_enquiry_types);

                  while ($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)) {

                    $enquiry_title = $row_enquiry_types['enquiry_title'];

                    echo "<option> $enquiry_title </option>";
                  }

                  ?>

                </select><!-- select Ends -->

              </div><!-- form-group Ends -->



    

                <button type="submit" name="submit" class="btn btn-secondary d-block mx-auto text-white">

                  <i class="fa fa-user-md"></i> Send Message

                </button>


            </form><!-- form Ends -->

            <?php

            if (isset($_POST['submit'])) {

              // Admin receives email through this code

              $sender_name = $_POST['name'];


              $sender_email = $_POST['email'];

              $sender_subject = $_POST['subject'];

              $sender_message = $_POST['message'];
              $enquiry_type = $_POST['enquiry_type'];

              $new_message = "
  
  <h1> This Message Has Been Sent By $sender_name </h1>
  
  <p> <b> Sender Email :  </b> <br> $sender_email </p>
  
  <p> <b> Sender Subject :  </b> <br> $sender_subject </p>
  
  <p> <b> Sender Enquiry Type :  </b> <br> $enquiry_type </p>
  
  <p> <b> Sender Message :  </b> <br> $sender_message </p>
  
  ";

              $headers = "From: $sender_email \r\n";

              $headers .= "Content-type: text/html\r\n";

              mail($contact_email, $sender_subject, $new_message, $headers);


              // mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

              // Send email to sender through this code

              $email = $_POST['email'];

              $subject = "Welcome to my website";

              $msg = "I shall get you soon, thanks for sending us email";

              $from = "negma.oula@yahoo.com";

              mail($email, $subject, $msg, $from);

              echo "<h2 align='center'>Your message has been sent successfully</h2>";
            }


            ?>

          </div><!-- box Ends -->

        </div><!-- col-md-9 Ends -->

      </div><!-- row -->

    </div><!-- container Ends -->
  </div><!-- content Ends -->



  <?php

  include("include/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>