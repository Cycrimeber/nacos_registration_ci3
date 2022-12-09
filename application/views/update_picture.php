<!-- Content wrapper -->
<div class="content-wrapper bg-img">
    <?php $user_id = $this->session->user->id; ?>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1 class="fw-bold mt-5"><span class=" fw-light">Update</span> your Profile Pic</h1>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <?php if (isset($failure)) {
                    ?>
                        <span class="alert alert-danger">*<?php echo $failure; ?></span>
                    <?php
                    } ?>

                    <div class="card-header d-flex justify-content-between align-items-center m-auto">
                        <img src="<?php echo base_url('uploads/profile/' . $user_profile->photo); ?>" class="img-thumbnail" width="150" alt="Profile Image">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url('create_profile/updatePicture'); ?>" enctype="multipart/form-data">
                            <div class=" d-flex gap-3 py-4">
                                <label for="formFile" class="form-label text-primary"> <i class="bx bx-camera fs-1"></i>Upload Picture</label>
                                <input class="form-control w-75 m-auto" type="file" name="profile_photo_update" id="formFile" />
                            </div>
                            <?php if (isset($_POST['update_picture'])) {
                            ?>
                                <span class="text-danger">*<?php foreach ($imageError as $err) {
                                                                echo $err;
                                                            }
                                                            ?></span>
                            <?php
                            } ?>

                            <div class="d-flex flex-column col-md-8 m-auto py-3">
                                <input type="submit" value="Update Picture" name="update_picture" class="btn btn-success mb-5">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <!-- Footer -->