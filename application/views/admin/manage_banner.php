<!doctype html>
<html class="fixed">

    <?php
    $this->load->view('admin/headerlink');
    ?>
    <body>
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('admin/header');
            ?>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <?php
                $this->load->view('admin/menu');
                ?>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Manage Banner</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Pages</span></li>
                                <li><span>Banner</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Add New Banner</h2>
                        </header>
                        <div class="panel-body">
                            <form method="post" action="" name="banner" enctype="multipart/form-data">
                                <div class="col-md-6">

                                    <div class="form-group">                                           
                                        <label for="subject">Title</label>
                                        <input type="text" name="title" value="<?php
                                        if (!isset($success) && set_value('title')) {
                                            echo set_value('title');
                                        }
                                        ?>" class="form-control" id="email" placeholder="Title">
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('title');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Subtitle</label>
                                        <input class="form-control" name="subtitle" value="<?php
                                        if (!isset($success) && set_value('subtitle')) {
                                            echo set_value('subtitle');
                                        }
                                        ?>" placeholder="Subtitle" id="exampleFormControlTextarea1" rows="2" style="resize: none">
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('subtitle');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9" >
                                            <input type="submit" name="add" value="ADD" class="btn button">
                                            <input type="reset" value="CLEAR" id="" class="btn btn-default">                      </button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($success)) {
                                        ?>
                                        <br/><br/>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Ok !</strong> <?php echo $success; ?>
                                        </div>
                                        <?php
                                    }
                                    if (isset($error)) {
                                        ?>
                                        <br/><br/>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Oops !</strong> <?php echo $error; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-md-6" >
                                    <label for="subject">Select Banner</label>
                                    <input type="file" name="banner" id="banner" style="display: none;">
                                    <label for="banner" style="width: 100%;">
                                        <div style="background: #ddd; padding:36px 20px; text-align: center; cursor: pointer;">
                                            <h4 id="preview-text">Click To Upload</h4>
                                            <img id="preview-img">
                                        </div>

                                    </label>

                                </div>
                            </form>

                        </div>

                    </section>

                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">View All Banner</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Title</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Subtitle</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Banner</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($banner as $data) {
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->title; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->subtitle; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <img src="<?php echo base_url() . $data->path; ?>" style="width: 60px; height: 30px;"  class="img-rectangel" >
                                            </td>
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/banner/<?php echo $data->banner_id; ?>')" data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                            </table>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="z-index: 9999;">

                                    <!-- Modal content-->
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Confirmation </h4>
                                        </div>
                                        <div class="modal-body" style="margin-top: 10px;">
                                            <p>Are You Sure Want to Delete Banner ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" color: white;margin-left: 10px">Cancel</button>
                                            <a id="delete-link" type="button" class="btn btn-danger" >Yes Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </section>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('admin/footerscript');
        ?>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preview-text').html("");
                        $('#preview-img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#banner").change(function () {
                readURL(this);
            });
        </script>
    </body>

</html>