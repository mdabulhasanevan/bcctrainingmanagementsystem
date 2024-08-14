<div ng-controller="SchoolCtrl" class="content-page"  style="background-color: #ffffff;">
<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> Notice  </h1>
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
                
                </div>
                    <!-- end card-header -->

  
    <!--List of EducationalInstitute-->
 <div class="card-body">
     <div class="row">
    <div class="col-md-6">
       
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form action="" method="POST" enctype="multipart/form-data" />
        <div class="form-group">
            <label for="Headline" >Headline</label>
            <input class="form-control" value='<?php echo $Headline; ?>' name="Headline" id="Headline"/>
        </div>
        <div class="form-group">
            <label for="Detail">Detail</label>
            <textarea class="form-control" name="Detail" id="Detail"><?php echo $Detail; ?></textarea>
        </div>
        <div class="form-group">
            <label for="Attachment">Attachment</label>
            <input type="file" class="form-control" name="Attachment" id="Attachment"/>
        </div>

        <div class="form-group">
            <label for="Detail">Type</label>
            <select name="Type" class="form-control">
                <option value="1"> Notice</option>
                <option value="2"> News </option>
                <option value="3"> Other</option>
            </select>
        </div>      
        <div class="form-group">

            <button class="btn-info" name="Create" id="Create">Create</button>
        </div>
        </form>

    </div>
    <!--List of breaking news-->
    <br>
    <div class="col-md-6" style="overflow: scroll; height: 500px;">
        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
        <table class="table table-bordered" >
            <tr>
                <th>SN</th>
                <th>Headline </th>
                <th>Date </th>
                <th>Type </th>
                <th>File </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="News in AllNews">
                <td>{{$index + 1}} </td>
                <td>{{News.Headline}} </td>

                <td>{{News.Date}} </td>
                <td>{{News.NewsType}} </td>
                <td><a ng-show="News.Other" href='<?php echo base_url(); ?>uploads/{{News.Other}}' target='_New'>file</a>  </td>
                <td><button class="btn btn-sm btn-danger" ng-click="DeleteNews(News.BrId, News.Other)" >Delete</button>
                    <button ng-show="News.IsHide == 0" class="btn btn-sm btn-info" ng-click="HideNews(News.BrId, News.IsHide)" >Hide</button>
                    <button ng-show="News.IsHide == 1" class="btn btn-sm btn-default" ng-click="HideNews(News.BrId, News.IsHide)" >Show</button>
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
    </div>
    </div>
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
                GetAllNews();

            }
            function initialize() {
                $scope.AllNews = [];
                $scope.News = {};
                $scope.DeleteNews = DeleteNews;
                $scope.HideNews = HideNews;
            }

//                   function GetAllNews(){
//                       $scope.AllNews=[];
//			$http.get("<?= base_url('Service/GetAllNews'); ?>")
//			.success(function(data){
//		       $scope.AllNews = data;
//                       
//			})
//                    };

            function GetAllNews() {
                $scope.AllNews = [];

                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/GetAllNews/'
                }).then(function successCallback(response) {
                    $scope.AllNews = response.data;
                }, function errorCallback(response) {
                });
            }
            ;

            function DeleteNews(id, file)
            {
                var BrId = id;
                var File = file;
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Service/DeleteNews/' + BrId + '/' + File
                    }).then(function successCallback(response) {
                        GetAllNews();

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

        }]);
</script>
