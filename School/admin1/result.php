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
<?php include 'nav.php' ?>
<article class="maincontain clear">
    <div class="contain">
        <?php
        $query = "SELECT DISTINCT class, term FROM `tbl_ternresult` where year=2018";
        $read = $db->select($query, "resultlist.php");
        $ac = array();
        $at = array();
        if ($read) {
            ?>
            <h2>Published Result:</h2>
            <table class = "mytable">
                <?php
                while ($row = $read->fetch_assoc()) {
                    array_push($ac, $row['class']);
                    array_push($at, $row['term']);
                    ?>
                    <tr>
                        <th >Class - <?php echo $row['class'] ?> </th>
                        <th >Term - <?php echo $row['term'] ?></th>
                        <th ><a href="resultone.php?c=<?php echo $row['class'] ?>&t=<?php echo $row['term'] ?>">View Result</a></th>
                    </tr>
                    <?php
                }
                ?>
            </table><?php
        }
        for ($c = 1; $c <= 3; $c++) {
            for ($t = 1; $t <= 3; $t++) {
                if (in_array($t, $at) && in_array($c, $ac)) {
                    continue;
                }
                ?>
                <a href="resultone.php?t=<?php echo $t; ?>&c=<?php echo $c; ?>"><h3>Check class- <?php echo $c; ?> , <?php echo $t; ?>- term result</h3></a>
                <?php
            }
        }
        ?>

        <?php
        ?>

    </div>
</article>
<?php include 'footer2.php'; ?>