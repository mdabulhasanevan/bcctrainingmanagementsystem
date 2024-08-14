<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">কোর্সের  তালিকা </h1>
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
                <th>Course  </th>
                <th>Detail </th>
                <th>TotalClass  </th>
                <th>Subject List </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="CourseTitle in AllCourseTitle">
                <td>{{$index + 1}} </td>
                <td>{{CourseTitle.Title}} </td>
                <td>{{CourseTitle.Code}} </td>
                <td>{{CourseTitle.TotalClass}} </td>
                <td>{{CourseTitle.TopicsList}} </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(CourseTitle)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteCourseTitle(CourseTitle.ID)" >Delete</button></td>
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
                    <h4 class="modal-title" id="myModalLabel">Add CourseTitle </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddCourseTitle()" />                   
                    <div class="form-group">
                        <label for="Exam" >CourseTitle </label>
                        <input class="form-control" ng-model="CourseTitle.Title"  />
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Code</label>
                        <input class="form-control" ng-model="CourseTitle.Code"  />
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Total Class</label>
			<input class="form-control" ng-model="CourseTitle.TotalClass"  />
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Subject List (Use comma to separat like MS Office, MS Excel, Internet)</label>
  			<textarea class="form-control" ng-model="CourseTitle.TopicsList"></textarea>
                        
                    </div>
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" ="Create" id="Create">Add</button>
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
                GetAllCourseTitle();

            }
            function initialize() {
                $scope.AllCourseTitle = [];
                $scope.DeleteCourseTitle = DeleteCourseTitle;
                $scope.AddCourseTitle = AddCourseTitle;
                $scope.CourseTitle = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

            }

            function GetAllCourseTitle()
            {
                $scope.AllCourseTitle = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllCourseTitle/'
                }).then(function successCallback(response) {
                    $scope.AllCourseTitle = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteCourseTitle(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteCourseTitle/' + SId
                    }).then(function successCallback(response) {
                        swal("CourseTitle!", "Deleted Successfully!!");
                        GetAllCourseTitle();
                    }, function errorCallback(response) {
                        swal("CourseTitle!", "Not Deleted!!!!");
                    });

                }
            }

            function AddCourseTitle()
            {
               // console.log($scope.CourseTitle);
                //update
                if ($scope.CourseTitle.ID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateCourseTitle/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.CourseTitle)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllCourseTitle();
                        $scope.CourseTitle={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "CourseTitle");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddCourseTitle/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.CourseTitle)
                    }).success(function (data) {
                        console.log(data);
                        GetAllCourseTitle();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "CourseTitle");
                        $scope.CourseTitle = {};
                    });
                }
            }

            function Edit(CourseTitle)
            {
                $scope.CourseTitle = {};
                $scope.CourseTitle = CourseTitle;
            }
            
            function reset()
            {
                $scope.CourseTitle = {};
            }

        }]);
</script>