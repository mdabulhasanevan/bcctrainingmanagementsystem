
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
                                    <i class="fas fa-user-plus" aria-hidden="true"></i> Add QusetionType</button>
                            </span>
                            
                            <h3>
                                <i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                        </div>

                        <div class="card-body">
                              <div class="table-responsive">
                             <table class="table table-striped">
                                <tr>
                                    <th>SN</th>
                                    <th>Subject Name </th>            
                                    <th>Action </th>
                                </tr>
                                <tr ng-repeat="QusetionSubject in AllQusetionSubject">
                                    <td>{{$index + 1}} </td>
                                    <td>{{QusetionSubject.Name}} </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" ng-click="Edit(QusetionSubject)" >Edit</button>
                                        <button class="btn btn-danger btn-sm" ng-click="DeleteQusetionSubject(QusetionSubject.Id)" >Delete</button></td>
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
<div class="modal-dialog" role="document" >
    <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel">Add  Subject</h4>
            <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           
        </div>
        <div class="modal-body">
            <form name="SOSForm" ng-submit="AddQusetionSubject()" />                   
            <div class="form-group">
                <label for="Exam" >QusetionSubject Name</label>
                <input class="form-control" ng-model="QusetionSubject.Name"  name="Exam"/>
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
        GetAllQusetionSubject();

    }
    function initialize() {
        $scope.AllQusetionSubject = [];
        $scope.DeleteQusetionSubject = DeleteQusetionSubject;
        $scope.AddQusetionSubject = AddQusetionSubject;
        $scope.QusetionSubject = {};
        $scope.Edit = Edit;
        $scope.reset=reset;

    }

    function GetAllQusetionSubject()
    {
        $scope.AllQusetionSubject = [];
        $http({
            method: 'GET',
            url: baseUrl + 'Setting/GetAllQusetionSubject/'
        }).then(function successCallback(response) {
            $scope.AllQusetionSubject = response.data;
        }, function errorCallback(response) {
        });
    }

    function DeleteQusetionSubject(id)
    {
        var SId = id;

        var r = confirm("Do you want to Delete!");
        if (r == true) {
            $http({
                method: 'GET',
                url: baseUrl + 'Setting/DeleteQusetionSubject/' + SId
            }).then(function successCallback(response) {
                swal("QusetionSubject!!", "Deleted Successfully!!");
                GetAllQusetionSubject();
            }, function errorCallback(response) {
                swal("QusetionSubject!", "Not Deleted!!!!");
            });

        }
    }

    function AddQusetionSubject()
    {
        console.log($scope.QusetionSubject);
        //update
        if ($scope.QusetionSubject.Id > 0)
        {
            $http({
                method: 'POST',
                url: baseUrl + 'Setting/UpdateQusetionSubject/',
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify($scope.QusetionSubject)
            }).success(function (data) {   
                console.log(data);
                GetAllQusetionSubject();
                $scope.QusetionSubject={};
                 $('#myModal').modal('toggle');
                swal("Successfully Updated", "QusetionSubject");
                
            });
        }
        else {   
            //add
            $http({
                method: 'POST',
                url: baseUrl + 'Setting/AddQusetionSubject/',
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify($scope.QusetionSubject)
            }).success(function (data) {
                console.log(data);
                GetAllQusetionSubject();
                 $('#myModal').modal('toggle');
                swal("Successfully added", "QusetionSubject");
                $scope.QusetionSubject = {};
            });
        }
    }

    function Edit(QusetionSubject)
    {
        $scope.QusetionSubject = {};
        $scope.QusetionSubject = QusetionSubject;
    }
    
    function reset()
    {
        $scope.QusetionSubject = {};
    }

}]);
</script>