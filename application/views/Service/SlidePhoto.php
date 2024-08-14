<div ng-controller="SchoolCtrl" class="col-md-10" style="background-color: #ffffff;">

    <div class="col-md-6">
        <h2>Add  Photos</h2>

        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form action="" method="POST" enctype="multipart/form-data" />

        <div class="form-group">
            <label for="">Type</label>
            <select name="Type" class="form-control" required>
                <?php
                $i = 0;
                foreach ($PhotoType as $Type) {
                    ?>
                    <option value="<?php echo $Type->PTID; ?>"> <?php echo $Type->Type; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>   
        <div class="form-group">
            <label for="Headline" >Heading/Person's Name</label>
            <input class="form-control"  value='<?php echo $Heading; ?>' name="Heading" id="Heading"/>
        </div>
        <div class="form-group">
            <label for="Descriptions" >Descriptions  </label>

            <textarea class="form-control"  name="Descriptions"  id="Descriptions"><?php echo $Descriptions; ?> </textarea>
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
        <h4>Slide Photo List</h4>
        <table class="table" >
            <tr>
                <th>SN</th>
                <th>Heading </th>
                <th>Descriptions </th>
                <th>Type </th>
                <th>File </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="News in AllPhotos">
                <td>{{$index + 1}} </td>
                <td>{{News.Heading}} </td>
                <td>{{News.Descriptions}} </td>
                <td>{{News.PhotoType}} </td>
                <td><a ng-show="News.Photo" href='<?php echo base_url(); ?>dist/img/slider/{{News.Photo}}' target='_New'><img src='<?php echo base_url(); ?>dist/img/slider/{{News.Photo}}' width="100" height="50"/></a>  </td>
                <td><button class="" ng-click="DeletePhotos(News.PID, News.Photo)" >Delete</button>
                    <button ng-show="News.IsHide == 0" class="" ng-click="HidePhotos(News.PID, News.IsHide)" >Hide</button>
                    <button ng-show="News.IsHide == 1" class="" ng-click="HidePhotos(News.PID, News.IsHide)" >Show</button>
                </td>
            </tr>

        </table>

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
                GetAllPhotos();

            }
            function initialize() {
                $scope.AllPhotos = [];
                $scope.News = {};
                $scope.DeletePhotos = DeletePhotos;
                $scope.HidePhotos = HidePhotos;
            }

//                   function GetAllNews(){
//                       $scope.AllNews=[];
//			$http.get("<?= base_url('Service/GetAllNews'); ?>")
//			.success(function(data){
//		       $scope.AllNews = data;
//                       
//			})
//                    };

            function GetAllPhotos() {
                $scope.AllPhotos = [];

                $http({
                    method: 'GET',
                    url: baseUrl + 'Service/GetAllPhotos/'
                }).then(function successCallback(response) {
                    $scope.AllPhotos = response.data;
                }, function errorCallback(response) {
                });
            }
            ;

            function DeletePhotos(id, file)
            {
                var PID = id;
                var File = file;
                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Service/DeletePhotos/' + PID + '/' + File
                    }).then(function successCallback(response) {
                        GetAllPhotos();

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
                    GetAllPhotos();

                }, function errorCallback(response) {

                });
            }

        }]);
</script>
