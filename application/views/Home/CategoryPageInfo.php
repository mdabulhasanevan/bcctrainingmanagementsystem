<div class="row">

    <div class="col-md-10" style="margin-left: -15px;" > 

        <div class="col-md-12">

            <h2 class="panel-heading"><?php echo $MyInfo->CategoryName; ?></h2>    
            <hr>
            <h3><?php echo $MyInfo->Category; ?></h3>


            <p>
                <?php
                if ($MyInfo->Others != "") {
                    ?>
                    <img width = "100%"  src = "<?php echo base_url('dist/img/icon/') . $MyInfo->Others ?>" alt = " " style = "width:100%;"/>
                    <?php
                }
                ?>

                    <br><br>
                <?php echo $MyInfo->Detail; ?>
            </p>


        </div>

    </div>

