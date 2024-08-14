<div class="row">
    
    <div class="col-md-10" style="margin-left: -15px;" > 

        <div class="col-md-12">


            <h3 class="panel-heading"><?php echo $Title; ?></h3>
            <h3><?php echo $MyNews->Headline; ?></h3>
            <h5>Date: <?php echo $MyNews->Date; ?></h5>

            <p><?php echo$MyNews->Detail; ?> </p>
            <?php
            if ($MyNews != null && $MyNews->Other != "") {
                ?>
                <embed src="<?php echo base_url() . 'uploads/' . $MyNews->Other ?>" type="application/pdf" width="100%" height="600px" />
                <a class="btn btn-primary" href="<?php echo base_url() . 'uploads/' . $MyNews->Other ?>" target="_New" style="text-decoration: none;">
                    Down Load File
                </a>
                <?php
            }
            ?>
            <hr>

            <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo current_url(); ?>&layout=button&size=small&mobile_iframe=true&appId=2072543979628136&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 


        </div>

    </div>

    