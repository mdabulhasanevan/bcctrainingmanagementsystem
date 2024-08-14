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
                                     
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
										
										 <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Employee">Employee</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Student" ng-click="GetStudentHistory();">Student</a></li>
                                         <li><a class="nav-link" data-toggle="tab" href="#PageVisit" ng-click="">Page Visit</a></li>
                                        <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>-->
                                    <!--    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
                                      </ul>
                                    
                                      <div class="tab-content">
                                          <!--tab 1-->
                                        <div id="Employee" class="tab-pane active">
                                          <h3>Employee Login History</h3>
                                           <button class="btn btn-danger" ng-click="DeleteLoginHistory()" >Delete Histories</button></td>
                                          
                                        <table class="table table-striped" >
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Email</th>            
                                                    <th>IP </th>
                                                    <th>Date </th>
                                                </tr>
                                                <tr ng-repeat="H in AllHistory">
                                                    <td>{{$index + 1}} </td>
                                                    <td><a class="btn btn_primary" data-toggle="modal" data-target="#myModal" ng-click="GetPageVisitLoginHistory(H.UserID)">{{H.Email}}</a> </td>
                                                    <td>{{H.IP}} </td>
                                                    <td>{{H.Date}} </td>
                                                   
                                                        <!--<button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Batch)" >Edit</button>-->
                                                        <!--<button class="btn btn-danger" ng-click="DeleteBatch(Batch.BId)" >Delete</button></td>-->
                                                </tr>
                                            </table>
                                    
                                       
                                        </div>
                                          <!--tab 2-->
                                        <div id="Student" class="tab-pane fade">
                                          <h3>Student Login History</h3>
                                           <button class="btn btn-danger" ng-click="DeleteStudentLoginHistory()" >Delete Student Histories</button></td>
                                         
                                            <table class="table table-striped table-responsive" >
                                                <tr>
                                                    <th>SN</th>                         
                                                    <th>Name </th>
                                                    <th>Reg No</th>   
                                                    <th>Batch </th>
                                                    
                                                    <th>IP </th>
                                                    <th>Date </th>
                                                </tr>
                                                <tr ng-repeat="S in AllStudentHistory">
                                                    <td>{{$index + 1}} </td>
                                                     <td>{{S.Name}} </td>
                                                    <td>{{S.RegNo}} </td>
                                                     <td>{{S.Batch}} </td>
                                                     
                                                    <td>{{S.IP}} </td>
                                                    <td>{{S.Date}} </td>
                                                   
                                                        <!--<button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Batch)" >Edit</button>-->
                                                        <!--<button class="btn btn-danger" ng-click="DeleteBatch(Batch.BId)" >Delete</button></td>-->
                                                </tr>
                                            </table>
                                    
                                       
                                        </div>
                                      
                                       <!--tab 3-->
                                    <div id="PageVisit" class="tab-pane fade">
                                      <h3>Page Visit Login History</h3>
                                      
                                     
                                        <table class="table table-striped " style="">
                                            <tr>
                                                <th>SN</th>  
                                                 <th>Name </th>
                                                <th>URL</th>
                                                <th>Date </th>
                                                <th>IP</th>   
                                              
                                            </tr>
                                            <tr ng-repeat="S in AllPageVisitHistory">
                                                <td>{{$index + 1}} </td>
                                                <th>{{S.Name }} </th>
                                                 <td><a href="{{S.URI}}">{{S.URI}}</a>  </td>
                                                <td>{{S.Date }} </td>
                                                <td>{{S.IP }} </td>
                                                   
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </table>
                                
                                   
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
            <div class="modal-dialog modal-xl" role="document" style="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tracking History</h4>
                        <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                    </div>
                    <div class="modal-body">
                      <table class="table" style="">
                                           
                                            <tr ng-repeat="S in AllPageVisitHistory">
                                                <td>{{$index + 1}} </td>
                                               <td>{{S.Date }} </td>
                                                 <td><a href="{{S.URI}}">{{S.URI}}</a>  </td>
                                                
                                                <td>{{S.IP }} </td>
                                                   
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

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllHistory();

            }
            function initialize() {
                $scope.AllHistory = [];
                $scope.AllStudentHistory=[];
              $scope.DeleteLoginHistory=DeleteLoginHistory;
              $scope.GetStudentHistory=GetStudentHistory;
              $scope.GetPageVisitLoginHistory=GetPageVisitLoginHistory;
              
              $scope.DeleteStudentLoginHistory=DeleteStudentLoginHistory;
            }

            function GetAllHistory()
            {
                $scope.AllHistory = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'User/GetAllLoginHistory/'
                }).then(function successCallback(response) {
                    $scope.AllHistory = response.data;
                }, function errorCallback(response) {
                });
            }
            
            function GetStudentHistory()
            {
                $scope.AllStudentHistory = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'User/GetStudentLoginHistory/'
                }).then(function successCallback(response) {
                    $scope.AllStudentHistory = response.data;
                }, function errorCallback(response) {
                });
            }
            
             function GetPageVisitLoginHistory(id)
            {
                var id=id;
                $scope.AllPageVisitHistory = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'User/GetPageVisitLoginHistory/'+ id
                }).then(function successCallback(response) {
                    $scope.AllPageVisitHistory = response.data;
                }, function errorCallback(response) {
                });
            }
           
            
            function DeleteLoginHistory()
            {              
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'User/DeleteLoginHistory/' 
                    }).then(function successCallback(response) {
                        swal("History!", "Deleted Successfully!!");
                        GetAllHistory();
                    }, function errorCallback(response) {
                        swal("History!", "Not Deleted!!!!");
                    });

                }
            }
            function DeleteStudentLoginHistory()
            {              
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'User/DeleteStudentLoginHistory/' 
                    }).then(function successCallback(response) {
                        swal("History!", "Deleted Successfully!!");
                        GetAllHistory();
                    }, function errorCallback(response) {
                        swal("History!", "Not Deleted!!!!");
                    });

                }
            }
          
        }]);
</script>