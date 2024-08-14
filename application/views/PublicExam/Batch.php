
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
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Add Batch</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

<div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Course Title </th>
                <th>Batch No </th>    
                 <th>Batch Type </th> 
                  <th>Details </th>
                 <th>Organized </th>
                  <th> Fiscal </th>
                  <th> Calendar </th>
                  <th>Start  </th>
                  <th>End  </th>
                  <th>Duration  </th>
                  <th> Hour </th>
                  <th> Fee </th>
                    <th>XM </th>
                   <th>Status </th>
                    <th>Is Public </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="Batch in AllBatch">
                <td>{{$index + 1}} </td>
                <td>{{Batch.CourseTitleName}} </td>
                <td>{{Batch.Batch}} </td>
                 <td>{{Batch.TypeName}} </td>
                  <td>{{Batch.Details}} </td>
                 <td>{{Batch.OrganizationName}} </td>
                  <td>{{Batch.FiscalYear}} </td>
                  <td>{{Batch.CalenderYear}} </td>
                  <td>{{Batch.StartDate}} </td>
                  <td>{{Batch.EndDate}} </td>
                  <td>{{Batch.DurationTypeName}} </td>
                   <td>{{Batch.DurationHour}} </td>
                  <td>{{Batch.CourseFee}} </td>
                  <td>{{Batch.ExamNumber}} </td>
                   <td>{{Batch.StatusName}} </td>
                    <td>{{Batch.isPublic}} </td>
                    
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" ng-click="Edit(Batch)" >Edit</button>
                    <button class="btn btn-danger btn-sm" ng-click="DeleteBatch(Batch.Id)" >Delete</button></td>
            </tr>
        </table>

																
									</div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Batch</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddBatch()" />  
                    <div class="form-group">
                        <label for="Exam" >Course Title</label>
                         <select class="form-control"  ng-model="Batch.CourseTitle" required   name="CourseTitle" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <input class="form-control" ng-model="Batch.Batch"  name="Exam"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Session Fiscal</label>
                         <select class="form-control"  ng-model="Batch.SessionFiscal" required   name="BatchType" ng-options="Question.SID as Question.FiscalYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                      <div class="form-group">
                        <label for="Exam" >Session Calender </label>
                         <select class="form-control"  ng-model="Batch.SessionCalendar" required   name="BatchType" ng-options="Question.SID as Question.CalenderYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                     <div class="form-group">
                        <label for="Exam" >Organized BY  </label>
                         <select class="form-control"  ng-model="Batch.OrganizedBy" required   name="OrganizedBy" ng-options="Question.ID as Question.OrganizationName for Question in BatchabdExamCollection.Organized">
                            <option value="">Choose Option</option>
                        </select>
                    </div> 
                   
            
                    <div class="form-group">
                        <label for="Exam" >Course Fee</label>
                        <input class="form-control" ng-model="Batch.CourseFee"   name="CourseFee"/>
                    </div>
                     <div class="form-group">
                        <label for="Exam" >Exam Number</label>
                        <input class="form-control" type="number" ng-model="Batch.ExamNumber"   name="ExamNumber"/>
                    </div>
                    
                     <div class="form-group">
                                <label for="StartDate" >Start Date</label>
                                 
                                <input type="text"  ng-model="Batch.StartDate" id="StartDate" autocomplete="off" size="15" class="form-control" />
                    </div>
                     <div class="form-group">
                                <label for="EndDate" >End Date</label>
                                <input type="text"  ng-model="Batch.EndDate" id="EndDate"  autocomplete="off" size="15" class="form-control" />
                                
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Batch Type</label>
                         <select class="form-control"  ng-model="Batch.BatchType" required   name="BatchType" ng-options="Question.ID as Question.TypeName for Question in BatchabdExamCollection.batchtype">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Details</label>
                        <input class="form-control" ng-model="Batch.Details"  name="Exam"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Duration Type</label>
                         <select class="form-control"  ng-model="Batch.DurationType" required   name="DurationType" ng-options="Question.BDID as Question.Type for Question in BatchabdExamCollection.batchduration">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                     <div class="form-group">
                                <label for="DurationHour" >Duration Hour</label>
                                <input type="text"  ng-model="Batch.DurationHour"  class="form-control" />
                    </div>
                  
                     <div class="form-group">
                                <label for="Start" > Start Time</label>
                                <input type="text"  ng-model="Batch.StartTime"  class="form-control" />
                    </div>
                     <div class="form-group">
                                <label for="End" >End Time</label>
                                <input type="text"  ng-model="Batch.EndTime"  class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Day</label>
                        <select class="form-control" ng-model="Batch.ClassDay"   name="ClassDay">
                                <option value="1,3,5">Sat, Mon, Wed</option>
                                <option value="2,4,6">Sun, Tue, Thu</option>
                                <option value="1,2,3">Sat,Sun,Mon</option>
                                <option value="4,5,6">Tue,Wed,Thu</option>
                                <option value="1,2,3,4,5,6">Sat,Sun,Mon,Tue,Wed,Thu</option>
                                <option value="1,2,3,4,5,6,7">All Days</option>
                                 <option value="1,2">Sat, Sun</option>
                                <option value="2,3">Sun, Mon</option>
                                <option value="3,4">Mon, Tue</option>
                                <option value="4,5">Tue,Wed</option>
                                <option value="5,6">Wed,Thu</option>
                                <option value="1">Sat</option>
                                <option value="2">Sun</option>
                                <option value="3">Mon</option>
                                <option value="4">Tue</option>
                                <option value="5">Wed</option>
                                <option value="6">Thu</option>
                                <option value="7">Fri</option>
                        </select>
                    </div>
                    
                      <div class="form-group">
                        <label for="Exam" >Status</label>
                        <select class="form-control" ng-model="Batch.Status" disable  name="Status">
                            <option value="1">Not Start Yet</option>
                            <option value="2">Running</option>
                            <option value="3">Completed</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Is Public</label>
                        <select class="form-control" ng-model="Batch.isPublic" disable  name="isPublic">
                            <option value="0">Privatet</option>
                            <option value="1">Public</option>
                            
                        </select>
                    </div>
                                
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" name="Create" id="Create">Add</button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->

</div>
</div>
</div>
</body>
</html>

<script type="text/javascript">


            $(function () {
                    $("#StartDate").datepicker({
                        dateFormat: 'yy-mm-dd',
                        
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+365d'
                        
                    });
                    
                    
                });
               
                $(function () {
                    $("#EndDate").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+365d'
                    });
                });
                

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllBatch();
                GetAllBatchandExamCollectionField()
            }
            function initialize() {
                $scope.AllBatch = [];
                $scope.DeleteBatch = DeleteBatch;
                $scope.AddBatch = AddBatch;
                $scope.Batch = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

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
                
            function GetAllBatch()
            {
                $scope.AllBatch = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'PublicExam/GetAllBatch/'
                }).then(function successCallback(response) {
                    $scope.AllBatch = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteBatch(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'PublicExam/DeleteBatch/' + SId
                    }).then(function successCallback(response) {
                        swal("Batch!!", "Deleted Successfully!!");
                        GetAllBatch();
                    }, function errorCallback(response) {
                        swal("Batch!", "Not Deleted!!!!");
                    });

                }
            }

            function AddBatch()
            {
               
               
                if($scope.Batch.StartDate=="" || $scope.Batch.StartDate==undefined || $scope.Batch.StartDate==null  )
                {
                    $scope.Batch.StartDate="0000-00-00";
                }
                if($scope.Batch.EndDate=="" || $scope.Batch.EndDate==undefined  || $scope.Batch.EndDate==null )
                {
                    $scope.Batch.EndDate="0000-00-00"
                }
                
                
                if($scope.Batch.StartDate == "0000-00-00" && $scope.Batch.EndDate=="0000-00-00")
                {
                   
                    $scope.Batch.Status='1';
                }
                else if($scope.Batch.StartDate !="0000-00-00" && $scope.Batch.EndDate=="0000-00-00")
                {
                    
                    $scope.Batch.Status='2';
                }
                else if($scope.Batch.StartDate !="0000-00-00" && $scope.Batch.EndDate !="0000-00-00")
                {
                    
                    $scope.Batch.Status='3';
                }
                else
                {
                    
                     $scope.Batch.Status='4';
                }
                
                //update
                if ($scope.Batch.Id > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'PublicExam/UpdateBatch/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Batch)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllBatch();
                        $scope.Batch={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "Batch");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'PublicExam/AddBatch/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Batch)
                    }).success(function (data) {
                        console.log(data);
                        GetAllBatch();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "Batch");
                        $scope.Batch = {};
                    });
                }
            }

            function Edit(Batch)
            {
                $scope.Batch = {};
                $scope.Batch = Batch;
            }
            
            function reset()
            {
                $scope.Batch = {};
            }

        }]);
</script>