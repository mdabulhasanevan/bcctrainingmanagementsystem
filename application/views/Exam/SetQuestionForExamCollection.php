<div class="content-page" ng-controller="CreateQuestionCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h3 class="main-title float-left"> সেটের সাথে প্রশ্ন গুলো অ্যাড করুন</h3>
                                <ol class="breadcrumb float-right">
                                    <div class="pull-left">
                                      <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> Auto Generated Question Set</button> 
                                    </div>
                                    
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-12">

                            <div class="card mb-3">
                                <div class="card-header">
                                    
                                 <div class="row">
                                    <div class="form-group col-md-12">
										<label>Question Set</label>
										<select class="form-control"  ng-model="Question.ExamCollectionID" ng-change="GetSetQuestionForExamCollection()"  name="ExamCollectionID" ng-options="Question.Id as Question.ExamName+ '- Set: ('+Question.ExamCollection+')' for Question in QTypeAndQSubType.examcollectionListOnly">
											<option value="">Choose Option</option>
										</select>
										<div class="form-control-focus"> </div>
									</div>
									
									
                                
                                 </div>
										
									</form> 

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                          <div class="row">
                                        <div class="col-md-5">
                                            <form   ng-submit="GetSearchQuestion()"  >
                                         <div class="row">
                                    
                                         <div class="form-group col-md-5">
									<!--	<label> Subject Name</label> -->
										<select class="form-control"  ng-model="Question.QuestionSubject"  name="QuestionSubject" ng-options="Question.Id as Question.Name for Question in QTypeAndQSubType.questionsubject">
											<option value="">Choose Option</option>
										</select>
										<div class="form-control-focus"> </div>
										</div>
										<div class="form-group col-md-5">
										<!--	<label>Question Type</label> -->
											<select class="form-control"  ng-model="Question.QuestionType"  name="QuestionType" ng-options="Question.Id as Question.Type for Question in QTypeAndQSubType.questiontype">
												<option value="">Choose Option</option>
											</select>
											<div class="form-control-focus"> </div>
										</div>
									    
										<div class="form-group col-md-2">
										<!--	<label><br></label> -->
											<button type="submit" ng-click="Search = 1" class=" form-control btn btn-danger">Search</button>
											<div class="form-control-focus"> </div>
										</div>
                                         </div>
										
									</form> 
            <table class="table table-striped" ng-show="Question.ExamCollectionID>0">
                <tr>
                    <th>
                    Searched Question ({{AllQuestion.OnlyQuestion.length}})
                    </th>

                    <th> Action</th>
                </tr>
                <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                    <td> {{$index + 1}}]
                        <span style="padding: 1px; font-family: cursive; font-size: 14px;" class=""> {{Item.Question}} </span> 

                    </td>
                    <td> <input type="checkbox" class="form-control" ng-model="Item.Selected"  ng-true-value="true" ng-false-value="false"/></td>
                </tr>

            </table>

            <!--        <button class="pull-left btn btn-primary" style="margin-left:100px;" ng-hide="Question.StartFrom == 0" ng-click="PreviousSearch()">Previous </button>    
                    <button class="pull-right btn btn-primary" style="margin-right:100px;" ng-hide="Search == 0" ng-click="NextSearch()">Next </button> -->


        </div>
        <div class="col-md-7">
             
            <table class="table table-striped">
                
                <tr>
                    <td></td>
                     
                    <td>
                         <select class="form-control"  ng-model="QSubject" ng-change="SettedQuestionLenght(QSubject);"  ng-options="Q.QuestionSubject as Q.QSubject for Q in UniqueQuestionSubject">
							<option value="">Choose Option</option>
					    </select>
                    </td>
                    <td></td>
                      <td></td>
                </tr>
                <tr>
                    <th > <button class="btn btn-info pull-left" ng-click="SaveQuestionForExamCollection()">ADD</button></th>
                    <th colspan="2">Setted Question ({{SetQuestioncount}})</th>
                   
                    <th >
                        
                    </th>
                     <th>
                         
                     </th>

                    
                </tr>
                
                <tr ng-repeat="Item in AllSetQuestion | filter:{ QuestionSubject: QSubject }:true ">
                    <td> {{$index + 1}}] {{Item.Question}}  </td>
                    <td>{{Item.QSubject}}</td>
                    <td>{{Item.QType}}</td>
                    <td> <button class="btn" ng-click="DeleteSetQuestion(Item.SetQID)"> <i class="fa fa-remove" style="font-size:20px;color:red"></i></span></td>
                </tr>

            </table>
             <button class="btn btn-info" ng-click="SaveQuestionForExamCollection()">ADD</button>
        </div>
                                             
                                          </div>


        
																
									</div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->


      <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Auto Generated Question Set </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AutoGenerateQuestionSet()" />     
                    
                     <div class="form-group">
                       	<label>Question Set</label>
						<select class="form-control"  ng-model="All.ExamCollectionID" required ng-options="Question.Id as Question.ExamName+ '- Set: ('+Question.ExamCollection+')' for Question in QTypeAndQSubType.examcollectionListOnly">
							<option value="">Choose Option</option>
						</select>
                    </div>  
                    <div class="form-group">
                	<label> Subject Name</label> 
				    <ul>
                      <li ng-repeat="Question in QTypeAndQSubType.questionsubject">
                        <div class="row">
                             <div class="form-group col-md-4">
                                 <input type="hidden" model="Item.SetName"  />
                                <input type="checkbox"  ng-model="Question.QuestionSubject" ng-value="Question.Id" > {{Question.Name}}
                            </div>
                             <div class="form-group col-md-4">
                              	<select class="" ng-show="Question.QuestionSubject==true" ng-model="Question.QuestionType"  name="QuestionType" ng-options="Question.Id as Question.Type for Question in QTypeAndQSubType.questiontype">
									<option value="">Choose Option</option>
								</select>
                            </div>
                            <div class="form-group col-md-2">
                                <input ng-show="Question.QuestionSubject==true" type="text"  ng-model="Question.QNumber"/>
                            </div>
                        </div>
                      </li>
                    </ul>
                    				    
					</div>
				
                   
                 
                    <div class="form-group">

                        <button type="Submit" class="btn btn-danger" ="Create" id="Create"> Generate</button>
                    </div>
                    </form>
                     <table class="table table-striped">
                        <tr>
                            <th># </th>
                            <th>Question </th>
                            <th>Type</th>
                            <th>Complexity </th>
        
                            <th> Action</th>
                        </tr>
                        <tr ng-repeat="Item in AutoGeneratedQuestion">
                            <td> 
                            {{$index + 1}}]</td>
                            <td> {{Item.Question}}</td>
                            <td> {{Item.QuestionType}}</td>
                            <td> {{Item.QuestionType}}</td>
                            <td></td>
                        </tr>
                         <tr>
                            <th> </th>
                            <th> </th>
                            <th></th>
                            <th><button type="Submit" ng-show="AutoGeneratedQuestion.length>0" ng-click="SaveAutoGeneratedQuestion();" class="btn btn-info" ="Create" id="Create"> Save</button> </th>
        
                            <th> </th>
                        </tr>
                        

                    </table>
               
                    
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

    app.controller("CreateQuestionCtrl", ["$scope", "$http", 
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllExamTypeField();

            }
            function initialize() {
                
                $scope.reset=reset;
                $scope.LimitNumber = [5, 10, 20, 30];
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

                $scope.GetSetQuestionForExamCollection = GetSetQuestionForExamCollection;
                $scope.AllSetQuestion = [];

                $scope.SaveQuestionForExamCollection = SaveQuestionForExamCollection;
                $scope.DeleteSetQuestion=DeleteSetQuestion;
                
                $scope.GetUniqueQusetionSubjectFromAllSetQuestion=GetUniqueQusetionSubjectFromAllSetQuestion;
                $scope.UniqueQuestionSubject=[];
                
                $scope.SettedQuestionLenght=SettedQuestionLenght;
                $scope.SetQuestioncount =0;
                
                $scope.AutoGenerateQuestionSet=AutoGenerateQuestionSet;
                $scope.AutoGeneratedQuestion=[];
                
                $scope.SaveAutoGeneratedQuestion=SaveAutoGeneratedQuestion;
                
            }
            
            
            function AutoGenerateQuestionSet()
            {
                $scope.AutoGeneratedQuestion=[];
                $scope.All.QuestionInfo=$scope.QTypeAndQSubType.questionsubject;
               
                $scope.filteredItems = $scope.All.QuestionInfo.filter(function(item) {
                return item.QuestionSubject == true;
                });
                
                console.log($scope.All);
                
                if($scope.filteredItems.length>0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Exam/AutoGenerateQuestionSet/',
                      headers: {
                        'Content-Type': 'application/json'
                      },
                      data: JSON.stringify($scope.All)
                    }).success(function (data) {   
                        console.log(data);
                        
                        if(data==0){
                            swal("Question Set", "Already Exist Please Create an new question Set");
                        }
                        else
                        {
                            $scope.AutoGeneratedQuestion=data;
                           
                        // $('#myModal').modal('toggle');
                        //swal("Successfully", "Auto Generate Question Set");
                        }
                         
                         
                        
                    });
                }
                else
                {
                    swal("Select Question Type", "At least one Item will have to be selected");
                }
            }
            
            function SaveAutoGeneratedQuestion()
            {
                console.log($scope.AutoGeneratedQuestion);
                
                
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Exam/SaveAutoGeneratedQuestion/',
                      headers: {
                        'Content-Type': 'application/json'
                      },
                      data: JSON.stringify($scope.AutoGeneratedQuestion)
                    }).success(function (data) {   
                        
                         console.log(data);
                        
                        //$scope.AutoGeneratedQuestion=data;
                       $scope.reset();
                        $('#myModal').modal('toggle');
                        swal("Successfully", "Auto Generate Question Saved");
                        
                         
                    });
            }
            
            function SettedQuestionLenght(searchkey)
            {
                if(searchkey!=null)
                {
                console.log(searchkey);
                var items=$scope.AllSetQuestion;
                var filteredItems = items.filter(function(item) {
                    return item.QuestionSubject === searchkey;
                });
                
                $scope.SetQuestioncount = filteredItems.length;
                console.log($scope.SetQuestioncount);
                }
                else
                {
                     $scope.SetQuestioncount =$scope.AllSetQuestion.length;
                }
            }

            function GetSearchQuestion()
            {
                console.log($scope.Question);
                $scope.AllQuestion = [];
                $http({
                    method: 'POST',
                    url: baseUrl + 'Exam/GetSearchQuestionForSetCollection/',
                    data: $scope.Question
                }).success(function (data) {
                    $scope.AllQuestion = data;
                    if($scope.Question.ExamCollectionID>0)
                    {
                       GetSetQuestionForExamCollection();
                    }
                  GetUniqueQusetionSubjectFromAllSetQuestion($scope.AllSetQuestion);
                    
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

            function GetSetQuestionForExamCollection()
            {
                var id = $scope.Question.ExamCollectionID;
//       set Question.ExamCollectionID for all Question

                angular.forEach($scope.AllQuestion.OnlyQuestion, function (Q) {
                    Q.ExamCollectionID = $scope.Question.ExamCollectionID;
                    Q.Selected=false;
                });
                //console.log($scope.AllQuestion.OnlyQuestion);

                $scope.AllSetQuestion = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetSetQuestionForExamCollection/' + id
                }).success(function (data) {
                    $scope.AllSetQuestion = data;
                    
                    //find unique data
                    
                GetUniqueQusetionSubjectFromAllSetQuestion($scope.AllSetQuestion);
                SettedQuestionLenght(null);
                

                    
                });
            }
            
            function GetUniqueQusetionSubjectFromAllSetQuestion(array)
            {
                    // New array to hold unique values
                    
            var items=array;

            var uniqueItems = items.filter(function(item, index, self) {
            return index === self.findIndex(function(t) {
                return t.QuestionSubject === item.QuestionSubject;
            });
            });
                
                console.log(uniqueItems);
                $scope.UniqueQuestionSubject=uniqueItems;
            }

            function SaveQuestionForExamCollection()
            {

                console.log($scope.AllQuestion.OnlyQuestion);
                $http({
                    method: 'POST',
                    url: baseUrl + 'Exam/SaveQuestionForExamCollection/',
                    data: $scope.AllQuestion.OnlyQuestion
                }).success(function (data) {
                   
                    GetSetQuestionForExamCollection();
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
                    
                    GetUniqueQusetionSubjectFromAllSetQuestion($scope.AllSetQuestion);
                }
            }
            
             function reset()
            {
                $scope.All=[];
                $scope.AutoGeneratedQuestion=[];
               
            }
        }]);
</script>