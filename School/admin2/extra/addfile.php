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
                <h2>Teacher area</h2>
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
                        <h2>Profile</h2>
                        <ul>
                            <li><a href="user.php">Your Profile</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Result</h2>
                        <ul>
                            <li><a href="uploadresult.php">Upload Result</a></li>
                            <li><a href="viewresult.php">Vier Result</a></li>
                            <li><a href="sendmail.php">Send Mail</a></li>
                        </ul>
                    </div>
                    <div class="samesidebar">
                        <h2>Files Option</h2>
                        <ul>
                            <li><a href="addfile.php">Add Files</a></li>
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
                    <h1>Welcome <?php
$loginMessage = Session::get("name");
if (isset($loginMessage)) {
    echo '' . $loginMessage;
}
?></h1>
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
