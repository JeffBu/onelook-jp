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
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-10 pt-20">会員情報を変更します。</h1>
    </div>

    <div class="flex justify-center items-center w-screen">
        <div class="justify-end items-center w-4/5">
            <div class="float-right w-1/5 w- mr-4 mb-4">
                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" data-modal-toggle="edit-info-modal">変更</button>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <table class="text-center w-4/5 border border-sky-700">
            <tbody>
                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">会社名</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">市川欽一税理士事務所</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">氏名</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">市川欽一</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">住所</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">〒550-0044</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">大阪府大阪市北区東天満２－６－７南森町東一号館9F</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">電話番号</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">06-6356-3366</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">ユーザー名</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">いちかわ</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">メールアドレス</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ichikawa@feel-free.biz</td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">閲覧期限の通知</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600 w-2/3">
                        <div class="flex-1 py-2 justify-center items-center">
                            <div class="flex justify-center items-center gap-4 mb-4">
                                <input type="radio" name="avail-radio" id="cb1" checked>
                                <label for="cb1" class="pr-4">あり</label>
                                <input type="radio" name="avail-radio" id="cb2">
                                <label for="cb2">なし</label>
                            </div>
                            <div class="px-4  py-4">
                                <span>閲覧期限の３６時間前に、メールで閲覧期限の終了をお知らせする機能です。通知が不要な方は、なしにチェックしてください。（デフォルトはありにチェック）</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center px-4 py-2">
                            <span>支払い情報</span>
                            <button class="container px-4 py-2 mt-4 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                        </div>
                    </th>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>カード番号：********　3030</span>
                            <span>有効期限：12/2022</span>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="pt-40"></div>

    <!-- edit info modal -->

    <!-- end edit info modal -->

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
