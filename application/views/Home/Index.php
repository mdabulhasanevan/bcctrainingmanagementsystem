<div class="row">
    <div class="col-md-10" style="margin-left: -15px;" > 

        <div class="col-md-12">
            <!--Notice Board-->
            <div class="row"> 
                <div class="col-md-12" >
                    <div class="well" Style="padding-left:100px; padding-top:0px;"> 
                        <font size="5">Notice Board</font> <br /> 
                        <table class="table table-hover table-responsive">
                            <tr> 
                                <th> content</th>
                                <th> Date</th>
                                <th> content</th>
                            </tr>

                            <?php
                            foreach ($Info['Notice'] as $MyNotice) {
                                ?>
                                <tr>
                                    <td> <a href='<?php echo base_url('Home/NoticeOpen/') . $MyNotice->BrId ?>' title='' ><b> <?php echo $MyNotice->Headline ?> </b></a></td>
                                    <td> <?php echo $MyNotice->Date ?>  </td>
                                    <td>
                                        <?php
                                        if ($MyNotice->Other != "") {
                                            ?>
                                            <a href='<?php echo base_url('uploads/') . $MyNotice->Other ?>' title='' ><b>File </b></a>
                                            <?php
                                        }
                                        ?>
                                    </td> </tr> 
                                <?php
                            }
                            ?>

                        </table>
                        <a class="btn btn-default btn-sm" style="float:right;" href="<?php echo base_url("Home/notice"); ?>">All Notice</a><br />
                    </div>
                    <img src="<?php echo base_url("img/33.png"); ?>" style="position:absolute; top:0px;"alt="" />
                </div>

            </div>
            <!--News Board-->
            <div class="row"> 
                <div class="col-md-12">
                    <div class="well" > 
                        <div class="col-md-1" style="" >News : </div> 

                        <div class="col-md-10" style=" background-color:white;" id=flip>
                            <?php
                            foreach ($Info['News'] as $MyNotice) {
                                echo "<div><div>" . $MyNotice->Headline . "</div></div>";
                            }
                            ?>


                        </div>
                        <div class="col-md-1" style=""><a href="<?php echo base_url("Home/News"); ?>" style="float:right;" class="btn btn-default btn-xs">All news</a> </div> 
                        <br>
                    </div>
                </div>
            </div>

            <div class="row"> 

                <?php
                foreach ($AllList['Category'] as $list) {
                    ?>
                    
                    <div class="col-md-4" >
                        <div class="row CategoryBox box" >
                                
                                <div class="col-md-12" class="">
                                     <h4><?php echo $list->Category ?></h4>
                                 
                                    <img src="<?php echo base_url('dist/img/icon/') . $list->Icon ?>" alt="" class="CategoryImg img-responsive" >

                                    <ul class="CategoryListBox"> 
                                        <?php
                                        foreach ($AllList['SubCategory'] as $list2) {
                                            if ($list2->CID == $list->CID) {
                                                ?>
                                                <li> <a href="<?php echo base_url('Home/CategoryPageInfo/') . $list2->CSCID ?>"><?php echo $list2->Category ?></a></li>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>

                                </div>
                            
                        </div>
                    </div>
                    
                    <?php
                }
                ?>

            </div>

            
            <div class="col-md-12" >
                <h3>Training  Report</h3>
        <div class="col-md-12" style="height:400px; ">
            <h4>Batch List (Session: <?php echo $data["FiscalYear"]  ?>)</h4>
            <table class="table table-striped" style="font-size: 11px;" >
                <tr style="text-align: center;">
                    <th>Batch </th>
                   
                    <th> Male</th>
                    <th>Female </th>
                     <th>Student </th>
                </tr>
                <?php
                foreach ($data["StudentListBatchWise"] as $value) {
                    ?>
                    <tr>
                        <th> <?php echo $value->Batch ?></th>
                        
                        <td> <?php echo $value->Male ?></td>
                        <td> <?php echo $value->Female ?></td>
                        <td> <?php echo $value->Number ?></td>
                    </tr>
                    <?php
                }
                ?>
                
                <?php
                        foreach ($data["TotalStudent"] as $value2) {
                            ?>
                            <tr>
                                <th> Total</th>
                               <!--   <td> <?php echo $value2->BatchType ?></td>-->
                               
                                <th> <?php echo $value2->Male ?></th>
                                <th> <?php echo $value2->Female ?></th>
                                 <th> <?php echo $value2->Total ?></th>
                            </tr>
                            <?php
                        }
                        ?>
            </table>
        </div>
      

    </div>
            
            




        </div>

    </div>

