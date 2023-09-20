<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <title>Dependent Dropdown / Country > State > City</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="bg-dark text-white p-3 text-center">Welcome to Admin Panel</h3>
                <h2 class="text-center d-block">
                    <a class="btn btn-danger" href="<?= base_url() . 'welcome/signOut' ?>">Logout</a>
                </h2>
            </div>
            <div class="col-md-12">
                <?php
                if (!empty($this->session->userdata('success'))) {
                ?>
                    <div class="alert alert-success"><?php echo $this->session->userdata('success'); ?></div>
                <?php
                }
                ?>

                <?php
                if (!empty($this->session->userdata('error'))) {
                ?>
                    <div class="alert alert-danger"><?php echo $this->session->userdata('error'); ?></div>
                <?php
                }
                ?>
                <h3>All Register Users</h3>
                <hr>

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php if (!empty($users)) {
                            foreach ($users as $user) {
                        ?>
                                <tr>
                                    <td><?php echo $user['user_id'] ?></td>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['dob'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('panel/edit/' . $user['user_id']) ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>