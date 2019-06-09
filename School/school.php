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
        <div class="samepost clear">
            <h2>About the school</h2>
            <a href=""><img src="img/headTeacher.jpg" alt="post image"/></a>
            <p> main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
                main contain main contain  main contain main contain main contain
            </p>
            <div class="readmore clear">
                <a href="about.php">Read More</a>
            </div>
        </div>
        <?php include 'reletedpost.php'; ?>
    </div>
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>