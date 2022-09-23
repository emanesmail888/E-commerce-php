<?php

include("functions/function.php");

global $db;
$db = mysqli_connect("localhost","root","","ecommerce");

?>
       
       <div class="posts-curousel">
 
        <?php
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
  <div class='posts-carusel-item'>
  <div class='post-thumbnail'>  
  <a href='#' >
  
  <img src='admin_area/product_images/$pro_img1' class='img-fluid w-25'  style='height:280px;' />
  
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
?>

  

    




  
  </div>


  <script>
 $('.posts-curousel').slick({
  rows: 2,
  dots: true,
  arrows: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3
});
</script>

  <!-- <script>
$(".owl-carousel").owlCarousel({
	nav: true,
  dots: true,
  loop: true,
  rewind: true,
  rows:2,
  // autoWidth: true,
  stagePadding: 0,
  margin: 4,
  checkVisibility: true,
  navElement: 'div',
  responsive : {
    0 : {
      items: 1,
      slideBy: 1
    },
    768 : {
      items: 2,
      slideBy: 2
    },
    1024 : {
      items: 3,
      slideBy: 3
    },
    1280 : {
      items: 4,
      slideBy: 4
    },
    1440 : {
      items: 5,
      slideBy: 1
    }
  }
});
  </script> -->


  <!-- <script>
    
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
   autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  </script> -->



<!-- <script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dot:true,
    rewind: true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        300:{
            items:2
        },
        800:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
});
</script> -->


 <script>
    $('.slick1').slick({

		rows: 2,
     autoplay: true,

responsive: [{

    breakpoint: 1024,
      settings: {
        slidesPerRow:3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],








  dots: true,
		arrows: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3

});
</script> 



 <script>
  $(document).ready(function() {
  var el = $('.owl-carousel');
  
  var carousel;
  var carouselOptions = {
    margin: 20,
    nav: true,
    dots: true,
    slideBy: 'page',
    responsive: {
      0: {
        items: 1,
        rows: 2 //custom option not used by Owl Carousel, but used by the algorithm below
      },
      768: {
        items: 2,
        rows: 3 //custom option not used by Owl Carousel, but used by the algorithm below
      },
      991: {
        items: 3,
        rows: 2 //custom option not used by Owl Carousel, but used by the algorithm below
      }
    }
  };

  //Taken from Owl Carousel so we calculate width the same way
  var viewport = function() {
    var width;
    if (carouselOptions.responsiveBaseElement && carouselOptions.responsiveBaseElement !== window) {
      width = $(carouselOptions.responsiveBaseElement).width();
    } else if (window.innerWidth) {
      width = window.innerWidth;
    } else if (document.documentElement && document.documentElement.clientWidth) {
      width = document.documentElement.clientWidth;
    } else {
      console.warn('Can not detect viewport width.');
    }
    return width;
  };

  var severalRows = false;
  var orderedBreakpoints = [];
  for (var breakpoint in carouselOptions.responsive) {
    if (carouselOptions.responsive[breakpoint].rows > 1) {
      severalRows = true;
    }
    orderedBreakpoints.push(parseInt(breakpoint));
  }
  
  //Custom logic is active if carousel is set up to have more than one row for some given window width
  if (severalRows) {
    orderedBreakpoints.sort(function (a, b) {
      return b - a;
    });
    var slides = el.find('[slide]');
    var slidesNb = slides.length;
    if (slidesNb > 0) {
      var rowsNb;
      var previousRowsNb = undefined;
      var colsNb;
      var previousColsNb = undefined;

      //Calculates number of rows and cols based on current window width
      var updateRowsColsNb = function () {
        var width =  viewport();
        for (var i = 0; i < orderedBreakpoints.length; i++) {
          var breakpoint = orderedBreakpoints[i];
          if (width >= breakpoint || i == (orderedBreakpoints.length - 1)) {
            var breakpointSettings = carouselOptions.responsive['' + breakpoint];
            rowsNb = breakpointSettings.rows;
            colsNb = breakpointSettings.items;
            break;
          }
        }
      };

      var updateCarousel = function () {
        updateRowsColsNb();

        //Carousel is recalculated if and only if a change in number of columns/rows is requested
        if (rowsNb != previousRowsNb || colsNb != previousColsNb) {
          var reInit = false;
          if (carousel) {
            //Destroy existing carousel if any, and set html markup back to its initial state
            carousel.trigger('destroy.owl.carousel');
            carousel = undefined;
            slides = el.find('[slide]').detach().appendTo(el);
            el.find('.fake-col-wrapper').remove();
            reInit = true;
          }


          //This is the only real 'smart' part of the algorithm

          //First calculate the number of needed columns for the whole carousel
          var perPage = rowsNb * colsNb;
          var pageIndex = Math.floor(slidesNb / perPage);
          var fakeColsNb = pageIndex * colsNb + (slidesNb >= (pageIndex * perPage + colsNb) ? colsNb : (slidesNb % colsNb));

          //Then populate with needed html markup
          var count = 0;
          for (var i = 0; i < fakeColsNb; i++) {
            //For each column, create a new wrapper div
            var fakeCol = $('<div class="fake-col-wrapper"></div>').appendTo(el);
            for (var j = 0; j < rowsNb; j++) {
              //For each row in said column, calculate which slide should be present
              var index = Math.floor(count / perPage) * perPage + (i % colsNb) + j * colsNb;
              if (index < slidesNb) {
                //If said slide exists, move it under wrapper div
                slides.filter('[data-slide-index=' + index + ']').detach().appendTo(fakeCol);
              }
              count++;
            }
          }
          //end of 'smart' part

          previousRowsNb = rowsNb;
          previousColsNb = colsNb;

          if (reInit) {
            //re-init carousel with new markup
            carousel = el.owlCarousel(carouselOptions);
          }
        }
      };

      //Trigger possible update when window size changes
      $(window).on('resize', updateCarousel);

      //We need to execute the algorithm once before first init in any case
      updateCarousel();
    }
  }

  //init
  carousel = el.owlCarousel(carouselOptions);
});
</script>












              