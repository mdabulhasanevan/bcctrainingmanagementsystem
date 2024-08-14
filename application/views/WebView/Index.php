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
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card mb-3">
         <div class="card-header">
            <h3> বিসিসি  বরিশাল  অনলাইন  সিস্টেমে  স্বাগত   </h3>
         </div>
         <div class="card-body">
            <div class="row">
               <!--Chart -->
              
               <div class="col-md-8" id="" >
                    <div class="col-md-12">
                  <h6 style=""> <i class="far fa-check-square"></i> আজকের   ক্লাস সমূহ : </h6>
                  <p>
                     <?php foreach ($TodaysClass as $value) {
                        echo "<b>" .
                            $value->Batch .
                            "</b> [" .
                            $value->StartTime .
                            "-" .
                            $value->EndTime .
                            "], &nbsp;&nbsp;";
                        } ?>
                  <hr>
                  </p>
               </div>
                  <div  class="col-md-12" >
                     <h6 style="text-align:left;"> <i class="far fa-check-square"></i> প্রশিক্ষণের জন্য ভর্তি চলছে  </h6>
                     <table class="table table-striped" >
                        <?php foreach ($AdmissionOpen as $value) { ?>
                        <tr>
                           <td> <?php echo $value->BatchName; ?> </td>
                           <td> <?php echo $value->AdmissionDetail; ?> </td>
                           <td> <!--<a href="/AdmissionReg">pdf </a>--> </td>
                           <td> <a class="btn btn-sm btn-success" href="<?php echo base_url(); ?>Webview/AdmissionReg"> আবেদন করুন </a></td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <div  class="col-md-12" >
                     <h6 style="text-align:left;"> <i class="far fa-check-square"></i> সার্টিফিকেট যাচাই করুন  </h6>
                     <form>
                        <div class="input-group form-outline w-100">
                           <input type="text" required ng-model="CertificateNo" placeholder="Certificate No" class="form-control" >
                           <span type="submit" class="input-group-addon btn btn-primary" ng-click="SerchCertificate();" style="cursor:pointer;">Search</span>
                        </div>
                     </form>
                     <div ng-show="StudentDetail.Status == 0">
                        <h5>{{Message}}</h5>
                     </div>
                     <div ng-show="StudentDetail.Status == 1" style="background-image: url("/dist/img/icon/verified.jpg");">
                     <table class="table table-condensed caption-top" style="font-size: 12px;">
                        <tr class="text-primary">
                           <th>
                              <img class="animate__heartBeat" src="dist/img/icon/verified.jpg" width="70" heigth="70"/>
                           </th>
                           <td class="float-right"><span  ng-click="StudentDetail={};CertificateNo=''" style="cursor:pointer;">&#10006;</span></td>
                        </tr>
                        <tr>
                           <th>Name </th>
                           <td>{{StudentDetail.Result.StudentName}} </td>
                        </tr>
                        <tr>
                           <th>Course Title </th>
                           <td>{{StudentDetail.Result.Title}} </td>
                        </tr>
                        <tr>
                           <th>Course ID </th>
                           <td>{{StudentDetail.Result.Batch}} </td>
                        </tr>
                        <tr>
                           <th>Certificate No </th>
                           <td>{{StudentDetail.Result.CertificateNo}} </td>
                        </tr>
                        <tr>
                           <th>Start </th>
                           <td>{{StudentDetail.Result.StartDate}} </td>
                        </tr>
                        <tr>
                           <th>End </th>
                           <td>{{StudentDetail.Result.EndDate}} </td>
                        </tr>
                        <tr>
                           <th>Course Duration </th>
                           <td>{{StudentDetail.Result.DurationHour}} </td>
                        </tr>
                        <tr>
                           <th>Session </th>
                           <td>{{StudentDetail.Result.FiscalYear}} </td>
                        </tr>
                        <tr>
                           <th>Certificate Status </th>
                           <td>{{StudentDetail.Result.Status}} </td>
                        </tr>
                     </table>
                  </div>
               </div>
               <hr>
               <div class="col-md-12">
                  <div class="row">
                      
                      <h5 class="col-md-12"><i class="far fa-check-square"></i> Reports: (Session: <?php echo $FiscalYear  ?>)</h5>
                     <div class="col-md-4" style="">
                        <h6>Batch List </h6>
                        <table class="table table-striped" style="font-size: 11px;" >
                           <tr style="text-align: center;">
                              <th>Batch </th>
                              <th> M</th>
                              <th>F </th>
                              <th>Total </th>
                           </tr>
                           <?php
                              foreach ($StudentListBatchWise as $value) {
                                  ?>
                           <tr>
                              <th> <?php echo $value->Batch ?></th>
                              <td> <?php echo $value->Male ?></td>
                              <td> <?php echo $value->Female ?></td>
                              <td> <?php echo $value->Number ?></td>
                           </tr>
                           <?php
                              }
                              ?>
                        </table>
                     </div>
                     <div class="col-md-8" style="font-size: 11px; text-align: center">
                        <h6> Duration Type Report</h6>
                        <table class="table table-striped" style="" >
                           <tr>
                              <th>Year </th>
                              <th>Type </th>
                              <th> Batch</th>
                              <th>Disable </th>
                              <th> M</th>
                              <th>F </th>
                              <th>Total </th>
                           </tr>
                           <?php
                              foreach ($DurationTypeThisYear as $value3) {
                                  ?>
                           <tr>
                              <td> <?php echo $value3->FiscalYear ?></td>
                              <td> <?php echo $value3->DurationType ?></td>
                              <td> <?php echo $value3->BatchNumber ?></td>
                              <td> <?php echo $value3->Disable ?></td>
                              <td> <?php echo $value3->Male ?></td>
                              <td> <?php echo $value3->Female ?></td>
                              <td> <?php echo $value3->Total ?></td>
                           </tr>
                           <?php
                              }
                              ?>
                        </table>
                        <h6> Batch Type Report</h6>
                        <table class="table table-striped"  >
                           <tr>
                              <th>Year </th>
                              <th>Type </th>
                              <th> Batch</th>
                              <th>Disable </th>
                              <th> M</th>
                              <th>F </th>
                              <th>Total </th>
                           </tr>
                           <?php
                              foreach ($BatchTypeThiseYear as $value2) {
                                  ?>
                           <tr>
                              <td> <?php echo $value2->FiscalYear ?></td>
                              <td> <?php echo $value2->BatchType ?></td>
                              <td> <?php echo $value2->BatchNumber ?></td>
                              <td> <?php echo $value2->Disable ?></td>
                              <td> <?php echo $value2->Male ?></td>
                              <td> <?php echo $value2->Female ?></td>
                              <td> <?php echo $value2->Total ?></td>
                           </tr>
                           <?php
                              }
                              ?>
                        </table>
                        
                         <h6> Location Wise  Report</h6>
                        <table class="table table-striped" style="" >
                           <tr>
                              <th>SN </th>
                              <th>District </th>
                              <th> Upazila</th>
                              <th>Students </th>
                            
                           </tr>
                           <?php
                              foreach ($UpazilaReport as $value3) {
                                  ?>
                           <tr>
                              <td> </td>
                              <td> <?php echo $value3->DistrictName ?></td>
                              <td> <?php echo $value3->UpazilaName ?></td>
                              <td> <?php echo $value3->TotalStudent  ?></td>
                             
                           </tr>
                           <?php
                              }
                              ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4" >
               <h5><i class="far fa-check-square"></i> প্রশিক্ষণার্থী লগিন </h5>
               <form autocomplete="off" method="post" action="../Auth/StudentLogin" >
                  <div class="form-row">
                     <div class="form-group col-md-5">
                        <input type="text"  name="RegNO" required class="form-control" id="inputEmail4" placeholder="Reg" autocomplete="off">
                     </div>
                     <div class="form-group col-md-4">
                        <input type="password" class="form-control" required name="Mobile" id="inputPassword4" placeholder="Password" autocomplete="off">
                     </div>
                     <div class="form-group col-md-3">
                        <button class="form-control btn btn-primary" type="submit" name="Signin" id="Signin" value="Login">Log in</button>
                     </div>
                  </div>
               </form>
               <hr>
               <h5><i class="far fa-check-square"></i> নোটিশ বোর্ড </h5>
               <table class="table table-bordered">
                  <tr style="background-color: #66afe9;">
                     <th>Headline</th>
                     <!--<th>Detail </th>-->
                     
                     <th>Action </th>
                  </tr>
                  <?php foreach ($Info["Notice"] as $News) {
                     //foreach ($rowAll as $News) {
                     echo "<tr>";
                     
                     echo "<td><a href='" .
                         base_url() .
                         "Webview/NoticeOpen/" .
                         $News->BrId .
                         "' title='' ><b>" .
                         $News->Headline .
                         " </b></a> (".  $News->Date . ")</td>";
                     
                     echo "<td>";
                     if ($News->Other != "") {
                         echo "<a class='glyphicon glyphicon-download-alt' href='" .
                             base_url() .
                             "uploads/" .
                             $News->Other .
                             "' target='_New'></a>";
                     }
                     ?>
                  <?php echo "<a href='" .
                     base_url() .
                     "Home/NoticeOpen/" .
                     $News->BrId .
                     "' title='' class='glyphicon glyphicon-eye-open' ></a>"; ?>
                  <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo base_url(); ?>Home/NoticeOpen/<?php echo $News->BrId; ?>&layout=button&size=small&mobile_iframe=true&appId=2072543979628136&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 
                  <?php
                     echo "</td>";
                     
                     echo "</tr>";
                     
                     } ?>
               </table>
            </div>
            <!--<div class="col-md-12" id="chartCurrentYearBatchWiseStudnet" style="height: 370px;"></div>-->
         </div>
         <!--Table of Data-->
         <!-- end row -->
      </div>
   </div>
   <!-- end card-->
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
               
               
                $scope.SerchCertificate = SerchCertificate;
                $scope.StudentDetail = {};
                $scope.Message="";
               
           }
            
             function SerchCertificate()
            {
               // alert("ok");
                var Number = $scope.CertificateNo;
                if(Number.length>2)
                {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Home/SerchCertificate/' + Number
                    }).then(function successCallback(response) {
                        $scope.StudentDetail = response.data;
                        
                        if($scope.StudentDetail.Status==1)
                        {
                            $scope.Message="Valied.";
                        }
                        else
                        {
                            $scope.Message="This Certificate is not valid.";
                        }
                        console.log($scope.StudentDetail);
                    }, function errorCallback(response) {
                    });
                }
                else{
                    alert("Please Input valide Certificate Number ")
                }
            }
   
   
   
       }]);
</script>
