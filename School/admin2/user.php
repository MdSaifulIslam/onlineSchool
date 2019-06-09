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
Session::checkSession("teacher");
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
    $contact = $_POST['contact'];
    $Address = $_POST['Address'];
    if ($name == '' || $email == '' || $contact == '') {
        $error = "Eield must not be empty";
    } else {
        $id = Session::get("teacher", "id");
        $query = "update tbl_teacher set name='$name',email='$email'"
                . ",contact='$contact',Address='$Address' where id=$id;";
        $update = $db->update($query, "user.php");
    }
}
?>

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <div class="contain">
        <h2><?php
            $loginMessage = Session::get("teacher", "name");
            if (isset($loginMessage)) {
                echo '' . $loginMessage;
            }
            ?></h2>
        <?php
        $id = Session::get("teacher", "id");
        $query = "Select * from tbl_teacher where id=" . $id . ";";
        $read = $db->select($query);
        if ($read) {
            $row = $read->fetch_assoc();
            ?>
            <img style="width: 201px; height: 200px;border-radius:29px" src="../admin1/image/<?php echo $row['image']; ?>" alt="post image"/>
            <form  method="post">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" value="<?php echo $row['name'] ?>"/></td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td><input type="text" name="contact" value="<?php echo $row['contact'] ?>"/></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="Address" value="<?php echo $row['Address'] ?>"/></td>
                    </tr>
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
