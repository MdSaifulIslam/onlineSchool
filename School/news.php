<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<?php include 'helpers/helper.php'; ?>

<?php
$db = new database();
$he = new Formate();
?>


<div class="cointainsection template clear">
    <div class="maincontain">
        <div class="samepost clear">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "select * from tbl_news where id=" . $id;
                $read = $db->select($query);
                if ($read) {
                    $row = $read->fetch_assoc();
                    ?>
            <h2><?php echo $row['title'];?></h2>
            <h4><?php echo $row['time'].'<br/>';?></h4>
            <br>
                    <h3><p> 
                     <?php echo $row['news'];?>
                    </p></h3>
                    <br>
                    <br>
                    <?php
                }
            }
            ?>
        </div>
        <?php include 'reletedpost.php'; ?>
    </div>
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>
