<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="public/css/newlogin.css">
</head>

<body class="my-login-page">

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">

                <div class="card-wrapper">
                    <div class="brand">
                        <img src="public/images/2.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">

                            <h4 class="card-title">Login</h4>

                            <form name="login" id="login" class="my-login-validation needs-validation" novalidate>
                                <div class="form-group">
                                    <label id="ulabel" for="email">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    <div id="ufeedback" class="invalid-feedback">
                                        Email is invalid, eg: xxx@mac.com
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password

                                    </label>
                                    <input id="password" type="password" class="form-control" pattern="[A-Za-z0-9]{1,20}" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is invalid
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rPatient" value="option2" required checked>
                                        <label class="form-check-label" for="inlineRadio2">Patient</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rProvider" value="option1" required>
                                        <label class="form-check-label" for="inlineRadio1">Provider</label>
                                    </div>

                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    <p id="reportmsg" class="text-danger text-center"> </p>
                                    <p id="successmsg" class="text-success text-center"> </p>

                                    Don't have an account? <a href="pages/signup.php">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Database project &mdash; zz2310, jz1433
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>


    <script src="public/js/log.js"></script>
    

</body>

</html>