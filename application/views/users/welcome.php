<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <section class="col-lg-6 connectedSortable">
                    <h1 class="my-2">Create Post</h1>

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
                    <form action="<?= base_url() . 'post/createPost' ?>" method='POST' enctype="multipart/form-data" class="mt-3">
                        <input type="hidden" name="userId" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="username">What's on your mind, <?= $name ?></label>
                            <div>
                                <textarea class="col-12" required name="post" id="" cols="55" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="picture">Add to your post</label>
                            <input class="form-control" type="file" name="userfile" />
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn w-25 btn-outline-primary font-weight-bold">Post</button>
                        </div>
                    </form>
            </div>


    </section>


</div>
</div>
</section>

</div>