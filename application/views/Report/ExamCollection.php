
<div ng-controller="DefaultCtrl" class="col-md-10" style="background-color: #ffffff;">

    <div class="col-md-12">
 

        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    </div>
    <!--List of ExamCollection-->
    
                   <div class="form-group col-md-4">
                        <label for="Exam" >From</label>
                         <select class="form-control"  ng-model="Batch.SessionStart" required   name="BatchType" ng-options="Question.SID as Question.FiscalYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                     <div class="form-group col-md-4">
                        <label for="Exam" >To</label>
                         <select class="form-control"  ng-model="Batch.SessionEnd" required   name="BatchType" ng-options="Question.SID as Question.FiscalYear for Question in BatchabdExamCollection.Session">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                    
    
    <br>
    <div class="col-md-6">
        <h3> Calendar year Report base on Duration Type</h3>
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Calender Year </th>        
                <th>Duration Type </th>        
                <th>Male </th>
                  <th>Female </th>        
                <th>Total </th>
            </tr>
            <tr ng-repeat="Year in AllCalendarYear.DurationType">
                <td>{{$index + 1}} </td>
                <td>{{Year.CalenderYear}} </td>
                 <td>{{Year.DurationType}} </td>
                 <td>{{Year.Male}} </td>
                 <td>{{Year.Female}} </td>
                 <td>{{Year.Total}} </td>
               
            </tr>
            <tr>
                 <th></th>
                <th> </th>        
                <th>Total</th>        
                <th> {{AllFiscalYear.Total.Male}}</th>
                  <th>  {{AllFiscalYear.Total.Female}}</th>        
                <th> {{AllFiscalYear.Total.Total}} </th>
            </tr>
        </table>

    </div>

   <div class="col-md-6">
       <h3> Calender year Report base on Batch Type</h3>
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Calender Year </th>        
                <th>Batch Type </th>        
                <th>Male </th>
                  <th>Female </th>        
                <th>Total </th>
            </tr>
            <tr ng-repeat="Year in AllCalendarYear.BatchType">
                <td>{{$index + 1}} </td>
                <td>{{Year.CalenderYear}} </td>
                 <td>{{Year.BatchType}} </td>
                 <td>{{Year.Male}} </td>
                 <td>{{Year.Female}} </td>
                 <td>{{Year.Total}} </td>
               
            </tr>
            <tr>
                <th></th>
                <th> </th>        
                <th>Total</th>        
                <th> {{AllFiscalYear.Total.Male}}</th>
                  <th>  {{AllFiscalYear.Total.Female}}</th>        
                <th> {{AllFiscalYear.Total.Total}} </th>
            </tr>
        </table>

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
                GetAllCalendarYear();
               GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllCalendarYear = [];
            
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
                
            
            function GetAllCalendarYear()
            {
                
                $http({
                    method: 'GET',
                    url: baseUrl + 'Report/GetAllCalendarYear/'
                }).then(function successCallback(response) {
                    $scope.AllCalendarYear = response.data;


                }, function errorCallback(response) {
                });
            }

            

        }]);
</script>