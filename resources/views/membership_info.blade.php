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

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center pt-20">
        <table class="text-center w-4/5 border border-sky-700">
            <thead class="bg-cyan-600 text-theme-white">
                <tr>
                    <th class="px-1 py-1 border-x border-sky-700">使用状況</th>
                    <th colspan="3" class="px-1 py-1 border-x border-sky-700">投稿動画：●件（うち閲覧期限内の動画：●件）<br>投稿可能件数：●件/50件（月末まで）</th>
                    <th class="px-1 py-1 border-x border-sky-700"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">現在のプラン</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">パーソナルプラン</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">
                        <a href="{{route('change-membership-plan')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">変更</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">会社名等（任意）</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">市川欽一税理士事務所</td>
                    <td rowspan="8" class="px-1 py-1 border-x border-y border-cyan-600">
                        <a href="{{route('edit-member-info')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">変更</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">氏名</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">市川欽一</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">住所</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">〒550-0044</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">大阪府大阪市北区東天満２－６－７南森町東一号館9F</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">電話番号</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">06-6356-3366</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ユーザー名</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">これは自由設定できる。デフォルトは指名</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">メールアドレス</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">ichikawa@feel-free.biz</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">閲覧期限の通知</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex justify-center items-center gap-6">
                            <input type="radio" name="available" id="avail-radio" disabled checked>
                            <label for="avail-radio">あり</label>
                            <input type="radio" name="not" id="not-radio" disabled>
                            <label for="not-radio">なし</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ログインID</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">dad123</td>
                    <td rowspan="2" class="items-center px-1 py-1 border-x border-y border-cyan-600">
                        <a href="{{route('edit-personal-info')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">変更</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">パスワード</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">********</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">支払履歴</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex justify-center items-center gap-3">
                        <span>支払履歴は</span>
                        <a href="{{route('payment-history')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">こちら</a>
                        </div>
                    </td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">支払情報</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">カード番号<br>********5555</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">カード名義<br>KINICHICIHIKA</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">有効期限<br>03/2022</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">変更5（提案）</td>
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
