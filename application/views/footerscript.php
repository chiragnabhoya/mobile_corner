<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

 <!--slick js-->
<script src="<?php echo base_url(); ?>assets/js/slick.js"></script>

 <!--popper js-->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js" ></script>

 <!--Timer js-->
<script src="<?php echo base_url(); ?>assets/js/menu.js"></script>

<!-- Bootstrap js-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

 <!--Bootstrap js-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>

 <!--elvatezoom js-->
<script src="<?php echo base_url(); ?>assets/js/jquery.elevatezoom.js"></script>




<!--onload--> 

<!--<script src="<?php echo base_url(); ?>assets/js/slider-animat.js"></script>-->

<!-- Theme js-->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

<script src="<?php echo base_url(); ?>assets/js/timer.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modal.js"></script>

<script src="<?php echo base_url(); ?>assets/js/costom.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>admin_assets/javascripts/set.js" type="text/javascript"></script>

<script type="text/javascript">
    function subscriber(){
        var email= document.getElementById('email').value;
        if(email != "")
        {
            var ptn=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            
            if(email.match(ptn))
            {
                $data={email:email};
                
                var path="http://localhost/mobile_corner/backend/subscriber";
                
                $.post(path,$data,function(output)
                {
                    
                    if(output=="1")
                    {
                        $('#err-msg').html("Thank You For Subscribe.");
                        document.getElementById('email').value='';
                    }
                    if(output=="2")
                    {
                        $('#err-msg').html("You Already Subscribe.")
                    }
                });
            }
            else
            {
                $('#err-msg').html("Please Enter Valid Email.")
            }
        }
        else
        {
            $('#err-msg').html("Please Enter Email.");
        }
    }
</script>

