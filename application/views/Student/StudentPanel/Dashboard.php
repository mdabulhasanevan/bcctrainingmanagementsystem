<div class="content-page" ng-controller="DefaultCtrl">
   <!-- Start content -->
   <div class="content">
      <div class="row">
         <div class="col-12">
            <?php
               if (isset($_SESSION['successErr'])) {
                       echo "
                       <div class='alert alert-danger alert-dismissible'>
                       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                       <div class='alert alert-danger'>" . $_SESSION['successErr'] . "</div>
                       
                       </div>";
                   }
               ?>
         </div>
      </div>
      <div class="container-fluid">
         <div class="row">
            <div class="table-responsive">
               <div class="row">
                   <div class="col-md-9">
                 
                    <div class="col-md-12" style="margin: 0px; background-color: #e9ebee; padding: 0px; overflow-y: scroll;   ">
                    
                           <!--Quote-->
                    <div class="col-md-12" style="margin: 0px; padding: 2px; background-color: darkred; color: white;  text-align: center;" >
        
                        <h6 ><?php echo $Quotes["EducationalQuote"]->Quote; ?> - <span style="font-size: 10px;"> <?php echo $Quotes["EducationalQuote"]->Writer; ?> </span></h6> 
                    </div>   
                    <!--menu-->
                    <div class="col-md-12" style="position: sticky; top: 0;background-color: #ffffff; text-align: center; padding: 10px; border: 0px solid #000; margin: 0px;">
                        <!--Attendance-->
        
                        <a class="glyphicon glyphicon-home" href="<?php echo base_url("StudentApp/index"); ?>"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--Attendance-->
                        <span style="cursor: pointer;" ng-click="AttendanceSingle();" data-toggle="modal" data-target="#myAttendanceModal"> <span class="glyphicon glyphicon-list"></span> Attendance</span> &nbsp;&nbsp;
                        <!--Routine-->  
                        <span style="cursor: pointer;"  ng-click="GetAllClassRoutine();" data-toggle="modal" data-target="#myRoutineModal"><span class="glyphicon glyphicon-calendar"></span>  Routine</span>&nbsp;&nbsp;
                        <!--Payment-->  
                        <span style="cursor: pointer;" ng-click="GetPayHistory();" data-toggle="modal" data-target="#myHistoryModal"> <span class="glyphicon glyphicon-barcode"></span>  Payment History</span>&nbsp;&nbsp;           
                        <!--Classmates-->  
                        <span style="cursor: pointer;"  ng-click="GetAllClassMates();" data-toggle="modal" data-target="#myClassmatesModal"> <span class="glyphicon glyphicon-user"></span>  Classmates</span>&nbsp;&nbsp;
                        <!--library-->  
                        <span style="cursor: pointer;"   data-toggle="modal" data-target="#myBookLibraryModal"> <span class="glyphicon glyphicon-book"></span>  Book Library</span>&nbsp;&nbsp;
                         <!--result-->  
                        <span style="cursor: pointer;" ng-click="GetAllResultPdf();"  data-toggle="modal" data-target="#myResultModal"> <span class="glyphicon glyphicon-download"></span>  Result File</span>&nbsp;&nbsp;
                        
                         <!--Sylabus-->  
                        <span style="cursor: pointer;" ng-click="GetAllSylabus();"  data-toggle="modal" data-target="#mySyllabusModal"> <span class="glyphicon glyphicon-download"></span>  Syllabus </span>&nbsp;&nbsp;
        
                        
                        <!--Exam-->  
                        <!--<button class="btn btn-success" ng-click="GetAllClassMates();" data-toggle="modal" data-target="#myResultModal"> Result</button>-->
                    </div>
                  
                 
        
                </div>
                 
                 
                     <table class="table table-striped">
                            <h6><i class="far fa-check-square"></i> Exam List</h6>
                        <tr style="background-color: #adebeb;">
                           <th>SN</th>
                           <th> Exam Name </th>
                           <th> Status </th>
                           <th>Option </th>
                        </tr>
                        <?php
                           $index=1;
                            foreach ($ExamList as $value3) {    ?>
                        <tr>
                           <td><?php echo $index; ?> </td>
                           <th><?php echo $value3->ExamName ?> (<?php echo $value3->ExDate ?>) [ <?php echo $value3->Time ?> Min. ]  </th>
                           <td><?php echo $value3->Status ?> </td>
                           <td>
                              <span ng-show="<?php echo $value3->Status2; ?>=='1'">
                                 <form method="POST" action="<?php echo base_url(); ?>StudentOpen/TakeExam" target="_blank" >
                                    <input type="hidden" ng-model="GEO" name="GEO" />
                                    <button type="submit" class="btn btn-success btn-small"  value="<?php echo $value3->SetID ?>" name="ExamID" onClick="javascript:window.close('','_parent','');">Start </button>
                                 </form>
                                 <!--  <a style=" color:red" class="btn pull-right" href="<?php echo base_url(); ?>StudentOpen/TakeExam?ExId=<?php echo $value3->SetID ?>"><span class="glyphicon glyphicon-bell"> </span> Start Exam</a>-->
                              </span>
                           </td>
                        </tr>
                        <?php 
                           $index++;
                           } ?>
                     </table>
                     <table class="table table-striped">
                        <h5> <i class="far fa-check-square"></i> Your Previous Results  </h5>
                        <tr style="background-color: #ffff66;">
                           <th>SN</th>
                           <th> Exam Name </th>
                           <th> Result </th>
                           <th> Action </th>
                        </tr>
                        <tr ng-repeat="Student in Result">
                           <td>{{$index + 1}} </td>
                           <td>{{Student.ExamName}} </td>
                           <td>{{(Student.Correct/Student.TotalQuestion)*100|number:2}}% </td>
                           <td>  <button type="button" class="btn btn-primary" ng-click="ExamResultChartDataForStudent(Student.ExNId, Student.ExamName)">Detail</button> </td>
                        </tr>
                     </table>
                    
                    <div class="row" ng-show="ShowResult==1">
                    <div class="col-md-6"  style="height:300px;">
                        <canvas id="graph"></canvas>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped">
                        <h5> <i class="far fa-check-square"></i> Detail of {{ExamNameForDetailResult}} Exam </h5>
                        <tr style="background-color: #ffff66;">
                           <th>SN</th>
                           <th> Question </th>
                           <th> Subject </th>
                           <th> Answer </th>
                        </tr>
                        <tr ng-repeat="Student in ExamResultChartData.AnalysisDetail">
                           <td>{{$index + 1}} </td>
                           <td>{{Student.Question}} </td>
                           <td>{{Student.SubjectName}} </td>
                           <td> 
                           <span class="far fa-thumbs-up" ng-show="Student.Correct == 1"> </span> 
                           <span class="fas fa-times" ng-show="Student.Correct == 0"> </span>
                           </td>
                        </tr>
                     </table>
                    </div>
                    </div> 
                     
                   
                   </div>
                   <div class="col-md-3">
                    <table class="table table-striped">
                        <tr style="background-color: #ff99ff;">
                           <th><i class="far fa-check-square"></i> Online Class (Live)</th>
                        </tr>
                        <tr ng-repeat="Student in ClassWorkShop">
                           <td><a href="http://{{Student.Others}}" target="_blank" >{{Student.ClassDetail}}  </a> </td>
                        </tr>
                     </table>
                    <table class="table table-bordered">
                        <tr style="background-color: #66afe9;">
                           <td >
                              <h6><i class="far fa-check-square"></i> নোটিশ বোর্ড </h6>
                           </td>
                        </tr>
                        <?php
                           foreach ($Info['Notice'] as $News) {
                               //foreach ($rowAll as $News) {
                               echo "<tr>";
                           
                               echo "<td><a href='" . base_url() . 'Webview/NoticeOpen/' . $News->BrId . "' title='' target='_New'><b>" . $News->Headline . " </b>";
                           //      echo "<td>".$News->Detail."</td>";
                               echo "</a>" . $News->Date . "</td>";
                              
                           
                           
                               echo "</tr>";
                           }
                           ?>
                     </table>
                    <table class="table table-striped">
                        <tr style="background-color: #ccff66;">
                           <td><h6> <i class="far fa-check-square"></i> Trainee </h6></td>
                        </tr>
                        <tr ng-repeat="Student in StudentsList">
                           <td><a href="#">{{Student.Name}}-{{Student.RegNO}}  </a> </td>
                        </tr>
                     </table>
                   
                   </div>
                   
               </div>    
                
             
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
</body>
</html>
<script type="text/javascript">



    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
               // GetAllStudent();
                GetAllExamHistory();
                 getLocation();
                 BatchStudentsList();
                 
                // ExamResultChartDataForStudent();
               
         
            }
            function initialize() {
                $scope.Result = [];
                $scope.ClassWorkShop=[];
                
                  
                $scope.getLocation=getLocation;
                $scope.showPosition=showPosition;
                $scope.latitude="";
                $scope.longitude="";
                
                $scope.BatchStudentsList=BatchStudentsList;
                $scope.StudentsList=[];
                
                $scope.ShowGraph=ShowGraph;
                
                $scope.ExamResultChartDataForStudent=ExamResultChartDataForStudent;
                $scope.ExamResultChartData=[];
                $scope.ShowResult=0;

            }

            

            function ExamResultChartDataForStudent(examID, ExamName)
            {
                $scope.ExamNameForDetailResult=ExamName;
                console.log(examID);
                $http({
                    method: 'GET',
                    url: baseUrl + 'StudentOpen/ExamResultChartDataForStudent/'+examID
                }).then(function successCallback(response) {
                    $scope.ExamResultChartData = response.data;
                    //console.log($scope.ExamResultChartData.AnalysisQuestionSubjectWise);
                      $scope.ShowGraph($scope.ExamResultChartData.AnalysisQuestionSubjectWise);
                      
                      $scope.ShowResult=1;
                      
                }, function errorCallback(response) {
                });
                
                
                   
                    
            }
            
            function ShowGraph(data)
            {
                var data=data;
                    var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].SubjectName);
                        marks.push(data[i].Percentage);
                    }


                    var colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
                            		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
                            		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
                            		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
                            		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
                            		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                            		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
                            		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
                            		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
                            		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Student Marks',
                                backgroundColor: colorArray,
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graph");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true,
                                  min: 0,
                                  max: 100,
                                  
                                }
                              }]
                            },
                            maintainAspectRatio: false,
                          }
                    });
            }
        
            
            
             //geo location
            function getLocation()
            {
                var x = document.getElementById("demo");
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else { 
                    alert("Geolocation is not supported by this browser.");
                  }
                }
                
            function showPosition(position) {
                
                $scope.latitude=position.coords.latitude;
                $scope.longitude=position.coords.longitude;
                $scope.GEO=$scope.latitude+','+$scope.longitude
             
            }
            
            function GetAllExamHistory()
            {
               
                $http({
                    method: 'GET',
                    url: baseUrl + 'StudentOpen/GetAllExamHistoryForStudentLogin/'
                }).then(function successCallback(response) {
                    $scope.Result = response.data;
                     GetAllLiveClass();
                    
                }, function errorCallback(response) {
                });
            }
            
             function BatchStudentsList()
            {
                $scope.StudentsList=[];
               
                $http({
                    method: 'GET',
                    url: baseUrl + 'StudentOpen/BatchStudentsList/'
                }).then(function successCallback(response) {
                    $scope.StudentsList = response.data;
                    
                }, function errorCallback(response) {
                });
            }
             function GetAllLiveClass()
            {
               
                $http({
                    method: 'GET',
                    url: baseUrl + 'StudentOpen/GetAllLiveClass/'
                }).then(function successCallback(response) {
                    $scope.ClassWorkShop = response.data;
                    
                    
                }, function errorCallback(response) {
                });
            }
            


        }]);
</script>