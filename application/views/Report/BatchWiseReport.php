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
                <select class="form-control" id="Batchname"  ng-model="BatchID" ng-change="GetAllStudent(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
            </div>
        
            <div class="form-group col-md-3">
                <label for="Exam" >Gender</label>
                <select class="form-control" ng-model="Gender" required  name="Gender">
                    <option value="">Select </option>
                    <option value="Male">Male </option>
                    <option value="Female">Female </option>
                    <option value="Other">Other </option>
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
                    <h5 style="text-align: center;">Batch Wise Report</h5><hr>
                    
       <p style="background-color:#d1b3ff; padding:3px; "> <b> Batch Name  : </b><span id="batch"></span> 
       &nbsp;&nbsp;&nbsp;&nbsp; <b>Session:</b> {{AllStudent[0].FiscalYear}} 
       &nbsp;&nbsp;&nbsp;&nbsp;  <b>Course Title: </b> {{AllStudent[0].Title}}  
       &nbsp;&nbsp;&nbsp;&nbsp;  <b>Organized : </b> {{AllStudent[0].OrganizationName}} </p>
       
      <p style="background-color:#e6fff2;   padding:3px; ">  
      <b>Student: </b>  {{AllStudent.length}}
      &nbsp;&nbsp;&nbsp;&nbsp; <b>Male: </b> {{TotalMale}} 
      &nbsp;&nbsp;&nbsp;&nbsp; <b>Female: </b> {{TotalFemale}} 
      &nbsp;&nbsp;&nbsp;&nbsp; <b>Disable: </b>{{TotalDisable}} 
       &nbsp;&nbsp;&nbsp;&nbsp; <b>Total Fee:</b> {{TotalFee}}
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Duration Type: </b> {{AllStudent[0].DurationTypeName}}
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Batch Type: </b> {{AllStudent[0].TypeName}}
      </p>
      <p style="background-color:#ffffe6;  padding:3px; ">
      <b>Start: </b> {{AllStudent[0].StartDate}}
      &nbsp;&nbsp;&nbsp;&nbsp;<b>End: </b>  {{AllStudent[0].EndDate}} 
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Day: </b> {{AllStudent[0].ClassDay}}
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Time: </b> {{AllStudent[0].StartTime}} to {{AllStudent[0].EndTime}} 
      
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Status: </b>  {{AllStudent[0].Status2}} 
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Duration: </b>  {{AllStudent[0].DurationHour}} H   </p>
       
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> RegNo </th>
                <th> Name </th>
                <th> Gender </th>
                <th> Is Disable</th>
               <th> Fee </th>
                
            </tr>
            <tr ng-repeat="Student3 in AllStudent| filter:{Gender:Gender}:true">
                <td>{{$index + 1}} </td>
                <td>{{Student3.RegNO}} </td>
                <td>{{Student3.Name}} </td>
                
                <td>{{Student3.Gender}} </td>
                <td>{{Student3.IsDisable}} </td>
                <td>{{Student3.Fee}} </td>
             
            </tr>
        </table>
        
         <p> <b>Details: </b> {{AllStudent[0].Details}} </p>
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
$("#Batchname").change(function () {
    document.getElementById("batch").innerHTML= $("#Batchname :selected").text();
});

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                // GetAllStudent();
                GetAllBatchandExamCollectionField()

            }
            function initialize() {
                 $scope.Show=0;
                $scope.AllStudent = [];
             
                $scope.Student = {};
             
                $scope.reset = reset;
                $scope.GetAllStudent = GetAllStudent;
                $scope.BatchID = 0;
                
                $scope.TotalFee=0;
                $scope.TotalMale=0;
                $scope.TotalFemale=0;
                $scope.TotalDisable=0;
                
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

            function GetAllStudent(x)
            {
                  $("#LoadingID").css("display", "block");
                $scope.Show=1;
                $scope.TotalFee=0;
                $scope.TotalMale=0;
                $scope.TotalFemale=0;
                $scope.TotalDisable=0;
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Student/GetAllStudent/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    var AllStudent=$scope.AllStudent;
                    
                    AllStudent.forEach(function(St) {
                    
                     $scope.TotalFee =$scope.TotalFee + Number(St.Fee);
                     
                     if(St.Gender=="Male")
                     {
                         $scope.TotalMale++;
                     }
                    
                     if(St.Gender=="Female")
                     {
                         $scope.TotalFemale++;
                     }
                     
                     if(St.IsDisable=="YES")
                     {
                         $scope.TotalDisable++;
                     }
                     
                    });
                    
                    $("#LoadingID").css("display", "none");
                   
                    //console.log($scope.AllStudent);
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