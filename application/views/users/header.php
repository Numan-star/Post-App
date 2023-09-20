<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PostApp | App</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/css/style.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="httpss://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/summernote/summernote-bs4.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .fa-regular {
            cursor: pointer;
            font-size: 20px;
            color: black;
        }

        .fa-regular:hover {
            cursor: pointer;
            font-size: 20px;
        }

        .fa-sharp {
            cursor: pointer;
            font-size: 23px;
            color: skyblue;
        }

        .comment {
            outline: none;
            padding: 2px 30px;
        }

        .btn-comment:hover {
            background-color: transparent;
            outline: none;
            color: transparent;
        }

        .profilepic {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .userprofilepic {
            width: 250px;
            height: 250px;
            border-radius: 20%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <?= $name ?>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user" data-toggle="tooltip" data-placement="bottom" title="User Detail"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <span class="col-6 m-0 p-0">
                                <img class="rounded-circle col-md-12 col-sm-12 my-2 mx-0" src="
                                <?php
                                if (empty($pic)) {
                                    echo "";
                                } else {
                                    echo base_url() . 'profilepic/' . $pic['img'];
                                } ?>" alt="User Image">
                            </span>
                            <span class="col-6 mt-3 mx-0 p-0">
                                <p class="text-center" style="font-size:20px;"><?php
                                                                                echo $name;
                                                                                ?></p>
                            </span>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="my-1 mx-0 p-0">
                            <a class="nav-link d-inline" href="<?= base_url() . 'welcome/changepass' ?>">
                                <button class="btn btn-sm btn-outline-info">Change Password</button>
                            </a>
                            <a class="nav-link d-inline" href="<?= base_url() . 'welcome/signOut' ?>">
                                <button class="btn btn-sm btn-info my-1">LogOut</button>
                            </a>
                        </div>

                    </div>
                </li>
            </ul>
        </nav>
        <?php
        include "sidebar.php";

        ?>