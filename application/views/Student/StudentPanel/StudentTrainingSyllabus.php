<div class="content-page" ng-controller="DefaultCtrl">
  <!-- Start content -->
  <div class="content">
    <div class="row">
      <div class="col-12"> <?php
                if (isset($_SESSION['successErr'])) {
                        echo "
                        
				<div class='alert alert-danger alert-dismissible'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<div class='alert alert-danger'>" . $_SESSION['successErr'] . "</div>
				</div>";
                    }
                ?> </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="table-responsive">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
              <h5> কোর্সের বিষয়বস্তু </h5>
              
                  <table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th> বিষয়বস্তু </th>
                    </tr>
                    <tr ng-repeat="x in StudentTrainingSyllabus">
                      <th>{{$index + 1}}</th>
                      <th style="cursor: pointer" ng-click="OpenContent(x);"> {{x.TopicName}} </th>
                    </tr>
                  </table>
                  
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
              <h3>
                <i class="far fa-check-square"></i> বিস্তারিত
              </h3>
            <!--   <ng-youtube-embed video="videoURL" autoplay="true" color="white" disablekb="true" end="20" style="aspect-ratio: 16 / 9; width: 100%;"> </ng-youtube-embed>-->
             <iframe style="aspect-ratio: 16 / 9; width: 100%;" src="{{Content.Tutorials | trustAsResourceUrl}}" title="YouTube video player" frameborder="3" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
            <hr>
            <p>{{Content.SubjectDetail}}</p>
            
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
    </div>
    </body>
    </html>
    <script type="text/javascript">
    
    //Create a filter for trust url
    app.filter('trustAsResourceUrl', ['$sce', function($sce) {
    return function(val) {
        return $sce.trustAsResourceUrl(val);
    };
    }]);
    
      app.controller("DefaultCtrl", ["$scope", "$http",
        function($scope, $http){
          init();

          function init() {
            initialize();
            // GetAllStudent();
            GetStudentTrainingSyllabus();
            
          }

          function initialize() {
          
            $scope.StudentTrainingSyllabus = [];
            $scope.OpenContent=OpenContent;
            $scope.Content={};
          
          }
          
          function OpenContent(Content)
          {
              $scope.Content=Content;
              $scope.videoURL =$scope.Content.Tutorials;
              
             
              
          }
          
          function GetStudentTrainingSyllabus() {
            $http({
              method: 'GET',
              url: baseUrl + 'StudentOpen/GetStudentTrainingSyllabus/'
            }).then(function successCallback(response) {
              $scope.StudentTrainingSyllabus = response.data;
              console.log($scope.StudentTrainingSyllabus);
            }, function errorCallback(response) {});
          }

          
        }
      ]);
    </script>