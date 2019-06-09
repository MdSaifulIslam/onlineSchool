
        </div>
        <div class="footersection template clear">
            <h2>&copy; Copyright 2018 Educational.Institute.com</h2>
            <p><h4 style="text-align: center; margin: 10px">It is Academic website</h4></p>
        </div>
        <div class="socialfixed">
            <a href=""><img src="img/facebook.png"/></a>
            <a href=""><img src="img/twitter.png"/></a>
            <a href=""><img src="img/vimeo.png"/></a>
            <a href=""><img src="img/youtube.png"/></a>
        </div>
        <a href="#" class="sf-back-to-top"><span class="arrow"></span>Top</a>
        <script>
            var amountScrolled = 10;

            $(window).scroll(function () {
                if ($(window).scrollTop() > amountScrolled) {
                    $('a.sf-back-to-top').fadeIn('slow');
                } else {
                    $('a.sf-back-to-top').fadeOut('slow');
                }
            });

            $('a.sf-back-to-top').click(function () {
                $('html, body').animate({
                    scrollTop: 0
                }, 700);
                return false;
            });
        </script>
    </body>
</html>
