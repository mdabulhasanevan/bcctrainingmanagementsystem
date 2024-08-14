<div class="content-page" ng-controller="DefaultCtrl"  >
<!-- Start content -->
<div class="content" >
    
    <div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">  Exam History   </h1>
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
	
   			 
                <span class="fa-2x mr-2 fas fa-print pull-right" id='print'  >Print</span>
                 <a class="btn btn-info pull-left btn-sm" href="<?php echo base_url(); ?>/Setting/SetExam"><span class=""> </span> পরীক্ষা সেটআপ করুন</a>
              

            Batch Name: <b>{{BatchName}}</b> &nbsp; &nbsp;
            Exam Name: <b>{{ExamModule}}</b> &nbsp; &nbsp;

		</div>
        
        <div class="card-body">
            
        <div class="table-responsive">
         <div class="row">	    	    
		    <div class="col-md-3">
            <div class="form-group">
                <label for="Exam" >Batch Name</label>
               <!-- <select class="form-control" id="BatchNameOpt"  ng-model="Student2.BatchID" ng-change="GetAllStudent(Student2.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>-->
                
                 <select class="form-control" id="BatchNameOpt"  ng-model="Student2.BatchID" ng-change="GetAllExam(Student2.BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                    <option value="">Choose Option</option>
                </select>
                
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label for="Exam" >Exam Module</label>
                <select class="form-control" id="ExamModule" ng-model="Student2.ExamModule"   name="ExamModule" ng-change="GetAllStudent(Student2.BatchID, Student2.ExamModule)"  ng-options="Question.ExNId as Question.ExamName+'  ('+ Question.ExamCollection +')' for Question in AllExam | filter:{BatchID:Student2.BatchID}:true">
                    <option value="">Choose Option</option>
                </select>
            </div>
            </div>
             <!-- <div class="form-group col-md-3">
                <label for="Exam" >Exam Question Set</label>
                <select class="form-control" id="ExamCollectionopt" ng-model="Student2.ExamCollection" ng-change="GetOptionValueName(Student2.ExamCollection)"  name="ExamCollectionopt"  ng-options="Question.ExamCollection as Question.ExamCollection for Question in BatchabdExamCollection.examCollectionForResultHistory | filter:{BatchID:Student2.BatchID}:true">
                    <option value="">Choose Option</option>
                </select>
            </div>-->
             <div class="col-md-3">
            <div class="form-group">
                <label for="Exam" >Reg No</label>
                <input class="form-control" type="text" ng-model="Student2.RegNO"/>
            </div>
            </div>
            
        <!--    <button class="form-group col-md-3 mb-3 glyphicon glyphicon-refresh" ng-click="GetAllStudent(Student2.BatchID)" >Reload</button>-->
        
          <!--  Qusetion Set: <b>{{ExamCollectionopt}}</b>-->
            <table class="table table-striped">
                <caption style="caption-side:top; text-align:right; padding:10px; "> <b> Total {{AllStudent.Analysis.Percentage | number:2}}% Answer's are Correct </b> <span class="btn btn-success btn-sm" style="cursor: pointer;"  data-toggle="modal" data-target="#analysis"   >Analysis</span></caption>
                
              
                <tr>
                    <th>SN</th>
                    <th> Name </th>
                    <th> RegNo </th>
    <!--                <th> BatchID</th>-->
                    <!--<th>Date </th>-->
                   
                    <!-- <th> Exam Name </th>-->
                   <!--   <th> Q. Set </th>-->
                    <th> Total </th>
                    <th> Selected </th>
                    <th>Correct </th>
                    <th>MCQ </th>
                    <th>Theory </th>
                    <th>Practical </th>
                    <th>Total  </th>
                    <th>Status </th>
                    <th>Action </th>
    
                </tr>
                <tr ng-repeat="Student in AllStudent.Result| filter:{ExamCollection:Student2.ExamCollection}| filter:{RegNO:Student2.RegNO}">
                    <td>{{$index + 1}} </td>
                    <td>{{Student.Name}} </td>
                    <td>{{Student.RegNO}} </td>
    <!--                <td>{{Student.Batch}} </td>-->
                    <!--<td>{{Student.ExamDate}} </td>-->
                  <!--  <td>{{Student.ExamName}} </td>-->
                   <!-- <td>{{Student.ExamCollection}} </td>-->
                    <td>{{Student.TotalQuestion}} </td>
                    <td>{{Student.Selected}} </td>
                    <td>{{Student.Correct}} </td>
                    <td>{{Student.MCQMarksGet|number:2}} </td>
                    <td>{{Student.Theory}} </td>
                    <td>{{Student.Practical}} </td>
                    <td><span style="color: red; text-decoration: underline;" ng-show="Student.totalAmount<40" >   {{Student.totalAmount|number:2}} </span> <span style="color: green" ng-show="Student.totalAmount>=40" >   {{Student.totalAmount|number:2}} </span> </td>
                    <td> <span ng-show="Student.Attendance=='Absent'" style="color:red" >{{Student.Attendance}} </span> 
                    <span ng-show="Student.Attendance=='Present'" style="color:green" >{{Student.Attendance}} </span> 
                    </td>
                    <td  ng-hide="isHide == 1">
                         <span class="btn btn-warning btn-sm" style="cursor: pointer;"  data-toggle="modal" data-target="#DetailResult" ng-click="OpenDetail(Student)"  >Detail Result</span>
                        <span class="btn btn-primary btn-sm" style="cursor: pointer;"  data-toggle="modal" data-target="#myModal" ng-click="Edit(Student)"  >Edit</span>
                       <span class="btn btn-danger btn-sm" style="cursor: pointer;"  ng-click="DeleteStudent(Student.ERId)" >Delete</span>
    
                    </td>
                </tr>
            </table>
            <h5 class="col-md-12">Followings are Absent in This Exam</h5>
              <table class="table table-striped">
                <tr>
                    <th>SN</th>
                    <th> Name </th>
                    <th> RegNo </th>
                   <th> Mobile</th>
              
    
                </tr>
                <tr ng-repeat="StudentAB in AllStudent.Absent">
                    <td>{{$index + 1}} </td>
                    <td>{{StudentAB.Name}} </td>
                    <td>{{StudentAB.RegNO}} </td>
                    <td>{{StudentAB.Mobile}} </td>
    
                </tr>
            </table>
        </div>
                           
               
                </div>
            </div>
        </div>
        </div>
    </div>    



    <!-- Edit Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Edit Result</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                        <div class=""> 
                            <h5>Automation MCQ, Theory and Practical Marks</h5>
                             <label>MCQ :</label> {{Student3.MCQMarks * Student3.Correct / Student3.TotalQuestion}} 
                            <label>Theory :</label> {{Student3.TheoryMarks * Student3.Correct / Student3.TotalQuestion}} 
                            <label>Practical :</label> {{Student3.PracticalMarks * Student3.Correct / Student3.TotalQuestion}} 
                               <label>Total :</label> {{(Student3.MCQMarks * Student3.Correct / Student3.TotalQuestion)+(Student3.TheoryMarks * Student3.Correct / Student3.TotalQuestion)+(Student3.PracticalMarks * Student3.Correct / Student3.TotalQuestion)}} <br>
                        </div>
                    <br>
                    <form name="SOSForm" ng-submit="UpdateResult()" />                   
                
                    
                    
                    <div class="form-group">
                        <label for="Exam" >Correct ON {{Student3.TotalQuestion}}</label>  ({{Student3.MCQMarks}}%)
                        <input class="form-control" ng-model="Student3.Correct"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Theory</label>({{Student3.TheoryMarks}}%)
                        <input class="form-control" ng-model="Student3.Theory"  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Practical</label>({{Student3.PracticalMarks}}%)
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

     <!-- Modal for result List individual detail -->
       <div class="modal fade" id="DetailResult" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">              
                       <h4> উত্তরপত্র   ({{StudentNameAndReg}})</h4>
                       <button type="button" ng-click="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                     </div>

               <div class="modal-body" >

                 <table class="table table-striped">
                        <tr>
                            <th>Question </th>
                            <th>Your Answer </th>
                            <th>Status </th>

                        </tr>
                        <tr ng-repeat="Item in AllStudent.DetailResult | filter:{UserID:StudentID}">
                            
                            <td> {{$index + 1}}]  <span style="padding: 5px; font-family: cursive; font-size: 12px;" class=""> {{Item.Question}} </span> </td>
                            <td>
                                <span style="font-weight: bold;">
                                    <span ng-show="Item.Answer == 1" style="padding: 3px; font-family: cursive; font-size: 12px;"  class="bg-success text-white"> {{Item.MCQ}}</span>
                                    <span ng-show="Item.Answer == 0" style="padding: 3px; font-family: cursive; font-size: 12px;"  class="bg-danger text-white"> {{Item.MCQ}}</span>
                                </span>
                            </td>
                                  
                            <td>
                                  <span class="far fa-thumbs-up" ng-show="Item.Answer == 1"> </span> 
                                    <span class="fas fa-times" ng-show="Item.Answer == 0"> </span>
                            </td>
                        </tr>
                       


                    </table>
                </div>
                <div class="modal-footer">
                   <!-- <button type="button" class="btn btn-danger" ng-click="ResetAll()" data-dismiss="modal">  এখানে  ক্লিক করুন (বাধ্যতামূলক ) </button>-->

                </div>
            </div>
        </div>
    </div>

     <!-- Modal for result analysis with detail -->
       <div class="modal fade" id="analysis" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">              
                       <h4> Analysis</h4>
                       <button type="button" ng-click="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                     </div>

               <div class="modal-body" >
                 <table class="table table-striped">
                     <caption style="caption-side:top; text-align:left; padding:10px; font-size:20px; font-weight:bold; "> Subject Wise Answer and Percentage </caption>
                        <tr>
                            
                            <th>SubjectName</th>
                            <th>Correct </th>
                            <th>Incorrect </th>
                            <th>Percentage </th>

                        </tr>
                         <tr ng-repeat="Item in AllStudent.AnalysisQuestionSubjectWise">
                            
                                  
                            <td>
                                  <span style="font-weight: bold;">
                                    <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.SubjectName}}</span>
                                   
                                </span>
                            </td>
                             <td>
                                  <span style="font-weight: bold;">
                                    <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.Correct}}</span>
                                   
                                </span>
                            </td>
                            <td>
                                  <span style="font-weight: bold;">
                                 <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.Incorrect}}</span>
                                   
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold;">
                                    <span  style="padding: 3px;  font-size: 12px;"  class="badge"> {{Item.Percentage | number : 2}}%</span>
                                   
                                </span>
                            </td>
                        </tr>
                </table>    
                
                
                 <table class="table table-striped">
                     <caption style="caption-side:top; text-align:left; padding:10px; font-size:20px; font-weight:bold; "> Question Wise Answer and Percentage </caption>
                        <tr>
                            <th>Question </th>
                            <th>SubjectName</th>
                            <th>Correct </th>
                            <th>Incorrect </th>
                            <th>Percentage </th>

                        </tr>
                        <tr ng-repeat="Item in AllStudent.AnalysisDetail">
                            
                            <td> {{$index + 1}}]  <span style="padding: 5px;  font-size: 12px;" class=""> {{Item.Question}} </span> </td>
                            
                                  
                            <td>
                                  <span style="font-weight: bold;">
                                    <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.SubjectName}}</span>
                                   
                                </span>
                            </td>
                             <td>
                                  <span style="font-weight: bold;">
                                    <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.Correct}}</span>
                                   
                                </span>
                            </td>
                            <td>
                                  <span style="font-weight: bold;">
                                 <span style="padding: 3px;  font-size: 12px;"  class=""> {{Item.Incorrect}}</span>
                                   
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold;">
                                    <span  style="padding: 3px;  font-size: 12px;"  class="badge"> {{Item.Percentage | number : 2}}%</span>
                                   
                                </span>
                            </td>
                        </tr>
                       


                    </table>
                </div>
                <div class="modal-footer">
                   <!-- <button type="button" class="btn btn-danger" ng-click="ResetAll()" data-dismiss="modal">  এখানে  ক্লিক করুন (বাধ্যতামূলক ) </button>-->

                </div>
            </div>
        </div>
    </div>



    <!-- print modal Modal -->
    <div class="modal fade" id="myPrintModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Print Result</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body print_history_div">

                    <h2 style="text-align: center;"> Bangladesh Computer Council</h1>            
                    <h3 style="text-align: center;">Regional Office <br> Barishal.</h3> <hr>
                <h3 style="text-align: center;">Batch wise Result</h3>
                 Batch Name: <b>{{BatchName}}</b> &nbsp; &nbsp;
                    Exam Name: <b>{{ExamModule}}</b> &nbsp; &nbsp;
                
                    <table class="table table-striped" style="font-size:13px;">
                        <tr>
                            <th>SN</th>
                            <th> Name </th>
                            <th> RegNo </th>
            <!--                <th> BatchID</th>-->
                            <!--<th>Date </th>-->
                            <!--<th> Exam Set </th>-->
                            <th> Total </th>
                            <th> Selected </th>
                            <th>Correct </th>
                            <th>MCQ </th>
                            <th>Theory </th>
                            <th>Practical </th>
                            <th>Total </th>


                        </tr>
                           <tr ng-repeat="Student in AllStudent.Result| filter:{ExamCollection:Student2.ExamCollection}| filter:{RegNO:Student2.RegNO}">
                            <td>{{$index + 1}} </td>
                            <td>{{Student.Name}} </td>
                            <td>{{Student.RegNO}} </td>
            <!--                <td>{{Student.Batch}} </td>-->
                            <!--<td>{{Student.ExamDate}} </td>-->
                            <!--<td>{{Student.ExamCollection}} </td>-->
                            <td>{{Student.TotalQuestion}} </td>
                            <td>{{Student.Selected}} </td>
                          <td>{{Student.Correct}} </td>
                             <td>{{Student.MCQMarksGet|number:2}} </td>
                            <td>{{Student.Theory}} </td>
                            <td>{{Student.Practical}} </td>
                            <td><span style="color: red; text-decoration: underline;" ng-show="Student.totalAmount<40" >   {{Student.totalAmount|number:2}} </span> <span style="color: black" ng-show="Student.totalAmount>=40" >   {{Student.totalAmount|number:2}} </span> </td>

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
                $scope.isHide = 0;
                $scope.KeepHideWhenPrint = KeepHideWhenPrint;

                $scope.AllStudent = [];
                $scope.AllExam = [];
                $scope.DeleteStudent = DeleteStudent;

                $scope.Student = {};
                $scope.Student2 = {};
                $scope.Student3 = {};

                $scope.reset = reset;
                $scope.GetAllStudent = GetAllStudent;
                $scope.GetAllExam=GetAllExam;
                
                $scope.OpenDetail=OpenDetail;
                
                $scope.UpdateResult = UpdateResult;
                $scope.Edit = Edit;

               // $scope.GetOptionValueName = GetOptionValueName;
                $scope.ExamNameShow="";
                
                $scope.StudentID=0;
                
                $scope.Search={};

            }
            
            function OpenDetail(Student)
            {
                $scope.StudentNameAndReg=Student.Name+' - Reg('+Student.RegNO+')';
                 
                 $scope.StudentID=0;
                $scope.StudentID=Student.UserID;
                //console.log($scope.StudentNameAndReg);
            }
            
            function KeepHideWhenPrint()
            {
                $scope.isHide = 1;
                //$('#isHideBtn').css("display", "none");
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

            


            function GetAllExam(x)
            {
              $scope.AllStudent = [];
              $scope.AllStudent.Result = [];
              $scope.AllStudent.Absent = [];
              $scope.AllStudent.DetailResult = [];
              
                $scope.AllExam = [];
                
                var BID = x;
                
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamByBatchID/' + BID
                }).then(function successCallback(response) {
                    $scope.AllExam = response.data;
                    $scope.AllStudent = [];
                }, function errorCallback(response) {
                });
            }


            function GetAllStudent(x,ExamModule)
            {
                $scope.ExamModule = $("#ExamModule option:selected").text();
                
                $scope.Student2.ExamCollection = "";
                $scope.Student2.RegNO = "";

                var BatchName = $("#BatchNameOpt option:selected").text();
                $scope.BatchName = BatchName;


               
                var BID = x;
                var ExamModule=ExamModule;
                
                $scope.Search.BID=x;
                $scope.Search.ExamModule=ExamModule;
                
                console.log(ExamModule);
                
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamHistory/' + BID+'/'+ExamModule
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    //console.log($scope.AllStudent);
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
                       GetAllStudent($scope.Search.BID, $scope.Search.ExamModule);
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
                        GetAllStudent($scope.Search.BID, $scope.Search.ExamModule);
                       
                        //$scope.Batch = {};
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