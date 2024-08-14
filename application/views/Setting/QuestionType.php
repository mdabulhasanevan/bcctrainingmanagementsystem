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
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Add QusetionType</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                     <table class="table table-striped">
                                        <tr>
                                            <th>SN</th>
                                            <th>Qusetion Type Name </th>            
                                            <th>Action </th>
                                        </tr>
                                        <tr ng-repeat="QusetionType in AllQusetionType">
                                            <td>{{$index + 1}} </td>
                                            <td>{{QusetionType.Type}} </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" ng-click="Edit(QusetionType)" >Edit</button>
                                                <button class="btn btn-danger btn-sm" ng-click="DeleteQusetionType(QusetionType.Id)" >Delete</button></td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Add QusetionType</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddQusetionType()" />                   
                    <div class="form-group">
                        <label for="Exam" >QusetionType Name</label>
                        <input class="form-control" ng-model="QusetionType.Type"  name="Exam"/>
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
</div>
</body>
</html>

<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllQusetionType();

            }
            function initialize() {
                $scope.AllQusetionType = [];
                $scope.DeleteQusetionType = DeleteQusetionType;
                $scope.AddQusetionType = AddQusetionType;
                $scope.QusetionType = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

            }

            function GetAllQusetionType()
            {
                $scope.AllQusetionType = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllQusetionType/'
                }).then(function successCallback(response) {
                    $scope.AllQusetionType = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteQusetionType(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteQusetionType/' + SId
                    }).then(function successCallback(response) {
                        swal("QusetionType!!", "Deleted Successfully!!");
                        GetAllQusetionType();
                    }, function errorCallback(response) {
                        swal("QusetionType!", "Not Deleted!!!!");
                    });

                }
            }

            function AddQusetionType()
            {
                console.log($scope.QusetionType);
                //update
                if ($scope.QusetionType.Id > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateQusetionType/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.QusetionType)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllQusetionType();
                        $scope.QusetionType={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "QusetionType");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddQusetionType/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.QusetionType)
                    }).success(function (data) {
                        console.log(data);
                        GetAllQusetionType();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "QusetionType");
                        $scope.QusetionType = {};
                    });
                }
            }

            function Edit(QusetionType)
            {
                $scope.QusetionType = {};
                $scope.QusetionType = QusetionType;
            }
            
            function reset()
            {
                $scope.QusetionType = {};
            }

        }]);
</script>