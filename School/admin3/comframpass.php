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
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $email = $_POST['email'];
    if ($pass != $repass) {
        echo 'Password Not Matched';
    } else {
        $query = "UPDATE `tbl_student` SET `password` = '" . $pass . "' WHERE `tbl_student`.`email` = '" . $email . "';";

        $db->update($query, "login.php");
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
                <h2>Confarm Password  </h2>
                <table>
                    <?php
                    if (isset($_GET['r'])) {
                        $r = $_GET['r'];
                        $query="select * from random where random='".$r."'";
                        $read = $db->select($query);
                        if ($read) {
                            $row = $read->fetch_assoc();
                            ?>
                            <tr>
                                <td>Your Email:</td>
                                <td><input type = "text" value="<?php echo $row['email']; ?>"   name = "email" required></td>
                            </tr>
                            <tr>
                                <td>Enter Password:</td>
                                <td><input type = "text" placeholder = "Enter Password" name = "password" required></td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td><input type = "password" placeholder = "Enter Password" name = "repassword" required></td>
                            </tr>
                        </table>
                        <div class="loginSubmit">
                            <input type="submit" name="login" value="Submit"/>
                        </div>
                        <?php
                    } else {
                        echo 'Invalid Email';
                    }
                } else {
                    echo 'Invalid Email';
                }
                ?>

            </form>
        </section>
    </body>

</html>
