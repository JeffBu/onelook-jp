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
            background-color: #65a30d;
            border-radius: 6px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%239C92AC' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
        }

        .nav-bg {
            background-color: #1e293b;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%239C92AC' fill-opacity='0.05' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
        }

        .header-bg {
            background-color: #65a30d;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%239C92AC' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
        }

    </style>
</head>

<body class="justify-center shadow-sm items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--content-->
    <div class="flex justify-center items-center w-full">
        <nav class="flex-1 px-2 justify-left items-center text-center w-64 nav-bg shadow-md divide-y divide-theme-white h-screen fixed left-0 top-0">
            <div class="flex justify-left px-4 py-6 items-center text-xl font-semibold text-theme-white gap-3">
                {{config('app.name')}}
            </div>

            <div class="py-4">
                <a href="#" class="flex px-4  py-2 justify-left items-center text-base font-semibold text-theme-white gap-3 w-full" id="user"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg> ユーザー</a>
            </div>

            <div class="flex flex-col pt-2 gap-2 w-full">
                <a href="#" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white gap-3 w-full" id="home"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg> ホーム</a>

                <a href="{{route('admin-member-list')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="member-list"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg> 会員一覧</a>

                <a href="{{route('admin-post-list')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="video-list"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg> 動画リスト</a>

                <a href="#" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="settings"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg> 各種設定</a>
            </div>
        </nav>

        <div class="flex flex-col justify-center items-center ml-64 w-full">
            <div class="flex justify-between items-center px-4 header-bg h-12 w-full sticky top-0">
                <h1 class="text-lg font-semibold text-theme-white">ホーム</h1>
                <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
            </div>

            <div class="flex flex-col justify-center items-center mt-8 w-3/4">
                <div class="text-left w-full">
                    <h1 class="text-xl font-semibold text-lime-600">登録状況</h1>
                </div>

                <table class="text-center mt-6 border border-lime-600 w-full">
                    <thead>
                        <tr>
                            <th rowspan="2" class="px-4 py-1 border border-lime-700">10月</th>
                            <th rowspan="2" class="px-4 py-1 border border-lime-700">会員数合計</th>
                            <th colspan="4" class="px-4 py-1 border border-lime-700">動画数</th>
                        </tr>
                        <tr>
                            <th class="px-4 py-1 border border-lime-700">作成動画</th>
                            <th class="px-4 py-1 border border-lime-700">期限内動画</th>
                            <th class="px-4 py-1 border border-lime-700">招待メール</th>
                            <th class="px-4 py-1 border border-lime-700">閲覧数</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">フリープラン</td>
                            <td class="px-4 py-1 border border-lime-700">30</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">パーソナルプラン</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">ビジネスプラン</td>
                            <td class="px-4 py-1 border border-lime-700">300</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr class="header-bg text-theme-white">
                            <td class="px-4 py-1 border border-lime-700">合計</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="text-center mt-6 border border-lime-600 w-full">
                    <thead>
                        <tr>
                            <th rowspan="2" class="px-4 py-1 border border-lime-700">9月</th>
                            <th rowspan="2" class="px-4 py-1 border border-lime-700">会員数合計</th>
                            <th colspan="4" class="px-4 py-1 border border-lime-700">動画数</th>
                        </tr>
                        <tr>
                            <th class="px-4 py-1 border border-lime-700">作成動画</th>
                            <th class="px-4 py-1 border border-lime-700">期限内動画</th>
                            <th class="px-4 py-1 border border-lime-700">招待メール</th>
                            <th class="px-4 py-1 border border-lime-700">閲覧数</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">フリープラン</td>
                            <td class="px-4 py-1 border border-lime-700">30</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">パーソナルプラン</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">ビジネスプラン</td>
                            <td class="px-4 py-1 border border-lime-700">300</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                        <tr class="header-bg text-theme-white">
                            <td class="px-4 py-1 border border-lime-700">合計</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <div class="pt-20"></div>

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
                    'theme-slate': '#06283D',
                }
            }
          }
        }
    </script>

    <script>

        $(document).ready(function(){
            $('#home').addClass('active');

        });

    </script>
    <!--script ends here-->
</body>
</html>
