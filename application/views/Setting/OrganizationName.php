   <div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">শিক্ষা প্রতিষ্ঠানের তালিকা </h1>
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
                <th>OrganizationName Name </th>
                <th>Detail </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="OrganizationName in AllOrganizationName">
                <td>{{$index + 1}} </td>
                <td>{{OrganizationName.OrganizationName}} </td>
                <td>{{OrganizationName.Detail}} </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(OrganizationName)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteOrganizationName(OrganizationName.ID)" >Delete</button></td>
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
                     <h4 class="modal-title" id="myModalLabel">Add OrganizationName Name</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddOrganizationName()" />                   
                    <div class="form-group">
                        <label for="Exam" >OrganizationName Name</label>
                        <input class="form-control" ng-model="OrganizationName.OrganizationName"  name="Exam"/>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Detail</label>
                        <input class="form-control" ng-model="OrganizationName.Detail"  name="Detail"/>
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
                GetAllOrganizationName();

            }
            function initialize() {
                $scope.AllOrganizationName = [];
                $scope.DeleteOrganizationName = DeleteOrganizationName;
                $scope.AddOrganizationName = AddOrganizationName;
                $scope.OrganizationName = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

            }

            function GetAllOrganizationName()
            {
                $scope.AllOrganizationName = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllOrganizationName/'
                }).then(function successCallback(response) {
                    $scope.AllOrganizationName = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteOrganizationName(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteOrganizationName/' + SId
                    }).then(function successCallback(response) {
                        swal("OrganizationName!", "Deleted Successfully!!");
                        GetAllOrganizationName();
                    }, function errorCallback(response) {
                        swal("OrganizationName!", "Not Deleted!!!!");
                    });

                }
            }

            function AddOrganizationName()
            {
               // console.log($scope.OrganizationName);
                //update
                if ($scope.OrganizationName.ID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateOrganizationName/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.OrganizationName)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllOrganizationName();
                        $scope.OrganizationName={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "OrganizationName");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddOrganizationName/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.OrganizationName)
                    }).success(function (data) {
                        console.log(data);
                        GetAllOrganizationName();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "OrganizationName");
                        $scope.OrganizationName = {};
                    });
                }
            }

            function Edit(OrganizationName)
            {
                $scope.OrganizationName = {};
                $scope.OrganizationName = OrganizationName;
            }
            
            function reset()
            {
                $scope.OrganizationName = {};
            }

        }]);
</script>