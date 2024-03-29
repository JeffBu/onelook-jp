<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
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

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="items-center w-32">
            <div class="font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex flex-col justify-center items-center pt-20 gap-8">
        <div class="flex justify-center items-center w-1/3 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!--modal content-->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!--modal header-->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-bold text-sky-600 dark:text-white">
                            パスワードを変更してログインしてください。
                        </h3>

                    </div>
                    <!--modal body-->
                    <div class="px-8 py-4 space-y-4">
                        <form action="{{route('update-password')}}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{$user->email_verification_token}}">
                            <div class="relative z-0 w-full mb-4 group">
                                <input type="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">新しいパスワード</label>
                            </div>
                            <div class="relative z-0 w-full mb-4 group">
                                <input type="password" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">新しいパスワード（確認用）</label>
                            </div>

                            <div class="relative z-0 w-full mb-4 group">
                                <x-jet-validation-errors class="mb-4" />
                            </div>

                    </div>
                    <!--modal footer-->
                    <div class="flex flex-row justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600 gap-6">
                        <button type="submit" class="text-white bg-sky-600 hover:bg-sky-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400 w-1/5">登録</button>
                    </div>
                    </form>
                </div>
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
