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
    <div class="flex justify-center items-center pt-20">
        <table class="text-center w-1/2 border border-sky-700">
            <thead>
                <tr>
                    <th colspan="2" class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex-col text-center text-xl">
                            <h1>OneLook</h1>
                            <h2>請求書　兼　領収書</h2>
                        </div>
                    </th>
                    <th rowspan="4" class="px-1 py-1 border-x border-y border-cyan-600 w-2/5">
                        <div class="font-medium">
                            <p>株式会社モアジョブ<br></p>
                            <p>〒530-0044　<br></p>
                            <p>大阪府大阪市北区東天満2－6－7<br></p>
                            <p>南森町東一号館8階<br></p>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">宛先</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">購入日</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">〒530-0044</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">2020.10.2</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">大阪府大阪市北区東天満2－6－7<br>南森町東一号館9階</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">市川欽一税理士事務所</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">市川　欽一　様</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">製品</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">種別</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">金額（税込）</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">有料サービス（2014/01/28-2014/02/27)</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ダウンロード会員</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">\800</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">合計</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">\800</td>
                </tr>
            </tbody>
        </table>
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
