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

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <div class="contain">
        <?php
        if (isset($_GET["msg"])) {
            echo $_GET["msg"];
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addstudent'])) {
            $roll = $_POST['roll'];
            $class = $_POST['ctype'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            if (isset($_FILES['image'])) {
                echo 'ok I have got image';
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                echo '' . $file_name . '<br/>';


                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "image/" . $file_name);
                    echo 'Image Added';
                }

                $query = "INSERT INTO `tbl_student` (`id`, `roll`, `class`, `name`,`image`, `email`, `contact`, `Address`, `password`)"
                        . " VALUES (NULL, '" . $roll . "', '" . $class . "', '" . $name . "', '" . $file_name . "', '" . $email . "', '" . $contact . "','" . $address . "','12345');";
                $db->insert($query, "addstudent.php");
            } else {
                echo 'Select Image first';
            }
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <h2>Add Student:</h2>
            <table class="mytable">
                <tr>
                    <th>Name:</th>
                    <th><input name="name" type="text" placeholder="Enter title in here" required></th>
                </tr>
                <tr>
                    <th>Profile Picture:</th>
                    <th><input type="file" name="image" /></th>
                </tr>
                <tr>
                    <th>Roll:</th>
                    <th><input name="roll" type="number" placeholder="Enter title in here" required></th>
                </tr>
                <tr>
                    <th>Class:</th>
                    <th>
                        <select name="ctype">        
                            <option value="">Select Class</option>
                            <option value="1">Class 01</option>
                            <option value="2">Class 02</option>
                            <option value="3">Class 03</option>
                            <option value="4">Class 04</option>
                            <option value="5">Class 05</option>
                        </select> 
                    </th>
                </tr>
                <tr>
                    <th>Email:</th>
                    <th><input name="email" type="email" placeholder="Enter title in here" required></th>
                </tr>
                <tr>
                    <th>Contact:</th>
                    <th><input name="contact" type="text" placeholder="Enter title in here" required></th>
                </tr>
                <tr>
                    <th>Address:</th>
                    <th><input name="address" type="text" placeholder="Enter title in here" required></th>
                </tr>
                <tr>
                    <th></th>
                    <th><input name="addstudent" type="submit" ></th>
                </tr>
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
