<?php
$wh['product_id'] = $this->uri->segment(2);
$detail = $this->md->my_select('tbl_product', '*', $wh)[0];
$record = $this->md->my_select('tbl_product_image', '*', $wh)[0];
$img= $record->image_id;

$this->session->set_userdata('image_id',$img);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title><?php echo $detail->name; ?> - Mobile Corner </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="big-deal">
        <meta name="keywords" content="big-deal">
        <meta name="author" content="big-deal">
        <?php
        $this->load->view('headerlink');
        ?>
        <link href="<?php echo base_url(); ?>assets/css/star-rating.min.css" rel="stylesheet" type="text/css"/>

        <style type="text/css">
            .specification tr td ,th
            {
                padding: 10px;
                font-weight: 400;
            }

            h1{
                font-size: 32px;
                color: #000;
                font-weight: 500;
                margin: 20px 0px 12px;
            }

            table tr td:first-child 
            {
                width: 15%;
            }

            .brand li
            {
                display: block;
                font-weight: 400;
                color: #000;

            }

            .brand
            {
                margin-bottom: 10px;
            }

            .review 
            {
                margin-top: 10px;
                padding-bottom: 10px;
                margin-left: 0;
                margin-right: 0px;
                border-bottom: 1px solid #d7d7d7;
            }


        </style>
    </head>
    <body>
        <!-- loader start -->
        <div class="loader-wrapper">
            <div>
                <img src="<?php echo base_url(); ?>assets/images/loader.gif" alt="loader">
            </div>
        </div>
        <!-- loader end -->

        <!--header start-->
        <?php
        $this->load->view('header');
        ?>
        <!--header end-->

        <!-- breadcrumb start -->
        <div class="breadcrumb-main ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-contain">
                            <div>
                                <h2>Prodct Detail</h2>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>home" style="color: #007bff;" >home</a></li>
                                    <li><i class="fa fa-angle-double-right"></i></li>
                                    <li><a href="#">product detail</a></li>
                                    <li><i class="fa fa-angle-double-right"></i></li>
                                    <li><a href="#"><?php echo $detail->name; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End -->

        <!--section start-->

        <!-- section start -->
        <section class="section-big-pt-space bg-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-lg-5"id="view_img" >
                            <div class="row">
                                <div class="col-lg-2 col-sm-2 col-xs-12">
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <div class="slider-right-nav">
                                                <?php
                                                $c = 0;
                                                $multipath = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0]->path;
                                                $path = explode(",", $multipath);
                                                foreach ($path as $single) {
                                                    $c++;
                                                    ?>
                                                    <div>
                                                        <img style="height: 100px;width: 100%;object-fit: contain;margin: 14px 0px 0 0px;"  src="<?php echo base_url() . $single; ?>" alt="" class="img-fluid  image_zoom_cls-<?php echo $c; ?>">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-10 col-xs-12 order-up">
                                    <div class="product-right-slick no-arrow">
                                        <?php
                                        $c = 0;
                                        $multipath = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0]->path;
                                        $path = explode(",", $multipath);
                                        foreach ($path as $single) {
                                            ?>
                                            <div>
                                                <img style="height: 400px;width: 100%;object-fit: contain" src="<?php echo base_url() . $single; ?>" style="width:400px; height: auto" alt="" class="img-fluid  image_zoom_cls-0">
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 rtl-text">
                            <div class="product-right">
                                <h2><?php echo $detail->name; ?></h2>
                                <div id="price">
                                    <?php
                                    
                                    $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                    $oprice = $record->price;
                                    $price = floor($oprice + (($oprice * $com) / 100));


                                    if ($detail->offer_id != 0) {
                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $detail->offer_id))[0]->rate;
                                        $offer_price = floor($price - (($price * $rate) / 100));
                                        ?>
                                        <h4><del>Rs. <?php echo $price; ?> /-</del><span>55% off</span></h4>
                                        <h3 >Rs. <?php echo $offer_price; ?> /-</h3>
                                        <?php
                                    } else {
                                        ?>
                                        <h3 >Rs. <?php echo $price; ?> /-</h3>
                                        <?php
                                    }
                                    ?>   
                                </div>

                                <ul class="brand">
                                    <?php
                                    $whh['category_id'] = $detail->peta_id;
                                    $name = $this->md->my_select('tbl_category', '*', $whh)[0]->name;
                                    ?>
                                    <li>Brand : <?php echo $name; ?></li>
                                    <li>Product Code : <?php echo $detail->code; ?></li>
                                    <?php
                                    $whhh['seller_id'] = $detail->seller_id;
                                    $name = $this->md->my_select('tbl_seller', '*', $whhh)[0]->company_name;
                                    ?>
                                    <li>Sold By : <?php echo $name; ?></li>

                                    <?php
                                    $stock = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0]->qty;
                                    ?>
                                    <li id="stock_status">Availability : 
                                        <?php
                                        if ($stock > 0) {
                                            ?>
                                            <span style="color:#00baf2;"><i class="fa fa-check-square-o" ></i> In Stock</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span style="color:red;">Out Of Stock</span>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                </ul>

                                <div class="line">
                                    <span class="" >Color</span>
                                    <ul class="">
                                        <?php
                                        $img = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id));

                                        foreach ($img as $color) {
                                            ?>
                                            <li>
                                                <div id="img_<?php echo $color->image_id; ?>" onclick="change_img(<?php echo $color->image_id; ?>); change_stock(<?php echo $color->image_id; ?>); change_cartbtn(<?php echo $color->image_id; ?>)" style="background:<?php echo $color->colour; ?>; height: 30px; width: 30px; cursor: pointer;" title="<?php echo $color->colour; ?>"></div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="line">
                                    <span class="" >RAM</span>
                                    <div class="ram-box">
                                        <ul>
                                            <?php
//                                            $ram = $this->md->my_select('tbl_product_image','*',array('product_id' => $detail->product_id))[0]->ram;
                                            $my['ram'] = array();
                                            $my['img'] = array();
//                                            $myimg = array();
                                            $ramdata = $img;

                                            foreach ($ramdata as $ram)
                                            {
                                                if(!in_array($ram->ram,$my['ram']))
                                                {
                                                    array_push($my['ram'], $ram->ram);
                                                    array_push($my['img'], $ram->image_id);
//                                                    array_push($myimg, $ram->image_id);
                                                    
                                                }
                                            }    
                                            
//                                            echo "<pre>";
//                                            print_r ($myram);
//                                            echo "<pre>";
//                                            print_r ($myimg);
                                           
                                                foreach ($my['ram'] as $rdata) {
                                                    
//                                                    foreach ($my['img'] as $idata)
//                                                    {
                                                        $idata = $this->md->my_select('tbl_product_image','*',array('ram'=>$rdata,'product_id' => $detail->product_id))[0]->image_id;
//                                                        echo "<pre>";
//                                                        print_r ($idata);
    //                                            ?>

                                                    <li class="active"><a href="#" onclick="change_price(<?php echo $idata; ?>)"><?php echo $rdata; ?></a></li>
                                                    <?php
//                                                    }
                                                }
                                            
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="line">
                                    <span class="" >Internal Memory</span>
                                    <div class="ram-box">
                                        <ul>
                                            <?php
                                            $my['stor'] = array();
                                            $my['img'] = array();
//                                            $myimg = array();
                                            $ramdata = $img;

                                            foreach ($ramdata as $ram)
                                            {
                                                if(!in_array($ram->internal_storage,$my['stor']))
                                                {
                                                    array_push($my['stor'], $ram->internal_storage);
                                                    array_push($my['img'], $ram->image_id);
//                                                    
                                                    
                                                }
                                            }    
                                            
//                                            echo "<pre>";
//                                            print_r ($my['stor']);
//                                            
                                           
                                                foreach ($my['stor'] as $sdata) 
                                                {
                                                    
//                                                    
//                                                        $idata = $this->md->my_select('tbl_product_image','*',array('internal_storage'=>$sdata,'product_id' => $detail->product_id))[0]->image_id;
//                                                        echo "<pre>";
//                                                        print_r ($idata);
    //                                            ?>

                                                    <li class="active"><a href="#" onclick="change_price(<?php echo $idata; ?>)"><?php echo $sdata; ?></a></li>
                                                    <?php
//                                                    }
                                                }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                                <!--                                    <h6 class="product-title">quantity</h6>
                                                                    <div class="qty-box">
                                                                        <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                                                            <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span>
                                                                        </div>
                                                                    </div>-->

                                <div class="product-buttons line">
                                    <div id="cartbtn">
                                        <?php
                                        if($this->session->userdata('user'))
                                        {
                                            $cart['register_id'] = $this->session->userdata('user');
                                            $cart['product_id'] = $detail->product_id;
                                            $cart['image_id'] = $this->session->userdata('image_id');
                                            
                                            $count = count($this->md->my_select('tbl_cart','*',$cart));
                                            
                                            if ($count > 0 )
                                            {
                                            ?>
                                            <a   class="btn btn-normal">
                                                <i class="fa fa-shopping-cart"></i> added in cart
                                            </a>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a  onclick="add_cart(<?php echo $detail->product_id; ?>);" class="btn btn-normal">
                                                <i class="fa fa-shopping-cart"></i> add to cart
                                            </a>
                                            <?php
                                            }
                                            
                                        
                                        }
                                        else
                                        {
                                        ?>
                                        <a href="<?php echo base_url(); ?>login" class="btn btn-normal">
                                            <i class="fa fa-shopping-cart"></i> add to cart
                                        </a>
                                        <?php
                                        }
                                        ?>
                                        
                                    </div> 

                                    <div id="wishbtn"  >
                                        <?php
                                        if ($this->session->userdata('user')) {
                                            $wish['register_id'] = $this->session->userdata('user');
                                            $wish['product_id'] = $detail->product_id;

                                            $count = count($this->md->my_select('tbl_wishlist', '*', $wish));

                                            if ($count == 0) {
                                                ?>
                                                <a onclick="add_wish(<?php echo $detail->product_id ?>);" class="btn btn-normal"><i class="fa fa-heart-o" ></i> add to wish</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a title="Added in Wishliat" class="btn btn-normal"><i class="fa fa-heart" ></i> added in wishlist</a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <a href="<?php echo base_url() ?>login" class="btn btn-normal"><i class="fa fa-heart-o"></i> add to wish</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="border-product">
                                    <h6 class="product-title">Description</h6>
                                    <p><?php echo $detail->description; ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section ends -->

        <!-- product-tab starts -->
        <section class=" tab-product tab-exes">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="creative-card creative-inner">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">
                                        Description
                                    </a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">
                                        Specification
                                    </a>
                                    <div class="material-border"></div>
                                </li>
                                <?php
                                if ($this->session->userdata('user')) {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">
                                            Write Review
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                    <?php
                                }
                                ?>

                                <li class="nav-item">
                                    <a class="nav-link" id="review-top-tab" data-toggle="tab" href="#view-review" role="tab" aria-selected="false">
                                        View Review
                                    </a>
                                    <div class="material-border"></div>
                                </li>

                                

                            </ul>
                            <div class="tab-content nav-material" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                    <p><?php echo $detail->description; ?></p>
                                </div>
                                <div class="tab-pane fade specification" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                    <p><?php echo $detail->specification; ?></p>

                                </div>
                                
                                <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                    <form class="theme-form">
                                        <div class="form-row">
                                            <?php
                                            $user = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('user')))[0];
                                            ?>


                                            <div class="col-md-12">
                                                <div class="media">
                                                    <?php
                                                    if (strlen($user->profile_pic) > 0) {
                                                        ?>
                                                        <img src="<?php echo base_url() . $user->profile_pic; ?>" style="width:100px; height:100px;border-radius: 50px;">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg" style="width:100px; height:100px;border-radius: 50px;">
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="media">
                                                    <h4 style="text-transform:capitalize;"><?php echo $user->name; ?></h4>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="media">
                                                    <div class="media-body ml-3">
                                                        <input id="input-id" name="rating" type="text" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <textarea id="review" class="form-control" placeholder="Wrire Your Review Message " id="exampleFormControlTextarea1" style="resize:none;" ></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-normal" onclick="add_review(<?php echo $detail->product_id; ?>)" type="submit">Submit Your Review</button>
                                                <span id="review-error" style="margin-left: 10px; color:red; font-size:13px;"></span>
                                                <span id="review-success" style="margin-left: 10px; color:green; font-size:13px;"></span>
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="view-review" role="tabpanel" aria-labelledby="review-top-tab">
                                    <form class="theme-form">
                                        <?php
                                        $review = $this->md->my_select('tbl_review', '*', array('status' => 1, 'product_id' => $detail->product_id));
                                        foreach ($review as $data) {
                                            $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                            ?>
                                            <div class="form-row review">
                                                <div col-md-1>
                                                    <?php
                                                    if (strlen($user->profile_pic) > 0) {
                                                        ?>
                                                        <img src="<?php echo base_url() . $user->profile_pic; ?>" style="width:70px; height:70px;">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg" style="width:70px; height:70px;">
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="col-md-11 ">
                                                    <p style="padding-top:0px;font-weight: 600;margin-bottom: 4px;"><?php echo $user->name; ?></p>

                                                    <p style="padding-top:0px; "><?php echo $data->msg; ?></p>
                                                    <p style="padding-top: 5px; line-height: 18px; font-size: 12px;"> Post on <?php echo date('d-m-Y h:i:s', strtotime($data->date)); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-tab ends -->

        <!-- related products -->
        <section class="section-big-py-space  ratio_asos bg-light">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 product-related">
                        <h2>related products</h2>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 product">
                        <div class="product-slide no-arrow">
                            <?php
                            $whhhh['sub_id'] = $detail->sub_id;
                            $whhhh['product_id !='] = $detail->product_id;
                            $related = $this->md->my_select('tbl_product', '*', $whhhh);

                            foreach ($related as $single) {
                                ?>
                                <div class="col-grid-box">
                                    <div class="product">
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                <?php
                                                $whhhhh['product_id'] = $single->product_id;
                                                $multipath = $this->md->my_select('tbl_product_image', '*', $whhhhh)[0]->path;
                                                $path = explode(",", $multipath);
                                                ?>
                                                <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                    <div class="product-front">                                                                
                                                        <img style="height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                    </div>
                                                    <div class="product-back">
                                                        <img style="height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                    </div>
                                                </a>
                                                <?php
                                                if ($single->offer_id != 0) {
                                                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $single->offer_id))[0]->rate;
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
                                                            $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $single->product_id)[0]->rate;
                                                            $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $single->product_id)[0]->rate;

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

                                                        <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                            <h6 class="price-title" style="min-height: 40px;">
                                                                <?php
                                                                echo $single->name;
                                                                ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="detail-right">
                                                        <?php
                                                        $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;

                                                        $oprice = $this->md->my_select('tbl_product_image', '*', $whhhhh)[0]->price;
                                                        $price = floor($oprice + (($oprice * $com) / 100));
                                                        ?>
                                                        <?php
                                                        if ($single->offer_id != 0) 
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
        <!-- related products -->


        <!-- recent products -->
        <?php
        if ($this->session->userdata('user')) {
            $ins['register_id'] = $this->session->userdata('user');
            $ins['product_id'] = $detail->product_id;

            $count = count($this->md->my_select('tbl_recent_view', '*', $ins));

            if ($count == 0) {

                $this->md->my_insert('tbl_recent_view', $ins);
            }
            ?>
            <section class="section-big-py-space  ratio_asos bg-light">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12 product-related">
                            <h2>Recently View Products</h2>
                        </div>
                    </div>
                    <div class="row ">
                        <?php
                        $whe['register_id'] = $this->session->userdata('user');
                        $whe['product_id !='] = $detail->product_id;
                        $recent = $this->md->my_select('tbl_recent_view', '*', $whe);
                        ?>
                        <div class="col-12 product">
                            <div class="product-slide no-arrow">
                                <?php
                                foreach ($recent as $data) {
                                    $single = $this->md->my_select('tbl_product', '*', array('product_id' => $data->product_id))[0];
                                    ?>
                                    <div class="col-grid-box">
                                        <div class="product">
                                            <div class="product-box">
                                                <div class="product-imgbox">
                                                    <?php
                                                    $whhhhh['product_id'] = $single->product_id;
                                                    $multipath = $this->md->my_select('tbl_product_image', '*', $whhhhh)[0]->path;
                                                    $path = explode(",", $multipath);
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                        <div class="product-front">                                                                
                                                            <img style="height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                        </div>
                                                        <div class="product-back">
                                                            <img style="height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                        </div>
                                                    </a>
                                                    <?php
                                                    if ($single->offer_id != 0) {
                                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $single->offer_id))[0]->rate;
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
                                                                $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $single->product_id)[0]->rate;
                                                                $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $single->product_id)[0]->rate;

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

                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                                <h6 class="price-title" style="min-height: 40px;">
                                                                    <?php
                                                                    echo $single->name;
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                        </div>
                                                        <div class="detail-right">
                                                            <?php
                                                            $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;

                                                            $oprice = $this->md->my_select('tbl_product_image', '*', $whhhhh)[0]->price;
                                                            $price = floor($oprice + (($oprice * $com) / 100));
                                                            ?>
                                                            <?php
                                                            if ($single->offer_id != 0) 
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
            <?php
        }
        ?>
        <!-- recent products -->

        <!--Section ends-->


        <!--footer start-->
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
        <div id="cart_side" class=" add_to_cart right">
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
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?><?php echo base_url(); ?>assets/images/layout-4/product/1.jpg">
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
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?><?php echo base_url(); ?>assets/images/layout-4/product/2.jpg">
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
                                <a href="#"><img alt="" class="mr-3" src="<?php echo base_url(); ?><?php echo base_url(); ?>assets/images/layout-4/product/3.jpg"></a>
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
        <!-- Add to setting bar end-->

        <!-- latest jquery-->
        <?php
        $this->load->view('footerscript');
        ?>

        <script type="text/javascript">
            function change_img(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/change_img/';

                $.post(path, $data, function (output) {
                    $('#view_img').html(output);
//                    $('#img_'+id).css('border','1px solid black');

                });
            }

            function change_stock(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/change_stock/';

                $.post(path, $data, function (output) {
//                    $('#stock_status').html(output);
                    if (output > 0)
                    {
                        $('#stock_status').html('Availability : <span style="color:#00baf2;"><i class="fa fa-check-square-o" ></i> In Stock</span>');
                    } else
                    {
                        $('#stock_status').html('Availability : <span style="color:red;">Out of Stock</span>');
                    }

                });
            }

            function change_price(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/change_price/';
                
                $.post(path, $data, function (output) {
                $('#price').html(output);
            });

            }
            
            function change_cartbtn(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/change_cartbtn';

                $.post(path, $data, function (output) {
                    $('#cartbtn').html( output );
                    

                });
            }

            function add_wish(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/add_wish/';

                $.post(path, $data, function (output) {
                    if (output == 1)
                    {
                        $('#wishbtn').html('<a href="#" title="Added in Wishliat" class="btn btn-normal"><i class="fa fa-heart" ></i> added in wishlist</a>')
                    }
                });
            }
        </script>

        <script src="<?php echo base_url(); ?>assets/js/star-rating.min.js" type="text/javascript"></script>
        <script>
            $("#input-id").rating();

            function add_review(id)
            {
                var rate = $('#input-id').val();
                var msg = $('#review').val();

                if (rate == "" || msg == "")
                {
                    $('#review-error').html('Please Enter Detail Properly.')
                } else
                {
                    var data = {id: id, rate: rate, msg: msg};
                    var path = "http://localhost/mobile_corner/backend/add_review/";

                    $.post(path, data, function (output) {
                        if (output == "0")
                        {
                            $('#review-error').html('Something went Wrong. Try Again.');
                        }

                        if (output == "1")
                        {
                            $('#review-success').html('Thank You for giving Review.');
                        }
                    });
                }
            }
            
            function add_cart(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/add_cart/';

                $.post(path, $data, function (output) {
                    
                    if(output == 1)
                    {
                        $('#cartbtn').html('<a  class="btn btn-normal"><i class="fa fa-shopping-cart"></i> added in cart</a>')
                    }
                });
            }
        </script>

    </body>

</html>
