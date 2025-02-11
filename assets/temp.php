<!--css-->
<link href="<?php echo base_url(); ?>assets/css/star-rating.min.css" rel="stylesheet" type="text/css"/>

<!--html-->
<input id="input-id" name="rating" type="text" class="rating rating-loading" data-min="0" data-max="5" data-step="1">

<!--js-->
<script src="<?php echo base_url(); ?>assets/js/star-rating.min.js" type="text/javascript"></script>
<script>
    $("#input-id").rating();
</script>
