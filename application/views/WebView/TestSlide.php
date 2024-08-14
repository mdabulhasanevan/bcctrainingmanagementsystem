<div class="" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">

   <div class="container-fluid">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Dashboard</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
         
         <div class="row">
            
          <div class="card-body">  
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="https://via.placeholder.com/600x350" alt="First slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>Item 1 title</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="https://via.placeholder.com/600x350" alt="Second slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>Item 2 title</h3>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="https://via.placeholder.com/600x350" alt="Third slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>Item 3 title</h3>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
        </div>
        
        
        </div>
            
            
            
            
         </div>
         
       

    </div>
</div>
    


</div>
<!-- END content-page -->

</div>
    <!-- END main -->
</body>
</html>


<script type="text/javascript">
   app.controller("DefaultCtrl", ["$scope", "$http",
       function ($scope, $http) {
           init();
           function init() {
               initialize();
   
   
           }
           function initialize() {
   
               var d = new Date()
               var weekday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
               $scope.ToDay = weekday[d.getDay()];
           }
   
   
   
   
       }]);
</script>
