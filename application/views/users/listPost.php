<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <section class="col-md-6 connectedSortable">
                    <h1 class="text-center my-2">Your Posts</h1>
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
                    <div class="">
                        <div class="">
                            <?php

                            if (!empty($posts)) {
                                foreach ($posts as $val) {
                            ?>
                                    <div class="mb-2">
                                        <div class="">
                                            <h3 class="">Posted by You</h3>
                                            <p class=""><small class="text-muted"><?= $val['time_created'] ?></small></p>
                                            <p class="text-justify" style="font-size: 21px;"><?= $val['post']; ?></p>
                                        </div>
                                        <div class="">
                                            <img style="width: 100%; height: 300px;" src="<?= base_url() . 'uploads/' . $val['imgpath']; ?>" class="" alt="Post Img">
                                        </div>
                                        <div class="text-center my-2">
                                            <a class="" title="Edit" onclick="editPost(<?php echo $val['post_id']; ?>);"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="" title="Delete" onclick="deletePost(<?php echo $val['post_id']; ?>);"><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="d-flex flex-row justify-content-between align-content-center mt-3">
                                    <p class="mt-2">
                                        No Post Found
                                    </p>
                                    <p>
                                        <a class="btn btn-sm btn-outline-info" href="<?php echo base_url() . 'welcome/user'; ?>">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Click here to Add Post
                                        </a>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>



                </section>


            </div>
        </div>
    </section>

</div>
<script>
    function deletePost(id) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = "<?php
                                    echo base_url() . 'post/deletePost/'
                                    ?>" + id;
        }
    }

    function editPost(id) {
        window.location.href = "<?php
                                echo base_url() . 'post/editPost/'
                                ?>" + id;
    }
</script>