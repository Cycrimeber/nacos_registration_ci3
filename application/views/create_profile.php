<!-- Content wrapper -->
<div class="content-wrapper bg-img">
    <?php $user_id = $this->session->user->id; ?>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1 class="fw-bold"><span class=" fw-light">Set up</span> your Profile</h1>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <?php if (isset($_POST['insert_profile'])) {
                    ?>
                        <span class="alert alert-danger">*<?php echo $failure; ?></span>
                    <?php
                    } ?>

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><strong>Completely set up your profile to get your</strong></span><a href="<?php echo base_url(); ?>login" class="nacos-green fw-bolder"> NACOS Number.</a> </h5>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url('create_profile/create_profile'); ?>" enctype="multipart/form-data">
                            <div class=" my-4 d-flex gap-3">
                                <label for="formFile" class="form-label text-primary"> <i class="bx bx-camera fs-2"></i>Upload Picture</label>
                                <input class="form-control w-50" type="file" name="profile_photo" id="formFile" value="<?php //echo set_value('profile_photo'); 
                                                                                                                        ?>" />
                            </div>
                            <?php if (isset($_POST['insert_profile'])) {
                            ?>
                                <span class="text-danger">*<?php foreach ($imageError as $err) {
                                                                echo $err;
                                                            }
                                                            ?></span>
                            <?php
                            } ?>
                            <div class="mb-3 d-flex gap-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="zoneSelect">Zone</label>
                                    <select class="form-select" id="zoneSelect" name="zone">
                                        <option>Choose...</option>
                                        <?php foreach ($zones as $zone) {
                                        ?>
                                            <option value="<?php echo $zone->zone_id; ?>"><?php echo  $zone->zone; ?> (<?php echo  $zone->zone_alias; ?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (isset($_POST['insert_profile'])) {
                                ?>
                                    <span class="text-danger">*<?php echo form_error("zone"); ?></span>

                                <?php
                                } ?>
                                <div class="input-group">
                                    <label class="input-group-text" for="stateSelect">State</label>
                                    <select class="form-select" name="state" id="stateSelect">
                                        <option selected>Choose...</option>
                                        <?php foreach ($states as $state) {
                                        ?>
                                            <option value="<?php echo $state->state_id; ?>"><?php echo $state->states; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (isset($_POST['insert_profile'])) {
                                ?>
                                    <span class="text-danger">*<?php echo form_error("state"); ?></span>
                                <?php
                                } ?>
                            </div>

                            <div class="mb-3">
                                <!-- <label class="form-label" for="basic-icon-default-email">Email</label> -->
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" name="school" id="basic-icon-default-email" class="form-control" placeholder="Enter School Name" value="<?php echo set_value('school'); ?>">
                                </div>
                                <div class="form-text">School fullname or official abbreviation</div>
                                <?php if (isset($_POST['insert_profile'])) {
                                ?>
                                    <span class="text-danger"><?php echo form_error("school"); ?></span> <?php
                                                                                                        } ?>
                            </div>

                            <div class="mb-3 d-flex gap-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="departmentSelect">Department</label>
                                    <select class="form-select" name="department" id="departmentSelect">
                                        <option selected>Choose...</option>
                                        <?php foreach ($department as $dept) {
                                        ?>
                                            <option value="<?php echo $dept->department_id; ?>"><?php echo $dept->department; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label class="input-group-text" for="levelSelect">Level</label>
                                    <select class="form-select" name="level" id="levelSelect">
                                        <option selected>Choose...</option>
                                        <?php foreach ($level as $lev) {
                                        ?>
                                            <option value="<?php echo $lev->level_id; ?>"><?php echo $lev->level; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="tel" name="mobile" placeholder="+234 8127....." id="html5-tel-input" value="<?php echo set_value('mobile'); ?>" />
                                <?php if (isset($_POST['insert_profile'])) {
                                ?>
                                    <span class="text-danger"><?php echo form_error("mobile"); ?></span> <?php
                                                                                                        } ?>
                            </div>

                            <div class="d-flex flex-column col-md-8 m-auto">
                                <input type="submit" value="Continue" name="insert_profile" class="btn btn-success mb-3">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <!-- Footer -->