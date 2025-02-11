<!DOCTYPE html>
<html lang="en">


    <head>
        <title>Seller Register 1 - Mobile Corner</title>
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
        <div class="loader-wrapper">
            <div>
                <img src="assets/images/loader.gif" alt="loader">
            </div>
        </div>
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

                            <div class="col-md-6">
                                <form method="post" action="" name="loginform">
                                <div class="row justify-content-end ">
                                    <div class="  col-md-4 " id="txt3" >
                                        <div class="form-group" style="">
                                            <label for="email">Email</label>
                                            <input name="seller_email" type="text" class="form-control" id="femail" placeholder="Email" value="<?php
                                            if (!isset($success) && set_value('seller_email')) {
                                                echo set_value('seller_email');
                                            }
                                            ?>">

                                            <div class="text-danger ">
                                                <?php
                                                echo form_error('seller_email');
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 " id="ps_hide" >
                                        <div class="form-group">
                                            <label  for="review">Password</label>
                                            <input  name="seller_ps" type="password" class="form-control" id="review" placeholder=" Password" value="<?php
                                            if (!isset($success) && set_value('seller_ps')) {
                                                echo set_value('seller_ps');
                                            }
                                            ?>">

                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><a  id="fg_pass" onclick="" class="">Forget Password</a></label>
                                            <label><a  id="back" onclick="" class="">< Back</a></label>
                                            <input type="submit" id="btn_login" name="login" value="Login" class="btn btn-primary form-control text-white">
                                            <input type="button" onclick="forget_ps();" id="btn_fp" name="send_ps" value="Send Mail" class="btn btn-primary form-control seller_btn" style="display: none">
                                        </div>

                                    </div>
                                </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12" id="login_msg">
                                            <div class="text-danger" >
                                                <?php
                                                if (isset($error)) {
                                                    echo $error;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 offset-4" >
                                            <div class="text-danger" id="forget_msg">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                            <h3 class="text-center mb-3">Register Now</h3>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input name="company_name" type="text" class="form-control"  placeholder="Enter Your Company Name" value="<?php
                                        if ($this->session->userdata('company_name')) {
                                            echo $this->session->userdata('company_name');
                                        } else {
                                            echo set_value('company_name');
                                        }
                                        ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('company_name');
                                            ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control"  placeholder="Email" value="<?php
                                        if ($this->session->userdata('email')) {
                                            echo $this->session->userdata('email');
                                        } else {
                                            echo set_value('email');
                                        }
                                        ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('email');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review">Password</label>
                                        <div class="custom-addon">
                                            <input  name="password" type="password" id="tx1" class="form-control password" placeholder="Enter your Password" value="<?php
                                            if ($this->session->userdata('password')) {
                                                echo $this->session->userdata('password');
                                            } else {
                                                echo set_value('password');
                                            }
                                            ?>">
                                            <div class="input-group-addon " style="padding: 10px 10px 0;background: #eee; display: flax;" >
                                                <i  class="icofont-eye icofont-2x" id="show_p1" ></i>
                                            </div>
                                        </div>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('password');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Confirm Password</label>
                                        <div class="custom-addon">
                                            <input name="cpassword" type="password" id="tx2" class="form-control"  placeholder="Confirm Password" >
                                            <div class="input-group-addon " style="padding: 10px 10px 0;background: #eee; display: flax;" >
                                                <i  class="icofont-eye icofont-2x" id="show_p2" ></i>
                                            </div>
                                        </div>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('cpassword');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="review">Phone number</label>
                                        <input  name="mobile" type="text" class="form-control" placeholder="Enter your number" value="<?php
                                            if ($this->session->userdata('mobile')) {
                                                echo $this->session->userdata('mobile');
                                            } else {
                                                echo set_value('mobile');
                                            }                                            
                                            ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('mobile');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review">PAN Number</label>
                                        <input  name="pan_no" type="text" class="form-control" placeholder="Enter your PAN Number" value="<?php
                                            if ($this->session->userdata('pan_no')) {
                                                echo $this->session->userdata('pan_no');
                                            } else {
                                                echo set_value('pan_no');
                                            }                                            
                                            ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('pan_no');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review">GST Number</label>
                                        <input  name="gst_no" type="text" class="form-control" placeholder="Enter your GST Number" value="<?php
                                            if ($this->session->userdata('gst_no')) {
                                                echo $this->session->userdata('gst_no');
                                            } else {
                                                echo set_value('gst_no');
                                            }
                                            ?>">

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('gst_no');
                                            ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="">
                                        <input type="submit" value="Next >" name="add" class="btn btn-normal col-md-12" >

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

        <!-- slick js-->
        <script src="<?php echo base_url(); ?>assets/js/slick.js"></script>

        <!-- popper js-->
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js" ></script>

        <!-- Timer js-->
        <script src="<?php echo base_url(); ?>assets/js/menu.js"></script>

        <!-- Bootstrap js-->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

        <!-- Bootstrap js-->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>

        <!-- elvatezoom js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.elevatezoom.js"></script>

        <!-- Theme js-->
        <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/slider-animat.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/timer.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modal.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/costom.js" type="text/javascript"></script>

        <script>
                            $c = 0;
                            $("#back").css('display', 'none');
                            $('#fg_pass').click(function () {
                                if ($c == 0)
                                {


                                    $("#fg_pass").css('display', 'none');
                                    $("#back").show();
                                    $("#ps_hide").css('display', 'none');
                                    $("#btn_login").css('display', 'none');
                                    $("#btn_fp").show();
                                    $("#login_msg").hide();
                                    
                                    
//                                    $("#txt3").addClass("push-md-4 no-gutters");

                                    $c++;
                                } else {
                                    
                                    $("#ps_hide").css('display', 'inherit');
                                    $("#btn_login").css('display', 'inherit');
                                    
                                    $("#btn_fp").hide();
//                                    $("#txt3").removeClass("push-md-4");

                                    $c = 0;
                                }
                            }
                                    );
                            
                            $('#back').click (function(){
                                
                                $("#back").css('display', 'none');
                                $("#fg_pass").show();
                                $("#ps_hide").css('display', 'inherit');
                                $("#btn_login").css('display', 'inherit');

                                $("#btn_fp").hide(); 
                            });
                            
                            
                            //
                            $c=0;

                            $('#show_p1').click(function(){
                                if($c==0)
                                {

                                    $("#tx1").attr('type','text');
                                    $("#show_p1").removeClass("icofont-eye").addClass("icofont-eye-blocked");

                                    $c++;
                                }
                                else{
                                    $("#tx1").attr('type','password');
                                    $("#show_p1").removeClass("icofont-eye-blocked").addClass("icofont-eye");

                                    $c=0;
                                }
                            });
                            
                            $('#show_p2').click(function(){
                                if($c==0)
                                {

                                    $("#tx2").attr('type','text');
                                    $("#show_p2").removeClass("icofont-eye").addClass("icofont-eye-blocked");

                                    $c++;
                                }
                                else{
                                    $("#tx2").attr('type','password');
                                    $("#show_p2").removeClass("icofont-eye-blocked").addClass("icofont-eye");

                                    $c=0;
                                }
                            });
                            
                            
                            
                            function forget_ps()
                            {
                                var email = document.getElementById('femail').value;
                                if(email != "")
                                {
                                    var ptn=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                                    if(email.match(ptn))
                                    {
                                        $data={email:email};
                
                                        var path="http://localhost/mobile_corner/backend/seller_forget_ps";

                                        $.post(path,$data,function(output)
                                        {
                                            if(output=="0")
                                            {
                                                $('#forget_msg').html("Somthing Went wrong. Try Later.");
                                                document.getElementById('femail').value='';
                                            }
                                            if(output=="1")
                                            {
                                                $('#forget_msg').html("Your Password is Sent to Your Register Email.");
                                                $('#forget_msg').removeClass('text-danger').addClass('text-success');
                                                document.getElementById('femail').value='';
                                            }
                                            if(output=="2")
                                            {
                                                $('#forget_msg').html("This Email is Not Registered !");
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $('#forget_msg').removeClass('text-success').addClass('text-danger');
                                        $('#forget_msg').html("Please Enter Valid Email.");
                                    }
                                }
                                else
                                {
                                    $('#forget_msg').removeClass('text-success').addClass('text-danger');
                                    $('#forget_msg').html("Please Enter Email.");
                                }
                            }
        </script>
    </body>


</html>

