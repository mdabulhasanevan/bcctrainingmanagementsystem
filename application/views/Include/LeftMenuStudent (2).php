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
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"type="text/javascript"></script>
        <link href="<?php echo base_url('dist/css/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('dist/css/js/bootstrap.min.js') ?>"type="text/javascript"></script>

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
        
       

    </head>

    <body ng-app="myApp" onkeydown="return (event.keyCode == 154)"  onselectstart="return false" style="background-color:green; ">

        <div class="row" style="background-color: #ffffff;">
            <div class="col-md-12">
                <div class="row" style="background-color: #a6e1ec">
                    <div class="col-md-2">
                         <img src="<?php echo base_url("dist/img/bcc_logo.png"); ?>" style="width: 35px;height: 35px;"/>
                       <!-- <img src="<?php echo base_url("dist/img/logoExp.JPG"); ?>" style="width: 120px;height: 35px;"/>-->
                    </div>
                    <div class="col-md-8">
                        
                      <h4 style="color:blue;text-align:center;">Welcome to Bangladesh Computer Council, Barishal, Online Examination System</h4>
                    </div>
                    <div class="col-md-2 pull-right">
                        <span class="" style="color:blue;"> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['StudentName'] ?></span> &nbsp;&nbsp;&nbsp;
                        <!--<span ><a href="<?php echo base_url(); ?>Auth/logoutStudent" class="btn btn-danger glyphicon glyphicon-off"></a></span>-->
                    </div>
                </div>
            </div>

            <div class="col-md-0"  style="background-color: #ffffff;">

                
 
            </div>
             <p class="fixed" style="margin: 0px; position: fixed; padding: 3px; bottom: 0;  right: 0; z-index: 500; font-size: 12px; background-color: #ffffff;  border:1px solid #3c763d; padding: 2px; text-align: center;"> Software Developed by : <a href="#">Md.Abul Hasan (Evan)</a>
                <br> Assistant Programmer, ICT Department.
            </p>


            <script language="JavaScript">
            document.oncontextmenu =new Function("return false;")
            </script>

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
                        yearRange: '-100y:c+nn',
                        maxDate: '+1d'
                    });
                });
                
                $(document).keypress(function(e) {
                    return false;
                });
            </script>