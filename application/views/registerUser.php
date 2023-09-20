<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - YourSelf</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container my-1 d-flex justify-content-center flex-column col-md-12">

            <div class="col-md-12">
                <h1 class="text-center" style="font-family: 'Lato', sans-serif;">Sign Up</h2>
                    <p class="text-center" style="font-family: 'Lato', sans-serif;">It's quick and easy.</p>
                    <hr>
            </div>

            <div class="col-md-12">
                <div class="col-md-12 mt-3">
                    <?php
                $success = $this->session->userdata('success');
                if ($success != "") {
                ?>
                    <div class="alert alert-success text-center" id="my_alert"><?= $success ?></div>
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
                <form action="" method="post" name="createFrm" id="createFrm"
                    class="d-flex justify-content-center flex-column align-items-center">
                    <div class="form-group col-md-6 col-9">
                        <label for="inputEmail4">UserName</label>
                        <input type="text" name="username" class="form-control" id="inputEmail4">
                        <p class="username_error"></p>
                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="inputAddress">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                        <p class="password_error"></p>
                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="inputAddress">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="inputAddress"
                            placeholder="">
                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="inputPassword4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputPassword4">
                        <p class="email_error"></p>
                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">Select a Country</option>
                            <?php
                        if (!empty($countries)) {
                            foreach ($countries as $country) {
                        ?>
                            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>}
                            <?php
                            }
                        }
                        ?>
                        </select>
                        <p class="country_error"></p>

                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="">State</label>
                        <div id="statesBox">
                            <select name="state" id="state" class="form-control">
                                <option value="">Select a State</option>
                            </select>
                        </div>
                        <p class="state_error"></p>

                    </div>
                    <div class="form-group col-md-6 col-9">
                        <label for="">City</label>
                        <div id="citiesBox">
                            <select name="city" id="city" class="form-control">
                                <option value="">Select a City</option>
                            </select>
                        </div>
                        <p class="city_error"></p>
                    </div>
                    <div class="form-group col-md-6 col-9 mb-3">
                        <label for="inputAddress">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <button type="submit" class="btn btn-success w-50">
                        Register
                    </button>
                </form>

                <div class="d-flex justify-content-center flex-column align-items-center">
                    <a href="<?= base_url() . 'panel' ?>" class="nav-link w-50 mt-1 mb-5">
                        <button class="btn btn-outline-dark w-100">
                            Already have account
                        </button>
                    </a>
                </div>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

        <script src="<?= base_url() . 'js/jquery-3.6.3.min.js' ?>"></script>

        <script>
        $(document).ready(function() {
            $("#country").change(function() {
                // Here we will run an ajax request
                var country_id = $(this).val(); // Selected country id

                $.ajax({
                    url: '<?php echo base_url('panel/getStates') ?>/',
                    type: 'POST',
                    data: {
                        country_id: country_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response['states']) {
                            $("#statesBox").html(response['states']);
                        }
                    }
                });


                $("#citiesBox").html("<select name=\"city\" id=\"city\" class=\"form-control\">\
                    <option value=\"\">Select a City</option>\
                </select>");

            });




            $(document).on("change", "#state", function() {
                var state_id = $(this).val(); // Selected state id

                $.ajax({
                    url: '<?php echo base_url('panel/getCities') ?>/',
                    type: 'POST',
                    data: {
                        state_id: state_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response['cities']) {
                            $("#citiesBox").html(response['cities']);
                        }
                    }
                });
                //alert(state_id)
            })


        });

        $("#createFrm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '<?php echo base_url('panel/saveUser') ?>',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response['status'] == 0) {

                        if (response['username']) {
                            $(".username_error").html(response['username']);
                        } else {
                            $(".username_error").html("");
                        }

                        if (response['password']) {
                            $(".password_error").html(response['password']);
                        } else {
                            $(".password_error").html("");
                        }

                        if (response['email']) {
                            $(".email_error").html(response['email']);
                        } else {
                            $(".email_error").html("");
                        }

                        if (response['country']) {
                            $(".country_error").html(response['country']);
                        } else {
                            $(".country_error").html("");
                        }

                        if (response['state']) {
                            $(".state_error").html(response['state']);
                        } else {
                            $(".state_error").html("");
                        }

                        if (response['city']) {
                            $(".city_error").html(response['city']);
                        } else {
                            $(".city_error").html("");
                        }
                    } else {
                        window.location.href = "<?php echo base_url('panel/register') ?>";
                    }
                    //console.log(response)
                }
            })
        });
        </script>
    </body>

</html>