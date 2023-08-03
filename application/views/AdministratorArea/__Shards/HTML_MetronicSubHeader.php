<?php
$codeigniter_instance =& get_instance();
?>
<div class="kt-subheader kt-grid__item" id="kt_subheader" >
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <a>
                <span style="font-size: 15px;"><?php echo str_replace("_"," ",preg_replace('/[A-Z]/', ' $0', ucfirst("Home")))?></span>
                <i class="fa fa-angle-right"></i>
            </a>
            <?php
            $current_url_array = explode("/",uri_string());
            foreach($current_url_array as $current_url_key => $current_url_value){
                ?>
                <a>
                    <span style="font-size: 15px;"><?php echo str_replace("_"," ",preg_replace('/[A-Z]/', ' $0', ucfirst($current_url_value)))?></span>
                    <?php
                    if(isset($current_url_array[$current_url_key+1])){
                        ?>
                        <i class="fa fa-angle-right"></i>
                        <?php
                    }
                    ?>
                </a>
                <?php
            }    
            ?>
        </div>
    </div>
</div>
