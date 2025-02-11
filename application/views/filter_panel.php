<form id="filter_data">
   
                <!-- side-bar colleps block stat -->
                <div class="collection-filter-block creative-card creative-inner category-side">
                    <!-- brand filter start -->
                    <div class="collection-mobile-back">
                        <span class="filter-back">
                            <i class="fa fa-angle-left" aria-hidden="true"></i> back
                        </span>
                    </div>
                    <?php
                    if($this->uri->segment(2) == "main")
                    {
                        $wh['parent_id'] = $this->uri->segment(3);
                        $category = $this->md->my_select('tbl_category','*',$wh);
                     ?>
                        <div class="collection-collapse-block open">
                        <h3 class="collapse-block-title mt-0">brand</h3>
                        <div class="collection-collapse-block-content">
                            <div class="collection-brand-filter">
                                <?php
                                foreach ($category as $data)
                                {
                                ?>
                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                    <input type="checkbox" onclick="filter_panel();" name="maincategory[]" value="<?php echo $data->category_id; ?>" class="custom-control-input" id="<?php echo $data->name; ?>">
                                    <label class="custom-control-label" for="<?php echo $data->name; ?>"><?php echo $data->name; ?></label>
                                </div>
                                <?php
                                 }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    else if($this->uri->segment(2) == "sub")
                    {
                        $wh['parent_id'] = $this->uri->segment(3);
                        $category = $this->md->my_select('tbl_category','*',$wh);
                     ?>
                        <div class="collection-collapse-block open">
                        <h3 class="collapse-block-title mt-0">brand</h3>
                        <div class="collection-collapse-block-content">
                            <div class="collection-brand-filter">
                                <?php
                                foreach ($category as $data)
                                {
                                ?>
                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                    <input type="checkbox" onclick="filter_panel();" name="subcategory[]" value="<?php echo $data->category_id; ?>" class="custom-control-input" id="<?php echo $data->name; ?>">
                                    <label class="custom-control-label" for="<?php echo $data->name; ?>"><?php echo $data->name; ?></label>
                                </div>
                                <?php
                                 }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <!-- color filter start here -->
                    <div class="collection-collapse-block open">
                        <h3 class="collapse-block-title">colors</h3>
                        <div class="collection-collapse-block-content">
                            <div class="color-selector">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                    $mycolor = array();
                                    $colordata = $this->md->my_select('tbl_product_image');
                                    
                                    foreach ($colordata as $color)
                                    {
                                        if(!in_array($color->colour,$mycolor))
                                        {
                                            array_push($mycolor, $color->colour);
                                        }
                                    }
                                    
                                    foreach ($mycolor as $data)
                                    {
                                    ?>
                                        
                                       <div class="col-md-7 float-left"> 
                                           <label style="cursor:pointer;"><input style="width: 15px; height: 15px;" type="checkbox" onclick="filter_panel();" name="clr[]" value="<?php echo $data; ?>"> <?php echo $data;?></label>
                                             <br><br>
                                       </div>
                                       <div class="col-md-2 float-right"> 
                                           <li style="background-color:<?php echo $data; ?>; width: 20px; height: 20px;"></li>
                                         
                                       </div>
                                      
                                    
                                    <?php
                                    }
                                    ?>
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price filter start here -->
                    <div class="collection-collapse-block border-0 open">
                        <h3 class="collapse-block-title">price</h3>
                        <div class="collection-collapse-block-content">
                            <div class="collection-brand-filter">
                                <?php 
                                for($i=0;$i<=10;$i++)
                                {
                                    $start = ($i*10000)+1;
                                    $end = ($start+10000)-1;
                                 ?>
                                 <div class="custom-control custom-checkbox collection-filter-checkbox">
                                    <input name="price[]"  value="<?php echo $start; ?>" type="checkbox" onclick="filter_panel();" class="custom-control-input" id="<?php echo $start;?>">
                                    <label class="custom-control-label" for="<?php echo $start;?>"><?php echo $start;?> - <?php echo $end;?></label>
                                </div>
                                <?php
                                     
                                }
                                
                                ?>
                               
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- silde-bar colleps block end here -->
                <!-- side-bar single product slider start -->
                
                <!-- side-bar single product slider end -->
                <!-- side-bar banner start here -->
                
                <!-- side-bar banner end here -->
                
            
</form> 
<script type="text/javascript">
            function filter_panel()
            {
                $data = $("#filter_data").serialize();
                
               var path = 'http://localhost/mobile_corner/Backend/filter_panel/';

                $.post(path, $data, function (output) {
//                    alert(output);
                    $("#product_data").html(output);
                });

            }

</script>