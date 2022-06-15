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
    <div>
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-8 pt-20">会員プランを変更します。</h1>
    </div>
    <div class="flex justify-center items-center w-full">

        <table class="text-center w-4/5 border border-sky-700">
            <thead class="bg-cyan-600 text-theme-white">
                <tr>
                    <th class="px-3 py-3 border-x border-sky-700"></th>
                    <th class="px-3 py-3 border-x border-sky-700">フリープラン</th>
                    <th class="px-3 py-3 border-x border-sky-700">パーソナルプラン</th>
                    <th class="px-3 py-3 border-x border-sky-700">ビジネスプラン</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">現在のプラン</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <input type="radio" name="plan-select" id="cb1" checked>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <input type="radio" name="plan-select" id="cb2">
                    </td>
                    <td rowspan="7" class="px-3 py-3 border-x border-y border-cyan-600 w-1/4">
                        <div class="flex-1 justify-center items-center text-center">
                            <span>自社専用サイト 管理者画面の追加 セキュリティ強化 保管期限の延長 などのカスタムプランもご相談ください</span>
                            <button class="container mt-16 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">ビジネスプラン ご相談</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">月額料金</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">無料</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">300円</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">最大録画時間</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">5分</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">15分</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">月間の作成件数</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">5件</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">100件</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">ダウンロード<br>（mp4ファイル）</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg></td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 01M12 01M16 01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg></td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">ストレージサービス<br>（クラウドでの保管・閲覧）</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">3日</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">7日</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">広告</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">あり</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">なし</td>
                </tr>

                <tr>
                    <td colspan="4" class="border-x border-y border-theme-white">
                        <div class="container mt-8 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md cursor-pointer">
                            <a href="#">プラン変更</a>
                        </div>
                    </td>
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

        function planAlert(){

            Swal.fire({
                title: 'ビジネスプランのご相談',
                text: '申請検討ありがとうございます。こちらを送信いただけましたらご登録者様宛に当社担当よりご連絡を申し上げます。貴社のご希望の使用イメージなどございましたらご記入いただけますとスムーズです。よろしくお願いいたします。',
                input: 'email',
                inputPlaceholder: 'ご連絡先のメールアドレス',
                showCancelButton: true,
                confirmButtonText: '送信',
                cancelButtonText: 'キャンセル',
            })
        }


    </script>
    <!--script ends here-->
</body>
</html>
