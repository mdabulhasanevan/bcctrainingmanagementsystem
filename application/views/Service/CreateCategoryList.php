

    <div class="content-page" ng-controller="SchoolCtrl" >
<!-- Start content -->
    <div class="content" >
    <div class="col-md-6">
        <h2>Add  Category</h2>

        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form action="" method="POST" enctype="multipart/form-data" />


        <div class="form-group">
            <label for="Headline" >Category Name</label>
            <input class="form-control" required value='<?php echo $Category; ?>' name="Category" id="Category"/>
        </div>
        <div class="form-group">
            <label for="Detail" >Detail  </label>

            <textarea class="form-control"  name="Detail"  id="Descriptions"><?php echo $Detail; ?> </textarea>
        </div>

        <div class="form-group">
            <label for="Attachment">Attachment</label>
            <input type="file" class="form-control" required name="Attachment" id="Attachment"/>
        </div>

        <div class="form-group">

            <button type="submit" class="btn-info" name="Create" id="Create">Create</button>
        </div>
        </form>

    </div>
    <!--List of breaking news-->
    <br>
    <div class="col-md-6" style="overflow: scroll; height: 500px;">
      <h4> Category List</h4>
        <table class="table" >
            <tr>
                <th>SN</th>
                <th>Category </th>
                <th>Detail </th>

                <th>Icon </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="News in AllCategory">
                <td>{{$index + 1}} </td>
                <td>{{News.Category}} </td>
                <td>{{News.Detail}} </td>
                <td><a ng-show="News.Icon" href='<?php echo base_url(); ?>dist/img/icon/{{News.Icon}}' tariconget='_New'><img src='<?php echo base_url(); ?>dist/img/icon/{{News.Icon}}' width="100" height="50"/></a>  </td>
                <td>
                    <button class="" ng-click="DeletePhotos(News.CID, News.Icon)" >Delete</button>
                    <button class="" ng-click="DeleteEdit(News.CID, News.Icon)" >Edit</button>
                </td>
            </tr>

        </table>

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
                GetAllCategory();

            }
            function initialize() {
                $scope.AllCategory = [];
                $scope.News = {};
                $scope.DeletePhotos = DeletePhotos;
                $scope.HidePhotos = HidePhotos;
            }

//              

            function GetAllCategory() {
                $scope.AllCategory = [];

                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/GetAllCategory'
                }).then(function successCallback(response) {
                    $scope.AllCategory = response.data;
                }, function errorCallback(response) {
                });
            }
            ;

            function DeletePhotos(id, file)
            {
                var CID = id;
                var Icon = file;
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Service/DeleteCategory/' + CID + '/' + Icon
                    }).then(function successCallback(response) {
                        GetAllCategory();

                    }, function errorCallback(response) {

                    });
                }
            }

            function HidePhotos(PID, IsHide)
            {
                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/HidePhotos/' + PID + '/' + IsHide
                }).then(function successCallback(response) {
                    GetAllCategory();

                }, function errorCallback(response) {

                });
            }

        }]);
</script>
