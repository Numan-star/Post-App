<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <section class="col-md-6 connectedSortable">

                    <h1 class="text-center my-2">All Posts</h1>
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

                    <div>

                        <?php
                        if (!empty($posts)) {
                            foreach ($posts as $val) {
                        ?>
                                <div style="box-shadow: 2px 2px 12px 0px #d1cacaa6;" class="bg-white rounded mb-3 border px-3 py-1">
                                    <div class="d-flex flex-row align-items-center mt-2">
                                        <div class="mr-2">
                                            <a href=" <?= base_url() . 'profilepic/' . $val['img']; ?>" target="_blank">
                                                <img class="profilepic" src=" 
                                                <?php
                                                if (empty($val['img'])) {
                                                    echo "";
                                                } else {
                                                    echo base_url() . 'profilepic/' . $val['img'];
                                                } ?>
                                                " alt="User Logo">
                                            </a>
                                        </div>
                                        <div class="">
                                            <h4 class="font-italic mb-0"><?= $val['username'] ?></h4>
                                            <small class="text-muted">
                                                <?php $time = $val['time_created'];
                                                $dofb = date("h:i A (d/M/y)", strtotime($time));
                                                echo $dofb; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mt-2 text-justify" style="font-size: 22px;"><?= $val['post']; ?></p>
                                    </div>
                                    <a href="<?= base_url() . 'uploads/' . $val['imgpath']; ?>" target="_blank">
                                        <img style="width: 100%; height:300px; border-radius:5%;" src="<?= base_url() . 'uploads/' . $val['imgpath']; ?>" class="" alt="Post Img">
                                    </a>


                                    <!-- <form action="" method="post" id="commentSend" name="commentSend">
                                        <div class="my-2 col-md-12 d-flex flex-row align-items-center justify-content-evenly rounded-pill border p-2  bg-light">
                                            <span class="col-11">
                                                <input type="hidden" name="postId" id="postId" value="<?php
                                                                                                        // echo $val['post_id'] 
                                                                                                        ?>">
                                                <input type="hidden" name="userId" id="userId" value="<?php
                                                                                                        // echo $id
                                                                                                        ?>
                                                ">
                                                <input class="border-0 comment bg-light col-12 px-0 py-1" placeholder="Write a comment..." type="text" name="comment" id="comment">
                                            </span>
                                            <span class="col-1 m-0 p-0">
                                                <button type="submit" class="btn btn-info btn-sm p-0 m-0">
                                                    Send
                                                    <?php
                                                    // echo $id;
                                                    ?>
                                                     <i class="fa-sharp fa-solid fa-paper-plane"></i> 
                                    </button>
                                    </span>
                                </div>
                                </form> -->

                                    <form id="commentFrm" name="commentFrm" action="
                                    <?php
                                    echo base_url() . 'post/comment/' . $val['post_id']
                                    ?>" method="post">
                                        <div class="my-2 col-md-12 d-flex flex-row align-items-center justify-content-evenly rounded-pill border p-2  bg-light">
                                            <span class="col-11">
                                                <input class="border-0 comment bg-light col-12 px-0 py-1" placeholder="Write a comment..." type="text" name="comment" id="">
                                            </span>
                                            <span class="col-1 m-0 p-0">
                                                <button type="submit" name="submit" class="btn p-0 m-0">
                                                    <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>

                                    <div>
                                        <a class="nav-link col-3 p-0" onclick="commentClick();" data-toggle="dropdown" href="#">
                                            <button data-toggle="tooltip" data-placement="bottom" title="User Detail" class="btn btn-sm">
                                                <span style="font-size: 22px;" class="mx-1">
                                                    <?php
                                                    $count = 0;
                                                    foreach ($comments as $comment) {
                                                        if (($comment['post_id'] == $val['post_id'])) {
                                                            $count = $count + 1;
                                                        }
                                                    }
                                                    echo $count;
                                                    ?>
                                                </span>
                                                <i class="fa-regular fa-comment" title="Comments"></i>

                                            </button>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-center col-7">
                                            <div class="text-justify p-2">

                                                <?php
                                                if ($count > 0) {
                                                    if (!empty($comments)) {
                                                        foreach ($comments as $comment) {
                                                            if (($comment['post_id'] == $val['post_id'])) {
                                                ?>
                                                                <div class="d-flex flex-row justify-content-between mb-0">
                                                                    <strong>By
                                                                        <?php
                                                                        echo $comment['username'];
                                                                        ?>
                                                                    </strong>
                                                                    <span>
                                                                        <p title="
                                                                        <?php
                                                                        $time = $comment['created_at'];
                                                                        $dofb = date("d/M/Y", strtotime($time));
                                                                        echo $dofb
                                                                        ?>
                                                                        ">
                                                                            <?php
                                                                            $time = $comment['created_at'];
                                                                            $dofb = date("h:i A", strtotime($time));
                                                                            echo $dofb
                                                                            ?>
                                                                        </p>
                                                                    </span>
                                                                </div>
                                                                <div class="mt-0 text-justify">
                                                                    <?php
                                                                    echo $comment['comment'];
                                                                    ?>
                                                                </div>
                                                                <hr class="mb-0">
                                                    <?php
                                                            } else {
                                                                echo "";
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <h4 class="text-center">No Comments Yet</h4>
                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <!-- <div>
                                                <table class="table table-striped" id="carModelList">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // if (!empty($comments)) {
                                                        //     foreach ($comments as $row) {
                                                        //         if (($row['post_id'] == $val['post_id'])) {
                                                        //             $data['row'] = $row;
                                                        //             $this->load->view("users/comment_row.php", $data);
                                                        //         } else {
                                                        //             echo '';
                                                        //         }
                                                        //     }
                                                        // } else {
                                                        ?>
                                                            <tr>
                                                                <td colspan="8" class="text-center">No Records exist in the Database</td>
                                                            </tr>
                                                        <?php
                                                        // }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div> -->

                                        </div>

                                    </div>

                                </div>
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


                </section>


            </div>
        </div>
    </section>

</div>
<script>
    // $("body").on("submit", "#commentSend", function(e) {
    //     e.preventDefault();

    //     $.ajax({

    //         url: '<?php
                        // echo base_url() . 'Post/comment' 
                        ?>',
    //         type: 'POST',
    //         data: $(this).serializeArray(),
    //         dataType: 'json',
    //         success: function(response) {
    //             <?php
                    //             // redirect(base_url() . 'post/viewOtherPost');
                    //             
                    ?>
    //         }
    //     });
    // });
</script>