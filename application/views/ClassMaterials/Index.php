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
                <th>Date  </th>
                <th>Batch  </th>
                <th>Detail </th>
                <th>File  </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="ClassMaterials in AllClassMaterials">
                <td>{{$index + 1}} </td>
                 <td>{{ClassMaterials.Date}} </td>
                <td>{{ClassMaterials.BatchName}} </td>
                <td><pre>{{ClassMaterials.ClassDetail}}</pre> Materials:
                
                </td>
                 <td> <a href="{{ClassMaterials.Others}}" a>Download</a> </td>
                <td>
                   
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myMailModal" ng-click="Mail(ClassMaterials)" >Mail</button>
                    
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(ClassMaterials)" >Edit</button>
                    
                    <button class="btn btn-sm btn-danger" ng-click="DeleteClassMaterials(ClassMaterials.ID)" >Delete</button>
                    
                    
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
				 <h4 class="modal-title" id="myModalLabel">Add ClassMaterials </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddClassMaterials()" />   
                      
                      <div class="form-group">
                    <label for="Exam" >Batch Name</label>
                    <select class="form-control"  ng-model="ClassMaterials.BatchID"  name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                        <option value="">Choose Option</option>
                    </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" >Class/ WorkShop Details </label>
                        <Textarea class="form-control" ng-model="ClassMaterials.ClassDetail"  ="Exam"> </Textarea>
                    </div>
                    <div class="form-group">
                        <iframe src="https://drive.google.com/embeddedfolderview?id=1ssnZ1yypwTY13LnVK0SMINFoAD1SlMNh&resourcekey=RESOURCE-KEY" style="width:100%; height:600px; border:0;"></iframe>
                       
                    </div>
                   
                    
                     <div class="form-group">
                        <label for="Exam" >Link</label>
                        <input class="form-control" ng-model="ClassMaterials.Others"  ="Detail"/>
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
    
   
    
       <!-- Mail Modal -->
   <div class="modal fade" id="myMailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
				 <h4 class="modal-title" id="myModalLabel"> ClassMaterials </h4>
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
                GetAllClassMaterials();
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                
                $scope.AllClassMaterials = [];
                $scope.DeleteClassMaterials = DeleteClassMaterials;
                $scope.AddClassMaterials = AddClassMaterials;
                $scope.ClassMaterials = {};
                $scope.Edit = Edit;
                $scope.reset=reset;
                
                
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


            function GetAllClassMaterials()
            {
                $scope.AllClassMaterials = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'ClassMaterials/GetAllClassMaterials/'
                }).then(function successCallback(response) {
                    $scope.AllClassMaterials = response.data;
                }, function errorCallback(response) {
                });
            }

            function DeleteClassMaterials(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'ClassMaterials/DeleteClassMaterials/' + SId
                    }).then(function successCallback(response) {
                        swal("ClassMaterials!", "Deleted Successfully!!");
                        GetAllClassMaterials();
                    }, function errorCallback(response) {
                        swal("ClassMaterials!", "Not Deleted!!!!");
                    });

                }
            }

            function AddClassMaterials()
            {
               // console.log($scope.ClassMaterials);
                //update
                if ($scope.ClassMaterials.ID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'ClassMaterials/UpdateClassMaterials/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ClassMaterials)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllClassMaterials();
                        $scope.ClassMaterials={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "ClassMaterials");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'ClassMaterials/AddClassMaterials/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.ClassMaterials)
                    }).success(function (data) {
                        console.log(data);
                        GetAllClassMaterials();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "ClassMaterials");
                        $scope.ClassMaterials = {};
                    });
                }
            }

            function Edit(ClassMaterials)
            {
                $scope.ClassMaterials = {};
                $scope.ClassMaterials = ClassMaterials;
            }
            
         
            function Mail(ClassMaterials)
            {
                $scope.ClassMaterials = {};
                $scope.WorkshopSMS = ClassMaterials;
                
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
                        url: baseUrl + 'ClassMaterials/SendEmailClassMaterials/',
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
                $scope.ClassMaterials = {};
            }

        }]);
</script>