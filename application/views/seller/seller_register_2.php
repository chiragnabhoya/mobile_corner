<!DOCTYPE html>
<html lang="en">


    <head>
        <title>Seller Register 2 - Mobile Corner</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="big-deal">
        <meta name="keywords" content="big-deal">
        <meta name="author" content="big-deal">
        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body>
        <!-- loader start -->
        <!-- loader end -->

        <header>
            <div class="mobile-fix-option"></div>

            <div class="layout-header2" style="background: rgb(0 123 255 / 25%);">
                <div class="container">
                    <div class="col-md-12">
                        <div class="main-menu-block row">
                            <div class="sm-nav-block">
                                <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                                <ul class="nav-slide">
                                    <li>
                                        <div class="nav-sm-back">
                                            back <i class="fa fa-angle-right pl-2"></i>
                                        </div>
                                    </li>
                                    <li><a href="#">western ware</a></li>
                                    <li><a href="#">TV, Appliances</a></li>
                                    <li><a href="#">Pets Products</a></li>
                                    <li><a href="#">Car, Motorbike</a></li>
                                    <li><a href="#">Industrial Products</a></li>
                                    <li><a href="#">Beauty, Health Products</a></li>
                                    <li><a href="#">Grocery Products </a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Bags, Luggage</a></li>
                                    <li><a href="#">Movies, Music </a></li>
                                    <li><a href="#">Video Games</a></li>
                                    <li><a href="#">Toys, Baby Products</a></li>
                                    <li class="mor-slide-open">
                                        <ul>
                                            <li><a href="#">Bags, Luggage</a></li>
                                            <li><a href="#">Movies, Music </a></li>
                                            <li><a href="#">Video Games</a></li>
                                            <li><a href="#">Toys, Baby Products</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mor-slide-click">
                                            mor category
                                            <i class="fa fa-angle-down pro-down" ></i>
                                            <i class="fa fa-angle-up pro-up" ></i>

                                    </li>
                                </ul>
                            </div>
                            <div class="logo-block col-md-6" style="margin-right: 0px;">
                                <a href="home"><img style="width: 310px" src="<?php echo base_url(); ?>assets/images/layout-2/logo/logo1.png" class="img-fluid  " alt="logo"></a>
                            </div>



                            <div class="menu-nav">
                                <span class="toggle-nav">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>



        <!--section start-->
        <section class="contact-page section-big-py-space bg-light">
            <div class="custom-container">
                <div class="row section-big-pb-space">
                    <div class="col-xl-6">

                        <form class="theme-form" style="padding:0px;" action="" method="POST" name="contactus">

                            <img src="<?php echo base_url(); ?>seller_assets/seller1.jpg" width="525px">

                        </form>
                    </div>
                    <div class="col-xl-6">

                        <form class="theme-form" action="" method="POST" name="seller_register">
                            <h3 class="text-center mb-3">Welcome, <?php echo $this->session->userdata('company_name'); ?></h3>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">Country</label>
                                        <select name="country" onchange="set_combo('state', this.value)" class="form-control" >
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($country as $data) 
                                            {
                                                ?>
                                                <option value="<?php echo $data->location_id ?>" <?php
                                                if($this->session->userdata('country'))
                                                {
                                                    if ($data->location_id == $this->session->userdata('country'))
                                                    {
                                                        echo "selected";
                                                    }
                                                    else
                                                    {
                                                        echo set_select('country',$data->location_id);
                                                    }
                                                }
                                                        
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('country');
                                            ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">state</label>
                                        <select name="state" id="state" onchange="set_combo('city', this.value)" class="form-control" >
                                            <option value="">Select State</option>
                                            <?php
                                                if($this->input->post('country')|| $this->session->userdata('country'))
                                                {
                                                    if ($this->session->userdata('country'))
                                                    {
                                                        $wh['parent_id']= $this->session->userdata('country');
                                                    }
                                                    else
                                                    {
                                                        $wh['parent_id']= $this->input->post('country');
                                                    }
                                                
                                                    $state=$this->md->my_select('tbl_location','*',$wh);
                                                    
                                                    foreach($state as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                    if($this->session->userdata('state'))
                                                    {
                                                        if($data->location_id == $this->session->userdata('state'))
                                                        {
                                                            echo "selected";                                                            
                                                        }
                                                        else
                                                        {
                                                            echo set_select('state',$data->location_id);
                                                        }
                                                    }
                                                        
                                                    ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </select>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('state');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">City</label>
                                        <select name="city" id="city"  class="form-control" >
                                            <option value="">Select City</option>
                                            <?php
                                                if($this->input->post('state') || $this->session->userdata('state'))
                                                {
                                                    if($this->session->userdata('state'))
                                                    {
                                                        $wh['parent_id']= $this->session->userdata('state');
                                                    }
                                                    else
                                                    {
                                                        $wh['parent_id']= $this->input->post('state');
                                                    }
                                                    
                                                    $city=$this->md->my_select('tbl_location','*',$wh);
                                                    
                                                    foreach($city as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                    if($this->session->userdata('city'))
                                                    {
                                                        echo "selected";
                                                    }
                                                        echo set_select('city',$data->location_id);
                                                    ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </select>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="review">Pick Up Address</label>
                                        <textarea name="address" class="form-control" placeholder="Enter Pick Up Address" style="resize: none;"><?php
                                        if ($this->session->userdata('address')) {
                                            echo $this->session->userdata('address');
                                        } else {
                                            echo set_value('address');
                                        }
                                        ?></textarea>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('address');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="review">PIN Code</label>
                                        <input  name="pincode" type="text" class="form-control" id="review" placeholder="Enter PIN Code" value="<?php
                                        if ($this->session->userdata('pincode')) {
                                            echo $this->session->userdata('pincode');
                                        } else {
                                            echo set_value('pincode');
                                        }
                                        ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('pincode');
                                            ?>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="">
                                            <a class="btn btn-normal col-md-5" href="<?php echo  base_url('seller-register-1'); ?>" style="margin-right:37px" >Previous</a>
                                            <button value="ADD" name="add" class="btn btn-normal col-md-5 offset-1" style="margin-left:37px" type="submit">Next</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <!--Section ends-->


        <!--footer start-->        
        <footer class="footer-2">

            <div class="sub-footer" style="background: rgb(0 123 255 / 25%)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sub-footer-contain" >
                                <p>copyright &#169; <?php echo "20" . date('y'); ?>. All rights reserved. Designed by <a href="https://www.instagram.com/chirag_nabhoya/">chirag Nabhoya</a> & <a href="https://www.instagram.com/variya_hardik_11/">Hardik Variya</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
                                    <img alt="" class="mr-3" src="assets/images/layout-4/product/1.jpg">
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
                                    <img alt="" class="mr-3" src="assets/images/layout-4/product/2.jpg">
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
                                <a href="#"><img alt="" class="mr-3" src="assets/images/layout-4/product/3.jpg"></a>
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
        <div id="wishlist_side" class="add_to_cart right">
            <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my wishlist</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeWishlist()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="cart_media">
                    <ul class="cart_product">
                        <li>
                            <div class="media">
                                <a href="#">
                                    <img alt="" class="mr-3" src="assets/images/layout-1/media-banner/1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>sm</span>
                                        <span>, blue</span>
                                    </h4>
                                    <h4>
                                        <span>$ 299.00</span>
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
                                    <img alt="" class="mr-3" src="assets/images/layout-1/media-banner/2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>sm</span>
                                        <span>, blue</span>
                                    </h4>
                                    <h4>
                                        <span>$ 299.00</span>
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
                                <a href="#"><img alt="" class="mr-3" src="assets/images/layout-1/media-banner/3.jpg"></a>
                                <div class="media-body">
                                    <a href="#"><h4>item name</h4></a>
                                    <h4>
                                        <span>sm</span>
                                        <span>, blue</span>
                                    </h4>
                                    <h4><span>$ 299.00</span></h4>
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
                                <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view wislist</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/costom.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>admin_assets/javascripts/set.js" type="text/javascript"></script>

    </body>


</html>

