<?php
include "path.php";
include(ROOT_PATH . "/app/controllers/users.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login || Welcome </title>
    <link rel="shortcut icon" type="image/png" href="assets/img/peerTalk.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--    <link href="assets/css/main.css" rel="stylesheet">
-->

    <!--AOS-->
    <link rel="stylesheet" href="assets/css/aos.css">



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>
<body style="width: 100%;height: 100vh;background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.8)),url(assets/img/Abract01.png) center no-repeat;background-size: cover;">

    <div class="modal-dialog">
    <div class="modal-content" style="background-color: deepskyblue;margin-top: 30%;" data-aos="fade-up" data-aos-delay="200">

        <?php include (ROOT_PATH . "/app/helpers/formErrors.php")?>
        <div class="modal-heading">
            <h2 class="text-center heading-h2">Login</h2>
        </div>

        <hr />
        <div class="modal-body">

            <form action="login.php" method="post" role="form">
                <div class="form-group" data-aos="fade-left" data-aos-delay="400">
                    <div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Enter Username" />
                    </div>
                </div>
                <div class="form-group" data-aos="fade-right" data-aos-delay="400">
                    <div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
							</span>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Enter Password" />

                    </div>

                </div>

                <div class="form-group text-center form_link">
                    <button type="submit" name="login-btn" class="btn btn-success btn-lg" data-aos="fade-down" data-aos-delay="500">Login</button>
                    <br>
                    <a href="<?php echo BASE_URL . '/index.php' ?>" class="btn btn-link" data-aos="fade-left" data-aos-delay="600"> < Back </a>
                    <a href="#" class="btn btn-link" data-aos="fade-in" data-aos-delay="600"> Forgot Password? </a>
                    <a href="<?php echo BASE_URL . '/signup.php' ?>" class="btn btn-link" data-aos="fade-right" data-aos-delay="600"> Don't have an Account? </a>
                </div>

            </form>
        </div>
    </div>
</div>

    <!--jquery-->
    <script src="assets/js/jquery-3.4.1.min.js"></script>

    <!--Owl Carousel js-->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!--AOS js-->
    <script src="assets/js/aos.js"></script>


    <!--custom javascript-->
    <script src="assets/js/script.js"></script>



</body>
</html>
