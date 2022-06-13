<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="items-center w-32">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>

        <div class="flex justify-center items-start gap-7 py-6 font-medium text-lg text-theme-white w-full">
            <a href="#" id="home-tab">Home</a>
            <a href="#" id="video-maker-tab">Video Maker</a>
            <a href="#" id="post-list-tab">Post List</a>
            <a href="#" id="member-tab">Member</a>
            <a href="#" id="info-tab">Information</a>
            <a href="#" id="faq-tab">FAQ</a>
        </div>

        <div class="items-center w-32">
            <div class="flex items-center justify-center font-medium text-right text-theme-white text-base hover:text-orange-400 hover:text-lg hover:font-semibold gap-2 cursor-pointer">user <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        
    </header>
    <!--header ends here-->

    <!--content-->
    <!--content ends here-->

    <!--footer-->
    <!--footer ends here-->

    <!--scripts-->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script>
        tailwind.config = {
          theme: {
            extend: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'theme-white': '#f6f6e9',
                    'theme-black': '#2a221b',
                    'theme-yellow': '#ffc300',
                    'theme-cream': '#ffffcc',
                    'theme-blue': '#61a6ab',
                    'theme-pink': '#f7b9a1',
                    'theme-orange': '#ff9011',
                }
            }
          }
        }
    </script>

    <script>
        jQuery(document).ready(function(){
            $('#home-tab').addClass('active');

            jQuery('#home-tab').on('click', function() {
                $('#home-tab').addClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#video-maker-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').addClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#post-list-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').addClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#member-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').addClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#info-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').addClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#faq-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').addClass('active');
            });
        });

        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });
        
        $(document).scroll(function() {})

    </script>

    <!--scripts ends here-->

</body>
</html>
