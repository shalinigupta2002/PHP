<!-- voter page -->


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fonts CDN-->

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--- Custom Css --->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Internal CSS -->
     
    <style>
       
      .slideUpBtn {
    padding: 12px 24px;
    background-color: transparent;
    border: 2px solid hsl(243, 80%, 62%);
    border-radius: 6px;
    position: relative;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(1,.15,.34,.92)
}

.slideUpBtn span {
    display: inline-block;
    transition: inherit;
    color: hsl(243, 80%, 62%);
}

.slideUpBtn:hover span {
    opacity: 0;
    transform: translateY(-100%)
}

.slideUpBtn::before {
    content: "";
    background-color:  hsl(243, 80%, 62%);;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    transform: translateY(100%);
    transition: inherit;
    width: 100%;
    transition: transform 0.5s cubic-bezier(1,.15,.34,.92)
}

.slideUpBtn::after {
    content: 'Vote Now';
    align-items: center;
    display: flex;
    height: 100%;
    justify-content: center;
    left: 0;
    position: absolute;
    top: 0;
    transition: inherit;
    transform: translateY(100%);
    width: 100%;

}

.slideUpBtn:hover::before {
    transform: translateY(0) scale(3);
    transition-delay: .025s;
}

.slideUpBtn:hover::after {
    opacity: 1;
    color: hsl(222, 100%, 95%);
    transform: translateY(0);
}
    </style>
<!-- End Internal CSS -->
</head>
<body>

<!------------------  HomePage Section ------------------>
<div>
    
</div>
<section id="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6 animate__animated animate__bounceInLeft " style="text-align: center; background: linear-gradient(to right, #a517ba,#5f1178 );">
        <h1>VOTE FOR BETTER COMMUNITY</h1>
        <p>"Our culture reflects the essence of our Indian society, where peace and harmony thrive under the guidance of a good leader. Choosing the right leader for our society is not just our right but also our responsibility."</p>
      <a href="../pr/index.php"><button class="slideUpBtn">VOTE NOW</button></a>
      </div>
      
      <div class="col-md-6" style="background: linear-gradient(to right, #a517ba,#5f1178 );" width="100%"> 
             <img src="img/2.svg" alt="" srcset="" height="400vh " width="90%" class="animate__animated animate__bounceInRight " style="margin-left: 10px; margin-top: 20px;" >
                </div> 
            </div>  
         </div>
        </div>
      </div>
    </div>
</section>
 <!------------------  Space Section ------------------> 
  
<section class="space">
  <div class="container">
    <div class="col-md-12">
      <div class="row">
    
      </div>
    </div>
</section>
</div>

<!------------------  Candidate Section ------------------>

<div class="container">
  <div class="row">
    <div class="col-md-12">     
      <h1>Online Voting System</h1>
    </div>
    <div class="col-md-12" style=" width: 100%; ">
      <img src="img/10.svg" alt="" srcset="">
    </div>


      <div class="col-md-12">
      <a href="../pr/index.php" ><span ><button style="margin-top: 20px;" class="slideUpBtn">Vote Now</button></span></a>
    </div>  
    </div>
  </div>
  </div>
</div>

<!------------------  About Section ------------------>
<section>
    <div class="container-fluid" style="margin-top: 50px;">
      <div class="row" style="background: linear-gradient(to right, #a517ba,#5f1178 );" width="100%">
        <div class="col-md-12" style="background-image: linear-gradient(to right, #a517ba,#5f1178 ); color: white;">
          <h1 style="text-align: center; background-image: linear-gradient(to right, #a517ba,#5f1178 ); color: white;"> About Voting</h1>
          <!-- <p> About Voting In Breif</p> -->
        </div>
        <div class="col-md-6" >
          <img src="img/4.svg" alt="" srcset="" >
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <!-- <h1 style="color: white; margin-top: 40px;" class=" ">About</h1> -->
          <p style="color: white;margin-bottom: 40px;" class=" ">"Our culture reflects the essence of our Indian society, where peace and harmony thrive under the guidance of a good leader. Choosing the right leader for our society is not just our right but also our responsibility.".</p>
        </div>
      </div>
      </div>
    </div>
</section>


    
  
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>  
 
  </body>
</html> 