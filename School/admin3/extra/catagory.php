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
        <title>AddCategory</title>
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
                        <h2>Add category</h2>
                        <form action="" method="">
                            <table>
                                <tr>
                                    <td>Add category:</td>
                                    <td><input type="text" name="category" value="Enter a category name"/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Add Category"/></td>
                                </tr>
                            </table>
                        </form>
                        <div class="catoption">
                            <h2>All Category</h2>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="40%">Category Name:</th>
                                    <th width="40%">Action: </th>
                                </tr>
                                <tr>
                                    <td>01.</td>
                                    <td>Health</td>
                                    <td><a href="">Edit</a> ||<a href="">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>02.</td>
                                    <td>Ball</td>
                                    <td><a href="">Edit</a> ||<a href="">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>03.</td>
                                    <td>Head</td>
                                    <td><a href="">Edit</a> ||<a href="">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>04.</td>
                                    <td>Hand</td>
                                    <td><a href="">Edit</a> ||<a href="">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>05.</td>
                                    <td>Leg</td>
                                    <td><a href="">Edit</a> ||<a href="">Delete</a></td>
                                </tr>
                            </table>
                        </div>
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
