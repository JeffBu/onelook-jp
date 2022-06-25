<!DOCTYPE html>
<html lang="en" class="scroll-smooth font-sans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

</head>

<body class="justify-center items-center bg-theme-white">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-14 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <div class="font-semibold text-theme-white">OneLook</div>
        </div>

        <div class="flex justify-center items-center gap-5 py-6 text-sm">
            <div class="font-semibold text-theme-white hover:text-yellow-300">
                <a href="{{route('login')}}">Login</a>
            </div>
            <div class="font-semibold px-2 py-1 rounded-sm bg-theme-yellow text-theme-black hover:bg-yellow-400 hover:text-theme-white">
                <a href="{{route('register')}}">Sign Up</a>
            </div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center h-80 w-full px-32 pt-14 pb-8 bg-theme-cream font-bold text-theme-black gap-32">
        <div class="pt-8 flex flex-col gap-4">
            <div class="text-4xl">説明ムービーに特化した</div>
            <div class="text-3xl">動画作成サイト</div>
            <div class="text-2xl">百聞は一見に如かず</div>
        </div>
        <div class="pt-8">

        </div>
    </div>

    <div class="flex flex-col justify-center text-center items-center text-lg gap-4 py-8 px-32">
        <div class="font-medium text-theme-black py-4">
            <span class="font-semibold text-theme-black bg-theme-yellow rounded-sm px-1">OneLook</span>
            は資料と言葉を組み合わせた動画作成が簡単にできるサービスです。
            資料の説明やコメント、文章で書くとまどろっこしい、
            それを言葉で伝えたらすぐにわかるのに、をシンプルに解決します！
        </div>

        <div class="h-10"></div>

        <div class="flex items-center text-center text-theme-black justify-between w-full">
            <div class="w-64 px-4 py-4 text-2xl text-sky-600 font-bold">
                動画を使ってビジネスのDXに対応
            </div>
            <div class="w-64 px-4 py-4 text-2xl text-sky-600 font-bold">
                教材のための動画作成
            </div>
            <div class="w-64 px-4 py-4 text-2xl text-sky-600 font-bold">
                動画管理もラクラク
            </div>
        </div>

        <div class="flex items-center text-theme-black justify-between w-full">
            <div class="w-64 border border-theme-blue rounded-md px-4 py-4 font-medium">
                <img src="/img/dx.png" alt="" class="pb-2">
                資料チェックなどで資料を指さして「ここ、これ」を表現できたらもっと効率的だと思いませんか？ OneLookでは実際に資料をポイントしながら言葉でコメントした動画作成が簡単にできます。
            </div>
            <div class="w-64 border border-theme-blue rounded-md px-4 py-4 font-medium">
                <img src="/img/dx.png" alt="" class="pb-2">
                学校や塾などでの問題・解答のための録画ソフトをお探しですか？２次元の文章や資料に声を添えることで「ここ、これ」を伝えられるのがOneLookの特徴です。<br><br>
            </div>
            <div class="w-64 border border-theme-blue rounded-md px-4 py-4 font-medium">
                <img src="/img/dx.png" alt="" class="pb-2">
                ダウンロードしなくてもURLの共有だけで動画の閲覧が可能。
一定期間で動画は自動的に削除されるので管理も楽です。もちろんダウンロード機能もあります（有料） 。
            </div>
        </div>

        <div class="flex items-center text-theme-black mt-5 justify-between w-full">
            <button class="w-64 border border-theme-blue bg-theme-yellow rounded-md px-4 py-4 text-lg font-bold hover:bg-yellow-400 hover:text-theme-white">
                無料で始める
            </button>
            <button class="w-64 border border-theme-blue bg-theme-yellow rounded-md px-4 py-4 text-lg font-bold hover:bg-yellow-400 hover:text-theme-white">
                無料で始める
            </button>
            <button class="w-64 border border-theme-blue bg-theme-yellow rounded-md px-4 py-4 text-lg font-bold hover:bg-yellow-400 hover:text-theme-white">
                無料で始める
            </button>
        </div>

        <div class="h-32"></div>
    </div>
    <!--content ends here-->

    <!--footer-->
    <footer class="flex shadow bg-cyan-700 text-theme-white justify-center items-start py-5 px-5 text-base gap-32 tracking-widest w-full">
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">活用例</div>
            <div class="text-sm">料金体系はこちら</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Plan</div>
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
    <!--footer ends here-->

    <!--scripts-->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
