
<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
?>
<?php
if (isset($_GET['action'])) {
    Session::S_distroy();
}
?>
<?php
Session::checkSession("student");
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
    <h3>Teachers Post</h3>
    <table class="mytable">
        <tr>
            <th style="width: 10%">No.</th>
            <th>Title</th>
            <th style="width: 15%">View</th>
        </tr>
        <?php
        $class = Session::get("student", "class");
        $query = "SELECT * FROM `tbl_post` where class=" . $class . " ORDER BY `date` DESC";
        $read = $db->select($query);
        $i = 1;
        if ($read) {
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr>
                    <th><?php echo $i++ ?></th>
                    <th><?php echo $row['title'] ?></th>
                    <th><a href="tpost.php?id=<?php echo $row['id'] ?>">View</a></th>
                </tr>
                <?php
            }
        }
        ?>
    </table>
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
