<style>
   .circle-tile {
   margin-bottom: 15px;
   text-align: center;
   }
   .circle-tile-heading {
   border: 3px solid rgba(255, 255, 255, 0.3);
   border-radius: 100%;
   color: #FFFFFF;
   height: 40px;
   margin: 0 auto -20px;
   position: relative;
   transition: all 0.3s ease-in-out 0s;
   width: 40px;
   }
   .circle-tile-heading .fa {
   line-height: 20px;
   }
   .circle-tile-content {
   padding-top: 10px;
   }
   .circle-tile-number {
   font-size: 26px;
   font-weight: 700;
   line-height: 1;
   padding: 5px;
   }
   .circle-tile-description {
   text-transform: uppercase;
   }
   .circle-tile-footer {
   background-color: rgba(0, 0, 0, 0.1);
   color: rgba(255, 255, 255, 0.5);
   display: block;
   padding: 5px;
   transition: all 0.3s ease-in-out 0s;
   }
   .circle-tile-footer:hover {
   background-color: rgba(0, 0, 0, 0.2);
   color: rgba(255, 255, 255, 0.5);
   text-decoration: none;
   }
   .circle-tile-heading.dark-blue:hover {
   background-color: #2E4154;
   }
   .circle-tile-heading.green:hover {
   background-color: #138F77;
   }
   .circle-tile-heading.orange:hover {
   background-color: #DA8C10;
   }
   .circle-tile-heading.blue:hover {
   background-color: #2473A6;
   }
   .circle-tile-heading.red:hover {
   background-color: #CF4435;
   }
   .circle-tile-heading.purple:hover {
   background-color: #7F3D9B;
   }
   .tile-img {
   text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
   }
   .dark-blue {
   background-color: #34495E;
   }
   .green {
   background-color: #16A085;
   }
   .blue {
   background-color: #2980B9;
   }
   .orange {
   background-color: #F39C12;
   }
   .red {
   background-color: #E74C3C;
   }
   .purple {
   background-color: #8E44AD;
   }
   .dark-gray {
   background-color: #7F8C8D;
   }
   .gray {
   background-color: #95A5A6;
   }
   .light-gray {
   background-color: #BDC3C7;
   }
   .yellow {
   background-color: #F1C40F;
   }
   .text-dark-blue {
   color: #34495E;
   }
   .text-green {
   color: #16A085;
   }
   .text-blue {
   color: #2980B9;
   }
   .text-orange {
   color: #F39C12;
   }
   .text-red {
   color: #E74C3C;
   }
   .text-purple {
   color: #8E44AD;
   }
   .text-faded {
   color: rgba(255, 255, 255, 0.7);
   }
   //
</style>
<div class="content-page" ng-controller="ClassRoutine">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
          
         </div>
         
         <div class="row">
            <div class="col-12">
               <div class="card mb-3">

                  <div class="card-body">
                     
                       <div class="row">
                            
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                                 <h6 class="text-white text-uppercase m-b-20"> প্রসিক্ষনের বিষয়3- <?php echo $TotalCourseTitle->CourseTitle; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20">প্রশিক্ষণার্থী - <?php echo $student; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20">ব্যাচ- <?php echo $batch; ?></h6>
                               
                                
                            </div>
                        </div>
                         <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-warning">
                                 <h6 class="text-white text-uppercase m-b-20"> সনদ প্রাপ্ত- <?php echo $IsCertified; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20"> প্রতিবন্ধী- <?php echo $Disable; ?></ h6>
                                  <h6 class="text-white text-uppercase m-b-20"> মোট ফি - <?php echo  $CourseFee; ?></ h6>

                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-purple">
                               
                               <h6 class="text-white text-uppercase m-b-20"> প্রশ্নের বিষয়- <?php echo $questionsubject; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20">মোট প্রশ্ন- <?php echo $question; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20">প্রশ্ন সেট - <?php echo $QuestionSET; ?></h6>
                                   
                             
                               
                                
                            </div>
                        </div>

                       

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                               <!--  <h6 class="text-white text-uppercase m-b-20">Total Exam- <?php echo $ExamCount; ?></h6>-->
                               <h6 class="text-white text-uppercase m-b-20">Exam Active- <?php echo $ExamStatus->Active; ?></h6>
                                <h6 class="text-white text-uppercase m-b-20">Examed-  <?php echo $ExamStatus->Examed; ?></h6>
                                 <h6 class="text-white text-uppercase m-b-20">Exam Inactive-  <?php echo $ExamStatus->Inactive; ?></h6>
                              
                                
                               
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                <div class="row">
                    
                    <div class="col-md-6" >
                        <div  class="col-md-12" >
                           <h5 style="text-align:center;"> আজকের ক্লাস </h5>
                           <table class="table table-striped" >
                              <tr>
                                 <th>Lab</th>
                                  <th>Batch/Time/Topic</th>
                              </tr>
                              <?php
                                 foreach ($TodaysClass as $value) {
                                 ?>
                              <tr>
                                  <td>#</td>
                                 <td> <b class="text-success"><?php echo $value->Batch ?> </b>
                                <b class="text-danger">( Time:  <?php echo $value->StartTime ?> to <?php echo $value->EndTime ?>)</b>
                               <span class="text-info font-weight-bold">Today's Topic:</span> <span class="text-primary">  <?php echo $value->Topic ?> </span>
                                 
                                <!--  Time: {{time/ 60-0.5|number:0}} m : {{time% 60}} s <br>-->
                                 </td>
                              </tr>
                              <?php
                                 }
                                 ?>
                           </table>
                        </div>
                     </div>
                     <!--Chart -->
                     <div class="col-md-2" id="chartCourseWiseBatch" style="height: 250px;" ></div>
                     <div class="col-md-2" id="chartStudentGender" style="height: 250px;"></div>
                     <div class="col-md-2" id="chartStudentDisable" style="height: 250px;"></div>
                     <!-- <div class="col-md-2" id="chartStudentDurationType" style="height: 250px;"></div>-->
                    
                     
                     <!--<div class="col-md-12" id="chartCurrentYearBatchWiseStudnet" style="height: 370px;"></div>-->
                     
                      <div class="col-6">
                            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                            <h4 style="color:green;">Files Shared With You</h4>
                            <table class="table table-bordered">
                             <tr>
                        <th>SN</th>
                        <th>From</th>
                        <th>Headline </th>
                        <th>File </th>
                       
                      </tr>
                      <?php
                      $i=1;
                         foreach ($FileShared as $value) {
                         ?>
                      <tr>
                          <td> <?php echo $i; ?></td>
                        <td> <b> <?php echo $value->Name."-". $value->PostName; ?> </b></td>
                         
                        <td><?php echo $value->Headline ?> (<?php echo $value->Date ?>) </td>
                        <td>
                            
                            <?php
                            $Files= explode(',', $value->FileName);
 
                           
 
                        foreach ($Files as $File) {
                              echo " <a href='".base_url('uploads/SharedFiles/').$File."' target='_New'>file </a><br>";
                            }    
                         
                        ?>
                        </td>
                        
                      </tr>
                      <?php
                      $i++;
                         }
                         ?>
                            </table>
                          </div>
                 </div>   
                    
                     <script>
                        window.onload = function() {
                        
                        
                        
                        var chart = new CanvasJS.Chart("chartCourseWiseBatch", {
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                        text: "Course Wise Students"
                        },
                        data: [{
                        type: "pie",
                        indexLabel: "{y}",
                        yValueFormatString: "#,##0.00\"%\"",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "#36454F",
                        indexLabelFontSize: 14,
                        indexLabelFontWeight: "bolder",
                        showInLegend: false,
                        cutoutPercentage: 0,
                        legendText: "{label}",
                        dataPoints: <?php echo json_encode($CourseWiseStudentsChart, JSON_NUMERIC_CHECK); ?>
                        }]
                        });
                        chart.render();
                        
                        var chart = new CanvasJS.Chart("chartStudentGender", {
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                        text: "Gender"
                        },
                        data: [{
                        type: "pie",
                        indexLabel: "{y}",
                        yValueFormatString: "#,##0.00\"%\"",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "#36454F",
                        indexLabelFontSize: 14,
                        indexLabelFontWeight: "bolder",
                        showInLegend: false,
                        cutoutPercentage: 0,
                        legendText: "{label}",
                        dataPoints: <?php echo json_encode($Gender, JSON_NUMERIC_CHECK); ?>
                        }]
                        });
                        chart.render();
                        
                        var chart = new CanvasJS.Chart("chartStudentDisable", {
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                        text: "Disable"
                        },
                        data: [{
                        type: "pie",
                        indexLabel: "{y}",
                        yValueFormatString: "#,##0.00\"%\"",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "#36454F",
                        indexLabelFontSize: 14,
                        indexLabelFontWeight: "bolder",
                        showInLegend: false,
                        cutoutPercentage: 0,
                        legendText: "{label}",
                        dataPoints: <?php echo json_encode($DisableChart, JSON_NUMERIC_CHECK); ?>
                        }]
                        });
                        chart.render();
                        
                        var chart = new CanvasJS.Chart("chartStudentDurationType", {
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                        text: "Duration Type"
                        },
                        data: [{
                        type: "pie",
                        indexLabel: "{y}",
                        yValueFormatString: "#,##0.00\"%\"",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "#36454F",
                        indexLabelFontSize: 14,
                        indexLabelFontWeight: "bolder",
                        showInLegend: false,
                        cutoutPercentage: 0,
                        legendText: "{label}",
                        dataPoints: <?php echo json_encode($DurationTypeChart, JSON_NUMERIC_CHECK); ?>
                        }]
                        });
                        chart.render();
                        
                        
                        }
                     </script>
                     <!--Chart End->
                        
                    
                        <!--Table of Data-->
                     <div class="row" >
                        <hr/>
                        <div class="col-md-3" style="">
                           <h6>Batch List (Session: <?php echo $FiscalYear  ?>)</h6>
                           <table class="table table-striped" style="font-size: 11px;" >
                              <tr style="text-align: center;">
                                 <th>Batch </th>
                                 <th> M</th>
                                 <th>F </th>
                                 <th>Total </th>
                              </tr>
                              <?php
                                 foreach ($StudentListBatchWise as $value) {
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
                           </table>
                        </div>
                        <div class="col-md-9">
                           <div class="row">
                              <div class="col-md-6" style="font-size: 11px; text-align: center">
                                 <h6> Duration Type Report</h6>
                                 <table class="table table-striped" style="" >
                                    <tr>
                                       <th>Year </th>
                                       <th>Type </th>
                                       <th> Batch</th>
                                       <th>Disable </th>
                                       <th> M</th>
                                       <th>F </th>
                                       <th>Total </th>
                                    </tr>
                                    <?php
                                       foreach ($DurationTypeThisYear as $value3) {
                                           ?>
                                    <tr>
                                       <td> <?php echo $value3->FiscalYear ?></td>
                                       <td> <?php echo $value3->DurationType ?></td>
                                       <td> <?php echo $value3->BatchNumber ?></td>
                                       <td> <?php echo $value3->Disable ?></td>
                                       <td> <?php echo $value3->Male ?></td>
                                       <td> <?php echo $value3->Female ?></td>
                                       <td> <?php echo $value3->Total ?></td>
                                    </tr>
                                    <?php
                                       }
                                       ?>
                                 </table>
                                 
                                    <h6> Location Wise  Report</h6>
                        <table class="table table-striped" style="" >
                           <tr>
                              <th>SN </th>
                              <th>District </th>
                              <th> Upazila</th>
                              <th>Students </th>
                            
                           </tr>
                           <?php
                              foreach ($UpazilaReport as $value3) {
                                  ?>
                           <tr>
                              <td> </td>
                              <td> <?php echo $value3->DistrictName ?></td>
                              <td> <?php echo $value3->UpazilaName ?></td>
                              <td> <?php echo $value3->TotalStudent  ?></td>
                             
                           </tr>
                           <?php
                              }
                              ?>
                        </table>
                              </div>
                              <div class="col-md-6" style="font-size: 11px; text-align: center">
                                 <h6> Batch Type Report</h6>
                                 <table class="table table-striped"  >
                                    <tr>
                                       <th>Year </th>
                                       <th>Type </th>
                                       <th> Batch</th>
                                       <th>Disable </th>
                                       <th> M</th>
                                       <th>F </th>
                                       <th>Total </th>
                                    </tr>
                                    <?php
                                       foreach ($BatchTypeThiseYear as $value2) {
                                           ?>
                                    <tr>
                                       <td> <?php echo $value2->FiscalYear ?></td>
                                       <td> <?php echo $value2->BatchType ?></td>
                                       <td> <?php echo $value2->BatchNumber ?></td>
                                       <td> <?php echo $value2->Disable ?></td>
                                       <td> <?php echo $value2->Male ?></td>
                                       <td> <?php echo $value2->Female ?></td>
                                       <td> <?php echo $value2->Total ?></td>
                                    </tr>
                                    <?php
                                       }
                                       ?>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->
      </div>
   </div>
</div>
</body>
</html>
<script type="text/javascript">
   app.controller("ClassRoutine", ["$scope", "$http", "$timeout", "$interval",
       function ($scope, $http, $timeout, $interval) {
           init();
           function init() {
               initialize();
   
   
           }
           function initialize() {
   
               var d = new Date()
               var weekday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
               $scope.ToDay = weekday[d.getDay()];
               
                 //timer
                $scope.time = 0;
                $scope.TimeUp = 0;
           }
           
            
            //timer callback
            var timer = function () {
                if ($scope.time > $scope.TimeUp) {
                    $scope.time -= 1;
                    $timeout(timer, 1000);
                }
            }
   
   
   
   
       }]);
</script>