<?php
// include './includes/connect.php';
// if (isset($_POST['register_member'])) {
//     $firstname = $_POST['fname']; #filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
//     $lastname = $_POST['lname']; #filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
//     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//     $password = $_POST['password']; #password_hash($_POST['password'], PASSWORD_DEFAULT); #filter_input($_POST['password'], FILTER_SANITIZE_STRING);
//     $cpassword = $_POST['cpassword']; #password_hash($_POST['cpassword'], PASSWORD_DEFAULT); # filter_input($_POST['cpassword'], FILTER_SANITIZE_STRING);
//     // $terms = $_POST['terms']; #filter_input($_POST['input'], FILTER_SANITIZE_STRING);
//     if ($password == $cpassword) {
//         $confirm_user_exist_query = mysqli_query($con, "SELECT * FROM `login` WHERE email = '$email'");
//         if (mysqli_num_rows($confirm_user_exist_query) > 0) {
//             echo "<script>alert('Email already registered');</script>";
//         } else {
//             $login_insert_query = mysqli_query($con, "INSERT INTO `login` (email, `password`) VALUES ('$email','$password')");
//             if ($login_insert_query) {
//                 $profile_insert_query = mysqli_query($con, "INSERT INTO `profile_info` (firstname, lastname, email) VALUES ('$firstname','$lastname', '$email')");
//                 if ($profile_insert_query) {
//                     echo "<script>alert('Records insert success');</script>";
//                     header("Location:./login.php");
//                 }
//             }
//         }
//     } else {
//         echo "<script>alert('Password field must match confirm password field');</script>";
//     }
// }
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url() ?>assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>NACOS - Members Registration</title>

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
                        <h4 class="fw-bold"><span class="text-muted fw-light">Sign Up</span> to Set Up your Profile</h4>
                        <h1 class="fw-bolder py-3 mb-4"><span class="text-black fw-bolder">Sign Up</span> with your Email.</h1>

                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><strong>Already a Member?</strong></span><a href="<?php echo base_url() ?>login" class="nacos-green fw-bolder"> Login</a> </h5>

                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url() ?>register">
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="basic-icon-default-fullname">Full Name</label> -->
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                    <input type="text" name="fname" class="form-control" id="basic-icon-default-fullname" value="" placeholder="Firstname" required />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="basic-icon-default-company">Company</label> -->
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                    <input type="text" name="lname" id="basic-icon-default-company" class="form-control" value="" placeholder="Lastname" required />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="basic-icon-default-email">Email</label> -->
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                    <input type="text" name="email" id="basic-icon-default-email" class="form-control" value="" placeholder="Email Address" required />
                                                    <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> -->
                                                </div>
                                                <div class="form-text">You can use letters, numbers & periods</div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-lock"></i></span>
                                                    <input type="password" name="password" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Enter Password" required />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="input-group input-group-merge">
                                                    <span id="confirm_password" class="input-group-text"><i class="bx bx-lock"></i></span>
                                                    <input type="password" name="cpassword" id="confirm_password" class="form-control phone-mask" placeholder="Confirm password" required />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">

                                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                                    <label class="form-check-label" for="terms-conditions">
                                                        By clicking on register, you agree to our
                                                        <a href="javascript:void(0);">Terms of Service </a>and <a href="javascript:void(0);">policy & terms</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column col-md-8 m-auto">
                                                <input type="submit" value="Register" name="register_member" class="btn btn-success w-80 mb-3">
                                                <div class="flex-shrink-0">

                                                </div>
                                                <button type="submit" name="register_member" class="btn btn-outline border-success d-block"> <img src="<?php echo base_url() ?>assets/img/icons/brands/google.png" alt="google" class="me-3" height="30" />Sign up using Google instead</button>
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