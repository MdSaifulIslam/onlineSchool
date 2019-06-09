<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'helpers/helper.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['firstnane'] . ' ' . $_POST['lastname'];
    $email = $_POST['email'];
    $query = $_POST['query'];

    $query = "INSERT INTO `contact` (`id`, `name`, `email`, `query`) VALUES (NULL, '" . $name . "', '" . $email . "', '" . $query . "');";
    $db=new database();
    $db->insert($query, "contact.php");
}
?>
<div class="cointainsection template clear">
    <div class="maincontain">
        <div>
            <h2 style="margin-bottom: 20px">Contact us</h2>
            <?php
            if(isset($_GET['msg'])){
                echo '<strong>'.'Your Question is accepted. You will be notified..'.'</strong>';
            }
            ?>
            <form method="post">
                <table>
                    <tr>
                        <td>Your First Name is:</td>
                        <td>
                            <input type="text" name="firstname" placeholder="Enter first name" required=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Last Name:</td>
                        <td>
                            <input type="text" name="lastname" placeholder="Enter Last name"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Your Email Address:</td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Email Address"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Query:</td>
                        <td>
                            <textarea name="query" rows="10" cols="30"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Submit"/>
                        </td>
                    </tr>
                </table> 
            </form>
        </div>
        <?php include 'reletedpost.php'; ?>
    </div>
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>