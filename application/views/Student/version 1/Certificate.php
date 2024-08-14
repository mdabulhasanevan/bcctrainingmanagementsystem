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
                                   
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                       <div class="col-md-12">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="Exam" >Batch Name</label>
                <select class="form-control"  ng-model="BatchID" ng-change="GetAllStudent(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
            </div>
         
        </div>
        <!--Total:{{AllStudent.length }}-->

        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> Name </th>
                <th> Batch </th>
                <th> RegNo </th>
                <th> Session </th>
                <th> Certificate No </th>
                
               <!-- <th> Is Certified </th>-->
                <th> Certificate Edit </th>
                          
                <th>Is Certified </th>
            </tr>
            <tr ng-repeat="Student3 in AllStudent">
                <td>{{$index + 1}} </td>
                <td>{{Student3.Name}} </td>
                 <td>{{Student3.Batch}} </td>
                <td>{{Student3.RegNO}} </td>
                <td>{{Student3.FiscalYear}} </td>
                 <td>{{Student3.Certificate2}} </td>
              
               <!--   <td> <input type="checkbox"  ng-model="Student3.IsCertified" ng-checked="Student3.IsCertified==1" ng-true-value="'1'" ng-false-value="'0'" /> </td>-->
               
                <td>  <input type="text"  ng-readonly="Student3.IsCertified==1" ng-model="Student3.CertificateNo"/> </td>

                <td>
                    to <span ng-show="Student3.IsCertified==1">edit</span><span ng-show="Student3.IsCertified==0">save</span>
                    <input type="checkbox"  ng-model="Student3.IsCertified" ng-checked="Student3.IsCertified==1" ng-true-value="'1'" ng-false-value="'0'" />
<!--                    <button class="btn btn-small btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Student3)" >Edit</button>
                    <button class="btn btn-small btn-danger" ng-click="DeleteStudent(Student3.SID)" >Delete</button>-->
                </td>
            </tr>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><button  class="btn btn-danger" ng-click="AddStudent()">Save</button></td>
          </tr>
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
                // GetAllStudent();
                GetAllBatchandExamCollectionField()

            }
            function initialize() {
                $scope.AllStudent = [];
                $scope.DeleteStudent = DeleteStudent;
                $scope.AddStudent = AddStudent;
                $scope.Student = {};
                $scope.Edit = Edit;
                $scope.reset = reset;
                $scope.GetAllStudent = GetAllStudent;
                $scope.BatchID = 0;
                $scope.GetCoursefee=GetCoursefee;
                
                $scope.Student3={};
            }

            
            function GetCoursefee(id)
            {
                
                angular.forEach($scope.BatchabdExamCollection.batch, function (b) {
                    if (b.Id == id)
                    {
                       $scope.Student.CourseFee=b.CourseFee;
                    }
                });

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
                $scope.AllStudent = [];
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Student/GetAllStudent/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    console.log($scope.AllStudent);
                }, function errorCallback(response) {
                });
            }

            function DeleteStudent(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Student/DeleteStudent/' + SId
                    }).then(function successCallback(response) {
                        swal("Student!!", "Deleted Successfully!!");
                        GetAllStudent($scope.BatchID);
                    }, function errorCallback(response) {
                        swal("Student!", "Not Deleted!!!!");
                    });

                }
            }

            function AddStudent()
            {             
                console.log($scope.AllStudent);
               
                    $scope.BID=$scope.BatchID;
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Student/UpdateStudentCertificate/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.AllStudent)
                    }).success(function (data) {
                       
//                      $scope.Student = {};
                        GetAllStudent($scope.BID);
                        swal(data, "Student");
                    });
                            
            }

            function Edit(Student)
            {
                $scope.Student = {};
                $scope.Student = Student;
            }

            function reset()
            {
                $scope.Student = {};
            }

        }]);
</script>