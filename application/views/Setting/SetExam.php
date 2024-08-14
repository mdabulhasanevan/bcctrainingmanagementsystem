
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
                          <!--   <h5>প্রত্যেক ব্যাচের পরীক্ষা নেয়ার আগে নতুন করে প্রশ্ন সেট, ব্যাচ,  স্টেটাস  এবং টাইম  অ্যাড করুন। এডিট, ডিলিট  করার আগে সতর্কতা জরুরি।  </h5>

                                <h6>ডিফল্ট স্ট্যাটাস ইনএক্টিভ রাখুন। পরীক্ষের শুরুর আগে একটিভ করুন এবং পরীক্ষের পর এক্সএমড </h6>-->
                                
                                <b>Current IP: {{MyIPAddress}}</b>

                        </div>

                        <div class="card-body">
                              <div class="table-responsive">
                                       
                           <div class="form-group">
                                <label for="Exam" >Batch Name</label>  <span class="pull-right">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> পরিক্ষা সেট করুন</button>
                                    </span>
                                <select class="form-control"  ng-model="Question.BatchID2" required  name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                                    <option value="">Choose Option</option>
                                </select>
                            </div>
                            <table class="table table-striped">
                                <tr>
                                <th>SN</th>
                                <th> ব্যাচ  </th>   
                                
                                <th> পরিক্ষার বিষয় - প্রশ্নর সেট </th>
                                <th> পরিক্ষার তারি- সময় </th>
                                <th>MCQ-Theory-Practical </th>
                                 <th>IP Checker </th>
                                 <th>Status </th>
                                 <th>Result Detail </th>
                                  <th>Template </th>
                                  
                                 
                                <th>Action </th>
                            </tr>
                                 <tr ng-repeat="Batch in AllBatchandQuestionSet | filter:{ BatchID: Question.BatchID2 }:true">
                                     
                                <th>{{$index + 1}}          </th>
                               <th>{{Batch.BatchName}}      </th>
                                <td>{{Batch.ExamName}} <b>-Set:</b> {{Batch.ExamCollection}}  <br><b>Type:</b> {{Batch.ExamTypeName}}</td>
                                <td>{{Batch.ExDate}}    <br> <b>Time:</b>{{Batch.Time}}  min        </td>
                                 <td>{{Batch.MCQMarks}} <b>- {{Batch.TheoryMarks}} -</b> {{Batch.PracticalMarks}}</td>
                                  <th>{{Batch.IPCheckActivation}}</th>
                                <td>
                                 <select class=""  ng-model="Batch.Status" ng-change="ChangeExamStatus(Batch.Status,Batch.SetID);"  name="Status" ng-options="Question.ID as Question.Status for Question in BatchabdExamCollection.status">
                                    <option value="">Choose</option>
                                </select>
                                </td>
                                <td>
                                    <span ng-show="Batch.ResultView==0">Hide</span>
                                    <span ng-show="Batch.ResultView==1">Show</span>
                                    
                                </td>
                                
                                <td> 
                                    <span ng-show="Batch.QuestionTemplate==1">All Questions are in one page</span>
                                    <span ng-show="Batch.QuestionTemplate==2">Slide View</span>
                                     <span ng-show="Batch.QuestionTemplate==3">Gaming</span>
                                </td>
                                
                                <td>
                                     
                                      <button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" ng-click="Edit(Batch)" title="Edit" >Edit</button>
                                     <button  class="btn btn-danger btn-sm" ng-click="DeleteSetExam(Batch.SetID)" title="Delete" >Delete</button>
                                      <button  ng-show="Batch.Submit==0" class="btn btn-primary btn-sm" title="Add Absent students into database " ng-click="AbsentStudentAutoAddIntoDatabase(Batch.BatchID, Batch.ExNId)" > DB</button>
                                   
                                </td>
                            
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Set New Exam Info</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddBatchandExamcollectionSet()" />                   
                    <div class="form-group">
                        <label for="Exam" >Batch Name</label>
                        <select class="form-control"  ng-model="Question.BatchID" required  name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >Exam Type</label>
                        <select class="form-control"  ng-model="Question.ExamType" required name="ExamCollectionID" ng-options="Question2.ETID as Question2.TypeName for Question2 in BatchabdExamCollection.ExamType">
                            <option value="">Choose Option</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >Module Name</label>
                        <select class="form-control"  ng-model="Question.ExamNameID" required  name="BatchID" ng-options="Question.ExNId as Question.ExamName for Question in BatchabdExamCollection.ExamName">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="Exam" >Question Set</label>
                        <select class="form-control"  ng-model="Question.ExamCollectionID" required name="ExamCollectionID" ng-options="Question2.Id as Question2.ExamCollection for Question2 in BatchabdExamCollection.examcollection | filter: { ExamNameID: Question.ExamNameID }">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="Exam" >Exam Name</label>
                        <input class="form-control" ng-model="Question.ExamName" required name="Exam"/>
                    </div>-->
                    
                    <div class="form-group">
                        <label for="Exam" >Time(min)</label>
                        <input class="form-control" ng-model="Question.Time" required  name="Exam"/>
                    </div>

                    <div class="form-group">
                        <label for="Exam" >MCQ Marks</label>
                        <input class="form-control" ng-model="Question.MCQMarks" required  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Theory Marks</label>
                        <input class="form-control" ng-model="Question.TheoryMarks" required  name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Practical Marks</label>
                        <input class="form-control" ng-model="Question.PracticalMarks" required name="Exam"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >Ex. Date</label>
                      
                         <input class="form-control" ng-model="Question.ExDate" id="datepickerEx"   name="DOB" />
                    </div>
                    
                    <span class="btn-sm btn btn-primary" ng-click="Question.IPCheckActivation=MyIPAddress">Your Current IP: {{MyIPAddress}}</span> Click to Set
                    <div class="form-group">
                        <label for="Exam" >IP Check Active (To use multiple IP please use comma)</label>
                        <input class="form-control" ng-model="Question.IPCheckActivation"  name="Exam"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Status</label>
                        <select class="form-control" ng-init="Question.Status = '2'"  ng-model="Question.Status"  name="Status" ng-options="Question.ID as Question.Status for Question in BatchabdExamCollection.status">
                            <option value="">Choose Option</option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" > Will Student see the Detail Result?</label>
                        <select class="form-control" ng-init="Question.ResultView = '0'"  ng-model="Question.ResultView"  name="ResultView" >
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" > Question Template</label>
                        <select class="form-control" ng-init="Question.ResultView = '0'"  ng-model="Question.QuestionTemplate"  name="QuestionTemplate" >
                            <option value="1">All Questions are in one page</option>
                            <option value="2">One Question will show at a time (Slide View)</option>
                             <option value="3">One Question will show at a time (Gaming View)</option>
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
</div>
</div>
</body>
</html>




<script type="text/javascript">
       
       $(function () {
            $("#datepickerEx").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100y:c+nn',
                maxDate: '+365d'
            });
        });
       

app.controller("DefaultCtrl", ["$scope", "$http",
function ($scope, $http) {
    init();
    function init() {
        initialize();
        GetAllBatchandQuestionSet();
        GetAllBatchandExamCollectionField();
        GetIPAddress();
    }
    function initialize() {
        $scope.AllBatch = [];
        $scope.DeleteSetExam = DeleteSetExam;
        $scope.AddBatchandExamcollectionSet = AddBatchandExamcollectionSet;
        $scope.AbsentStudentAutoAddIntoDatabase=AbsentStudentAutoAddIntoDatabase;
        
        $scope.GetIPAddress=GetIPAddress;
        
        $scope.ChangeExamStatus=ChangeExamStatus;
        
        $scope.Batch = {};
        $scope.Edit = Edit;
        $scope.reset = reset;

        $scope.Question = {};
        
       // $scope.MyIPAddress="1";

    }
    
    function GetIPAddress()
    {
          $.get("https://ipinfo.io", function(response) {
           // alert(response.ip);
             $scope.MyIPAddress=response.ip;
             console.log($scope.MyIPAddress);
             //alert($scope.MyIPAddress);
        }, "json")
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
    
    function ChangeExamStatus(Status, SetID)
    {
        
        var r = confirm("Do you want to Change Status!");
        if (r == true) {
            $http({
                method: 'GET',
                url: baseUrl + 'Setting/ChangeExamStatus/' + Status+'/'+SetID
            }).then(function successCallback(response) {
                swal("Status!!", "Change Successfully!!");
                 GetAllBatchandQuestionSet();
            }, function errorCallback(response) {
                swal("Status!", "Not Changed!!!!");
            });

        }

      
    }
    
      function AbsentStudentAutoAddIntoDatabase(Bid,xm)
    {
        var BId = Bid;
         var xmId = xm;
        
        console.log(BId,xmId);
        
        var r = confirm("Do you want to add Absent Students into Database!");
        if (r == true) {
            $http({
                method: 'GET',
                url: baseUrl + 'Setting/AbsentStudentAutoAddIntoDatabase/' + BId+'/'+xmId
            }).then(function successCallback(response) {
                swal("Absent Students!!", "add Absent Students Successfully!!");
                 GetAllBatchandQuestionSet();
            }, function errorCallback(response) {
                swal("Batch!", "Not add Absent Students!!!!");
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
        $scope.Question = {};
    }

}]);
</script>



     
