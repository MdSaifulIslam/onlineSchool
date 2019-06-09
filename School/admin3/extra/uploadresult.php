<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/Session.php';
Session::init();
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
if (isset($_GET['msg'])) {
    echo "<span style='color:green;'>" . $_GET['msg'] . "</span>";
}
?>
<?php
$tid = "";
$class = "";
$term = "";
$subject = "";
$time = "";
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
    echo $class . '' . $subject . " " . $i;
    $query = "INSERT INTO `tbl_result` (`id`, `roll`, `tid`, "
            . "`class`, `term`, `time`, `subject`, `" . $subject . "`) VALUES ";
    for ($a = 0; $a < ($i - 2); $a = ($a + 2)) {
        $roll = (int) $_POST[$a];
        $mark = (int) $_POST[$a + 1];
        $query = $query . "(NULL," . $roll . "," . $tid . "," . $class . "," .
                $term . "," . $time . ",'" . $subject . "'," . $mark . "),";
        echo "roll  " . $roll . '  ' . $mark;
        echo '<br/>';
    }
    $id = (int) $_POST[$a];
    $mark = (int) $_POST[$a + 1];
    echo "roll  " . $roll . '  ' . $mark;
    $query = $query . "(NULL," . $roll . "," . $tid . "," . $class . "," . $term . "," . $time . ",'" . $subject . "'," . $mark . ")";
    $db = new database();
    $create = $db->insert($query, "uploadresult.php");
}
?>




<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>

        <div class="template">
            <header class="headeroption clear">
                <h2>Admin area</h2>
                <nav class="mainmenu clear">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="user.php">User</a></li>
                        <li><a href="updatepass.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <section class="containsection clear">
                <aside class="leftsidebar clear">
                    <div class="samesidebar">
                        <h2>Profile</h2>
                        <ul>
                            <li><a href="user.php">Your Profile</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Result</h2>
                        <ul>
                            <li><a href="social.php">Upload Result</a></li>
                            <li><a href="header.php">Vier Result</a></li>
                            <li><a href="sendmail.php">Send Mail</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Article Option</h2>
                        <ul>
                            <li><a href="bgchange.php">Change site background</a></li>
                            <li><a href="fontchnage.php">Change font</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Catagory Option</h2>
                        <ul>
                            <li><a href="catagory.php">Add Catagory</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Tag Option</h2>
                        <ul>
                            <li><a href="tag.php">Add Tag</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Comments Option</h2>
                        <ul>
                            <li><a href="comments.php">Add Comments</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Article Option</h2>
                        <ul>
                            <li><a href="addarticle.php">Add Article</a></li>
                            <li><a href="articlelist.php">Article List</a></li>
                        </ul>
                    </div>
                </aside>
                <article class="maincontain clear">

                    <?php
                    if (isset($_POST['fileinput'])) {
                        $tid = $_POST['tid'];
                        $class = $_POST['class'];
                        $term = $_POST['term'];
                        $time = 2018;
                        $subject = $_POST['subject'];
                        echo '' . $tid . " " . $class;

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
                                    <table>
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
                                            <td><input type="number" name="i" value="<?php echo $i; ?>"></td>
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
                            Select Id?
                            <select name="tid">        
                                <option value="">Select id</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
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
