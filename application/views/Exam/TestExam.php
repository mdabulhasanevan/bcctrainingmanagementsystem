<div  ng-controller="CreateQuestionCtrl" class="col-md-10" style="background-color: #ffffff;">

    <div class="form_main">
        <form   ng-submit="GetSearchQuestion()"  >

            <div class="form-group col-md-4">
                <label>Question Type</label>
                <select class="form-control"  ng-model="Question.TypeId" ng-disabled="AllQuestion.OnlyQuestion.length > 0" name="TypeId" ng-options="Question.QTypeId as Question.Type for Question in QTypeAndQSubType.qtype">
                    <option value="">Choose Option</option>
                </select>
                <div class="form-control-focus"> </div>
            </div>
            <div class="form-group col-md-4">
                <label>Question Sub Type</label>
                <select class="form-control"  ng-model="Question.SubTypeId" required="" ng-disabled="AllQuestion.OnlyQuestion.length > 0"  name="SubTypeId" ng-options="Question.QSubId as Question.SubType for Question in QTypeAndQSubType.qsubtype | filter:{TypeId: Question.TypeId}">
                    <option value="">Choose Option</option>
                </select>
                <div class="form-control-focus"> </div>
            </div>

            <div class="form-group col-md-4">
                <label><br></label>
                <button type="submit" ng-hide="AllQuestion.OnlyQuestion.length > 0" class=" form-control btn btn-danger" 
                        onclick="openFullscreen();">Start Exam</button>
                <div class="form-control-focus"> </div>
            </div>

        </form>

    </div>

    <!--list of question-->
    <div class="row">
        <h3  class="pull-right btn btn-primary">Total Question {{AllQuestion.OnlyQuestion.length}}</h3>
        <h3 style="position:fixed; top:200px; right: 50px;" ng-show="ShowCheckResultBtn == 1" class="btn btn-danger"> Timer : {{time}} Sec.</h3>
        <table class="table table-striped">
            <tr>
                <th>Question </th>
                <th> </th>

            </tr>
            <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                <td>{{$index + 1}}] <span style="padding: 5px; font-family: cursive; font-size: 15px;" class=""> {{Item.Question}} </span> 
                    <br>
                    <span   ng-click="Item.Click = 1" style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                        <span ng-hide="Item.Click == 1" ng-model="x.Selected" ng-click="x.Selected = 1;
                                            TakeAns(x)" 
                              style="padding: 2px; font-family: cursive; font-size: 13px;"  class="btn btn-primary"> {{x.MCQ}}
                        </span>
                    </span>
                </td>
                <td>
            </tr>
            <tr>
                <td></td>

                <td> 
                </td>
            </tr>
        </table>
<button type="button"  ng-click="CheckResult()" class="btn btn-success pull-left" data-toggle="modal" data-target="#myModal">Stop if want to finish</button> 
    </div>

    <!-- Modal for Send List -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="max-width:950px; overflow: scroll;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close" ng-click="ResetAll()"><span aria-hidden="true" >&times;</span></button>
                    <h4 class="modal-title btn btn-primary" id="myModalLabel">[{{Result.Correct}}/{{Result.Selected}}]--- Correct {{Result.Correct}}/Answered {{Result.Selected}}</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-striped">
                        <tr>
                            <th>Question </th>
                            <th>Your Answer </th>
                            <th>Right Answer </th>

                        </tr>
                        <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                            <td> <span style="padding: 5px; font-family: cursive; font-size: 13px;" class=""> {{Item.Question}} </span> </td>
                            <td>
                                <span style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                                    <span class="glyphicon glyphicon-ok" ng-show="x.Answer == 1 && x.Selected == 1"> </span> 
                                    <span class="glyphicon glyphicon-remove" ng-show="x.Answer == 0 && x.Selected == 1"> </span>
                                    <span style="padding: 3px; font-family: cursive; font-size: 10px;" ng-show="x.Selected == 1" class="label label-info"> {{x.MCQ}}</span>      
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                                    <span style="padding: 3px; font-family: cursive; font-size: 10px;" ng-show="x.Answer == 1" class="label label-danger"> {{x.MCQ}}</span>
                                </span>
                            </td>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" ng-click="ResetAll()" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
<script type="text/javascript">

    app.controller("CreateQuestionCtrl", ["$scope", "$http", "$timeout",
        function ($scope, $http, $timeout) {
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
                $scope.GetSearchQuestion = GetSearchQuestion;

                $scope.Question = {};
                $scope.AllQuestion = [];
                $scope.Question.TypeId = null;
                $scope.Question.SubTypeId = null;

                $scope.TakeAns = TakeAns;
                // $scope.ClickedDisable = ClickedDisable;
                $scope.CheckResult = CheckResult;
                $scope.Result = {};

                $scope.ResetAll = ResetAll;

                $scope.ShowCheckResultBtn = 0;

                //timer
                $scope.time = 0;
                $scope.TimeUp = 0;
                $scope.AllQuestionBlock = 0;


            }
            //timer callback
            var timer = function () {
                if ($scope.time > $scope.TimeUp) {
                    $scope.time -= 1;
                    $timeout(timer, 1000);
                }
            }

            function CheckResult()
            {
                var CountSelected = 0;
                var CountAnswered = 0;

                angular.forEach($scope.AllQuestion.AllQuestion, function (Question) {
                    if (Question.Selected == 1)
                    {
                        CountSelected = CountSelected + 1;
                        if (Question.Answer == 1)
                        {
                            CountAnswered = CountAnswered + 1;
                        }
                    }
                });
                
              
                $scope.Result.Selected = CountSelected;
                $scope.Result.Correct = CountAnswered;
                //not needed
                $scope.Result.TypeId = $scope.Question.TypeId;
                $scope.Result.SubTypeId = $scope.Question.SubTypeId;



                console.log($scope.Result);
                $http({
                    method: 'POST',
                    url: baseUrl + 'Exam/SaveExamResult/',
                    data: $scope.Result
                }).then(function successCallback(response) {
                    console.log("Save Result");
                    $scope.ResultCheckSaveStatus = 1;
                }, function errorCallback(response) {
                });
            }
            function TakeAns(All)
            {
                $scope.All = All;
                console.log(All);
            }

            function GetSearchQuestion()
            {
                $scope.ResultCheckSaveStatus = 0;

                $scope.ShowCheckResultBtn = 1;
                $scope.time = 0;

                console.log($scope.Question);
                $scope.AllQuestion = [];
                $http({
                    method: 'POST',
                    url: baseUrl + 'Exam/GetSearchQuestion/',
                    data: $scope.Question
                }).success(function (data) {
                    $scope.AllQuestion = data;
                    console.log(data);
                    if ($scope.AllQuestion.OnlyQuestion.length > 0)
                    {
                        $scope.time = $scope.AllQuestion.OnlyQuestion.length * $scope.AllQuestion.setting.PerQuestionTime;
                        $scope.TimeLength = $scope.AllQuestion.OnlyQuestion.length * $scope.AllQuestion.setting.PerQuestionTime;

                        $timeout(timer, 1000);
                        //10 seconds delay
                        $timeout(function () {
                            $scope.AllQuestionBlock = 1;

                            if ($scope.ResultCheckSaveStatus == 0)
                            {
                                CheckResult();
                                alert("Time Out!! Please Stop");
                                $('#myModal').modal('toggle');
                            }

                        }, $scope.TimeLength * 1000);
                    }


                })
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

            function ResetAll()
            {
                init();
            }
        }]);







    var elem = document.documentElement;
    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    }
</script>