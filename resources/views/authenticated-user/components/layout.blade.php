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

            .sidebar-transition {
                transition-property: width;
                transition-duration: 2s;
                transition-timing-function: linear;
                transition-delay: 1s;
            }

        </style>

        @yield('css')
    </head>

    <body class="justify-center items-center bg-white text-theme-black font-['Calibri']">
        @yield('head')
        @yield('content')
        @yield('foot')

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <!-- pdf.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
        <!-- SweetAlerts CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        @yield('js')
    </body>

    <script>
        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });
    </script>
</html>
