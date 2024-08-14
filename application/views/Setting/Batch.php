
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
          <div class="row"> 
        <div class="form-group col-md-5">
            <label for="Exam" >Course Title</label>
             <select class="form-control"  ng-model="CourseTitle" ng-change="GetAllCourseSubject(CourseTitle);" required   name="CourseSubject" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                <option value="">Choose Option</option>
            </select>
        </div> 
        <div class="form-group col-md-7">
            <label for="Exam" >Search Batch</label>
             <input class="form-control" ng-model="SearchKey" required  name="Exam"/>
            
        </div> 
        </div>
          
      <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Course Title </th>
                <th>Batch No </th>    
                 <th>Batch Type </th> 
                 
                
                  <th> Year </th>
                  <th>Start-End  </th>
                
                    <th>Exam </th>
                   <th>Status </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="Batch in AllBatch | filter: { CourseTitle: CourseTitle } | filter:SearchKey">
                <td>{{$index + 1}} </td>
                <td>{{Batch.CourseTitleName}} </td>
                <td>{{Batch.Batch}} [<b>{{Batch.DurationTypeName}}][{{Batch.DurationHour}} Hours] Fee: {{Batch.CourseFee}}</b> </td>
                 <td>{{Batch.TypeName}} [{{Batch.Details}}] <b>Organized: </b>{{Batch.OrganizationName}} </td>
                  <td><b>Fiscal</b> {{Batch.FiscalYear}} <b>Calender</b>{{Batch.CalenderYear}} </td>
                  <td>{{Batch.StartDate}}  <b>To</b> {{Batch.EndDate}} </td>
              
              
                  <td>{{Batch.ExamNumber}} </td>
                   <td>{{Batch.StatusName}} </td>
                    
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
                        <input class="form-control" ng-model="Batch.Batch" required  name="Exam"/>
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
                        <input class="form-control" ng-model="Batch.CourseFee" required  name="CourseFee"/>
                    </div>
                     <div class="form-group">
                        <label for="Exam" >Exam Number</label>
                        <input class="form-control" type="text" oninput="this.value=this.value.replace(/[^\d]/g,'')" ng-model="Batch.ExamNumber" required   name="ExamNumber"/>
                    </div>
                    
                     <div class="form-group">
                                <label for="StartDate" >Start Date</label>
                                 
                                <input type="text"  ng-model="Batch.StartDate" id="StartDate" required autocomplete="off" size="15" class="form-control" />
                    </div>
                     <div class="form-group">
                                <label for="EndDate" >End Date</label>
                                <input type="text"  ng-model="Batch.EndDate" id="EndDate" required  autocomplete="off" size="15" class="form-control" />
                                
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
                                <input type="text"  ng-model="Batch.DurationHour" required  class="form-control" />
                    </div>
                  
                     <div class="form-group">
                                <label for="Start" > Start Time</label>
                                
                                <select class="form-control" ng-model="Batch.StartTime" required   name="ClassDay">
                                <option value="6">6 AM</option>
                                <option value="7">7 AM</option>
                                <option value="8">8 AM</option>
                                <option value="9">9 AM</option>
                                <option value="10">10 AM</option>
                                <option value="11">11 AM</option>
                                <option value="12">12 PM</option>
                                <option value="13">1 PM</option>
                                <option value="14">2 PM</option>
                                <option value="15">3 PM</option>
                                <option value="16">4 PM</option>
                                <option value="17">5 PM</option>
                                <option value="18">6 PM</option>
                                <option value="19">7 PM</option>
                                <option value="20">8 PM</option>
                                <option value="21">9 PM</option>
                                <option value="22">10 PM</option>
                                <option value="23">11 PM</option>
                                <option value="24">12 AM</option>
                                <option value="1">1 AM</option>
                                <option value="2">2 AM</option>
                                <option value="3">3 AM</option>
                                <option value="4">4 AM</option>
                                <option value="5">5 AM</option>
                               
                                </select>
                                
                                
                                <!--<input type="text"  ng-model="Batch.StartTime"  class="form-control" />-->
                    </div>
                     <div class="form-group">
                                <label for="End" >End Time</label>
                                <select class="form-control" ng-model="Batch.EndTime"  required  name="ClassDay">
                                <option value="6">6 AM</option>
                                <option value="7">7 AM</option>
                                <option value="8">8 AM</option>
                                <option value="9">9 AM</option>
                                <option value="10">10 AM</option>
                                <option value="11">11 AM</option>
                                <option value="12">12 PM</option>
                                <option value="13">1 PM</option>
                                <option value="14">2 PM</option>
                                <option value="15">3 PM</option>
                                <option value="16">4 PM</option>
                                <option value="17">5 PM</option>
                                <option value="18">6 PM</option>
                                <option value="19">7 PM</option>
                                <option value="20">8 PM</option>
                                <option value="21">9 PM</option>
                                <option value="22">10 PM</option>
                                <option value="23">11 PM</option>
                                <option value="24">12 AM</option>
                                <option value="1">1 AM</option>
                                <option value="2">2 AM</option>
                                <option value="3">3 AM</option>
                                <option value="4">4 AM</option>
                                <option value="5">5 AM</option>
                               
                                </select>
                                <!--<input type="text"  ng-model="Batch.EndTime"  class="form-control" />-->
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Day</label>
                        <select class="form-control" ng-model="Batch.ClassDay" required  name="ClassDay">
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
                        <select class="form-control" ng-model="Batch.Status" required disable  name="Status">
                            <option value="1">Not Start Yet</option>
                            <option value="2">Running</option>
                            <option value="3">Completed</option>
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
                    url: baseUrl + 'Setting/GetAllBatch/'
                }).then(function successCallback(response) {
                    $scope.AllBatch = response.data;
                    console.log($scope.AllBatch);
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
                        url: baseUrl + 'Setting/DeleteBatch/' + SId
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
                        url: baseUrl + 'Setting/UpdateBatch/',
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
                        url: baseUrl + 'Setting/AddBatch/',
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