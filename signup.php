<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Free HTML Login Templates</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/accstyle.css" />

         <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    </head>
    <body>
   
        <div class="container clearfix">
            <div class="form registration">
                <a class="logo" href="index.php">
                    <h1 class="m-0 display-5 text-uppercase text-primary"><a href=""><i class="fa fa-helicopter mr-2"></i>Air-Nigeria</a></h1>
                </a>
                <?php
                         require('config/db.php');
                         // When form submitted, insert values into the database.
                         if (isset($_REQUEST['email'])) {
                             // removes backslashes
                             $firstname = stripslashes($_REQUEST['firstname']);
                             //escapes special characters in a string
                             $firstname = mysqli_real_escape_string($con, $firstname);
                             $lastname = stripslashes($_REQUEST['lastname']);

                             $lastname = mysqli_real_escape_string($con, $lastname);
                             $email    = stripslashes($_REQUEST['email']);
                             $email    = mysqli_real_escape_string($con, $email);
                             $password = stripslashes($_REQUEST['password']);
                             $password = mysqli_real_escape_string($con, $password);
                             $create_datetime = date("Y-m-d H:i:s");
                             $query    = "INSERT into `users` (firstname, lastname, password, email, create_datetime)
                                          VALUES ('$firstname', '$lastname', '" . md5($password) . "', '$email', '$create_datetime')";
                             $result   = mysqli_query($con, $query);
                             if ($result) {
                                 echo "<div class='form'>
                                       <h3>You are registered successfully.</h3><br/>
                                       <p class='link'>Click here to <a href='signin.php'>Login</a></p>
                                       </div>";
                             } else {
                                 echo "<div class='form'>
                                       <h3>Required fields are missing.</h3><br/>
                                       <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                                       </div>";
                             }
                         } else {
                  ?>                      
                <form class="form" action="" method="post">
                    <p>
                        <label>First name<span>*</span></label>
                        <input type="text" name="firstname" required>
                    </p>
                    <p>
                        <label>Last name<span>*</span></label>
                        <input type="text" name="lastname" required>
                    </p>
                    <p>
                        <label>Email address<span>*</span></label>
                        <input type="email" name="email" required>
                    </p>
                    <p>
                        <label>Password<span>*</span></label>
                        <input type="password" name="password" required>
                    </p>
                    <p>
                        <label>Confirm password<span>*</span></label>
                        <input type="password" name="comfirm-password" required>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Register" />

                        <label>
                            <a href="signin.php">already have an account?</a>
                        </label>
                        
                    </p>
                </form>
                <?php
    }
?>
            </div>
        </div>
    </body>
</html>
