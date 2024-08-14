<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        

        <title><?php echo $Title; ?></title>

        <link rel="icon" href="<?php echo base_url('dist/img/favicon.jpg') ?>" type="image/gif" sizes="16x16">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <script src="<?php echo base_url('dist/jquery.min.js') ?>"type="text/javascript"></script>
        <!--for print-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"type="text/javascript"></script>
        <link href="<?php echo base_url('dist/css/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('dist/css/js/bootstrap.min.js') ?>"type="text/javascript"></script>
        
         <!--for PDF-->
       
        <script src="<?php echo base_url('dist/js/jspdf.js') ?>"type="text/javascript"></script>
         <script src="<?php echo base_url('dist/js/html2canvas.js') ?>"type="text/javascript"></script>
         <script src="<?php echo base_url('dist/js/canvasjs.min.js') ?>"type="text/javascript"></script>
         
            
            
        <!--jquery ui-->
        <script src="<?php echo base_url('dist/css/js/jquery-ui.js') ?>"type="text/javascript"></script>
        <link href="<?php echo base_url('dist/css/js/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css"/>

        <!--sweet Alert-->
        <script src="<?php echo base_url('dist/sweetalert/sweetalert.min.js') ?>"type="text/javascript"></script>

        <!--chart-->
        <script src="<?php echo base_url() ?>dist/chart/Chart.min.js" type="text/javascript"></script>
        <!--angular-->
        <script src="<?php echo base_url('dist/angular/angular.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('dist/angular/angular-route.js') ?>" type="text/javascript"></script>

        <!--toastr-->
        <script type="text/javascript" src="<?php echo base_url('dist/angular/angular-growl-notifications.min.js') ?>"></script>

        <script src="<?php echo base_url('dist/App.js') ?>" type="text/javascript"></script>

        <!--//try to download this file-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>



        <link href="<?php echo base_url('dist/css/MyStyle.css') ?>" rel="stylesheet" type="text/css"/>

        <!--//try to download this file-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Menu-->
        <link href="<?php echo base_url('dist/menu/AdminMenustyles.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('dist/menu/AdminMenuscript.js') ?>"type="text/javascript"></script>
         <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
         
         
<style>
        
.notification {
  color: white;
  text-decoration: none;
  padding: 7px 10px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  color:white;
  text-decoration:none;
}

.notification .badge {
  position: absolute;
  top: -3px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}
        </style>

    </head>

    <body ng-app="myApp" style="width: 98%">
        <div class="row" style="background-color: #ffffff;">
            <div class="col-md-12" style="">
                
                <div ng-controller="LeftSideCtrl" class="row" style="background-color: #3258a8; border-bottom: 2px solid #3c763d;position:fixed; z-index:999; top:0px;">
                 
                      <!--header logo-->
                    <div class="" style="background-color: #fff;float:left; width:5%;">
                        <img src="<?php echo base_url("dist/img/bcc_logo.png"); ?>" style="width: 35px;height: 35px;"/> 
                     
                    </div>
                          <div class="" style="background-color: #fff;float:left; width:5%;">
                               <a href="https://www.expresstechbd.com"> <img src="<?php echo base_url("dist/img/logoExp.JPG"); ?>" style="width: 80px;height: 35px;"/></a>
                          </div>
                   <!--header Student Search box-->
                    <div class="" style="background-color: #3258a8; float:left;  width:30%;">
                         
                        <div class="input-group">
                           
                        <input type="text" ng-model="StudentDataForSearchBox" placeholder="Search Student by any key word" ng-change="GetAllStudentForDahsboardSearch(StudentDataForSearchBox);" class="form-control" >
                        <span class="input-group-addon" ng-click="StudentDataForSearchBox='';GetAllStudentForDahsboardSearch(null)" style="cursor:pointer;">&#10006;</span>
                        </div>
                        
                       <div  style="position:fixed; z-index:91; height:auto; width:auto;">
                        <table class="table table-striped"style="background:#e0ebeb;">
                    
                        <tr ng-repeat="StudentDashboard in StudentDhasboardSearch" data-toggle="modal" data-target="#myStudentShowModal" ng-click="ShowStudent(StudentDashboard)" style="cursor:pointer;">
                           <span >
                               <td>{{$index + 1}} </td>
                            <td>{{StudentDashboard.Name}} </td>
                            <td>{{StudentDashboard.RegNO}} </td>
                            <td>{{StudentDashboard.Batch}}</td>
                            
                           </span>
                        </tr>
                        </table>
                        </div>
                        
                    </div>
                    <div  class="" style=" float:left;  width:40%;">
                        <a href="#" class="notification"> <span>Exam</span> <span class="badge">{{DashBoardHeaderInfo.ActiveExam}}</span> </a> &nbsp;&nbsp;&nbsp;&nbsp;
                      <!--  <a href="#" class="notification"> <span>Live Batch</span> <span class="badge">{{DashBoardHeaderInfo.Running}}</span> </a>-->
                        <a href="#LiveClass" class="notification"> <span>Class</span> <span class="badge">{{DashBoardHeaderInfo.TodaysClass}}</span> </a>
                        <a href="javascript:void(0);" class="notification icon2" id="icon2" onclick="myFunction()">  <i class="fa fa-bars"></i>   </a>
                    </div>
                   
                    <!--header Login-->
                    <div class="" style="height: 35px; float:right;  width:20%;">
                        <div class="">
                        <span class="" style="color:white; font-weight: bolder; "> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['Name'] ?>&nbsp;&nbsp;&nbsp;<span><a style="color:white; text-decoration:none; " class="glyphicon glyphicon-off" href="<?php echo base_url('Auth/logout'); ?>"></a></span> 
                        
                        </div>
                        
                         
                        
                    </div>

                    
                    
                    
    <!-- Student Show Modal -->
    <div class="modal fade" id="myStudentShowModal" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Student Info</h4>
                </div>
                <div class="modal-body">
                       
                     <h4>Basic Info</h4>   
            <table class="table table-striped">
            <tr>
               
                <th> Name </th>
                <th> RegNo </th>
                <th> Gender </th>
                   <th>  Disable </th>
                <th>  Detail </th>
            </tr>
            <tr>
                <td>{{StudentSingleData.Name}} </td>
                <td>{{StudentSingleData.RegNO}} </td>
                 <td>{{StudentSingleData.Gender}} </td>
                     <td>{{StudentSingleData.IsDisable}} </td>
                  <td>{{StudentSingleData.PhysicalDetail}} </td>
               
            </tr>
        </table> 
        
                    
                     <h4>Officials Info</h4>   
           <table class="table table-striped">
            <tr>
               
                <th> RegNo </th>
                <th> Session </th>
                <th> Year </th>
                <th> Batch </th>
                <th> Fee </th>
               
            </tr>
            <tr>
               
                <td>{{StudentSingleData.RegNO}} </td>
                <td>{{StudentSingleData.FiscalYear}} </td>
                <td>{{StudentSingleData.CalenderYear}} </td>
                <td>{{StudentSingleData.Batch}} </td>
                <td>{{StudentSingleData.CourseFee}} </td>
                       
            </tr>
            <tr>
               
                 <th> Type </th>
                <th> Hour </th>
                   <th> Start- End </th>
                <th> Batch Type </th>
                
                <th> Participant Type </th>
            </tr>
            <tr>
               
                
                 <td>{{StudentSingleData.DurationTypeName}} </td>
                <td>{{StudentSingleData.DurationHour}} </td>
                
                 <td>{{StudentSingleData.StartDate}}-{{StudentSingleData. EndDate}}</td>
                <td>{{StudentSingleData.BatchTypeName}} </td>
                
                <!-- <td>{{StudentSingleData.ParticipentTypeName}} </td>-->
                
            </tr>
        </table>  
                 
                  <h4>Contact Info</h4>
                 
        <table class="table table-striped">
            <tr>
                <th> Mobile </th>
                <th> Email </th>
              
            </tr>
            <tr>
               <td>{{StudentSingleData.Mobile}} </td>
                <td>{{StudentSingleData.Email}} </td>
              
            </tr>
        </table>      
                 
                 <h4>Certificate Info</h4>
                 
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
            </div>
            
            

<br>
            <div class="col-md-2"  style="background-color: #ffffff;">
<br>
                

                <div id='cssmenu' style="" >
                    <ul>   
                        <li> <a class="btn" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"> </span> Goto Web Site</a>  </li>
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
                                $hasSub = 'has-sub';
                            }
                            ?>
                            <li class='<?php echo $hasSub; ?>'><a class="btn" href="<?php echo base_url() . $x->Url; ?>"><span class="<?php echo $x->Icon; ?>"> </span> <?php echo $x->MenuName; ?></a>
                                <?php
                                foreach ($_SESSION["Menu2"] as $y) {
                                    if ($y->MainMenuID == $x->ID) {
                                        ?>
                                        <ul>
                                            <li class=""> <a class="btn" href="<?php echo base_url() . $y->Url; ?>"><span class="<?php echo $y->Icon; ?>"> </span> <?php echo $y->MenuName; ?></a></li>
                                        </ul>
                                        <?php
                                    }
                                }
                                ?>
                            </li>  
                            <?php
                        }
                        ?>
                    </ul>
                   
                </div>

            </div>
           <!--    <script async defer id='201922204150233' src='https://widgets.worldtimeserver.com/Public.ashx?rid=201922204150233&theme=Analog&action=clock&wtsid=BD&hex=ff9900&city=Dhaka&size=small'></script>

            <!--company logo and Developer bottom-->

            <p class="fixed" style="margin: 0px; position: fixed; padding: 3px; bottom: 0;  right: 0; z-index: 500; font-size: 8px; background-color: #ffffff;  border:1px solid #3c763d; padding: 2px; text-align: center;"> Software Developed by : <a href="https://www.linkedin.com/in/abulhasanevan">Md.Abul Hasan (Evan)</a>
                <br> Assistant Programmer, ICT Department
            </p>

          
             


            <!--Menu resonsive-->
            <script>
                var x = 1;
                function myFunction() {
                    var cssmenu = document.getElementById("cssmenu");

                    if (x == 1)
                    {
                        document.getElementById("cssmenu").style.display = "block";
                        document.getElementById("cssmenu").style.marginTop = "0px";
                       
                        
                        
                        x = 0;
                    }
                    else
                    {
                        cssmenu.style.display = "none";
                        document.getElementById("cssmenu").style.marginTop = "0px";
                        x = 1;
                    }


                }

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
                GetDahsBoardHeaderInfoAll();

            }
            function initialize() {
              $scope.StudentDhasboardSearch = [];
              $scope.GetAllStudentForDahsboardSearch = GetAllStudentForDahsboardSearch;
              
              $scope.ShowStudent=ShowStudent;
              $scope.StudentSingleData={};
              
               $scope.GetDahsBoardHeaderInfoAll= GetDahsBoardHeaderInfoAll;
               $scope.DashBoardHeaderInfo=[];
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
            
            function GetDahsBoardHeaderInfoAll()
            {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'User/GetDahsBoardHeaderInfoAll/'
                    }).then(function successCallback(response) {
                        $scope.DashBoardHeaderInfo = response.data;
                        console.log( $scope.DashBoardHeaderInfo);
                        
                    }, function errorCallback(response) {
                    });
            }


        }]);
</script>
