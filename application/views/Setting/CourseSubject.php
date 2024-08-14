<div class="content-page" ng-controller="DefaultCtrl"  >

<!-- Start content -->
<div class="content" >
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> Course Subject's Topics and Detail </h1>
            <ol class="breadcrumb float-right">
                <li class=""><?php echo $_SERVER['REQUEST_URI']; ?></li>
                
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                <div class="pull-left">
                  <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> অ্যাড করুন</button> 
                </div>
        
                 <div class="pull-right">
                    <form method="post" action="<?php echo base_url(); ?>Setting/Exportaction">
                     <input type="submit" name="export" class="" value="Export" />
                    </form>
                    
                </div>
                <div class="pull-right">
                <form method="post" id="import_form" enctype="multipart/form-data">
                 
                   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                   <input type="submit" name="import" value="Import" class="" />
                </form>
                </div>
                </div>
                    <!-- end card-header -->

  
    <!--List of EducationalInstitute-->
 <div class="card-body">
        <div class="table-responsive">

    <div class="col-md-12">
        
        <div class="form-group">
                        <label for="Exam" >Course Title</label>
                         <select class="form-control"  ng-model="CourseTitle" ng-change="GetAllCourseSubject(CourseTitle);" required   name="CourseSubject" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
        
        <table class="table table-striped">
            <tr>
                
                <th>Day </th>
                <th>Subject Name  </th>
                <th>Topic  </th>
                <th>Discussion </th>
                <th>Link </th>
                 <th>IsExam </th>
                <th>Action </th>
            </tr>
            <tr ng-repeat="CourseSubject in AllCourseSubject">
                
                <td>{{CourseSubject.Day}} </td>
                 <td>{{CourseSubject.TopicName}} </td>
                <td>{{CourseSubject.SubjectDetail}} </td>
                 <td> <span>{{CourseSubject.Discussion}}</span> </td>
                <td>{{CourseSubject.Tutorials}} </td>
                <td> <span ng-show="CourseSubject.IsExam==1">Exam</span>  </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ng-click="Edit(CourseSubject)" >Edit</button>
                    <button class="btn btn-danger" ng-click="DeleteCourseSubject(CourseSubject.CSID)" >Delete</button>
                </td>
            </tr>
        </table>

    </div>


 </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
     
    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">কোর্সের দিন ভিত্তিক আলোচ্য সূচি তৈরি </h4>
                    <button type="button" ng-click="reset()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form ="SOSForm" ng-submit="AddCourseSubject()" />     
                     <div class="form-group">
                        <label for="Exam" > কোর্সের শিরোনাম  <span class="text-danger">*</span></label>
                         <select class="form-control"  ng-model="CourseSubject.CourseID" required ng-change="GetAllCourseSubjeTitleTopics(CourseSubject.CourseID);" required   name="CourseID" ng-options="Question.ID as Question.Title for Question in BatchabdExamCollection.CourseTitle">
                            <option value="">Choose Option</option>
                        </select>
                    </div>  
                    
                    
                    <div class="form-group">
                        <label for="Exam" >কোর্সের বিষয়ের শিরোনাম <span class="text-danger">*</span></label>
                        <select ng-model="CourseSubject.TopicName" required ng-options="x as x for x in TopicsList.split('>') " class="form-control" ng-required="true"> 
                        <option value="">-- Choose Month --</option>
                        </select>
                    </div>
                    
                    
                     <div class="form-group">
                        <label for="Exam" > দিন <span class="text-danger">*</span></label> 
                        <input class="form-control" id="test1" oninput="validateNumber(this);" type="text" required ng-model="CourseSubject.Day"  ="Detail"/>
                    </div>
                    <div class="form-group">
                        <label for="Exam" >আলোচ্য সূচি <span class="text-danger">*</span></label>
                        <textarea class="form-control" required ng-model="CourseSubject.SubjectDetail" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="Exam" > আলোচনা  <span class="text-danger">*</span></label>
                        <textarea  class="form-control" required ng-model="CourseSubject.Discussion" rows="4" name="Discussion1"></textarea>
                      <!--  <textarea ck-editor class="form-control" required ng-model="CourseSubject.Discussion" rows="4" name="Discussion1"></textarea>-->
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >টিউটরিয়াল  লিঙ্ক (youtube)</label>
                        <input class="form-control" ng-model="CourseSubject.Tutorials"/>
                    </div>
                    
                     <div class="form-group">
                        <label for="Exam" >এটা কি পরীক্ষা</label>
                        <select ng-model="CourseSubject.IsExam"  ng-required="true" class="form-control"> 
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
                    
                     
                    <div class="form-group">

                        <button type="Submit" class="btn btn-info" ="Create" id="Create"> সাবমিট করুন</button>
                    </div>
                    </form>
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
</body>
</html>

     <script>
            CKEDITOR.replace( 'Discussion' );
    </script>
    
    <script>
    var validNumber = new RegExp(/^\d*\.?\d*$/);
    var lastValid = document.getElementById("test1").value;
    function validateNumber(elem) {
      if (validNumber.test(elem.value)) {
        lastValid = elem.value;
      } else {
        elem.value = lastValid;
      }
    }
    </script>
    
<script type="text/javascript">

    

    app.controller("DefaultCtrl", ["$scope", "$http", "$filter",
        function ($scope, $http, $filter) {
            init();
            function init() {
                initialize();
                
                GetAllBatchandExamCollectionField();

            }
            function initialize() {
                $scope.AllCourseSubject = [];
                $scope.GetAllCourseSubject=GetAllCourseSubject;
                $scope.DeleteCourseSubject = DeleteCourseSubject;
                $scope.AddCourseSubject = AddCourseSubject;
                $scope.CourseSubject = {};
                $scope.Edit = Edit;
                $scope.reset=reset;
                $scope.BatchabdExamCollection =[];
                $scope.CourseTitle="";
                $scope.GetAllCourseSubjeTitleTopics=GetAllCourseSubjeTitleTopics;
                $scope.TopicsList =="";

            }
            
            function GetAllCourseSubjeTitleTopics(CourseID)
            {
                var x=CourseID;
               //  console.log(CourseID);
                $scope.CourseTitleFilterByID = $filter('filter')($scope.BatchabdExamCollection.CourseTitle, {'ID':x});
                $scope.TopicsList=  $scope.CourseTitleFilterByID[0].TopicsList
                console.log( $scope.TopicsList);
            }
            
             function GetAllBatchandExamCollectionField()
            {

                $http({
                    method: 'GET',
                    url: baseUrl + 'Exam/GetAllExamTypeField/'
                }).then(function successCallback(response) {
                    $scope.BatchabdExamCollection = response.data;


                }, function errorCallback(response) {
                });
            }

            function GetAllCourseSubject(x)
            {
               
             var id=x;   
             //console.log(id);
                $scope.AllCourseSubject = [];
                $http({
                    method: 'GET',
                    url: baseUrl + 'Setting/GetAllCourseSubject/'+id
                }).then(function successCallback(response) {
                    $scope.AllCourseSubject = response.data;
                    //console.log($scope.AllCourseSubject);
                }, function errorCallback(response) {
                });
                
                $scope.CourseTitleFilterByID = $filter('filter')($scope.BatchabdExamCollection.CourseTitle, {'ID':id});
                $scope.TopicsList=  $scope.CourseTitleFilterByID[0].TopicsList
            }

            function DeleteCourseSubject(id)
            {
                var SId = id;

                var r = confirm("Do you want to Delete!");
                if (r == true) {
                    $http({
                        method: 'GET',
                        url: baseUrl + 'Setting/DeleteCourseSubject/' + SId
                    }).then(function successCallback(response) {
                        swal("CourseSubject!", "Deleted Successfully!!");
                       
                        GetAllCourseSubject($scope.CourseTitle);
                    }, function errorCallback(response) {
                        swal("CourseSubject!", "Not Deleted!!!!");
                    });

                }
            }

            function AddCourseSubject()
            {
                console.log($scope.CourseSubject);
                //update
                if ($scope.CourseSubject.CSID > 0)
                {
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/UpdateCourseSubject/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.CourseSubject)
                    }).success(function (data) {   
                        console.log(data);
                        
                         $scope.CourseIDtem=$scope.CourseSubject.CourseID;
                        $scope.CourseSubject={};
                       GetAllCourseSubject($scope.CourseTitle);
                        
                         $('#myModal').modal('toggle');
                        swal("Successfully Updated", "CourseSubject");
                        
                    });
                }
                else {   
                    //add
                    $http({
                        method: 'POST',
                        url: baseUrl + 'Setting/AddCourseSubject/',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify($scope.CourseSubject)
                    }).then(function successCallback(response) {
                        console.log(response.data);
                       
                        $scope.duplicateCheck=response.data;
                        if($scope.duplicateCheck==1)
                        {
                            $scope.CourseIDtem=$scope.CourseSubject.CourseID;
                            
                            
                            //$scope.CourseSubject = {};
                            //GetAllCourseSubjeTitleTopics($scope.CourseSubject.CourseID);
                            $scope.CourseSubject.CourseID=$scope.CourseIDtem;
                            $scope.CourseSubject.Day="";
                            $scope.CourseSubject.SubjectDetail="";
                            $scope.CourseSubject.Tutorials="";
                            $scope.CourseSubject.Discussion="";
                            
                            //GetAllCourseSubject($scope.CourseTitle);
                             
                            swal("Successfully added", "CourseSubject");
                        }
                        else
                        {
                            swal("Duplicate Day Found", "Course Subject");
                        }
                        // $('#myModal').modal('toggle');
                        
                        
                        
                    });
                }
            }

            function Edit(CourseSubject)
            {
                $scope.CourseSubject = {};
                $scope.CourseSubject = CourseSubject;
            }
            
            function reset()
            {
                $scope.CourseSubject = {};
            }

        }]);
</script>