<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >


<div class="container-fluid" style="width:80%; margin:auto;" >
                    
            <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"><?php echo $Title;  ?></h1>
                                <ol class="breadcrumb float-right">
                                    <li class=""></li>
                                    
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
             
           
            
</div>
<div class="container-fluid" style="width:80%; margin:auto;">
 <div class="row">       
     <div class="col-xl-12">
          <div class="card mb-12">
             <div class="card-body">
                 <form name="SOSForm" ng-submit="AddStudent()" >  
    
            <div class="form-group">
                <label for="Exam" >Batch Name</label>
                <select class="form-control"  ng-model="Student.BatchID" required ng-change="GetCoursefee(Student.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="Exam" >Student Name</label>
                <input class="form-control" ng-model="Student.Name" required  name="Name"/>
            </div>
    
            <div class="form-group">
                <label for="Exam" >Student RegNO</label>
                <input class="form-control" ng-model="Student.RegNO" required  name="RegNO"/>
            </div>
          <!--  <div class="form-group">
                <label for="Exam" >Session</label>
                <select class="form-control" ng-model="Student.Session" required  name="Session">
                    <option value="">Select </option>
                    $year=date("Y");
                    <?php
                    for ($i = date("Y") - 5; $i <= date("Y") + 5; $i++) {
                        echo "<option value='" . $i . "/" . ($i + 1) . "'>" . $i . "/" . ($i + 1) . " </option>";
                    }
                    ?>
    
                </select>
    
            </div>
    
            <div class="form-group">
                <label for="Exam" >Calendar Year</label>
                <select class="form-control" ng-model="Student.CalendarYear" required  name="CalendarYear">
                    <option value="">Select </option>
                    $year=date("Y");
                    <?php
                    for ($i = date("Y") - 5; $i <= date("Y") + 5; $i++) {
                        echo "<option value='" . $i . "'>" . $i . " </option>";
                    }
                    ?>                            
                </select>
            </div> -->
    
            <div class="form-group">
                <label for="Exam" >Gender</label>
                <select class="form-control" ng-init="Student.Gender='Male'" ng-model="Student.Gender" required  name="Gender">
                    <option value="">Select </option>
                    <option value="Male">Male </option>
                    <option value="Female">Female </option>
                    <option value="Other">Other </option>
                </select>
            </div>
    
    
            <div class="form-group">
                <label for="Exam" >Participant Type</label>
                <select class="form-control" ng-init="Student.ParticipantType='1'"  ng-model="Student.ParticipantType" required   name="ParticipantType" ng-options="Question.ID as Question.TypeName for Question in BatchabdExamCollection.participant_type">
                    <option value="">Choose Option</option>
                </select>
            </div>
    
    
            <div class="form-group">
                <label for="Exam" >Is Physical Disable</label>
                <select class="form-control" ng-init="Student.IsPhysicalDisable='0'" ng-model="Student.IsPhysicalDisable" required  name="IsPhysicalDisable">
    
                    <option value="0" >NO </option>
                    <option value="1">Yes </option>
    
                </select>
            </div>
            <div class="form-group" ng-show="Student.IsPhysicalDisable==1">
                <label for="Exam" >Physical Detail</label>
                <textarea class="form-control" ng-model="Student.PhysicalDetail"  name="Physical Detail"></textarea>
            </div>
    
            <div class="form-group">
                <label for="Exam" >Mobile</label>
                <input class="form-control" ng-model="Student.Mobile"  name="Mobile"/>
            </div>
            <div class="form-group">
                <label for="Exam" >Email</label>
                <input class="form-control" type="email" ng-model="Student.Email"  name="Email"/>
            </div>
    
            <div class="form-group">
                <label for="Exam" >Is Certified</label>
                <select ng-init="Student.IsCertified='0'" class="form-control" ng-model="Student.IsCertified"   name="IsCertified">
                    <option value="0">No </option>
                    <option value="1">Yes </option>                         
                    <option value="2">Pending </option>
                </select>
    
            </div>
            <div class="form-group" ng-show="Student.IsCertified!=0">
                <label for="Exam" >Certificate No</label>
                <input class="form-control" type="text" ng-model="Student.CertificateNo"  name="CertificateNo"/>
            </div>
            
              <div class="form-group">
                <label for="Exam" >Course Fee</label>
                <input class="form-control" type="text" ng-model="Student.CourseFee"  name="CourseFee"/>
            </div>
            
             <div class="form-group">
                <label for="StudentStatus" >Student Status</label>
                <select class="form-control" ng-init="Student.StudentStatus='1'" ng-model="Student.StudentStatus" required  name="StudentStatus">
                 
                    <option value="1">Active </option>
                    <option value="0">InActive </option>
                    
                </select>
            </div>
            
             <div class="form-group">
                <label for="Exam" >Photo</label>
                <input class="form-control" type="file"  id="imgs" ng-model="Student.Photo" accept=".jpg,.png,.gif,.jpeg" name="Img" capture="camera"/>
            </div>
            
            
                
            <div class="form-group">
                <button type="Submit" class="btn btn-info" name="Create" id="Create">Add</button>
            </div>
            </form>
            </div>
        </div>        
    </div>
</div>
</div>
   
    



<!-- END content-page -->

</div>
    <!-- END main -->
</body>
</html>



<script type="text/javascript">

$(function () {
        $('#printResult').on('click', function () {
            $.print(".myPrintExamResult");
        });
    });

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                // GetAllStudent();
                GetAllBatchandExamCollectionField();
                

            }
            function initialize() {
                $scope.AllStudent = [];
                $scope.DeleteStudent = DeleteStudent;
                $scope.AddStudent = AddStudent;
              
                $scope.GetIndividualExamResult=GetIndividualExamResult;
                $scope.ExamResult=[];
                $scope.OneStudentinfo={};
                
                $scope.Student = {};
                $scope.Edit = Edit;
                $scope.reset = reset;
                $scope.GetAllStudent = GetAllStudent;
                $scope.BatchID = 0;
                $scope.GetCoursefee=GetCoursefee;
                $scope.ShowStudent=ShowStudent;
                $scope.StudentSingleData={};
            }


            function ShowStudent(Std)
            {
                $scope.StudentSingleData={};
                $scope.StudentSingleData=Std;
                console.log($scope.StudentSingleData);
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
                $scope.BatchabdExamCollection = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Webview/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;
                    console.log($scope.BatchabdExamCollection);

                }, function errorCallback(response) {
                });
            }

            function GetAllStudent(x)
            {
                   $("#LoadingID").css("display", "block");
                $scope.AllStudent = [];
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Student/GetAllStudent/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    $("#LoadingID").css("display", "none");
                    console.log($scope.AllStudent);
                }, function errorCallback(response) {
                    $("#LoadingID").css("display", "none");
                });
            }
        
            function GetIndividualExamResult(student)
            {
                $scope.OneStudentinfo=student;
                var SId = $scope.OneStudentinfo.SID;

              $scope.ExamResult = [];
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Student/GetIndividualExamResult/' + SId
                    }).then(function successCallback(response) {
                        $scope.ExamResult = response.data;
                        console.log($scope.ExamResult);
                    }, function errorCallback(response) {
                        swal("Student!", "Not Deleted!!!!");
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
               // console.log($scope.Student);
               
               var Studentdata =[];
                $scope.Student.Photo = "";
                var files = $("#imgs").get(0).files;
                var Studentdata = JSON.stringify($scope.Student);
               
                //update
                if ($scope.Student.SID > 0)
                {
                    $scope.BID=$scope.Student.BatchID;
                    
                    
                    //add
                    
                     var formData = new FormData();
                        formData.append('Studentinfo', Studentdata);
                            if (files.length > 0)
                            {
                                var oFile = document.getElementById("imgs").files[0];
                               
                                if (oFile.size > 262144) {
                                  
                                    alert('File size exceeds 250 kb');
                                    return;
                                   
                                } else {
                                
                                   $http({
                                    method: 'POST',
                                    url: baseUrl + 'Student/UpdateStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                     console.log(data);

                                    $scope.Student = {};
                                    GetAllStudent($scope.BID);
                                    $('#myModal').modal('toggle');
                                    document.getElementById('imgs').src = " ";
                                    swal(data, "Student");
                                });
                                       
                                }
                                                  
                            }
                            if (files.length <= 0)
                            {
                                $http({
                                    method: 'POST',
                                    url: baseUrl + 'Student/UpdateStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).success(function (data) {
                                     console.log(data);

                                    $scope.Student = {};
                                    GetAllStudent($scope.BID);
                                    $('#myModal').modal('toggle');
                                     document.getElementById('imgs').src = " ";
                                    swal(data, "Student");
                                });
                                    
                                
                            }
                   
                    
                }
                else {
                    //add
                    
                     var formData = new FormData();
                        formData.append('Studentinfo', Studentdata);
                            if (files.length > 0)
                            {
                                var oFile = document.getElementById("imgs").files[0];
                               
                                if (oFile.size > 262144) {
                                  
                                    alert('File size exceeds 250 kb');
                                    return;
                                   
                                } else {
                                
                                   $http({
                                    method: 'POST',
                                    url: baseUrl + 'Student/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                    GetAllStudent($scope.BatchID);
                                    //$('#myModal').modal('toggle');
                                    swal(data, "Student");
                                    
                                    $scope.BatchID=$scope.Student.BatchID;
                                    $scope.CourseFee=$scope.Student.CourseFee;
                                    
                                    $scope.Student = {};
                                    $scope.Student.IsPhysicalDisable='0';
                                    $scope.Student.ParticipantType='1';
                                    $scope.Student.Gender='Male';
                                    $scope.Student.StudentStudentStatus=1;
                                    
                                    $scope.Student.IsCertified='0';
                                    $scope.Student.BatchID=$scope.BatchID;
                                    $scope.Student.CourseFee=$scope.CourseFee;
                                     document.getElementById('imgs').src = " ";
                                });
                                       
                                }
                                                  
                            }
                            if (files.length <= 0)
                            {
                                $http({
                                    method: 'POST',
                                    url: baseUrl + 'Student/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                    GetAllStudent($scope.BatchID);
                                    //$('#myModal').modal('toggle');
                                    swal(data, "Student");
                                    
                                    $scope.BatchID=$scope.Student.BatchID;
                                    $scope.CourseFee=$scope.Student.CourseFee;
                                    
                                    $scope.Student = {};
                                    
                                    $scope.Student.IsPhysicalDisable='0';
                                    $scope.Student.ParticipantType='1';
                                    $scope.Student.Gender='Male';
                                    $scope.Student.StudentStatus=1;
                                    $scope.Student.IsCertified='0';
                                    $scope.Student.BatchID=$scope.BatchID;
                                    $scope.Student.CourseFee=$scope.CourseFee;
                                     document.getElementById('imgs').src = " ";
                                });
                                    
                                
                            }
                    
                }
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