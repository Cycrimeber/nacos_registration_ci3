<?php
// session_start();
// include './includes/connect.php';
// if (isset($_POST['login_btn'])) {
//     $emailErr = $passwordErr = "";
//     $email = $password = "";

//     if (empty($_POST['email'])) {
//         $emailErr = "Email is required";
//     } else {
//         $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//     }

//     if (empty($_POST['password'])) {
//         $passwordErr = "Password is required";
//     } else {
//         $password = $_POST['password'];;
//     }
// $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); #$_POST['email']; ;
// $password = $_POST['password']; #filter_input($_POST['password'], FILTER_SANITIZE_STRING);

//     $confirm_user_exist_query = mysqli_query($con, "SELECT * FROM `login` WHERE email = '$email'&& password = '$password'");
//     if (mysqli_num_rows($confirm_user_exist_query) > 0) {
//         $user = mysqli_fetch_assoc($confirm_user_exist_query);
//         $_SESSION['id'] = $user['id'];
//         $_SESSION['email'] = $user['email'];
//         $_SESSION['password'] = $user['password'];
//         $_SESSION['unid'] = $user['unique_id'];

//         $user_info = mysqli_query($con, "SELECT * FROM `profile_info` WHERE email = '$email'");
//         $info = mysqli_fetch_assoc($user_info);
//         $_SESSION['fname'] = $info['firstname'];
//         $_SESSION['lname'] = $info['lastname'];
//         header("Location:./create_profile.php");
//     } else {
//         $loginErr = "Incorrect username or password.";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url() ?>assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>NACOS - Members Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/nacos/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- personal stylings -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php echo base_url() ?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url() ?>assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper bg-img">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y my-5">
                        <h4 class="fw-bold"><span class="text-muted fw-light">Login</span> to access your Profile</h4>
                        <h1 class="fw-bolder py-3 mb-4"><span class="text-black fw-bolder">Login</span> with your Email.</h1>

                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><strong>Don't have an account yet?<strong></span><a href="<?php echo base_url() ?>register" class="nacos-green"> Create account</a> </h5>
                                    </div>

                                    <div class="card-body">
                                        <?php if (isset($_POST['login'])) {
                                        ?>
                                            <span class="alert alert-danger">*<?php echo $login_msg; ?></span>
                                        <?php
                                        } ?>
                                        <form method="POST" action="<?php echo base_url() ?>login">
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="basic-icon-default-email">Email</label> -->
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                    <input type="text" name="email" id="basic-icon-default-email" class="form-control" placeholder="Email Address">
                                                </div>

                                                <div class="form-text">You can use letters, numbers & periods</div>
                                            </div>
                                            <div class="mb-3 form-password-toggle">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="password">Password</label>
                                                    <a href="forgot_password.php">
                                                        <small>Forgot Password?</small>
                                                    </a>
                                                </div>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>

                                            </div>
                                            <div class="d-flex flex-column col-md-8 m-auto">
                                                <input type="submit" value="Login" name="login" class="btn btn-success w-80 mb-3 fw-bolder">
                                                <button type="submit" name="login" class="btn btn-outline border-success d-block"> <img src="<?php echo base_url() ?>assets/img/icons/brands/google.png" alt="google" class="me-3" height="30" />Login using Google instead</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php
                    // include './includes/footer.php';

                    ?>