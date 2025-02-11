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
                        <?php
                $wish = $this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user')));
                $no=0;
                foreach ($wish as $data) 
                {
                    $name = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0]->name;
                    $multipath = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->path;
                    $pirice = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->price;
                    $path = explode(",", $multipath);
                    $no++;
                    ?>
                        <li>
                            <div class="media">
                                <a href="#" style="max-width:90px; min-width: 90px;">
                                    <img  alt="" class="mr-3" src="<?php echo base_url().$path[0]; ?>">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4 style="min-height: 50px;"><?php echo $name; ?></h4>
                                    </a>
                                    
                                    <h4>
                                        <h4>
                                        <span>Rs.<?php echo $pirice;?> /-</span>
                                    </h4>
                                        <span><a href="<?php echo base_url() ?>product-detail/<?php echo $data->product_id; ?>" target="_new">View Detail</a></span>
                                         <span data-toggle="modal" data-target="#myModal" style=" margin-left:20px; cursor: pointer;" class="center hidden-xs">
                                                <a href="<?php echo base_url() ?>delete/wish/<?php echo $data->wish_id; ?>" data-toggle="tooltip" title="Remove Wishlist" class="fa fa-trash" style="color: red;"></a>
                                          </span>
                                      
                                    </h4>
                                    
                                   
                                </div>
                            </div>
                          </li>

                    <?php
                    }
                    ?>
                    </ul>
                    <ul class="cart_total">
                        <?php
                        if($this->session->userdata('user'))
                        {
                        ?>
                        <li>
                            <div class="buttons">
                                <a href="<?php echo base_url(); ?>product-list/main/1" class="btn btn-normal btn-block  view-cart">Continue Shopping</a>
                            </div>
                        </li>
                        <?php
                        }
                        else
                        {
                        ?>
                        <li>
                            <div class="buttons">
                                <b>Login, then the wish list will appear</b>
                                <br></br>
                                <a href="<?php echo base_url(); ?>login" class="btn btn-normal btn-block  view-cart">Login</a>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>




