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
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Add Class/WorkShop</button>
                                    </span>
                                    
                                    <h3>
                                        <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
                                      <div class="table-responsive">
										   <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Batch  </th>
                <th>Detail </th>
                
                <th>Action </th>
            </tr>
            <tr ng-repeat="ClassWorkShop in AllClassWorkShop">
                <td>{{$index + 1}} </td>
                <td>{{ClassWorkShop.BatchName}} </td>
                <td><pre>{{ClassWorkShop.ClassDetail}}</pre> 
                <a href="{{ClassWorkShop.Others}}" a>Click Here to Join your Meeting</a>
                </td>
                
                <td>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#mySMSModal" ng-click="SMS(ClassWorkShop)" >SMS</button>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myMailModal" ng-click="Mail(ClassWorkShop)" >Mail</button>
                    
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(ClassWorkShop)" >Edit</button>
                    
                    <button class="btn btn-sm btn-danger" ng-click="DeleteClassWorkShop(ClassWorkShop.ID)" >Delete</button>
                    
                    
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
				 <h4 class="modal-title" id="myModalLabel">Add ClassWorkShop </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddClassWorkShop()" />   
                      
                      <div class="form-group">
                    <label for="Exam" >Batch Name</label>
                    <select class="form-control"  ng-model="ClassWorkShop.BatchID"  name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                        <option value="">Choose Option</option>
                    </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Class/ WorkShop Details </label>
                        <Textarea class="form-control" ng-model="ClassWorkShop.ClassDetail"  ="Exam"> </Textarea>
                    </div>
                    
                   
                    
                     <div class="form-group">
                        <label for="Exam" >Link</label>
                        <input class="form-control" ng-model="ClassWorkShop.Others"  ="Detail"/>
                    </div>
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" ="Create" id="Create">Add</button>
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
    
     <!-- SMS Modal -->
   <div class="modal fade" id="mySMSModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
				 <h4 class="modal-title" id="myModalLabel">Add ClassWorkShop </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                  <p>
                      <form ng-submit="SendSMS()">
                        <div class="form-group">  
                        <textarea ng-model="MySMS.Text" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="Submit" class="btn btn-info" ="Create" id="Create">Send</button>
                        </div>
                        
                      </form>
                      
                      
                  </p>
                  
                  
                </div>
                <div class="modal-footer">
                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->
    
       <!-- SMS Modal -->
   <div class="modal fade" id="myMailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
				 <h4 class="modal-title" id="myModalLabel"> ClassWorkShop </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                  <p>
                      <form ng-submit="SendMail()">
                        <div class="form-group">  
                        <textarea ng-model="MyMail.Text" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="Submit" class="btn btn-info" ="Create" id="Create">Send</button>
                        </div>
                        
                      </form>
                      
                      
                  </p>
                  
                  
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
                GetAllClassWorkShop();
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllClassWorkShop = [];
                $scope.DeleteClassWorkShop = DeleteClassWorkShop;
                $scope.AddClassWorkShop = AddClassWorkShop;
                $scope.ClassWorkShop = {};
                $scope.Edit = Edit;
                $scope.reset=reset;
                
                $scope.SMS=SMS;
                $scope.WorkshopSMS={};
                $scope.MySMS={};
                
                $scope.SendSMS=SendSMS;
                
                $scope.Mail=Mail;
                $scope.WorkshopMail={};
                $scope.MyMail={};
                
                $scope.SendMail=SendMail;

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


            function GetAllClassWorkShop()
            {
                $scope.AllClassWorkShop = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllClassWorkShop/'
                }).then(function successCallback(response) {
                    $scope.AllClassWorkShop = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteClassWorkShop(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteClassWorkShop/' + SId
                    }).then(function successCallback(response) {
                        swal("ClassWorkShop!", "Deleted Successfully!!");
                        GetAllClassWorkShop();
                    }, function errorCallback(response) {
                        swal("ClassWorkShop!", "Not Deleted!!!!");
                    });

                }
            }

            function AddClassWorkShop()
            {
               // console.log($scope.ClassWorkShop);
                //update
                if ($scope.ClassWorkShop.ID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateClassWorkShop/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ClassWorkShop)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllClassWorkShop();
                        $scope.ClassWorkShop={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "ClassWorkShop");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddClassWorkShop/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ClassWorkShop)
                    }).success(function (data) {
                        console.log(data);
                        GetAllClassWorkShop();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "ClassWorkShop");
                        $scope.ClassWorkShop = {};
                    });
                }
            }

            function Edit(ClassWorkShop)
            {
                $scope.ClassWorkShop = {};
                $scope.ClassWorkShop = ClassWorkShop;
            }
            
            function SMS(ClassWorkShop)
            {
                $scope.ClassWorkShop = {};
                $scope.WorkshopSMS = ClassWorkShop;
                
                $scope.MySMS.Text="Dear Trainee, "+ $scope.WorkshopSMS.ClassDetail+" "+ $scope.WorkshopSMS.Others;
                $scope.MySMS.BatchID=$scope.WorkshopSMS.BatchID;
            }
            
            function SendSMS()
            {
                console.log($scope.MySMS);
                
                 var r = confirm("Do you want to send message!");
                if (r == true) {
                    
                    $http({
                        method: 'POST',
                        url: baseUrl + 'SMS/SendSmsToStudentsWhoisInvidetForLiveClassOrWorkshop',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.MySMA)
                    }).success(function (data) {   
                        console.log(data);
                       
                         $('#mySMSModal').modal('toggle');
                         
                        swal("Successfully Sent", "SMA");
                        
                    });
                    
//         
                }
                
            }
            
            
            function Mail(ClassWorkShop)
            {
                $scope.ClassWorkShop = {};
                $scope.WorkshopSMS = ClassWorkShop;
                
                $scope.MyMail.Text="Dear Trainee, "+ $scope.WorkshopSMS.ClassDetail+" "+ $scope.WorkshopSMS.Others;
                $scope.MyMail.BatchID=$scope.WorkshopSMS.BatchID;
            }
            
            function SendMail()
            {
                console.log($scope.MyMail);
                
                 var r = confirm("Do you want to send Mail!");
                if (r == true) {
                    
                     $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/SendEmailClassWorkshop/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.MyMail)
                    }).success(function (data) {   
                        console.log(data);
                       
                         $('#myMailModal').modal('toggle');
                         
                        swal("Successfully Sent", "MAIL");
                        
                    });
//         
                }
                
            }
            
            function reset()
            {
                $scope.ClassWorkShop = {};
            }

        }]);
</script>