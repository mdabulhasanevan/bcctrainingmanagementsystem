<div class="content-page" ng-controller="DefaultCtrl">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> <?php echo $Title;  ?> </h1>
            <ol class="breadcrumb float-right">
              <li class=""> <?php echo $_SERVER['REQUEST_URI']; ?> </li>
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
                <i class="far fa-copy"></i> <?php  echo $Title;  ?>
              </h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="col-md-12">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="Exam">Batch Name</label>
                      <select class="form-control" ng-model="BatchID" ng-change="GetAllBatchSchedule(BatchID)" name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                        <option value="">Choose Option</option>
                      </select>
                    </div>
                  </div>
                  
                 
                  
                  <!--Total:{{AllSchedule.length }}-->
                  <table class="table table-striped">
                       <button class="btn btn-danger float-right" ng-click="AddSchedule()">Save</button>
                    <tr>
                      <th>Class</th>
                      
                      <th> Subject  </th>
                      <th> Topic </th>
                      <th> Date </th>
                      
                      <th> Lab </th>
                      <th>Trainer </th>
                     
                    </tr>
                    <tr ng-repeat="Schedule3 in AllSchedule">
                       <th>{{Schedule3.Day}} </th>
                      <td>{{Schedule3.TopicName}} </td>
                      <td>{{Schedule3.SubjectDetail}} </td>
                      <td> <input type="text" datepicker ng-model="Schedule3.DateTime"  /></td>
                      
                      <td>  
                        <select class=""  ng-model="Schedule3.Lab" class="form-control"   required ng-options="Question.LabID as Question.LabName for Question in BatchabdExamCollection.LabList">
                          <option value="">Choose Option</option>
                        </select> 
                            
                      </td>
                      
                       <td>
                       <select class=""  ng-model="Schedule3.Trainer" class="form-control"   required ng-options="Question.Id as Question.Name+ ' ('+ Question.PostName+')'  for Question in BatchabdExamCollection.TrainerList">
                          <option value="">Choose Option</option>
                        
                        </select> 
                        
                        </td>
                      
                      
                    </tr>
                    
                    
                  </table>
                    <button class="btn btn-danger float-right" ng-click="AddSchedule()">Save</button>
                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript">

                 $(function () {
                    $(".StartDate").datetimepicker({
                        dateFormat: 'yy-mm-dd',
                        
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+365d'
                        
                    });
                    
                    
                });

  app.controller("DefaultCtrl", ["$scope", "$http",
    function($scope, $http) {
      init();

      function init() {
        initialize();
        // GetAllBatchSchedule();
        GetAllBatchandExamCollectionField()
      }

      function initialize() {
        $scope.AllSchedule = [];
        $scope.DeleteSchedule = DeleteSchedule;
        $scope.AddSchedule = AddSchedule;
        $scope.Schedule = {};
        $scope.Edit = Edit;
        $scope.reset = reset;
        $scope.GetAllBatchSchedule = GetAllBatchSchedule;
        $scope.BatchID = 0;
      
        $scope.Schedule3 = {};
      }

      function GetAllBatchandExamCollectionField() {
        $http({
          method: 'GET',
          url: baseUrl + 'Exam/GetAllExamTypeField/'
        }).then(function successCallback(response) {
          $scope.BatchabdExamCollection = response.data;
        }, function errorCallback(response) {});
      }

      function GetAllBatchSchedule(x) {
        $scope.AllSchedule = [];
        var BID = x;
       
        $http({
          method: 'GET',
          url: baseUrl + 'Student/GetAllBatchSchedule/' + BID
        }).then(function successCallback(response) {
          $scope.AllSchedule = response.data;
          console.log($scope.AllSchedule);
        }, function errorCallback(response) {});
      }

      function DeleteSchedule(id) {
        var SId = id;
        var r = confirm("Do you want to Delete!");
        if (r == true) {
          $http({
            method: 'GET',
            url: baseUrl + 'Schedule/DeleteSchedule/' + SId
          }).then(function successCallback(response) {
            swal("Schedule!!", "Deleted Successfully!!");
            GetAllBatchSchedule($scope.BatchID);
          }, function errorCallback(response) {
            swal("Schedule!", "Not Deleted!!!!");
          });
        }
      }

      function AddSchedule() {
        console.log($scope.AllSchedule);
        $scope.BID = $scope.BatchID;
        $http({
          method: 'POST',
          url: baseUrl + 'Student/AddSchedule/',
          headers: {
            'Content-Type': 'application/json'
          },
          data: JSON.stringify($scope.AllSchedule)
        }).success(function(data) {
          //                      $scope.Schedule = {};
          GetAllBatchSchedule($scope.BID);
          swal(data, "Schedule");
        });
      }

      function Edit(Schedule) {
        $scope.Schedule = {};
        $scope.Schedule = Schedule;
      }

      function reset() {
        $scope.Schedule = {};
      }
    }
  ]);
</script>