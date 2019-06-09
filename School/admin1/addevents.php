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
    <?php
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addevent'])) {
        $title = $_POST['title'];
        $event = $_POST['event'];
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

            $query = "INSERT INTO `tbl_event` (`id`, `title`, `event`, `image`, `date`) VALUES (NULL, '" . $title . "', '" . $event . "', '" . $file_name . "', CURRENT_TIMESTAMP);";
            $db->insert($query, "addevents.php");
        } else {
            echo 'Select Image first';
        }
    }
    ?>
    <h2>Add Event:</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="mytable">
            <tr>
                <th>Title:</th>
                <th><input name="title" type="text" placeholder="Enter title in here"></th>
            </tr>
            <tr>
                <th>Image:</th>
                <th><input type="file" name="image" /></th>
            </tr>
            <tr>
                <th>Event:</th>
                <th><textarea name="event" rows="10" cols="30">
                    </textarea></th>
            </tr>
            <tr>
                <th></th>
                <th><input name="addevent" type="submit" ></th>
            </tr>
        </table>
    </form>
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
