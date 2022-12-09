<?php

$fname = $user_profile->firstname;
$lname = $user_profile->lastname;
$unid = $user_profile->unique_id;
$email = $user_profile->email;
$mobile = $user_profile->mobile;
$school = $user_profile->school;
$department = $user_profile->department;
$level = $user_profile->level;
$photo = $user_profile->photo;

?>
<!-- Content wrapper -->
<div class="content-wrapper bg-img">
  <!-- Content -->
  <!-- Basic Layout -->
  <div class="row m-5">
    <div class="col-md-11 col-12 mb-md-0 mb-4 curve-bg">
      <div class="row m-3">
        <div class="col-md-4">
          <img src="<?php base_url() ?>uploads/profile/<?php echo $photo; ?>" alt class="w-px-100 h-auto rounded-circle my-5 mx-auto" />
        </div>
        <div class="col-md-8 my-auto">
          <h1 class="text-white">Welcome <?php echo ucfirst($fname); ?></h1>
          <p class="text-white fs-3">ID: <?php echo strtoupper($unid); ?></p>
        </div>
      </div>
    </div>

  </div>

  <!-- Accordion -->
  <div class="row m-5">
    <div class="col-md-8 mb-4 mb-md-0 ">
      <div class="accordion mt-3" id="accordionExample">
        <div class="card accordion-item active">
          <h2 class="accordion-header" id="headingOne">
            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
              View Membership Registration Number
            </button>
          </h2>

          <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body nacos-green">
              <?php echo strtoupper($unid); ?>
            </div>
          </div>
        </div>
        <div class="card accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
              Download Membership Certificate
            </button>
          </h2>
          <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <img src="./certificate/images/<?php echo $unid; ?>.jpg" alt="" width="600px" height="300px">
            </div>
          </div>
        </div>
        <div class="card accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
              Download Membership Identity Card
            </button>
          </h2>
          <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <img src="./certificate/images/<?php echo $unid; ?>.jpg" alt="" width="400px" height="200px">

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--/ Accordion -->
  <!-- / Content -->

  <!-- Footer -->