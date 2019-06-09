<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/lib/Session.php';
Session::init();
?>
<?php
//Session::checkSession();
?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>
<?php include 'functions.php'; ?>
<?php

$db = new database();
$fn=new Functions();
?>
<?php
include 'lib/User.php';
?>
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    $userLogin = $user->studentLogin($_POST);
}
?>

<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>
        <section class="loginpage">
            <form method="post">
                <h2>User Login</h2>
                <table>
                    <tr>
                    <td>Email:</td>
                    <td><input type="text" placeholder="Enter Username" name="email" required></td>
                    </tr>
                    <tr>
                    <td>Password:</td>
                    <td><input type="password" placeholder="Enter Password" name="password" required></td>
                    </tr>
                </table>
                <div class="loginSubmit">
                    <input type="submit" name="login" value="Submit"/>
                </div>
                 <div class="loginSubmit">
                    <a style="text-decoration: none" href="forgotpass.php"><h5>Forgot Password / First Time Login????</h5></a>
                </div>
            </form>
        </section>
    </body>

</html>
