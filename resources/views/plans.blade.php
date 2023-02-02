<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="icon" href="{{asset('media/icon-onelook.ico')}}">

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
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
    <div>
        <h1 class="text-center text-2xl font-bold text-sky-600 pb-8 pt-20">会員プラン</h1>
    </div>

    <div class="flex flex-col justify-center items-center w-full gap-8">
        <div class="grid lg:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-3/4 h-1/2" id="home">
            <!-- free plan -->
            <div class="flex flex-col items-center text-left text-sm gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">フリープラン</span>
                
                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>月額料金</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>最大録画時間</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>月間の作成件数</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>ダウンロード<br>（mp4ファイル）</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>ストレージサービス<br>（クラウドでの保管・閲覧）</span>
                    <span>3日</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>広告</span>
                    <span>あり</span>
                </div>

                <a href="{{route('registration')}}" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">無料でサインアップ</a>
            </div>

            <!-- personal plan -->
            <div class="flex flex-col items-center text-left text-sm gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">パーソナルプラン</span>
                
                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>月額料金</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>最大録画時間</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>月間の作成件数</span>
                    <span>-</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>ダウンロード<br>（mp4ファイル）</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 01M12 01M16 01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>ストレージサービス<br>（クラウドでの保管・閲覧）</span>
                    <span>7日</span>
                </div>

                <div class="flex flex-row w-full justify-between items-center px-4">
                    <span>広告</span>
                    <span>なし</span>
                </div>

                <a href="{{route('registration')}}" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">購読する</a>
            </div>

            <!-- custom plan -->
            <div class="flex flex-col justify-between items-center text-left gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">ビジネスプラン</span>
                <div class="flex flex-col w-full items-center px-4">
                    <span>自社専用サイト 管理者画面の追加 セキュリティ強化 保管期限の延長 などのカスタムプランもご相談ください</span>
                </div>
                <a href="#" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">ビジネスプラン ご相談</a>
            </div>
        </div>
    </div>

    <div class="pt-40"></div>
    <!--content ends here-->

    <!--footer
    <footer class="flex shadow bg-cyan-700 text-theme-white justify-center items-start py-5 px-5 text-base gap-32 tracking-widest w-full">
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">活用例</div>
            <div class="text-sm">料金体系はこちら</div>
        </div>
        <div class="flex flex-col gap-2">
            {{-- <a href="{{route('view-plans')}}" class="text-theme-yellow font-medium">Plan</a> --}}
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
                html: '<b>ビジネスプランのご相談</b>',
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
