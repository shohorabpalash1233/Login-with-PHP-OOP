<?php
session_start();
require_once 'functions.php';
$user = new LoginRegistration();
if ($user->getSession()) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <h3>PHP OOP Login Register System</h3>
            </div>

            <div class="mainmenu">
                <ul>
                    <?php if ($user->getSession()) { ?>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="changePassword.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php } ?>
                </ul>
            </div>


            <div class="content">
                <h2>Register</h2>


                <p class="msg">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $website = $_POST['website'];

                        if (empty($username) or empty($password) or empty($name) or empty($email) or empty($website)) {
                            echo "<span style='color: #e53d37;'>Field must not be empty</span>";
                        } else {
                            $password = md5($password);
                            $register = $user->registerUser($username, $password, $name, $email, $website);
                            if ($register) {
                                echo "Register done <a href='login.php'>Click here </a> for login";
                            } else {
                                echo "Username or Email already exists";
                            }
                        }
                    }
                    ?>
                </p>

                <div class="login_reg">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" placeholder="Enter username"></td>
                            </tr>

                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" placeholder="Enter password"></td>
                            </tr>

                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="name" placeholder="Enter name"></td>
                            </tr>

                            <tr>
                                <td>Email:</td>
                                <td><input type="email" name="email" placeholder="Enter email"></td>
                            </tr>

                            <tr>
                                <td>Website:</td>
                                <td><input type="text" name="website" placeholder="Enter website"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">

                                    <input type="submit" name="register" value="Register">
                                    <input type="reset" name="" value="Reset">

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="back">
                    <a href="login.php">Back</a>
                </div>
            </div>
            <div class="footer">
                <h3>www.google.com</h3>
            </div>

        </div>
    </body>
</html>