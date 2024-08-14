<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">
		User List
			</h1>
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
                <div class="pull-left">
                  <a class="btn btn-info" href="<?php echo base_url("Service/register"); ?>">Add User</a> 
                </div>
        
                 <div class="pull-right">
                    <form method="post" action="<?php echo base_url(); ?>Post/Exportaction"> 
                     <input type="submit" name="export" class="" value="Export" />
                    </form>
                    
                </div>
                <div class="pull-right">
                <form method="post" id="import_form" enctype="multipart/form-data">
                 
                   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                   <input type="submit" name="import" value="Import" class="" />
                </form>
                </div>
                </div>
                    <!-- end card-header -->

  
    <!--List of EducationalInstitute-->
 <div class="card-body">
        <div class="table-responsive">
            
    <div class="row">          

                    
       <table class="table table-hover table-bordered">
        <tr>
            <th>Name</th>
            <th>Post</th>
            <!--<th>Email</th>-->
            <th>Mobile</th>
            <th>Role</th>
            <th>Status</th>
            <th>Photo</th>           
            <th>Action</th>
        </tr>

        <tr ng-repeat="User in Users">
            <td>{{User.Name}} </td>
            <td> {{User.PostName}} </td>
            <!--<td>{{User.Email}}</td>-->
            <td>{{User.Mobile}} </td>    
            <td> 
             <span class="" ng-show="User.IsActive==1">Active</span> 
             <span class="" ng-show="User.IsActive==0">Not Active </span></td>           
            <td>{{User.RoleName}} </td>
            <td> <img src="<?php echo base_url('uploads/users/') ?>{{User.Photo}}" width="50" height="50" </td>
            <td>
                <button  class="btn btn-primary btn-sm" ng-click="ViewUser(User)" data-toggle="modal" data-target="#ViewModal">View</button> | 
                <span  class="btn btn-success btn-sm" ng-click="EditUser(User)" data-toggle="modal" data-target="#myModal">Edit</span> |
                <span  class="btn btn-danger btn-sm" ng-click="DeleteUser(User)" >Delete</span> 
                <button class="btn btn-primary btn-sm" ng-click="ChangeRoleUser(User.Id)" data-toggle="modal" data-target="#myModalRole" > Change Role</button>
            </td>
        </tr>

    </table>
		 
           

    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    

   
<!-- Edit Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Add Role</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item" ><a class="nav-link active" data-toggle="tab" href="#Basic">Basic Info</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Photo">Photo Change</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Password">Password Change</a></li>
                    </ul>

                    <div class="tab-content">
                        <!--basic-->
                        <div id="Basic"  class="tab-pane active">
                            <form ng-submit="SaveUser();" >
                                <div class="form-group">
                                    <label for="Name" >Name</label>
                                    <input class="form-control" ng-model="User.Name" name="Name" id="Name"/>
                                </div>
                                <div class="form-group">
                                    <label for="Post">Post</label>
                                    <select class="form-control" required="required"  ng-model="User.Post"  name="" ng-options="item.PId as item.PostName for item in AllPost">
                                        <option value="">Choose Option</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="AcademicQualification">Academic Qualification</label>
                                    <textarea class="form-control" ng-model="User.AcademicQualification" id="AcademicQualification">
                    
                                    </textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input class="form-control"  type="email" ng-model="User.Email" id="Email"/>
                                </div>
                                <div class="form-group">
                                    <label for="Mobile">Mobile</label>
                                    <input class="form-control" ng-model="User.Mobile" id="Mobile"/>
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <textarea class="form-control" ng-model="User.Address" id="Address"/>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="DOB">Date of Birth</label>
                                    <input class="form-control" id="datepicker" autocomplete="off" ng-model="User.DOB" />
                                </div>
                                <div class="form-group">
                                    <label for="Role">Role</label>
                                    <select class="form-control" required="required"  ng-model="User.Role"  name="" ng-options="item.Id as item.Role for item in AllRoles">
                                        <option value="">Choose Option</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Name" >Status</label>
                                    <select class="form-control" ng-model="User.IsActive" name="IsActive" id="IsActive">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn-info" type="submit" name="Signup" id="Signup">Save</button>
                                </div>
                            </form>
                        </div>
                        <!--2nd Tab Start-->
                        <div id="Photo" class="tab-pane fade">

                            <div class="panel panel-info">
                                <div class="panel-heading">Photo Info</div>
                                <div class="panel-body">
                                    <form name="PhotoForm" ng-submit="UpdateUserPhoto()" class="form-horizontal" id="form_sample_1" novalidate>
                                        <div class="form-group" ng-class="{ 'has-error' : submitted && addBasic.stuimage.$invalid}">
                                            <div class="col-md-8">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 80px; height: 82px;"> 
                                                                <img ng-src="<?php echo base_url("uploads/users/"); ?>{{User.Photo}}" style="width: 80px; height: 82px;"/>
                                                            </div>
                                                        </div>
                                                        <div style="float:right !important" class="col-md-4">
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <!--<span class="fileinput-exists"> Change </span>-->
                                                                <input type="file" id="imgs" name="Img"  required>
                                                            </span>

                                                            <button type="submit" class="btn btn-info" >upload</button>
                                                            <input type="hidden" ng-model="User.Id" name="Id"/>
                                                            <div class="form-control-focus"> </div>
                                                            <span ng-show="submitted && addBasic.stuimage.$error.required" class="help-block">Photo Required</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                        <!--//password-->
                        <div id="Password" class="tab-pane fade">
                            <form ng-submit="SavePassword();"
                                  <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input class="form-control" type="password" ng-model="User.Password1" id="Password"/>

                                    <div class="form-group">
                                        <label for="ConPassword" >ConPassword</label>
                                        <input class="form-control" type="password" ng-model="User.Password2" id="ConPassword"/>
                                    </div>
                                    <div class="form-group">

                                        <button class="btn-info" type="submit" name="SavePass" id="SavePass">Save</button>
                                    </div>
                            </form>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>


        </div>

    </div>
<!--modal end-->

<!-- View Modal -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Information </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
            </div>
            <div class="modal-body">

                <h3>{{User2.Name}}</h3>
                <div class="table-responsive">
                <table class="table table-hover table-bordered">
        <tr>
            
            <th>Post</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>Role</th>
            <th>Gender</th>           
            <th>Photo</th>
        </tr>

        <tr >          
            <td> {{User2.PostName}} </td>
            <td>{{User2.Email}}</td>
            <td>{{User2.Mobile}} </td>    
            <td> 
             <span class="label label-primary" ng-show="User2.IsActive==1">Active</span> 
             <span class="label label-danger" ng-show="User2.IsActive==0">Not Active </span>
            </td>           
            <td>{{User2.RoleName}} </td>
            <td>{{User2.Gender}}</td >
            <td> <img src="<?php echo base_url('uploads/users/') ?>{{User2.Photo}}" width="100" height="100" </td>
                     
        </tr>
         <tr>
            <td>Date of Birth: </td>
            <td colspan="6">{{User2.DOB}}</td>
            
        </tr>
        <tr>
            <td>Address: </td>
            <td colspan="6">{{User2.Address}}</td>
            
        </tr>
         <tr>
            <td>Academic Qualification : </td>
            <td colspan="6">{{User2.AcademicQualification }}</td>
            
        </tr>
    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--modal end-->

<!-- Add Role -->
<div class="modal fade" id="myModalRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Set Role of User </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
            </div>
            <div class="modal-body">

                <table class="table table-striped">   
                    <tr>
                        <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll()" /></th>
                        <th>Menu</th>
                    </tr>
                    <tbody ng-repeat="Mn in Menus.Menu">
                        <tr>
                            <td><input type="checkbox" ng-model="Mn.Selected1" ng-click="Mn.Selected = Mn.Selected1;
                                    checkAll2(Mn.Selected1, Mn.ID)" ng-init="Mn.Selected1 = 0"   ng-checked="Mn.Selected == 1"  ng-true-value="1" ng-false-value="0" /> </td>
                            <td><span class="glyphicon glyphicon-folder-close"> </span> {{ Mn.MenuName}} 
                                <ul ng-repeat="Mn2 in Menus.Menu2| filter:{MainMenuID:Mn.ID}:true">
                                    <li >
                                        <input type="checkbox" ng-model="Mn2.Selected1" ng-click="Mn2.Selected = Mn2.Selected1" ng-init="Mn2.Selected1 = 0"   ng-checked="Mn2.Selected == 1"  ng-true-value="1" ng-false-value="0" /> 
                                        <span class="glyphicon glyphicon-folder-close"> </span> {{ Mn2.MenuName}} 
                                    </li>
                                </ul>
                            </td>                      
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary" ng-click="SaveRoleMenu()" ng-click="Save()">Save</button>  

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--modal end-->
	 
    <!--modal end-->

</div>
<!-- END content-page -->

</div>

</body>
</html>
<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetUserList();
                GetAllRole();
                GetAllPost();
            }
            function initialize() {
                $scope.Menus = [];
                $scope.ChangeRoleUser = ChangeRoleUser;
                $scope.LoadAllMenu = LoadAllMenu;
                $scope.SaveRoleMenu = SaveRoleMenu;
                $scope.MenuID = '';
                $scope.selectedUser = 0;

                $scope.GetUserList = GetUserList;
                $scope.Users = [];
                $scope.User = {};
                $scope.SaveUser = SaveUser;

                $scope.EditUser = EditUser;
                $scope.DeleteUser = DeleteUser;
                
                $scope.ViewUser=ViewUser;
                $scope.User2={};

                $scope.AllRoles = [];
                $scope.GetAllRole = GetAllRole;
                $scope.AllPost = [];
                $scope.GetAllPost = GetAllPost;

                $scope.UpdateUserPhoto = UpdateUserPhoto;
                $scope.SavePassword = SavePassword;
            }

            function GetUserList()
            {
                $scope.Users = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/GetUserList/'
                }).then(function successCallback(response) {
                    $scope.Users = response.data;
                }, function errorCallback(response) {
                });
            }
            function GetAllRole()
            {
                $scope.AllRoles = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllRole/'
                }).then(function successCallback(response) {
                    $scope.AllRoles = response.data;
                }, function errorCallback(response) {
                });
            }
            function GetAllPost()
            {
                $scope.AllPost = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllPost/'
                }).then(function successCallback(response) {
                    $scope.AllPost = response.data;
                }, function errorCallback(response) {
                });
            }

            function EditUser(user)
            {
                $scope.User = user;

            }
            
            function ViewUser(User)
            {
                $scope.User2=User;
            }

            function SaveUser()
            {
                console.log($scope.User);
                if ($scope.User.Id > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Service/UpdateUser/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.User)
                    }).success(function (data) {
                        console.log(data);
                        GetUserList();
                        $scope.User = {};
                        $('#myModal').modal('toggle');
                        swal("Successfully Updated", "User");

                    });
                }
            }

            function SavePassword()
            {
                console.log($scope.User);
                if ($scope.User.Id > 0 && $scope.User.Password1==$scope.User.Password2 )
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Service/SavePassword/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.User)
                    }).success(function (data) {
                        console.log(data);                      
                        $scope.User = {};
                       // $('#myModal').modal('toggle');
                        swal("Successfully Updated Password", "User");

                    });
                }
                else
                {
                    alert("Password Not Matched!!! Please try Again");
                }
            }
            function UpdateUserPhoto()
            {
                {
                    $scope.User.Photo = "";
                    var files = $("#imgs").get(0).files;
                    var Id = $scope.User.Id;
                    if ($scope.User.Id > 0) {
                        $http({
                            method: 'POST',
                            url: baseUrl + '/Service/UpdateUserPhoto/',
                            headers: {'Content-Type': undefined},
                            transformRequest: function (data) {
                                var formData = new FormData();
                                formData.append('Id', Id);
                                if (files.length > 0)
                                    formData.append("Img", files[0]);
                                return formData;
                            }

                        }).success(function (data) {

                            $scope.User.Photo = data.Photo;
                            console.log(data);
                            swal("User Info!", "...Successfully Updated!");
                        });
                    }
                    else
                    {
                        alert("First Fillup Above Data.. You have no UserID")
                    }
                }
            }


            function DeleteUser(user)
            {
                console.log(user);
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Service/DeleteUser/' + user.Id + '/' + user.Photo
                    }).then(function successCallback(response) {
                        swal("User!", "Deleted Successfully!!");
                        GetUserList();
                    }, function errorCallback(response) {
                        swal("User!", "Not Deleted!!!!");
                    });

                }
            }


//All role related part bellow
            function ChangeRoleUser(ID)
            {
                console.log(ID);
                $scope.selectedUser = ID;
                LoadAllMenu(ID);
            }

            function LoadAllMenu(ID)
            {
                $scope.Menus = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/LoadAllMenuAndUserRole/' + ID
                }).then(function successCallback(response) {
                    $scope.Menus = response.data;
                    console.log($scope.Menus);
                }, function errorCallback(response) {

                });
            }

            $scope.checkAll = function checkAll() {

                if ($scope.selectedAll) {
                    $scope.selectedAll = true;
                } else {
                    $scope.selectedAll = false;
                }
                angular.forEach($scope.Menus.Menu, function (User) {
                    User.Selected = $scope.selectedAll;
                });
                console.log($scope.Menus.Menu);
            };

            $scope.checkAll2 = function checkAll2(x, ID) {
                $scope.ID = ID;

                angular.forEach($scope.Menus.Menu2, function (User2) {
                    if (User2.MainMenuID == ID)
                    {
                        User2.Selected = x;
                    }

                });
                console.log($scope.Menus.Menu2);
            };

            function SaveRoleMenu()
            {
                $scope.MenuID = '';
                $scope.MenuID2 = '';
                angular.forEach($scope.Menus.Menu, function (Mn) {
                    if (Mn.Selected == 1)
                    {
                        $scope.MenuID = $scope.MenuID + Mn.ID + ',';
                    }
                });

                angular.forEach($scope.Menus.Menu2, function (Mn2) {
                    if (Mn2.Selected == 1)
                    {
                        $scope.MenuID2 = $scope.MenuID2 + Mn2.ID + ',';
                    }
                });

                console.log($scope.Menus.Menu);
                var MenuID = $scope.MenuID;
                var MenuID2 = $scope.MenuID2;
                console.log($scope.Menus.Menu, " ", $scope.MenuID2);
                MenuID = MenuID.replace(/,\s*$/, "");
                MenuID2 = MenuID2.replace(/,\s*$/, "");

                console.log(MenuID, $scope.selectedUser, MenuID2);
                $http.post(
                        baseUrl + 'Service/SaveUserRole',
                        {'MenuID': MenuID, 'selectedUser': $scope.selectedUser, 'MenuID2': MenuID2}
                ).success(function (data) {
                    console.log(data);
                    $scope.MenuID = '';
                    $scope.MenuID2 = '';
                    //$scope.selectedUser=0;
                    LoadAllMenu($scope.selectedUser);
                    swl("Update Successfully!!");
                }).error(function (data) {
                    alert(data);
                });
            }
        }]);
</script>