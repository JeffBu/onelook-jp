<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <h1 class="font-semibold text-theme-white">OneLook</h1>
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
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!--modal header-->
                        <div class="flex justify-center items-center p-5 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-bold text-sky-600 dark:text-white text-center">
                                あなたのパスワードをリセット
                            </h3>

                        </div>
                        <!--modal body-->
                        <div class="px-8 py-4 space-y-4">
                            <form method="POST">
                                @csrf
                                <div class="relative z-0 w-full mb-4 group">
                                    <span class="text-neutral-600">パスワードをお忘れですか？問題ない。メール アドレスをお知らせいただければ、新しいパスワードを選択できるパスワード リセット リンクをメールでお送りします。</span>
                                </div>

                                <div class="relative z-0 w-full mb-4 group">
                                    <input type="email" name="email" id="email" :value="old('email')" class="block py-2.5 px-0 w-full text-sm text-center text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ここにメールアドレスを入力してください</label>
                                </div>

                                <div class="flex flex-col items-center py-6 gap-2 w-full">
                                    <div class="flex flex-col items-end gap-2 w-full">
                                        <button type="submit" class="text-white bg-sky-600 hover:bg-sky-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400 w-full">メールパスワードリセットリンク</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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

        $(document).scroll(function() {})

    </script>
    <!--script ends here-->
</body>
</html>