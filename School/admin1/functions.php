
<?php

if (isset($_GET['msg'])) {
    echo '' . $_GET['msg'];
}
?>
<?php

Class Functions {

    public function termResultPrepare($term, $class) {
        $db = new database();
        $query = "SELECT class , term , year from tbl_ternresult WHERE class=" . $class . " and term=" . $term . "";
        $read = $db->select($query);
        if (!$read) {
            $studentRoll = "SELECT DISTINCT roll FROM `tbl_result`"
                    . " WHERE class=" . $class . " and term=" . $term . "";
            $studentRoll = $db->select($studentRoll);
            $submit = "INSERT INTO `tbl_ternresult` (`id`, `roll`,"
                    . " `class`, `term`,"
                    . " `year`, `bangla`, `english`, `math`, `result`, `position`, `pass`) VALUES ";
            if ($studentRoll) {
                while ($roll = $studentRoll->fetch_assoc()) {
                    $bangla = "SELECT  bangla FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='bangla'";
                    $bangla = $db->select($bangla);
                    if ($bangla) {
                        $banglaresult = $bangla->fetch_assoc();
                    }
                    $bangla = "SELECT  english FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='english'";
                    $bangla = $db->select($bangla);
                    if ($bangla) {
                        $englishresult = $bangla->fetch_assoc();
                    }
                    $bangla = "SELECT  math FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='math'";
                    $bangla = $db->select($bangla);
                    if ($bangla) {
                        $mathresult = $bangla->fetch_assoc();
                    }
                    $pass = "F in";
                    if ($banglaresult['bangla'] < 33) {
                        $pass = $pass . " Bangla ";
                    }
                    if ($englishresult['english'] < 33) {
                        $pass = $pass . " English ";
                    } if ($mathresult['math'] < 33) {
                        $pass = $pass . " Math ";
                    } if ($pass == "F in") {
                        $pass = "Passed";
                    }

                    $total = $banglaresult['bangla'] + $englishresult['english'] +
                            $mathresult['math'];
                    $submit = $submit . "(NULL, '" . $roll['roll'] . "', '" . $class . "',"
                            . " '" . $term .
                            "', '2018','" . $banglaresult['bangla'] . "'," . $englishresult['english'] . "," . $mathresult['math'] . ", '" . $total . "','2', '" . $pass . "'),";
                }
                $submit = substr($submit, 0, (strlen($submit) - 1));
                echo '' . $submit;
                $db->insert($submit, "result.php");
                return true;
            }
        } else {
            return true;
        }
    }

}

?>
