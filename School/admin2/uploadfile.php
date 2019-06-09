
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

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <?php
    if(isset($_GET['msg'])){
        echo ''.$_GET['msg'];
    }
    
    ?>
    <?php
    if (isset($_POST['fileinput'])) {
        if (isset($_FILES['image'])&& isset($_POST['class'])) {
            
            $class=$_POST['class'];
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];


            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "file/" . $file_name);
            }
            $tid=Session::get("teacher","id");
            $sql = "INSERT INTO `tbl_file` (`id`, `tid`, `class`, `filename`) VALUES (NULL, '".$tid."', '".$class."', '".$file_name."');";
            $db->insert($sql, "uploadfile.php");
            if (move_uploaded_file($file_tmp, "file/" . $file_name)) {
                echo 'uploaded';
            } else {
                echo 'not Uploaded';
            }
        }
    }
    ?>
    <form  method="POST" enctype="multipart/form-data">
        <p>
            Select class?
            <select name="class">        
                <option value="">Select class</option>
                <option value="1">class 1</option>
                <option value="2">class 2</option>
                <option value="3">class 3</option>
                <option value="4">class 4</option>
                <option value="5">class 5</option>
            </select>  
        </p>

        <input type="file" name="image" />
        <input name="fileinput" type="submit" value="Submit"/>
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
