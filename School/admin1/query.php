
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
    if (isset($_GET['email']) && isset($_GET['message'])) {
        $meassage = $_GET['message'];
        $id4 = $_GET['id3'];
        class Data {

            public static function get() {
                $meassage = $_GET['message'];
                $html = '<div style="margin: 200px;text-align: center">
            <h1 style="font-size: 60px">Kinder garden School</h1>
            <h3>Answer from Office:</h3>
            <h4>'.$meassage.'</h4>
        </div>';

                return $html;
            }

        }
        ?>
        <?php
        if (isset($_GET['msg'])) {
            echo 'Reply Send.<br/>You will comfirmed by email';
            $_GET['mag'] = '';
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
            $mail->addStringAttachment($pdf, 'Office Reply.pdf');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'File attatchetchment';
            $mail->Body = $meassage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            $up = "UPDATE `contact` SET `reply` = '1' WHERE `contact`.`id` = '" . $id4. "';";
            $db->update($up, "query.php");
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['payment'])) {
        $sendmail = $_POST['m'];
        $qu = $_POST['q'];
        $id3 = $_POST['id2'];
        header("Location:?email=" . $sendmail . "&message=" . $qu."&id3=".$id3);
    }

    if (isset($_GET['mail'])) {
        $m = $_GET['mail'];
        $id = $_GET['id'];
        ?>
        <form style="border: 2px solid darkcyan; margin-top: 20px" method="POST"> 

            <table class="mytable">
                <tr>
                    <th>Email:</th>
                    <th><input name="m" value="<?php echo $m; ?>"></th>

                </tr>
                <th>Reply:</th>
                <th><textarea name="q"></textarea> 
                </th>

                <tr>
                    <th><input name="id2" value="<?php echo $id; ?>"></th>
                    <th>
                        <input name="payment" type="submit" value="Reply"/>
                    </th>
                </tr>
            </table>
        </form>
        <?php
    }
    $query = "SELECT * FROM `contact` where reply=0";
    $read = $db->select($query);
    if ($read) {
        ?>
        <table class="mytable">
            <tr>
                <th>Name</th>
                <th>Query</th>
                <th>Reply</th>
            </tr>
            <?php
            while ($row = $read->fetch_assoc()) {
                ?>
                <tr>
                    <th><?php echo $row['name'] ?></th>
                    <th><?php echo $row['query'] ?></th>
                    <th><a href="?mail=<?php echo $row['email']; ?>&id=<?php echo $row['id'];?>">Send reply</a></th>
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
