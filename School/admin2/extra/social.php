<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/lib/Session.php';
Session::init();
?>
<?php
Session::checkSession();
?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>
<?php include 'functions.php'; ?>
<?php

$db = new database();
$fn=new Functions();
?>

<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>

        <div class="template">
            <header class="headeroption clear">
                <h2>Admin area</h2>
                <nav class="mainmenu clear">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="user.php">User</a></li>
                        <li><a href="updatepass.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <section class="containsection clear">
                <aside class="leftsidebar clear">
                    <div class="samesidebar">
                        <h2>Theme Option</h2>
                        <ul>
                            <li><a href="social.php">Social option</a></li>
                            <li><a href="header.php">Header Option</a></li>
                            <li><a href="footer.php">Footer OPtion</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Article Option</h2>
                        <ul>
                            <li><a href="bgchange.php">Change site background</a></li>
                            <li><a href="fontchnage.php">Change font</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Catagory Option</h2>
                        <ul>
                            <li><a href="catagory.php">Add Catagory</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Tag Option</h2>
                        <ul>
                            <li><a href="tag.php">Add Tag</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Comments Option</h2>
                        <ul>
                            <li><a href="comments.php">Add Comments</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Article Option</h2>
                        <ul>
                            <li><a href="addarticle.php">Add Article</a></li>
                            <li><a href="articlelist.php">Article List</a></li>
                        </ul>
                    </div>
                </aside>
                <article class="maincontain clear">
                    <div class="contain">
                        <h2>Social media Update</h2>
                        <form action="" method="">
                            <table>
                                <tr>
                                    <td>Facebook:</td>
                                    <td><input type="text" name="facebook" value="facebook.com"/></td>
                                </tr>
                                <tr>
                                    <td>LinkedIn</td>
                                    <td><input type="text" name="linkedin" value="linkedin.com"/></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td><input type="text" name="twitter" value="twitter.com"/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Update Social"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </article>
            </section>

            <footer class ="footersection clear">
                <h3>&copy;  Mohammad Saiful Islam Khan</h3>
            </footer>
        </div>

        <script src="js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            window.ga = function () {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>

</html>
