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
                                            <i class="fas fa-user-plus" aria-hidden="true"></i>Add Student</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                          
                            <div class="row">              
                                      <div class="form-group col-md-3">
                <label for="Exam" >Batch Name</label>
                <select class="form-control"  ng-model="BatchID" ng-change="GetAllStudent(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
            </div>
							   <!-- <div class="form-group col-md-3">
									<label for="Exam" >Session</label>
									<select class="form-control" ng-model="Session" required  name="Session">
										<option value="">Select </option>
										$year=date("Y");
										<?php
										for ($i = date("Y") - 5; $i <= date("Y") + 5; $i++) {
											echo "<option value='" . $i . "/" . ($i + 1) . "'>" . $i . "/" . ($i + 1) . " </option>";
										}
										?>

									</select>
								</div>
								<div class="form-group col-md-3">
									<label for="Exam" >Calendar Year</label>
									<select class="form-control" ng-model="CalendarYear" required  name="CalendarYear">
										<option value="">Select </option>
										$year=date("Y");
										<?php
										for ($i = date("Y") - 5; $i <= date("Y") + 5; $i++) {
											echo "<option value='" . $i . "'>" . $i . " </option>";
										}
										?>                            
									</select>
								</div> -->
								<div class="form-group col-md-3">
									<label for="Exam" >Gender</label>
									<select class="form-control" ng-model="Gender" required  name="Gender">
										<option value="">Select </option>
										<option value="Male">Male </option>
										<option value="Female">Female </option>
										<option value="Other">Other </option>
									</select>
								</div>
								</div>
									
		<table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> Name </th>
                <th> RegNo </th>
                <th> Session </th>
                <th> Year </th>
                <th> Gender </th>
                <th> Mobile </th>
                <th> Photo </th>
                 <th> Status </th>
               
                <th>Action </th>
            </tr>
            <tr ng-repeat="Student3 in AllStudent| filter:{Session:Session} | filter:{CalendarYear:CalendarYear} | filter:{Gender:Gender}:true">
                <td>{{$index + 1}} </td>
                <td>{{Student3.Name}} </td>
                <td>{{Student3.RegNO}} </td>
                <td>{{Student3.FiscalYear}} </td>
                <td>{{Student3.CalenderYear}} </td>
                <td>{{Student3.Gender}} </td>
                <td>{{Student3.Mobile}} </td>
                 <td> <img data-ng-src="data:image/png;base64,{{Student3.Photo}}" width="70" height="70"> </td>
             <td>{{Student3.StudentStatus2}} </td>
                <td>
                      <button class="btn btn-sm btn-open" data-toggle="modal" data-target="#myStudentShowModal2" ng-click="ShowStudent(Student3)" >View</button>
                       <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myResultShowModal"  ng-click="GetIndividualExamResult(Student3)" >Result</button>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Student3)" >Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="DeleteStudent(Student3.SID)" >Delete</button>
                   </td> 
            </tr>
        </table>
									
										
										
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


    <!-- Add Modal -->
   <!-- Student Result Modal -->
    <div class="modal fade " id="myResultShowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">   <span class="glyphicon glyphicon-print" id='printResult' style="cursor: pointer;"  >Print</span>   Exam Result
                        </h6>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body myPrintExamResult">
                       <h6 style="text-align:center;"> BCC, Barishal Exam Result</h6>
                       <br>
                     <p> Name: {{OneStudentinfo.Name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Batch: {{OneStudentinfo.Batch}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RegNo: {{OneStudentinfo.RegNO}}</p>   
            <br>
            <table class="table table-striped">
            <tr>
               <th>SN </th>
                <th>Exam Module </th>
                <th> MCQ </th>
                <th> Theory </th>
                   <th> Practical </th>
                <th> Total </th>
            </tr>
           <tr ng-repeat="Result in ExamResult.Result">
                <td>{{$index + 1}} </td>
                <td>{{Result.ExamName}} </td>
                <td>{{Result.MCQMarksGet}} </td>
                <td>{{Result.Theory}} </td>
                <td>{{Result.Practical}} </td>
                <td>{{Result.totalAmount}} </td>
            </tr>
            <tr>
                <th>Total Exam : {{ExamResult.GrandResult.ExamNumber}}</th>
                <th> Total Attend : {{ExamResult.GrandResult.ExamAttend}} </th>
                 <th>Result Status</th>
                <th> 
                <span ng-show="ExamResult.GrandResult.Grandtotal=='Failed'" style="color:red;">{{ExamResult.GrandResult.Grandtotal}}</span>
                <span ng-show="ExamResult.GrandResult.Grandtotal=='Passed'" style="color:Green;">{{ExamResult.GrandResult.Grandtotal}}</span>
                </th>
                <th> Final Marks : {{ExamResult.GrandResult.Number | number:2}}</th>
                <th> 
                GPA: <span ng-show="ExamResult.GrandResult.Grandtotal=='Passed'">{{ExamResult.GrandResult.GPA }}</span> 
                </th>
            </tr>
           
           
        </table> 
                     
                </div>
                <div class="modal-footer">
                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->
    
    
        <!-- Student Show Modal -->
    <div class="modal fade" id="myStudentShowModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Student Info</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
            <div class="modal-body" style="overflow-x:scroll;" >
                     <h4>Basic Info</h4>    
            <table class="table table-striped">
            <tr>
               
                <th> Name </th>
                <th> RegNo </th>
                <th> Gender </th>
                   <th> Disable </th>
                <th> Physical Detail </th> 
                <th>  </th>
            </tr>
            <tr>
                <td>{{StudentSingleData.Name}} </td>
                <td>{{StudentSingleData.RegNO}} </td>
                 <td>{{StudentSingleData.Gender}} </td>
                     <td>{{StudentSingleData.IsDisable}} </td>
                  <td>{{StudentSingleData.PhysicalDetail}} </td>
                  <td> <img data-ng-src="data:image/png;base64,{{StudentSingleData.Photo}}" width="100" height="100"> </td>
               
            </tr>
        </table> 
        
                    
                     <h4>Officials Info</h4>   
           <table class="table table-striped">
            <tr>
               
                <th> RegNo </th>
                <th> Session </th>
                <th> Year </th>
                <th> Batch </th>
                <th> Fee </th>
                
                
            </tr>
            <tr>
               
                <td>{{StudentSingleData.RegNO}} </td>
                <td>{{StudentSingleData.FiscalYear}} </td>
                <td>{{StudentSingleData.CalenderYear}} </td>
                <td>{{StudentSingleData.Batch}} </td>
                <td>{{StudentSingleData.CourseFee}} </td>
              
                
            </tr>
        </table>  
         <table class="table table-striped">
            <tr>
                <th> DurationType </th>
                <th> DurationHour </th>
                <th> Start- End </th>
                <th> Batch Type </th>
                <th> Participant Type </th>
            </tr>
            <tr>
                <td>{{StudentSingleData.DurationTypeName}} </td>
                <td>{{StudentSingleData.DurationHour}} </td>
                <td>{{StudentSingleData.StartDate}}-{{StudentSingleData. EndDate}}</td>
                <td>{{StudentSingleData.BatchTypeName}} </td>
                <td>{{StudentSingleData.ParticipentTypeName}} </td>
                
            </tr>
        </table>  
                 
                  <h4>Contact Info</h4>
                 
        <table class="table table-striped">
            <tr>
                <th> Mobile </th>
                <th> Email </th>
              
            </tr>
            <tr>
               <td>{{StudentSingleData.Mobile}} </td>
                <td>{{StudentSingleData.Email}} </td>
              
            </tr>
        </table>      
                 
                 <h4>Certificate Info</h4>
                 
        <table class="table table-striped">
            <tr>
             
             
                <th> Is Certified </th>
                <th> Certificate No </th>
              
            </tr>
            <tr>
            
              
                <td>{{StudentSingleData.IsCertified}} </td>
                <td>{{StudentSingleData.CertificateNo}} </td>
              
            </tr>
        </table>      
                       
                </div>
                <div class="modal-footer">

                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->
    
    
    

    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Student</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddStudent()" />  

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
                <div class="modal-footer">
                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->

   
    <!--modal end-->

</div>
</div>
</div>
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
                GetAllBatchandExamCollectionField()

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