
<!DOCTYPE html>
<html lang="en">

<head>
    <title>forget password - Mobile Corner </title>
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
                        <h2>forget password</h2>
                        <ul>
                            <li><a href="<?php echo base_url('home'); ?>" style="color: #007bff;" >home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8  offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">forget password</h3>
                    <div class="theme-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="femail" placeholder="Email" >
                            <div id="forget-msg" class="text-danger">
                                
                            </div>
                        </div>
                            
                        <input type="button" href="#" onclick="forget_ps();" class="btn btn-normal" value="send email" >
                        <a class="float-right txt-default mt-2" href="<?php echo base_url(); ?>login" id="fgpwd">Back to Login</a>
                        <a href="<?php echo base_url(); ?>register" class="txt-default pt-3 d-block" align="center">Create an Account</a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
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
    
    function forget_ps() 
    {
        var email = document.getElementById('femail').value
        if(email != "")
            {
                var ptn=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                if(email.match(ptn))
                {
                    $data={email:email};
                    var path="http://localhost/mobile_corner/backend/user_forget_ps";

                    $.post(path,$data,function(output)
                    {
                        
                        if(output=="0")
                        {
                            $('#forget-msg').html("Somthing Went Wrong ! Please Try Later.");
                            document.getElementById('femail').value='';
                        }
                        if(output=="1")
                        {
                            $('#forget-msg').html("Your Password Sent on your Registered Email.");
                            $('#forget-msg').removeClass('text-danger').addClass('text-success');
                            document.getElementById('femail').value='';
                        }
                        if(output=="2")
                        {
                            $('#forget-msg').html("This Email is not Registered !");
                            document.getElementById('email').value='';
                        }
                        
                        
                    });
                    
                    
                }
                else
                {
                    $('#forget-msg').html("Please Enter Valid Email.")
                    $('#forget-msg').removeClass('text-success').addClass('text-danger');
                }
            }
            else
            {
                $('#forget-msg').html("Please Enter Email.");
                $('#forget-msg').removeClass('text-success').addClass('text-danger');
            } 
    }
    
</script>

</body>

</html>
