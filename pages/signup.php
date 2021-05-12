<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VVS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="../public/css/newlogin.css" />
</head>

<body class="my-login-page my-signup-page">
    <div class="container ">
        <div class="row justify-content-center  h-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card fat">
                        <article class="card-body">
                            <a href="../index.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
                            <h4 class="card-title mt-2">Sign up</h4>
                            <hr />
                            <form class=" mt-4">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="option1" checked>
                                        <span class="form-check-label"> Patient</span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="option2">
                                        <span class="form-check-label"> Provider </span>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" id="fullname">

                                </div>
                                <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Email address will be your username.</small>


                                </div>
                                <div class="form-group ">
                                    <label for="example-date-input">Date</label>
                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">

                                </div>
                                <!-- form-group end.// -->


                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Phone Number </label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label>SSN</label>
                                        <input type="email" class="form-control" id="SSN" placeholder="###-##-####" maxlength="12">


                                    </div>
                                    <!-- form-group end.// -->
                                </div>

                                <!-- form-group end.// -->

                                <div class="form-group">

                                    <label class="control-label" for="SSN">SSN:</label>
                                    <input type="email" class="form-control" id="SSN" placeholder="###-##-####" maxlength="12">


                                </div>

                                <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="">
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="">
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div>

                                <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <select id="inputState" class="form-control">
                                            <option>China</option>
                                            <option>Uzbekistan</option>
                                            <option>Russia</option>
                                            <option selected="">United States</option>
                                            <option>India</option>
                                            <option>Afganistan</option>
                                        </select>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>




                                <!-- form-row.// -->
                                <div class="form-group">
                                    <label>Create password</label>
                                    <input class="form-control" type="password">
                                </div>
                                <div class="form-group">
                                    <label>confirm password</label>
                                    <input class="form-control" type="password">
                                </div>

                                <!-- form-group end.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                </div>
                                <!-- form-group// -->
                                <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept
                                    our
                                    <br> Terms of use and Privacy Policy.</small>
                            </form>
                        </article>
                        <!-- card-body end .// -->
                        <div class="border-top card-body text-center"> Have an account? <a href="../index.php">Log
                                In</a>
                        </div>
                    </div>
                </div>
                <!-- card.// -->
            </div>
            <!-- col.//-->
        </div>
        <!-- row.//-->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>


    <script src="../public/js/signup.js"></script>
</body>

</html>