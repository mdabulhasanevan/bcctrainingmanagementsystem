<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="<?php echo base_url('dist/img/favicon.jpg') ?>" type="image/gif" sizes="16x16">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- You can use Open Graph tags to customize link previews.
         Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
        <meta property="og:url"           content="<?php echo current_url(); ?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="<?php
        if (isset($MyNews)) {
            echo $MyNews->Headline;
        }
        ?>" />
        <meta property="og:description"   content="<?php
        if (isset($MyNews)) {
            echo $MyNews->Detail;
        }
        if (isset($MyShareDetail)) {
            echo $MyShareDetail;
        }
        ?>" />
        <meta property="og:image"         content="<?php
        if (isset($Image)) {
            echo $Image;
        } else {
            echo base_url('dist/img/LogoforFb.jpg');
        }
        ?>" />

        <link href="<?php echo base_url('dist/css/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('dist/css/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('dist/css/js/bootstrap.min.js') ?>"></script>
   

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       

        <link href="<?php echo base_url('dist/css/MyStyle.css') ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <!--angular-->
        <script src="<?php echo base_url('dist/angular/angular.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('dist/angular/angular-route.js') ?>" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>

        <script src="<?php echo base_url('dist/App.js') ?>" type="text/javascript"></script>

        <title><?php echo $Title; ?></title>
    </head>

    <body ng-app="myApp" >  

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 header1" style="z-index: 9999;">
                    <a href="<?php echo base_url(""); ?>" title=""> <img src="<?php echo base_url("img/11.png"); ?>" style="width: 50px; height: 50px;"/></a> 
                    Bangladesh Computer Council, Barishal
                </div>

                <!--slider-->
                <?php
                if ($slide == 1) {
                    ?>
                    <div id="myCarousel" class=" isSlideShow carousel slide" data-ride="carousel">

                        <div id="header-site-info">

                            <div id="logo">
                                <a  style="padding-right: 15px;" class="col-md-1" href="<?php echo base_url(""); ?>" title=""> <img src="<?php echo base_url("img/11.png"); ?>"/></a> 
                                <div class="col-md-11" id="site-name-wrapper">
                                    <span id="site-name">
                                        <a  href="">Bangladesh Computer Council Barishal</a>
                                    </span>
                                    <br>
                                    <span id="slogan">
                                        ICT Division <br /> Ministry of Posts, Telecommunications and Information Technology.
                                    </span> 

                                </div> 
                            </div>

                        </div>


                        <!--Slide Start Indicators--> 
                        <ol class="carousel-indicators">
                            <?php
                            $i = 0;
                            foreach ($Slide as $photo) {
                                if ($photo->Type == 1) {
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?php $i; ?>" class=" <?php
                        if ($i == 0) {
                            echo "active";
                        } else {
                            echo "";
                        }
                                    ?>"></li>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                        </ol>


                        <!--Wrapper for slides--> 
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            foreach ($Slide as $photo) {
                                if ($photo->Type == 1) {
                                    ?>
                                    <div class="item <?php
                        if ($i == 0) {
                            echo "active";
                        } else {
                            echo "";
                        }
                                    ?> ">
                                        <img src="<?php echo base_url('dist/img/slider/') . $photo->Photo ?>" alt=" " style="width:100%;">
                                    </div>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </div>



                        <!--Left and right controls--> 
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--slider end-->
                    <?php
                }
                ?>
                <!--menu top-->
                <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0px;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo base_url(""); ?>"><img src="<?php echo base_url("img/11.png"); ?>" width="30" height="30"/></a>
                        </div>
                        <div id="navbar1" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo base_url(""); ?>">Home <span class="sr-only">(current)</span></a></li>
                                <li class="dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Oraganogram</a></li>
                                        <li><a href="?go=keyperson">Keyperson</a></li>
                                        <li><a href="?go=stuff">Stuff</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="?go=about">About BCC</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Activites</a></li>
                                    </ul>
                                </li>
                                <li><a href="?go=gallary">Gallery</a></li>
                                <li><a href="?go=regional_office">Regional office</a></li>
                                <li><a href="?go=admission">Addmission</a></li>
                                <li><a href="?go=contact_us">Contact us</a></li>
                                <li><a href="link/register1.php" ><i class="glyphicon glyphicon-user">+</i></a></li>
                            </ul>
                            <form class="navbar-form navbar-right" style="margin-right:20px;">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                            </form>

                        </div>
                    </div>
                </nav>

            </div>

        </div>


