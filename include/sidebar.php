<?php
$aMan  = array();

$aPCat = array();

$aCat  = array();



/// Manufacturers Code Starts ///

// if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {

//     foreach ($_REQUEST['man'] as $sKey => $sVal) {

//         if ((int)$sVal != 0) {

//             $aMan[(int)$sVal] = (int)$sVal;
//         }
//     }
// }

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

// if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

//     foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

//         if ((int)$sVal != 0) {

//             $aPCat[(int)$sVal] = (int)$sVal;
//         }
//     }
// }

/// Products Categories Code Ends ///

/// Categories Code Starts ///

// if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {

//     foreach ($_REQUEST['cat'] as $sKey => $sVal) {

//         if ((int)$sVal != 0) {

//             $aCat[(int)$sVal] = (int)$sVal;
//         }
//     }
// }

/// Categories Code Ends ///


?>





<div class="left-sidebar">


    <div class="panel-group category-products" id="accordian">


        <h2 class="bg-info">Products Categories</h2>

        <div class="panel panel-default mb-3">
            <div class="panel-heading">
                <h5 class="panel-title ">
                    Products Categories

                    <a data-toggle="collapse" data-parent="#accordian" href="#pCats">

                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>

                    </a>

                </h5>
            </div>
            <div id="pCats" class="panel-collapse  collapse show">
                <div class="panel-body">
                    <ul>
                        <?php

                        $get_p_cats = "select * from product_categories ";

                        $run_p_cats = mysqli_query($db, $get_p_cats);

                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                            $p_cat_id = $row_p_cats['p_cat_id'];

                            $p_cat_title = $row_p_cats['p_cat_title'];

                            $p_cat_image = $row_p_cats['p_cat_image'];

                            if ($p_cat_image == "") {
                            } else {

                                $p_cat_image = "<img src='admin_area/categories_images/$p_cat_image' width='30px' height='30'> &nbsp;";
                            }

                            echo "

<li class='checkbox checkbox-primary' style='background:#dddddd;' >

<a>

<label>

<input ";

                            if (isset($aPCat[$p_cat_id])) {
                                echo "checked='checked'";
                            }

                            echo " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >

<span>

$p_cat_image
$p_cat_title

</span>

</label>

</a>

</li>

";
                        }

                        ?>
                    </ul>
                </div> <!-- panel-body -->
            </div> <!-- panel-collapse -->

        </div><!-- panel -->



        <h2 class="bg-info">Categories</h2>

        <div class="panel panel-default mb-3">

            <div class="panel-heading">
                <h5 class="panel-title ">
                    Categories

                    <a data-toggle="collapse" data-parent="#accordian" href="#cats">

                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>

                    </a>

                </h5>
            </div>
            <div id="cats" class="panel-collapse collapse show">
                <div class="panel-body">
                    <ul>
                        <?php

                        $get_cat = "select * from categories ";

                        $run_cat = mysqli_query($con, $get_cat);

                        while ($row_cat = mysqli_fetch_array($run_cat)) {

                            $cat_id = $row_cat['cat_id'];

                            $cat_title = $row_cat['cat_title'];

                            $cat_image = $row_cat['cat_image'];

                            if ($cat_image == "") {
                            } else {

                                $cat_image = "<img src='admin_area/categories_images/$cat_image' width='30' height='30'>&nbsp;";
                            }

                            echo "

                            <li class='checkbox checkbox-primary' style='background:#dddddd;'>

                            <a>

                            <label>

                            <input ";

                            if (isset($aCat[$cat_id])) {
                                echo "checked='checked'";
                            }

                            echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 

<span>
$cat_image
$cat_title
</span>

</label>

</a>

</li>

";
                        }



                        ?>
                    </ul>
                </div> <!-- panel-body -->
            </div> <!-- panel-collapse -->

        </div><!-- panel -->


        <h2 class="bg-info">ManuFacturers</h2>

        <div class="panel panel-default">

            <div class="panel-heading">
                <h5 class="panel-title ">
                    Manufacturers

                    <a data-toggle="collapse" data-parent="#accordian" href="#manufactuer">

                        <span class="badge pull-right"><i class="fa fa-plus "></i></span>

                    </a>

                </h5>
            </div>
            <div id="manufactuer" class="panel-collapse collapse show">
                <div class="panel-body">
                    <ul>

                        <?php

                        $get_manfacturer = "select * from manufacturers ";

                        $run_manfacturer = mysqli_query($con, $get_manfacturer);

                        while ($row_manfacturer = mysqli_fetch_array($run_manfacturer)) {

                            $manufacturer_id = $row_manfacturer['manufacturer_id'];

                            $manufacturer_title = $row_manfacturer['manufacturer_title'];

                            $manufacturer_image = $row_manfacturer['manufacturer_image'];

                            if ($manufacturer_image == "") {
                            } else {

                                $manufacturer_image = "

                                        <img src='admin_area/categories_images/$manufacturer_image' width='30px' height='30' >&nbsp;

                                        ";
                            }

                            echo "

                                        <li style='background:#dddddd;' class='checkbox checkbox-primary'>

                                        <a>

                                        <label>

                                        <input ";

                            if (isset($aMan[$manufacturer_id])) {
                                echo "checked='checked'";
                            }

                            echo " type='checkbox' value='$manufacturer_id' name='man' class='get_manufacturer'>

<span>
$manufacturer_image
$manufacturer_title
</span>

</label>

</a>

</li>

";
                        }




                        ?>

                    </ul>
                </div> <!-- panel-body -->
            </div> <!-- panel-collapse -->

        </div><!-- panel -->


    </div><!-- panel-group -->



    
    





    



</div> <!-- left- sidebar -->






<div class="price-range mt-5">
                                   <h2>Price Range</h2>
                                    <div id="slider-range"></div>
                                    <br>
                                    <div class="d-flex">
                                    <b class="pr-5 d-flex">
                                        <input size="2" type="text" id="amount_start" name="start_price"
                                               value="100" style="border:0px; font-weight: bold; color:green" readonly="readonly" />$</b>

                                    <b class="d-flex pl-5" >
                                        <input size="2" type="text" id="amount_end" name="end_price" value="6000"
                                               style="border:0px; font-weight: bold; color:green" readonly="readonly"/>$</b>
                                    </div>
                        </div><!-- price-range -->




   







<script>



$(function () {
        $("#slider-range").slider({
            range: true,
            responsive:true,
            connect: true,

            min: 100,
            max: 6000,
            values: [100, 6000],

            slide: function (event, ui) {

                $("#amount_start").val(ui.values[ 0 ]);
                $("#amount_end").val(ui.values[ 1 ]);
                var start = $('#amount_start').val();
                var end = $('#amount_end').val();



                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url:"load.php",
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        console.log(response);

                         $('#Products').html(response);




                    },//success
                });


                   }


        });
        });
        </script> 
       