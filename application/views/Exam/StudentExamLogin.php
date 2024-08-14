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
                            
                            <h3><i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                        </div>

                    <div class="card-body">
                        
                        <div class="table-responsive">
                              <div class="row">
                                   <!-- <div class="form-group col-md-6">
                                   
                                    <select class="form-control"  ng-model="ExamID" ng-change="GetAllHistory(ExamID); RealtimeExamInfo(ExamID)"   name="ExamID" ng-options="E.SetID as E.BatchName+'  ('+ E.ExamName +')' for E in ExamList">
                                        <option value="">Choose Option</option>
                                    </select>
                                    </div>-->
                                    
                                    
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <select class="form-control" id="BatchNameOpt"  ng-model="BatchID" ng-change="GetAllExam(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                                                <option value="">Choose Option</option>
                                            </select>
                                            
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <select class="form-control" id="ExamModule" ng-model="ExamModule"   name="ExamModule" ng-change="GetAllHistory(ExamModule); RealtimeExamInfo(ExamModule)"  ng-options="Question.SetID as Question.ExamName+'  ('+ Question.ExamCollection +')-'+Question.Status for Question in AllExam | filter:{BatchID:Student2.BatchID}:true">
                                                <option value="">Choose Option</option>
                                            </select>
                                        </div>
                                        </div>
                                    
                                    
                                    
                                    
                                     
                            </div>
                             
                             <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" ng-click="StartGameLoading=0;" href="#Attendance">সংযুক্ত আছেন  </a></li> 
                                <li class="nav-item"><a class="nav-link"  data-toggle="modal" data-target=".GameModal"  ng-click="" href="#Gaming">Paused List</a></li>
                               <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" ng-click="StartGameLoading=1;" href="#Gaming">Gaming Mode</a></li>-->
                                <li class="nav-item"><a class="nav-link"  data-toggle="modal" data-target=".GameModal"  ng-click="StartGameLoading=1;" href="#Gaming">Gaming Mode</a></li>
                                
                              </ul>
                            <div class="tab-content">
                                <div id="Attendance" class="tab-pane active">
                                     <b class="pull-left"> </b>
                                
                             <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Total Join: {{AllHistory.length}}</div>
                                </div>
                                
                                <button class="btn btn-warning form-control" ng-click=GetAllHistory(ExamModule)> Refresh </button>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                          <input class="" type="checkbox" ng-model="refresh">
                                    </div>
                                </div>
                            </div>
                                
                                  
                                    
        <span  ng-hide="show==0">
            <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-success" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-danger" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-warning" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-info" role="status">
              <span class="sr-only">Loading...</span>
            </div>
           
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            </span>   
                                  
                <table class="table table-striped">
                                     
                                <tr>
                                     
                                    <th>SN</th>                         
                                    <th>Name </th>
                                   <!-- <th>Reg No</th>   
                                    <th>Batch </th>
                                    <th>Exam Name </th>-->
                                    
                                   
                                    <th>Date </th>
                                     <th>Photo </th>
                                     <th>Status </th>
                                     <th>Result</th>
                                    
                                     <th>Pause/Stop/Delete </th>
                                </tr>
                                <tr ng-repeat="S in AllHistory">
                                    <td>{{$index + 1}} </td>
                                     <td><b>{{S.Name}}</b> <br> Reg: {{S.RegNO}} </td>
                                    <!-- <td>{{S.Batch}} </td>
                                     <td>{{S.ExamName}} </td>-->
                                     
                                  
                                    <td>{{S.Date}}<br> IP:  {{S.IP}} GEO: {{S.GEO}} 
                                    
                                    <a href="https://www.google.com/maps/@{{S.GEO}}&sensor=true">MAP</a>
                                    </td>
                                   <td> <img class="rounded-circle" data-ng-src="data:image/png;base64,{{S.Photo}}" width="70" height="70"> </td>
                                     <td class="text-primary"> {{S.Status}}    </td>
                                      <td >{{S.Correct}}</td>
                                       
                                     <td> 
                                     
                                     <span ng-show="S.Status=='Running'" class="" role="button" ng-click="PauseStopExam(S.ExAttendID,1,S.PauseStatus)" title="Pause or Start"> 
                                         <i class="fa-2x mr-2 far fa-pause-circle text-primary"  ng-show="S.PauseStatus==0 && S.StopStatus==0"></i>
                                         <i class="fa-2x mr-2 far fa-play-circle text-success" ng-show="S.PauseStatus==1 && S.StopStatus==0"></i>
                                     </span>
                                    
                                    <span class="" ng-show="S.Status=='Running'" role="button" ng-click="PauseStopExam(S.ExAttendID,2,S.StopStatus)" title="Stop Exam">
                                          <i class="fa-2x mr-2 far fa-stop-circle text-danger" ng-show="S.StopStatus==0"></i>
                                    </span>
                                     
                                     <span class="" role="button" ng-click="DeleteAttendanceExam(S.ExAttendID)">
                                          <i class="fa-2x mr-2 fas fa-backspace text-danger" ></i>
                                     </span>
                                    <!-- <button class="btn btn-primary btn-sm" ng-click="StopndividualStudentsExam(S.ExAttendID)">Stop Exam</button>-->
                                     </td>
                                </tr>
                            </table>
                                   
            </div>
                                <div id="Gaming" class="tab-pane" >
                                      
                                <div class="card-body">

                                    <div class="row">


                                    </div>
                                    <!-- end row-->

                                </div>
                                <!-- end card body-->

                                        
                                    
                                </div> 
                            </div>    
                          
                            
                        </div>

                    
                    
                    </div>

                </div>


            </div>
            <!-- end row -->
 <!-- Game Modal Start -->
            <div class="modal fade GameModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <marquee width="100%" direction="left">  <h5 class="modal-title">লাইভ স্কোর বোর্ড          </h5>  </marquee>
                            <button type="button" class="close" ng-click="StartGameLoading=0;" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-3" ng-repeat="info in AllRealtimeExamInfo">

                                        <!-- Price Table Item -->
                                        <div ng-show="$index+1<=4" class="text-center" style="Border:3px solid green;">
                                            <div class="price-table-heading">
                                                <button class="btn btn-success btn-lg btn-block">{{$index+1}}
                                                <span ng-show="$index+1==1">st</span>
                                                <span ng-show="$index+1==2">nd</span>
                                                <span ng-show="$index+1==3">rd</span>
                                                <span ng-show="$index+1==4">th</span>
                                                </button>
                                            </div>
                                             <div class="price-table-body">
                                                <p class="value"> <img class="rounded-circle" data-ng-src="data:image/png;base64,{{info.Photo}}" width="100" height="100"></p>
                                            </div>
                                            <ul class="list-group">
                                                <li class="list-group-item"><h5>{{info.Name | limitTo: 17 }}..</h5> </li>
                                                <!--<li class="list-group-item">
                                                  <!--  <i class="icon-ok text-success"></i> <h4>{{info.RegNO}}</h4></li>-->
                                                <li class="list-group-item">
                                                    <i class="icon-ok text-success"></i> <h4 class="text-danger">  Point:  {{(info.Point *100) | number:0}}</h4></li>
                                            </ul>
                                            
                                        </div>
                                      </div>
                                </div> 
                                <hr>
                                 <div class="row">
                                     <div class="" style="display:flex;" ng-repeat="info in AllRealtimeExamInfo">

                                        <!-- Price Table Item -->
                                        <div ng-show="$index+1>4" class="text-center" style="Border:3px solid green;">
                                          
                                            
                                            <ul class="list-group">
                                                <li class="list-group-item"><h6>{{info.Name | limitTo: 17 }}..</h6> </li>
                                                <!--<li class="list-group-item">
                                                  <!--  <i class="icon-ok text-success"></i> <h4>{{info.RegNO}}</h4></li>-->
                                                <li class="list-group-item">
                                                    <i class="icon-ok text-success"></i> <h5 class="text-danger">  Point:  {{(info.Point *100) | number:0}}</h5></li>
                                            </ul>
                                            
                                        </div>
                                      </div>
                                </div>
                                     
                                    
                                </div>
                                  
                               

                            </div>
                        </div>
                        <div class="modal-footer">
                             
                        </div>
                    </div>
                </div>
            </div>
 <!-- Game Modal End -->
</div>
</div>
</div>
</body>
</html>

 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<style>
    .bar {
      border: 1px solid #666;
      height: 20px;
      width: 100%;
      
      .in {
        animation: fill 20s linear 1;
        height: 100%;
        background-color: pink;
      }
    }
    
    @keyframes fill {
      0% {
        width: 0%;
      }
      100% {
        width: 100%;
      }
    }
</style>

<script type="text/javascript">

app.controller("DefaultCtrl", ["$scope", "$http","$interval","$timeout",
function ($scope, $http, $interval, $timeout) {
    init();
    function init() {
        initialize();
        GetExamList();
        GetAllBatchandExamCollectionField();
    }
    
    function initialize() {
    $scope.GetAllHistory=GetAllHistory;
    $scope.RealtimeExamInfo=RealtimeExamInfo;
    $scope.DeleteAttendanceExam=DeleteAttendanceExam;
    $scope.AllHistory = [];
     $scope.AllRealtimeExamInfo=[];
     $scope.RealTimeTemp=[];
     $scope.mytimeout =0;
     
     $scope.PauseStopExam=PauseStopExam;
  
     
     $scope.show=0;
     
    $scope.StartGameLoading=0; 
     
    $scope.ExamList=[];
    $scope.ExamID=null;
    $scope.refresh=false;
    
    $scope.GetAllExam=GetAllExam;
     $scope.AllExam = [];
    
     //time
        $scope.time = 0;
        $scope.time2= 0;
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

            function GetAllExam(x)
            {
              
                $scope.AllExam = [];
                
                var BID = x;
                
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamByBatchID/' + BID
                }).then(function successCallback(response) {
                    $scope.AllExam = response.data;
                    $scope.AllStudent = [];
                }, function errorCallback(response) {
                });
            }

    function PauseStopExam(SExamid, type,status)
    {
        var StudentExamID=SExamid;
        var type=type; //1 for pause 2 for stop
        var status=status; //1 for make stop or pause
        //console.log(SExamid, type,status);
        
         var r = confirm("Are you sure?");
         if (r == true) {
            $http({
                method: 'GET',
                url: baseUrl + 'Exam/PauseStopExam/' + StudentExamID+'/'+type+'/'+status
            }).then(function successCallback(response) {
                GetAllHistory($scope.ExamID);
               //console.log(response.data);
            }, function errorCallback(response) {
               
            });

        } 
        
    }
    
    function DeleteAttendanceExam(user)
    {
       var user = user;
         console.log(user);
        var r = confirm("আপনি কি এই পরীক্ষাটির তথ্য মুছে ফেলতে চান? এতে প্রশিক্ষণার্থীর এই পরীক্ষার কোন তথ্য আর সংরক্ষিত থাকবে না। ");
        if (r == true) {
            $http({
                method: 'GET',
                url: baseUrl + 'Exam/DeleteAttendanceExam/' + user
            }).then(function successCallback(response) {
                swal("Attendance!", "Deleted Successfully!!");
                GetAllHistory($scope.ExamID);
                
                console.log(response.data);
                
            }, function errorCallback(response) {
                swal("Attendance!", "Not Deleted!!!!");
            });

        } 
    }
    
    function GetAllHistory(ExamID)
    {
        var ExamID=ExamID;
        var History;
        $scope.ExamID=ExamID;
         $scope.show=1;
        //console.log($scope.ExamID);
        $scope.AllHistory = [];
        $scope.AllHistoryMax3=[];
        
        $http({
            method: 'GET',
            url: baseUrl + 'Exam/GetAllStudentLoginHistory/'+ExamID
           
        }).then(function successCallback(response) {
            $scope.AllHistory = response.data;
              $scope.show=0;
           
           
            History=$scope.AllHistory;
            $scope.AllHistoryMax3=History.sort((a, b) => Number(b.Correct) - Number(a.Correct));
            
        }, function errorCallback(response) {
        });
    }
    
    function RealtimeExamInfo(ExamID)
    {
        
        var ExamID=ExamID;
        
        $scope.ExamID=ExamID;
         console.log($scope.ExamID);
         
       // $scope.AllRealtimeExamInfo=[];
        
        $http({
            method: 'GET',
            url: baseUrl + 'Exam/RealtimeExamInfo/'+ExamID
        }).then(function successCallback(response) {
            $scope.AllRealtimeExamInfo = response.data;
            
            $scope.RealTimeTemp[0]=$scope.AllRealtimeExamInfo[0];
            $scope.RealTimeTemp[1]=$scope.AllRealtimeExamInfo[1];
            $scope.RealTimeTemp[2]=$scope.AllRealtimeExamInfo[2];
            $scope.RealTimeTemp[3]=$scope.AllRealtimeExamInfo[3];
            
            console.log($scope.AllRealtimeExamInfo);
        }, function errorCallback(response) {
        });
    }
    
   
     function GetExamList()
    {
      $scope.ExamList=[];
        $http({
            method: 'GET',
            url: baseUrl + 'Setting/GetAllBatchandQuestionSet/'
        }).then(function successCallback(response) {
            $scope.ExamList = response.data;


        }, function errorCallback(response) {
        });
    }
  
  $interval(function () {
      
        if($scope.ExamID!=null &&  $scope.refresh==true)
        {
          GetAllHistory($scope.ExamModule);
          //console.log("it's working ever 1 min after");
        }
      
  }, 60000);
  
  
   //timer callback
    
        var timer = function() {
            if( $scope.time2 <= 10000 ) {
                $scope.time2 += 1000;
                $timeout(timer, 1000);
                 $scope.time=$scope.time2/100;
            }
           
            //console.log($scope.time);
        }
 
  
  $interval(function () {
       $scope.time = 0;
       $scope.time2 = 0;
      if($scope.ExamID!=null && $scope.StartGameLoading==1)
      {
           //working after every 10s
          RealtimeExamInfo($scope.ExamID);
         
           //working after every 10s progress bar
          $timeout(timer, 1000);
      }
      
  }, 10000);   
  
}]);
</script>