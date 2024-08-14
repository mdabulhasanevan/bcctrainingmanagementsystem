<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $Title; ?></title>
      <meta name="description" content="Dashboard | Nazirpur">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Your website">
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url('dist/img/bcc_logo.png') ?>">
      <script src="<?php echo base_url('dist/jquery.min.js') ?>"type="text/javascript"></script>
      <!-- Bootstrap CSS -->
      <!-- CSS only -->
      <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
      <!-- Font Awesome CSS -->
     
      <link href="<?php echo base_url('assets/font-awesome/css/all.css') ?>" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
     
     

      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
      <!-- BEGIN CSS for this page -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/datatables/datatables.min.css') ?>" />
      <!-- END CSS for this page -->
      <!--Angular -->
    
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!--//try to download this file-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- BEGIN CSS for this page -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/chart.js/Chart.min.css')?>" />
       <!-- Custom CSS -->
      <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
      <!-- END CSS for this page -->   
   </head>
   <body ng-app="myApp" class="adminbody">
      <div id="main">
      <!-- top bar navigation -->
      <div class="headerbar" ng-controller="LeftSideCtrl">
       
         
      </div>
      <!-- End Navigation -->
      <!-- Left Sidebar -->
     
     
     
      <!-- End Sidebar -->
      <script src="<?php echo base_url('assets/js/modernizr.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/detect.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/fastclick.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.blockUI.js') ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.js" integrity="sha512-wvgsp3xEKrcb+x3VGdlHOTpVmqCbPmSUNbD4VYW3Ub1M49xNjQh7LjKKi6jrHFEw6AVRngaUtYYBiI8L4Vw22w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <!-- App js -->
      <script src="<?php echo base_url('assets/js/admin.js') ?>"></script>
      <!-- BEGIN Java Script for this page -->
      <script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/datatables.min.js') ?>"></script>
      <!-- Counter-Up-->
      <script src="<?php echo base_url('assets/plugins/waypoints/lib/jquery.waypoints.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/counterup/jquery.counterup.min.js') ?>"></script>
      <!-- dataTabled data -->
      <script src="<?php echo base_url('assets/data/data_datatables.js') ?>"></script>
      <!-- Charts data -->
      <script src="<?php echo base_url('assets/data/data_charts_dashboard.js') ?>"></script>
      <!-- END Java Script for this page -->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
      <script src="https://code.jquery.com/jquery-migrate-1.0.0.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
      <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
      <!--angular-->
      <script src="<?php echo base_url('dist/angular/angular.js') ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('dist/angular/angular-route.js') ?>" type="text/javascript"></script>
      <!--toastr-->
      <script type="text/javascript" src="<?php echo base_url('dist/angular/angular-growl-notifications.min.js') ?>"></script>
      <script src="<?php echo base_url('dist/App.js') ?>" type="text/javascript"></script>
      <!--for print and pdf-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
      <script src="<?php echo base_url('dist/js/html2canvas.js') ?>"type="text/javascript"></script>
      <script src="<?php echo base_url('dist/js/canvasjs.min.js') ?>"type="text/javascript"></script>
      <script>
         $(function () {
             $("#datepicker").datepicker({
                 dateFormat: 'yyyy/mm/dd',
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '-100y:c+nn',
                 maxDate: '+1d'
             });
         });
         $(function () {
             $("#datepicker2").datepicker({
                 dateFormat: 'yyyy/mm/dd',
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '-100y:c+nn',
                 maxDate: '+1d'
             });
         });
         $(function () {
             $("#datepicker3").datepicker({
                 dateFormat: 'yyyy/mm/dd',
                 changeMonth: true,
                 changeYear: true,
               
             });
         });
         
      </script>
      <script>         
         app.controller("LeftSideCtrl", ["$scope", "$http",
         function ($scope, $http) {
         init();
         function init() {
            initialize();
         
         
         }
         function initialize() {
          $scope.StudentDhasboardSearch = [];
          $scope.GetAllStudentForDahsboardSearch = GetAllStudentForDahsboardSearch;
          
          $scope.ShowStudent=ShowStudent;
          $scope.StudentSingleData={};
          
         
         }
         
         function ShowStudent(Std)
         {
            $scope.StudentSingleData={};
            $scope.StudentSingleData=Std;
            console.log($scope.StudentSingleData);
         }   
         
         
         function GetAllStudentForDahsboardSearch(x)
         {
             $scope.StudentDhasboardSearch = [];
            var SID = x;
            if(SID.length>=3)
            {
               
         
                $http({
                    method: 'GET',
                    url: baseUrl + 'Student/GetAllStudentForDahsboardSearch/' + SID
                }).then(function successCallback(response) {
                    $scope.StudentDhasboardSearch = response.data;
                    console.log( $scope.StudentDhasboardSearch);
                    
                }, function errorCallback(response) {
                });
            }
         }
         
         
         
         
         }]);
      </script>