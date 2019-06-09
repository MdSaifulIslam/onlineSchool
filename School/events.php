<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'helpers/helper.php'; ?>
<?php
$db = new database();
$he = new Formate();
?>
<style>
    .slidersection {
        box-shadow: 2px 5px 8px #3E3333;
        margin-bottom: 7px;
        width: 100%;
        position: relative;
        overflow-x: no-content;
        background: #ddd  repeat-x scroll 0 0;
    }
    .slidersection #slider a img{
        width: 100%;
    }
</style>
<div class="cointainsection template ">
    <div class="maincontain">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "select * from tbl_event where id=" . $id;
            $read = $db->select($query);
            if ($read) {
                $row = $read->fetch_assoc();
                ?>
                <div style="z-index: -100;">
                    <h2 style="margin-bottom: 20px"><?php echo $row['title']; ?></h2>
                    <h4 style="margin-bottom: 20px"><?php echo $row['date']; ?></h4>
                    <img style="height: 400px ;width: 600px" src="admin1/image/<?php echo $row['image']; ?>" alt="MyPicture"/>  
                    <p style="background:#0affdc ;font-size: 18px; line-height: 20px; text-align: justify;padding: 10px;">
                        <?php echo $row['event']; ?>
                    </p>
                <?php }
            } else {
                header("location:404.php");
            }
            ?>
           <?php include 'reletedpost.php'; ?>
        </div>
    </div>
    <?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>
       