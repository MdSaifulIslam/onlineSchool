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
            <h2>Message form Head Teacher... </h2>
            <a href=""><img src="img/headTeacher.jpg" alt="post image"/></a>
            <p> Welcome to the Patuakhali Science and Technology University. 
                It is one of the fast growing  public university in Bangladesh. 
                The university was inaugurated on 08 July 2000 by the then
                Honorable Prime Minister, Government of the Peoples Republic 
                of Bangladesh, Her Excellency Sheikh Hasina and started its 
                academic activities on 26 Feb..
            </p>
            <div class="readmore clear">
                <a href="about.php">Read More</a>
            </div>
        </div>
        <?php include 'reletedpost.php'; ?>
       
    </div>
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>