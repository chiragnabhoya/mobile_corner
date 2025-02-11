<html>

    <head> 
        <title>Payment Sccess - Mobile Corner</title>
        <?php
        $this->load->view('headerlink');
        ?>
        
    </head> 

    <body class="bg">  
        <!--header start-->
        <?php
        $this->load->view('header');
        ?>
        <!--header end-->
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12" style="text-align: center;">
                    <i  class="fa fa-check-circle" style="font-size: 190px; color: #009116"></i>
               
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-5 col-md-12" style="text-align: center; margin-top: 30px;">
                        <h1 style="color: #1c3481;">Hello, Thank You For Your Order</h1><br>
                        <h3 style="color: #000;">Mobile Corner Has Required  Your Order <span style="color:#009116;">Successfull</span></h3><br>
                        <h4 style="color: #000;">Note That if You Have Any Query Then <span style="color:#00baf2;">Contact Us </span>Via Email </h4>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-top: 50px;">
                    
                    <div class="row" style="color: #000;">
                        
                        <div class="col-sm-4 col-md-4">
                            <center>
                                
                            <h4>Payable Amount :<span style="color:#1c3481; "> Rs. 50000 /-</span></h4><br>
                            <div style="margin-top:50px;">
                                    <input style="padding: 18px 35px;" type="submit" href="#" name="register" class="btn btn-normal" value="Continue Shopping">
                            </div>
                          
                            </center>
                        </div>
                        
                        <div class="col-sm-4 col-md-4">
                        
                            <center>
                                <h4>Estimated Shipping Time :<span style="color:#1c3481; "> 4 Days</span></h4><br>
                            <div style="margin-top:50px;">
                                <input  style="padding: 18px 65px;"type="submit" href="#" name="register" class="btn btn-normal" value="View Bill">
                            </div>
                            </center>
                          
                        </div>
                        <div class="col-sm-4 col-md-4">
                        
                            <center>
                                 <h4>Payment Mode :<span style="color:#1c3481; "> Cash On Delivery</span></h4><br>
                            <div style="margin-top:50px;">
                                    <input type="submit" href="#" name="register" class="btn btn-normal" value="Go to Account">
                            </div>
                            </center>
                          
                        </div>

                        
                        
                    </div>
                                        
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                
            </div>
            
            
        </div>
        
    </body>
    <?php
    $this->load->view('footerscript');
    ?>
</html>