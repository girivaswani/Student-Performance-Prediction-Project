<?php
  session_start();
  include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>VESIT</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
    <meta name="msapplication-TileImage" content="public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="public/assets/css/theme.css" rel="stylesheet" />

    <link href="public/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
  </head>


  <body data-bs-spy="scroll" data-bs-target="#navbar">
  <nav class="navbar navbar-expand-xl navbar-light fixed-top px-0 pb-0 mb-2" id="navbar" data-navbar-darken-on-scroll="white">
        <div class="container-fluid align-items-center py-2"><a class="navbar-brand flex-center" href="index.html"><img class="logo" src="public/assets/img/vesit.png"  alt="open enterprise" /><span class="ms-2 d-none d-sm-block fw-bold">VESIT</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-3 mt-xl-0">
              <?php
                if(isset($_SESSION['name'])){
                  if(isset($_SESSION['teacher_id'])){
                    echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="teacher_home.php">Select Class </a></li>';
                  }
                  elseif(isset($_SESSION['stud_id'])){
                    $stud_id=$_SESSION['stud_id'];
                    $sql = "SELECT * FROM student WHERE Student_Id=$stud_id";
                    $result=mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    if($row['Locality']==NULL or $row['Medu']==NULL or $row['Relationship']==Null){
                      echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="personal.php">Update Details</a></li>';
                    }
                    else{
                      $sql1="select Pred_Mark from stu_marks where student_id=$stud_id limit 1;";
                      $result1=mysqli_query($con, $sql1);
                      $row1 = mysqli_fetch_row($result1);
                      // var_dump($result1);
                      if($row1[0]==NULL){
                        echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="personal.php">Update Details</a></li>';
                        echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="stumarks.php">Update Marks</a></li>';  
                      }else{
                        echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="predict.php">Predict Marks</a></li>';
                        echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="personal.php">Update Details</a></li>';
                        echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="stumarks.php">Update Marks</a></li>';
                      }
                      
                    }
                    
                  }
                  echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="changepass.php">Reset Password</a></li>';
                  echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="about.php">About Us</a></li>';
                  echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="logout.php">Log out </a></li>';
                }
                else{
                  echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="login.php">Login </a></li>
                  <li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="adminlogin.php">Admin Login </a></li>';
                }
              ?>
              
            </ul>
          </div>
        </div>
      </nav>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
    

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-8 py-lg-0" id="hero">

        <div class="container-xxl mt-5">
          <div class="row align-items-center min-vh-lg-100">
            <div class="col-lg order-lg-1 text-center"><img style="width:85%; padding-top:10%" class="img-fluid" src="public/assets/img/illustrations/college1.jpg" alt="" /></div>
            <div class="col-lg mt-5 mt-lg-0">
              <h2 class="lh-sm font-cursive fw-medium fs-6 fs-sm-8 fs-md-11 fs-lg-9 fs-xl-11 fs-xxl-12">Student Performance Prediction <br class="d.none d-xl-block" /></h2>
              <p class="mt-4 fs-2 fs-md-4 lh-sm">A Model To Understand Students More Efficiently and Improve Their Results.</p>
            
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-xxl-0" id="features">

        <div class="container-xxl">
          <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
              <h1 class="display-6 font-cursive">The only person who is educated is the one who has learned how to learn …and change.</h1>
              <p class="fs-md-1 mt-4">Our Model is based on modern technologies such as Machine Learning which predicts the future results of students taking into consideration many factors such as alcohol comsumption, relationship status,etc and their previous results. Using these predicitions Institutions and Teachers can work efficiently towards the betterment of the results.</p>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-xl-3 g-4 mt-3 text-center">
            <div class="col-12 col-md-6">
              <div class="card py-md-6 px-md-4 mt-3 h-100 box-shadow-all border-0">
                <div class="card-body"><img src="public/assets/img/machine_learning.jpg" class="images" alt="">
                  <p class="py-3 heading">Machine Learning</p>
                  <p class="lead mb-0">Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve from experience without being explicitly programmed.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card py-md-6 px-md-4 mt-3 h-100 box-shadow-all border-0">
                <div class="card-body"><img src="public/assets/img/python.png" class="images" alt="" >
                  <p class="py-3 heading">Python</p>
                  <p class="lead mb-0">Python is an interpreted, object-oriented, high-level programming language with dynamic semantics.</p>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card py-md-6 px-md-4 mt-3 h-100 box-shadow-all border-0">
                <div class="card-body"><img src="public/assets/img/data_mining.jpg" class="images" alt="" />
                  <p class="py-3 heading">Data Mining</p>
                  <p class="lead mb-0">Data mining is the process of analyzing massive volumes of data to discover business intelligence that helps companies solve problems, mitigate risks, and seize new opportunities.</p>
                </div>
              </div>
            </div>
			
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->




      <!-- ============================================-->
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="public/vendors/@popperjs/popper.min.js"></script>
    <script src="public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="public/vendors/is/is.min.js"></script>
    <script src="public/vendors/swiper/swiper-bundle.min.js"> </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="public/assets/js/theme.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&amp;family=Roboto:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  </body>

</html>