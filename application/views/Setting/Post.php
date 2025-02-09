<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> POST </h1>
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
                  <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> অ্যাড করুন</button> 
                </div>
        
                 <div class="pull-right">
                    <form method="post" action="<?php echo base_url(); ?>Setting/Exportaction">
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
            
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>SN</th>
                <th>Post Name </th>            
                <th>Action </th>
            </tr>
            <tr ng-repeat="Post in AllPost">
                <td>{{$index + 1}} </td>
                <td>{{Post.PostName}} </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(Post)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeletePost(Post.PId)" >Delete</button></td>
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
                    <h4 class="modal-title" id="myModalLabel">Add Post</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form name="SOSForm" ng-submit="AddPost()" />                   
                    <div class="form-group">
                        <label for="Exam" >Post Name</label>
                        <input class="form-control" ng-model="Post.PostName"  name="Exam"/>
                    </div>
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" name="Create" id="Create">Add</button>
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
</body>
</html>

<script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                GetAllPost();

            }
            function initialize() {
                $scope.AllPost = [];
                $scope.DeletePost = DeletePost;
                $scope.AddPost = AddPost;
                $scope.Post = {};
                $scope.Edit = Edit;
                $scope.reset=reset;

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

            function DeletePost(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeletePost/' + SId
                    }).then(function successCallback(response) {
                        swal("Post!", "Deleted Successfully!!");
                        GetAllPost();
                    }, function errorCallback(response) {
                        swal("Post!", "Not Deleted!!!!");
                    });

                }
            }

            function AddPost()
            {
                console.log($scope.Post);
                //update
                if ($scope.Post.PId > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdatePost/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Post)
                    }).success(function (data) {   
                        console.log(data);
                        GetAllPost();
                        $scope.Post={};
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "Post");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddPost/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.Post)
                    }).success(function (data) {
                        console.log(data);
                        GetAllPost();
                         $('#myModal').modal('toggle');
                        swal("Successfully added", "Post");
                        $scope.Post = {};
                    });
                }
            }

            function Edit(Post)
            {
                $scope.Post = {};
                $scope.Post = Post;
            }
            
            function reset()
            {
                $scope.Post = {};
            }

        }]);
</script>