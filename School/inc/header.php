
<html>
    <head>
        <title>School</title>
        <link rel="icon" href="3.png"/>
        <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="style.css">
        <script language="javascript" type="text/javascript">
            function clearText(field)
            {
                if (field.defaultValue == field.value)
                    field.value = '';
                else if (field.value == '')
                    field.value = field.defaultValue;
            }
        </script>
        <script src="js/azax_01.js" type="text/javascript"></script>
        <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(window).load(function () {
                $('#slider').nivoSlider({
                    effect: 'random',
                    slices: 10,
                    animSpeed: 500,
                    pauseTime: 2000,
                    startSlide: 0, //Set starting Slide (0 index)
                    directionNav: false,
                    directionNavHide: false, //Only show on hover
                    controlNav: false, //1,2,3...
                    controlNavThumbs: false, //Use thumbnails for Control Nav
                    pauseOnHover: true, //Stop animation while hovering
                    manualAdvance: false, //Force manual transitions
                    captionOpacity: 0.8, //Universal caption opacity
                    beforeChange: function () {},
                    afterChange: function () {},
                    slideshowEnd: function () {} //Triggers after all slides have been shown
                });
            });
        </script>
    </head>
    <body>
        <div class="headersection template clear">
            <div class="logo">
                <img src="img/logo.PNG" alt="Logo"/>
                <h2>Small School</h2>
                <p>Dumki, Patuakhali-1207;</p>
            </div>
            <div class="social clear">
                <a href=""> <img src="img/facebook.png" alt="Logo"/></a>
                <a href=""><img src="img/twitter.png" alt="Logo"/></a>
                <a href=""><img src="img/email.png" alt="Logo"/></a>
                <a href=""><img src="img/youtube.png" alt="Logo"/></a>
                <a href=""><img src="img/share.png" alt="Logo"/></a>
            </div>
        </div>

        <div class="nevigationbar template">
            <ul>
                <li><a id="active" href="index.php">Home</a></li>
                <li><a href="aboutschool.php">About</a>
                    <ul>
                        <li><a href="aboutschool.php">School Details</a></li>
                    </ul>
                </li>

                <li><a  href="adminestration.php">Administration</a></li>
                <li><a href="academic.php">Adademic</a></li>
                <li><a href="notic.php">Notice</a></li>
                <li><a href="#">Login</a>
                    <ul>
                        <li><a href="admin3/login.php">Student Login</a></li>
                        <li><a href="admin2/login.php">Teacher Login</a></li>
                        <li><a href="admin1/login.php">Admin Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>