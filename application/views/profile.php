<?php
// $user = $this->session->user;

// Arrays of data from various dependent tables
$all_states = $get_state;
$all_departments = $get_department;
$all_zones = $get_zone;
$all_levels = $get_level;

// save array of data from user profile into a new variable

$user_id = $user_profile->student_id;
$firstname = $user_profile->firstname;
$surname = $user_profile->lastname;
$unid = $user_profile->unique_id;
$image = $user_profile->photo;
$email = $user_profile->email;
$mobile = $user_profile->mobile;
$department = $user_profile->department;
$level = $user_profile->level;
$school = $user_profile->school;
$certificate = $user_profile->certificate;


?>
<!-- Content wrapper -->
<div class="content-wrapper bg-img">
    <!-- Content -->

    <!-- Basic Layout -->
    <div class="row m-5">

        <!-- <div class=""> -->
        <div class="col-md-8 col-12 mb-md-0 mb-4 curve-bg">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url() ?>uploads/profile/<?php echo $image; ?>" alt class="w-px-100 h-auto rounded-circle my-5 mx-auto" />
                </div>
                <div class="col-md-8 my-auto">
                    <h1 class="text-white">Welcome <?php echo ucfirst($firstname); ?></h1>
                    <p class="text-white fs-3">ID: <?php echo strtoupper($unid); ?></p>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <div class="col-md-4 col-12 my-auto">
            <p class="icon-name text-capitalize text-truncate text-primary fw-bold my-3"><i class="bx bx-mail-send mb-2"></i>
                <?php echo $email; ?></p>
            <p class="icon-name text-capitalize text-truncate  text-primary fw-bold mb-0"><i class="bx bx-phone mb-2"></i><?php echo $mobile; ?></p>
        </div>
    </div>

    <div class="col-md-6 m-5">

        <div class="card shadow-none bg-transparent border border-success mb-3">
            <div class="card-header fs-5">Name: <?php echo ucfirst($firstname) . " " . ucfirst($surname); ?></div>
        </div>

        <?php

        if ($unid != "") {
        ?>
            <div class="card shadow-none bg-transparent border border-success mb-3">
                <div class="card-header fs-5">School: <?php echo ucfirst($school); ?></div>
            </div>
            <div class="card shadow-none bg-transparent border border-success mb-3">
                <div class="card-header fs-5">Department: <?php
                                                            foreach ($get_department as $all_depts) {
                                                                if ($department == $all_depts->department_id) {
                                                                    echo $all_depts->department;
                                                                }
                                                            }
                                                            ?></div>
            </div>
            <div class="card shadow-none bg-transparent border border-success mb-3">
                <div class="card-header fs-5">Level: <?php foreach ($get_level as $all_level) {
                                                            if ($level == $all_level->level_id) {
                                                                echo $all_level->level;
                                                            }
                                                        } ?></div>
            </div>
            <?php
            if ($certificate == 'no') {
            ?>
                <div class="card shadow-none bg-transparent border border-success mb-3">
                    <div class="card-header fs-5"><a href="<?php base_url() ?>GenerateCertificate">Generate Certificate</a></div>
                </div>
            <?php
            }
            ?>

            <div class="card shadow-none bg-transparent border border-success mb-3">
                <div class="card-header fs-5"><a href="<?php base_url() ?>welcome">View Certificate and ID Card</a></div>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-warning"><a href="<?php echo base_url('create_profile') ?>">Update Your Profile</a></div>
        <?php
        }
        ?>

    </div>
    <!-- / Content -->

    <!-- Footer -->