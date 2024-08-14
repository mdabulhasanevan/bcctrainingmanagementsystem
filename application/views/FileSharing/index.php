<div class="content-page" ng-controller="SchoolCtrl">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row"> <?php
            if (isset($_SESSION['success'])) {
                echo "
				<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
            }
            
            ?> <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
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
                  <span class="pull-right">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ng-click="reset()">  <i class="fas fa-user-plus" aria-hidden="true"></i> Add File </button>
                  </span>
                  <h3>
                    <i class="far fa-copy"></i> <?php  echo $Title;  ?>
                  </h3>
            </div>
            
            <div class="card-body">
             <div class="row">
                  <div class="col-6" >
                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                    <h4>Your Files</h4>
                    <table class="table table-bordered">
                      <tr>
                        <th>SN</th>
                        <th>Headline </th>
                        <th>File </th>
                        <th>Action </th>
                      </tr>
                      <tr ng-repeat="News in AllMyfiles">
                        <td>{{$index + 1}} </td>
                        <td><b>{{News.Headline}} </b>(<span style="font-size:8px;">({{News.Date}}) </span>  </td>
                        <td>
                        
                       <ul ng-hide="News.FileName==''" ng-repeat="file in News.FileName.split(', ')" style="font-size:9px;" >
                       <li >
                          <a  href='<?php echo base_url(); ?>uploads/SharedFiles/{{file}}' target='_New'>{{file.substring(0, 20)}} </a>
                    
                         </li></ul>
                        </td>
                        <td>
                          
                          <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myPostShareModal" ng-click="Edit(News); GetAllUserList(News.FID);">Share</button>
                        
                           <button class="btn btn-sm btn-danger" ng-click="DeleteFile(News.FID)">Delete</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-6">
                            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                            <h4>Shared With You</h4>
                            <table class="table table-bordered">
                             <tr>
                        <th>SN</th>
                        <th>From </th>
                        <th>Headline </th>
                        <th>File </th>
                      
                      </tr>
                      <tr ng-repeat="News2 in AllFilesThatSharedWithMe">
                        <td>{{$index + 1}} </td>
                        <th>{{News2.Name}}-{{News2.PostName}}  </th>
                        <td><b>{{News2.Headline}} </b> <span style="font-size:8px;">({{News2.Date}} )</span>  </td>
                        <td>
                            
                        <ul ng-hide="News.FileName==''" ng-repeat="file in News2.FileName.split(', ')" style="font-size:9px;" >
                       <li >
                          <a  href='<?php echo base_url(); ?>uploads/SharedFiles/{{file}}' target='_New'>{{file.substring(0, 20)}} </a>
                    
                </li></ul>
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
    

    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add File </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" />
                <div class="form-group">
                    <label for="Headline" >Headline</label>
                    <input class="form-control" value='<?php echo $Headline; ?>' name="Headline" id="Headline"/>
                </div>
                
                <div class="form-group">
                    <label for="Attachment">Attachment</label>
                    <input type="file" class="form-control" name="Attachment[]" multiple id="Attachment"/>
                </div>
           
                <div class="form-group">
        
                    <button class="btn-info" name="add" id="Create">Add</button>
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
    
    
    <!-- Edit and Share Modal -->
    <div class="modal fade" id="myPostShareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Share File </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
               <form name="SOSForm" ng-submit="" />  
                <div class="form-group">
                    <label for="Headline" >Headline</label>
                    <input class="form-control" ng-model="MyPost.Headline" name="Headline" id="Headline"/>
                </div>
                <div class="form-group">
                    <label for="Headline" >Descriptios</label>
                    <input class="form-control" ng-model="MyPost.Descriptios" name="Descriptios" id="Descriptios"/>
                </div>
                <div class="form-group">
                    <label for="Headline" >Attachments</label>
                    <ul ng-hide="MyPost.FileName==''" ng-repeat="file in MyPost.FileName.split(', ')" style="font-size:9px;" >
                        <li >
                          <a  href='<?php echo base_url(); ?>uploads/SharedFiles/{{file}}' target='_New'>{{file.substring(0, 20)}} </a>
                           <button class="btn btn-sm btn-danger" ng-click="DeleteOnlyFile(MyPost.FID, file)">Delete</button>
                    
                         </li>
                    </ul>
                </div>
                 <div class="form-group">
                    <label for="Attachment">Attachment</label>
                    <input type="file" ng-model="MyPost.Attachment" class="form-control" name="Attachment[]" multiple id="Attachment"/>
                </div>
                
                <div class="form-group">
                    
                     <table class="table table-striped">   
                    <tr>
                        <th><input type="checkbox" ng-model="CheckedAll" ng-click="checkAll()" /></th>
                        
                    </tr>
                    <tbody >
                        <tr ng-repeat="User in AllUserList">
                            <td><input type="checkbox" ng-model="User.Selected1" ng-init="User.Selected1 = 0" ng-click="User.Selected = User.Selected1"  ng-checked="User.Selected == 1"  ng-true-value="1" ng-false-value="0" /> {{ User.Name}}  </td>
                                                  
                        </tr>
                    </tbody>
                </table>
                    
                </div>
                
                <div class="form-group">
                 <button type="Submit" class="btn btn-info" name="Create" ng-click="UpdateSharedUserIDWithHeadline();" id="Create"> Update</button>
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
</body>
</html>


<script type="text/javascript">

    app.controller("SchoolCtrl", ["$scope", "$http",
        function ($scope, $http) {
           
            init();
            
            function init() {
                initialize();
                GetAllFiles();
                GetAllFilesThatSharedWithUser();
                GetAllFilesThatSharedWithMe();
                
            }
            function initialize() {
                $scope.AllMyfiles = [];
                $scope.AllFilesThatSharedWithUser = [];
                $scope.UpdateSharedUserIDWithHeadline=UpdateSharedUserIDWithHeadline;
                $scope.GetAllUserList=GetAllUserList;
                 $scope.AllUserList = [];
                 $scope.MyPost = {};
                 
                 $scope.FileNames={};
                 
                 $scope.AllFilesThatSharedWithMe=[];
                 
                 
                 $scope.DeleteOnlyFile=DeleteOnlyFile;
                
                $scope.News = {};
                $scope.DeleteFile = DeleteFile;
                $scope.HideNews = HideNews;
                 
                $scope.Edit = Edit;
                $scope.reset=reset;
            }
            
        $scope.checkAll = function checkAll() {

                if ($scope.CheckedAll) {
                    $scope.CheckedAll = true;
                } else {
                    $scope.CheckedAll = false;
                }
                angular.forEach($scope.AllUserList, function (User) {
                    User.Selected = $scope.CheckedAll;
                });
                console.log($scope.AllUserList);
            };
        
          function GetAllFiles() {
            $scope.AllMyfiles = [];
            $http({
              method: 'GET',
              url: baseUrl + 'FileSharing/GetAllFiles/'
            }).then(function successCallback(response) {
              $scope.AllMyfiles = response.data;
            }, function errorCallback(response) {});
          };
          
          function GetAllFilesThatSharedWithMe() {
            $scope.AllFilesThatSharedWithMe = [];
            $http({
              method: 'GET',
              url: baseUrl + 'FileSharing/GetAllFilesThatSharedWithMe/'
            }).then(function successCallback(response) {
              $scope.AllFilesThatSharedWithMe = response.data;
            }, function errorCallback(response) {});
          };
          
          function GetAllFilesThatSharedWithUser() {
            $scope.AllFilesThatSharedWithUser = [];
            $http({
              method: 'GET',
              url: baseUrl + 'FileSharing/GetAllFilesThatSharedWithUser/'
            }).then(function successCallback(response) {
              $scope.AllFilesThatSharedWithUser = response.data;
            }, function errorCallback(response) {});
          };
          
          function GetAllUserList(fid) {
              var fid=fid;
            $scope.AllUserList = [];
            $http({
              method: 'GET',
              url: baseUrl + 'FileSharing/GetAllUserList/'+fid
            }).then(function successCallback(response) {
              $scope.AllUserList = response.data;
              
              console.log($scope.AllUserList);
            }, function errorCallback(response) {});
          };
          
           function UpdateSharedUserIDWithHeadline()
            {
                var Selected='';
                //update
                if ($scope.MyPost.FID > 0)
                {
                  //  console.log($scope.AllUserList);
                    
                    angular.forEach($scope.AllUserList, function (User) {
                        if(User.Selected==1){
                            Selected=Selected+User.Id+','
                        }
                     
                    });
               // console.log(Selected);
                  
                  $scope.MyPost.SharedID=Selected.trim().replace(/,(?![^,]*,)/, '');
                  console.log( $scope.MyPost);
                    
                    $http({
                        method: 'POST',
                        url: baseUrl + 'FileSharing/UpdateSharedUserIDWithHeadline/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.MyPost)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllFiles();
                        GetAllFilesThatSharedWithMe();
                        $scope.MyPost={};
                         $('#myPostShareModal').modal('toggle');
                        swal("Successfully Updated", "File");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateMyPost/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Batch)
                    }).success(function (data) {
                        console.log(data);
                        GetAllBatch();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "Batch");
                        $scope.Batch = {};
                    });
                }
            }


            function DeleteFile(id)
            {
                var fid = id;
               
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'FileSharing/DeleteFile/' + fid
                    }).then(function successCallback(response) { 
                       GetAllFiles();
                       GetAllFilesThatSharedWithMe();
                    }, function errorCallback(response) {

                    });

                }
            }
            
              function DeleteOnlyFile(fid,file)
            {
                
               console.log(fid,file);
                $scope.Info={};
               $scope.Info.fid=fid;
               $scope.Info.file=file;
               
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'FileSharing/DeleteOnlyFile/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Info)
                    }).then(function successCallback(response) { 
                        console.log(response.data);
                        
                       GetAllFiles();
                       GetAllFilesThatSharedWithMe();
                    }, function errorCallback(response) {

                    });

                }
            }

            function HideNews(BrId, IsHide)
            {
                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/HideNews/' + BrId + '/' + IsHide
                }).then(function successCallback(response) {
                    GetAllNews();

                }, function errorCallback(response) {

                });
            }
            
             function Edit(MyPost)
            {
                $scope.MyPost = {};
                $scope.MyPost = MyPost;
            }
            
            function reset()
            {
                $scope.Batch = {};
            }
            
             

        }]);
</script>
