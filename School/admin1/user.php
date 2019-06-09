<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
?>
<?php
if (isset($_GET['action'])) {
    Session::A_distroy();
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
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateprofile'])) {
    echo 'update processing';
    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($name == '' || $email == '') {
        $error = "Eield must not be empty";
    } else {
        $id = Session::get("admin","id");
        $query = "update tbl_user set name='$name',email='$email'"
                . " where id=$id;";
        $update = $db->update($query, "user.php");
    }
}
?>
<?php include 'nav.php'; ?>
                <article class="maincontain clear">
                    <div class="contain">
                        <h2><?php
                            $loginMessage = Session::get("admin","name");
                            if (isset($loginMessage)) {
                                echo 'Admin';
                            }
                            ?></h2>
                        <form  method="post">
                            <table>
                                <?php
                                $id = Session::get("admin","id");
                                $query = "Select * from tbl_user where id=" . $id . ";";
                                $read = $db->select($query);
                                if ($read) {
                                    $row = $read->fetch_assoc();
                                    ?>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" value="<?php echo $row['name'] ?>"/></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="email" name="email" value="<?php echo $row['email'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            echo "<span style='color:green;'>" . $_GET['msg'] . "</span>";
                                        }
                                        ?>
                                        <td><input type="submit" name="updateprofile" value="Update Profile"/></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </article>
            </section>

            <footer class ="footersection clear">
                <h3>&copy;  Mohammad Saiful Islam Khan</h3>
            </footer>
        </div>

        <script src="js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            window.ga = function () {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>

</html>
