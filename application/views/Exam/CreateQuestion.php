<div class="content-page" ng-controller="DefaultCtrl"  >
<!-- Start content -->
    <div class="content" >
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">  প্রশ্ন তৈরি করুন   </h1>
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
                        <h3> <i class="far fa-copy"></i> <?php echo $Title; ?></h3>
                        </div> 
                        
                    <div class="card-body">
                       
                    <div class="table-responsive">
                        <form   ng-submit="CreateQuestion()"  >
                        
                        <div class="form-group">
                            <label for="Post"> Subject</label>
                            <select class="form-control"  ng-model="Question.QuestionSubject"  name="QuestionSubject" ng-options="Question.Id as Question.Name for Question in QTypeAndQSubType.questionsubject | orderBy:'Name'">
                                <option value="">Choose Option</option>
                            </select>
                            <div class="form-control-focus"> </div>
                        </div>
                        <div class="form-group">
                            <label for="Post"> Type</label>
                            <select class="form-control"  ng-model="Question.QuestionType"  name="QuestionType" ng-options="Question.Id as Question.Type for Question in QTypeAndQSubType.questiontype">
                                <option value="">Choose Option</option>
                            </select>
                            <div class="form-control-focus"> </div>
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <textarea class="form-control" required ng-model="Question.QuestionName" name="QuestionName" id="QuestionName">
                            </textarea>
                        </div>
                        
                        <div class="form-group">
                        <label>Question Descriptions</label>
                        <textarea  class="form-control" name=""  ng-model="Question.Description">N/A</textarea>
                        
                        </div>
                        
                        <div class="form-group">
                        <label>Youtube Link</label>
                        <textarea  class="form-control" name=""  ng-model="Question.Link">https://www.youtube.com</textarea>
                        
                        </div>
                        
                        
                       <!-- <script>    CKEDITOR.replace( 'Description' );</script>-->
                      
                        
                        <div class="form-group">
                            <label>MCQ</label>                                      
                        </div>
                       
                       <script>
                        $(document).ready(function(){
                          $('[data-toggle="tooltip"]').tooltip();   
                        });
                        </script>
                        
                       <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span class="input-group-text" style="background-color:#ccffcc;">1</span> </div>
                        <input class="form-control" required ng-model="Question.MCQ1" name="MCQ1" id="" autocomplete="off"/>
                        <div class="input-group-append"> <span class="input-group-text" style="background-color:#ccffcc;"> <input type="checkbox" style="width:30px; height:25px; " ng-model="Question.MCQ1Ans"  ng-true-value="true" ng-false-value="false"  data-toggle="tooltip" data-placement="top" title="Select if it's a correct answer."></span> </div>
                        </div> 
                               
                        <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span class="input-group-text" style="background-color:#ccffcc;">2</span> </div>
                        <input class="form-control" required ng-model="Question.MCQ2" name="MCQ2" id="" autocomplete="off"/>
                        <div class="input-group-append"> <span class="input-group-text" style="background-color:#ccffcc;"> <input type="checkbox" style="width:30px; height:25px;" ng-model="Question.MCQ2Ans"   ng-true-value="true" ng-false-value="false" data-toggle="tooltip" data-placement="top" title="Select if it's a correct answer."></span> </div>
                        </div>
                        
                       <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span class="input-group-text" style="background-color:#ccffcc;">3</span> </div>
                        <input class="form-control"  ng-model="Question.MCQ3" name="MCQ3" id="" autocomplete="off"/>
                        <div class="input-group-append"> <span class="input-group-text" style="background-color:#ccffcc;"> <input type="checkbox" style="width:30px; height:25px;" ng-model="Question.MCQ3Ans"  ng-true-value="true" ng-false-value="false" data-toggle="tooltip" data-placement="top" title="Select if it's a correct answer."></span> </div>
                        </div> 
                               
                        <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span class="input-group-text" style="background-color:#ccffcc;">4</span> </div>
                        <input class="form-control"  ng-model="Question.MCQ4" name="MCQ4" id="" autocomplete="off"/>
                        <div class="input-group-append"> <span class="input-group-text" style="background-color:#ccffcc;"> <input type="checkbox" style="width:30px; height:25px;" ng-model="Question.MCQ4Ans"   ng-true-value="true" ng-false-value="false" data-toggle="tooltip" data-placement="top" title="Select if it's a correct answer."></span> </div>
                        </div>                        
                        
                        <button type="submit" class="btn btn-danger">Add</button>
                        
                        </form>
                     </div>
                    </div>
                    </div>
                </div>
            </div> 
        
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
                $scope.CreateQuestion = CreateQuestion;

                $scope.Question = {};
                $scope.Question.MCQ1Ans = 0;
                $scope.Question.MCQ2Ans = 0;
                $scope.Question.MCQ3Ans = 0;
                $scope.Question.MCQ4Ans = 0;
            }


            function CreateQuestion()
            {
                console.log($scope.Question);

                $http({
                    method: 'POST',
                    url: baseUrl + 'Exam/SaveCreateQuestion/',
                    data: $scope.Question
                }).success(function (data) {
                    
                    swal("Question Added","Successfully");
                    $TemType = $scope.Question.QuestionType;
                    $TemSubType = $scope.Question.QuestionSubject;
                    $scope.Question = {};
                    $scope.Question.QuestionType = $TemType;
                    $scope.Question.QuestionSubject = $TemSubType;
                    $scope.Question.MCQ1Ans = 0;
                    $scope.Question.MCQ2Ans = 0;
                    $scope.Question.MCQ3Ans = 0;
                    $scope.Question.MCQ4Ans = 0;
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

        }]);
</script>