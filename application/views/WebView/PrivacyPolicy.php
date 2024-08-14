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
             <h3>We will Protect your privacy. not disclose any user informations with others</h3>
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
