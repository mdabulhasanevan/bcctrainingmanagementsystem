<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> Admission Setup  </h1>
            <ol class="breadcrumb float-right">
                <li class=""><?php echo $_SERVER['REQUEST_URI']; ?></li>
                
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                <div class="pull-left">
                  <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> অ্যাড করুন</button> 
                </div>
        
                 <div class="pull-right">
                    <form method="post" action="<?php echo base_url(); ?>Setting/Exportaction">
                     <input type="submit" name="export" class="" value="Export" />
                    </form>
                    
                </div>
                <div class="pull-right">
                <form method="post" id="import_form" enctype="multipart/form-data">
                 
                   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                   <input type="submit" name="import" value="Import" class="" />
                </form>
                </div>
                </div>
                    <!-- end card-header -->

  
    <!--List of EducationalInstitute-->
 <div class="card-body">
        <div class="table-responsive">

    <div class="col-md-12">
        
        <div class="form-group">
                        <label for="Exam" >Course Title</label>
                         <select class="form-control"  ng-model="CourseTitle" ng-change="GetAllCourseAdmission(CourseTitle);" required   name="CourseSubject" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
        
        <table class="table table-striped">
            <tr>
                
                <th>Batch Name </th>
                <th> Detail  </th>
                <th>Start to End </th>
                <th>AvailableSeats </th>
                 <th>Fee </th>
                 <th>Age Limit  </th>
                <th>Requirements </th>
                <th>PreExam </th>
                 <th>Payment </th>
                  <th>Status </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="CourseAdmission in AllCourseAdmission">
                
                <td>{{CourseAdmission.BatchName}} </td>
                 <td>{{CourseAdmission.AdmissionDetail}} </td>
                <td>{{CourseAdmission.AdmissionStartDate}} to {{CourseAdmission.AdmissionEndDate}} </td>
                <td>{{CourseAdmission.AvailableSeats}} </td>
               
                 <td>{{CourseAdmission.AdmissionFee}} </td>
                 <td>{{CourseAdmission.AgeLimit}} </td>
                <td>{{CourseAdmission.Requirements}} </td>
               <td> <span ng-show="CourseAdmission.PreExam==1">Exam</span>  </td>
                 <td> <span ng-show="CourseAdmission.PaymentPolicy==1">Yes</span>  </td>
                 <td>{{CourseAdmission.Status}} </td>
                
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(CourseAdmission)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteCourseAdmission(CourseAdmission.AdmissionSetID)" >Delete</button>
                </td>
            </tr>
        </table>

    </div>


 </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
     
    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Course Subject </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddAdmissionSetup()" autocomplete="off" />     
                     <div class="form-group">
                        <label for="Exam" >Course Title</label>
                         <select class="form-control"  ng-model="Admission.CourseID" ng-change="GetAllCourseSubjeTitleTopics(CourseSubject.CourseID);" required   name="CourseID" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                    
                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <input class="form-control" ng-model="Admission.BatchName"  ="Detail"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Admission Detail </label>
                        <textarea class="form-control" ng-model="Admission.AdmissionDetail"  ="Detail"> </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Available Seats </label>
                        <input class="form-control" ng-model="Admission.AvailableSeats"  ="Detail"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Admission Start</label>
                         <input class="form-control" ng-model="Admission.AdmissionStartDate" id="AdmissionStartDate"   name="DOB" />
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Admission End</label>
                         <input class="form-control" ng-model="Admission.AdmissionEndDate" id="AdmissionEndDate"   name="DOB" />
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Admission Fee</label>
                        <input class="form-control" ng-model="Admission.AdmissionFee"  ="Detail"/>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="Exam" >Age Limit</label>
                        <input class="form-control" ng-model="Admission.AgeLimit"/>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Minimum Requirement</label>
                        <input class="form-control" ng-model="Admission.Requirements"  ="Detail"/>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Pre Exam</label>
                        <select ng-model="Admission.PreExam"  ng-required="true" class="form-control"> 
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Payment Policy</label>
                        <select ng-model="Admission.PaymentPolicy"  ng-required="true" class="form-control"> 
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Status </label>
                        <select ng-model="Admission.Status"  ng-required="true" class="form-control"> 
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        </select>
                    </div>
                     
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" ="Create" id="Create">Add</button>
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
</body>
</html>

<script type="text/javascript">

    $(function () {
        $("#AdmissionStartDate").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100y:c+nn',
            maxDate: '+365d'
        });
    });
    $(function () {
        $("#AdmissionEndDate").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100y:c+nn',
            maxDate: '+365d'
        });
    });

    app.controller("DefaultCtrl", ["$scope", "$http", "$filter",
        function ($scope, $http, $filter) {
            init();
            function init() {
                initialize();
                
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllCourseAdmission = [];
                $scope.GetAllCourseAdmission=GetAllCourseAdmission;
                $scope.DeleteCourseAdmission = DeleteCourseAdmission;
                
                $scope.AddAdmissionSetup = AddAdmissionSetup;
                
                $scope.CourseSubject = {};
                $scope.Edit = Edit;
                $scope.reset=reset;
                $scope.BatchabdExamCollection =[];
                $scope.CourseTitle="";
                $scope.GetAllCourseSubjeTitleTopics=GetAllCourseSubjeTitleTopics;
                $scope.TopicsList =="";

            }
            
            function GetAllCourseSubjeTitleTopics(CourseID)
            {
                var x=CourseID;
               //  console.log(CourseID);
                $scope.CourseTitleFilterByID = $filter('filter')($scope.BatchabdExamCollection.CourseTitle, {'ID':x});
                $scope.TopicsList=  $scope.CourseTitleFilterByID[0].TopicsList
                console.log( $scope.TopicsList);
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

            function GetAllCourseAdmission(x)
            {
               
             var id=x;   
             //console.log(id);
                $scope.AllCourseAdmission = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Admission/GetAllCourseAdmission/'+id
                }).then(function successCallback(response) {
                    $scope.AllCourseAdmission = response.data;
                    //console.log($scope.AllCourseAdmission);
                }, function errorCallback(response) {
                });
                
                //$scope.CourseTitleFilterByID = $filter('filter')($scope.BatchabdExamCollection.CourseTitle, {'ID':id});
                //$scope.TopicsList=  $scope.CourseTitleFilterByID[0].TopicsList
            }

            function DeleteCourseAdmission(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Admission/DeleteCourseAdmission/' + SId
                    }).then(function successCallback(response) {
                        swal("DeleteCourseAdmission!", "Deleted Successfully!!");
                       
                        GetAllCourseAdmission($scope.CourseTitle);
                    }, function errorCallback(response) {
                        swal("DeleteCourseAdmission!", "Not Deleted!!!!");
                    });

                }
            }

            function AddAdmissionSetup()
            {
               // console.log($scope.CourseSubject);
                //update
                if ($scope.Admission.AdmissionSetID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Admission/UpdateAdmissionSetup/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Admission)
                    }).success(function (data) {   
                        console.log(data);
                        
                        // $scope.CourseIDtem=$scope.CourseSubject.CourseID;
                        $scope.CourseSubject={};
                       GetAllCourseAdmission($scope.CourseTitle);
                        
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "AdmissionSetup");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Admission/AddAdmissionSetup/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Admission)
                    }).success(function (data) {
                        console.log(data);
                        
                        // $('#myModal').modal('toggle');
                        
                        $scope.CourseIDtem=$scope.CourseSubject.CourseID;
                        
                        $scope.CourseSubject = {};
                        //$scope.CourseSubject.CourseID=$scope.CourseIDtem;
                        GetAllCourseAdmission($scope.CourseTitle);
                         
                        swal("Successfully added", "AdmissionSetup");
                        
                    });
                }
            }

            function Edit(CourseAdmission)
            {
                $scope.Admission = {};
                $scope.Admission = CourseAdmission;
            }
            
            function reset()
            {
                $scope.CourseSubject = {};
            }

        }]);
</script>