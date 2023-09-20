<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PostApp | Log In</title>

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <style>
    /* html {
		background: url(images/bg.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	} */

    .fbpara {
        font-size: 27px;
        font-weight: 500;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: justify;
    }

    .heading1 {
        font-size: 60px;
        font-style: oblique;
        text-shadow: 2px 2px 2px skyblue;
    }

    .heading2 {
        font-size: 60px;
        font-style: oblique;
        text-shadow: 2px 2px 2px pink;
    }
    </style>

    <body class="bg-muted">
        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center container mt-1 my-4">

            <div class="col-md-12 col-11">
                <span class="text-center d-block">
                    <h1 class="text-info d-inline heading1">Post</h1>
                    <h1 class="text-danger d-inline heading2">App</h1>
                </span>
                <p class="fbpara text-center mt-3">PostApp helps you connect and share with the people in your life.</p>
                <hr>

            </div>
            <div class="col-md-5 col-sm-12 col-11 mt-4 mb-2">
                <div style="box-shadow: 2px 2px 12px 0px #d1cacaa6;"
                    class="col-md-12 p-4 bg-white text-primary rounded-3 border border-dark-subtle">
                    <div>
                        <?php
$errorMsg = $this->session->userdata('errorMsg');
if (!empty($errorMsg)) {
    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
echo $errorMsg;
    ?>
                        </div>
                        <?php
}
?>
                    </div>
                    <div>
                        <h1 class="col-md-12 text-left text-info">Login</h1>
                        <hr>
                        <form class="mt-3 mb-3" method="POST" action="<?php echo base_url() . 'panel'; ?>">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text bg-light border-0" id="addon-wrapping"><i
                                        class="fa fa-user"></i></span>
                                <input type="text" name="username" class="form-control bg-light border-0"
                                    placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <p><?php echo form_error('username'); ?></p>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text bg-light border-0"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password"
                                    class="form-control bg-light border-0 outline-none" placeholder="Password">
                            </div>
                            <p><?php echo form_error('password'); ?></p>
                            <div class="d-flex flex-row justify-content-between">
                                <button type="submit" name="submit" class="btn btn-info w-100">Login</button>
                            </div>
                            <div class="mt-2">
                                <p><a class="btn btn-outline-dark w-100" style="text-decoration: none;"
                                        href="<?=base_url() . 'panel/register'?>">Create new account</a></p>
                            </div>

                            <hr class="text-black">
                            <div class="my-2">
                                <a href="#" class="nav-link text-center text-dark">Forgotten password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>