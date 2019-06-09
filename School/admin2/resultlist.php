
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
    $query = "SELECT DISTINCT class, term FROM `tbl_ternresult` where year=2018";
    $read = $db->select($query, "resultlist.php");
    ?>
    <?php
    if ($read) {
        ?><h2>Published Result:</h2>
        <table class = "mytable">
            <?php
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr>
                    <th >Class - <?php echo $row['class'] ?> </th>
                    <th >Term - <?php echo $row['term'] ?></th>
                    <th ><a href="viewresult.php?c=<?php echo $row['class'] ?>&t=<?php echo $row['term'] ?>">View Result</a></th>
                </tr>
                <?php
            }
        }
        ?>
</article>
</section>

<footer class = "footersection clear">
    <h3>
    </h3>
</footer>
</div>

<script src = "js/vendor/modernizr-3.6.0.min.js"></script>
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
