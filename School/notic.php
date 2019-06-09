<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'helpers/helper.php'; ?>
<div class="cointainsection template ">
    <div class="maincontain">
        <?php
        $db = new database();
        $query = "SELECT * FROM `tbl_news`";
        $read = $db->select($query);
        if ($read) {
            ?>
            <h2 style="margin-bottom: 30px">Latest News</h2>
            <ul><?php while ($row = $read->fetch_assoc()) { ?>

                    <h3 style="margin-bottom: 15px"><li><a href="news.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li><h3>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                    <h2 style="margin-bottom: 30px">Events...</h2>
                    <?php
                    $db = new database();
                    $query = "SELECT * FROM `tbl_event`";
                    $read = $db->select($query);
                    if ($read) {
                        while ($row = $read->fetch_assoc()) {
                            ?>
                            <div class="popularartical clear">
                                <h3><a href="events.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                                <img src="admin1/image/<?php echo $row['image']; ?>" alt="Skype Picture"/>
                                <p><?php
                                    $str=$row['event'];
                                    $str= substr($str, 0,220);
                                    ?>
                                    <?php echo $str; ?>
                                </p>
                            </div>
                        <?php }
                    } ?>
                    </div>
                    <?php include 'inc/footer.php'; ?>
       