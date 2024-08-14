
<div ng-controller="DefaultCtrl" class="col-md-10" style="background-color: #ffffff;">

    <div class="col-md-12">
        <h2>Setup Exam</h2>
        <h4>প্রত্যেক ব্যাচের পরীক্ষা নেয়ার আগে নতুন করে প্রশ্ন সেট, ব্যাচ,  স্টেটাস  এবং টাইম  অ্যাড করুন। এডিট, ডিলিট  করার আগে সতর্কতা জরুরি।  </h4>

        <h5>ডিফল্ট স্ট্যাটাস ইনএক্টিভ রাখুন। পরীক্ষের শুরুর আগে একটিভ করুন এবং পরীক্ষের পর এক্সএমড </h5>

        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <button type="button"  class="btn btn-info pull-left" data-toggle="modal" data-target="#myModal">Add Exam Info</button> 

    </div>
    <!--List of Batch-->
    <br>
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Batch Name </th>   
                <th>Question Set </th>
                <th>Status </th>
                <th>Time(min) </th>
                <th>MCQ </th>
                <th>Theory </th>
                <th>Practical </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="Batch in AllBatchandQuestionSet">
                <td>{{$index + 1}} </td>
                <td>{{Batch.BatchName}} </td>
                <th>{{Batch.ExamCollection}} </th>
                <th>{{Batch.StatusName}} </th>
                 <th>{{Batch.Time}} </th>
                <th>{{Batch.MCQMarks}} </th>
                <th>{{Batch.TheoryMarks}} </th>
                <th>{{Batch.PracticalMarks}} </th>
               
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Batch)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteSetExam(Batch.SetID)" >Delete</button></td>
            </tr>
        </table>

    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Batch</h4>
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddBatchandExamcollectionSet()" />                   
                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <select class="form-control"  ng-model="Question.BatchID"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                            <option value="">Choose Option</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >Question Set</label>
                        <select class="form-control"  ng-model="Question.ExamCollectionID"  name="ExamCollectionID" ng-options="Question2.Id as Question2.ExamCollection for Question2 in BatchabdExamCollection.examcollection">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Time(min)</label>
                        <input class="form-control" ng-model="Question.Time"  name="Exam"/>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >MCQ Marks</label>
                        <input class="form-control" ng-model="Question.MCQMarks"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Theory Marks</label>
                        <input class="form-control" ng-model="Question.TheoryMarks"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Practical Marks</label>
                        <input class="form-control" ng-model="Question.PracticalMarks"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Status</label>
                        <select class="form-control"  ng-model="Question.Status"  name="Status" ng-options="Question.ID as Question.Status for Question in BatchabdExamCollection.status">
                            <option value="">Choose Option</option>
                        </select>
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
</body>
</html>

<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllBatchandQuestionSet();
                GetAllBatchandExamCollectionField();
            }
            function initialize() {
                $scope.AllBatch = [];
                $scope.DeleteSetExam = DeleteSetExam;
                $scope.AddBatchandExamcollectionSet = AddBatchandExamcollectionSet;
                $scope.Batch = {};
                $scope.Edit = Edit;
                $scope.reset = reset;

                $scope.Question = {};

            }

            function GetAllBatchandExamCollectionField()
            {
                $scope.QType = [];
                $scope.QSubType = [];
                $scope.QTypeAndQSubType = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;


                }, function errorCallback(response) {
                });
            }
            function GetAllBatchandQuestionSet()
            {
                $scope.AllBatch = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllBatchandQuestionSet/'
                }).then(function successCallback(response) {
                    $scope.AllBatchandQuestionSet = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteSetExam(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteSetExam/' + SId
                    }).then(function successCallback(response) {
                        swal("Batch!!", "Deleted Successfully!!");
                        GetAllBatchandQuestionSet();
                    }, function errorCallback(response) {
                        swal("Batch!", "Not Deleted!!!!");
                    });

                }
            }

            function AddBatchandExamcollectionSet()
            {
                console.log($scope.Question);
                //update
                if ($scope.Question.SetID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateSetExam/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Question)
                    }).success(function (data) {
                        console.log(data);
                        GetAllBatchandQuestionSet();
                        $scope.Question = {};
                        $('#myModal').modal('toggle');
                        swal("Successfully Updated", "Batch");

                    });
                }
                else {
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddSetExam/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Question)
                    }).success(function (data) {
                        console.log(data);
                        GetAllBatchandQuestionSet();
                        $('#myModal').modal('toggle');
                        swal("Successfully added", "Batch");
                        $scope.Batch = {};
                    });
                }
            }

            function Edit(Batch)
            {
                $scope.Question = {};
                $scope.Question = Batch;
            }

            function reset()
            {
                $scope.Batch = {};
            }

        }]);
</script>