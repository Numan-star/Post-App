<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <section class="col-lg-6 connectedSortable">


                    <h1 class="my-2">Change Password</h1>
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
                    <p><span class="error">* required field</span></p>
                    <form class="text-danger" method="POST" action="<?= base_url() . 'welcome/changepass' ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="mb-2">
                            <label for="oldpass" class="form-label text-dark">Old Password *</label>

                            <div class="form-control d-flex flex-row col-md-12 bg-white py-1 rounded">
                                <div class="col-11">
                                    <input type="password" placeholder="Old password..." name="oldpass" id="input" value="<?= set_value('oldpass') ?>" class="col-md-12" style="border:none; outline:none;">
                                </div>
                                <div class="col-1 mt-1">
                                    <i class="far fa-eye" onclick="myFunction()" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            <?= form_error('oldpass') ?>
                        </div>
                        <div class="mb-2">
                            <label for="newpass" class="form-label text-dark">New Password *</label>

                            <div class="form-control d-flex flex-row col-md-12 bg-white py-1 rounded">
                                <div class="col-11">
                                    <input type="password" placeholder="New password..." name="newpass" id="input1" value="<?= set_value('newpass') ?>" class="col-md-12" style="border:none; outline:none;">
                                </div>
                                <div class="col-1 mt-1">
                                    <i class="far fa-eye" onclick="myFun()" style="cursor: pointer;"></i>
                                </div>
                            </div>

                            <?= form_error('newpass') ?>
                        </div>

                        <div class="mb-2">
                            <label for="confpass" class="form-label text-dark">Confirm Password *</label>
                            <div class="form-control d-flex flex-row col-md-12 bg-white py-1 rounded">
                                <div class="col-md-12">
                                    <input type="password" placeholder="Confirm password" name="confpass" class="col-md-12" style="border:none; outline:none;" value="<?= set_value('confpass') ?>">
                                </div>
                            </div>

                            <?= form_error('confpass') ?>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="changepass" value="changepass" class="btn btn-info">Save</button>
                            <a href="<?= base_url() . 'welcome/user' ?>" class="btn btn-dark">Cancel</a>
                        </div>

                    </form>




                </section>


            </div>
        </div>
    </section>

</div>