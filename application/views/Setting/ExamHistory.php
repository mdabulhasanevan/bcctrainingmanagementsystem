
<div ng-controller="DefaultCtrl" class="col-md-10" style="background-color: #ffffff;">


    <!--List of -->
    <br>
    <div class="col-md-12">
        <div class="form-group col-md-4">
            <label for="Exam" >Batch Name</label>
            <select class="form-control" id="BatchNameOpt"  ng-model="Student2.BatchID" ng-change="GetAllStudent(Student2.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                <option value="">Choose Option</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="Exam" >Exam Question Set</label>
            <select class="form-control"  ng-model="Student2.ExamCollection"  name="BatchID" ng-options="Question.ExamCollection as Question.ExamCollection for Question in BatchabdExamCollection.examcollection | filter:{BatchID:Student2.BatchID}">
                <option value="">Choose Option</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="Exam" >Reg No</label>
            <input class="form-control" type="text" ng-model="Student2.RegNO"/>
        </div>


    </div>
    <a class="btn btn-info" href="<?php echo base_url(); ?>/Setting/SetExam"><span class=""> </span>Go to Set Exam</a>

    <center><button id='print' style='margin-top: 10px; padding: 10px; border: none; text-align: center; background: black; border-radius: 4px; color: #fff; font-weight: bold; cursor: pointer;'>PRINT </button></center>
    <div class="col-md-12 print_history_div">

        <h2 style="text-align: center;">Batch wise Result</h2>
        Batch Name: <b>{{BatchName}}</b> &nbsp; &nbsp;
        <!--Question Set: <b>{{AllStudent[0].ExamCollection}}</b>-->
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th> Name </th>
                <th> RegNo </th>
<!--                <th> BatchID</th>-->
                <th>Date </th>
                <th> Exam Set </th>
                <th> Total </th>
                <th> Selected </th>
                <th>MCQ </th>
                <th>Theory </th>
                <th>Practical </th>
                <th>Total </th>
                <th>Action </th>

            </tr>
            <tr ng-repeat="Student in AllStudent| filter:{ExamCollection:Student2.ExamCollection}| filter:{RegNO:Student2.RegNO}:true">
                <td>{{$index + 1}} </td>
                <td>{{Student.Name}} </td>
                <td>{{Student.RegNO}} </td>
<!--                <td>{{Student.Batch}} </td>-->
                <td>{{Student.ExamDate}} </td>
                <td>{{Student.ExamCollection}} </td>
                <td>{{Student.TotalQuestion}} </td>
                <td>{{Student.Selected}} </td>
                <td>{{Student.Correct}} </td>
                <td>{{Student.Theory}} </td>
                <td>{{Student.Practical}} </td>
                <td>{{Student.totalAmount}} </td>
                <td>
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#myModal" ng-click="Edit(Student)"  ></span>
                    <span class="glyphicon glyphicon-remove" ng-click="DeleteStudent(Student.ERId)" ></span>

                </td>
            </tr>
        </table>
    </div>



    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Result</h4>
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="UpdateResult()" />                   

                    <div class="form-group">
                        <label for="Exam" >Correct</label>
                        <input class="form-control" ng-model="Student3.Correct"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Theory</label>
                        <input class="form-control" ng-model="Student3.Theory"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Practical</label>
                        <input class="form-control" ng-model="Student3.Practical"  name="Exam"/>
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

                GetAllBatchandExamCollectionField()

            }
            function initialize() {
                $scope.AllStudent = [];
                $scope.DeleteStudent = DeleteStudent;

                $scope.Student = {};
                $scope.Student2 = {};
                $scope.Student3 = {};

                $scope.reset = reset;
                $scope.GetAllStudent = GetAllStudent;

                $scope.UpdateResult = UpdateResult;
                $scope.Edit = Edit;

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

            function GetAllStudent(x)
            {

                var skillsSelect = $("#BatchNameOpt option:selected").text();
                $scope.BatchName=skillsSelect;


                $scope.AllStudent = [];
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamHistory/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    console.log($scope.AllStudent);
                }, function errorCallback(response) {
                });
            }

            function DeleteStudent(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Exam/DeleteExamHistory/' + SId
                    }).then(function successCallback(response) {
                        swal("Student!!", "Deleted Successfully!!");
                        GetAllStudent($scope.Student2.BatchID);
                    }, function errorCallback(response) {
                        swal("Student!", "Not Deleted!!!!");
                    });

                }
            }

            function Edit(data)
            {
                $scope.Student3 = {};
                $scope.Student3 = data;

            }

            function UpdateResult()
            {
                if ($scope.Student3.ERId > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Exam/UpdateResult/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Student3)
                    }).success(function (data) {
                        GetAllStudent($scope.Student2.BatchID)
                        $scope.Batch = {};
                        $('#myModal').modal('toggle');
                        swal("Successfully Updated", "Batch");

                    });
                }
            }

            function reset()
            {
                $scope.Student = {};
            }

        }]);
</script>

<!--print html--> 
<script>
    // here we will write our custom code for printing our div
    $(function () {
        $('#print').on('click', function () {
            //Print ele2 with default options
            $.print(".print_history_div");
        });
    });
</script>