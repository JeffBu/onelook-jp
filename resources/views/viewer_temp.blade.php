<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="justify-center items-center">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-start text-lg pt-4 w-full">
        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-12 px-2 text-left"></div>

        <div class="flex-1 justify-center text-center items-center text-lg pt-12">
            <div class="text-center text-4xl font-bold text-cyan-600 pb-4">{{$record->title}}</div>

            <div>
                <video src="{{"https://storage.googleapis.com/onelook-storage/".$record->video_path}}" alt="" class="rounded-lg border border-cyan-800 mb-1" controls></video>
            </div>

            <div class="flex justify-between text-cyan-700 text-base px-1">
                <div>投稿者 : {{$record->uploader->name}}</div>
                <div>投稿日: {{$record->created_at->format('Y年m月d日H:i')}}~ 閲覧期限: {{$record->created_at->modify('+7 days')->format('Y年m月d日H:i')}}</div>
            </div>

            <div class="h-32"></div>
        </div>

        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-12 px-2 text-left"></div>
    </div>
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
                    'theme-orange': '#ed5b2d',
                }
            }
          }
        }
      </script>

      <script>
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
