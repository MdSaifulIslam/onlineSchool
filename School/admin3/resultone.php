
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
    <div class="contain">

    <?php
    $db = new database();
    $fn = new Functions();
    $t = $_GET['t'];
    $c = Session::get("student", "class");
    $r = Session::get("student", "roll");
    

    $query = "SELECT  * FROM `tbl_ternresult` WHERE class=" . $c . " and term=" . $t . " and roll=" . $r;

    $read = $db->select($query);
    $i = 0;
    if ($read) {
        ?>
        <h2>Result:</h2>
        <h3>Class-<?php echo $c;?> Term-<?php echo $t;?> Roll-<?php echo $r;?></h3>
        <table class = "mytable">
            <tr>
                <th >Bangla:</th>
                <th >English:</th>
                <th >Math:</th>
                <th >Total:</th>
                <th >Pass/Fail: </th>
            </tr><?php
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr> 
                    <td><?php echo '' . $row['bangla']; ?></td>
                    <td><?php echo '' . $row['english']; ?></td>
                    <td><?php echo '' . $row['math']; ?></td>
                    <td><?php echo '' . $row['result']; ?></td>
                    <td><?php echo '' . $row['pass']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo '<h1>Not Published</h1>';
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
