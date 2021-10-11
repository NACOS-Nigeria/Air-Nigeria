<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Free HTML Login Templates</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/accstyle.css" />

        <!--  Bootstrap CDN Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js">
    

       <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container clearfix">
            <div class="form login">
                <a class="logo" href="index.php">
                    <h1 class="m-0 display-5 text-uppercase text-primary"><i class="fa fa-helicopter mr-2"></i>Air-Nigeria</h1>
                </a>
                <?php
    require('config/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect email or password.</h3><br/>
                  <p class='link'>Click here to <a href='signin.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
                <form class="form" method="post" name="login">
                    <p>
                        <label>email address<span>*</span></label>
                        <input type="email" name="email" required>
                    </p>
                    <p>
                        <label>Password<span>*</span></label>
                        <input type="password" name="password" required>
                    </p>
                    <p>
                        <label>
                            <a href="pass-reset.php">Forgot password?</a>
                            <a href="signup.php">Create an account</a>
                        </label>
                        <input type="submit" name="submit" value="Login" />
                    </p>
                </form>

            <?php
    }
    ?>
            </div>
        </div>
    </body>
</html>