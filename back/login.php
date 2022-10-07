<!doctype html>
<html lang="en">
<?php
include "../classes/login.php";
$log=new login();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $check=$log->checklogin($email,$password);
}
?> 
<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Minible.</p>
                                </div>
                               
                                <div class="p-2 mt-4">
                                <span>
                                    <?php
                                        if(isset($check)){
                                    ?>
                                    <div class="alert alert-info" role="alert">
                                       <?php echo $check?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </span>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">email</label>
                                            <input type="email" class="form-control" name="email"  placeholder="Enter email">
                                        </div>
                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-recoverpw.php" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"  placeholder="Enter password">
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" name="submit" type="submit">Log In</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Don't have an account ? <a href="register.php" class="fw-medium text-primary"> Signup now </a> </p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
</html>
