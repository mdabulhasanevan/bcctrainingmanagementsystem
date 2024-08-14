
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
                                            <i class="fas fa-plus" aria-hidden="true"></i>Add Module Name</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                     
										<table class="table table-striped">
											<tr>
												<th>SN</th>
												<th>Module Name </th>            
												<th>Action </th>
											</tr>
											<tr ng-repeat="ExamName in AllExamName">
												<td>{{$index + 1}} </td>
												<td>{{ExamName.ExamName}} </td>
												<td>
													<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" ng-click="Edit(ExamName)" >Edit</button>
													<button class="btn btn-danger btn-sm" ng-click="DeleteExamName(ExamName.ExNId)" >Delete</button></td>
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
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Module Name</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddExamName()" />                   
                    <div class="form-group">
                        <label for="Exam" >Module Name</label>
                        <input class="form-control" ng-model="ExamName.ExamName"  name="Exam"/>
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
                GetAllExamName();

            }
            function initialize() {
                $scope.AllExamName = [];
                $scope.DeleteExamName = DeleteExamName;
                $scope.AddExamName = AddExamName;
                $scope.ExamName = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

            }

            function GetAllExamName()
            {
                $scope.AllExamName = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllExamName/'
                }).then(function successCallback(response) {
                    $scope.AllExamName = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteExamName(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteExamName/' + SId
                    }).then(function successCallback(response) {
                        swal("ExamName!", "Deleted Successfully!!");
                        GetAllExamName();
                    }, function errorCallback(response) {
                        swal("ExamName!", "Not Deleted!!!!");
                    });

                }
            }

            function AddExamName()
            {
                console.log($scope.ExamName);
                //update
                if ($scope.ExamName.ExNId > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateExamName/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ExamName)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllExamName();
                        $scope.ExamName={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "ExamName");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddExamName/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ExamName)
                    }).success(function (data) {
                        console.log(data);
                        GetAllExamName();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "ExamName");
                        $scope.ExamName = {};
                    });
                }
            }

            function Edit(ExamName)
            {
                $scope.ExamName = {};
                $scope.ExamName = ExamName;
            }
            
            function reset()
            {
                $scope.ExamName = {};
            }

        }]);
</script>