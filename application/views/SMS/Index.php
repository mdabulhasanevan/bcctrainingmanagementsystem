

<div class="content-page"  ng-controller="SMSCtrl"  >
<!-- Start content -->
    <div class="content" >
        
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
             
            
            <h3><i class="far fa-copy"></i> <?php  echo $Title;  ?> <span class="pull-right" data-toggle="tab" >Balance: {{Balance}} .tk</span></h3>
            

        </div>
        
        <div class="card-body">
          <div class="table-responsive">
			
			 <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">BCC Officials</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Student</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Public Message</a></li>
           
            <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>-->
        <!--    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
          </ul>
               
             <div class="tab-content">
                <div id="home" class="tab-pane active">
                    <div class="row">
                    <div class="col-md-4">
                        <button type="button" ng-click="GetSendList();" class="btn btn-info pull-left" data-toggle="modal" data-target="#myModal">Send List</button> 
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-dismissable"><?php echo $smsNoti; ?></div> 
                    </div>
                    <div class="col-md-4">
        
                    </div>
        
                    <!--list of user-->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="color: black;">
                         <select class="form-control" ng-change="GetAllUser(PostSelected)" ng-options="Post.PId as Post.PostName for Post in Posts" name="AllPost" ng-model="PostSelected" >
                            <option value="">Select..</option>  
        
                        </select>
                        <table class="table table-bordered">
                            <tr>
                                <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll(1)" /></th>
                                <th>Name </th>
                                <th>Post </th>
                                <th>Mobile </th>
        
                                <th>Action </th>
                            </tr>
                            <tr ng-repeat="User in AllUser">
                                <td>  <input type="checkbox" ng-model="User.Selected"  ng-true-value="true" ng-false-value="false"/> </td>
                                <td>{{User.Name}} </td>                
                                <td>{{User.Post}} </td>
                                <td>{{User.Mobile}} </td>
        
                                <td></td>
                            </tr>
        
                        </table>
                    </div>
        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                         <form>
                       
                        <textarea class="form-control" ng-model="MessageUser" required="required">
        
                        </textarea>
        
                        <button class="btn btn-primary" ng-click="SendSMS(1)">Send SMS</button>  
                    </div>
                    </form>
                   
        
                </div>
        
               
                </div>
                
                <!--2nd tab start-->
                <div id="menu1" class="tab-pane fade">
                    <br>
        
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="Exam" >Batch Name</label>
                            <select class="form-control"  ng-model="BatchID" ng-change="GetAllStudent(BatchID)"   name="BatchID" ng-options="Question.Id as Question.Batch for Question in BatchabdExamCollection.batch">
                                <option value="">Choose Option</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            
                            
                        </div>    
                        
                    </div>
                    <hr>
                    <div class="row">
        
                        <div class="col-md-12">
                            <textarea class="form-control" ng-model="MessageStudent" required="required">
        
                            </textarea>
        
                            <button class="btn btn-primary" ng-click="SendSMS(2)">Send SMS</button>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table table-striped">
                            <tr>
                                <th>SN</th>
                                <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll(2)" /></th>
                                <th> Name </th>
                                <th> Reg. No </th>
                               
                                <th> Gender </th>
                                <th> Mobile </th>
                               
        
                            </tr>
                            <tr ng-repeat="Student3 in AllStudent| filter:{Session:Session} | filter:{CalendarYear:CalendarYear} | filter:{Gender:Gender}:true">
                                <td>{{$index + 1}} </td>
                                <td> <input type="checkbox" ng-model="Student3.Selected"  ng-true-value="true" ng-false-value="false"/>
                                <td>{{Student3.Name}} </td>
                                <td>{{Student3.RegNO}} </td>
                               
                                <td>{{Student3.Gender}} </td>
                                <td>{{Student3.Mobile}} </td>
                               
        
                            </tr>
                        </table>
        
                    </div>
        
                </div>
                
                <div id="menu2" class="tab-pane fade">
                    <h3>Public Message</h3>
                    <label>Write Mobile numbers using ',' like 01737...,01818..., 01915...  </label>
                    <textarea class="form-control" ng-model="MobilePublic" required="required">   </textarea>
                    <br>
                    <label>Write Message</label>
                    <textarea class="form-control" ng-model="MessagePublic" required="required">   </textarea>
                    <br>
                    <button class="btn btn-primary" ng-click="SendSMS(3)">Send SMS</button>
                </div>
               
                <div id="menu3" class="tab-pane fade">
                    <h3>Other2</h3>
                    <p>This feature will come soon.</p>
                </div>
            </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        
    <!-- Modal for Send List -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="overflow: scroll;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sending list</h4>
                </div>
                <div class="modal-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr>
                            <td>Date</td>
                            <td>Numbers</td>
                            <td>SMS</td>
                            <td>Status</td>
                        </tr>
                        <tr ng-repeat="List in sendList">
                            <td>{{List.Date}} </td>
                            <td>{{List.Numbers}} </td>
                            <td>{{List.SMS}} </td>
                            <td>{{List.Status}}</td>

                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>

<script type="text/javascript">

    app.controller("SMSCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllPosts();
                CheckBalance();
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllUser = [];
                $scope.User = {};
                $scope.Posts = [];
                $scope.GetAllUser = GetAllUser;
                $scope.SendSMS = SendSMS;
                $scope.GetSendList = GetSendList;
                $scope.sendList = [];
                $scope.CheckBalance = CheckBalance;
                $scope.CheckedUser = [];
                $scope.MessageUser = '';
                $scope.MessageStudent = '';
                $scope.Message = '';
                $scope.Balance = '';
                $scope.Check = [];


                $scope.GetAllStudent = GetAllStudent;
                $scope.AllStudent = [];


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

            $scope.checkAll = function checkAll(type) {
                var type = type; //1 for teacher 2 for student

                if ($scope.selectedAll) {
                    $scope.selectedAll = true;
                } else {
                    $scope.selectedAll = false;
                }

                if (type == 1)
                {
                    angular.forEach($scope.AllUser, function (User) {
                        User.Selected = $scope.selectedAll;
                    });
                }
                else if (type == 2)
                {
                    angular.forEach($scope.AllStudent, function (User) {
                        User.Selected = $scope.selectedAll;
                    });
                }

            };
            function GetAllPosts() {
                $scope.Posts = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'CommonCtrl/GetPost/'
                }).then(function successCallback(response) {
                    $scope.Posts = response.data;
                }, function errorCallback(response) {
                });
            }

            function GetAllUser(PostSelected) {

                $scope.AllUser = [];
                $scope.PId = PostSelected;
                $http({
                    method: 'GET',
                    url: baseUrl + 'CommonCtrl/GetAllUsers/' + $scope.PId
                }).then(function successCallback(response) {
                    $scope.AllUser = response.data;
                }, function errorCallback(response) {
                });
            }

            function CheckBalance() {
                $scope.Balance = '';
                $http({
                    method: 'GET',
                    url: baseUrl + 'SMS/CheckBalance/'
                }).then(function successCallback(response) {
                    $scope.Balance = response.data;
                }, function errorCallback(response) {
                });
            }

            //Sending Message from here
            function SendSMS(type)
            {
                var type = type;
                $scope.mobiles = '';
                if (type == 1)
                {
                    $scope.Get = $scope.AllUser;
                    $scope.Message = $scope.MessageUser;
                }
                else if (type == 2)
                {
                    $scope.Get = $scope.AllStudent;
                    $scope.Message = $scope.MessageStudent;
                }
                else if (type == 3)
                {
                    $scope.mobiles = $scope.MobilePublic;
                    $scope.Message = $scope.MessagePublic;
                }

//if its not official or student then its public message so its no need foreach
                if (type <3)
                {
                    angular.forEach($scope.Get, function (User) {
                        if (User.Selected == true)
                        {
                            $scope.mobiles = $scope.mobiles + User.Mobile + ',';
                        }
                    });
                }

                var mobiles = $scope.mobiles;
                mobiles = mobiles.replace(/,\s*$/, "");
                $scope.mobiles = mobiles;
                console.log($scope.mobiles);
                console.log($scope.Message);
                var r = confirm("Do you want to send message!");
                if (r == true) {
                    $http.post(
                            baseUrl + 'SMS/SendSmsOneToMany',
                            {'mobiles': $scope.mobiles, 'message': $scope.Message}
                    ).success(function (data) {
                        alert(data);
                    }).error(function (data) {
                        alert(data);
                    });
//         
                }

                CheckBalance();
            }

            //already send list
            function GetSendList()
            {
                $scope.sendList = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'SMS/GetSendList/'
                }).then(function successCallback(response) {
                    $scope.sendList = response.data;
                }, function errorCallback(response) {
                });
            }

            function GetAllStudent(x)
            {
                $scope.AllStudent = [];
                var BID = x;
                $scope.AllStudent = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Student/GetAllStudent/' + BID
                }).then(function successCallback(response) {
                    $scope.AllStudent = response.data;
                    console.log($scope.AllStudent);
                }, function errorCallback(response) {
                });
            }


        }]);
</script>