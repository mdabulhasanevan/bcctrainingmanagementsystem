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
                                     
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                   <div class="table-responsive">
									   <div class="form-group">
											<label>Question Set</label>
											<select class="form-control"  ng-model="Question.ExamCollectionID" ng-change="GetSetQuestionForExamCollection()"  name="ExamCollectionID" ng-options="Question.Id as Question.ExamCollection for Question in QTypeAndQSubType.examcollection">
												<option value="">Choose Option</option>
											</select>
											<div class="form-control-focus"> </div>
										</div>
                                    <table class="table table-striped">
										<tr>
											<th>
												Question
											</th>
											<th>
												Subject
											</th>
											<th>
												Type
											</th>

											<th> Action</th>
										</tr>
										<tr ng-repeat="Item in AllSetQuestion">
											<td> {{$index + 1}}] {{Item.Question}}  </td>
											<td>{{Item.QSubject}}</td>
											<td>{{Item.QType}}</td>
											<td> <span class="glyphicon glyphicon-remove" ng-click="DeleteSetQuestion(Item.SetQID)"> </span></td>
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
                GetAllExamTypeField();

            }
            function initialize() {
               
                $scope.QType = [];
                $scope.QSubType = [];
                $scope.QTypeAndQSubType = [];
                $scope.GetAllExamTypeField = GetAllExamTypeField;
               


                $scope.Question = {};
                $scope.AllQuestion = [];
                $scope.Question.QuestionSubject = null;
                $scope.Question.QuestionType = null;

                $scope.GetSetQuestionForExamCollection = GetSetQuestionForExamCollection;
                $scope.AllSetQuestion = [];

               
                $scope.DeleteSetQuestion=DeleteSetQuestion;
            }


          
            function GetAllExamTypeField()
            {
                $scope.QType = [];
                $scope.QSubType = [];
                $scope.QTypeAndQSubType = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.QTypeAndQSubType = response.data;
                    
                    
                }, function errorCallback(response) {
                });
            }

            function GetSetQuestionForExamCollection()
            {
                var id = $scope.Question.ExamCollectionID;
//                set Question.ExamCollectionID for all Question
                angular.forEach($scope.AllQuestion.OnlyQuestion, function (Q) {
                    Q.ExamCollectionID = $scope.Question.ExamCollectionID;
                    Q.Selected=false;
                });
                console.log($scope.AllQuestion.OnlyQuestion);

                $scope.AllSetQuestion = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetSetQuestionForExamCollection/' + id
                }).success(function (data) {
                    $scope.AllSetQuestion = data;
                    console.log(data);
                });
            }

           
            
            function DeleteSetQuestion(id)
            {
                var r = confirm("Do you Want to delete??");

                if (r)
                {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Exam/DeleteSetQuestion/' + id
                    }).then(function successCallback(response) {
                        $scope.Message = response.data;
                        GetSetQuestionForExamCollection();
                    }, function errorCallback(response) {
                    });
                }
            }
        }]);
</script>