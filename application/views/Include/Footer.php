<!--Right nav bar-->
<div class="col-md-2" style="margin-left: 0px;" >
    <div class="row" >
     <!--5 to 10 for official key persons 5=Regional Director....-->
        <?php
        foreach ($Office as $photo) {
            if ($photo->Type == 7) {
                ?>
                <a href="" class="btn btn-default btn-block"><?php echo $photo->PhotoType?></a>
                <img width="100%" height="200px" src="<?php echo base_url('dist/img/slider/') . $photo->Photo ?>"  alt=" " style="width:100%;"/>
                <p style="text-align: center;"><?php echo $photo->Heading?> </p>
                <a href="" class="btn btn-success btn-block">Details</a>                     
                <?php
               
            }
        }
        ?>

       <?php
        foreach ($Office as $photo) {
            if ($photo->Type == 6) {
                ?>
                <a href="" class="btn btn-default btn-block"><?php echo $photo->PhotoType?></a>
                <img width="100%" height="200px" src="<?php echo base_url('dist/img/slider/') . $photo->Photo ?>"  alt=" " style="width:100%;"/>
                <p style="text-align: center;"><?php echo $photo->Heading?> </p>
                <a href="" class="btn btn-success btn-block">Details</a>                     
                <?php
               
            }
        }
        ?>
                
                <?php
        foreach ($Office as $photo) {
            if ($photo->Type == 5) {
                ?>
                <a href="" class="btn btn-default btn-block"><?php echo $photo->PhotoType?></a>
                <img width="100%" height="200px" src="<?php echo base_url('dist/img/slider/') . $photo->Photo ?>"  alt=" " />
                <p style="text-align: center;"><?php echo $photo->Heading?> </p>
                <a href="" class="btn btn-success btn-block">Details</a>                     
                <?php
               
            }
        }
        ?>
    </div>


    <div class="row">
        <a href="<?php echo base_url('Home/Certificate_Validation') ?>" class="btn btn-default btn-block" target="_blank">Certificate validition</a>
        <a class="btn btn-default btn-block"  href="<?php echo base_url("auth/login"); ?>"> Admin Login</a>
        <a class="btn btn-default btn-block" href="<?php echo base_url("Auth/StudentLogin"); ?>" target="_blank">Student Login</a>
        <a class="btn btn-default btn-block" href="http://ictd.gov.bd/" target="_blank">ICT Directorate</a>
        <a class="btn btn-default btn-block" href="http://www.bangladesh.gov.bd" target="_blank">Government protal</a>
        <a class="btn btn-default btn-block" href="http://www.bcc.gov.bd" target="_blank">BCC,Headquarter</a>
        <a class="btn btn-default btn-block" href="http://www.LICT.gov.bd" target="_blank">Leveraging ICT</a>
        <a class="btn btn-default btn-block" href="http://www.cga.gov.bd/index.php?option=com_wrapper" target="_blank">Verify Chalan Form</a>    
    </div>
</div>

<!--this ending div come from index page-->
</div>

<!--footer started-->
<div class="row">

    <div> <img class="img-thumbnil img-responsive" src="images/3.png" alt="" width=100% /></div>
    <nav  class="navbar navbar-inverse">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5">
            <a class="navbar-brand" href="#"><img src="img/11.png" alt="" width="70" height="65" /></a>
            <a class="navbar-brand" href="#"><img src="img/20.jpg" alt="" width="70" height="65" /></a>
            <ul class="nav navbar-nav" style=" margin-top:25px;">
                <li><a href="?go=home">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="?go=about">About BCC</a></li>
                <li><a href="#">Activites</a></li>
                <li><a href="?go=contact_us">Contact us</a></li>

            </ul>

            <div style="width:500px; float:right;margin-top:5px;">
                <div id="social" style="width:500px; height:50px; float:right;">
                    <ul style="width:500px; height:50px;float:right;">

                        <li ><a  href="#"><i class="fa fa-facebook social-icon facebook" aria-hidden="true" ></i>

                            </a></li>

                        <li><a href="#"><i class="fa fa-twitter social-icon twitter" aria-hidden="true" ></i>
                            </a></li>

                        <li><a href="#"><i class="fa fa-youtube social-icon youtube" aria-hidden="true" ></i>
                            </a></li>


                        <li><a href="#"><i class="fa fa-envelope social-icon mail" aria-hidden="true" ></i>
                            </a></li>

                        <li><a href="#"><i class="fa fa-rss social-icon rss" aria-hidden="true" ></i>
                            </a></li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>
                        <li><a href="" class="btn"></a></li><li>


                        <li style="margin-top:0px;" ><a href="" class="btn btn-danger" style=" padding:6px;" > <i class="glyphicon glyphicon-circle-arrow-up"></i></a></li>


                    </ul>
                </div> <br />
                <div style="text-align:right; margin-top:5px;float:right;"> 
                    <p class="text-warning" >&copy; In total support: BCC regional office,Barisal.
                        Developed by: Mohammad Manirul islam & Mohammad Jasim &middot; <a href="#">Privacy</a> &middot; </p> 
                </div>


            </div>

        </div>







</div>
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
                // $scope.CertificateNo = 0;
                $scope.SerchCertificate = SerchCertificate;
                $scope.StudentDetail = {};
                $scope.Message = "";

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

                    if ($scope.StudentDetail.Status == 1)
                    {
                        $scope.Message = "This Certificate is valied.";
                    }
                    else
                    {
                        $scope.Message = "This Certificate is not valid.";
                    }
                    console.log($scope.StudentDetail);
                }, function errorCallback(response) {
                });
            }

        }]);
</script>

