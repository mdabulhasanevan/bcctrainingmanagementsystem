<div class="content-page" ng-controller="DefaultCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"><?php echo $Title;  ?></h1>
                                <ol class="breadcrumb float-right">
                                    <li class=""><?php echo $_SERVER['REQUEST_URI']; ?></li>
                                    
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>



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
                                      <div class="table-responsive">
										        <div class="row">
            <div class="form-group col-md-3">
                <label for="Exam" >Batch Name</label>
                <select class="form-control" id="Batchname"  ng-model="BatchID" ng-change="GetBatchWiseResult(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
            </div>
 
            
            <div col-md-8>
                 <img id="LoadingID" src="<?php echo base_url('dist/img/loading2.gif') ?>" style="display:none; "/ >
            </div>
        </div>
        <!--Total:{{AllStudent.length }}-->



<div class="col-md-12 myPrintBatch" ng-show="Show==1">
    
      <span class="fa fa-print" id='printBatch' style="cursor: pointer;" ></span>
                    <h2 style="text-align: center;"> Bangladesh Computer Council</h2>      
                     <h3 style="text-align: center; margin-top:2px; padding-top:0px;"> Information and communication Technology Division</h3>
                    <h4 style="text-align: center;">Regional Office , Barishal.</h4>
                    <h5 style="text-align: center;">Batch Wise Result</h5><hr>
                    
      
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> Name </th>
                <th> RegNo </th>
                <th> Exam </th>
                <th> MCQMarksGet </th>
                <th> Theory </th>
                <th> Practical </th>
                
                <th> Total </th>
                 <th> Status </th>
                
               
                
            </tr>
            <tbody ng-repeat="Result in AllStudent">
            <tr ng-repeat="Student3 in Result">
                <td>{{$index + 1}} </td>
                <td>{{Student3.Name}} </td>
                <td>{{Student3.RegNO}} </td>
                <td>{{Student3.ExamName}} </td>
                <td>{{Student3.MCQMarksGet | number : 2}} </td>
                <td>{{Student3.Theory | number : 2}} </td>
                <td>{{Student3.Practical | number : 2}} </td>
                <td>{{Student3.totalAmount | number : 2}} </td>
                <td> <span ng-show="Student3.Attendance=='Absent'" style="color:red" >{{Student3.Attendance}} </span> 
                <span ng-show="Student3.Attendance=='Present'" style="color:green" >{{Student3.Attendance}} </span>  </td>
             
             
            </tr>
            </tbody>
        </table>
        
        
</div>  
																
									</div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


    <!-- Add Modal -->
   
    <!--modal end-->

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
                // GetBatchWiseResult();
                GetAllBatchandExamCollectionField()

            }
            function initialize() {
                 $scope.Show=0;
                $scope.AllStudent = [];
             
                $scope.Student = {};
             
                $scope.reset = reset;
                $scope.GetBatchWiseResult = GetBatchWiseResult;
                $scope.BatchID = 0;
              
                
            }


            function GetAllBatchandExamCollectionField()
            {

                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;


                }, function errorCallback(response) {
                });
            }

            function GetBatchWiseResult(x)
            {
                  $("#LoadingID").css("display", "block");
                $scope.Show=1;
               
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Report/GetBatchWiseResult/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                   
                    $("#LoadingID").css("display", "none");
                   
                    console.log($scope.AllStudent);
                }, function errorCallback(response) {
                      $("#LoadingID").css("display", "none");
                });
            }

           

            function reset()
            {
                $scope.Student = {};
            }

        }]);
</script>


<!--print html--> 
<script>

       $(function () {
        $('#printBatch').on('click', function () {
            $.print(".myPrintBatch");
        });
    });
</script>