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
                                     <span class="pull-right">
                                        
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
                                          <div class="row">
                                              
                                          
                    <div class="form-group col-md-4">
                        <label for="Exam" >From</label>
                         <select class="form-control"  ng-model="Year.SessionStart" required   name="SessionStart" ng-options="Question.SID as Question.FiscalYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                     <div class="form-group col-md-4">
                        <label for="Exam" >To</label>
                         <select class="form-control"  ng-model="Year.SessionEnd" required   name="SessionEnd" ng-options="Question.SID as Question.FiscalYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                      <div class="form-group col-md-4">
                          <br>
                      <button ng-click="GetAllFiscalYear()" class="btn btn-info">Search</button>
                    </div>  
                    </div>
                    <div class="form-group col-md-12">
                         <img id="LoadingID" src="<?php echo base_url('dist/img/loading2.gif') ?>" style="display:none; "/ >
                    </div>  
                    
    
    <div class="col-md-12 myPrintDuration" ng-show="Show==1">
         <span class="fa fa-print" id='printDuration' style="cursor: pointer;"  ></span>
                    <h2 style="text-align: center;"> Bangladesh Computer Council</h1>         
                     <h3 style="text-align: center;"> Information and communication Technology Division</h3>
                    <h4 style="text-align: center;">Regional Office , Barishal.</h4> <hr>
        <h5 style="text-align:center;"> Fiscal Year  Report Base on Duration Type</h5>
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Fiscal Year </th>        
                <th>Duration Type </th>
                <th>Batch </th>
                 
                  <th>Fees </th>
                    <th>Certified </th>
                <th>Disable </th>
                <th>Male </th>
                  <th>Female </th>        
                <th>Total </th>
            </tr>
            <tr ng-repeat="Year in AllFiscalYear.DurationType">
                <td>{{$index + 1}} </td>
                <td>{{Year.FiscalYear}} </td>
                 <td>{{Year.DurationType}} </td>
                 <td>{{Year.BatchNumber}} </td>
                  <td>{{Year.Fee}} </td>
                  <td>{{Year.Certified}} </td>
                   <td>{{Year.Disable}} </td>
                 <td>{{Year.Male}} </td>
                 <td>{{Year.Female}} </td>
                 <td>{{Year.Total}} </td>
               
            </tr>
            <tr>
                <th></th>
                <th> </th> 
                  <th> Total</th>
                   <th> {{AllFiscalYear.Total.TotalBatchNumber}}</th>
                    <th> {{AllFiscalYear.Total.Fee}}</th>
                   <th>{{AllFiscalYear.Total.Certified}}</th>  
                  <th>{{AllFiscalYear.Total.Disable}}</th>      
                <th> {{AllFiscalYear.Total.Male}}</th>
                  <th>  {{AllFiscalYear.Total.Female}}</th>        
                <th> {{AllFiscalYear.Total.Total}} </th>
            </tr>
        </table>

    </div>

   <div class="col-md-12 myPrintBatch"  ng-show="Show==1">
        <span class="fa fa-print" id='printBatch' style="cursor: pointer;" ></span>
                    <h2 style="text-align: center;"> Bangladesh Computer Council</h1>      
                     <h3 style="text-align: center;"> Information and communication Technology Division</h3>
                    <h4 style="text-align: center;">Regional Office , Barishal.</h4> <hr>
       <h5 style="text-align:center;"> Fiscal Year  Report Base on Batch Type</h5>
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Fiscal Year </th>        
                <th>Batch Type </th> 
                <th>Batch </th>
                <th>Fees </th>
                    <th>Certified </th>
                 <th>Disable </th>
                <th>Male </th>
                  <th>Female </th>        
                <th>Total </th>
            </tr>
            <tr ng-repeat="Year in AllFiscalYear.BatchType">
                <td>{{$index + 1}} </td>
                <td>{{Year.FiscalYear}} </td>
                 <td>{{Year.BatchType}} </td>
                 <td>{{Year.BatchNumber}} </td>
                   <td>{{Year.Fee}} </td>
                   <td>{{Year.Certified}} </td>
                   <td>{{Year.Disable}} </td>
                 <td>{{Year.Male}} </td>
                 <td>{{Year.Female}} </td>
                 <td>{{Year.Total}} </td>
               
            </tr>
            <tr>
                <th></th>
                <th> </th> 
                 <th> Total</th>
                  <th> {{AllFiscalYear.Total.TotalBatchNumber}}</th>
                 <th> {{AllFiscalYear.Total.Fee}}</th>
                    <th>{{AllFiscalYear.Total.Certified}}</th>  
                 <th>{{AllFiscalYear.Total.Disable}}</th>       
                <th> {{AllFiscalYear.Total.Male}}</th>
                  <th>  {{AllFiscalYear.Total.Female}}</th>        
                <th> {{AllFiscalYear.Total.Total}} </th>
            </tr>
        </table>

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

</div>
</body>
</html>

<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
              //  GetAllFiscalYear();
              GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.Show=0;
                $scope.AllFiscalYear = [];
                   $scope.Year={};
                $scope.GetAllFiscalYear=GetAllFiscalYear;
            
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
            
            function GetAllFiscalYear()
            {
                  $("#LoadingID").css("display", "block");
                $scope.Show=1;
                var from=$scope.Year.SessionStart;
                var to=$scope.Year.SessionEnd;
                
                console.log($scope.Year);
                
                $http({
                    method: 'GET',
                    url: baseUrl + 'Report/GetAllFiscalYear/'+from+'/'+to
                }).then(function successCallback(response) {
                    $scope.AllFiscalYear = response.data;
                      $("#LoadingID").css("display", "none");

                }, function errorCallback(response) {
                      $("#LoadingID").css("display", "none");
                });
            }

            

        }]);
</script>

<!--print html--> 
<script>
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