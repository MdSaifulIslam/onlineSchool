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
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `tbl_event` WHERE `tbl_event`.`id` =".$id;
    $db->delete($query,"viewnews.php");
}
?>
<?php include 'nav.php'; ?>
<article class="maincontain clear">
    <div class="contain">
        <?php
        $query = "SELECT * FROM `tbl_event";
        $read = $db->select($query);
        ?>
        <h2>Events</h2>
        <table class="mytable">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Option</th>
            </tr>
            <?php
            if ($read) {
                while ($row = $read->fetch_assoc()) {
                    ?>
                    <tr>
                        <th><?php echo $row['id'];?></th>
                        <th><?php echo $row['title'];?></th>
                        <th><a style="color: yellow" href="?id=<?php echo $row['id'];?>">Delete</a></th>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</article>
<?php include 'footer2.php';?>