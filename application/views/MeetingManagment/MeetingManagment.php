<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> মিটিং   </h1>
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
                    <form method="post" action="<?php echo base_url(); ?>EducationalInstitute/Exportaction">
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
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>MeetingName  </th>
                <th>Detail </th>
                <th>Date  </th>
                <th>StartTime  </th>
                <th>EndTime List </th>
                <th>MeetingGuestDetail  </th>
                <th>MeetingHost  </th>
                <th>MeetingHost List </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="Lab in AllMeeting">
                <td>{{$index + 1}} </td>
                <td>{{Lab.MeetingName}} </td>
                <td>{{Lab.MeetingDetail}} </td>
                <td>{{Lab.Date}} </td>
                <td>{{Lab.StartTime}} </td>
                 <td>{{Lab.EndTime}} </td>
                 <td>{{Lab.MeetingGuestDetail}} </td>
                <td>{{Lab.MeetingHost}} </td>
                 <td>{{Lab.MeetingHost}} </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Lab)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteMeeting(Lab.MeetingID)" >Delete</button>
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
    

    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">মিটিং   </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    
                    
                    <form  ng-submit="AddMeeting()">
                    <div class="form-group">
                      <label for="LabName">MeetingName</label>
                      <input type="text" class="form-control" id="LabName" ng-model="Meeting.MeetingName" required>
                    </div>
                    <div class="form-group">
                      <label for="Meeting">MeetingDetail:</label>
                      <input type="text" class="form-control" id="Meeting" ng-model="Meeting.MeetingDetail" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >MeetingRoom</label>
                         <select class="form-control"  ng-model="Meeting.MeetingRoomID"  ng-options="Question.LabID as Question.LabName for Question in AllLabInfo" >
                            <option value="">Choose Option</option>
                            <option value="1">AC</option>
                            <option value="2">Non AC</option>
                            
                        </select>
                    </div>  
                    
                 
                    <div class="form-group">
                      <label for="LabCapacity">Date</label>
                      <input type="text" class="form-control" datepicker id="LabCapacity" ng-model="Meeting.Date"  required>
                    </div>
                    <div class="form-group">
                      <label for="LabCapacity">StartTime</label>
                      <input type="text" class="form-control" class="timepicker" name="timepicker" ng-model="Meeting.StartTime" required>
                    </div>
                    <div class="form-group">
                      <label for="LabCapacity">EndTime</label>
                      <input type="text" class="form-control" class="timepicker" name="timepicker" ng-model="Meeting.EndTime" required>
                    </div>
                    <div class="form-group">
                      <label for="Others">MeetingGuestDetail:</label>
                      <textarea class="form-control" id="Others" ng-model="Meeting.MeetingGuestDetail"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="Others">MeetingHost:</label>
                      <textarea class="form-control" id="Others" ng-model="Meeting.MeetingHost"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script type="text/javascript">
       $(document).ready(function() {
         $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                defaultTime: '10',
              });
       });
     </script>


<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllLabInfo();
               GetAllMeeting();

            }
            function initialize() {
                $scope.AllMeeting = [];
                $scope.DeleteMeeting = DeleteMeeting;
                $scope.AddMeeting = AddMeeting;
                
                $scope.AllMeeting = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

            }

            function GetAllMeeting()
            {
                $scope.AllMeeting = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'MeetingManagment/GetAllMeeting/'
                }).then(function successCallback(response) {
                    $scope.AllMeeting = response.data;
                }, function errorCallback(response) {
                });
            }
            
             function GetAllLabInfo()
            {
                $scope.AllLabInfo = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'MeetingManagment/GetAllLabInfo/'
                }).then(function successCallback(response) {
                    $scope.AllLabInfo = response.data;
                }, function errorCallback(response) {
                });
            }


            function DeleteMeeting(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'MeetingManagment/DeleteMeeting/' + SId
                    }).then(function successCallback(response) {
                        swal("Meeting!", "Deleted Successfully!!");
                      GetAllMeeting();
                    }, function errorCallback(response) {
                        swal("Meeting!", "Not Deleted!!!!");
                    });

                }
            }

            function AddMeeting()
            {
               //console.log($scope.Meeting);
                //update
                if ($scope.Meeting.MeetingID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'MeetingManagment/UpdateMeeting/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Meeting)
                    }).success(function (data) {   
                        //console.log(data);
                        GetAllMeeting();
                        $scope.Meeting={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "Meeting");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'MeetingManagment/AddMeeting/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Meeting)
                    }).success(function (data) {
                        console.log(data);
                        GetAllMeeting();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "Meeting");
                        $scope.CourseTitle = {};
                    });
                }
            }

            function Edit(Meeting)
            {
                $scope.Meeting = {};
                $scope.Meeting = Meeting;
            }
            
            function reset()
            {
                $scope.Meeting = {};
            }

        }]);
</script>