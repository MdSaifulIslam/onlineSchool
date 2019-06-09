
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
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `tbl_post` where id=" . $id;
        $read = $db->select($query);
        if ($read) {
            $row = $read->fetch_assoc();
            $tid = $row['tid'];
            $tquery = "SELECT * FROM `tbl_teacher` where id=" . $tid;
            $tread = $db->select($tquery);
            if ($tread) {
                $trow = $tread->fetch_assoc();
                $tname = $trow['name'];
                ?>
                }
                <table class="mytable">
                    <tr>
                        <th style="width: 20%">Teacher Name:</th>
                        <th><?php echo $tname ?></th>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <th><?php echo $row["class"] ?></th>
                    </tr>
                    <tr>
                        <th>Date:</th>
                        <th><?php echo $row["date"] ?></th>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <th><?php echo $row["title"] ?></th>
                    </tr>
                    <tr>
                        <th>Post:</th>
                        <th><p style="padding-right: 9px"><?php echo $row["post"] ?></p></th>
                    </tr>
                </table>
                <?php
            }
        }
    }
    ?>
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
