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
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `tbl_news` WHERE `tbl_news`.`id` =".$id;
    $db->delete($query,"viewnews.php");
}
?>
<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <div class="contain">
        <?php
        $query = "SELECT * FROM `tbl_news";
        $read = $db->select($query);
        ?>
        <h2>News</h2>
        <table class="mytable">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Option</th>
            </tr>
            <?php
            if ($read) {
                while ($row = $read->fetch_assoc()) {
                    ?>
                    <tr>
                        <th><?php echo $row['id'];?></th>
                        <th><?php echo $row['title'];?></th>
                        <th><a href="?id=<?php echo $row['id'];?>">Delete</a></th>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
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
