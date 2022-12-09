<!-- Content wrapper -->
<div class="content-wrapper bg-img">
    <?php $user_id = $this->session->user->id; ?>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y my-5">
        <h1 class="fw-bold"><span class=" fw-light">Update</span> user password</h1>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <?php if ($this->session->flashdata('status')) :
                        echo '<small class="alert alert-success">' . $this->session->flashdata('status') . '</small>';
                    endif; ?>
                    <div class="card-body py-5">
                        <form method="POST" action="<?php echo base_url('update_password/' . $user_id); ?>">

                            <div class="mb-5 ">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="text" name="old_password" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Enter Current Password" required />
                                </div>
                                <?php if (isset($_POST['update_password'])) {
                                ?>
                                    <span class="text-danger">*<?php echo form_error("old_password"); ?></span>
                                <?php
                                } ?>
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="password" name="new_password" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Enter New Password" required />
                                </div>
                            </div>
                            <?php if (isset($_POST['update_password'])) {
                            ?>
                                <span class="text-danger">*<?php echo form_error("new_password"); ?></span>
                            <?php
                            } ?>
                            <div class="mb-3">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="password" name="new_cpassword" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Confirm New  Password" required />
                                </div>
                            </div>
                            <?php if (isset($_POST['update_password'])) {
                            ?>
                                <span class="text-danger">*<?php echo form_error("new_cpassword"); ?></span>
                            <?php
                            } ?>
                            <div class="d-flex flex-column col-md-8 m-auto pt-5">
                                <input type="submit" value="Update Password" name="update_password" class="btn btn-success mb-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <!-- Footer -->