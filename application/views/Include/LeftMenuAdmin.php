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
     
     <!--ckeditor-->
      <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
   
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
      
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />-->
       
      
       
   </head>
   <body ng-app="myApp" class="adminbody">
      <div id="main">
      <!-- top bar navigation -->
      <div class="headerbar" ng-controller="LeftSideCtrl">
         <!-- LOGO -->
         <div class="headerbar-left">
            <a href="<?php echo base_url('user/index') ?>" class="logo">
               <img alt="Logo" src="<?php echo base_url('dist/img/bcc_logo.png') ?>" />
               <!--  <img alt="Logo" src="<?php echo base_url('dist/img/favicon.jpg') ?>" />-->
               <span>BCC-Barishal</span>
            </a>
            
         </div>
         <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
             
                <li class="list-inline-item dropdown notif">
                   
                  <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                  <i class="fa fa-search"></i>
                 <!-- <span class="notif-bullet"></span>-->
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                    
                         <div class="dropdown-item noti-title">
                            <h5>
                               <div class="input-group form-outline w-100">
                                    <input type="text" ng-model="StudentDataForSearchBox" placeholder="Search Student by any key word" ng-change="GetAllStudentForDahsboardSearch(StudentDataForSearchBox);" class="form-control" >
                                    <span class="input-group-addon btn btn-primary" ng-click="StudentDataForSearchBox='';GetAllStudentForDahsboardSearch(null)" style="cursor:pointer;">&#10006;</span>
                                
                                </div>
                            </h5>
                         </div>
                   
                    
                        <div  style="position:fixed; z-index:91; height:auto; width:auto;">
                        <table class="table table-striped"style="background:#e0ebeb;">
                    
                        <tr ng-repeat="StudentDashboard in StudentDhasboardSearch" data-toggle="modal" data-target="#myStudentShowModal" ng-click="ShowStudent(StudentDashboard)" style="cursor:pointer;">
                           <span >
                               <td>{{$index + 1}} </td>
                            <td>{{StudentDashboard.Name}}-({{StudentDashboard.RegNO}}) </td>
                            <td>{{StudentDashboard.Batch}}</td>
                            
                           </span>
                        </tr>
                        </table>
                        </div>
                   
                     
                  </div>
               </li> 
              
             <!--  <li class="list-inline-item dropdown notif">
                  <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                  <i class="fas fa-cog"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-sm">
                     
                     <div class="dropdown-item noti-title">
                        <h5>
                           <small>Settings</small>
                        </h5>
                     </div>
                     
                     <a href="#" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                           <i class="fas fa-cog"></i>
                           <b>Settings 1</b>
                        </p> 
                     </a>
                  </div>
               </li>-->
                <li class="list-inline-item dropdown notif">
                  <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                  <i class="far fa-bell"></i>
                  <span class="notif-bullet"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                     <!-- item-->
                     <div class="dropdown-item noti-title">
                        <h5>
                           <small>
                           <span class="label label-danger pull-xs-right">5</span>Allerts</small>
                        </h5>
                     </div>
                     <!-- item-->
                     <a href="#" class="dropdown-item notify-item">
                        <div class="notify-icon bg-faded">
                           <img src="<?php echo base_url('assets/images/avatars/avatar2.png')?>" alt="img" class="rounded-circle img-fluid">
                        </div>
                        <p class="notify-details">
                           <b>John Doe</b>
                           <span>User registration</span>
                           <small class="text-muted">3 minutes ago</small>
                        </p>
                     </a>
                     <!-- item-->
                     <!-- All-->
                     <a href="#" class="dropdown-item notify-item notify-all">
                     View All Allerts
                     </a>
                  </div>
               </li>
               <li class="list-inline-item dropdown notif">
                  <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                  <img src="<?php echo base_url('uploads/users/') . $_SESSION['Photo'] ?>" alt="Profile image" class="avatar-rounded">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                     <!-- item-->
                     <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                           <small> <?php echo $_SESSION['Name'] ?></small>
                        </h5>
                     </div>
                     <!-- item-->
                     <a href="<?php echo base_url('Service/UserProfile');  ?>" class="dropdown-item notify-item">
                     <i class="fas fa-user"></i>
                     <span>Profile</span>
                     </a>
                     <!-- item-->
                     <a href="<?php echo base_url('Auth/logout'); ?>" class="dropdown-item notify-item">
                     <i class="fas fa-power-off"></i>
                     <span>Logout</span>
                     </a>
                  </div>
               </li>
            </ul>
             
            <ul class="list-inline float-left mb-0">
               <li class="list-inline-item">
                  <button class="button-menu-mobile open-left">
                  <i class="fas fa-bars"></i>
                  </button>
               </li>
            </ul>
           
           
         </nav>
         
         
          <!-- Student Show Modal -->
    <div class="modal fade" id="myStudentShowModal" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-md" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Student Info</h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                </div>
                <div class="modal-body">
                   <h5>Basic Info</h5>    
            <table class="table table-striped">
            <tr>
                <th>Student Name:</th>
                <td>{{StudentSingleData.Name}}</td>
                <td rowspan="4" style="text-align:center;"> <img data-ng-src="data:image/png;base64,{{StudentSingleData.Photo}}" width="150" height="150"> </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{StudentSingleData.Gender}}</td>
               
            </tr>
            <tr>
                <th>DOB</th>
                <td>{{StudentSingleData.DOB}}</td>
                
            </tr>
             <tr>
                <th>Disablities</th>
                <td>{{StudentSingleData.IsDisable}} [{{StudentSingleData.PhysicalDetail}}] </td>
                
            </tr>
             <tr>
                <th>Academic</th>
                <td>{{StudentSingleData.ExamName}}</td>
                 <th> Mobile:  {{StudentSingleData.Mobile}} </th>
                
               
            </tr>
            <tr>
                <th>NID/BR NO</th>
                <td>NID:{{StudentSingleData.NID}} - BR:  {{StudentSingleData.BirthCirtificate}}</td>
               <th> Email : {{StudentSingleData.Email}} </th>
            </tr>
           
            </tr>
             
        </table> 
            <h5>Officials Info</h5>   
            <table class="table table-striped">
           
            <tr>
               
                <th>Batch:</td> 
                <td>{{StudentSingleData.Batch}} </td> 
                
                <th>Reg</td>
                <td>{{StudentSingleData.RegNO}}</td>
            </tr>
            <tr>
                <th>Fiscal Year </th>
                <td>{{StudentSingleData.FiscalYear}} </td>
                <th>Calender Year </th>
                <td>{{StudentSingleData.CalenderYear}}  </td>
            </tr>
             <tr>
                <th>Fee </th>
                <td>{{StudentSingleData.CourseFee}} </td>
                <th>DurationType</th>
                <td>{{StudentSingleData.DurationTypeName}} [{{StudentSingleData.DurationHour}}] Hours</td>
            </tr>  
            <tr>
                <th>Start-End</th>
                <td>{{StudentSingleData.StartDate}}-{{StudentSingleData. EndDate}}</td>
                <th>BatchType</th>
                <td>{{StudentSingleData.BatchTypeName}} </td>
            </tr>
            <tr>
                <th>ParticipentType</th>
                <td>{{StudentSingleData.ParticipentTypeName}} </td>
                <th>Detail</th>
                <td>{{StudentSingleData.ParticipantDetail}}</td>
            </tr>
             
        </table>  
        
            <h5>Certificate Info</h5>
                 
            <table class="table table-striped">
            <tr>
                <th> Is Certified </th>
                <th> Certificate No </th>
              
            </tr>
            <tr>
                <td>{{StudentSingleData.IsCertified}} </td>
                <td>{{StudentSingleData.CertificateNo}} </td>
              
            </tr>
        </table>      
            
                 </div>
                <div class="modal-footer">

                    <button type="button" ng-click="reset()" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--modal end-->
         
      </div>
      <!-- End Navigation -->
      <!-- Left Sidebar -->
      <div class="left main-sidebar">
         <div class="sidebar-inner leftscroll">
            <div id="sidebar-menu">
              
               <ul>
                   
                     <li class="submenu" >
                            <a id="tables" href="#">
                                <i class="fas fa-poll"></i>Quick Menu
                             <span class="menu-arrow"></span> </a>   
                            <ul class="list-unstyled">
                            
                             <?php
                               foreach ($_SESSION["QuickMenu"] as $y) {
                               ?>
                                <li><a href="<?php echo base_url().$y->URI; ?>"> <i class="fas fa-poll"></i><?php echo $y->MenuName; ?></a> </li>
                                
                                <?php
                                }
                                
                                ?>
                        
                            
                            </ul> 
                                 
                         
                     </li>
                
                   
                  <?php
             foreach ($_SESSION["Menu1"] as $x) {
                 $count = 0;
                 $hasSub = '';
                 foreach ($_SESSION["Menu2"] as $y) {
                     if ($y->MainMenuID == $x->ID) {
                         $count++;
                     }
                 }
                 
                 
                 if ($count > 0) {
                     //$hasSub = 'has-sub';
                 ?>
                  <li class="submenu" >
                     <a id="tables" href="#">
                     <i class="<?php echo $x->Icon; ?>"></i>
                     <span class=""> <?php echo $x->MenuName; ?> </span>
                     <span class="menu-arrow"></span> </a>
                     <ul class="list-unstyled">
                        <?php
                           foreach ($_SESSION["Menu2"] as $y) {
                           if ($y->MainMenuID == $x->ID) {
                           ?>
                            <li>
                            <a href="<?php echo base_url().$y->Url; ?>"> <i class="<?php echo $y->Icon; ?>"></i><?php echo $y->MenuName; ?></a>
                            
                            </li>
                        <?php
                           }
                           }
                           ?>
                     </ul>
                  </li>
                  <?php    
                     }
                     else
                     {
                     ?>    
                          <li class="submenu">
                             <a href="<?php echo base_url().$x->Url; ?>">
                            <i class="<?php echo $x->Icon; ?>"></i>
                             <span> <?php echo $x->MenuName; ?> </span>
                             </a>
                          </li>
                  <?php   
                     }
                     }
                     ?>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
      
        
    
      
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
                 dateFormat: 'yy/mm/dd',
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '-100y:c+nn',
                 maxDate: '+1d'
             });
         });
         $(function () {
             $("#datepicker2").datepicker({
                 dateFormat: 'yy/mm/dd',
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '-100y:c+nn',
                 maxDate: '+1d'
             });
         });
         $(function () {
             $("#datepicker3").datepicker({
                 dateFormat: 'yy/mm/dd',
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
            //console.log(Std); 
            $scope.StudentSingleData={};
            $scope.StudentSingleData=Std;
            //console.log($scope.StudentSingleData);
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