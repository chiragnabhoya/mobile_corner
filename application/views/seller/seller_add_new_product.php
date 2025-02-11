<!doctype html>
<html class="fixed">

    <?php
    $this->load->view('seller/headerlink');
    ?>
    <body>
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('seller/header');
            ?>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <?php
                $this->load->view('seller/menu');
                ?>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Add New Product</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>seller-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Add New Product</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row row-custom">

                        <?php
                        if ($this->session->userdata('productform') == 1) {

                            if ($this->session->userdata('lastproduct')) {
                                $wh['product_id'] = $this->session->userdata('lastproduct');
                                $setproduct = $this->md->my_select('tbl_product', '*', $wh);
                            }
                            ?>
                            <div class="col-md-12 ">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>
                                        <h2 class="panel-title">Add New Product ..</h2>
                                    </header>

                                    <form method="post" action="" name="form1">
                                        <div class="panel-body">
                                            <div class="validation-message">
                                                <ul></ul>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-6" >                                                
                                                    <select name="main" onchange="set_combo('sub', this.value)" class="form-control pro"  >
                                                        <option value="">Main Category</option>
                                                        <?php
                                                        foreach ($main as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->category_id; ?>" <?php
                                                            if (!isset($success) && set_select('main', $data->category_id)) {
                                                                echo set_select('main', $data->category_id);
                                                            } elseif (isset($setproduct)) {
                                                                if ($setproduct[0]->main_id == $data->category_id) {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> ><?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                                ?>

                                                    </select>

                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('main');
                                                        ?>                                                        
                                                    </div>

                                                    <select name="sub" id="sub" onchange="set_combo('peta', this.value)" class="form-control pro" >
                                                        <option value="">Sub Category</option>
                                                        <?php
                                                        if ($this->input->post('main')) {
                                                            $whh['parent_id'] = $this->input->post('main');
                                                            $record = $this->md->my_select('tbl_category', '*', $whh);

                                                            foreach ($record as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                    echo set_select('sub', $data->category_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    $where['parent_id'] = $setproduct[0]->main_id;
                                                                    $record = $this->md->my_select('tbl_category', '*', $where);

                                                                    foreach ($record as $data) {
                                                                        ?>
                                                                <option value="<?php echo $data->category_id ?>" <?php
                                                                if ($data->category_id == $setproduct[0]->sub_id) {
                                                                    echo "selected";
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?> 
                                                    </select>
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('sub');
                                                        ?>                                                        
                                                    </div>

                                                    <select name="peta"id="peta" class="form-control pro" >
                                                        <option value="">Peta Category</option>
                                                        <?php
                                                        if ($this->input->post('sub')) {
                                                            $whhh['parent_id'] = $this->input->post('sub');
                                                            $record = $this->md->my_select('tbl_category', '*', $whhh);

                                                            foreach ($record as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                    echo set_select('peta', $data->category_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    $whr['parent_id'] = $setproduct[0]->sub_id;
                                                                    $record = $this->md->my_select('tbl_category', '*', $whr);

                                                                    foreach ($record as $data) {
                                                                        ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if ($data->category_id == $setproduct[0]->peta_id) {
                                                                    echo "selected";
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                    </select>
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('peta');
                                                        ?>                                                        
                                                    </div>

                                                    <label >Product Description</label>
                                                    <textarea name="description" class="form-control " placeholder="Write Your Message" id="edit1" rows="2" style="resize: none"><?php
                                                        if (!isset($success) && set_value('description')) {
                                                            echo set_value('description');
                                                        } elseif (isset($setproduct)) {
                                                            echo $setproduct[0]->description;
                                                        }
                                                        ?></textarea>
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('description');
                                                        ?>                                                        
                                                    </div>

                                                    <input type="submit" name="add_product" style="margin-top: 10px;" class="btn btn-primary" value="Set Specification">
                                                    <input type="reset" style="margin-top: 10px;" class="btn btn-primary" value="Clear">
                                                </div>
                                                <div class="col-md-6" style="">
                                                    <input type="text" name="name" class="form-control pro" placeholder="Product Name" value="<?php
                                                    if (!isset($success) && set_value('name')) {
                                                        echo set_value('name');
                                                    } elseif (isset($setproduct)) {
                                                        echo $setproduct[0]->name;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>                                                        
                                                    </div>

                                                    <input type="text" name="code" class="form-control pro" placeholder="Product code" value="<?php
                                                    if (!isset($success) && set_value('code')) {
                                                        echo set_value('code');
                                                    } elseif (isset($setproduct)) {
                                                        echo $setproduct[0]->code;
                                                    }
                                                    ?>" >
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('code');
                                                        ?>                                                        
                                                    </div>

                                                    <label style="margin-top: 45px;" >Product Specification</label>
                                                    <textarea name="specification" class="form-control" placeholder="Write Your Message" id="edit2" rows="2" style="resize: none;"><?php
                                                        if (!isset($success) && set_value('specification')) {
                                                            echo set_value('specification');
                                                        } elseif (isset($setproduct)) {
                                                            echo $setproduct[0]->specification;
                                                        }
                                                        ?></textarea>
                                                    <div class="text-danger">
                                                        <?php
                                                        echo form_error('specification');
                                                        ?>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <?php
                        } elseif ($this->session->userdata('productform') == 2) {

                            $wh['product_id'] = $this->session->userdata('lastproduct');
                            $detail = $this->md->my_select('tbl_product', '*', $wh)[0];
                            ?>
                            <div class="col-md-12 ">

                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Product Image ..</h2>

                                    </header>
                                    <form method="post" action="" name="form2" enctype="multipart/form-data">
                                        <div class="panel-body">
                                            <div class="validation-message">
                                                <ul></ul>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6" >       
                                                        <input type="text" class="form-control pro" readonly="" disabled="" placeholder="Product Name" value="<?php echo $detail->name; ?>" style="margin-top: 0px;" name="company">

                                                        <select name="color" class="form-control pro"  >
                                                            <option value="">Color</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Black')) {
                                                                echo set_select('color', 'Black');
                                                            }
                                                            ?> >Black</option>
                                                             
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'White')) {
                                                                echo set_select('color', 'White');
                                                            }
                                                            ?> >White</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Blue')) {
                                                                echo set_select('color', 'Blue');
                                                            }
                                                            ?> >Blue</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Gold')) {
                                                                echo set_select('color', 'Gold');
                                                            }
                                                            ?> >Gold</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Silver')) {
                                                                echo set_select('color', 'Silver');
                                                            }
                                                            ?> >Silver</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Green')) {
                                                                echo set_select('color', 'Green');
                                                            }
                                                            ?> >Green</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Gray')) {
                                                                echo set_select('color', 'Gray');
                                                            }
                                                            ?> >Gray</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Red')) {
                                                                echo set_select('color', 'Red');
                                                            }
                                                            ?> >Red</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('color', 'Purple')) {
                                                                echo set_select('color', 'Purple');
                                                            }
                                                            ?> >Purple</option>
                                                           
                                                        </select>
                                                        <div class="text-danger">
                                                                <?php
                                                                echo form_error('color');
                                                                ?>
                                                        </div>

                                                        <select name="ram" class="form-control pro" >
                                                            <option value="">RAM</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('ram', '2 GB')) {
                                                            echo set_select('ram', '2 GB');
                                                        }
                                                                ?> >2 GB</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('ram', '3 GB')) {
                                                            echo set_select('ram', '3 GB');
                                                        }
                                                        ?> >3 GB</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('ram', '4 GB')) {
                                                                echo set_select('ram', '4 GB');
                                                            }
                                                            ?> >4 GB</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('ram', '6 GB')) {
                                                                echo set_select('ram', '6 GB');
                                                            }
                                                            ?> >6 GB</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('ram', '8 GB')) {
                                                            echo set_select('ram', '8 GB');
                                                        }
                                                            ?> >8 GB</option>
                                                            <option <?php
                                                                if (!isset($success) && set_select('ram', '12 GB')) {
                                                                    echo set_select('ram', '12 GB');
                                                                }
                                                                ?> >12 GB</option>
                                                        </select>
                                                        <div class="text-danger">
                                                                <?php
                                                                echo form_error('ram');
                                                                ?>
                                                        </div>

                                                        <select name="internal" class="form-control pro" >
                                                            <option value="">Internal Storage</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('internal', '8 GB')) {
                                                                echo set_select('internal', '8 GB');
                                                            }
                                                            ?> >8 GB</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('internal', '16 GB')) {
                                                            echo set_select('internal', '16 GB');
                                                        }
                                                            ?> >16 GB</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('internal', '32 GB')) {
                                                            echo set_select('internal', '32 GB');
                                                        }
                                                        ?> >32 GB</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('internal', '64 GB')) {
                                                                echo set_select('internal', '64 GB');
                                                            }
                                                            ?> >64 GB</option>
                                                            <option <?php
                                                        if (!isset($success) && set_select('internal', '128 GB')) {
                                                            echo set_select('internal', '128 GB');
                                                        }
                                                            ?> >128 GB</option>
                                                            <option <?php
                                                                if (!isset($success) && set_select('internal', '256 GB')) {
                                                                    echo set_select('internal', '256 GB');
                                                                }
                                                                ?> >256 GB</option>
                                                            <option <?php
                                                            if (!isset($success) && set_select('internal', '512 GB')) {
                                                                echo set_select('internal', '512 GB');
                                                            }
                                                            ?> >512 GB</option>
                                                        </select>
                                                        <div class="text-danger">
                                                            <?php
                                                                echo form_error('internal');
                                                                ?>
                                                        </div>

                                                        <input type="text" name="qty" class="form-control pro" placeholder="Stock" value="<?php
                                                            if (!isset($success) && set_value('qty')) {
                                                                echo set_value('qty');
                                                            }
                                                            ?>">
                                                        <div class="text-danger">
                                                            <?php
                                                            echo form_error('qty');
                                                            ?>
                                                        </div>

                                                        <input type="text" name="price" class="form-control pro" placeholder="Price in Rs."  style="margin-bottom: 3px;" value="<?php
                                                            if (!isset($success) && set_value('price')) {
                                                                echo set_value('price');
                                                            }
                                                            ?>">
                                                        <div class="text-danger">
                                                            <?php
                                                            echo form_error('price');
                                                            ?>                                                        
                                                        </div>

                                                        <p><small><b>Note:</b> Here Price is gross Price,Profit of Admin will be Added in Your Above Price.</small></p>
                                                    </div>


                                                        <div class="col-md-6" style="">
                                                            <input type="file" multiple="" name="product[]" id="gallery-photo-add" style="display: none;">
                                                            <label for="gallery-photo-add" style="width: 100%;">
                                                                <div   style="background: whitesmoke; border: 2px dashed grey; height: 167px;  padding:36px 20px;  text-align: center; cursor: pointer; ">
                                                                    <div class="gallery" >
                                                                        <h4 id="preview-text" style="color: lightgraygrey">Choose Multiple Files</h4>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <div class="col-md-6">
                                                               <?php
                                                               if (isset($img_errorlist)) {
                                                                   $c = 0;
                                                                ?>
                                                                <div class="alert alert-danger">
                                                                <?php
                                                                   foreach ($img_errorlist as $single) {
                                                                       $c++;
                                                                       ?>
                                                                    
                                                                        <strong><?php echo "<br>$c." . $single; ?></strong>
                                                                    
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </div>    
                                                                    <?php
                                                                }
                                                                ?>
                                                        </div>


                                                        
                                                            <div class="col-md-12 " style="margin-bottom: 10px;" >
                                                                <input type="submit" name="back" class="btn btn-primary" value="Back">
                                                                <input type="submit" name="add_img" class="btn btn-primary" value="Add">                                                    
                                                                <input type="submit" name="finish" class="btn btn-primary" value="Finish">
                                                                <input type="reset"  class="btn btn-primary" value="Clear">
                                                            </div>
                                                        
                                                        
                                                            <div class="col-md-12" >
                                                            <?php
                                                            if (isset($img_error)) {
                                                                ?>
                                                                    <div class="alert alert-danger">
                                                                        <strong><i class="fa fa-times"></i><?php echo $img_error; ?></strong>
                                                                    </div>
                                                                <?php
                                                            }
                                                            ?>                                                    
                                                            <?php
                                                            if (isset($success)) {
                                                                ?>
                                                                    <div class="alert alert-success">
                                                                        <strong><i class="fa fa-times"></i><?php echo $success; ?></strong>
                                                                    </div>
        <?php
    }
    ?>                                                    
                                                            </div>
                                                        </div>

                                                    

                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                </section>

                            </div>
                                                                <?php
                                                            }
                                                            ?>




                    </div>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js" type="text/javascript" style="resize:none;"></script>
        <script>
                                                    CKEDITOR.replace("edit1");
        </script>
        <script>
            CKEDITOR.replace("edit2");
        </script>



        <!-- Vendor -->
<?php
$this->load->view('seller/footerscript');
?>

        <script>
            $(function () {
                // Multiple images preview in browser
                var imagesPreview = function (input, placeToInsertImagePreview) {
                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function (event) {
                                $($.parseHTML('<img style="width:100px; padding:10px; border-radius:25%;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                $('#preview-text').html('');
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }

                };

                $('#gallery-photo-add').on('change', function () {
//                alert();
                    imagesPreview(this, 'div.gallery');
                });
            });
        </script>
    </body>

</html>