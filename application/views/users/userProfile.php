<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="d-flex justify-content-center align-items-center">

                <section class="connectedSortable">

                    <h1 class="text-center my-3">Your Profile</h1>

                    <div class="col-md-12">
                        <?php
                        $success = $this->session->userdata('success');
                        if ($success != "") {
                        ?>
                            <div class="alert alert-success" id="my_alert"><?= $success ?></div>
                        <?php
                        }
                        $failure = $this->session->userdata('failure');
                        if ($failure != "") {
                        ?>
                            <div class="alert alert-danger" id="my_alert"><?= $failure ?></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <img class="userprofilepic d-block" src="<?php
                                                                    if ($pic == false) {
                                                                        echo "No Image Upload";
                                                                    } else {
                                                                        echo base_url() . 'profilepic/' . $pic['img'];
                                                                    } ?>" alt="Profile_Pic">
                        <a class="nav-link border-bottom text-center" href="<?= base_url() . 'welcome/userProfilePic' ?>">Edit Profile Pic</a>
                        <br>
                        <strong>Name:</strong>
                        <p class="ml-5 mb-1"><?= $user['username'] ?></p>
                        <strong>Email:</strong>
                        <p class="ml-5 mb-1"><?= $user['email'] ?></p>
                        <strong>Date Of Birth:</strong>
                        <p class="ml-5"><?= $user['dob'] ?></p>
                    </div>

            </div>

    </section>


</div>
</div>
</section>

</div>