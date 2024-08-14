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
                            
                    <form name="SOSForm" ng-submit="AddStudent()" />  

                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <select class="form-control"  ng-model="Student.BatchID" required    name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                            <option value="">Choose Option</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >Student Name</label>
                        <input class="form-control" ng-model="Student.Name" required  name="Name"/>
                    </div>

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
                        <input class="form-control" ng-model="Student.Mobile" required name="Mobile"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Email</label>
                        <input class="form-control" type="email" ng-model="Student.Email" required  name="Email"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Photo</label>
                        <input class="form-control" type="file" readonly id="imgs" ng-model="Student.Photo"  name="Photo"/>
                    </div>
                        
                    <div class="form-group">
                        <button type="Submit" class="btn btn-info" name="Create" id="Create">Add</button>
                    </div>
                    </form>
                
									
										
										
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


   
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
                $scope.Student={};
                $scope.AddStudent = AddStudent;
              
                
                $scope.BatchabdExamCollection=[];
           
            }


            function GetAllBatchandExamCollectionField()
            {
                $http({
                    method: 'GET',
                    url: baseUrl + 'Webview/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;

                }, function errorCallback(response) {
                });
            }

         
            function AddStudent()
            {
               // console.log($scope.Student);
               
               var Studentdata =[];
                $scope.Student.Photo = "";
                 $scope.Student.RegNO =  $scope.Student.Email;
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
                                    url: baseUrl + 'Webview/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                        formData.append("Img", files[0]);
                                        return formData;
                                    }
                                   
                                }).then(function successCallback(response) {
                                    if(response.data==1)
                                    {
                                    //console.log(response);
                                     swal("Account!", "Registration Successful!!");
                                    location.replace("https://www.bcc.expresstechbd.com/Webview/PublicRegSuccesfully");
                                    }
                                    else
                                    {
                                        swal("Account!", "Already Exist");
                                    }
                                    
                                });
                                       
                                }
                                                  
                            }
                            if (files.length <= 0)
                            {
                                $http({
                                    method: 'POST',
                                    url: baseUrl + 'Webview/AddStudent/',
                                   
                                    headers: {'Content-Type': undefined},
                                    transformRequest: function (data) {
                                         
                                         formData.append("Img", null);
                                         return formData;
                                    }
                                   
                                }).then(function successCallback(response) {
                                    if(response.data==1)
                                    {
                                       // console.log(response);
                                     swal("Account!", "Registration Successful!!");
                                     location.replace("https://www.bcc.expresstechbd.com/Webview/PublicRegSuccesfully");
                                    }
                                    else
                                    {
                                         //console.log(response);
                                         swal("Account!", "Already Exist");
                                    }
                                  
                                });
                                                         
                            }
                    
            }
            
           
        }]);
</script>