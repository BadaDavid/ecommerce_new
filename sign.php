<?php
    session_start();
    $link = mysqli_connect('localhost','root','08061646761','ecommerce');
    if (isset($_POST['sign'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM sign_up WHERE email = '$email' AND password = '$password'";
        $confirm = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($confirm)) {
            $get_email = $row['email'];
            $get_password = $row['password'];
        }
        if ($get_email =="" || $get_password == "") {
            echo "<script>alert('Incorrect Login Details. If You Have not registered before please click the SIGN UP button')</script>";
        }
        else {
            header("location:index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN || E-COMMERCE</title>
    <link rel="icon" href="img/favi.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="plugins/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
    
</head>
<body>
    <header class="fixed-top ">
        <div class="d-flex container">
            <a href="">
                <img src="img/logo.jpg" alt="" class="logo">
            </a>
            
            <nav class="navbar" id="navbar">
                <ul>
                    <li><a href="index.php" class="nav-link nav"><span class="fa fa-arrow-left"></span></a></li>
                </ul>
            </nav>
            
        </div>
    </header>
    <section>
        <div class="container cont ">
       
            <div class="row">
                <img src="img/undraw_login_re_4vu2 (1).svg" alt="" class="col-md-6">
                <form method="POST" action="sign.php" class="form-controls shadow mx-auto px-4 form col-md-6">
                    <h3 class="mt-3 text-center"><span class="fa fa-lock"></span> SIGN IN</h3>

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Enter Your Email Here">

                    <br>
                    
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Enter Password Here" required class="form-control">
                    <div class="form-text text-muted">Forgot Password? <a href="#" class="">Click Here</a></div>

                    <div class="my-3 form-check">
                        <input type="checkbox" class="form-check-input" >
                        <label class="form-check-label text-muted" for="">Remember Me </label>
                    </div>
                    <input type="submit" value="Sign In" name="sign" class="btn in">

                    <div class="border-top text-center">
                        <div class="text-muted mt-2">Don't have an Account? </div>
                        <a href="sign_up.php" class=" btn up col-md-10"><b>SIGN UP</b></a>
                    </div>
                </form>
                
            </div>
        </div>
    
    </section>

 

    <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>