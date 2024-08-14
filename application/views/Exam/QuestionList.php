<div class="content-page" ng-controller="CreateQuestionCtrl">

    <!-- Start content -->
    <div class="content">
    
        <div class="container-fluid">
        
          <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?php echo $Title; ?></h1>
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
                        <h3>
                            <i class="far fa-copy"></i> <?php echo $Title; ?></h3>
                </div>
    
            <div class="card-body">
            
        <div class="table-responsive">
       	    	    
    
            <form ng-submit="GetSearchQuestion()">
                  <div class="row">
                <div class="col-md-4">
                <div class=" form-group">
                    <label> Subject List</label>
                    <select class="form-control"  ng-model="Question.QuestionSubject" ng-change="GetSearchQuestion()"  name="QuestionSubject" ng-options="Question.Id as Question.Name for Question in QTypeAndQSubType.questionsubject">
                        <option value="">Choose Option</option>
                    </select>
                  
                    </div>
               </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Complexity Type</label>
                    <select class="form-control"  ng-model="Question.QuestionType" ng-change="GetSearchQuestion()"  name="QuestionType" ng-options="Question.Id as Question.Type for Question in QTypeAndQSubType.questiontype">
                        <option value="">Choose Option</option>
                    </select>
                   
                    </div>
                </div>
             <div class="col-md-4">    
                <div class="form-group">
                    <label><br></label>
                    <button type="submit" ng-click="Search = 1" class=" form-control btn btn-danger">Search</button>
                  
                    </div>
             </div>  
            </form>
            
          
        
            <table class="table table-striped">
                <tr>
                    <th>Question 
                        <select ng-model="Question.Limit" ng-init="Question.Limit = '500'">
                            <option  ng-repeat="x in LimitNumber" >{{x}}</option>
    
                        </select>
    
                    </th>
                    <th>Description</th>
    
                    <th> Action</th>
                </tr>
                <!--<tr ng-repeat="Item in AllQuestion.OnlyQuestion | limitTo:Question.Limit">-->
                <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                    <td> {{$index + 1}}]
                        <span style="padding: 5px; font-family: cursive; font-size: 15px; font-weight:bolder;" class=""> {{Item.Question}} </span> 
                        <br>
                       
                        <ol>
                            <span  style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                                <li> <span style="padding: 2px; font-family: cursive; font-size: 12px;" ng-class="x.Answer==0?'':'btn btn-success'" > {{x.MCQ}}</span></li>
    
                            </span>
                        </ol>
                    </td>
                    <td>
                        <span style="padding: 0px; font-family: cursive; font-size: 12px;" class=""><b>Description: </b>  {{Item.Description}} </span> 
                        
                        <br>
                        <span style="padding: 0px; font-family: cursive; font-size: 12px;" class=""><b>Link: </b>  {{Item.Link}} </span> 
                        
                    </td>
                    <td> <button class="fas fa-times" ng-click="DeleteQuestion(Item.QId)"> </button> </td>
            </tr>
            
            
            </table>
            
           <!-- <div class="form-group">
            <button class="pull-left btn btn-primary" style="margin-left:200px;" ng-hide="Question.StartFrom == 0" ng-click="PreviousSearch()">Previous </button>    
            <button class="pull-right btn btn-primary" style="margin-right:200px;" ng-hide="Search == 0" ng-click="NextSearch()">Next </button> 
    
            </div>   -->     
    </div>
    
                    </div>
    
                </div>
                </div>
    
            </div>
            <!-- end row -->
    
        </div>
        <!-- END container-fluid -->
    
        
        
        
        </div>
        </div>
    </div>
    </body>
    </html>
    <script type="text/javascript">
    
        app.controller("CreateQuestionCtrl", ["$scope", "$http",
            function ($scope, $http) {
                init();
                function init() {
                    initialize();
                    GetAllExamTypeField();
    
                }
                function initialize() {
                    $scope.LimitNumber = [0,5, 10, 20, 30];
                    $scope.Search = 0;
                    $scope.QType = [];
                    $scope.QSubType = [];
                    $scope.QTypeAndQSubType = [];
                    $scope.GetAllExamTypeField = GetAllExamTypeField;
                    $scope.GetSearchQuestion = GetSearchQuestion;
    
                    $scope.Question = {};
                    $scope.AllQuestion = [];
                    $scope.Question.QuestionSubject = null;
                    $scope.Question.QuestionType = null;
                    
                    
    
                    //Delete Question
                    $scope.DeleteQuestion = DeleteQuestion;
                    $scope.Question.StartFrom = 0;
                }
    
                $scope.NextSearch = function NextSearch()
                {
                    $scope.Question.StartFrom = parseInt($scope.Question.StartFrom) + parseInt($scope.Question.Limit);
                    GetSearchQuestion();
                };
                $scope.PreviousSearch = function PreviousSearch()
                {
                    if ($scope.Question.StartFrom >= $scope.Question.Limit)
                    {
                        $scope.Question.StartFrom = ($scope.Question.StartFrom - $scope.Question.Limit);
                        GetSearchQuestion();
                    }
                };
    
    
                function GetSearchQuestion()
                {
                    //console.log($scope.Question);
                    $scope.AllQuestion = [];
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Exam/GetSearchQuestionForShowOnly/',
                        data: $scope.Question
                    }).success(function (data) {
                        $scope.AllQuestion = data;
                        console.log(data);
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
                function DeleteQuestion(id)
                {
                    var r = confirm("Do you Want to delete??");
    
                    if (r)
                    {
                        $http({
                            method: 'GET',
                            url: baseUrl + 'Exam/DeleteQuestion/' + id
                        }).then(function successCallback(response) {
                            $scope.Message = response.data;
                            GetSearchQuestion();
                        }, function errorCallback(response) {
                        });
                    }
                }
            }]);
    </script>