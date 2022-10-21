<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

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
            <div class="font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

        <div class="flex justify-center items-start gap-7 py-6 font-small text-sm font-bold text-theme-white w-full">
            <a href="{{route('dashboard')}}" id="home-tab">ホーム</a>
            <a href="{{route('video-creation')}}" id="video-maker-tab">ムービー作成</a>
            <a href="{{route('post-list')}}" id="post-list-tab">投稿リスト</a>
            <a href="{{route('membership-info')}}" id="member-tab">会員情報</a>
            <a href="#" id="faq-tab">FAQ</a>
        </div>

        <div class="items-center w-32">
            <div class="hidden font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div>
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-10 pt-20">領収リスト</h1>
    </div>
    
    <div class="flex justify-center items-center">
        <table class="text-center w-1/2 border border-sky-700">
            <thead>
                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">ご購入日</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">領収日</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">説明</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">ご請求金額</th>
                </tr>
            </thead>
            <tbody>
                @inject('carbon', 'Carbon\Carbon')
                @forelse($billingStatementList as $billingStatement)
                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->created_at->format('Y-m-d')}}</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->created_at->format('Y-m-d')}}</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">
                        <a href="/payment-history-2/{{$billingStatement->id}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">有料サービス ( {{$billingStatement->created_at->format('Y年m月d日H:i')}} - {{$carbon::parse($billingStatement->ends_at)->format('Y年m月d日H:i')}} )</a>
                    </td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->stripe_price}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        
                            表示するレコードがありません
                       
                    </td>
                   
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-center items-center w-screen">
        <div class="justify-end items-center w-1/2">
            <div class="float-right w-1/5 mr-3 mb-4">
                <button class="container px-4 py-2 mt-4 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
            </div>
        </div>
    </div>

    <div class="pt-40"></div>

    <!--content ends here-->

    <!--script-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
    <!-- SweetAlerts CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

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
        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });

        jQuery(document).ready(function() {
            $('#member-tab').addClass('active');
        });

        $(document).scroll(function() {})

    </script>
    <!--script ends here-->
</body>
</html>
