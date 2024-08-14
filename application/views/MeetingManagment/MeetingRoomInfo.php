<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> মিটিং রুম  </h1>
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
                <th>LabName  </th>
                <th>Detail </th>
                <th>LabType  </th>
                <th>LabCapacity List </th>
                <th>Others List </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="Lab in AllLabInfo">
                <td>{{$index + 1}} </td>
                <td>{{Lab.LabName}} </td>
                <td>{{Lab.LabInfo}} </td>
                <td>{{Lab.LabType}} </td>
                <td>{{Lab.LabCapacity}} </td>
                 <td>{{Lab.Others}} </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Lab)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteLabInfo(Lab.LabID)" >Delete</button>
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
                    <h4 class="modal-title" id="myModalLabel">মিটিং রুম তৈরি  </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    
                    
                    <form  ng-submit="AddLabInfo()">
                    <div class="form-group">
                      <label for="LabName">Lab Name:</label>
                      <input type="text" class="form-control" id="LabName" ng-model="LabInfo.LabName" required>
                    </div>
                    <div class="form-group">
                      <label for="LabInfo">Lab Info:</label>
                      <input type="text" class="form-control" id="LabInfo" ng-model="LabInfo.LabInfo" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >LabType</label>
                         <select class="form-control"  ng-model="LabInfo.LabType" >
                            <option value="">Choose Option</option>
                            <option value="1">AC</option>
                            <option value="2">Non AC</option>
                            
                        </select>
                    </div>  
                    
                 
                    <div class="form-group">
                      <label for="LabCapacity">Lab Capacity:</label>
                      <input type="text" class="form-control" id="LabCapacity" ng-model="LabInfo.LabCapacity" required>
                    </div>
                    <div class="form-group">
                      <label for="Others">Others:</label>
                      <textarea class="form-control" id="Others" ng-model="LabInfo.Others"></textarea>
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

<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
               GetAllLabInfo();

            }
            function initialize() {
                $scope.AllLabInfo = [];
                $scope.DeleteLabInfo = DeleteLabInfo;
                $scope.AddLabInfo = AddLabInfo;
                
                $scope.AllLabInfo = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

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

            function DeleteLabInfo(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'MeetingManagment/DeleteLabInfo/' + SId
                    }).then(function successCallback(response) {
                        swal("LabInfo!", "Deleted Successfully!!");
                      GetAllLabInfo();
                    }, function errorCallback(response) {
                        swal("LabInfo!", "Not Deleted!!!!");
                    });

                }
            }

            function AddLabInfo()
            {
               //console.log($scope.LabInfo);
                //update
                if ($scope.LabInfo.LabID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'MeetingManagment/UpdateLabInfo/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.LabInfo)
                    }).success(function (data) {   
                        //console.log(data);
                        GetAllLabInfo();
                        $scope.LabInfo={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "LabInfo");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'MeetingManagment/AddLabInfo/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.LabInfo)
                    }).success(function (data) {
                        console.log(data);
                        GetAllLabInfo();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "LabInfo");
                        $scope.CourseTitle = {};
                    });
                }
            }

            function Edit(LabInfo)
            {
                $scope.LabInfo = {};
                $scope.LabInfo = LabInfo;
            }
            
            function reset()
            {
                $scope.LabInfo = {};
            }

        }]);
</script>