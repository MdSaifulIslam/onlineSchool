<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'helpers/helper.php'; ?>

<?php
$db = new database();
$he = new Formate();
?>


<div class="cointainsection template clear">
    <div class="maincontain">
        <?php
        $db = new database();
        $query = "SELECT * FROM `tbl_teacher";
        $read = $db->select($query);
        if ($read) {
            while ($row = $read->fetch_assoc()) {
                ?> <div style="margin-bottom: 30px">
                    <img style="height: 200px ;width: 200px; margin: 20px" src="admin1/image/<?php echo $row['image']; ?>" alt="MyPicture"/>
                    <div style="">
                        <h2><?php echo $row['name']; ?></h2>
                        <br>
                        <h3><?php echo $row['Address']; ?></h3>
                        <h3><?php echo $row['contact']; ?></h3>
                        <h3><?php echo $row['email']; ?></h3>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <?php include 'reletedpost.php'; ?>

    </div>
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>