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
                <select class="form-control"  ng-model="AdmissionSetID" ng-change="GetAllAdmissionRegistrationList(AdmissionSetID)"   name="AdmissionSetID" ng-options="Question.AdmissionSetID as Question.BatchName for Question in GetAllAdmissionBatch.BatchList">
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
			</div>
									
		<table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> Name </th>
                <th> RegNo </th>
                <th> Type </th>
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
                 <td>{{Student3.TypeName}} </td>
                <td>{{Student3.Gender}} </td>
                <td><a href="tel:{{Student3.Mobile}}">{{Student3.Mobile}}</a> </td>
                 <td> <img data-ng-src="data:image/png;base64,{{Student3.Photo}}" width="70" height="70"> </td>
             <td>{{Student3.StatusText}} </td>
                <td>
                      <button class="btn btn-sm btn-open" data-toggle="modal" data-target="#myStudentShowModal2" ng-click="ShowStudent(Student3)" >View</button>
                      
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Student3)" >Edit</button>
                    
                    <button class="btn btn-sm btn-primary" ng-click="ConfirmStudent(Student3.SID)" >Confirm</button>
                    <button class="btn btn-sm btn-danger" ng-click="DeleteStudent(Student3.SID)" >Delete</button>
                   </td> 
            </tr>
        </table>
									
										
										
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


        <!-- Student Show Modal -->
   <div class="modal fade " id="myStudentShowModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Student Info</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
            <div class="modal-body myPrintBatch" style="overflow-x:scroll;" >
             <span class="fa fa-print float-right" id='printBatch' style="cursor: pointer;" ></span>
            <h5>Basic Info</h5>    
            <table class="table table-striped">
            <tr>
                <th>Student Name:</th>
                <td>{{StudentSingleData.Name}}</td>
                <td rowspan="4" style="text-align:center;"> <img data-ng-src="data:image/png;base64,{{StudentSingleData.Photo}}" width="200" height="200"> </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{StudentSingleData.Gender}}</td>
               
            </tr>
            <tr>
                <th>DOB</th>
                <td>{{StudentSingleData.DOB}}</td>
                
            </tr>
             <tr>
                <th>Disablities</th>
                <td>{{StudentSingleData.IsDisable}} [{{StudentSingleData.PhysicalDetail}}] </td>
                
            </tr>
             <tr>
                <th>Academic</th>
                <td>{{StudentSingleData.ExamName}}</td>
                 <th> Mobile:  {{StudentSingleData.Mobile}} </th>
                
               
            </tr>
            <tr>
                <th>NID/BR NO</th>
                <td>NID:{{StudentSingleData.NID}} - BR:  {{StudentSingleData.BirthCirtificate}}</td>
               <th> Email : {{StudentSingleData.Email}} </th>
            </tr>
           
            <tr>
                <th>Address</th>
                <td clospan="1">{{StudentSingleData.Address}} </td>
                <td> <b>District:</b>  {{StudentSingleData.DistrictName}},  <b>  Upazila: </b> {{StudentSingleData.UpazilaName}} </td>
            </tr>
             
        </table> 
            <h5>Officials Info</h5>   
            <table class="table table-striped">
           
            <tr>
               
                <th>Batch:</td> 
                <td>{{StudentSingleData.Batch}} </td> 
                
                <th>Reg</td>
                <td>{{StudentSingleData.RegNO}}</td>
            </tr>
            <tr>
                <th>Fiscal Year </th>
                <td>{{StudentSingleData.FiscalYear}} </td>
                <th>Calender Year </th>
                <td>{{StudentSingleData.CalenderYear}}  </td>
            </tr>
             <tr>
                <th>Fee </th>
                <td>{{StudentSingleData.CourseFee}} </td>
                <th>DurationType</th>
                <td>{{StudentSingleData.DurationTypeName}} [{{StudentSingleData.DurationHour}}] Hours</td>
            </tr>  
            <tr>
                <th>Start-End</th>
                <td>{{StudentSingleData.StartDate}}-{{StudentSingleData. EndDate}}</td>
                <th>BatchType</th>
                <td>{{StudentSingleData.BatchTypeName}} </td>
            </tr>
            <tr>
                <th>ParticipentType</th>
                <td>{{StudentSingleData.ParticipentTypeName}} </td>
                <th>Detail</th>
                <td>{{StudentSingleData.ParticipantDetail}}</td>
            </tr>
             
        </table>  
        
            <h5>Certificate Info</h5>
                 
            <table class="table table-striped">
            <tr>
                <th> Is Certified </th>
                <th> Certificate No </th>
              
            </tr>
            <tr>
                <td>{{StudentSingleData.IsCertifiedText}} </td>
                <td>{{StudentSingleData.CertificateNo}} </td>
              
            </tr>
        </table>      
                <span class="fa fa-remove float-left" style="cursor: pointer;" data-dismiss="modal" aria-label="Close" ng-click="DeleteStudent(StudentSingleData.SID)" ></span>       
            </div>
            <div class="modal-footer">
                
                <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
            </div>
        </div>
    </div>
    <!--modal end-->
    
    <!-- Add Modal -->
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
                    
                  <b class="float-right" ng-hide="EditAction==1">Total  {{CountStudentByBatch}} Students In this Batch.  </b>
                    
                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <select class="form-control"  ng-model="Student.BatchID" required ng-change="GetCoursefee(Student.BatchID);"   name="BatchID" ng-options="Question.AdmissionSetID  as Question.BatchName for Question in GetAllAdmissionBatch.BatchList">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                     

                    <div class="form-group">
                        <label for="Exam" >Student Name</label>
                        <input class="form-control" ng-model="Student.Name" required  name="Name"/>
                    </div>
                    
                 <!--   <div class="form-check-inline">
                          <input type="checkbox" class="form-check-input" ng-init="nid=true" ng-model="nid" value="nid" ng-checked=true>
                          <label class="form-check-label" for="check1">NID &nbsp; &nbsp;</label>
                          <input type="checkbox" class="form-check-input" id="br" ng-model="br"  value="br">
                          <label class="form-check-label" for="check2">Birth Reg</label>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="Exam" >NID</label>
                        <input class="form-control" ng-model="Student.NID" ng-required="!Student.BirthCirtificate"    name="Name"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Birth Cirtificate</label>
                        <input class="form-control" ng-model="Student.BirthCirtificate" ng-required="!Student.NID"   name="Name"/>
                    </div>
                    
                     <div class="form-group">
                                <label for="StartDate" >Date Of Birth</label>
                                <input type="text"  ng-model="Student.DOB" id="DOB" required  autocomplete="off" size="15" class="form-control" />
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >District</label>
                        <select class="form-control"  ng-model="Student.district" required ng-change=""   ng-options="Question.id as Question.name for Question in BatchabdExamCollection.districts">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Upazila</label>
                        <select class="form-control"  ng-model="Student.upazila" required ng-change=""    ng-options="Question.id as Question.name for Question in BatchabdExamCollection.upazilas | filter:{district_id:Student.district}:true">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Address</label>
                        <textarea class="form-control" ng-model="Student.Address" required  name="Address"></textarea>
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
                            <option value="Other">Others </option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="Exam" >Last Academic Qualification</label>
                        <select class="form-control"  ng-model="Student.AcademicQualification" required ng-options="Question.AQID as Question.ExamName for Question in BatchabdExamCollection.AcademicQualification">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Participant's Status</label>
                        <select class="form-control" ng-init="Student.ParticipantType='1'"  ng-model="Student.ParticipantType" required   name="ParticipantType" ng-options="Question.ID as Question.TypeName for Question in BatchabdExamCollection.participant_type">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Participant's Detail</label>
                        <input class="form-control" ng-model="Student.ParticipantDetail"  name="Name"/>
                    </div>


                    <div class="form-group">
                        <label for="Exam" >Is any Disablity</label>
                        <select class="form-control" ng-init="Student.IsPhysicalDisable='0'" ng-model="Student.IsPhysicalDisable" required  name="IsPhysicalDisable">

                            <option value="0" >NO </option>
                            <option value="1">Yes </option>

                        </select>
                    </div>
                    <div class="form-group" ng-show="Student.IsPhysicalDisable==1">
                        <label for="Exam" >Disabilities Detail</label>
                        <textarea class="form-control" ng-model="Student.PhysicalDetail"  name="Physical Detail"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >Mobile</label>
                        <input class="form-control" ng-model="Student.Mobile" required  name="Mobile"/>
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
                         <label for="Exam" >Photo (Max Size 250kb; <a href="https://imagecompressor.11zon.com/en/image-compressor/compress-jpeg-to-250kb.php" target="_blank">online photo compress </a>)<span class="text-danger">*</span></label>
                       <input class="form-control" type="file"  id="imgs" ng-change="previewPhoto()" ng-model="Student.Photo" accept=".jpg,.png,.gif,.jpeg" name="Img" capture="camera"/>
                        <img ng-src="{{ photoUrl }}" ng-show="photoPreview" width="200">
                    
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
                // GetAllAdmissionRegistrationList();
                
                GetAllBatchandExamCollectionField();
                GetAllAdmissionBatch();
                $scope.CountStudentByBatch=0;

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
                
                $scope.GetAllAdmissionRegistrationList = GetAllAdmissionRegistrationList;
                $scope.BatchID = 0;
                $scope.GetCoursefee=GetCoursefee;
                $scope.ShowStudent=ShowStudent;
                $scope.StudentSingleData={};
                
                $scope.GetCoursefee=GetCoursefee;
                
                $scope.CountStudentByBatch=0;
            }

            function GetCoursefee(id)
            {
                CountStudentsByBatch();
                
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
                    url: baseUrl + 'Exam/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;
                    console.log($scope.BatchabdExamCollection);

                }, function errorCallback(response) {
                });
            }
            
            function ShowStudent(Std)
            {
                $scope.StudentSingleData={};
                $scope.StudentSingleData=Std;
                console.log($scope.StudentSingleData);
            }
            
            function GetCoursefee(id)
            {
                CountStudentsByBatch();
                
                angular.forEach($scope.BatchabdExamCollection.batch, function (b) {
                    if (b.Id == id)
                    {
                       $scope.Student.CourseFee=b.CourseFee;
                    }
                });

            }
            function GetAllAdmissionBatch()
            {
                $scope.GetAllAdmissionBatch = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Admission/GetAllAdmissionBatch/'
                }).then(function successCallback(response) {
                    $scope.GetAllAdmissionBatch = response.data;
                    console.log($scope.GetAllAdmissionBatch);

                }, function errorCallback(response) {
                });
            }

            function GetAllAdmissionRegistrationList(x)
            {
                   $("#LoadingID").css("display", "block");
                $scope.AllStudent = [];
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Admission/GetAllAdmissionRegistrationList/' + BID
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
                        url: baseUrl + 'Admission/DeleteStudent/' + SId
                    }).then(function successCallback(response) {
                        swal("Student!!", "Deleted Successfully!!");
                        GetAllAdmissionRegistrationList($scope.AdmissionSetID);
                    }, function errorCallback(response) {
                        swal("Student!", "Not Deleted!!!!");
                    });

                }
            }
            
             function CountStudentsByBatch()
            {
                var BID = $scope.Student.BatchID;
                 console.log(BID);
              
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Student/CountStudentsByBatch/' + BID
                    }).then(function successCallback(response) {
                       
                        $scope.CountStudentByBatch = response.data;
                       // console.log($scope.ExamResult);
                    }, function errorCallback(response) {
                      
                    });
                    
                    GetAllAdmissionRegistrationList(BID);

                
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
                                    url: baseUrl + 'Admission/UpdateStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                     console.log(data);
                                    CountStudentsByBatch();
                                    $scope.Student = {};
                                    GetAllAdmissionRegistrationList($scope.BID);
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
                                    url: baseUrl + 'Admission/UpdateStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).success(function (data) {
                                     console.log(data);

                                    $scope.Student = {};
                                    GetAllAdmissionRegistrationList($scope.BID);
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
                                    url: baseUrl + 'Admission/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                    GetAllAdmissionRegistrationList($scope.BatchID);
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
                                    
                                    CountStudentsByBatch();
                                     document.getElementById('imgs').src = " ";
                                });
                                       
                                }
                                                  
                            }
                            if (files.length <= 0)
                            {
                                $http({
                                    method: 'POST',
                                    url: baseUrl + 'Admission/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).success(function (data) {
                                    console.log(data);
                                    GetAllAdmissionRegistrationList($scope.BatchID);
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
                                    
                                    CountStudentsByBatch();
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