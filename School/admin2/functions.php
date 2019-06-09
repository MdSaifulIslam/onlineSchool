<?php 
if(isset($_GET['msg'])){
    echo ''.$_GET['msg'];
}
?>
<?php

Class Functions {

    public function termResultPrepare($term, $class) {
        $db = new database();
        $studentRoll = "SELECT DISTINCT roll FROM `tbl_result`"
                . " WHERE class=" . $class . " and term=" . $term . "";
        $studentRoll = $db->select($studentRoll);
        $submit="INSERT INTO `tbl_ternresult` (`id`, `roll`, `class`, `term`, `year`, `result`, `position`, `pass`) VALUES ";
        if ($studentRoll) {
            while ($roll = $studentRoll->fetch_assoc()) {
                $bangla = "SELECT  bangla FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='bangla'";
                $bangla = $db->select($bangla);
                $banglaresult = $bangla->fetch_assoc();
                $bangla = "SELECT  english FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='english'";
                $bangla = $db->select($bangla);
                $englishresult = $bangla->fetch_assoc();
                $bangla = "SELECT  math FROM `tbl_result`
                 WHERE class=" . $class . " and term=" . $term . "
                       and roll=" . $roll['roll'] . " and subject='math'";
                $bangla = $db->select($bangla);
                $mathresult = $bangla->fetch_assoc();
                $total = $banglaresult['bangla'] + $englishresult['english'] +
                        $mathresult['math'];
                $submit=$submit."(NULL, '".$roll['roll']."', '".$class."', '".$term."', '2018', '".$total."','2', '1'),";
                
            }
            $submit=substr($submit,0, (strlen($submit)-1));
            echo ''.$submit;
            $db->insert($submit);
            
        }
    }

}
?>
