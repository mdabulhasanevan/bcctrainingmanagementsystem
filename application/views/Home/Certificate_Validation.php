<div class="row" ng-controller="DefaultCtrl">
    <div class="col-md-10" style="margin-left: -15px;" > 

        <div class="col-md-12">


            <div style="text-align: center;" >
       
            
                <div  style="margin: auto; margin-top: 5px; background-color: #761c19; color: white; padding: 5px;">
                    <h4>Certificate Validity Check</h4>
                    <form>
                        <div class="form-group">
                            <input class="form-control" required type="text" placeholder="Certificate No" ng-model="CertificateNo"  name="CertificateNo"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" ng-click="SerchCertificate();" class="btn btn-info" name="Create" id="Create">Search</button>
                        </div>
                    </form>
                    <h4>{{Message}}</h4>
                    <div ng-show="StudentDetail.Status == 1">
                        <table class="table table-condensed" style="font-size: 12px;">
                            <tr>
                                <th>Name </th>
                                <td>{{StudentDetail.Result.StudentName}} </td>

                            </tr>
                            <tr>
                                <th>Course Title </th>
                                <td>{{StudentDetail.Result.Title}} </td>
                            </tr>
                            <tr>
                                <th>Course ID </th>
                                <td>{{StudentDetail.Result.Batch}} </td>
                            </tr>
                            <tr>
                                <th>Certificate No </th>
                                <td>{{StudentDetail.Result.CertificateNo}} </td>
                            </tr>
                            <tr>
                                <th>Start </th>
                                <td>{{StudentDetail.Result.StartDate}} </td>
                            </tr>
                            <tr>
                                <th>End </th>
                                <td>{{StudentDetail.Result.EndDate}} </td>
                            </tr>
                            <tr>
                                <th>Course Duration </th>
                                <td>{{StudentDetail.Result.DurationHour}} </td>
                            </tr>
                            <tr>
                                <th>Session </th>
                                <td>{{StudentDetail.Result.FiscalYear}} </td>
                            </tr>
                            
                            <tr>
                                <th>Certificate Status </th>
                                <td>{{StudentDetail.Result.Status}} </td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <script type="text/javascript">

    app.controller("DefaultCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();

            }
            function initialize() {
               // $scope.CertificateNo = 0;
                $scope.SerchCertificate = SerchCertificate;
                $scope.StudentDetail = {};
                $scope.Message="";

            }

            function SerchCertificate()
            {
               // alert("ok");
                var Number = $scope.CertificateNo;
                $http({
                    method: 'GET',
                    url: baseUrl + 'Home/SerchCertificate/' + Number
                }).then(function successCallback(response) {
                    $scope.StudentDetail = response.data;
                    
                    if($scope.StudentDetail.Status==1)
                    {
                        $scope.Message="This Certificate is valied.";
                    }
                    else
                    {
                        $scope.Message="This Certificate is not valid.";
                    }
                    console.log($scope.StudentDetail);
                }, function errorCallback(response) {
                });
            }

        }]);
</script>