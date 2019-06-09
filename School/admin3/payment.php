
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
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['payment'])) {
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $trid = $_POST['trid'];
    $number = $_POST['number'];
    if ( $amount == '' || $type == '' ||$number == '' || $trid == '') {
        $error = "Eield must not be empty";
    } else {
        $roll=Session::get("student","roll");
        $class=Session::get("student","class");
        $id=Session::get("student","email");
        $query="INSERT INTO `tbl_payment` (`id`,`semail`, `class`, `roll`, `type`, `date`,"
                . " `amount`, `number`, `trid`, `approve`) VALUES"
                . " (NULL, '".$id."','".$class."', '".$roll."', '".$type."', CURRENT_TIMESTAMP, "
                . "'".$amount."', '".$number."', '".$trid."', '0');";
        $db->insert($query,"payment.php");
        
    }
}
?>

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <form style="border: 2px solid darkcyan; margin-top: 20px" method="POST"> 
        <?php
        if(isset($_GET['msg'])){
            echo 'Payment accepted.<br/>You will comfirmed by email';
            $_GET['mag']='';
        }
        ?>
        <table class="mytable">
            <tr>
                <th>Payment type</th>
                <th>
                    <select name="type">        
                        <option value="">Payment type</option>
                        <option value="Fee">Fee</option>
                        <option value="Other">Other</option>
                    </select> 
                </th>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" placeholder="Enter Amount"/></td>
            </tr>
            <tr>
                <td>Number:</td>
                <td><input type="text" name="number" placeholder="Enter Paymrnt Number"/></td>
            </tr>
            <tr>
                <td>Tr/ID:</td>
                <td><input type="text" name="trid" placeholder="Enter TR/ID"/></td>
            </tr>

            <tr>
                <th></th>
                <th>
                    <input name="payment" type="submit" value="Submit"/>
                </th>
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
