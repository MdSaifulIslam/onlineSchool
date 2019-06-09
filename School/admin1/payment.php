
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
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['payment'])) {
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $trid = $_POST['trid'];
    $number = $_POST['number'];
    if ($amount == '' || $type == '' || $number == '' || $trid == '') {
        $error = "Eield must not be empty";
    } else {
        $roll = Session::get("student", "roll");
        $class = Session::get("student", "class");
        $query = "INSERT INTO `tbl_payment` (`id`, `class`, `roll`, `type`, `date`,"
                . " `amount`, `number`, `trid`, `approve`) VALUES"
                . " (NULL, '" . $class . "', '" . $roll . "', '" . $type . "', CURRENT_TIMESTAMP, "
                . "'" . $amount . "', '" . $number . "', '" . $trid . "', '0');";
        $db->insert($query, "payment.php");
    }
}
?>

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <?php
    if (isset($_GET['msg'])) {
        echo 'Payment accepted.<br/>You will comfirmed by email';
        $_GET['mag'] = '';
    }
    ?>
    <?php
    $query = "SELECT * FROM `tbl_payment` where approve=0";
    $read = $db->select($query);
    ?>
    <table class="mytable">
        <?php 
        if(isset($_GET['re'])){
            echo $_GET['id'];
            $aid= $_GET['id'];
            $aquery="UPDATE `tbl_payment` SET `approve` = '1' WHERE `tbl_payment`.`id` = ".$aid.";";
            $db->update($aquery,"payment.php");
            
        }
        ?>
        <tr>
            <th>Class</th>
            <th>Roll</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Number</th>
            <th>Tr/ID</th>
            <th>Date</th>
            <th>Approve</th>
        </tr>
        <?php
        if ($read) {
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr>
                    <th><?php echo $row['class']; ?></th>
                    <th><?php echo $row['roll']; ?></th>
                    <th><?php echo $row['amount']; ?></th>
                    <th><?php echo $row['type']; ?></th>
                    <th><?php echo $row['number']; ?></th>
                    <th><?php echo $row['trid']; ?></th>
                    <th><?php echo substr($row['date'],0,10); ?></th>
                    <?php
                    $str;
                    $next="payment.php";
                    $subject="Payment Confirmation final";
                    $mail=$row['semail'];
                    $id=$row['id'];
                    $body="Payment ".$row['amount']." taka for ".$row['type']." is Confirmed";
                    $str="sendmail_1.php?id=".$id."&next=".$next."&body=".$body."&mail=".$mail."&subject=".$subject."";
                    ?>
                    <th><a href="<?php echo $str ?>">Confirm</a></th>
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
