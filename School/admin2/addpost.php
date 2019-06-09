
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
        echo '<strong>Post Added</strong>';
    }
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addpost'])) {
        $class = $_POST['class'];
        $title = $_POST['title'];
        $post = $_POST['post'];

        $id = Session::get("teacher", "id");
        $query = "INSERT INTO `tbl_post` (`id`, `tid`, `class`, `title`, `post`, `date`) 
            VALUES (NULL, '".$id."', '".$class."', '".$title."', '".$post."', CURRENT_TIMESTAMP);";
        $db->insert($query, "addpost.php");    }
    ?>
    <form  method="POST" >
        <h3>Add Post</h3>
        <table class="mytable">
            <tr>
                <th>Select class:</th>
                <th>
                    <select name="class">        
                        <option value="">Select class</option>
                        <option value="1">class 1</option>
                        <option value="2">class 2</option>
                        <option value="3">class 3</option>
                        <option value="4">class 4</option>
                        <option value="5">class 5</option>
                    </select> 
                </th>
            </tr>
            <tr>
                <th>Enter Title:</th>
                <th><input type="text" name="title" placeholder="Enter title in here"></th>
            </tr>
            <tr>
                <th>Enter Post:</th>
                <th><textarea name="post" rows="10" cols="30">
                    </textarea></th>
            </tr>
            <tr>
                <th></th>
                <th><input type="submit" name="addpost" value="Add Post"/></th>
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
