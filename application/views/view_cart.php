<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Cart - Mobile Corner </title>
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
                                <h2>cart</h2>
                                <ul>
                                    <li><a href="<?php echo base_url('home'); ?>" style="color: #007bff;" >home</a></li>
                                    <li><i class="fa fa-angle-double-right"></i></li>
                                    <li><a href="#">cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End -->

        <!--section start-->
        <section class="cart-section section-big-py-space bg-light" style="padding-top: 0px;" >
            <div class="custom-container" id="cartdata" >
        <?php
            $name = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('user')))[0]->name;
            $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
            
            if($cart > 0)
            {
            ?>
            <header class="row" style="line-height: 50px" >
                <div class="col-md-10" style="background: white; color: #00baf2; ">
                    <label style="font-size:22px; color: #00baf2;">Hi <?php echo $name; ?>, Your Shopping Cart(<?php echo $cart; ?> items)</label>
                </div>
                <div class="col-md-2" style="background: white; " >
                    <a onclick="clear_cart();" class="btn btn-primary" style="background: #ebfdff; color: black;" >remove all items</a>
                </div>
            </header>
            <div class="row" style="padding-top: 30px;">
                <div class="col-sm-12 col-lg-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">no</th>
                                <th scope="col">item code</th>
                                <th scope="col">item</th>
                                <th scope="col">price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">net price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user')));
                            $final_price = 0;
                            $no = 0;
                            foreach ($cartdata as $item)
                            {
                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$item->product_id))[0];
                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id));
                                $multipath = $image[0]->path;
                                $path = explode(",", $multipath);
                                $no++;
                            ?>
                            <tr>
                                <td>
                                    <p><?php echo $no; ?></p>
                                </td>

                                <td>
                                    <a href="#"><?php echo $product->code; ?></a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="<?php echo base_url().$path[0]; ?>" data-toggle="tooltip" title="<?php echo $product->name; ?>" >
                                            </a>
                                        </div>
                                        <div class="col-md-8" style="text-align: left;">
                                            <span style="font-size: 14px; color: #00baf2;">Product Name: <?php echo $product->name; ?></span><br>                                           
                                            color: <?php echo $image[0]->colour; ?><br>
                                            <a onclick="delete_cartitem(<?php echo $item->cart_id;?>);" class="btn" style="background: #caf7fc; font-size: 12px; border: 1px solid #00baf2; border-radius: 5px; padding: 4px 5px;">remove</a>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 110px;">
                                    <p><?php echo $item->gross_price; ?> /-</p>
                                </td>
                                <td style="width: 110px;">
                                    <p><?php echo $item->discount; ?> /-</p>
                                </td>
                                <td style="width: 110px;">
                                    <p class="td-color"><?php echo $item->net_price; ?> /-</p>
                                </td>
                                <td>
                                    <select onchange="change_qty(<?php echo $item->cart_id; ?>,this.value);">
                                        <?php
                                        for( $i=1 ; $i<=3 ; $i++ )
                                        {
                                        ?>
                                        <option <?php

                                        if($i == $item->qty)
                                        {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td style="width: 110px;">
                                    <p class="td-color"><?php echo $item->total_price; ?> /-</p>
                                </td>
                            </tr>
                            <?php
                            $final_price =$final_price + $item->total_price;
                            }       
                            ?>
                        </tbody>
                    </table>
                    <table class=" table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <p><?php echo $final_price; ?> /-</p></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-12">
                    <a href="<?php echo base_url(); ?>home" class="btn btn-normal">continue shopping</a> 
                    <a href="<?php echo base_url(); ?>checkout" class="btn btn-normal ml-3">check out</a>
                </div>
            </div>
            
            <?php
            }
            else
            {
            ?>
            <div class="row" style="background: white;">
                <div class="col-md-12" style="padding: 60px; text-align: center;">
                    <p style="text-align: center; font-size: 100px; color: #ddd;"><i class="fa fa-shopping-cart"></i></p>
                    <h2 style="text-align: center; color: #ddd;">Hi <?php echo $name; ?>, Your Shopping Cart is Empty </h2>
                    <br>
                    <a href="<?php echo base_url(); ?>home" class="btn btn-normal" style="">continue shopping</a>
                </div>
            </div>
            <?php
            }
        ?>
            </div>
        </section>
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
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/1.jpg">
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
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/2.jpg">
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
                                <a href="#"><img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/3.jpg"></a>
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
            function clear_cart()
            {
                var c = confirm('Are You Sure want To Delete All Items ?');
                
                if(c == 1)
                {
                    var data = {};
                    var path = "http://localhost/mobile_corner/backend/clear_cart/";

                    $.post(path, data, function (output) {
                        $('#cartdata').html(output);
                    });
                }
            }
            
            function delete_cartitem(id)
            {
                var c = confirm('Are You Sure want To Delete This Items ?');

                if(c == 1)
                {
                    var data = {id:id};
                    var path = "http://localhost/mobile_corner/backend/delete_cartitem/";

                    $.post(path, data, function (output) {
                        $('#cartdata').html(output);
                    });
                }
            }
            
            function change_qty(id , qty)
            {
                var data = {id:id ,qty:qty};
                var path = "http://localhost/mobile_corner/backend/change_qty/";

                $.post(path, data, function (output) {
                    
//                    alert(output);
                    $('#cartdata').html(output);
                });
            }
                
                
        </script>

    </body>

</html>
