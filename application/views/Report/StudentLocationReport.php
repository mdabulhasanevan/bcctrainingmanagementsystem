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
              <span class="pull-right"></span>
              <h3>
                <i class="far fa-copy"></i> <?php  echo $Title;  ?>
              </h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="Exam">From</label>
                    <select class="form-control" ng-model="Year.SessionStart" id="StartYear" required name="SessionStart" ng-options="Question.SID as Question.CalenderYear for Question in BatchabdExamCollection.Session">
                      <option value="">Choose Option</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Exam">To</label>
                    <select class="form-control" ng-model="Year.SessionEnd" required id="EndYear" name="SessionEnd" ng-options="Question.SID as Question.CalenderYear for Question in BatchabdExamCollection.Session">
                      <option value="">Choose Option</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <br>
                    <button ng-click="GetStudentLocationReport()" class="btn btn-info">Search</button>
                  </div>
                   <div class="form-group col-md-2">
                    <label for="Exam">Districts</label>
                    <select class="form-control" ng-model="DistrictNameSearch"  ng-options="Question.name as Question.name for Question in BatchabdExamCollection.districts | orderBy:'name'">
                      <option value="">Choose Option</option>
                    </select>
                  </div>
                </div>
                
                <div col-md-3>
                  <img id="LoadingID" src="
				<?php echo base_url('dist/img/loading2.gif') ?>" style="display:none; " />
                </div>
                
                <div class="col-md-12 ">
                  <span class="fa fa-print" id='printDuration' style="cursor: pointer;"></span>
                  <a href="javascript: genPdf()"> PDF</a>
                </div>
                
            <div class="row myPrintDuration">  
              
             
                <div class="col-md-6 " id="HTMLtoPDF" ng-show="Show==1">
                  <h4 style="text-align: center;"> Bangladesh Computer Council </h4>
                    <h5 style="text-align: center; padding-top:0px; margin-top:-5px;"> Information and communication Technology Division</h5>
                    <h6 style="text-align: center;">Regional Office , Barishal.</h6>
                    <hr>
                    <h6 style="text-align:center;">
                      <b> Report ( District wise Report </b>) <br>within {{StartYear}} to {{EndYear}}
                    </h6>
                     <h6>Total: {{AllBatch.Total.DivisionCount}} Divisions, {{AllBatch.Total.DistrictCount}} Districts, {{AllBatch.Total.upazilaCount}} Upazilas,  {{AllBatch.Total.StudentCount}} Students </h6>
                 
                    <table class="table table-striped">
                      <tr>
                        <th>SN</th>
                        <th>Division</th>
                        <th> District Name </th>
                        <th> Count </th>
                      </tr>
                      <tr ng-repeat="Batch in AllBatch.District | filter :{DistrictName:DistrictNameSearch}">
                        <td>{{$index + 1}} </td>
                        <td>{{Batch.DivisionName}}</td>
                        <td>{{Batch.DistrictName}} </td>
                        <td>{{Batch.DistrictCount}} </td>
                      </tr>
                     
                    </table>
                    <br>
                    <br>
                   
                </div>
                
                 <div class="col-md-6 " id="HTMLtoPDF" ng-show="Show==1">
                  <h4 style="text-align: center;"> Bangladesh Computer Council </h4>
                    <h5 style="text-align: center; padding-top:0px; margin-top:-5px;"> Information and communication Technology Division</h5>
                    <h6 style="text-align: center;">Regional Office , Barishal.</h6>
                    <hr>
                    <h6 style="text-align:center;">
                      <b> Report ( Upazila wise Report </b>) <br>within {{StartYear}} to {{EndYear}}
                    </h6>
                    <table class="table table-striped">
                      <tr>
                        <th>SN</th>
                         <th> District Name </th>
                        <th> Upazila Name </th>
                        <th> Count </th>
                      </tr>
                      <tr ng-repeat="Batch in AllBatch.Upazila | filter :{DistrictName:DistrictNameSearch}">
                        <td>{{$index + 1}} </td>
                        <td>{{Batch.DistrictName}} </td>
                        <td>{{Batch.UpazilaName}} </td>
                        <td>{{Batch.UpazilaCount}} </td>
                      </tr>
                     
                    </table>
                    <br>
                    <br>
                    <p style="text-align:Right;">N.T: Auto Generated by BCC System</p>
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
              GetAllBatchandExamCollectionField();
            }
            function initialize() {
                $scope.AllBatch = [];
              
                $scope.Batch = {};
                $scope.Month={};
                $scope.Show=0;
                $scope.reset=reset;
                
                $scope.GetStudentLocationReport=GetStudentLocationReport;
                
               
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
            function GetStudentLocationReport(){
                
                $("#LoadingID").css("display", "block");
                
                var YearFrom=$scope.Year.SessionStart;
                var YearTo=$scope.Year.SessionEnd;
                
                $scope.StartYear=$("#StartYear option:selected").text();
                $scope.EndYear=$("#EndYear option:selected").text();
               
               console.log(YearFrom+" "+ YearTo);
              
                
                $scope.AllBatch = [];
                $http({ 
                    method: 'GET',
                    url: baseUrl + 'Report/GetStudentLocationReport/'+YearFrom+'/'+YearTo
                }).then(function successCallback(response) {
                    $scope.Show=1;
                     
                     
                    $scope.AllBatch = response.data;
                     $("#LoadingID").css("display", "none");
                   console.log($scope.AllBatch);
                }, function errorCallback(response) {
                     $("#LoadingID").css("display", "none");
                });
            }

            

           
            
            function reset()
            {
                $scope.Batch = {};
            }

        }]);
        
        
        function genPdf()
               {
                  
                   
                   html2canvas(document.getElementById("HTMLtoPDF")).then(function(canvas) {
                var img = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                
                var doc = new jsPDF("p", "mm", "a4");
               
                doc.addImage(img, 'JPEG', 0, 0);
                doc.save('test.pdf');
            });
                   
               }

                $(function () {
                    $("#Month").datepicker({
                        dateFormat: 'yy',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+365d'
                    });
                });
                
                $(function () {
                    $("#MonthTo").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+365d'
                    });
                });
                
    $(function () {
        $('#printDuration').on('click', function () {
            $.print(".myPrintDuration");
        });
    });
       $(function () {
        $('#printBatch').on('click', function () {
            $.print(".myPrintBatch");
        });
    });
        
</script>