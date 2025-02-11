<!DOCTYPE html>
<html lang="en">


    <head>
        <title>Welcome to Mobile Corner - The Perfect Experience</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="big-deal">
        <meta name="keywords" content="big-deal">
        <meta name="author" content="big-deal">


        <?php
        $this->load->view('headerlink');
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    </head>
    <body class="bg-light ">

        <!-- loader start -->
        <div class="loader-wrapper">
            <div>
                <img src="<?php echo base_url(); ?>assets/images/loader.gif" alt="loading">
            </div>
        </div>
        <!-- loader end -->
        <style>
/*            .input-group {
                display: flex;
            }

            .input-group-prepend {
                display: flex;
                width: 58px;
                border: 1px solid #ddd;
            }

            #search {
                width: calc(100% - 58px);
                height: 58px;
                border: 1px solid #ddd !important;
                margin-top: 0.05px;
                border-top: 0.1px solid #ddd !important;
            }

            .big-deal-form {
                border: 0 !important;
            }*/

           
            body {
                margin: 0;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
            }

             body {
                font-family: PT Sans, sans-serif;
                font-size: 14px;
                background-color: #fff;
                color: #777;
            }

            .input-group {
                display: flex;
                flex-wrap: nowrap;
            }

            input#search {
                height: 100%;
                border-top: 0;
                margin-top: -1px;
            }

            input#email {
                padding: 10px;
            }

            a:hover{
                text-decoration: none;
            }

            span.input-group-text {
                padding: 12px;
                font-size: 18px;
            }

            input#email {
                padding: 12px 15px;
                font-size: 16px;
                display: block;
                height: 100%;
            }
            
            .app-link, .cart-block a {
                align-items: center;
            }

            .app-link ul {
                margin: 0;
            }

            .top-header-left {
                height: 100%;
            }

            .language-block ul {
                margin-bottom: 0;
            }

            .cart-item h5{
                font-family: PT Sans, sans-serif;
                font-weight: 600;
                margin: 0;
                line-height: 1.3;
                font-size: 16px;
            }
            
        </style>

        <!--header start-->
        <?php
        $this->load->view('header');
        ?>
        <!--header end-->

        <!--top brand panel start-->

        <!--top brand panel end-->

        <!--slider start-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $c = 0;
                $banner = $this->md->my_select('tbl_banner');
                foreach ($banner as $data) {
                    $c++;
                    ?>
                    <li style="margin:5px;" data-target="#myCarousel" data-slide-to="<?php echo $c; ?>" class="<?php if ($c == 1) {
                    echo"active";
                } ?>"></li>
                    <?php
                }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $c = 0;
                $banner = $this->md->my_select('tbl_banner');
                foreach ($banner as $data) {
                    $c++;
                    ?>
                    <div class="item <?php if ($c == 1) {
                    echo"active";
                } ?>">
                        <img src="<?php echo base_url() . $data->path; ?>" style="height:550px; width:100%;">
                        <div class="carousel-caption">

                            <h2><?php echo $data->title ?></h2>
                            <p><?php echo $data->subtitle ?></p>
                        </div>
                    </div>


                    <?php
                }
                ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--slider end-->

        <!--collection banner start-->
        
        <!--collection banner end-->

        <!--discount banner start-->
        
        <!--discount banner end-->

        <!--tab product-->
        <section class="section-pt-space" >
            <div class="tab-product-main">
                <div class="tab-prodcut-contain">

                    <ul class="tabs tab-title" style="cursor:pointer; text-transform: uppercase;padding: 20px 0px;">
                        <h2 style="padding-top:10px; color: #00baf2;">Recently Arrival Product</h2>
                        <li <a onclick="openCity('tab-1')">Android</a></li>
                        <li <a onclick="openCity('tab-2')">iphone</a></li>
                        <li <a onclick="openCity('tab-3')">feature phone</a></li>
                        <li <a onclick="openCity('tab-4')">refurbished mobile phone</a></li>

                    </ul>
                </div>
            </div>
        </section>
        <!--tab product-->

        <!-- slider tab  -->
        <section class="section-py-space ratio_square product">
            <div class="custom-container">
                <div class="row">
                    <div class="col pr-0">
                        <div class="theme-tab product mb--5">
                            <div class="tab-content-cls ">

                                <div id="tab-1"class="ci">

                                    <div>
                                        <!--class="product-slide-6 product-m no-a"-->

                                        <?php
                                        $android = $this->md->my_query("SELECT p.* FROM `tbl_product` AS p ,`tbl_category` as c WHERE p. `sub_id`= c. `category_id` AND c. `category_id` = '2' AND p.status=1 ORDER BY p.`product_id` DESC LIMIT 0,4;");
                                        foreach ($android as $data) {
                                            $wh['product_id'] = $data->product_id;
                                            $record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
                                            ?>
                                            <div class="col-md-3 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <?php
                                                            $multipath = $record->path;
                                                            $path = explode(",", $multipath);
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>

                                                            <?php
                                                            if ($data->offer_id != 0) {
                                                                $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                                ?>
                                                                <div class="new-label1" style="text-align: center;">
                                                                    <div><?php echo "$rate % OFF"; ?></div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <ul class="">
                                                                        <?php
                                                                        $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                                                        $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                                                        if ($totalrate == "") {
                                                                            $avg = 0;
                                                                        } else {
                                                                            $avg = round($totalrate / $totalrecord);
                                                                        }

                                                                        for ($i = 1; $i <= $avg; $i++) {
                                                                            ?>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php
                                                                        }

                                                                        $blank = 5 - $avg;

                                                                        for ($i = 1; $i <= $blank; $i++) {
                                                                            ?>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </ul>
                                                                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>-->
                                                                    <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                        <h6 class="price-title" style="min-height: 40px;">
                                                                        <?php
                                                                        echo $data->name;
                                                                        ?>
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                            <?php
                                                                            $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                                            $oprice = $record->price;
                                                                            $price = floor($oprice + (($oprice * $com) / 100));
                                                                            ?>
    <?php
    if ($data->offer_id != 0) {
        $offer_price = floor($price - (($price * $rate) / 100));
        ?>
                                                                        <div class="check-price">
                                                                            Rs. <?php echo $price; ?> /-
                                                                        </div>
                                                                        <div class="price">                                                                                
                                                                            <div class="price">
                                                                                Rs. <?php echo $offer_price; ?> /-
                                                                            </div>
                                                                        </div>
        <?php
    } else {
        ?>
                                                                        <div class="price">

                                                                            <div class="price">
                                                                                Rs. <?php echo $price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="icon-detail">
                                                                                                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                                                            </button>
                                                                                                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                                                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="compare.html" title="Compare">
                                                                                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <?php
}
?>

                                    </div>

                                </div>
                                <div id="tab-2"class="ci" style=" display: none;">
                                    <div>

                                        <?php
                                        $iphone = $this->md->my_query("SELECT p.* FROM `tbl_product` AS p ,`tbl_category` as c WHERE p. `sub_id`= c. `category_id` AND c. `category_id` = '3' AND p.status=1 ORDER BY p.`product_id` DESC LIMIT 0,4;");
                                        foreach ($iphone as $data) {
                                            $wh['product_id'] = $data->product_id;
                                            $record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
                                            ?>
                                            <div class="col-md-3 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                            <?php
                                            $multipath = $record->path;
                                            $path = explode(",", $multipath);
                                            ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>

                                                            <?php
                                                            if ($data->offer_id != 0) {
                                                                $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                                ?>
                                                                <div class="new-label1" style="text-align: center;">
                                                                    <div><?php echo "$rate % OFF"; ?></div>
                                                                </div>
        <?php
    }
    ?>

                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <ul class="">
                                                            <?php
                                                            $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                                            $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                                            if ($totalrate == "") {
                                                                $avg = 0;
                                                            } else {
                                                                $avg = round($totalrate / $totalrecord);
                                                            }

                                                            for ($i = 1; $i <= $avg; $i++) {
                                                                ?>
                                                                            <i class="fa fa-star"></i>
                                                                            <?php
                                                                        }

                                                                        $blank = 5 - $avg;

                                                                        for ($i = 1; $i <= $blank; $i++) {
                                                                            ?>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </ul>
                                                                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>-->
                                                                    <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                        <h6 class="price-title" style="min-height: 40px;">
                                                                        <?php
                                                                        echo $data->name;
                                                                        ?>
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                        <?php
                                                                        $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                                        $oprice = $record->price;
                                                                        $price = floor($oprice + (($oprice * $com) / 100));
                                                                        ?>
                                                                        <?php
                                                                        if ($data->offer_id != 0) {
                                                                            $offer_price = floor($price - (($price * $rate) / 100));
                                                                            ?>
                                                                        <div class="check-price">
                                                                            Rs. <?php echo $price; ?> /-
                                                                        </div>
                                                                        <div class="price">                                                                                
                                                                            <div class="price">
                                                                                Rs. <?php echo $offer_price; ?> /-
                                                                            </div>
                                                                        </div>
        <?php
    } else {
        ?>
                                                                        <div class="price">

                                                                            <div class="price">
                                                                                Rs. <?php echo $price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="icon-detail">
                                                                                                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                                                            </button>
                                                                                                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                                                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="compare.html" title="Compare">
                                                                                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <?php
}
?>

                                    </div>

                                </div>
                                <div id="tab-3"class="ci" style=" display: none;">
                                    <div>
<?php
$feature_phone = $this->md->my_query("SELECT p.* FROM `tbl_product` AS p ,`tbl_category` as c WHERE p. `sub_id`= c. `category_id` AND c. `category_id` = '4' AND p.status=1 ORDER BY p.`product_id` DESC LIMIT 0,4;");
foreach ($feature_phone as $data) {
    $wh['product_id'] = $data->product_id;
    $record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
    ?>
                                            <div class="col-md-3 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
    <?php
    $multipath = $record->path;
    $path = explode(",", $multipath);
    ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>

                                            <?php
                                            if ($data->offer_id != 0) {
                                                $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                ?>
                                                                <div class="new-label1" style="text-align: center;">
                                                                    <div><?php echo "$rate % OFF"; ?></div>
                                                                </div>
        <?php
    }
    ?>

                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <ul class="">
    <?php
    $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
    $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

    if ($totalrate == "") {
        $avg = 0;
    } else {
        $avg = round($totalrate / $totalrecord);
    }

    for ($i = 1; $i <= $avg; $i++) {
        ?>
                                                                            <i class="fa fa-star"></i>
        <?php
    }

    $blank = 5 - $avg;

    for ($i = 1; $i <= $blank; $i++) {
        ?>
                                                                            <i class="fa fa-star-o"></i>
        <?php
    }
    ?>

                                                                    </ul>
                                                                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>-->
                                                                    <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                        <h6 class="price-title" style="min-height: 40px;">
                                                                        <?php
                                                                        echo $data->name;
                                                                        ?>
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                        <?php
                                                                        $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                                        $oprice = $record->price;
                                                                        $price = floor($oprice + (($oprice * $com) / 100));
                                                                        ?>
                                                                        <?php
                                                                        if ($data->offer_id != 0) {
                                                                            $offer_price = floor($price - (($price * $rate) / 100));
                                                                            ?>
                                                                        <div class="check-price">
                                                                            Rs. <?php echo $price; ?> /-
                                                                        </div>
                                                                        <div class="price">                                                                                
                                                                            <div class="price">
                                                                                Rs. <?php echo $offer_price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                        <div class="price">

                                                                            <div class="price">
                                                                                Rs. <?php echo $price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                                <?php
                                                                            }
                                                                            ?>


                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="icon-detail">
                                                                                                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                                                            </button>
                                                                                                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                                                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="compare.html" title="Compare">
                                                                                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                    <?php
                                                                }
                                                                ?>                                        
                                    </div>

                                </div>
                                <div id="tab-4"class="ci" style=" display: none;">
                                    <div>
                                                                <?php
                                                                $refurbished_mobile = $this->md->my_query("SELECT p.* FROM `tbl_product` AS p ,`tbl_category` as c WHERE p. `sub_id`= c. `category_id` AND c. `category_id` = '5' AND p.status=1 ORDER BY p.`product_id` DESC LIMIT 0,4;");
                                                                foreach ($refurbished_mobile as $data) {
                                                                    $wh['product_id'] = $data->product_id;
                                                                    $record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
                                                                    ?>
                                            <div class="col-md-3 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
    <?php
    $multipath = $record->path;
    $path = explode(",", $multipath);
    ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="max-height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>

    <?php
    if ($data->offer_id != 0) {
        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
        ?>
                                                                <div class="new-label1" style="text-align: center;">
                                                                    <div><?php echo "$rate % OFF"; ?></div>
                                                                </div>
        <?php
    }
    ?>

                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <ul class="">
                                            <?php
                                            $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                            $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                            if ($totalrate == "") {
                                                $avg = 0;
                                            } else {
                                                $avg = round($totalrate / $totalrecord);
                                            }

                                            for ($i = 1; $i <= $avg; $i++) {
                                                ?>
                                                                            <i class="fa fa-star"></i>
        <?php
    }

    $blank = 5 - $avg;

    for ($i = 1; $i <= $blank; $i++) {
        ?>
                                                                            <i class="fa fa-star-o"></i>
                                                                <?php
                                                            }
                                                            ?>

                                                                    </ul>
                                                                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>-->
                                                                    <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                        <h6 class="price-title" style="min-height: 40px;">
                                                            <?php
                                                            echo $data->name;
                                                            ?>
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                        <?php
                                                                        $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                                        $oprice = $record->price;
                                                                        $price = floor($oprice + (($oprice * $com) / 100));
                                                                        ?>
                                                                        <?php
                                                                        if ($data->offer_id != 0) {
                                                                            $offer_price = floor($price - (($price * $rate) / 100));
                                                                            ?>
                                                                        <div class="check-price">
                                                                            Rs. <?php echo $price; ?> /-
                                                                        </div>
                                                                        <div class="price">                                                                                
                                                                            <div class="price">
                                                                                Rs. <?php echo $offer_price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                        <div class="price">

                                                                            <div class="price">
                                                                                Rs. <?php echo $price; ?> /-
                                                                            </div>
                                                                        </div>
                                                                            <?php
                                                                        }
                                                                        ?>


                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="icon-detail">
                                                                                                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                                                            </button>
                                                                                                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                                                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                            <a href="compare.html" title="Compare">
                                                                                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                    <?php
                                                                }
                                                                ?>                                        
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider tab end -->

        <!--collection banner start-->
        
        <!--collection banner end-->

        <!--deal banner start-->
        
        <!--deal banner end-->

        <!--rounded category start-->
        
        <!--rounded category end-->

        <!--box categroy start-->
        
        <!--box category end-->

        <!-- media banner tab start-->
        
        <!-- media banner tab end -->

        <!--collection banner start-->
        
        <!--collection banner end-->

        <!--hot deal start-->
        
        <!--hot deal start-->

        <!--testimonial start-->
        
        <!--testimonial end-->

        <!--title start-->
        <div class="title1 section-my-space">
            <h2 style="margin:0px; color: #00baf2;">Highest Sold Products on Mobile Corner</h2>
        </div>
        <!--title end-->

        <!--product start-->
        <section class="section-big-py-space  ratio_asos bg-light">
            <div class="custom-container">
               
                <div class="row ">
                    <div class="col-12 product">
                        <div class="product-slide no-arrow">
                           <?php
                    $productid = $this->md->my_query("SELECT `product_id`, COUNT(*) AS cc FROM `tbl_transaction` GROUP BY `product_id` ORDER BY cc DESC LIMIT 0,8;");

                    foreach ($productid as $id)
                        {

                        $data = $this->md->my_select('tbl_product', '*', array('product_id' => $id->product_id))[0];
                        $wh['product_id'] = $id->product_id;
                        $record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
                        ?>
                                <div class="col-grid-box">
                                    <div class="product">
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                 <?php
                        $multipath = $record->path;
                        $path = explode(",", $multipath);
                        ?>
                                                <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                    <div class="product-front">                                                                
                                                        <img style="max-height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                    </div>
                                                    <div class="product-back">
                                                        <img style="max-height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                    </div>
                                                </a>
                                                <?php
                                                if ($data->offer_id != 0) {
                                                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                    ?>
                                                    <div class="new-label1" style="text-align: center;">
                                                        <div><?php echo "$rate % OFF"; ?></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="product-detail detail-center ">
                                                <div class="detail-title">
                                                    <div class="detail-left">
                                                        <ul class="">
                                                            <?php
                                                            $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                                            $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                                            if ($totalrate == "") {
                                                                $avg = 0;
                                                            } else {
                                                                $avg = round($totalrate / $totalrecord);
                                                            }

                                                            for ($i = 1; $i <= $avg; $i++) {
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php
                                                            }

                                                            $blank = 5 - $avg;

                                                            for ($i = 1; $i <= $blank; $i++) {
                                                                ?>
                                                                <i class="fa fa-star-o"></i>
                                                                <?php
                                                            }
                                                            ?>

                                                        </ul>

                                                        <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                            <h6 class="price-title" style="min-height: 40px;">
                                                                <?php
                                                                echo $data->name;
                                                                ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="detail-right">
                                                        <?php
                                                        $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                        $oprice = $record->price;
                                                        $price = floor($oprice + (($oprice * $com) / 100));
                                                        ?>
                                                        <?php
                                                        if ($data->offer_id != 0) 
                                                        {
                                                            $offer_price = floor($price - (($price * $rate)/100));
                                                            ?>
                                                            <div class="check-price">
                                                                Rs. <?php echo $price; ?> /-
                                                            </div>
                                                            <div class="price">                                                                                
                                                                <div class="price">
                                                                    Rs. <?php echo $offer_price; ?> /-
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="price">

                                                                <div class="price">
                                                                    Rs. <?php echo $price; ?> /-
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--product end-->

        <!--instagram start-->
        
        <!--instagra end-->

        <!--contact banner start-->
<?php
$this->load->view('footer');
?>
        <!--footer end-->


        <!-- tap to top -->
        <div class="tap-top">
            <div>
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>
        <!-- tap to top End -->

        <!-- Add to cart bar -->
        <div id="cart_side" class=" add_to_cart top">
            <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my cart</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeCart()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="cart_media">
                    <ul class="cart_product">
                        <li>
                            <div class="media">
                                <a href="#">
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-2/product/1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>1 x $ 299.00</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <a href="#">
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-2/product/a1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>1 x $ 299.00</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <a href="#"><img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-2/product/1.jpg"></a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4><span>1 x $ 299.00</span></h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <ul class="cart_total">
                        <li>
                            <div class="total">
                                <h5>subtotal : <span>$299.00</span></h5>
                            </div>
                        </li>
                        <li>
                            <div class="buttons">
                                <a href="cart.html" class="btn btn-normal btn-xs view-cart">view cart</a>
                                <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Add to cart bar end-->

        <!--Newsletter modal popup start-->

        <!--Newsletter Modal popup end-->

        <!-- Quick-view modal popup start-->
        <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content quick-view-modal">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="quick-view-img"><img src="<?php echo base_url(); ?>assets/images/layout-2/product/a1.jpg" alt="" class="img-fluid "></div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2>Women Pink Shirt</h2>
                                    <h3>$32.96</h3>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                    <div class="border-product">
                                        <h6 class="product-title">product details</h6>
                                        <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                    </div>
                                    <div class="product-description border-product">
                                        <div class="size-box">
                                            <ul>
                                                <li class="active"><a href="#">s</a></li>
                                                <li><a href="#">m</a></li>
                                                <li><a href="#">l</a></li>
                                                <li><a href="#">xl</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="product-title">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                                <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                        </div>
                                    </div>
                                    <div class="product-buttons"><a href="#" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">view detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick-view modal popup end-->




        <!-- My account bar start-->
        <div id="myAccount" class="add_to_cart right account-bar">
            <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my account</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeAccount()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <form class="theme-form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label for="review">Password</label>
                        <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-rounded btn-block ">Login</a>
                    </div>
                    <div>
                        <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget password?</a></h5>
                        <h6 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h6>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add to account bar end-->

        <!-- Add to wishlist bar -->
<?php
$this->load->view('wish');
?>
        <!-- Add to wishlist bar end-->

        <!-- add to  setting bar  start-->
        <div id="mySetting" class="add_to_cart right">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my setting</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeSetting()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="setting-block">
                    <div >
                        <h5>language</h5>
                        <ul>
                            <li><a href="#">english</a></li>
                            <li><a href="#">french</a></li>
                        </ul>
                        <h5>currency</h5>
                        <ul>
                            <li><a href="#">uro</a></li>
                            <li><a href="#">rupees</a></li>
                            <li><a href="#">pound</a></li>
                            <li><a href="#">doller</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- facebook chat section end -->

        <!-- notification product -->

        <!-- notification product -->

        <!-- latest jquery-->
<?php
$this->load->view('footerscript');
?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    <script>
    function openCity(cityName)
    {
      var i;
     
      var x = document.getElementsByClassName("ci");
      
      for (i = 0; i < x.length; i++) 
      {
        x[i].style.display = "none";  
      }
      document.getElementById(cityName).style.display = "block"; 
//      document.getElementById(cityName).style.color = "red"; 
      
      
    }
    </script>
    
</html>
