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
        .errorMessageStyle ul{
            list-style: none;
        }

    </style>
</head>

<body class="justify-center items-center bg-neutral-300 font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <a href="{{route('home')}}">
                <img src="{{asset('media/logos/1.png')}}" alt="onelook_logo" class="h-11">
            </a>
        </div>

        <!--<div class="flex justify-center items-center gap-5 py-6 text-sm">
            <div class="font-semibold text-theme-white hover:text-yellow-300">
                <a href="{{route('login')}}">ログイン</a>
            </div>
            <div class="font-semibold px-2 py-1 rounded-sm bg-theme-yellow text-theme-black hover:bg-yellow-400 hover:text-theme-white">
                <a href="{{route('registration')}}">無料会員登録</a>
            </div>
        </div>-->

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center pt-20">
        <div class="flex justify-center items-center w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!--modal content-->
                <div class="relative bg-white rounded-lg shadow">
                    <!--modal header-->
                    <div class="flex justify-between items-center p-5 rounded-t border-b">
                        <h3 class="text-xl font-bold text-sky-600">
                            ログイン
                        </h3>

                    </div>
                    <!--modal body-->
                    <div class="px-8 py-4 space-y-4">
                        @if(Session::has('message'))
                        <div class="px-1 py-1 text-emerald-600 text-xs text-center" role="alert">
                            {{-- <p class="font-bold">重要！</p> --}}
                            <p>{{Session::get('message')}}</p>
                          </div>
                        @endif
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="relative z-0 w-full pb-4 group">
                                <input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                            </div>
                            <div class="relative z-0 w-full pb-4 group">
                                <input type="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワード</label>
                            </div>
                            <div class="relative z-0 w-full pb-4 group errorMessageStyle">
                                <x-jet-validation-errors class="mb-4" />
                            </div>

                            <div class="flex flex-col items-center py-6 gap-4 w-full">
                                <div class="flex flex-col items-end gap-2 w-full">
                                    <button type="submit" class="text-white bg-sky-600 hover:bg-sky-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">ログイン</button>
                                </div>

                                <div class="flex flex-col items-end gap-2 w-full">
                                    <a href="forgot-password" class="text-sm text-sky-600 hover:text-sky-500 underline underline-offset-2">パスワードをお忘れですか?</a>
                                </div>
                            </div>

                    </div>
                    <!--modal footer-->
                    <div class="flex flex-row justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 gap-6">
                        <div class="flex flex-row gap-2 text-sm">
                            <span>アカウントを持っていません？</span>
                            <a href="{{route('registration')}}" class="text-sky-600 hover:text-sky-500 underline underline-offset-2">無料会員登録</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20"></div>

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
