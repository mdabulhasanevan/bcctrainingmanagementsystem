  <style>
  
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #04AA6D;
}  
  

.sticky {
      position: sticky;
      top: 10px;
}
.sticky2 {
      position: sticky;
      top: 20px;
      background-color:red;
}

.myTimediv{
position:fixed;
top:180px;
right: 50px; 
font-size:16px !important;
text-align:center;
background-color:#FFFFFF; border-radius: 10px; color:black; border:1px solid black; padding: 3px;
    
}
.MobileTimer{display:none;}

@media (max-width: 600px) { 
.myTimediv{display:none;}
.MobileTimer{display:block; position:fixed; top:180px; right: 5px; background-color:#FFFFFF; border-radius: 10px; color:black; border:1px solid black; padding: 3px;}

 }

</style>
<div class="" ng-controller="CreateQuestionCtrl"   style="background-color: #ffffff; ">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">



      <span  style="background-color:#ffffff; position: fixed; left: 50%; top: 40%; transform: translate(-50%, -50%); color:red; font-size:11px; text-align:left;"
      id="fullScreen"  class=" btn btn-lg" ng-show="showBtn==0"  >
          
           
        <ol class="list-group">
            
            <li class="list-group-item"><h4 style="color:#078903;">    গুরুত্বপূর্ণ নির্দেশাবলী </h4>   </li>
             <li class="list-group-item">>রিফ্রেশ বা পৃষ্ঠাটি পুনরায় লোড এবং Backword বাটনে ক্লিক করা নিষেধ  </li>
            <li class="list-group-item">> প্রতি একক প্রশ্নের জন্য শুধুমাত্র একটি সুযোগ  </li>
            <li class="list-group-item">> উত্তর দিতে  ক্লিক করুন  </li>
             <li class="list-group-item">> সময় পেজ এর ডান  পাশে প্রদর্শিত হবে </li>
        </ol>
       <button ng-click=" GetSearchQuestion(<?php echo $ExamID;?>);" class="btn btn-warning pull-right"  onclick="openFullscreen();" > পরীক্ষা শুরু করুন        
      </button> 
      </span>

       

    <!--list of question-->
    <div class="row">
        
      <!--   <div class="row myMobileTimeDiv sticky2 pull-right" style="" ng-show="ShowCheckResultBtn == 1" class="btn btn-danger"> -->
         <!--  <h3  class="pull-right btn btn-primary sticky">Total Question {{AllQuestion.OnlyQuestion.length}} and   Total: {{AllQuestion.setting.Time}} Min </h3>-->
        <!--<div class="col-md-4" style="font-size:15px;">Time Remain: {{time/ 60-0.5|number:0}} Min {{time% 60}} Sec </div>
          
          <div class="col-md-4" style="font-size:15px;">Selected: {{TotalSelected}} </div>
         
          <div  class="col-md-3" style="font-size:15px;">Unselected: {{AllQuestion.OnlyQuestion.length-TotalSelected}} </div>

        </div> -->

<!-- Time -->
        <div class="MobileTimer" ng-show="ShowCheckResultBtn == 1"> 
        Time: {{time/ 60-0.5|number:0}} m : {{time% 60}} s <br>
        Selected: {{TotalSelected}}  <br>
        Not Selected: {{AllQuestion.OnlyQuestion.length-TotalSelected}}
        </div>
        
      
       <div style="" ng-show="ShowCheckResultBtn == 1" class="myTimediv">
           
        <img data-ng-src="data:image/png;base64,<?php echo $_SESSION['Photo']   ?>" class="rounded-circle" style="text-align:center; width:80px; height:80px; "><br>
        Time: {{time/ 60-0.5|number:0}} m : {{time% 60}} s <br>
        Selected: {{TotalSelected}}  <br>
        Not Selected: {{AllQuestion.OnlyQuestion.length-TotalSelected}}

        </div>
      

       
       
        <!--Note-->
<div style="position:fixed; top:340px; right: 50px;" ng-show="ShowCheckResultBtn == 1">
         
        </div>
   
                
        <table class="table" style="margin-left:0px;">
            <tr>
                <th>Question </th>
                <th> </th>

            </tr>
            <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                
                <td style="width: 100%">  
                
                <span ng-hide="Item.Click == 1" >
                    <b>{{$index + 1}}]</b>
                        <p style="padding: 5px; padding-left:0px;  font-family: 'Times New Roman', Times, serif; font-size: 17px; font-weight:bold;">   {{Item.Question}} </p>

                        <div class="input-group mb-2 mr-sm-2" style="margin-left:30px;"  ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{getLetter($index)}}.</div>
                            </div>
                            <div class="input-group-prepend">
                                <div class="input-group-text"> 
                                <input type="checkbox" ng-model="x.Selected" style="width:30px; height:25px; "  ng-click="TakeAns(x); Item.Click = 1; x.Selected = 1;" /> 
                                </div>
                            </div>
                            <div class="input-group-prepend">
                                <div class="input-group-text"> {{x.MCQ}} </div>
                            </div>
                        </div>
                </span>     
                <span ng-show="Item.Click == 1" >
                    <div id="myProgress">
                      <div id="myBar"></div>
                    </div>
                    <b id="Answered"> উত্তর দেওয়া হয়েছে     </b>
                </span>     
                        
                </td>
                
       <!--     <td style="width: 30%"> 
               <br>
                     <p style="padding: 5px; padding-left:0px;  font-family: 'Times New Roman', Times, serif; font-size: 15px;" ng-show="Item.Description!=''"><b>Hints: </b><br> {{Item.Description}}  </p>
                    
                </td>
               <td style="width: 10%"> 
               <br>
                <span>{{Item.Link}}</span>
               
                
                <iframe width="560" height="315" ng-src="{{Item.Link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 
                </td>-->
            </tr>
            <tr>
                <td>
                    
                        <!--<button type="button" ng-show="ShowCheckResultBtn == 1" ng-click="CheckResult()" class="btn btn-success pull-left" data-toggle="modal" data-target="#myModal">Stop and Check Result</button>--> 
                <button type="button" ng-show="ShowCheckResultBtn == 1" ng-click="CheckResult(1)" class="btn btn-info pull-left" > উত্তর সাবমিট করুন  </button> 
<br><br><br><br>
                </td>

                <td> 
                
                </td>
            </tr>
        </table>
       

    </div>

    <!-- Modal for result List -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document"   style="width:950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close"  data-dismiss="modal" aria-label="Close" ng-click="ResetAll()"><span aria-hidden="true" >&times;</span></button>-->
                    <h4 class="modal-title btn btn-primary" id="myModalLabel">[{{Result.Correct}}/{{Result.Selected}}]--- Correct {{Result.Correct}}/Answered {{Result.Selected}}</h4>
                   
                </div>
                
              
                 <div class="modal-body">
                       <h4> সঠিকভাবে পরীক্ষা দেয়ার জন্য  আপনাকে ধন্যবাদ। আপনি  {{Result.Correct}} টি সঠিক  উত্তর দিয়েছেন।  </h4>

                     </div>

               <div class="modal-body"  ng-show="ResultView==1">

                 <table class="table table-striped">
                        <tr>
                            <th>Question </th>
                            <th>Your Answer </th>
                            <th>Right Answer </th>

                        </tr>
                        <tr ng-repeat="Item in AllQuestion.OnlyQuestion">
                            
                            <td> {{$index + 1}}]  <span style="padding: 5px; font-family: cursive; font-size: 13px;" class=""> {{Item.Question}} </span> </td>
                            <td>
                                <span style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                                    <span class="far fa-thumbs-up" ng-show="x.Answer == 1 && x.Selected == 1"> </span> 
                                    <span class="fas fa-times" ng-show="x.Answer == 0 && x.Selected == 1"> </span>
                                    <span style="padding: 3px; font-family: cursive; font-size: 10px;" ng-show="x.Selected == 1" class="label label-info"> {{x.MCQ}}</span>      
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold;" ng-repeat="x in AllQuestion.AllQuestion| filter:{QId:Item.QId}">
                                    <span style="padding: 3px; font-family: cursive; font-size: 10px;" ng-show="x.Answer == 1" class="label label-info"> {{x.MCQ}}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td> <button type="button"  ng-click="RedirectAndCloseResult()" class="btn btn-info pull-left" >  বন্ধ করুন  </button> </td>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer">
                   <!-- <button type="button" class="btn btn-danger" ng-click="ResetAll()" data-dismiss="modal">  এখানে  ক্লিক করুন (বাধ্যতামূলক ) </button>-->

                </div>
            </div>
        </div>
    </div>
    
     <!-- Modal for Pause Stop Warning -->
    <div class="modal fade" tabindex="-1" id="PauseModal" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">আপনার পরীক্ষাটি সাময়িক স্থগিত করা হয়ছে। </h5>
                    </div>
                    <div class="modal-body">
                    <p>পেজ  রিলোড করার প্রয়োজন  নেই      </p>
                     <p> আপনার বক্তব্য পরীক্ষা নিয়ন্ত্রককে জানান    </p>
                    
                    </div>
                    <div class="modal-footer">
                       
                    </div>
                </div>
            </div>
        </div>
    
    

</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">


    app.controller("CreateQuestionCtrl", ["$scope", "$http", "$timeout", "$interval",
        function ($scope, $http, $timeout,$interval) {
            init();
            function init() {
                initialize();
                getLocation();
              //  GetSearchQuestion(<?php echo $ExamID;?>);
                
            }
            function initialize() {
                $scope.getLocation=getLocation;
                $scope.showPosition=showPosition;
                $scope.latitude="";
                $scope.longitude="";
                
                
                $scope.QType = [];
                $scope.QSubType = [];
                $scope.QTypeAndQSubType = [];
                // $scope.GetAllExamTypeField = GetAllExamTypeField;
                $scope.GetSearchQuestion = GetSearchQuestion;
                
                $scope.RedirectAndCloseResult=RedirectAndCloseResult;
               
                
                $scope.Question = {};
                $scope.AllQuestion = [];
                $scope.Question.TypeId = null;
                $scope.Question.SubTypeId = null;

                $scope.TakeAns = TakeAns;
                
                $scope.ExAttendID = <?php echo $ExAttendID;?>
                
                //$scope.ClickedDisable = ClickedDisable;
                $scope.CheckResult = CheckResult;
                $scope.confirmAns =confirmAns;
                $scope.Result = {};
                
                $scope.PauseStopStatusAutoResult={};

                $scope.ResetAll = ResetAll;

                $scope.ShowCheckResultBtn = 0;

                //timer
                $scope.time = 0;
                $scope.TimeUp = 0;
                $scope.AllQuestionBlock = 0;
                $scope.timeLogout=0;
                
                
                $scope.SelectedAndAnswerdData=[];
                
               // $scope.ResultView=0;
                
                $scope.TotalSelected=0;
                  // the alphabet    
            $scope.alphabet=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            
            $scope.showBtn=0;
            
            }
            
            
            //geo location
            function getLocation()
            {
                var x = document.getElementById("demo");
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else { 
                    alert("Geolocation is not supported by this browser.");
                  }
            }
            
            function RedirectAndCloseResult()
            {
               window.location = "<?php echo base_url(); ?>StudentOpen/StudentDashBoard"; 
            }
                
            function showPosition(position) {
                
                $scope.latitude=position.coords.latitude;
                $scope.longitude=position.coords.longitude;
             
            }
            
            
            
          
            // get the index and return the letter of the alphabet
            $scope.getLetter = function(index) {
            
               return String.fromCharCode(65+index);
            
            };
                        
            
            
            //timer callback
            var timer = function () {
                if ($scope.time > $scope.TimeUp) {
                    $scope.time -= 1;
                    $timeout(timer, 1000);
                }
            }
            
            
           

            function CheckResult(value)
            {
                var r=true;
                if(value==1){
                var r=confirm("উত্তর সাবমিট করার ব্যাপারে  আপনি কি নিশ্চিত ??");
                }
                
                if(r==true)
                {
                    var CountSelected = 0;
                var CountAnswered = 0;

                angular.forEach($scope.AllQuestion.AllQuestion, function (Question) {
                    if (Question.Selected == 1)
                    {
                        CountSelected = CountSelected + 1;
                        if (Question.Answer == 1)
                        {
                            CountAnswered = CountAnswered + 1;
                        }
                    }
                });

                $scope.Result.TotalQuestion = $scope.AllQuestion.OnlyQuestion.length;
                $scope.Result.Selected = CountSelected;
                $scope.Result.Correct = CountAnswered;
                $scope.Result.ExamID = <?php echo $ExamID;?>;
                
               
               // $scope.Result.totalView=$scope.AllQuestion.OnlyQuestion;
                
                $scope.Result.AllDetail= $scope.SelectedAndAnswerdData
                
                
                
                //$scope.Result.TypeId = $scope.Question.TypeId;
                //$scope.Result.SubTypeId = $scope.Question.SubTypeId;

               // console.log($scope.Result);
               
                //console.log($scope.AllQuestion.OnlyQuestion);
               // console.log($scope.AllQuestion.AllQuestion);
                $http({
                    method: 'POST',
                    url: baseUrl + 'StudentOpen/SaveExamResult/',
                    data: $scope.Result
                }).then(function successCallback(response) {
                    
                    console.log(response.data);
                    
                    $scope.ResultCheckSaveStatus = 1;

                    // window.location = "<?php echo base_url(); ?>StudentOpen/StudentDashBoard";
                    $('#myModal').modal('toggle');
                    
                    
                    //this is for auto logout with in 10 sec
                    
                    if($scope.ResultView==0)
                    {
                       $timeout(function () {
                                init();
                                window.location = "<?php echo base_url(); ?>StudentOpen/StudentDashBoard";
                                
                                
                        }, 5000)
                    }
                    
                }, function errorCallback(response) {
                });
                    
                }
            }

             function confirmAns(Item)
            {
                var r = confirm("Are you sure??");
                if (r == true)
                {
                    Item.Click = 1;
                }
            }
            function TakeAns(All)
            {   
                
                //console.log($scope.AllQuestion.AllQuestion);
               // console.log(All);
                
                setTimeout(function(){
                    if (i == 0) {
                    i = 1;
                    var elem = document.getElementById("myBar");
                    var width = 1;
                    var id = setInterval(frame, 10);
                    function frame() {
                      if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                      } else {
                        width++;
                        elem.style.width = width + "%";
                      }
                    }
                  }
                    
                },5000); 
                
                $scope.All = All;
                var CountSelected = 0;
                   
                var CountAnswered = 0;
                
                const SelectedAndAnswerdData=[];
                
                angular.forEach($scope.AllQuestion.AllQuestion, function (Question) {
                    if (Question.Selected == 1)
                    {
                        SelectedAndAnswerdData.push(Question);    // selected and correct answered list generat
                        CountSelected = CountSelected + 1;
                        if (Question.Answer == 1)
                        {
                            CountAnswered = CountAnswered + 1;
                        }
                    }
                });
                
               
                $scope.SelectedAndAnswerdData=SelectedAndAnswerdData;
                
                 console.log($scope.SelectedAndAnswerdData); 
               
                $scope.Result.Correct = CountAnswered;
                $scope.Result.Selected=CountSelected;
                $scope.Result.ExamID = <?php echo $ExamID;?>;
                
                $http({
                    method: 'POST',
                    url: baseUrl + 'StudentOpen/UpdateTempTableWithSomeExamInfo/', //Selected
                    data: $scope.Result
                }).then(function successCallback(response) {
                   
                }, function errorCallback(response) {
                    
                });
                
                 $scope.TotalSelected=CountSelected;
               // alert($scope.TotalSelected);
                //console.log(All);
            }

            function GetSearchQuestion(XmId)
            {
               // alert(XmId);
               
               $scope.showBtn=1;
                var XmIdV=XmId;
                $scope.ResultCheckSaveStatus = 0;

                $scope.ShowCheckResultBtn = 1;
                $scope.time = 0;

              //  console.log($scope.Question);
                $scope.AllQuestion = [];
                 
                $http({
                    method: 'GET',
                    url: baseUrl + 'StudentOpen/GetSearchQuestion/'+ XmIdV
                }).success(function (data) {
                    $scope.AllQuestion = data;
                    
                   
                    
                     
                 //  console.log( $scope.AllQuestion);
                   // console.log(data);
                    if ($scope.AllQuestion.OnlyQuestion.length > 0)
                    {
                        // $scope.time = $scope.AllQuestion.OnlyQuestion.length * $scope.AllQuestion.setting.Time;
                        // $scope.TimeLength = $scope.AllQuestion.OnlyQuestion.length * $scope.AllQuestion.setting.Time;

                        $scope.ResultView= $scope.AllQuestion.setting.ResultView;
                     
                       // console.log($scope.ResultView);
                        
                        $scope.time = $scope.AllQuestion.setting.Time * 60;
                        
                        $scope.TimeLength = $scope.AllQuestion.setting.Time * 60;
                        
                       

                        $timeout(timer, 1000);
                        //10 seconds delay
                        $timeout(function () {
                            $scope.AllQuestionBlock = 1;

                            if ($scope.ResultCheckSaveStatus == 0)
                            {
                                CheckResult();
                               // alert("Time Out!! Please Stop");
                                // $('#myModal').modal('toggle');


                            }

                        }, $scope.TimeLength * 1000);
                    }


                })
            }


            function ResetAll()
            {
                init();
                window.location = "<?php echo base_url(); ?>StudentOpen/StudentDashBoard";
            }
            
            //For Pause Start or Stop by Admin
            $interval(function () {
            var ExAttendID= $scope.ExAttendID;
             //console.log(ExAttendID);
                     $http({
                        method: 'GET',
                        url: baseUrl + 'StudentOpen/GetPauseStopStatus/'+ExAttendID
                    }).then(function successCallback(response) {
                        $scope.PauseStopStatusAutoResult = response.data;
                        
                            if($scope.PauseStopStatusAutoResult.StopStatus==1)
                            {
                                CheckResult();
                            }
                            else if($scope.PauseStopStatusAutoResult.PauseStatus==1)
                            {
                                $('#PauseModal').modal('show');
                            }
                            else
                            {
                                $('#PauseModal').modal('hide');
                            }
                        
                        //console.log($scope.PauseStopStatusAutoResult.StopStatus);
                    }, function errorCallback(response) {
                    });
                  
              }, 20000); //working after every 10s
                
            
        }]);

//for full screen

  




/* View in fullscreen */
function openFullscreen() {
     var elem = document.documentElement;
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}
document.documentElement.requestFullscreen();

    
    //for disable ESC btn
      $("body").on("keyup", function(e){
        if (e.which === 27){
            return false;
        } 
    });

    //tab close alert
    //window.onbeforeunload = function(e) {  
       //return 'Your dialog message';
    //};
     
     
    //Tooltips

    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
</script>