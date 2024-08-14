
<div class="content-page" ng-controller="DefaultCtrl">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                 
                    <div class="row">

                        <div class="col-12">

                            <div class="card mb-3">
                                <div class="card-header">
                                    
                                    <h3><i class="far fa-copy"></i> <?php  echo $Title;  ?></h3>

                                </div>

                                <div class="card-body">
    
                                
                               <style>
                                p {
                                  text-align: center;
                                  font-size: 60px;
                                  margin-top: 0px;
                                  background-image: url("dist/img/padma1.jpg"),
                                }
                                </style>
                                
                                <p id="demo"></p>

                            <script>
                            // Set the date we're counting down to
                            var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
                            
                            // Update the count down every 1 second
                            var x = setInterval(function() {
                            
                              // Get today's date and time
                              var now = new Date().getTime();
                                
                              // Find the distance between now and the count down date
                              var distance = countDownDate - now;
                                
                              // Time calculations for days, hours, minutes and seconds
                              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                              // Output the result in an element with id="demo"
                              document.getElementById("demo").innerHTML = days + " দিন " + hours + "ঘণ্টা "
                              + minutes + "মিনিট " + seconds + "সেকেন্ড ";
                                
                              // If the count down is over, write some text 
                              if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("demo").innerHTML = "EXPIRED";
                              }
                            }, 1000);
                            </script>
                                
                                
																
								
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- end row -->


    <!--List of QusetionType-->



</div>
</div>
</div>
</body>
</html>
