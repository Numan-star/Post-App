<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <section class="col-lg-6 connectedSortable">
                    <h1 class="text-center my-3">Upload Profile Pic</h1>
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
                    <?php
                    if ($check != TRUE) {
                    ?>
                        <form action="<?= base_url() . 'welcome/insertPicture' ?>" method='POST' enctype="multipart/form-data" class="d-flex flex-column align-items-center mt-3">
                            <input type="hidden" name="userId" value="<?php echo $id; ?>">
                            <div class="form-group col-12">
                                <label for="picture">Add Profile Pic</label>
                                <input class="form-control" type="file" name="userfile" />
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <div class="d-flex flex-column justify-content-center align-items-center col-md-12 my-5">
                            <h4 class="text-center">You have already uploaded your Profile Pic.</h4>
                            <a class="mt-2 text-center" href="<?php echo base_url() . 'welcome/deletePic/' . $id ?>">
                                <p class="btn btn-success btn-sm">
                                    Click Here to Change your profile Pic!
                                </p>
                            </a>
                            <a class="mb-2 text-center" href="<?= base_url() . 'profilepic/' . $pic['img'] ?>">
                                <p class="btn btn-warning btn-sm">
                                    Click Here to View your profile Pic!
                                </p>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
            </div>


    </section>


</div>
</div>
</section>

</div>