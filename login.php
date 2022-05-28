<?php
require("includes/common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
        .main {
            padding-top: 7%;
        }
        
            .submit {
                /* width: -webkit-fill-available; */
                width: 100%;
            }

    </style>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Life Style Store</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        
        <?php include 'includes/header.php'; ?>
        <div id="content" style="background-image: url('img/T.jpg');">
            <div class="container-fluid decor_bg " id="login-panel">
                <div class="row main">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="thumbnail">
                      <img src="img/0000.jpg" alt="">
                            <div class="panel-body">
                                <p class="text-warning">Login to make a purchase<p>
                                <form action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="e-mail" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control glyphicon glyphicon-eye-open" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary submit ">Login</button><br><br>
                                    <input type="hidden" name="redirect_to" value="<?php echo $_GET['redirect_to']; ?>" />
                                    <?php echo $_GET['error']; ?>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
