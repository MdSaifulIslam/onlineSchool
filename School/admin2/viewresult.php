<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
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
    $c=1;
    $t=1;
    $c=$_GET['c'];
    $t=$_GET['t'];
    $db = new database();
    $fn = new Functions();
    $query = "SELECT DISTINCT
                                        s.email AS email,
                                        t.roll AS roll,
                                        t.result AS result,
                                        t.pass AS pass
                                       FROM
                                        tbl_student AS s
                                       INNER JOIN
                                        tbl_ternresult AS t ON(s.roll = t.roll)
                                       WHERE
                                        t.term = ".$t." AND t.class = ".$c." AND s.class = ".$c."
                                       ORDER BY
                                         result DESC";
    $read = $db->select($query);
    if ($read) {
        $i = 1;
        ?>
        <h2>Class :<?php echo ' '.$c.'   ' ?>Term  : <?php echo $c.' result' ?></h2>
        <table class = "mytable">
            <tr>
                <th >Position:</th>
                <th >Roll:</th>
                <th >Result:</th>
                <th >Pass/Fail: </th>
            </tr><?php
            $pass = "";
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr>
                    <?php
                    if ($row['pass'] == 1) {
                        $pass = "Pass";
                    } else {
                        $pass = "Fail";
                    }
                    ?>
                    <td><?php echo '' . ($i++); ?></td>
                    <td><?php echo '' . $row['roll']; ?></td>
                    <td><?php echo '' . $row['result']; ?></td>
                    <td><?php echo '' . $pass ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</article>
</section>

<footer class = "footersection clear">
    <h3>&copy;
        Mohammad Saiful Islam Khan</h3>
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
