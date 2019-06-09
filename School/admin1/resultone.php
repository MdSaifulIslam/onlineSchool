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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$db = new database();
$fn = new Functions();
?>
<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <?php
    if (isset($_GET['e']) && isset($_GET['s'])) {
        $id = $_GET['s'];
        $c = $_GET['c'];
        $t = $_GET['t'];
        $email = $_GET['e'];
        

        class Data {

            public static function get() {
                

                $db = new database();
                $query = "SELECT DISTINCT
                                        s.name AS name,
                                        s.roll AS roll,
                                        s.class AS class,
                                          t.bangla AS bangla,
                                        t.english AS english,
                                        t.math AS math,
                                        t.result AS result,
                                        t.pass AS pass
                                       FROM
                                        tbl_student AS s
                                       INNER JOIN
                                        tbl_ternresult AS t ON(s.roll = t.roll)
                                       WHERE
                                        s.email='" . $_GET['e'] . "'";
                $read = $db->select($query);
                if ($read) {
                    $row = $read->fetch_assoc();
                    $html = '<div style="margin: 200px;text-align: center"><h1>' . $_GET['t'] . '-Term Result:</h1>'
                            . '<h2>Name - ' . $row['name'] . '</h2>
        <h2>class - ' . $row['class'] . '</h2>
        <h2>roll - ' . $row['roll'] . '</h2>
        <table style="margin-left: 400px;text-align: center" >
            <tr style="border-bottom: 2px">
                <th>Subject:</th>
                <th>Mark</th>
            </tr>
            <tr>
                <th>Bangla:</th>
                <th>' . $row['bangla'] . '</th>
            </tr>
            <tr>
                <th>English:</th>
                <th>' . $row['english'] . '</th>
            </tr>
            <tr>
                <th>Math:</th>
                <th>' . $row['math'] . '</th>
            </tr>
        </table>';
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
            $mail->addAddress($_GET['e'], 'Joe User');
//Content
            $mail->addStringAttachment($pdf, 'result.pdf');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'File attatchetchment';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            $up = "UPDATE `tbl_ternresult` SET `send` = '1' WHERE `tbl_ternresult`.`id` =" . $id;
            $s = "resultone.php?c=".$c."&t=".$t;
            $db->update($up, $s);
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    ?>

    <?php
    $db = new database();
    $fn = new Functions();
    if (isset($_GET['t']) && isset($_GET['c'])) {
        $t = $_GET['t'];
        $c = $_GET['c'];
    }
    $query = "SELECT DISTINCT term , time, subject FROM `tbl_result` WHERE class=" . $c . " and term='" . $t . "' and time=2018";
    
    $read = $db->select($query);
    $i = 0;
    if ($read) {
        $i = 0;
        echo 'Submittetd result is: <br/>';
        while ($row = $read->fetch_assoc()) {
            echo $row['subject'] . '<br/>';
            $i++;
        }
    }
    if ($i == 3) {
        $termtest = $fn->termResultPrepare($t, $c);
        $term = $t;
        $class = $c;
        if ($termtest) {
            $query = "SELECT DISTINCT
                                        s.email AS email,
                                        t.send AS send,
                                        t.id AS id,
                                        t.roll AS roll,
                                        t.result AS result,
                                        t.pass AS pass
                                       FROM
                                        tbl_student AS s
                                       INNER JOIN
                                        tbl_ternresult AS t ON(s.roll = t.roll)
                                       WHERE
                                        t.term = " . $t . " AND t.class = " . $c . " AND s.class = " . $c . " AND t.send = 0  "
                    . "ORDER BY
result DESC";
            $read = $db->select($query);
            if ($read) {
                $i = 0;
                ?><h2>Result:</h2>
                <table class = "mytable">
                    <tr>
                        <th >Position:</th>
                        <th >Roll:</th>
                        <th >Result:</th>
                        <th >Pass/Fail: </th>
                        <th >Mail</th>
                    </tr><?php
                    $pass = "";
                    while ($row = $read->fetch_assoc()) {
                        ?>
                        <tr>
                            <?php
                            ?>
                            <td><?php echo '' . ($i++); ?></td>
                            <td><?php echo '' . $row['roll']; ?></td>
                            <td><?php echo '' . $row['result']; ?></td>
                            <td><?php echo '' . $row['pass'] ?></td>
                <?php $str = "?s=" . $row['id'] . "&e=" . $row['email'] . "&t=" . $t . "&c=" . $c . "" ?>
                            <td><a href="<?php echo $str; ?>">Send Mail</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        }
    } else {
        echo 'All result are not submitted';
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
