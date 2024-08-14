<div class="content-page" ng-controller="DefaultCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-12">

                            <div class="card mb-3">
                                <div class="card-header">
                                     <span class="pull-right">
                                      
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">

                            <h3><?php echo $MyNews->Headline; ?></h3>
                            <h6>Date: <?php echo $MyNews->Date; ?></h6>
                
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

                        </div>


                    </div>
                    </div>
</div>
</div>
</body>
</html>
    