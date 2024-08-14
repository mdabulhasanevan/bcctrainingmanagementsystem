<div class="content-page" ng-controller="DefaultCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"><?php echo $Title;  ?></h1>
                               <ol class="breadcrumb float-right">
                                
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myDeleteModal">Delete Attendance</button>
                                
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
                                          <a class="btn btn-success btn-sm"  id="Print">Print</a>
                                          
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus" aria-hidden="true"></i> Start Roll Call</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

<div class="card-body">
      <div class="table-responsive">
		    <form name="AttendanceForm" ng-submit="SearchAttendance()" />
   
    <div class="row" style="">
        <div class="col-md-4">
            <div class="form-group" >
                <label class="col-md-5">
                    Batch
                   
                </label>
                <div class="col-md-7">
                    <select class="form-control" id="BatchNameOpt"   ng-model="Attendance2.BatchID" ng-change="GetAllSubjectByBatchID(Attendance2.BatchID); SearchAttendance();"    name="BatchID" ng-options="Batch.Id as Batch.Batch for Batch in BatchabdExamCollection.batch">
                <option value="">Choose Option</option>
                    </select>
                    
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="form-group" >
                <label class="col-md-5">
                    Modules
                </label>
                <div class="col-md-7">
                   <select class="form-control" id="SubjectNameOpt" ng-model="Attendance2.TopicName"  required  name="SubjectID" ng-change=""  ng-options="TopicList as TopicList for TopicList in TopicsList.TopicsList.split('>') ">
                     <option value="">Choose Option</option>
                    </select>
                    
                </div>
            </div> 
        </div>
        
                <div class="col-md-4">
            <div class="form-group" >
                <label class="col-md-5">
                    Subjects
                </label>
                <div class="col-md-7">
                   <select class="form-control" id="SubjectNameOpt" ng-model="Attendance2.SubjectID"  required  name="SubjectID"  ng-options="Sub.CSID as Sub.SubjectDetail for Sub in AllSubject.Subject | filter: {TopicName: Attendance2.TopicName}: true ">
                     <option value="">Choose Option</option>
                    </select>
                    
                </div>
            </div> 
        </div>
        <div class="col-md-3">
          <!--  <div class="form-group" > <button class="btn btn-primary" ng-click="SearchAttendance()">Search</button>  </div> -->
        </div>
         <div class="col-md-3 pull-right">
            <span class="btn" id="print"></span>
        </div>
       
    </div>
   
    </form>

<div class="print_div" id="print_div">
    
    <h4 style="text-align: center;"> Attendance Sheet</h4>
    <p><b>Batch Name:</b> {{Batch}}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Subject:</b> {{Subject}}
<div  style=" " >
    
     
    
    <table class="table table-bordered"  >
        <tr>
            <th class="" style="text-align: center;">Name</th>
           
            <th ng-repeat="TT in AllAttendance.OnlyDate"> 
               
                <span class="" style="font-size: 10px;"> {{TT.Date| date : "dd-MM-yy"}} <br> </span> <span style="font-size: 8px;"> {{TT.Name}} <br> <abbr title="{{TT.SubjectDetail }} ">{{TT.SubjectDetail | limitTo: 20}} </abbr>  </span>
                
            </th>
        </tr>
        
        <tr ng-repeat="AT in AllAttendance.GroupData" style="overflow: scroll;">
          
            <td class="" style="font-size: 15px;">{{$index+1}}. ]  <b> {{AT.RegNO}}({{AT.Name}})</b> </td>
            
            
            <td style="font-size: 12px;"  ng-repeat="XT in AllAttendance.AllData|filter:{SID:AT.SID } :true" >
                <span ng-show="XT.isAttend == 1" class="fas fa-check"></span> 
                <span ng-show="XT.isAttend == 0" style="color:red" class="fas fa-times"></span>
            </td>
        </tr>
       
        
        <!--bottom row same as top header-->
<!--        <tr>
            <th class="" style="position:absolute; width:20em; left:0; "></th>
            <th ng-repeat="TT in AllAttendance.OnlyDate"> <span class="" style="font-size: 10px;"> {{TT.Date| date : "dd-MMM-yy"}} </span> </th>
        </tr>-->
    </table>
    
    
   
    
    
</div>
</div>

																
									</div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


    <!-- Add Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Set Attendance </h4> 
			
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">

                <form name="AttendanceForm" ng-submit="SearchStudent()" />
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" ng-class="">
                            <label>    Batch   </label>
                           
                            <select class="form-control" id="BatchID"  ng-model="Attendance.BatchID" ng-change="GetAllSubjectByBatchID(Attendance.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                                <option value="">Choose Option</option>
                            </select>
                                
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" >
                            <label   >Subjects </label>
      
                                <select class="form-control" id="SubjectID" ng-model="Attendance.SubjectID"  required  name="SubjectID"  ng-options="Question.CSID as Question.Day+' - '+Question.SubjectDetail for Question in AllSubject.Subject">
                                    <option value="">Choose Option</option>
                                </select>
                               
                        </div> 
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group" ng-class="">
                            <label   > Date   </label>
                           
                                <input type="text" id="datepicker3" autocomplete="off" readonly  ng-model="Attendance.Date" class="form-control" required/>
                              
                          </div>

                        </div> 
                        <div class="col-md-3">
                        <div class="form-group" ng-class="">
                             <label   >    </label>
                             <button type="Submit" class="form-control btn btn-info glyphicon glyphicon-search" name="Create" id="Create">Search</button>
                                
                         </div>

                        </div> 

                    </div>

                </form>
                <div class="row">

                    <table class="table table-striped" ng-show="ShowAddTable==1">
                        <tr>
                            <th>SN</th>
                            
                            <th>Name</th>
                            <th>RegNo</th>
                            
                            <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll()" style="width: 30px; height: 30px;" /> All </th>
                        </tr>
                        <tbody>
                            <tr ng-repeat="Y in AllStudents.Student2" style="font-size: 15px;">
                                <td> {{$index+1}} </td>
                                
                               
                                <td> {{Y.Name}} </td>
                                <td> {{Y.RegNo}} </td>
                                                                           
                                <td> <input type="checkbox" ng-model="Y.isAttend" style="width: 30px; height: 30px;" ng-true-value="1" ng-false-value="0"/> </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" ng-click="AddAttendance()" class="btn btn-sm btn-success pull-right" name="Create" id="Create" ng-show="ShowAddTable==1">Submit Attendance</button>
                   


                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <!--modal end-->
    
     <!-- Delete Modal -->
   <div class="modal fade" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Delete Attendance </h4> 
			
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">

                <form name="AttendanceForm" ng-submit="SearchStudent()" />
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" ng-class="">
                            <label>    Batch   </label>
                           
                            <select class="form-control" id="BatchID"  ng-model="Attendance.BatchID" ng-change="GetAllSubjectByBatchID(Attendance.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                                <option value="">Choose Option</option>
                            </select>
                                
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" >
                            <label   >Subjects </label>
      
                                <select class="form-control" id="SubjectID" ng-model="Attendance.SubjectID"  required  name="SubjectID"  ng-options="Question.CSID as Question.Day+' - '+Question.SubjectDetail for Question in AllSubject.Subject">
                                    <option value="">Choose Option</option>
                                </select>
                               
                        </div> 
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group" ng-class="">
                            <label   > Date   </label>
                           
                                <input type="text" id="datepicker2" autocomplete="off" readonly   ng-model="Attendance.Date" class="form-control" required/>
                              
                          </div>

                        </div> 
                        <div class="col-md-3">
                        <div class="form-group" ng-class="">
                             <label   >    </label>
                             <button type="Submit" class="form-control btn btn-info glyphicon glyphicon-search" name="Create" id="Create">Search</button>
                                
                         </div>

                        </div> 

                    </div>

                </form>
                <div class="row">

                    <table class="table table-striped" ng-show="ShowAddTable==1">
                        <tr>
                            <th>SN</th>
                            
                            <th>Name</th>
                            <th>RegNo</th>
                            
                            <th> </th>
                        </tr>
                        <tbody>
                            <tr ng-repeat="Y in AllStudents.Student2" style="font-size: 12px;">
                                <td> {{$index+1}} </td>
                                
                               
                                <td> {{Y.Name}} </td>
                                <td> {{Y.RegNo}} </td>
                                                                           
                                <td> <input type="checkbox" ng-model="Y.isAttend" disabled  ng-checked="Y.isAttend==1" ng-true-value="'1'" ng-false-value="'0'"  /> </td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <button type="button" style="padding-left:5px;" ng-click="DeleteAttendance()" class="btn btn-sm btn-danger pull-left" ng-show="ShowAddTable==1" name="Create" id="Create">Delete</button>


                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
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


<script>


    app.controller("DefaultCtrl", ["$scope", "$http", "$filter",
        function ($scope, $http, $filter) {
            init();
            function init() {
                initialize();
                 GetAllBatchandExamCollectionField();
            }
            function initialize() {
                
                $scope.AllAttendance = [];
                $scope.Attendance = {};
                $scope.Attendance2 = {};
               
                $scope.BatchabdExamCollection =[];
                $scope.GetAllSubjectByBatchID=GetAllSubjectByBatchID;
                 $scope.AllSubject = [];
                
                $scope.SearchStudent = SearchStudent;
                $scope.AllStudents = [];
                $scope.AddAttendance = AddAttendance;
                $scope.DeleteAttendance=DeleteAttendance;

                $scope.SearchAttendance = SearchAttendance;
                $scope.AllAttendance = {};
                
                $scope.EditAttendance=EditAttendance;
                
                //for initializing search criteria
                $scope.Attendance2.BatchID = null;
               
                $scope.Attendance2.SubjectID = null;
                $scope.Attendance2.Date = null;
                $scope.Attendance2.Date2 = null;

            }
            function EditAttendance(data)
            {
                console.log(data);
                
            }
            
            function GetAllSubjectByBatchID(x)
            {
              
                $scope.AllSubject = [];
                
                var BID = x;
                
                $http({
                    method: 'GET',
                    url: baseUrl + 'Attendance/GetAllSubjectByBatchID/' + BID
                }).then(function successCallback(response) {
                    $scope.AllSubject = response.data;
                    
                    $scope.TopicsList=  $scope.AllSubject.SubjectTopic;
                    console.log($scope.AllSubject);
                    console.log( $scope.TopicsList);
                }, function errorCallback(response) {
                });
            }
            
            $scope.checkAll = function () {
            angular.forEach($scope.AllStudents.Student2, function (User) {
            User.isAttend = $scope.selectedAll ? 1 : 0;
            });
            };  

          
            function SearchAttendance()
            {
                //for show search Detail like semester subject etc
                
                var Batch = $("#BatchNameOpt option:selected").text();
                 var Subject = $("#SubjectNameOpt option:selected").text();
                $scope.Batch = Batch;
                $scope.Subject = Subject;
               
                  console.log($scope.Attendance2);
                $scope.AllAttendance = [];
                $http({
                    method: 'POST',
                    url: baseUrl + 'Attendance/AllAttendance/',
                    data: $scope.Attendance2
                }).then(function successCallback(response) {
                    $scope.AllAttendance = response.data;
                    // console.log($scope.AllAttendance);
                }, function errorCallback(response) {
                });
            }
           
            function GetAllAttendance() {
                $scope.AllAttendance = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Attendance/AllAttendance/'
                }).then(function successCallback(response) {
                    $scope.AllAttendance = response.data;
                }, function errorCallback(response) {
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

            function SearchStudent()
            {
               $scope.ShowAddTable=1;
                console.log($scope.Attendance);
                $scope.AllStudents = [];
                
                $http({
                    method: 'POST',
                    url: baseUrl + 'Attendance/GetStudents/',
                    data: $scope.Attendance
                }).then(function successCallback(response) {
                    
                    $scope.AllStudents = response.data;
                    console.log( response.data);
                    
                }, function errorCallback(response) {
                });
                
                
            }

            function DeleteAttendance()
            {
               
             var r=confirm("Are you surely want to delete this attendance??")   
             
                 if(r)
                 {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Attendance/DeleteAttendanceIndividual/',
                        data: $scope.Attendance
                    }).then(function successCallback(response) {
                        
                       alert("Deleted");
                        
                    }, function errorCallback(response) {
                    });
                
                 }
            }

            
            function AddAttendance()
            {
                
              console.log($scope.AllStudents.Student2);
            
                var r=confirm("Are you sure?? ");
                if(r)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Attendance/AddAttendance/',
                        data: $scope.AllStudents.Student2
                    }).then(function successCallback(response) {
                        $scope.Message = response.data;
                        alert($scope.Message);
                        
                        $scope.ShowAddTable=0;
                       // GetAllSubjectByBatchID($scope.Attendance.BatchID);
                        // console.log($scope.Message);
                    }, function errorCallback(response) {
                    });
                }
            }


        }]);
</script>    


<!--print html--> 
<script>

$(function () {
$('#Print').on('click', function () {
    $.print("#print_div");
});
});
</script>