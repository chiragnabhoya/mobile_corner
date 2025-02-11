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
                        <h2>Manage Email Subscriber</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Pages</span></li>
                                <li><span>Email Subscriber</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <form method="post" action="" name="email" >
                        <div class="row">
                            <div class="col-md-6">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">View All Subscriber</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">

                                            <div class="panel-body">                                                
                                                <table style="margin-top: 0px" class="table table-bordered table-striped mb-none" id="datatable-tabletools"  data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                                    <div class="container">
                                                        <thead>                                    
                                                        <div class="row">
                                                            <tr >
                                                                <th style="vertical-align:middle; text-align: center; width: 15%; ">
                                                                    <input type="checkbox" name="all" value="all" id="all">
                                                                </th>
                                                                <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Email</th>
                                                                <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                                            </tr>
                                                        </div>
                                                        </thead>
                                                    </div>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        foreach ($subscriber as $data) {
                                                            $no++;
                                                            ?>
                                                        <div  class="row">
                                                            <tr>                                                            
                                                                <td style="vertical-align:middle; text-align: center; width: 15%;">
                                                                    <input type="checkbox" name="email[]" value="<?php echo $data->email; ?>" class="check">
                                                                </td>
                                                                <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->email; ?></td>
                                                                <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                                    <a onclick="$('#delete-link').attr('href', '<?php echo base_url(); ?>delete/subscriber/<?php echo $data->subscriber_id; ?>')" data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></a>
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
                                                                <p>Are You Sure Want to Delete Email Subscriber ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" color: white;margin-left: 10px">Cancel</button>
                                                                <a id="delete-link" type="button" class="btn btn-danger" >Yes Delete</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </section>
                            </div>
                            <div class="col-md-6">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                            </div>

                                            <h2 class="panel-title">Send Email</h2>

                                        </header>
                                        <div class="panel-body">
                                            <div class="form-group">                                           
                                                <label for="subject">subject</label>
                                                <input type="text" name="subject" class="form-control" id="email" placeholder="subject" value="<?php
                                                if(!isset($success) && set_value('subject'))
                                                {
                                                    echo set_value('subject');
                                                }
                                                
                                                ?>">
                                                <div class="text-danger">
                                                    <?php                                                    
                                                        echo form_error('subject');
                                                    ?>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="review">Write Your Message</label>
                                                <textarea name="msg" class="form-control" placeholder="Write Your Message" id="edit1" rows="2" style="resize: none"><?php
                                                if(!isset($success) && set_value('msg'))
                                                {
                                                    echo set_value('msg');
                                                }
                                                
                                                ?></textarea>
                                                <div class="text-danger">
                                                    <?php
                                                        echo form_error('msg');
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9 ">
                                                    
                                                    <input type="submit" name="send" value="SEND" class="btn button">
                                                    <input type="reset" value="CLEAR" class="btn btn-default">
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
                                            </div>
                                        </div>

                                    </section>
                                
                            </div>
                        </div>
                    </form>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js" type="text/javascript" style="resize:none;"></script>
        <script>
                CKEDITOR.replace("edit1");
        </script>


        <?php
        $this->load->view('admin/footerscript'); 
        ?>
    </body>

</html>