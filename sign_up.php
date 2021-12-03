<?php
    session_start();
    $link = mysqli_connect('localhost','root','08061646761','ecommerce');
    if (isset($_POST['sign_up'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $sql_select = "SELECT * FROM sign_up WHERE email = '$email'";
        $select = mysqli_query($link,$sql_select);

        printf("Errormessage %s/n:", mysqli_error($link));
        while ($row = mysqli_fetch_assoc($select)) {
            $email_found = $row['email'];
        }
        if ($email_found != "") {
            echo "<script>alert('Email Already Exists')</script>";
        }
        else {
            $sql_insert = "INSERT INTO sign_up (first_name, last_name, email, phone_number, password, confirm_password) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$password', '$confirm_password') ";
            $insert = mysqli_query($link,$sql_insert);
            printf("Errormessage: %s/n", mysqli_error($link));
            if ($insert == true) {
                echo "<script>alert('$first_name Thanks For Registering With Us. Please Login')</script>";
                
            }
            else {
                echo "<script>alert('An Error Occured Please Try Again Later')</script>";
            }
        }
        header("location:sign.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            
            <nav class="navbar" id="navbar" class="">
                <ul class="nav-item d-flex ">
                    
                    <li><a href="sign.php" class="nav-link nav scrollto"><span class="fa fa-sign-in mr-1"></span>LOGIN</a></li>
                    

                </ul>
            </nav>
            
        </div>
    </header>
    <section>
        <div class="container mt-5">
                <form action="sign_up.php" method="POST" class="form-controls shadow signup_form form2 col-md-10">
                    <h3 class="my-3 text-center"><span class="fa fa-lock"></span> SIGN UP</h3>
                    <div class="row mx-auto mb-4">
                        <label for="first_name" class="form-label ml-4 mr-3 ">First Name:</label>
                        <input type="text" class="form-control col-md-4" name="first_name" required placeholder="Enter Your First Name Here" maxlength="30">
                        <label for="last_name" class="form-label ml-5 mr-3">Last Name:</label>
                        <input type="text" class="form-control col-md-4" name="last_name" required placeholder="Enter Your Last Name Here" maxlength="30">
                    </div>

                    <div class="row mx-auto">
                        
                        <label for="email" class="form-label ml-4">Email:</label>
                        <input type="email"  placeholder="Enter Your Email Here" name="email" required maxlength="40" class="form-control ml-4 mr-5 col-md-9">
                        <br><br>
                        <label for="phone_number" class="form-label ml-4 mt-3">Phone Number:</label>
                        <input type="text" class="form-control ml-4 col-md-8 mt-3 mr-5" name="phone_number" placeholder="Enter your hone number Here (Optional)">
                        <br><br>
                        <label for="password" class="form-label ml-4 mt-3">Password:</label>
                        <input type="password"  class="form-control col-md-9 ml-4 mr-3 mt-3" name="password" required placeholder="Enter Password">
                        <br><br>
                        <label for="password" class="form-label ml-4 mt-3">Confirm Password:</label>
                        <input type="password"  class="form-control col-md-9 ml-4 mt-3" name="confirm_password" required placeholder="Re-enter Password">
                    </div>
                    
                        <div class="my-2 ml-4 form-check">
                            <input type="checkbox" class="form-check-input" required>
                            <label class="form-check-label" for="">I Agree to the <a href="" class="text-info">Terms & Conditions</a> and Privacy & Cookie Notice </label>
                        </div>
                        <br>
                        <div class="text-center ">
                            <input type="submit" name="sign_up" value="CREATE ACCOUNT" class="btn-success col-md-10 btn">
                        </div>
                    <br>
                </form>
                
            
        </div>
    
    </section>




    <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>