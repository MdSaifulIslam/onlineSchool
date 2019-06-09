
<div class="sidebar template clear">
    <div class="sidebarheadr clear">
        <?php
        $db = new database();
        $query = "SELECT * FROM `tbl_news`";
        $read = $db->select($query);
        if ($read) {
            ?>
            <h2>Latest News</h2>
            <ul><?php while ($row = $read->fetch_assoc()) { ?>

                    <li><a href="news.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="sidebarheadr clear">
        <h2>Events...</h2>
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
                    <p>
                        <?php
                        $str = $row['event'];
                        $str = substr($str, 0, 50);
                        ?>
                        <?php echo $str; ?>
                    </p>
                </div>
            <?php }
        } ?>
    </div>
</div>