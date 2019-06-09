<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>
<?php include 'functions.php'; ?>
<?php
$db = new database();
$fn = new Functions();
?>
<?php
include 'lib/User.php';
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
                <?php
                $user = new User();
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $query = "SELECT * FROM `tbl_teacher` WHERE email='" . $email . "'";
                    $read = $db->select($query);
                    if ($read) {
                        $str = '123456890ashulmbreAEEGIYIKOML';
                        $str = str_shuffle($str);
                        $str = substr($str, -10);
                        $link = "http://localhost/School/admin2/comframpass.php?r=";
                        $subject = 'Reset Password';
                        $body = "Your Password resetting Link is : '" . $link . "" . $str."'";

                        $query = "INSERT INTO `random` (`id`, `random`, `email`) VALUES (NULL, '" . $str . "', '" . $email . "');";
                        $read = $db->insert($query, "fsendmail.php?next=comframpass.php&mail=" . $email . "&body=" . $body . "&subject=" . $subject);
                        echo '<strong>Password Submitted link has to your Email</strong>';
                    }
                }
                ?>
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" placeholder="Enter your Email Address" name="email" required></td>
                    </tr>
                    <tr>
                </table>
                <div class="loginSubmit">
                    <input type="submit" name="login" value="Submit"/>
                </div>
            </form>
        </section>
    </body>

</html>
