
    </body>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script>
        $(window).on('scroll', function() {
            if($(window).scrollTop() > 0) {
                $('#header-frame').css('opacity', '0.8');
            }
            else {
                $('#header-frame').css('opacity', '1');
            }
        });
    </script>
</html>
