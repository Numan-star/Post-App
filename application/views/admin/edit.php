    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - YourSelf</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    </head>

    <body>



        <div class="container">
            <form action="" method="post" id="editFrm" name="editFrm">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="bg-dark text-white p-3">Dependent Dropdown / Country > State > City</h3>
                    </div>


                    <div class="col-md-12">
                        <h3>Edit</h3>
                        <hr>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="username" id="username" value="<?php echo $user['username'] ?>" class="form-control">
                            <p class="username_error"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>" class="form-control">
                            <p class="email_error"></p>
                        </div>


                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="country" id="country" class="form-control">
                                <option value="">Select a Country</option>
                                <?php
                                if (!empty($countries)) {
                                    foreach ($countries as $country) {
                                ?>
                                        <option <?php echo ($user['country'] == $country['id']) ? 'selected' : ''; ?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <p class="country_error"></p>

                        </div>

                        <div class="form-group">
                            <label for="">State</label>
                            <div id="statesBox">
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select a State</option>
                                    <?php
                                    if (!empty($states)) {
                                        foreach ($states as $state) {
                                    ?>
                                            <option <?php echo ($user['state'] == $state['id']) ? 'selected' : ''; ?> value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <p class="state_error"></p>

                        </div>

                        <div class="form-group">
                            <label for="">City</label>
                            <div id="citiesBox">
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select a City</option>
                                    <?php
                                    if (!empty($cities)) {
                                        foreach ($cities as $city) {
                                    ?>
                                            <option <?php echo ($user['city'] == $city['id']) ? 'selected' : ''; ?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <p class="city_error"></p>
                        </div>

                        <button class="btn btn-primary" type="submit">Create</button>

                        <a href="<?php echo base_url('welcome/index') ?>" class="btn btn-secondary">BACK</a>

                    </div>



                </div>
            </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script src="<?= base_url() . 'js/jquery-3.6.3.min.js' ?>"></script>

        <script>
            $(document).ready(function() {
                $("#country").change(function() {
                    var country_id = $(this).val();

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
                    var state_id = $(this).val();

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
                })


            });

            $("#editFrm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: '<?php echo base_url('panel/updateUser/' . $user['user_id']) ?>',
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
                            window.location.href = "<?php echo base_url('welcome/index') ?>";
                        }
                    }
                })
            });
        </script>
    </body>

    </html>