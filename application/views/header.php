<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-6">
                    <div class="top-header-left">

                        <div class="app-link">

                            <ul>
                                <li><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcRwRrnXhNZhbFTwlRrGFWCjfvjWBCCwZlRKkGQfgrJMgxTTJjsvDQwbQWCBkvWDKSfbSLcpr" target="_new"><i class="fa fa-google"></i></a></li>
                                <li><a href="https://www.facebook.com/Mobile-corner-101276972014328" target="_new"><i class="fa fa-facebook" ></i></a></li>
                                <li><a href="https://www.instagram.com/mobilecorner0101/" target="_new"><i class="fa fa-instagram" ></i></a></li>
                                <li><a href="https://twitter.com/home?lang=en" target="_new"><i class="fa fa-twitter" ></i></a></li>
                                <li><a href="https://www.linkedin.com/in/mobile-corner-3a029b208/" target="_new"><i class="fa fa-linkedin" ></i></a></li>
                            </ul>
                            <div style="">
                                    <div id="google_translate_element" style="margin-left: 20PX;"></div>

                                    <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                    }
                                    </script>
                                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-5 col-sm-6">
                    <div class="top-header-right">

                        <div class="language-block  offset-30">
                            <ul>
                                
                                <?php
                                if($this->session->userdata('user'))
                                {
                                ?>
                                
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>member-wishlist">My Wishlist</a></li> 
                                <!--onclick="openWishlist()"-->
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>member-logout">Logout</a></li>
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>member-dashboard">My Profile</a></li>
                                <?php
                                }
                                else
                                {
                                ?>
                                
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>login">My Wishlist</a></li>
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>login">Login</a></li>
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>register">Registration</a></li>
                                <?php
                                }
                                ?> 
                                <li style="padding: 0px 10px"><a href="<?php echo base_url(); ?>seller-register-1">Seller</a></li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
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
                   
                    <div style="height: 60px;width: 60px;border-radius: 80px;line-height: 11px;left:30px;text-align: center; margin-left: -100px;">
                        <b> Help!</b>
                        <a href="https://wa.link/y1zo4q" style="color: green;" target="_new">
                        <i style="margin-top: 5px;" class="fa fa-whatsapp fa-3x"></i>
                        </a>
                         
                    </div> 
                    <div class="logo-block">
                        <a href="home"><img style="width: 310px" src="<?php echo base_url(); ?>assets/images/layout-2/logo/logo1.png" class="img-fluid  " alt="logo"></a>
                    </div>
                    <div class="input-block">
                        <div class="input-box">
                            <form class="big-deal-form">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="search" style="cursor: pointer; padding: 0px; margin: 16px;" onclick="main_search();"><i  style="padding-left:9px;" class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text"  id="search" class="form-control" placeholder="Search a Product" >
                                    <div class="input-group-prepend">
                                        <span style="cursor: pointer; padding: 0px; margin: 16px; ">
                                            <i style="padding-right:9px;" onclick="startConverting();" class="fa fa-microphone" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--onclick="openCart()"-->
                    <div class="cart-block cart-hover-div " >      
                        <?php
                        if($this->session->userdata('user'))
                        {
                            $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
                            
                        ?>
                        <a href="<?php echo base_url(); ?>view-cart" style="display: flex;">
                            <div class="cart">
                                <span class="cart-product"><?php echo $cart; ?></span>
                                <ul>
                                    <li class="mobile-cart  ">
                                        <i class="fa fa-shopping-cart"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-item">
                                <h5>shopping</h5>
                                <h5>cart</h5>
                            </div>
                        </a>
                        
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="<?php echo base_url(); ?>login" style="display: flex;">
                            <div class="cart">
                                <span class="cart-product">0</span>
                                <ul>
                                    <li class="mobile-cart  ">
                                        <i class="fa fa-shopping-cart"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-item">
                                <h5>shopping</h5>
                                <h5>cart</h5>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                        
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
    <div class="category-header-2">
        <div class="custom-container">
            <div class="row" >
                <div class="col">
                    <div class="navbar-menu" >
                        <div class="category-left">

                            <div class="menu-block">
                                <nav id="main-nav" >
                                    <div class="toggle-nav" ><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal" >
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <!--HOME-->
                                        <li>
                                            <a href="<?php echo base_url();?>home" class="dark-menu-item">Home</a>
                                            
                                        </li>
                                        <!--HOME-END-->
                                        <!--product-meu start-->
                                        <?php
                                        $main = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
                                        foreach($main as $maindata)
                                        {
                                            
                                        ?>
                                        <li class="mega"><a href="<?php echo base_url();?>product-list/main/<?php echo $maindata->category_id;?>" class="dark-menu-item"><?php echo $maindata->name; ?>
                                            </a>
                                            <ul class="mega-menu full-mega-menu ">
                                                <li>
                                                    <div class="container">
                                                        <div class="row">
                                                           <?php
                                                           $sub = $this->md->my_select('tbl_category','*',array('parent_id'=>$maindata->category_id));
                                                            foreach($sub as $subdata)
                                                           {
                                                           ?>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <a href="<?php echo base_url();?>product-list/sub/<?php echo $subdata->category_id;?>" style="font-size:20px; margin-bottom: 10px;"><?php echo $subdata->name; ?></a>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <?php
                                                                             $peta = $this->md->my_select('tbl_category','*',array('parent_id'=>$subdata->category_id));
                                                                             foreach($peta as $petadata)
                                                                            {
                                                                            ?>
                                                                            <li><a href="<?php echo base_url();?>product-list/peta/<?php echo $petadata->category_id;?>"><?php echo $petadata->name; ?></a></li>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                           }
                                                            ?>
                                                        </div>
                                                        
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php 
                                        }
                                        ?>
                                        <!--product-meu end-->

                                        <li>
                                            <a href="<?php echo base_url();?>about-us" class="dark-menu-item">About us</a>
                                            
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>contact-us" class="dark-menu-item">Contact us</a>
                                            
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                        <div class="category-right">
                            <div class="navbar-menu" style="margin-right: 80px">
                                <div class="category-left">
                                    <div class="icon-block">
                                        <ul> 
                                            <?php
                                            $wishh =0; 
                                            if($this->session->userdata('user'))
                                            {
                                                $wishh = count($this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user'))));
                                            }
                                            ?>
                                            <li style="cursor:pointer;" class="mobile-wishlist" onclick="openWishlist()">
                                                <a><i class="fa fa-heart"></i><div class="cart-item"><div><?php echo $wishh;?> item<span>wishlist</span></div></div></a>
                                            </li> 
                                           
                                            <li class="mobile-setting mobile-setting-hover" onclick="openSetting()"><a href="#"><i class="icon-settings"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group"> 
                                <div class="dropdown-menu gift-dropdown">
                                    <div class="media">
                                        <div  class="mr-3">
                                            <img src="<?php echo base_url(); ?>assets/images/icon/1.png" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Billion Days</h5>
                                            <p><img src="<?php echo base_url(); ?>assets/images/icon/currency.png" class="cash" alt="curancy"> Flat Rs. 270 Rewards</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div  class="mr-3">
                                            <img src="<?php echo base_url(); ?>assets/images/icon/2.png" alt="Generic placeholder image" class="gift-bloc">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Fashion Discount</h5>
                                            <p><img src="<?php echo base_url(); ?>assets/images/icon/fire.png"  class="fire" alt="fire">Extra 10% off (upto Rs. 10,000*) </p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div  class="mr-3">
                                            <img src="<?php echo base_url(); ?>assets/images/icon/3.png" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">75% off Store</h5>
                                            <p>No coupon code is required.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div  class="mr-3">
                                            <img src="<?php echo base_url(); ?>assets/images/icon/6.png" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Upto 50% off</h5>
                                            <p>Buy popular phones under Rs.20.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div  class="mr-3">
                                            <img src="<?php echo base_url(); ?>assets/images/icon/5.png" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Beauty store</h5>
                                            <p><img src="<?php echo base_url(); ?>assets/images/icon/currency.png" class="cash" alt="curancy" > Flat Rs. 270 Rewards</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script type="text/javascript">
    
            function main_search()
            {
                var search_val = document.getElementById('search').value;
                window.location.href = "http://localhost/mobile_corner/product-list/search/"+search_val;

            }

</script>
<script type="text/javascript">
    
		var result = document.getElementById('search');
  
		function startConverting () {

		if('webkitSpeechRecognition' in window) {
			var speechRecognizer = new webkitSpeechRecognition();
			speechRecognizer.continuous = true;
			speechRecognizer.interimResults = true;
			speechRecognizer.lang = 'en-US';
			speechRecognizer.start();

			var finalTranscripts = '';

			speechRecognizer.onresult = function(event) {
				var interimTranscripts = '';
				for(var i = event.resultIndex; i < event.results.length; i++){
					var transcript = event.results[i][0].transcript;
					transcript.replace("\n", "<br>");
					if(event.results[i].isFinal) {
						finalTranscripts += transcript;
					}else{
						interimTranscripts += transcript;
					}
				}
                                document.getElementById("search").value=finalTranscripts,interimTranscripts;
			};
			speechRecognizer.onerror = function (event) {

			};
		}else {
			search.innerHTML = 'Your browser is not supported. Please download Google chrome or Update your Google chrome!!';
		}	
		}

</script>