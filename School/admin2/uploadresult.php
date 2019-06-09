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


<?php
$tid = "";
$class = "";
$term = "";
$subject = "";
$time = "";
$str="";
?>

<?php
if (isset($_POST['resultsubmit'])) {
    $a = ($_POST['i']);
    $i = (int) $a;
    $tid = $_POST['Finaltid'];
    $class = $_POST['Finalclass'];
    $term = $_POST['Finalterm'];
    $time = $_POST['Finaltime'];
    $subject = $_POST['Finalsubject'];
    $query = "INSERT INTO `tbl_result` (`id`, `roll`, `tid`, "
            . "`class`, `term`, `time`, `subject`, `" . $subject . "`) VALUES ";
    for ($a = 0; $a < ($i - 2); $a = ($a + 2)) {
        $roll = (int) $_POST[$a];
        $mark = (int) $_POST[$a + 1];
        $str=$str. "roll  " . $roll . '  ' . $mark;
        $query = $query . "(NULL," . $roll . "," . $tid . "," . $class . "," .
                $term . "," . $time . ",'" . $subject . "'," . $mark . "),";
        echo "roll  " . $roll . '  ' . $mark;
        echo '<br/>';
    }
    $roll = (int) $_POST[$a];
    $mark = (int) $_POST[$a + 1];
    $str=$str. "roll  " . $roll . '  ' . $mark;
    $query = $query . "(NULL," . $roll . "," . $tid . "," . $class . "," . $term . "," . $time . ",'" . $subject . "'," . $mark . ")";
    $db = new database();
    $create = $db->insert($query, "uploadresult.php");
}
?>




<?php include 'nav.php';?>
                <article class="maincontain clear">

                    <?php
                    
                    if (isset($_GET['msg'])) {
                        echo "<span style='color:green;'>" . $_GET['msg'] . "</span>";
                    }
                    ?>

                    <?php
                    if (isset($_POST['fileinput'])) {
                        $tid = Session::get("teacher","id");
                        $class = $_POST['class'];
                        $term = $_POST['term'];
                        $time = 2018;
                        $subject = $_POST['subject'];

                        if (isset($_FILES['image'])) {
                            $errors = array();
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            $file_type = $_FILES['image']['type'];
                            // $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));


                            $expensions = array("txt", "csv");


                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                ?>
                                <?php
                                include "PHPExcel/Classes/PHPExcel/IOFactory.php";
//  Include PHPExcel_IOFactory

                                $inputFileName = "uploads/" . $file_name;

//  Read your Excel workbook
                                try {
                                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                                    $objPHPExcel = $objReader->load($inputFileName);
                                } catch (Exception $e) {
                                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                                }

//  Get worksheet dimensions
                                $sheet = $objPHPExcel->getSheet(0);
                                $highestRow = $sheet->getHighestRow();
                                $highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
                                ?> <form action="" method="post">
                                    <table class="mytable">
                                        <tr>
                                            <td>id</td>
                                            <td>mark</td>

                                        </tr><?php
                                        $i = 0;
                                        echo $term . " " . $subject;
                                        for ($row = 1; $row <= $highestRow; $row++) {
                                            $cell = $sheet->getCellByColumnAndRow(0, $row);
                                            $val1 = $cell->getValue();
                                            $cell = $sheet->getCellByColumnAndRow(1, $row);
                                            $val2 = $cell->getValue();
                                            ?><tr>
                                                <td><input type = "number" name = <?php echo '' . ($i++);
                                            ?> value="<?php echo $val1; ?>"></td>
                                                <td><input type="number" name=<?php echo '' . ($i++);
                                            ?> value="<?php echo $val2; ?>"></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <th>class</th>
                                            <th><input type="number" name="Finalclass" value="<?php echo (int) $class; ?>"></th>
                                        </tr>
                                        <tr>
                                            <th>Teacher Id</th>
                                            <th><input type="number" name="Finaltid" value="<?php echo $tid; ?>"></th>
                                        </tr>
                                        <tr>
                                            <th>Term</th>
                                            <th><input type="number" name="Finalterm" value="<?php echo (int) $term; ?>"></th>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <th><input type="text" name="Finalsubject" value="<?php echo $subject; ?>"></th>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <th><input type="number" name="Finaltime" value="<?php echo (int) $time; ?>"></th>
                                        </tr>
                                        <tr>
                                            <td><input type="number" name="i" value="<?php echo ($i++); ?>"></td>
                                            <td><input type="submit" name="resultsubmit" value="Submit"/></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                            }
                        }
                    }
                    ?>


                    <form  method="POST" enctype="multipart/form-data">
                        <p>
                            Select class?
                            <select name="class">        
                                <option value="">Select class</option>
                                <option value="1">class 1</option>
                                <option value="2">class 2</option>
                                <option value="3">class 3</option>
                                <option value="4">class 4</option>
                                <option value="5">class 5</option>
                            </select>  
                        </p>
                        <p>
                            Select Term?
                            <select name="term">        
                                <option value="">Select term</option>
                                <option value="1">term 1</option>
                                <option value="2">term 2</option>
                                <option value="3">term 3</option>
                            </select>  
                        </p>

                        <p>
                            Select Subject?
                            <select name="subject">        
                                <option value="">Select Subject</option>
                                <option value="bangla">Bangla</option>
                                <option value="english">English</option>
                                <option value="math">math</option>
                            </select>  
                        </p>


                        <p>
                            <strong><h2>Please Enter only csv ,  xls  and xlxs file including only id and marks; </h2></strong>
                        </p>

                        <input type="file" name="image" />
                        <input name="fileinput" type="submit" value="Submit"/>
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
