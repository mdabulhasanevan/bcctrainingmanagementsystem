<div ng-controller="DefaultCtrl" class="col-md-10" style="background-color: #ffffff;">

    <div class="row">
         <!--List of Student-->
        <?php
        if (isset($_SESSION['successErr'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['successErr'] . "</div>";
            }
        ?>
       
       <div class="row">
            <div class="col-md-9">
              
            <table class="table table-striped">
           
            <tr ng-repeat="Student in ClassWorkShop">
                
                <td><pre>{{Student.ClassDetail}}</pre>
                <a href="{{Student.Others}}" target="_blank" ><img src="<?php echo base_url(); ?>dist/img/LiveClass.gif" width="10" height="10"/></a>
                
                </td>
                
            </tr>
                </table>
                 
            <table class="table table-striped">
                 <h4 style="background-color:#4CF79E; padding:2px;">Your Previous Results  </h4>
            <tr>
                <th>SN</th>
                <th>Date </th>
                <th> Exam Name </th>
                <th> Total </th>
                <th> Selected </th>
                <th>Correct </th>
            </tr>
            <tr ng-repeat="Student in Result">
                <td>{{$index + 1}} </td>
                <td>{{Student.ExamDate}} </td>
                <td>{{Student.ExamName}} </td>
                <td>{{Student.TotalQuestion}} </td>
                <td>{{Student.Selected}} </td>
                <td>{{Student.Correct}} </td>
            </tr>
        </table>
         </div>
         
         <div class="col-md-3">
                
              <img class="img-fluid" data-ng-src="data:image/png;base64,<?php echo $_SESSION['Photo'];   ?>" style="width: 100px; height: 100px; padding:5px; "   > 
            
        </div>
         
       </div>
            <div class="row" >
       
     <!--   <div class="col-md-3">
            <h3>Important Instructions</h3>
            <ol>
                <li> Please Do not refresh or reload the page  </li>
                <li> Please Do not click backward/back button of browser   </li>
                <li> Only one chance for every single question  </li>
                <li> Time will be appeared on right side when exam will be started </li>

            </ol>
        </div>-->
        <div class="form_main col-md-12">
              <h4 style="background-color:#4CF79E; padding:2px;">Exam List</h4>
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                
                <th> Exam Name </th>
                <th> Status </th>
                <th> Date </th>
                <th> Time </th>
                <th>Option </th>
              

            </tr>
           
           <?php
            foreach ($ExamList as $value3) {    ?>
            <tr>
                <td>{{$index + 1}} </td>
                <td><?php echo $value3->ExamName ?> </td>
                <td><?php echo $value3->Status ?> </td>
                <td><?php echo $value3->ExDate ?> </td>
                <td><?php echo $value3->Time ?> </td>
                <td> <span ng-show="<?php echo $value3->Status2; ?>=='1'">
                    
                    <form method="POST" action="<?php echo base_url(); ?>StudentOpen/TakeExam" target="_blank" >
                        
                        <button type="submit" class="btn btn-success btn-small"  value="<?php echo $value3->SetID ?>" name="ExamID" onClick="javascript:window.close('','_parent','');">Start Exam</button>
                    </form>
                    
                   <!--  <a style=" color:red" class="btn pull-right" href="<?php echo base_url(); ?>StudentOpen/TakeExam?ExId=<?php echo $value3->SetID ?>"><span class="glyphicon glyphicon-bell"> </span> Start Exam</a>-->
                    
                </span></td>
               
            </tr>
               <?php } ?>
           
        </table>
           <!-- <button type=""  class=" btn btn-danger"  onclick="openFullscreen();">FullScreen</button>-->
            <form   ng-submit="GetSearchQuestion()"  >
              <br>
                  <!-- <button type="submit" ng-hide="AllQuestion.OnlyQuestion.length > 0" class=" btn btn-danger"  onclick="openFullscreen();">Start Exam</button>-->
                    <br>
                    <!-- <button type="button" ng-show="ShowCheckResultBtn == 1" ng-click="CheckResult(1)" class="btn btn-warning" >Stop Exam</button> -->
            </form>
            
            
            
        </div>
         
        
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
               
         
            }
            function initialize() {
                $scope.Result = [];
                $scope.ClassWorkShop=[];

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