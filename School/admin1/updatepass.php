
<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
?>
<?php
if (isset($_GET['action'])) {
    Session::T_distroy();
}
?>
<?php
Session::checkSession("admin");
?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>
<?php include 'functions.php'; ?>
<?php
$db = new database();
$fn = new Functions();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $id=Session::get("admin","email");
    if ($pass != $repass) {
        echo 'Password Not Matched';
    } else {
        $query = "UPDATE `tbl_user` SET `password` = '" . $pass . "' WHERE `email` = '" . $id . "';";

        $db->update($query, "index.php");
    }
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
                <h2>Change Password  </h2>
                <table>
                    <tr>
                        <td>Enter Password:</td>
                        <td><input type = "password" placeholder = "Enter Password" name = "password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type = "password" placeholder = "Enter Password" name = "repassword" required></td>
                    </tr>
                </table>
                <div class="loginSubmit">
                    <input type="submit" name="login" value="Submit"/>
                </div>
            </form>
        </section>
    </body>

</html>
