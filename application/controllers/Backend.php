<?php

class Backend extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
    }
    
    public function state() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);
        echo '<option value="">Select State</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name ?></option>
            <?php
        }
    }
    
    
    public function sub() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category','*', $wh);
        echo '<option value="">Select Sub Category</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name ?></option>
            <?php
        }
    }
    
    
    public function subscriber(){
        $ins['email'] = $this->input->post('email');
        $count = count ($this->md->my_select('tbl_email_subscriber','*',$ins));
        
        if($count==0)
        {
            echo $this->md->my_insert('tbl_email_subscriber',$ins);
        }
        else
        {
            echo 2;
        }
    }
    
    public function seller_forget_ps(){
        $wh['email'] = $this->input->post('email');
        $record = $this->md->my_select('tbl_seller','*',$wh);
        $count = count($record);
        
        if($count == 1)
        {
            $ps = $this->encryption->decrypt($record[0]->password);
            
            $email = $this->input->post('email');
            $name = $record[0]->company_name;
            $msg = "<b>Hello $name.</b> <br> Your password is : $ps <br> Please Next Time Be Care And Not Share With Any Other.";
            $title = "Member Password Recover";
            
            $result = $this->md->my_mailer($email,$title,$msg);
            echo $result;
        }
        else
        {
            echo 2;
        }
    }

        public function user_forget_ps()
    {
        $wh['email'] = $this->input->post('email');
        $record = $this->md->my_select('tbl_register','*',$wh);
        
        $count = count($record);
        
        if ($count == 1)
        {
            $ps = $this->encryption->decrypt($record[0]->password);
            
            $email= $record[0]->email;
//            $email= $this->input->post('email');  //or
            $name = $record[0]->name;
            
            $msg = "<b>Hello $name,</b> <br>Your Forget Password is: $ps <br> Next Time be carefull and not share with any other. ";
            $title = "Memer Password Recover";
            
            $result = $this->md->my_mailer($email,$title,$msg);
            echo $result;
            
        }
        else
        {
            echo 2;
        }
        
    }

    

    public function city() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);
        echo '<option value="">Select City</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name ?></option>
            <?php
        }
    }
    
    public function peta() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category','*', $wh);
        echo '<option value="">Select Peta Category</option>';
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name ?></option>
            <?php
        }
    }
    
    
    public function change_status() {
        $action= $this->input->post('action');
        $id= $this->input->post('id');
        
        if ($action=="seller")
        {
            $wh['seller_id'] = $id;
            $status = $this->md->my_select('tbl_seller','status',$wh)[0]->status;
            
            if ($status == 1)
            {
                $data['status']=0;
            }
            else
            {
                $data['status']=1;
            }
            
            $this->md->my_update('tbl_seller',$data,$wh);
        }
        else if ($action=="product")
        {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product','status',$wh)[0]->status;
            
            if ($status == 1)
            {
                $data['status']=0;
            }
            else
            {
                $data['status']=1;
            }
            
            $this->md->my_update('tbl_product',$data,$wh);
        }
        else if ($action=="member")
        {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register','status',$wh)[0]->status;
            
            if ($status == 1)
            {
                $data['status']=0;
            }
            else
            {
                $data['status']=1;
            }
            
            $this->md->my_update('tbl_register',$data,$wh);
        }
        else if ($action=="review")
        {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review','status',$wh)[0]->status;
            
            if ($status == 1)
            {
                $data['status']=0;
            }
            else
            {
                $data['status']=1;
            }
            
            $this->md->my_update('tbl_review',$data,$wh);
        }
    }

    public function change_img()
    {
        $wh['image_id'] = $this->input->post('id');
        
        $this->session->set_userdata('image_id',$this->input->post('id'));

        $multipath = $this->md->my_select('tbl_product_image','*',$wh)[0]->path;
        $path = explode(",",$multipath);
        
        ?>
        
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-right-nav">
                                <?php
                                $c = 0;

                                foreach ($path as $single) {
                                    $c++;
                                    ?>
                                    <div>
                                        <img src="<?php echo base_url() . $single; ?>" alt="" class="img-fluid  image_zoom_cls-<?php echo $c; ?>">
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
                        foreach ($path as $single) 
                        {
                            ?>
                            <div>
                                <img src="<?php echo base_url() . $single; ?>" alt="" class="img-fluid  image_zoom_cls-0">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <?php
            $this->load->view('footerscript');
    }
    
    public function change_price()
    {
        $wh['image_id'] = $this->input->post('id');
        $ram = $this->md->my_select('tbl_product_image','*',$wh)[0]->ram;
        $this->session->set_userdata('ram',$ram);
        
        
        $record = $this->md->my_select('tbl_product_image','*',$wh)[0];
        $detail = $this->md->my_select('tbl_product', '*', array('product_id'=>$record->product_id))[0];
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
                                    
    }

        public function change_stock()
    {
        $wh['image_id'] = $this->input->post('id');
        $stock = $this->md->my_select('tbl_product_image','*',$wh)[0]->qty;
        echo $stock;
    }
    
    public function change_cartbtn()
    {
        $wh['image_id'] = $this->input->post('id');
        $data = $this->md->my_select('tbl_product_image','*',$wh);
        
        
        $stock = $data[0]->qty;
        $product= $data[0]->product_id;
        
        if($stock > 0)
        {
            $cart['register_id'] = $this->session->userdata('user');
            $cart['product_id'] = $product;
            $cart['image_id'] = $this->input->post('id');

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
            <a  onclick="add_cart(<?php echo $product ?>);" class="btn btn-normal">
                <i class="fa fa-shopping-cart"></i> add to cart
            </a>
            <?php
            }
        }
        else
        {
        ?>
            <a  data-toggle="modal" data-target="#addtocart" class="btn btn-normal">
                <i class="fa fa-shopping-cart"></i> out of stock
            </a>  
        <?php
        }
    }
    
    public function add_wish()
    {
        $wh['product_id'] = $this->input->post('id');
        $wh['register_id'] = $this->session->userdata('user');
        echo $this->md->my_insert('tbl_wishlist',$wh);
       
    }
    
    public function add_cart()
    {
        $wh['product_id'] = $this->input->post('id');
        if ($this->session->userdata('ram'))
        {
            $wh['image_id'] =$this->md->my_select('tbl_product_image','*',array('product_id'=>$this->input->post('id'),'ram'=>$this->session->userdata('ram')))[0]->image_id;
        
            
        }
        else
        {
        $wh['image_id'] = $this->session->userdata('image_id');
        }
        
        $product = $this->md->my_select('tbl_product_image','*',$wh )[0];
        $detail = $this->md->my_select('tbl_product','*',array('product_id'=>$this->input->post('id')));
        $offer_id = $detail[0]->offer_id;
        
        $comm = $this->md->my_select('tbl_commission','*')[0]->rate;
        $price = $product->price;
        $price = floor($price + ($price * $comm)/100);
        
        $ins['register_id'] = $this->session->userdata('user');
        $ins['product_id'] = $this->input->post('id');
        $ins['image_id'] = $this->session->userdata('image_id');
        $ins['gross_price'] = $price;
        
        if ($offer_id > 0)
        {
            $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$offer_id))[0]->rate;
            $discount = round(($price * $rate)/100);
            $ins['discount'] = $discount;
            
            $ins['net_price'] = $price - $discount;
            $ins['total_price'] = $price - $discount;
            
        }
        else
        {
            $ins['discount'] = 0;
            $ins['net_price'] =  $price;
            $ins['total_price'] = $price;
        }
        $ins['qty'] = 1;
        
        echo $this->md->my_insert('tbl_cart',$ins);
        
        if($this->session->userdata('ram'))
        {
            $this->session->unset_userdata('ram');
        }
    }
    
    public function add_review()
    {
       $ins['register_id'] = $this->session->userdata('user');
       $ins['product_id'] = $this->input->post('id');
       $ins['rating'] = $this->input->post('rate');
       $ins['msg'] = $this->input->post('msg');
       $ins['date'] = date('Y-m-d h:i:s');
       $ins['status'] = 0;
       
       echo $this->md->my_insert('tbl_review',$ins);
    }
    
    public function clear_cart()
    {
        $this->md->my_delete('tbl_cart',array('register_id'=>$this->session->userdata('user')));
        
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
                                        <a onclick="delete_cartitem(<?php echo $item->cart_id;?>);" class="btn" style="  background: #caf7fc; font-size: 12px; border: 1px solid #00baf2; border-radius: 5px; padding: 4px 5px;">remove</a>
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
                                <p><?php echo $final_price; ?></p></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="#" class="btn btn-normal">continue shopping</a> <a href="#" class="btn btn-normal ml-3">check out</a></div>
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
        
    }
    
    public function delete_cartitem()
    {
        $wh['cart_id'] = $this->input->post('id');
        $this->md->my_delete('tbl_cart',$wh);
        
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
                                        <a onclick="delete_cartitem(<?php echo $item->cart_id;?>);" class="btn" style="  background: #caf7fc; font-size: 12px; border: 1px solid #00baf2; border-radius: 5px; padding: 4px 5px;">remove</a>
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
                                <p><?php echo $final_price; ?> /-</p>
                            </td>
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
    }
    
    public function change_qty()
    {
        $cart_id = $this->input->post('id');
        $qty = $this->input->post('qty');
        
        $wh['cart_id'] = $cart_id;
        $net = $this->md->my_select('tbl_cart','*',$wh)[0]->net_price;
        
        $up['qty'] = $qty;
        $up['total_price'] = $net * $qty;
        
        $this->md->my_update('tbl_cart',$up,$wh);
        
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
                                        <a onclick="delete_cartitem(<?php echo $item->cart_id;?>);" class="btn" style="  background: #caf7fc; font-size: 12px; border: 1px solid #00baf2; border-radius: 5px; padding: 4px 5px;">remove</a>
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
                                <p><?php echo $final_price; ?> /-</p>
                            </td>
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
        
    }
    
    public function set_address()
    {
        $ship_id = $this->input->post('id');
        $this->session->set_userdata('shipment_id',$ship_id);
//        
        ?>
            <div class="panel-body row">
                <?php
                $address = $this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('user')));
                
                
                foreach ($address as $data) {

                    if ($this->session->userdata('shipment_id') == $data->shipment_id) 
                        {
                        ?>
                        <div class="col-md-3" style=" border-bottom: 0px;  margin-top:10px;margin-left:65px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <p style="margin-top:10px; min-height:80px"><?php echo $data->address; ?></p>
                                    <p style="margin-top:10px;border-bottom:0px;">Type: <?php echo $data->address_type; ?></p>
                                    <a  style="margin-top:10px;background:#000; color: white;" class="btn">DELIVER HERE ?</a>
                                </div>

                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-3" style=" border-bottom: 0px;  margin-top:10px;margin-left:65px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <p style="margin-top:10px; min-height:80px"><?php echo $data->address; ?></p>
                                    <p style="margin-top:10px;border-bottom:0px;">Type: <?php echo $data->address_type; ?></p>
                                    <a onclick="set_address(<?php echo $data->shipment_id ?>)" style="margin-top:10px;background:#00baf2; color: white;" class="btn">DELIVER HERE ?</a>
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <?php
                }
                ?>


            </div>
            <a href="<?php echo base_url(); ?>member-address">
                <div style="border: 2px solid #00baf2; text-align: center; margin: 50px; height:50px;">
                    <p style="margin-top: 10px; color: #00baf2"> + ADD NEW ADDRESS</p>
                </div>
            </a>
        <?php
    }
    
    public function set_promocode()
    {
        $code = $this->input->post('code');
        $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
        
        $wh['code'] = $code;
        $wh['status'] = 1;
        $wh['min_bill_price <='] = $billprice;
        
        $codedata = $this->md->my_select('tbl_promocode','*',$wh);
        $count = count($codedata);
        
        if($count == 1)
        {
            $this->session->set_userdata('promocode_id',$codedata[0]->promocode_id);
            

            ?>
            <?php
                if($this->session->userdata('promocode_id'))
                {
                    $code_detail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                    $amount = $code_detail->amount;

                    $pay_price = $billprice -$amount;
                ?>
                <button type="submit" name="checkout" value="yes"  style="margin:10px;background:#00baf2; color: white;" class="btn" value="">PAY RS. <?php echo $pay_price; ?> /-SECURELY</button>
                <div class="text-success"><?php echo $code_detail->code; ?> is applied successfully and Rs. <?php echo $amount; ?> /- is deduct from Rs. <?php echo $billprice; ?> /-</div>
                <?php    
                }
                else
                {
                    echo $this->session->userdata('promocode_id');
                ?>
                <button type="submit" name="checkout" value="yes"  style="margin:10px;background:#00baf2; color: white;" class="btn" value="">PAY RS. <?php echo $billprice; ?> /-SECURELY</button>
                
                <?php
                }
            
        }
        else
        {
            echo 2;
        }
    }
    
    public function admin_viewbill()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if($action =="billno")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_id'=>$id));
        }
        else if($action =="date")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_date'=>$id));
        }
        else if($action =="productname")
        {
            $billdata = $this->md->my_query("SELECT b.* FROM `tbl_bill` AS b , `tbl_transaction` AS t WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = $id");
        }
        else if($action =="country")
        {
            $shipment_id = $this->md->my_select('tbl_shipment','*',array('location_id'=>$id))->shipment_id;
            $billdata = $this->md->my_select('tbl_bill','*',array('shipment_id'=>$shipment_id));
        }
        else if($action =="member")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('register_id'=>$id));
        }
        else if($action =="pay_type")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('pay_type'=>$id));
        }
        else if($action =="promocode")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('promocode_id'=>$id));
        }
        
        ?>
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title"><?php 
            if($action == "billno")
            {
                echo "Search Result For Bill No. $id";
            }
            else if($action == "date")
            {
                echo "Search Result For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            else if($action == "productname")
            {
                echo "Search Result For Product Name.";
            }
            else if($action == "country")
            {
                echo "Search Result For Country.";
            }
            else if($action == "state")
            {
                echo "Search Result For State.";
            }
            else if($action == "city")
            {
                echo "Search Result For City.";
            }
            else if($action == "pay_type")
            {
                if($id == "card")
                {
                echo "Search Result For Payment By Card.";
                }
                else
                {
                echo "Search Result For Payment By Cash On Delivery.";    
                }
                
            }
            else if($action == "promocode")
            {
                echo "Search Result For Promocode.";
            }
            ?></h2>
        </header>
        <div class="panel-body">
            <?php
            foreach($billdata as $data)
            {
            ?>
            <div class="inner-div" id="printableArea<?php echo $data->bill_id; ?>">
                <div class="content-info">
                    <div class="content-detail">
                        <p>invoice generated on : <?php echo date('d-m-Y', strtotime($data->bill_date)); ?><br>
                        <b>Retail / TextInvoice / Cash Memorandum</b><br>
                        <?php
                        if($data->pay_type=="cod")
                        {
                        ?>
                        <b>Payment Mode : Cash On Delivery</b><br>
                        <?php
                        }
                        else
                        {
                        ?>
                        <b>Payment Mode : Card Payment</b><br>
                        <?php
                        }
                        ?>
                        </p>
                        
                        <p>
                            <b>Sold By : </b><br>
                            <?php
                            $seller = $this->md->my_query("SELECT s.* FROM `tbl_bill` AS b , `tbl_transaction` AS t , `tbl_product` AS p , `tbl_seller` AS s WHERE t.`bill_id` = b.`bill_id` AND  t.`product_id` = p.`product_id` AND p.`seller_id` = s.`seller_id` AND b.`bill_id`=".$data->bill_id)[0];
                            ?>
                            <b><?php echo $seller->company_name; ?></b><br>
                            <?php echo $seller->address; ?><br>
                        </p>
                        
                        <b>GST No.: <?php echo $seller->gst_no; ?></b>&nbsp;&nbsp;&nbsp;<b>PAN No.: <?php echo $seller->pan_no; ?></b>
                    </div>
                    <div class="content-barcode">
                        <!--<img>-->
                    </div>
                </div>
                <div class="hr-line"></div>
                <div class="content-info row" style="display:flex;">
                    <div class="content-detail col-md-6">
                        <?php
                        $user = $this->md->my_query("SELECT r.* FROM `tbl_bill`AS b , `tbl_register` AS r WHERE b.`register_id` = r.`register_id` AND `bill_id`=".$data->bill_id)[0];
                        $shipment = $this->md->my_query("SELECT s.* FROM `tbl_bill` AS b, `tbl_shipment` AS s WHERE b.`shipment_id` = s.`shipment_id` AND `bill_id` =".$data->bill_id)[0];
                        
                        ?>
                        <p><b>Billing Address</b></p>
                        <p>
                            <?php echo $user->name; ?><br>
                            <?php echo $shipment->address; ?><br>
                            
                        </p>
                        <p>
                            <b>Mobile : <?php echo $user->mobile; ?></b><br>
                            <b>Email : <?php echo $user->email; ?></b>
                        </p>
                    </div>
                    <div class="content-detail col-md-6">
                        <?php
                        $user = $this->md->my_query("SELECT r.* FROM `tbl_bill`AS b , `tbl_register` AS r WHERE b.`register_id` = r.`register_id` AND `bill_id`=".$data->bill_id)[0];
                        ?>
                        <p><b>shipping Address</b></p>
                        <p>
                            <?php echo $user->name; ?><br>
                            <?php echo $shipment->address; ?><br>
                        </p>
                        <p>
                            <b>Mobile : <?php echo $user->mobile; ?></b><br>
                            <b>Email : <?php echo $user->email; ?></b>
                        </p>
                    </div>
                </div>
                <div class="hr-line"></div>
                <div>
                    <div class="bill-table row">
                        <table style="width:calc(100% - 30px); margin: 0px auto;">
                            <thead>
                                <tr style="border-bottom:2px solid #ddd;">
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Description</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Gross Amt. (&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Discount(&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Net Amt(&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Qty</th> 
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Final Amt(&#8377; )</th> 
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $total = 0;
                                $no = 0 ;
                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                foreach($tran as $tdata)
                                {
                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                    $total = $total + $tdata->total_price;
                                    $no++;
                                    
                                
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $no; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $product->name;; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->gross_price; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->discount; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->net_price; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->qty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->total_price; ?></td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>Total Amount</b></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $total; ?> /-</td>
                                </tr>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>(-) Coupon</b></td>
                                    <?php
                                    if($data->promocode_id == 0)
                                    {
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. 0 /-</td>
                                    <?php
                                    }
                                    else
                                    {
                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$data->promocode_id))[0];
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $promocode->amount; ?> /-</td>
                                    <?php
                                    }
                                    ?>
                                    
                                </tr>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>Total Paid Amount</b></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $data->amount; ?> /-</td>
                                </tr>
                                <tr>
                                    <td colspan="5">*This is Computer generated invoice. If you have a queries then Contact Us.</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"></td>
                                    <td style="vertical-align: middle; padding: 20px 0px; text-align: center;">
                                        <input type="button" class="btn" value="print" style="background: #00baf2; padding: 5px 20px; color: white" onclick="printDiv('printableArea<?php echo $data->bill_id; ?>')"   > 
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                
            </div>
            <?php
            }
            ?>
        </div>
                
                <script type="text/javascript">
                function printDiv(divName) 
                {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
                </script>
        <?php
    }
    
    public function member_viewbill()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $user= $this->session->userdata['user'];
        
        if($action =="billno")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_id'=>$id , 'register_id'=>$user));
        }
        else if($action =="date")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_date'=>$id , 'register_id'=>$user));
        }
        else if($action =="productname")
        {
            $billdata = $this->md->my_query("SELECT b.* FROM `tbl_bill` AS b , `tbl_transaction` AS t WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = $id");
        }
        else if($action =="country")
        {
            $shipment_id = $this->md->my_select('tbl_shipment','*',array('location_id'=>$id))->shipment_id;
            $billdata = $this->md->my_select('tbl_bill','*',array('shipment_id'=>$shipment_id));
        }
        else if($action =="member")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('register_id'=>$user));
        }
        else if($action =="pay_type")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('pay_type'=>$id , 'register_id'=>$user));
        }
        else if($action =="promocode")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('promocode_id'=>$id , 'register_id'=>$user));
        }
        
        ?>
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title"><?php 
            if($action == "billno")
            {
                echo "Search Result For Bill No. $id";
            }
            else if($action == "date")
            {
                echo "Search Result For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            else if($action == "productname")
            {
                echo "Search Result For Product Name.";
            }
            else if($action == "country")
            {
                echo "Search Result For Country.";
            }
            else if($action == "state")
            {
                echo "Search Result For State.";
            }
            else if($action == "city")
            {
                echo "Search Result For City.";
            }
            else if($action == "pay_type")
            {
                if($id == "card")
                {
                echo "Search Result For Payment By Card.";
                }
                else
                {
                echo "Search Result For Payment By Cash On Delivery.";    
                }
                
            }
            else if($action == "promocode")
            {
                echo "Search Result For Promocode.";
            }
            ?></h2>
        </header>
        <div class="panel-body">
            <?php
            foreach($billdata as $data)
            {
            ?>
            <div class="inner-div" id="printableArea<?php echo $data->bill_id; ?>">
                <div class="content-info">
                    <div class="content-detail">
                        <p>invoice generated on : <?php echo date('d-m-Y', strtotime($data->bill_date)); ?><br>
                        <b>Retail / TextInvoice / Cash Memorandum</b><br>
                        <?php
                        if($data->pay_type=="cod")
                        {
                        ?>
                        <b>Payment Mode : Cash On Delivery</b><br>
                        <?php
                        }
                        else
                        {
                        ?>
                        <b>Payment Mode : Card Payment</b><br>
                        <?php
                        }
                        ?>
                        </p>
                        
                        <p>
                            <b>Sold By : </b><br>
                            <?php
                            $seller = $this->md->my_query("SELECT s.* FROM `tbl_bill` AS b , `tbl_transaction` AS t , `tbl_product` AS p , `tbl_seller` AS s WHERE t.`bill_id` = b.`bill_id` AND  t.`product_id` = p.`product_id` AND p.`seller_id` = s.`seller_id` AND b.`bill_id`=".$data->bill_id)[0];
                            ?>
                            <b><?php echo $seller->company_name; ?></b><br>
                            <?php echo $seller->address; ?><br>
                        </p>
                        
                        <b>GST No.: <?php echo $seller->gst_no; ?></b>&nbsp;&nbsp;&nbsp;<b>PAN No.: <?php echo $seller->pan_no; ?></b>
                    </div>
                    <div class="content-barcode">
                        <!--<img>-->
                    </div>
                </div>
                <div class="hr-line"></div>
                <div class="content-info row" style="display:flex;">
                    <div class="content-detail col-md-6">
                        <?php
                        $user = $this->md->my_query("SELECT r.* FROM `tbl_bill`AS b , `tbl_register` AS r WHERE b.`register_id` = r.`register_id` AND `bill_id`=".$data->bill_id)[0];
                        $shipment = $this->md->my_query("SELECT s.* FROM `tbl_bill` AS b, `tbl_shipment` AS s WHERE b.`shipment_id` = s.`shipment_id` AND `bill_id` =".$data->bill_id)[0];
                        
                        ?>
                        <p><b>Billing Address</b></p>
                        <p>
                            <?php echo $user->name; ?><br>
                            <?php echo $shipment->address; ?><br>
                            
                        </p>
                        <p>
                            <b>Mobile : <?php echo $user->mobile; ?></b><br>
                            <b>Email : <?php echo $user->email; ?></b>
                        </p>
                    </div>
                    <div class="content-detail col-md-6">
                        <?php
                        $user = $this->md->my_query("SELECT r.* FROM `tbl_bill`AS b , `tbl_register` AS r WHERE b.`register_id` = r.`register_id` AND `bill_id`=".$data->bill_id)[0];
                        ?>
                        <p><b>shipping Address</b></p>
                        <p>
                            <?php echo $user->name; ?><br>
                            <?php echo $shipment->address; ?><br>
                        </p>
                        <p>
                            <b>Mobile : <?php echo $user->mobile; ?></b><br>
                            <b>Email : <?php echo $user->email; ?></b>
                        </p>
                    </div>
                </div>
                <div class="hr-line"></div>
                <div>
                    <div class="bill-table row">
                        <table style="width:calc(100% - 30px); margin: 0px auto;">
                            <thead>
                                <tr style="border-bottom:2px solid #ddd;">
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Description</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Gross Amt. (&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Discount(&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Net Amt(&#8377; )</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Qty</th> 
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Final Amt(&#8377; )</th> 
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $total = 0;
                                $no = 0 ;
                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                foreach($tran as $tdata)
                                {
                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                    $total = $total + $tdata->total_price;
                                    $no++;
                                    
                                
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $no; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $product->name;; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->gross_price; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->discount; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->net_price; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->qty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->total_price; ?></td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>Total Amount</b></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $total; ?> /-</td>
                                </tr>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>(-) Coupon</b></td>
                                    <?php
                                    if($data->promocode_id == 0)
                                    {
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. 0 /-</td>
                                    <?php
                                    }
                                    else
                                    {
                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$data->promocode_id))[0];
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $promocode->amount; ?> /-</td>
                                    <?php
                                    }
                                    ?>
                                    
                                </tr>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><b>Total Paid Amount</b></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;">Rs. <?php echo $data->amount; ?> /-</td>
                                </tr>
                                <tr>
                                    <td colspan="5">*This is Computer generated invoice. If you have a queries then Contact Us.</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"></td>
                                    <td style="vertical-align: middle; padding: 20px 0px; text-align: center;">
                                        <input type="button" class="btn" value="print" style="background: #00baf2; padding: 5px 20px; color: white" onclick="printDiv('printableArea<?php echo $data->bill_id; ?>')"    
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                
            </div>
            <?php
            }
            ?>
        </div>
                
                <script type="text/javascript">
                function printDiv(divName) 
                {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
                </script>
        <?php
    }
    
    public function admin_transaction()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if($action =="billno")
        {
            $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$id));
        }
        else if($action =="date")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`bill_date` = '$id'");
        }
        else if($action =="productname")
        {
            $tran = $this->md->my_select('tbl_transaction','*',array('product_id'=>$id));
        }
        else if($action =="country")
        {
            $shipment_id = $this->md->my_select('tbl_shipment','*',array('location_id'=>$id))->shipment_id;
            $billdata = $this->md->my_select('tbl_bill','*',array('shipment_id'=>$shipment_id));
        }
        else if($action =="member")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND r.`register_id`= $id");
        }
        else if($action =="pay_type")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`pay_type`= '$id'");
        }
        else if($action =="promocode")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`promocode_id`=$id");
        }
        
        ?>
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title"><?php 
            if($action == "billno")
            {
                echo "Report For Bill No. $id";
            }
            else if($action == "date")
            {
                echo "Report For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            else if($action == "productname")
            {
                echo "Report For Product Name.";
            }
            else if($action == "country")
            {
                echo "Report For Country.";
            }
            else if($action == "state")
            {
                echo "Report For State.";
            }
            else if($action == "city")
            {
                echo "Report For City.";
            }
            else if($action == "pay_type")
            {
                if($id == "card")
                {
                echo "Report For Payment By Card.";
                }
                else
                {
                echo "Report For Payment By Cash On Delivery.";    
                }
                
            }
            else if($action == "promocode")
            {
                echo "Report For Promocode.";
            }
            ?></h2>
        </header>
        <div class="panel-body">
            <?php
            $bill = $this->md->my_query("SELECT b.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND t.`bill_id`=".$tran[0]->bill_id)[0]; 
            ?>
            <div class="inner-div" id="printableArea">
                <div class="content-info">
                    <div class="content-detail">
                        <p style="text-align:right;">invoice generated on : <?php echo date('d-m-Y', strtotime($bill->bill_date)); ?><br>
                        </p>
                        
                        <p>
                        <h2>Mobile Corner</h2>
                            the perfect experience
                            
                        </p>
                        <?php
                        $member = $this->md->my_query("SELECT r.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND t.`transaction_id`=".$tran[0]->transaction_id)[0] ;
                        ?>
                        <p style="text-align:center;"><b>Transaction Report of <?php echo $member->name; ?></b></p><br><br><br>
                    </div>
                    
                </div>
                <div class="bhr-line"></div>
                                
                <div>
                    <div class="bill-table row">
                        <table style="width:calc(100% - 30px); margin: 0px auto;">
                            <thead>
                                <tr style="border-bottom:2px solid #ddd;">
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Bill No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Product Name</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Member</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Seller</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Price. (&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Discount(&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Net Amt(&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Qty</th> 
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Final Amt(&#8377;)</th> 
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $tprice = 0;
                                $tdisc = 0;      
                                $tnet = 0;      
                                $tqty = 0;
                                $total = 0;
                                $no = 0 ;
//                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                foreach($tran as $tdata)
                                {
                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                    $tprice = $tprice + $tdata->gross_price;
                                    $tdisc = $tdisc + $tdata->discount;
                                    $tnet = $tnet + $tdata->net_price;
                                    $tqty = $tqty + $tdata->qty;
                                    $total = $total + $tdata->total_price;
                                    $no++;
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $no; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->bill_id; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $product->name;; ?></td>
                                    <?php
                                    $member = $this->md->my_query("SELECT r.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND t.`transaction_id`=".$tdata->transaction_id)[0];
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $member->name;; ?></td>
                                    <?php
                                    $seller = $this->md->my_query("SELECT s.* FROM `tbl_transaction` AS t , `tbl_product` AS p , `tbl_seller` AS s WHERE  t.`product_id` = p.`product_id` AND p.`seller_id` = s.`seller_id` AND t.`transaction_id`=".$tdata->transaction_id)[0];
                                    
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $seller->company_name; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->gross_price; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->discount; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->net_price; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->qty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->total_price; ?> /-</td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tprice; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdisc; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tnet; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tqty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $total; ?> /-</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="8">*This is Computer generated invoice. If you have a queries then Contact Us.</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"></td>
                                    <td style="vertical-align: middle; padding: 20px 0px; text-align: center;">
                                        <input type="button" class="btn" value="print" style="background: #00baf2; padding: 5px 20px; color: white" onclick="printDiv('printableArea')"    
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                
            </div>
            <?php
//            }
            ?>
        </div>
                
                <script type="text/javascript">
                function printDiv(divName) 
                {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
                </script>
        <?php
    }

    public function member_order()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if($action =="billno")
        {
            $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$id));
        }
        else if($action =="date")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`bill_date` = '$id'");
        }
        else if($action =="productname")
        {
            $tran = $this->md->my_select('tbl_transaction','*',array('product_id'=>$id));
        }
        else if($action =="country")
        {
            $shipment_id = $this->md->my_select('tbl_shipment','*',array('location_id'=>$id))->shipment_id;
            $billdata = $this->md->my_select('tbl_bill','*',array('shipment_id'=>$shipment_id));
        }
        else if($action =="member")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND r.`register_id`= $id");
        }
        else if($action =="pay_type")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`pay_type`= '$id'");
        }
        else if($action =="promocode")
        {
            $tran = $this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND b.`promocode_id`=$id");
        }
        
        ?>
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title"><?php 
            if($action == "billno")
            {
                echo "Report For Bill No. $id";
            }
            else if($action == "date")
            {
                echo "Report For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            else if($action == "productname")
            {
                echo "Report For Product Name.";
            }
            else if($action == "country")
            {
                echo "Report For Country.";
            }
            else if($action == "state")
            {
                echo "Report For State.";
            }
            else if($action == "city")
            {
                echo "Report For City.";
            }
            else if($action == "pay_type")
            {
                if($id == "card")
                {
                echo "Report For Payment By Card.";
                }
                else
                {
                echo "Report For Payment By Cash On Delivery.";    
                }
                
            }
            else if($action == "promocode")
            {
                echo "Report For Promocode.";
            }
            ?></h2>
        </header>
        <div class="panel-body">
            <?php
            $bill = $this->md->my_query("SELECT b.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE t.`bill_id` = b.`bill_id` AND t.`bill_id`=".$tran[0]->bill_id)[0]; 
            ?>
            <div class="inner-div" id="printableArea">
                <div class="content-info">
                    <div class="content-detail">
                        <p style="text-align:right;">invoice generated on : <?php echo date('d-m-Y', strtotime($bill->bill_date)); ?><br>
                        </p>
                        
                        <p>
                        <h2>Mobile Corner</h2>
                            the perfect experience
                            
                        </p>
                        <?php
                        $member = $this->md->my_query("SELECT r.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND t.`transaction_id`=".$tran[0]->transaction_id)[0] ;
                        ?>
                        <p style="text-align:center;"><b>Transaction Report of <?php echo $member->name; ?></b></p><br><br><br>
                    </div>
                    
                </div>
                <div class="bhr-line"></div>
                                
                <div>
                    <div class="bill-table row">
                        <table style="width:calc(100% - 30px); margin: 0px auto;">
                            <thead>
                                <tr style="border-bottom:2px solid #ddd;">
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Bill No</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Product Name</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Member</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Seller</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Price. (&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Discount(&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Net Amt(&#8377;)</th>
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Qty</th> 
                                    <th style="vertical-align: middle; padding-bottom: 5px; text-align: center;">Final Amt(&#8377;)</th> 
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $tprice = 0;
                                $tdisc = 0;      
                                $tnet = 0;      
                                $tqty = 0;
                                $total = 0;
                                $no = 0 ;
//                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                foreach($tran as $tdata)
                                {
                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                    $tprice = $tprice + $tdata->gross_price;
                                    $tdisc = $tdisc + $tdata->discount;
                                    $tnet = $tnet + $tdata->net_price;
                                    $tqty = $tqty + $tdata->qty;
                                    $total = $total + $tdata->total_price;
                                    $no++;
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $no; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->bill_id; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $product->name;; ?></td>
                                    <?php
                                    $member = $this->md->my_query("SELECT r.* FROM `tbl_transaction` AS t , `tbl_bill` AS b , `tbl_register` AS r WHERE t.`bill_id` = b.`bill_id` AND b.`register_id` = r.`register_id` AND t.`transaction_id`=".$tdata->transaction_id)[0];
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $member->name;; ?></td>
                                    <?php
                                    $seller = $this->md->my_query("SELECT s.* FROM `tbl_transaction` AS t , `tbl_product` AS p , `tbl_seller` AS s WHERE  t.`product_id` = p.`product_id` AND p.`seller_id` = s.`seller_id` AND t.`transaction_id`=".$tdata->transaction_id)[0];
                                    
                                    ?>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $seller->company_name; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->gross_price; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->discount; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->net_price; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->qty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdata->total_price; ?> /-</td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr style="border-bottom:1px solid #ddd; ">
                                    <td colspan="5"></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tprice; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tdisc; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tnet; ?> /-</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $tqty; ?></td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"><?php echo $total; ?> /-</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="8">*This is Computer generated invoice. If you have a queries then Contact Us.</td>
                                    <td style="vertical-align: middle; padding: 5px 0px; text-align: center;"></td>
                                    <td style="vertical-align: middle; padding: 20px 0px; text-align: center;">
                                        <input type="button" class="btn" value="print" style="background: #00baf2; padding: 5px 20px; color: white" onclick="printDiv('printableArea')"    
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                
            </div>
            <?php
//            }
            ?>
        </div>
                
                <script type="text/javascript">
                function printDiv(divName) 
                {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
                </script>
        <?php
    }


    public function view_more()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        
//        echo $action;
//        echo $id;
//        echo $limit;
//        die();
      ?>
                 <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <?php
                                                                if($action == "main")
                                                                {
                                                                    $product = $this->md->my_query(" SELECT * FROM `tbl_product` WHERE `status` = 1 AND `main_id` = $id LIMIT 0,$limit");
                                                                    
                                                                }
                                                                else if($action == "sub")
                                                                {
                                                                    
                                                                    $product = $this->md->my_query(" SELECT * FROM `tbl_product` WHERE `status` = 1 AND `sub_id` = $id LIMIT 0,$limit");
                                                                }
                                                                else if($action == "peta")
                                                                {
                                                                    
                                                                    $product = $this->md->my_query(" SELECT * FROM `tbl_product` WHERE `status` = 1 AND `peta_id` = $id LIMIT 0,$limit");
                                                                }
                                                                else if($action == "search")
                                                                {
                                                                    $value = $id;
                                                                    
                                                                    $search = str_replace("%20"," ",$value);
                                                                    
                                                                    $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `name` LIKE '%".$value."%' LIMIT 0,$limit;");
                                                                }
                                                                else
                                                                {
                                                                    $product = $this->md->my_query(" SELECT * FROM `tbl_product` WHERE `status` = 1 LIMIT 0,$limit");
                                                                }
                                                                $count = count($product);
                                                        ?>
                                                        <h5>Showing Products <?php echo $count; ?> Result</h5></div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select>
                                                            <option value="High to low">24 Products Par Page</option>
                                                            <option value="Low to High">50 Products Par Page</option>
                                                            <option value="Low to High">100 Products Par Page</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                            <option value="High to low">Sorting items</option>
                                                            <option value="Low to High">50 Products</option>
                                                            <option value="Low to High">100 Products</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            <?php
                                            if($count == 0)
                                            {
                                            ?>
                                            
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-xs-3 col-sm-3 col-md-2" style="margin-top:20px; margin-left:40%;">

                                                            <i  class="fa fa-frown-o" aria-hidden="true" style="font-size: 190px; color: #ddd"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-sm-5 col-md-12">
                                                            <h3 style="color: #ddd; text-align: center;">Oops! This Product Not Available</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-sm-5 col-md-5" style="margin-left:43%; margin-top: 50px;">
                                                            <?php
                                                                    echo anchor('home','Continue Shopping');

                                                            ?>
                                                        </div>
                                                    </div>

                                            <?php
                                            }
                                            else 
                                            {
                                            foreach ($product as $data)
                                            {
                                                $wh['product_id'] = $data->product_id;
                                                $record = $this->md->my_select('tbl_product_image','*',$wh)[0];
                                            ?>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <?php
                                                                $multipath = $record->path;
                                                                $path = explode(",", $multipath);
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>
                                                            
                                                            <?php
                                                            if ($data->offer_id != 0)
                                                            {
                                                                $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$data->offer_id))[0]->rate;
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
                                                                        
                                                                        $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;
                                                                        $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;
                                                                        
                                                                        if ($totalrate == "")
                                                                        {
                                                                            $avg = 0;
                                                                        }
                                                                        else
                                                                        {
                                                                        $avg = round($totalrate/$totalrecord);
                                                                        }
                                                                        
                                                                        for($i=1;$i<=$avg;$i++)
                                                                        {
                                                                        ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php
                                                                        }
                                                                        
                                                                        $blank =5-$avg;
                                                                        
                                                                        for($i=1;$i<=$blank;$i++)
                                                                        {
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
                                                                    $com = $this->md->my_select('tbl_commission','rate')[0]->rate;
                                                                    $oprice = $record->price;
                                                                    $price = floor($oprice + (($oprice * $com)/100));
                                                                    ?>
                                                                    <?php
                                                                        if($data->offer_id != 0)
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
                                                                        }
                                                                        else
                                                                        {
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
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <br> <br>
                        <div class="col-md-2" style="margin-left: 38%;" >
                            <?php
                            $limit = $limit + 3;
                            ?>
                            <a onclick="view_more('<?php echo $action;?>',<?php echo $id;?>,<?php echo $limit;?>);" class="btn btn-primary" style="background: #ebfdff; color: black; padding: 10px 20px;" >View More Products</a>
                        </div>
                                     <br> <br>
        <?php
        
    }
    
    public function filter_panel()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        
        $sql = "SELECT * FROM `tbl_product` WHERE ";
        if($this->input->post('maincategory'))
        {
            $id = implode(",", $this->input->post('maincategory'));
            $sql .= "`sub_id` IN($id)";
        }
      if($this->input->post('subcategory'))
        {
            $id = implode(",", $this->input->post('subcategory'));
            $sql .= "`peta_id` IN($id)";
        }
         
       if($this->input->post('clr'))
        {
            $clr = implode("','", $this->input->post('clr'));
            $sql .= " AND `product_id` IN( SELECT `product_id` FROM `tbl_product_image` WHERE `colour` IN ('".$clr."') )";
        }
        
        if($this->input->post('price'))
        {
            $price = $this->input->post('price')[0];
            
            $start = $price;
            $end = $start +9999;
           $sql .= " AND `product_id` IN( SELECT `product_id` FROM `tbl_product_image` WHERE `price` BETWEEN $start AND $end ) ";
            
        }
    
      
        $product = $this->md->my_query($sql);
      ?>
      <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <?php
                                                        $count = count($product);
                                                        ?>
                                                        <h5>Showing Products <?php echo $count; ?> Result</h5></div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="<?php echo base_url(); ?>assets/images/category/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select>
                                                            <option value="High to low">24 Products Par Page</option>
                                                            <option value="Low to High">50 Products Par Page</option>
                                                            <option value="Low to High">100 Products Par Page</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                            <option value="High to low">Sorting items</option>
                                                            <option value="Low to High">50 Products</option>
                                                            <option value="Low to High">100 Products</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            <?php
                                            if($count == 0)
                                            {
                                            ?>
                                            
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-xs-3 col-sm-3 col-md-2" style="margin-top:20px; margin-left:40%;">

                                                            <i  class="fa fa-frown-o" aria-hidden="true" style="font-size: 190px; color: #ddd"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-sm-5 col-md-12">
                                                            <h3 style="color: #ddd; text-align: center;">Oops! This Product Not Available</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="col-sm-5 col-md-5" style="margin-left:43%; margin-top: 50px;">
                                                            <?php
                                                                    echo anchor('home','Continue Shopping');

                                                            ?>
                                                        </div>
                                                    </div>

                                            <?php
                                            }
                                            else 
                                            {
                                            foreach ($product as $data)
                                            {
                                                $wh['product_id'] = $data->product_id;
                                                $record = $this->md->my_select('tbl_product_image','*',$wh)[0];
                                            ?>
                                            <div class="col-md-4 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <?php
                                                                $multipath = $record->path;
                                                                $path = explode(",", $multipath);
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $data->product_id; ?>">
                                                                <div class="product-front">                                                                
                                                                    <img style="height: 300px;" src="<?php echo base_url() . $path[0]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="height: 300px;" src="<?php echo base_url() . $path[1]; ?>" class="img-fluid   " alt="product">
                                                                </div>
                                                            </a>
                                                            
                                                            <?php
                                                            if ($data->offer_id != 0)
                                                            {
                                                                $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$data->offer_id))[0]->rate;
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
                                                                        
                                                                        $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;
                                                                        $totalrecord = $this->md->my_query("SELECT count(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;
                                                                        
                                                                        if ($totalrate == "")
                                                                        {
                                                                            $avg = 0;
                                                                        }
                                                                        else
                                                                        {
                                                                        $avg = round($totalrate/$totalrecord);
                                                                        }
                                                                        
                                                                        for($i=1;$i<=$avg;$i++)
                                                                        {
                                                                        ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <?php
                                                                        }
                                                                        
                                                                        $blank =5-$avg;
                                                                        
                                                                        for($i=1;$i<=$blank;$i++)
                                                                        {
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
                                                                    $com = $this->md->my_select('tbl_commission','rate')[0]->rate;
                                                                    $oprice = $record->price;
                                                                    $price = floor($oprice + (($oprice * $com)/100));
                                                                    ?>
                                                                    <?php
                                                                        if($data->offer_id != 0)
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
                                                                        }
                                                                        else
                                                                        {
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
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <br> <br>
                        <div class="col-md-2" style="margin-left: 38%;" >
                            <?php
                            $limit = $limit + 3;
                            ?>
                            <a onclick="view_more('<?php echo $action;?>',<?php echo $id;?>,<?php echo $limit;?>);" class="btn btn-primary" style="background: #ebfdff; color: black; padding: 10px 20px;" >View More Products</a>
                        </div>
                                     <br> <br>                                
                                     
      <?php
    }
}
