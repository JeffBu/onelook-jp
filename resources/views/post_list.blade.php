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
                    <th class="px-3 py-3 border-x border-sky-700">No.</th>
                    <th class="px-3 py-3 border-x border-sky-700">動画名</th>
                    <th class="px-3 py-3 border-x border-sky-700">パスコード</th>
                    <th class="px-3 py-3 border-x border-sky-700">投稿日</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧期限</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧数</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧URL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">1</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>123456</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">5</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>https://onelook.jp/access-record-verification?access_id=4openRe7Az</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>567890</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">3</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span></span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container hidden px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">3</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>098765</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>閲覧期限が経過しました</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">4</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <!--<img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">-->
                            <button class="container hidden mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                            <span>ちょっとイリーガルなもの</span>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>654321</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">6</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>運営により削除されました</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container hidden px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
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
            $('#post-list-tab').addClass('active');
        });

        $(document).scroll(function() {})

        function copyLink(){
            Swal.fire({
            title: '下記の招待状をコピーし、メール等で共有いただければ動画閲覧が可能です',
            html:
                '（ユーザー名）さんが、あなたを動画閲覧に招待しています。<br /><br />' +
                '動画名： ' + 'https://onelook.jp/access-record-verification?access_id=4openRe7Az <br />' +
                'パスコード: ' + '837881',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                '招待状をコピー',
            cancelButtonText:
                'キャンセル',
            })
        }
    </script>
    <!--script ends here-->
</body>
</html>
