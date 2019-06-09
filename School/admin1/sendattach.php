
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <?php
    if (isset($_GET['email'])) {
        
        

        class Data {

            public static function get() {
                $t=$_GET['t'];
                $db = new database();
                $query = "select * from tbl_student where email='" . $_GET['email'] . "'";
                $read = $db->select($query);
                if ($read) {
                    $row = $read->fetch_assoc();
                    $html = '<div style="margin: 200px;text-align: center">
            <h1 style="font-size: 60px">Kinder garden School</h1>
            <h1>'.$t.'</h1>
            <h2>Name - '.$row['name'].'</h2>
            <h2>class - '.$row['class'].'</h2>
            <h2>roll - '.$row['roll'].'</h2>
        </div>';
                }
                return $html;
            }

        }
        ?>
        <?php
        require_once('tcpdf.php');
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);
        $obj_pdf->SetAutoPageBreak(TRUE, 10);
        $obj_pdf->SetFont('helvetica', '', 11);
        $obj_pdf->AddPage();
        $content = Data::get();
        $obj_pdf->writeHTML($content);
        $pdf = $obj_pdf->Output('file.pdf', 'S');



        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
//Server settings                                // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "mdsaifulislamkhan21@gmail.com";                 // SMTP username
            $mail->Password = "01773241151";                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
//Recipients
            $mail->setFrom('mdsaifulislamkhan21@gmail.com', 'Saiful');
            $mail->addAddress($_GET['email'], 'Joe User');
//Content
            $mail->addStringAttachment($pdf, 'admit.pdf');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'File attatchetchment';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            $up="UPDATE `tbl_payment` SET `attach` = '1' WHERE `tbl_payment`.`semail` = '".$_GET['email']."';";
            $db->update($up,"sendattach.php");
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['payment'])) {
        $amount = $_POST['amount'];
        $ptype = $_POST['ptype'];
        $ctype = $_POST['ctype'];
        if ($amount == '' || $ptype == '' || $ctype == '') {
            $error = "Eield must not be empty";
        } else {
            echo '<h2>Class-' . $ctype . '</h2>';
            $query = "SELECT * FROM `tbl_payment` where  class=" . $ctype . " and approve=1 having sum(amount) >=" . $amount . ";";
            $read = $db->select($query);
            if ($read) {
                ?>
                <table class="mytable">
                    <tr>
                        <th>Roll</th>
                        <th>Send</th>
                    </tr>
                    <?php
                    while ($row = $read->fetch_assoc()) {
                        ?>
                        <tr>
                            <th><?php echo $row['roll'] ?></th>
                            <th><a href="?email=<?php echo $row['semail']; ?>&t=<?php echo $ptype ?>">Send Admit</a></th>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        }
    }
    ?>
    <form style="border: 2px solid darkcyan; margin-top: 20px" method="POST"> 
        <?php
        if (isset($_GET['msg'])) {
            echo 'Payment accepted.<br/>You will comfirmed by email';
            $_GET['mag'] = '';
        }
        ?>
        <table class="mytable">
            <tr>
                <th>Payment type</th>
                <th>
                    <select name="ptype">        
                        <option value="">Select Admit</option>
                        <option value="First term exam Admit">First term exam Admit</option>
                        <option value="Second term exam Admit">Second term exam Admit</option>
                        <option value="Third term exam Admit">Third term exam Admit</option>
                    </select> 
                </th>
            </tr>
            <tr>
                <th>Classe</th>
                <th>
                    <select name="ctype">        
                        <option value="">Class</option>
                        <option value="1">class-1</option>>
                        <option value="2">class-2</option>>
                        <option value="3">class-3</option>>
                    </select> 
                </th>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" placeholder="Enter Amount"/></td>
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
