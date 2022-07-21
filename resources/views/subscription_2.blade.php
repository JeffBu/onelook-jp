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

<body class="justify-center items-center bg-white text-theme-black font-['Calibri']">

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
    <div class="flex-1 justify-center items-center gap-8 w-full">
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-10 pt-20">会員プラン</h1>

        <div class="flex justify-left items-center gap-8 mx-auto w-1/3">
            <span>変更前：</span>
            <span>フリープラン</span>
        </div>

        <div class="flex justify-left items-center gap-8 mx-auto w-1/3">
            <span>変更後：</span>
            <div class="relative inline-block text-left">
                <div>
                  <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 " id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <span id="select_button_text">選択してください</span>
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>

                <div class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" style="display:none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="menu-dropdown">
                  <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-0" onclick="changePlan()">パーソナルプランの申込</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-1" onclick="cancelPlan()">パーソナルプランの解約</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-2" onclick="cancelService()">本サービスの解約</a>
                  </div>
                </div>
            </div>
        </div>

        <!--upgrade plan-->
        <div id="upgrade_plan" style="display: none">
            <div class="flex justify-center items-center mx-auto w-1/5">
                <button class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">変更する</button>
            </div>

            <div class="flex-1 justify-center items-center text-left mt-10 mx-auto w-1/2">
                <p class="px-4 py-4 text-center">留意点</p>
                <p class="px-4 py-4">1 パーソナルプランの申込の場合、変更申込日の翌月から料金が課金されます。なお、変更申込以後はパーソナルプランの機能のご利用が可能です。パーソナルプランの解約は、申込日の翌月1日以後から可能です。</p>
                <p class="px-4 py-4">2 パーソナルプランの解約時の料金変更は、パーソナルプランの解約の申込日の翌月以後の請求から反映されます。なお、変更日以後はパーソナルプランの機能のご利用はできなくなります。</p>
            </div>
        </div>

        <!--cancel plan-->
        <div id="cancel_plan" style="display: none">
            <div class="flex justify-center items-center mx-auto w-1/5">
                <button class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">変更する</button>
            </div>

            <div class="flex-1 justify-center items-center text-left mt-10 mx-auto w-1/2">
                <p class="px-4 py-4 text-center">留意点</p>
                <p class="px-4 py-4">1 本サービスを解約した場合、すべてのデータおよび情報は、申込時に本サーバーから削除されます。なお、解約日以後は本サービスの機能のご利用はできなくなります。</p>
                <p class="px-4 py-4">2 パーソナルプランのご利用者の方は、パーソナルプランの解約後でなければ本サービスの解約できません。</p>
            </div>
        </div>

        <!--cancel service-->
        <div id="cancel_service" style="display: none">
            <div class="flex justify-center items-center mx-auto w-1/5">
                <button class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">変更する</button>
            </div>

            <div class="flex-1 justify-center items-center text-left mt-10 mx-auto w-1/2">
                <p class="px-4 py-4 text-center">留意点</p>
                <p class="px-4 py-4">1　本サービスを解約した場合、すべてのデータおよび情報は、申込時に本サーバーから削除されます。なお、解約日以後は本サービスの機能のご利用はできなくなります。</p>
                <p class="px-4 py-4">2　パーソナルプランのご利用者の方は、パーソナルプランの解約後でなければ本サービスの解約はできません。</p>
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

        $('#menu-button').click( function () {
            var display = $('#menu-dropdown').css('display')
            if(display === 'none')
            {
                $('#menu-dropdown').css('display', 'block')
            }
            else{
                $('#menu-dropdown').css('display', 'none')
            }
        })

        function changePlan() {
            $('#upgrade_plan').css('display', 'block')
            $('#select_button_text').html('パーソナルプランの申込')
            $('#cancel_service').css('display', 'none')
            $('#cancel_plan').css('display', 'none');
            $('#menu-dropdown').css('display', 'none')
        }

        function cancelPlan() {
            $('#cancel_plan').css('display', 'block')
            $('#select_button_text').html('パーソナルプランの解約')
            $('#cancel_service').css('display', 'none')
            $('#upgrade_plan').css('display', 'none')
            $('#menu-dropdown').css('display', 'none')
        }

        function cancelService() {
            $('#cancel_plan').css('display', 'none')
            $('#select_button_text').html('本サービスの解約')
            $('#upgrade_plan').css('display', 'none')
            $('#cancel_service').css('display', 'block')
            $('#menu-dropdown').css('display', 'none')
        }
    </script>
    <!--script ends here-->
</body>
</html>
