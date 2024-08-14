<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $Title; ?></title>
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5929940240997788"
     crossorigin="anonymous"></script>
    
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

    <!-- Custom CSS -->
    
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
     
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
 

    <!-- BEGIN CSS for this page -->
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/datatables/datatables.min.css') ?>" />
    <!-- END CSS for this page -->
    
    <!--Angular -->
     <script src="<?php echo base_url('dist/App.js') ?>" type="text/javascript"></script>
     
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- BEGIN CSS for this page -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

   <style>
       .content-page
       {
           margin-left:0px !important;
           
       }
   </style>
     
</head>

<body ng-app="myApp" class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar" ng-controller="LeftCtrl" >

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="<?php echo base_url('Webview/index') ?>" class="logo">
                    <img alt="Logo" src="<?php echo base_url('dist/img/bcc_logo.png') ?>" />
                    <span><b>বিসিসি- বরিশাল </b></span>
                </a>
            </div>
           

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                       
                       
                        
                       <li class="list-inline-item dropdown notif" title="Quick menu">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="fab fa-buromobelexperte"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                           <div class="dropdown-item noti-title">
                                <h5>
                                    <small>Quick Menu</small>
                                </h5>
                            </div>

                            <!-- item-->
                            
                            <a href="<?php echo base_url('Auth/login') ?>" class="dropdown-item notify-item"> Login </a>
                            <a href="<?php echo base_url('Auth/StudentLogin') ?>" class="dropdown-item notify-item"> Student Login </a>
                            <a href="<?php echo base_url('Webview/PublicLogin') ?>" class="dropdown-item notify-item"> Public Login </a>
                           
                             
                             <div class="dropdown-item noti-title">
                               
                            </div>

                           
                        </div>

                    </li>
                    

                </ul>

               
            </nav>

        </div>
        <!-- End Navigation -->

      
        
        <script src="<?php echo base_url('assets/js/modernizr.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>

        <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
        

        <script src="<?php echo base_url('assets/js/detect.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/fastclick.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.blockUI.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?>"></script>

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
   
  <!-- BEGIN Java Script for this page -->
    
    
               <!--angular-->
        <script src="<?php echo base_url('dist/angular/angular.js') ?>" type="text/javascript"></script>
       <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.js" integrity="sha512-rCVQBDU9Ny0aKLo1/B1MqgRjWEMlCL3WJ0DD6mJeK6qMZqpN9JCRxPtMQWWR9XWCMFIqlSgT4uOdwpvxWTSejw==" crossorigin="anonymous"></script>-->
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
    <!-- END Java Script for this page -->
        
        
        
<script type="text/javascript">


   $.getJSON("https://api.countapi.xyz/hit/www.nazirpur.expresstechbd.com/visits", function(response) {
    $("#visits").text(response.value);
    });


    app.controller("LeftCtrl", ["$scope", "$http",
        function ($scope, $http) {
            init();
            function init() {
                initialize();
                //GetAllEducationalInstitute();
               // GetAllUpazilaList();
               
            
              
                

            }
            function initialize() {
           
                
                   
            }
            
  
            
           

        }]);
        
        
        
</script>
        
                 <script>
              

                $(function () {
                    $("#datepicker").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+1d'
                    });
                });
                $(function () {
                    $("#datepicker2").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-100y:c+nn',
                        maxDate: '+1d'
                    });
                });
                $(function () {
                    $("#datepicker3").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                      
                    });
                });

            </script>
 
     
        
        