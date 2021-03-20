<?php
    session_start(); 
    include("functions.php");
?>
<html>
  <head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PerCapita</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/css/login1.css" rel="stylesheet">
</head>
  <body>
    <?php

         
        
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];
            $a = "employee";
            $b = "projecthead";
            $c = "hr";
            $d = "ceo";
            $query = "SELECT * from `account`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                    foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password){
                        $_SESSION['login'] = true;

                        if($row['role']==$a ){
                            $_SESSION['type'] = $row['type'];
                            header('location:employee.php');
                        }
                        elseif($row['role']==$b){
                            $_SESSION['type'] = $row['type'];
                                header('location:projecthead.php');
                        }
                        elseif($row['role']==$c){
                            $_SESSION['type'] = $row['type'];
                            header('location:hr.php');
                        }
                        elseif($row['role']==$d){
                          $_SESSION['type'] = $row['type'];
                          header('location:ceo.php');
                      }
                        
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }

        }
        if(isset($_POST['signup'])){
            
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
            
                
                $query = "INSERT INTO `requests` ( `firstname`, `lastname`, `email`, `password`, `phone`, `role`,`date`,`id`) VALUES (  '$firstname', '$lastname', '$email', '$password', '$phone', '$role', CURRENT_TIMESTAMP, '0')";
                if(performQuery($query)){
                    echo "<script>alert('We received your request, we will get back to you within 48 Hours ,  Thank you.')</script>";
                }else{
                    echo "<script>alert('Unknown error occured or Email is already registred')</script>";
                }
            }

            
            

        
        
        ?>
     <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/" alt="">
        <span>PerCapita</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          
          <li><a class="getstarted scrollto" href="#about">Login/Sign-up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
   <br>

    <section>
   
    <div>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form name="signup" method="POST">
              
             
              <label for="inputEmail" class="sr-only">Firstname</label>
              <input name="firstname" type="text" id="inputEmail" class="form-control" placeholder="Firstname" required autofocus>
                <label for="inputEmail" class="sr-only">Lastname</label>
              <input name="lastname" type="text" id="inputEmail" class="form-control" placeholder="Lastname" required autofocus>
                <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <select name="role" id="role">
              <option value="employee">Employee</option>
              <option value="projecthead">Project Head</option>
              <option value="hr">HR</option>
              <option value="ceo">CEO</option>
            </select>
              <label for="inputPassword" class="sr-only">Phone Number</label>
              <input name="phone" type="number" id="phone" class="form-control" placeholder="Phone " required>
              <button name="signup"  type="submit">Sign up</button>
             
            </form>
        </div>
        <div class="form-container sign-in-container">
             <form name="signin"  method="POST">
          
                
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
             
              <button name="signin"  type="submit">Login</button>

              
            </form>

            

        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back! Users </h1>
              <p>
                To keep connected with us please login with your personal info
              </p>
              <button class="ghost" id="signIn">Login</button>
            </div>
            <div class="overlay-panel  overlay-right">
              <h1>Hello, Guys!</h1>
              <p>Enter your personal details and start journey with us</p>
              <p>Grab oppurtunities directly to your place</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
          </section>
  </body>
  <script>
    const signUpButton = document.getElementById("signUp");
    const signInButton = document.getElementById("signIn");
    const container = document.getElementById("container");

    signUpButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  </script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  
</html>