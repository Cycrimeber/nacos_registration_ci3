<?php
$user_id = $this->session->user->id;
$firstname =  $user_profile->firstname;
$photo =  $user_profile->photo;
$surname =  $user_profile->lastname;
$school = $user_profile->school;
$mobile = $user_profile->mobile;
$profile_department = $user_profile->department;
$profile_level = $user_profile->level;
$profile_zone = $user_profile->zone;
$profile_state = $user_profile->state;
?>

<!-- Content wrapper -->
<div class="content-wrapper bg-img">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1 class="fw-bold"><span class=" fw-light">Update</span> your Profile</h1>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <?php if ($this->session->flashdata('status')) :
                        echo '<small class="alert alert-success">' . $this->session->flashdata('status') . '</small>';
                    endif; ?>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('update_profile/' . $user_id); ?>" enctype="multipart/form-data"">
                         
                        <!-- Name group -->
                        <div class=" mb-3 gap-2">
                            <label class="form-label" for="basic-icon-default-email">Firstname</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="firstname" id="basic-icon-default-email" class="form-control" value="<?= $firstname; ?>">
                            </div>
                            <span class="text-danger"><?= form_error("firstname"); ?></span>
                            <br>
                            <label class="form-label" for="basic-icon-default-email">Surname</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="surname" id="basic-icon-default-email" class="form-control" value="<?= $surname; ?>">
                            </div>
                            <?php if (isset($_POST['update_profile'])) : ?>
                                <span class="text-danger"><?= form_error("surname"); ?></span> <?php endif; ?>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="input-group">
                            <label class="input-group-text" for="zoneSelect">Zone</label>
                            <select class="form-select" id="zoneSelect" name="zone">
                                <option value="<?= $profile_zone; ?>">
                                    <?php
                                    foreach ($zones as $zone) :
                                        if ($profile_zone == $zone->zone_id) :
                                            echo $zone->zone;
                                        endif;
                                    endforeach;
                                    ?></option>
                                <?php foreach ($zones as $zone) : ?>
                                    <option value="<?= $zone->zone_id; ?>"><?= $zone->zone; ?> (<?= $zone->zone_alias; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if (isset($_POST['update_profile'])) : ?>
                            <span class="text-danger">*<?= form_error("zone"); ?></span>
                        <?php endif; ?>
                        <div class="input-group">
                            <label class="input-group-text" for="stateSelect">State</label>
                            <select class="form-select" name="state" id="stateSelect">
                                <option value="<?= $profile_state; ?>">
                                    <?php foreach ($states as $state) :
                                        if ($profile_state == $state->state_id) :
                                            echo $state->states;
                                        endif;
                                    endforeach; ?></option>
                                <?php foreach ($states as $state) : ?>
                                    <option value="<?= $state->state_id; ?>"><?= $state->states; ?> </option><?php endforeach; ?>
                            </select>
                        </div>
                        <?php if (isset($_POST['update_profile'])) : ?>
                            <span class="text-danger">*<?= form_error("state"); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label" for="basic-icon-default-email">Email</label> -->
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-building-house"></i></span>
                            <input type="text" name="school" id="basic-icon-default-email" class="form-control" placeholder="Enter School Name" value="<?= $school; ?>">
                        </div>
                        <div class="form-text">School fullname or official abbreviation</div>
                        <?php if (isset($_POST['update_profile'])) : ?>
                            <span class="text-danger"><?= form_error("school"); ?></span> <?php endif; ?>
                    </div>

                    <div class="mb-3 d-flex gap-2">
                        <div class="input-group">
                            <label class="input-group-text" for="departmentSelect">Department</label>
                            <select class="form-select" name="department" id="departmentSelect">
                                <option value="<?= $profile_department; ?>">
                                    <?php
                                    foreach ($department as $dept) :
                                        if ($profile_department == $dept->department_id) :
                                            echo $dept->department;
                                        endif;
                                    endforeach; ?></option>
                                <?php foreach ($department as $dept) : ?>
                                    <option value="<?= $dept->department_id; ?>"><?= $dept->department; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <label class="input-group-text" for="levelSelect">Level</label>
                            <select class="form-select" name="level" id="levelSelect">
                                <option value="<?= $profile_level; ?>">
                                    <?php foreach ($level as $lev) :
                                        if ($profile_level == $lev->level_id) :
                                            echo $lev->level;
                                        endif;
                                    endforeach; ?></option>
                                <?php foreach ($level as $lev) : ?>
                                    <option value="<?= $lev->level_id; ?>"><?= $lev->level; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Mobile Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="tel" name="mobile" id="basic-icon-default-email" class="form-control" value="<?= $mobile; ?>">
                        </div>
                        <?php if (isset($_POST['update_profile'])) : ?>
                            <span class="text-danger"><?= form_error("mobile"); ?></span> <?php endif; ?>
                    </div>
                    <div class=" d-flex gap-3 py-4">
                        <label for="formFile" class="form-label text-primary"> <i class="bx bx-camera fs-1"></i>Upload Picture</label>
                        <input type="hidden" name="old_image_name" value="<?= $photo; ?>">
                        <input class="form-control w-75 m-auto" type="file" name="profile_photo_update" id="formFile" />
                    </div>
                    <?php if (isset($imageError)) : ?>
                        <span class="text-danger">*<?php foreach ($imageError as $err) :
                                                        echo $err;
                                                    endforeach; ?></span>
                    <?php endif; ?>

                    <div class="d-flex flex-column col-md-8 m-auto">
                        <input type="submit" value="Update Profile" name="update_profile" class="btn btn-success mb-3">

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="<?= base_url('uploads/profile/' . $photo); ?>" class="w-75 m-auto d-block" alt="Image">
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Footer -->