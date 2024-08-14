<div class="content-page" ng-controller="DefaultCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

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
                            
                    <form name="SOSForm" ng-submit="AddStudent();" />  
                    <div class="form-group">
                        <label for="Exam" >Batch Name <span class="text-danger">*</span></label>
                        <select class="form-control"  ng-model="Student.BatchID" required ng-change="GetCoursefee(Student.BatchID);" name="BatchID" ng-options="Question.AdmissionSetID as Question.BatchName for Question in AllAdmissionTypeField.AdmissionBatch">
                            <option value="">Choose Option</option>
                        </select>
                         <input type="hidden" class="form-control" ng-model="Student.CourseFee" required  name="Name"/>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="Exam" >Student Name <span class="text-danger">*</span></label>
                        <input class="form-control" ng-model="Student.Name" required  name="Name"/>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="Exam" >Gender <span class="text-danger">*</span></label>
                        <select class="form-control" ng-init="Student.Gender='Male'" ng-model="Student.Gender" required  name="Gender">
                            <option value="">Select </option>
                            <option value="Male">Male </option>
                            <option value="Female">Female </option>
                            <option value="Other">Other </option>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                         <label for="Exam" >NID</label>
                        <input class="form-control" ng-model="Student.NID" ng-required="!Student.BirthCirtificate"    name="Name"/>
                        </div>
                        <div class="col-md-4 mb-3">
                         <label for="Exam" >Birth Cirtificate</label>
                        <input class="form-control" ng-model="Student.BirthCirtificate" ng-required="!Student.NID"   name="Name"/>
                        </div>
                        <div class="col-md-4 mb-3">
                       <label for="StartDate" >Date Of Birth</label>
                       <input type="text"  ng-model="Student.DOB" id="DOB" required  autocomplete="off" size="15" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                        <label for="Exam" >District</label>
                        <select class="form-control"  ng-model="Student.district" required ng-change=""   ng-options="Question.id as Question.name for Question in AllAdmissionTypeField.districts">
                            <option value="">Choose Option</option>
                        </select>
                        </div>
                        
                         <div class="col-md-4 mb-3">
                            <label for="Exam" >Upazila</label>
                            <select class="form-control"  ng-model="Student.upazila" required ng-change=""    ng-options="Question.id as Question.name for Question in AllAdmissionTypeField.upazilas | filter:{district_id:Student.district}:true">
                                <option value="">Choose Option</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="Exam" >Address</label>
                            <textarea class="form-control" ng-model="Student.Address" required  name="Address"></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="Exam" >Participant Type <span class="text-danger">*</span></label>
                            <select class="form-control" ng-init="Student.ParticipantType='1'"  ng-model="Student.ParticipantType" required   name="ParticipantType" ng-options="Question.ID as Question.TypeName for Question in AllAdmissionTypeField.participant_type">
                                <option value="">Choose Option</option>
                            </select>
                        </div>

                         <div class="col-md-4 mb-3">
                            <label for="Exam" >Last Academic Qualification</label>
                            <select class="form-control"  ng-model="Student.AcademicQualification" required ng-options="Question.AQID as Question.ExamName for Question in AllAdmissionTypeField.AcademicQualification">
                                <option value="">Choose Option</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Exam" >Any Physical Disablity <span class="text-danger">*</span></label>
                        <select class="form-control" ng-init="Student.IsPhysicalDisable='0'" ng-model="Student.IsPhysicalDisable" required  name="IsPhysicalDisable">

                            <option value="0" >NO </option>
                            <option value="1">Yes </option>

                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group" ng-show="Student.IsPhysicalDisable==1">
                        <label for="Exam" >Physical Detail</label>
                        <textarea class="form-control" ng-model="Student.PhysicalDetail"  name="Physical Detail"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                             <label for="Exam" >Mobile <span class="text-danger">*</span></label>
                            <input class="form-control" ng-model="Student.Mobile" autocomplete="on" required name="Mobile"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Exam" >Email</label>
                            <input class="form-control" type="email" ng-model="Student.Email"   name="Email"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Photo (Max Size 250kb; <a href="https://imagecompressor.11zon.com/en/image-compressor/compress-jpeg-to-250kb.php" target="_blank">online photo compress </a>)<span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept="image/*"   id="imgs" ng-model="Student.Photo"  name="Photo"/>
                    </div>
                        
                    <div class="form-group">
                        <button type="Submit" class="form-control btn btn-info" name="Create" id="Create">  Submit</button>
                    </div>
                    </form>
                
									
										
										
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->
 <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">OTP Sent to your Phone</h4>
                    
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddStudent()" autocomplete="off" />     
                     <div class="form-group">
                        <label for="Exam" >Enter You OTP CODE Here  <span class="text-danger">*</span></label>
                         <input class="form-control" required ng-model="Student.OTPEnter" type="number" min="1000" max="9999"/>
                    </div>  
                    
                    
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" ="Create" id="Create">দাখিল করুন</button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div>Time left = <span id="timer"></span></div>
                    

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
        $("#DOB").datepicker({
            dateFormat: 'yy-mm-dd',
            
            changeMonth: true,
            changeYear: true,
            yearRange: '-100y:c+nn',
            maxDate: '-8y'
            
        });
        
    });
    
    function OTPTimer()
    {
        let timerOn = true;

    function timer(remaining) {
      var m = Math.floor(remaining / 60);
      var s = remaining % 60;
      
      m = m < 10 ? '0' + m : m;
      s = s < 10 ? '0' + s : s;
      document.getElementById('timer').innerHTML = m + ':' + s;
      remaining -= 1;
      
      if(remaining >= 0 && timerOn) {
        setTimeout(function() {
            timer(remaining);
        }, 1000);
        return;
      }
    
      if(!timerOn) {
        // Do validate stuff here
        return;
      }
      
      // Do timeout stuff here
      alert('Timeout for otp');
      $('#myModal').modal('toggle');
    }

    timer(120);
    }

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
                GetAllAdmissionTypeField()

            }
            function initialize() {
                $scope.AllStudent = [];
                $scope.Student={};
                $scope.AddStudent = AddStudent;
              
                $scope.SendOTP=SendOTP; 
               
                $scope.GetCoursefee=GetCoursefee;
                  
                $scope.AllAdmissionTypeField=[];
           
            }
        
         function GetCoursefee(id)
            {
               // CountStudentsByBatch();
                
                angular.forEach($scope.AllAdmissionTypeField.AdmissionBatch, function (b) {
                    if (b.AdmissionSetID  == id)
                    {
                       $scope.Student.CourseFee=b.AdmissionFee;
                       console.log($scope.Student.CourseFee);
                    }
                });

            }
        

            function GetAllAdmissionTypeField()
            {
                $http({
                    method: 'GET',
                    url: baseUrl + 'Webview/GetAllAdmissionTypeField/'
                }).then(function successCallback(response) {
                    $scope.AllAdmissionTypeField = response.data;
                   // console.log($scope.AllAdmissionTypeField);
                }, function errorCallback(response) {
                });
            }

         
         function SendOTP()
            {
                OTPTimer();
                
               $scope.EmailandMobile={};
               
               $scope.EmailandMobile.Mobile=$scope.Student.Mobile;
               $scope.EmailandMobile.Email=$scope.Student.Email;
                
               // console.log($scope.EmailandMobile);
                
                
                $scope.Student.OTPSent =0;
                $scope.Student.OTPEnter="";
                var r = confirm("আপনি কি  OTP  পাঠাতে চান?!");
                if (r == true) {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Webview/SendOTPAdmission/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.EmailandMobile)
                    }).then(function successCallback(response) {
                        
                         $scope.Student.OTPSent = response.data;
                        
                       
                    }, function errorCallback(response) {
                       
                        swal("OTP!", "Not Sent!!!!");
                    });

                }
                else
                {
                    $scope.Student.OTPSent=1111;
                }
                
                $('#myModal').modal('toggle');
            }
            
                     
            function AddStudent()
            {
                console.log($scope.Student);
               // console.log($scope.Student.OTPSent);
                
               if($scope.Student.OTPSent==$scope.Student.OTPEnter)
               {
                var Studentdata =[];
                $scope.Student.Photo = "";
                $scope.Student.RegNO =  $scope.Student.Mobile+$scope.Student.BatchID;
                var files = $("#imgs").get(0).files;
                var Studentdata = JSON.stringify($scope.Student);
               
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
                                    url: baseUrl + 'Webview/AddStudentForAdmission/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).then(function successCallback(response) {
                                     $scope.data=response.data
                                    console.log($scope.data);
                                   
                                    if($scope.data.Status==1)
                                    {
                                    console.log(response);
                                     swal("Admission!", "Registration Successful!!");
                                    location.replace("https://www.bcc.expresstechbd.com/Webview/AdmissionRegSuccesfully");
                                    }
                                    else
                                    {
                                      //  $('#myModal').modal('toggle');
                                        swal("Admission Registration!", "Already Exist.  May be you already applied for this Batch. Please use another Phone number or Change Batch");
                                    }
                                    
                                });
                                       
                                }
                                                  
                            }
                            if (files.length <= 0)
                            {
                                $http({
                                    method: 'POST',
                                    url: baseUrl + 'Webview/AddStudentForAdmission/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).then(function successCallback(response) {
                                      $scope.data=response.data
                                    console.log($scope.data);
                                    if($scope.data.Status==1)
                                    {
                                       // console.log(response);
                                     swal("Admission!", "Registration Successful!!");
                                     location.replace("https://www.bcc.expresstechbd.com/Webview/AdmissionRegSuccesfully");
                                    }
                                    else
                                    {
                                         //console.log(response);
                                        // $('#myModal').modal('toggle');
                                        swal("Admission Registration!", "Already Exist. May be you already applied for this Batch. Please use another Phone number or Change Batch");
                                    
                                    }
                                  
                                });
                                                         
                            }
               }
               else
               {
                   swal("OTP !", "Not Matched!!!!");
               }
               
               
                    
            }
            
           
        }]);
</script>