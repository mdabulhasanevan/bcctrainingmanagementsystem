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
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Add Question Set with Module</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3> 

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                     <div class="form-group">
                                        <label for="Exam" >Module Name</label>
                                        <select class="form-control"  ng-model="ExamNameID" required  name="BatchID" ng-options="Question.ExNId as Question.ExamName for Question in BatchabdExamCollection.ExamName">
                                            <option value="">Choose Option</option>
                                        </select>
                                    </div>
										  <table class="table table-striped">
											<tr>
												<th>SN</th>
												<th>Module Name </th> 
												<th>Question SET Name </th>        
													   
												<th>Action </th>
											</tr>
											<tr ng-repeat="ExamCollection in AllExamCollection | filter: {ExNId:ExamNameID}:true">
												<td>{{$index + 1}} </td>
												  <td>{{ExamCollection.ExamName}} </td>
												<td>{{ExamCollection.ExamCollection}} </td>
											   
												<td>
													<button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(ExamCollection)" >Edit</button>
													<button class="btn btn-danger" ng-click="DeleteExamCollection(ExamCollection.Id)" >Delete</button></td>
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
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Question SET</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddExamCollection()" />      
                    <div class="form-group">
                        <label for="Exam" >Module Name</label>
                        <select class="form-control"  ng-model="ExamCollection.ExamNameID" required  name="BatchID" ng-options="Question.ExNId as Question.ExamName for Question in BatchabdExamCollection.ExamName">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Question Set Name</label>
                        <input class="form-control" ng-model="ExamCollection.ExamCollection"  name="Exam"/>
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
                GetAllExamCollection();
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllExamCollection = [];
                $scope.DeleteExamCollection = DeleteExamCollection;
                $scope.AddExamCollection = AddExamCollection;
                $scope.ExamCollection = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

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

            function GetAllExamCollection()
            {
                $scope.AllExamCollection = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllExamCollection/'
                }).then(function successCallback(response) {
                    $scope.AllExamCollection = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteExamCollection(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteExamCollection/' + SId
                    }).then(function successCallback(response) {
                        swal("ExamCollection!!", "Deleted Successfully!!");
                        GetAllExamCollection();
                    }, function errorCallback(response) {
                        swal("ExamCollection!", "Not Deleted!!!!");
                    });

                }
            }

            function AddExamCollection()
            {
                console.log($scope.ExamCollection);
                //update
                if ($scope.ExamCollection.Id > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateExamCollection/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ExamCollection)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllExamCollection();
                        $scope.ExamCollection={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "ExamCollection");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddExamCollection/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ExamCollection)
                    }).success(function (data) {
                        console.log(data);
                        GetAllExamCollection();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "ExamCollection");
                        $scope.ExamCollection = {};
                    });
                }
            }

            function Edit(ExamCollection)
            {
                $scope.ExamCollection = {};
                $scope.ExamCollection = ExamCollection;
            }
            
            function reset()
            {
                $scope.ExamCollection = {};
            }

        }]);
</script>