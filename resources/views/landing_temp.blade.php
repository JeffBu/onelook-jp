<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth font-sans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('media/icon-onelook.ico')}}">

    <!-- <style>
        .bg-home {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%23000000' fill-opacity='0.40' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
        }
    </style> -->

</head>

<body class="flex flex-col justify-center items-center w-full">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed top-0 w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <a href="{{route('home')}}">
                <img src="{{asset('media/logos/1.png')}}" alt="onelook_logo" class="h-11">
            </a>
        </div>

        <div class="flex justify-center items-center gap-5 py-6 text-sm">
            <div class="font-semibold text-theme-white hover:text-yellow-300">
                <a href="{{route('login')}}">ログイン</a>
            </div>
            <div class="font-semibold px-2 py-1 rounded-sm bg-theme-yellow text-theme-black hover:bg-yellow-400 hover:text-theme-white">
                <a href="{{route('registration')}}">無料会員登録</a>
            </div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center h-1/2 w-full py-14 bg-theme-cream font-bold text-theme-black gap-32">
        <div class="pt-8 flex flex-col gap-4">
            <div class="sm:text-2xl md:text-3xl lg:text-4xl">説明ムービーに特化した</div>
            <div class="sm:text-xl md:text-2xl lg:text-3xl">動画作成サイト</div>
            <div class="sm:text-lg md:text-xl lg:text-2xl">百聞は一見に如かず</div>
        </div>
    </div>

    <div class="flex flex-col justify-center text-center items-center text-lg pt-20 w-3/4 gap-20">
        <div class="font-medium text-theme-black text-base sm:text-lg w-full">
            <span class="font-semibold text-theme-black rounded-sm px-1">
                <mark>OneLook</mark>
            </span>
            は資料と言葉を組み合わせた動画作成が簡単にできるサービスです。
            資料の説明やコメント、文章で書くとまどろっこしい、
            それを言葉で伝えたらすぐにわかるのに、をシンプルに解決します！
        </div>

        <div class="h-10"></div>
    </div>

    <div class="flex flex-col justify-center items-start gap-4 w-full">
        <span class="text-lg sm:text-2xl text-sky-700 text-center font-semibold w-full">動画を使ってビジネスのDXに対応</span>
        <div class="flex flex-row justify-center px-8 py-8 items-center w-11/12 md:w-8/12 bg-sky-700 rounded-r-lg h-52 gap-4">
            <img src="{{asset('media/home-1.png')}}" alt="Video Creation Icon" class="h-32 w-32 mx-4">
            <span class="text-white overflow-auto h-full">資料チェックなどで資料を指さして「ここ、これ」を表現できたらもっと効率的だと思いませんか？ OneLookでは実際に資料をポイントしながら言葉でコメントした動画作成が簡単にできます。</span>
        </div>
    </div>

    <div class="flex flex-col justify-center items-end gap-4 w-full pt-32">
        <span class="text-lg sm:text-2xl text-neutral-900 text-center font-semibold w-full">教材のための動画作成</span>
        <div class="flex flex-row justify-center px-8 py-8 items-center w-11/12 md:w-8/12 bg-theme-yellow rounded-l-lg h-52 gap-4">
            <img src="{{asset('media/home-2.png')}}" alt="Video Creation Icon" class="h-32 w-32 mx-4">
            <span class="text-neutral-900 overflow-auto h-full">学校や塾などでの問題・解答のための録画ソフトをお探しですか？ ２次元の文章や資料に声を添えることで「ここ、これ」を伝えられるのがOneLookの特徴です。</span>
        </div>
    </div>

    <div class="flex flex-col justify-center items-start gap-4 w-full pt-32">
        <span class="text-lg sm:text-2xl text-sky-700 text-center font-semibold w-full">動画管理もラクラク</span>
        <div class="flex flex-row justify-center px-8 py-8 items-center w-11/12 md:w-8/12 bg-sky-700 rounded-r-lg h-52 gap-4">
            <img src="{{asset('media/home-3.png')}}" alt="Video Creation Icon" class="h-32 w-32 mx-4">
            <span class="text-white overflow-auto h-full">ダウンロードしなくてもURLの共有だけで動画の閲覧が可能。 一定期間で動画は自動的に削除されるので管理も楽です。 もちろんダウンロード機能もあります（有料）。</span>
        </div>
    </div>

    <div class="flex flex-col justify-center text-center items-center text-lg pt-32">
        <a href="{{route('view-plans')}}" class="bg-theme-yellow rounded-md px-4 py-2 text-base sm:text-lg font-bold hover:bg-yellow-400 hover:text-theme-white">
            無料で始める!
        </a>
        <div class="flex justify-end items-center w-full">
            <img src="{{asset('media/home-4.png')}}" alt="Video Creation Icon" class="h-12 w-12 mx-4">
        </div>
    </div>

    <div class="h-32"></div>
    <!--content ends here-->

    <!--footer
    <footer class="flex flex-col sm:flex-row shadow bg-cyan-700 text-theme-white justify-center items-start py-5 px-5 text-base gap-8 md:gap-20 lg:gap-32 tracking-widest w-full">
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">活用例</div>
            <div class="text-sm">料金体系はこちら</div>
        </div>
        <div class="flex flex-col gap-2">
            <a href="{{route('view-plans')}}" class="text-theme-yellow font-medium">Plan</a>
            <div class="text-sm">Free Plan</div>
            <div class="text-sm">Personal Plan</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Support</div>
            <div class="text-sm">Get Help</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Company</div>
            <div class="text-sm">About Us</div>
            <div class="text-sm">Special Commercial Code</div>
            <div class="text-sm">Privacy Policy</div>
        </div>
    </footer>
    footer ends here-->

    <!--scripts-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if(Session::has('message'))
        <script>
            $(document).ready(function () {
                var message = "{{Session::get('message', '')}}"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        </script>
    @endif
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
    <!--scripts ends here-->

</body>
</html>
