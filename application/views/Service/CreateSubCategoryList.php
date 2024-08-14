    <div class="content-page" ng-controller="SchoolCtrl" >
<!-- Start content -->
    <div class="content" >
        <h2>Add  Sub Category</h2>

        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form action="" method="POST" enctype="multipart/form-data" />
        <div class="form-group">
            <label for="">Category</label>
            <select name="CID" class="form-control" required>
                <?php
                $i = 0;
                foreach ($CID as $Type) {
                    ?>
                    <option value="<?php echo $Type->CID; ?>"> <?php echo $Type->Category; ?></option>
                    <?php
                }
                ?>
            </select>
        </div> 


        <div class="form-group">
            <label for="Headline" >List Name</label>
            <input class="form-control"  value='<?php echo $Category; ?>' name="Category" id="Category"/>
        </div>
        <div class="form-group">
            <label for="Detail" >Detail  </label>

            <textarea class="form-control"  name="Detail"  id="Descriptions"><?php echo $Detail; ?> </textarea>
        </div>

        <div class="form-group">
            <label for="Attachment">Attachment</label>
            <input type="file" class="form-control"  name="Attachment" id="Attachment"/>
        </div>


        <div class="form-group">

            <button type="submit" class="btn-info" name="Create" id="Create">Create</button>
        </div>
        </form>

    </div>
    <!--List of breaking news-->
    <br>
    <div class="col-md-6" style="overflow: scroll; height: 500px;">
        <h4>Sub Category List</h4>
        <table class="table" >
            <tr>
                <th>SN</th>
                <th>Category </th>
                <th>Detail </th>
                <th>Category Name</th>
                <th>Icon </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="News in AllCategory ">
                <td>{{$index + 1}} </td>
                <td>{{News.Category}} </td
                <td>{{News.Detail}} </td>
                <td>{{News.CategoryName}} </td>
                <td><a ng-show="News.Others" href='<?php echo base_url(); ?>dist/img/icon/{{News.Others}}' tariconget='_New'><img src='<?php echo base_url(); ?>dist/img/icon/{{News.Others}}' width="100" height="50"/></a>  </td>
                <td>
                    <button class="" ng-click="DeleteSubCategory(News.CSCID, News.Others)" >Delete</button>
                    <button class="" ng-click="SubCategoryEdit(News.CSCID)" >Edit</button>
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
                GetAllSubCategory();

            }
            function initialize() {
                $scope.AllCategory = [];
                $scope.News = {};
                $scope.DeleteSubCategory = DeleteSubCategory;
                $scope.HidePhotos = HidePhotos;
            }

//              

            function GetAllSubCategory() {
                $scope.AllCategory = [];

                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/GetAllSubCategory'
                }).then(function successCallback(response) {
                    $scope.AllCategory = response.data;
                }, function errorCallback(response) {
                });
            }
            ;

            function DeleteSubCategory(id, file)
            {
                var CSCID = id;
                var Icon = file;
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Service/DeleteSubCategory/' + CSCID + '/' + Icon
                    }).then(function successCallback(response) {
                        GetAllSubCategory();

                    }, function errorCallback(response) {

                    });
                }
            }

            function HidePhotos(PID, IsHide)
            {
                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/HideSubCategoryPhotos/' + PID + '/' + IsHide
                }).then(function successCallback(response) {
                    GetAllCategory();

                }, function errorCallback(response) {

                });
            }

        }]);
</script>
