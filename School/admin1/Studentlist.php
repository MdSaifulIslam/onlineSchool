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
if (isset($_GET['deleteid'])) {
    $id = isset($_GET['deleteid']);
    $query = "DELETE FROM `tbl_student` WHERE `id` = " . $id;
    $db->delete($query, "Studentlist.php?c=1");
}
?>
<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <div class="contain">
        <h2>Student List</h2>
        <table class="mytable">
            <tr>
                <th><a href="?c=1">Class One Student List</a></th>
            </tr>
            <tr>
                <th><a href="?c=2">Class Two Student List</a></th>
            </tr>
            <tr>
                <th><a href="?c=3">Class Three Student List</a></th>
            </tr>
        </table>
        <br>
        <br>
        <br>

        <?php
        if (isset($_GET['c'])) {
            $class = $_GET['c'];
            ?>
            <h2>Class <?php echo $class; ?> Student List</h2>
            <table class="mytable">
                <tr>
                    <th style="width: 10%">Roll:</th>
                    <th style="width: 70%">Name:</th>
                    <th style="width: 20%">Option:</th>
                </tr>
                <?php
                $query = "SELECT * FROM `tbl_student` where class=" . $class;
                $read = $db->select($query);
                if ($read) {
                    while ($row = $read->fetch_assoc()) {
                        ?>
                        <tr> 
                            <th style="width: 10%"><?php echo $row['roll']; ?></th>
                            <th style="width: 70%"><?php echo $row['name']; ?></th>
                            <th style="width: 20%"><a href="?deleteid=<?php echo $row['id']; ?>">Delete</a></th>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        }
        ?>
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
