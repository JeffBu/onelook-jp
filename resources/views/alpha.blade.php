<!DOCTYPE html>
<html lang="en" class="scroll-smooth font-sans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <style>
        .bg-custom
        {
            background-image: url('{{asset("media/img/cards-bg.png")}}');
            background-repeat: no-repeat;

        }

    </style>

</head>
<body class="bg-custom bg-fixed bg-cover text-yellow-50">
    <header class="flex flex-row bg-neutral-900 justify-between items-center py-5 px-5 h-16 text-sm tracking-widest fixed w-full z-50" id="header_frame">
        <a href="http://127.0.0.1:8000/dashboard" class="">
            <img src="{{asset('media/img/alpha-logo.png')}}" alt="alpha" class="h-10">
        </a>

        <div class="text-xl font-bold">Room Name</div>

        <div class="flex gap-6 items-center">
            <div class="gap-3 items-center hidden xl:flex">
                <img src="{{asset('media/img/alpha-coin.png')}}" alt="" class="h-5">
                <p class="font-semibold" id="wallet">1,000,000</p>
            </div>
            <div class="hidden xl:flex">
                <div class="flex items-center gap-3 cursor-pointer" id="user">
                    <img src="{{asset('media/img/user-logo.png')}}" alt="user-logo" class="h-6 w-6 rounded-full bg-neutral-900">
                    <p id="" class="font-semibold">zombakel</p>
                </div>
                <div class="hidden items-center border-2 border-neutral-700 hover:border-neutral-600 hover:bg-neutral-700 bg-neutral-800 justify-center mt-10 w-28 px-2 cursor-pointer absolute"
                id="logout">
                    <a href="#" class="py-2 flex justify-center gap-2">Log Out <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <button class="flex cursor-pointer xl:hidden 2xl:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                    id="menu">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="justify-center bg-neutral-800 w-60 font-semi-bold rounded-md right-5 top-14 fixed hidden border border-neutral-700"
                id="nav-menu">
                    <nav class="w-full text-left">
                        <div class="flex gap-3 items-center mt-2 py-2 px-5 border-b-neutral-700 border-b">
                            <img src="{{asset('media/img/user-logo.png')}}" alt="" class="h-5 w-5 bg-neutral-900 rounded-full">
                            <p class="font-semibold">zombakel</p>
                        </div>
                        <div class="flex gap-3 items-center py-2 px-5 border-b-neutral-700 border-b">
                            <img src="{{asset('media/img/alpha-coin.png')}}" alt="" class="h-5">
                            <p class="font-semibold">1,000,000</p>
                        </div>

                        <div class="shadow mt-4">
                            <div class="list-none flex flex-wrap items-center">
                                <h3 class="flex flex-1 px-5 py-2 font-semibold">Account</h3>
                            </div>
                            <div class="items-center">
                                <a href="#" class="block px-10 py-2 w-full hover:bg-neutral-700 border-b-neutral-700 border-b">My Coins / Wallet</a>
                                <a href="#" class="block px-10 py-2 w-full hover:bg-neutral-700 border-b-neutral-700 border-b">My Profile</a>
                                <a href="#" class="flex gap-2 px-10 py-2 w-full hover:bg-neutral-700">Log Out <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="list-none flex flex-wrap items-center">
                                <h3 class="flex flex-1 px-5 py-2 font-semibold">Support</h3>
                            </div>
                            <div class="list-none flex flex-wrap items-center hover:bg-neutral-700">
                                <a href="#" class="block px-10 py-2 w-full hover:bg-neutral-700">Chat with us</a>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>

        </div>
    </header>

    <div class="flex w-full justify-center pl-64">
    <!--sidebar-->
        <div class="justify-center bg-neutral-900 bg-opacity-80 w-64 font-semi-bold min-h-screen left-0 fixed hidden xl:flex">
            <nav class="flex flex-col mt-5 pt-14 w-64 text-left px-4 gap-4">
                <div class="bg-neutral-700 border border-neutral-600 rounded-lg">
                    <h3 class="pl-5 pr-4 py-2 font-semibold bg-neutral-800 rounded-t-lg">Account</h3>
                    <div class="divide-y divide-neutral-600">
                        <a href="http://127.0.0.1:8000/coins-wallet" class="block pl-10 pr-4 py-2 hover:bg-neutral-600">My Coins / Cash-in</a>
                        <a href="#" class="block pl-10 pr-4 py-2 hover:bg-neutral-600">My Profile</a>
                    </div>
                </div>
                <div class="bg-neutral-700 border border-neutral-600 rounded-lg">
                    <div class="bg-neutral-800 rounded-t-lg">
                        <h3 class="px-5 py-2 font-semibold">Support</h3>
                    </div>
                    <div class="divide-y divide-neutral-600">
                        <a href="#" class="block px-10 py-2 hover:bg-neutral-600">Chat with us</a>
                    </div>
                </div>
            </nav>

        </div>

    <!--content-->

        <div class="flex-1 m-5 pt-14 text-xl font-semi-bold w-full px-4 py-2">
            <div class="flex items-center gap-5 text-xl font-semibold w-full justify-center px-4 py-2 bg-neutral-900 rounded-lg border border-neutral-600">
                <a href="#" class="hover:text-orange-400 text-yellow-50" id="tabs-sabong">Sabong</a>
                <a href="#" class="hover:text-orange-400 text-yellow-50" id="tabs-baccarat">Baccarat</a>
                <div></div>
            </div>
            <!--sabong-->
            <div id="content-sabong">
                <div class="grid col grid-cols-2 gap-8 px-5 py-5">

                    @forelse ($gamerooms as $gameroom)
                        @if ($gameroom->game_id == 1)
                            <a href="" class="hover:-m-0.5">
                                {{-- <div width="640" height="480"
                                class="rounded-lg hover:border-2 hover:border-orange-400 -m-0.5 p-0.5" >
                                    <div id="stream-sm-2" class="w-full"></div>
                                </div> --}}

                                <video src="{{asset('media/videos/casino-trailer.mp4')}}" width="640" height="480" autoplay muted loop id="video"
                                class="rounded-lg hover:border-2 hover:border-orange-400 -m-0.5 p-0.5">
                                    <source src="/videos/casino-trailer.mp4" type="video/mp4">
                                </video>
                            </a>
                        @endif
                    @empty

                    @endforelse

                </div>


            </div>
            <!--sabong-->

            <!--baccarat-->
            <div id="content-baccarat" class="hidden">
                <div class="grid col grid-cols-2 gap-10 py-5">

                    @forelse ($gamerooms as $gameroom)
                        @if ($gameroom->game_id == 2)
                            <a href="{{route('play-baccarat', ['game_id' =>  1])}}" class="hover:-m-0.5">
                                {{-- <div width="640" height="480"
                                class="rounded-lg hover:border-2 hover:border-orange-400 -m-0.5 p-0.5" >
                                    <div id="stream-sm-2" class="w-full"></div>
                                </div> --}}

                                <video src="{{asset('media/videos/casino-trailer.mp4')}}" width="640" height="480" autoplay muted loop id="video"
                                class="rounded-lg hover:border-2 hover:border-orange-400 -m-0.5 p-0.5">
                                    <source src="/videos/casino-trailer.mp4" type="video/mp4">
                                </video>
                            </a>
                        @endif
                    @empty

                    @endforelse

                </div>
            </div>
            <!--baccarat-->
        </div>
    </div>

    <!--scripts-->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        jQuery('#tabs-baccarat').on('click' , function() {
                $('#content-baccarat').show();
                $('#content-sabong').hide();
        });
        jQuery('#tabs-sabong').on('click' , function() {
                $('#content-sabong').show();
                $('#content-baccarat').hide();
        });

        $(document).ready(function(){
            $('#tabs-sabong').css('color', '#fb923c');
            
            jQuery('#tabs-sabong').on('click', function() {
                $('#tabs-sabong').css('color', '#fb923c');
                $('#tabs-baccarat').css('color', '#fffbeb');
            });

            jQuery('#tabs-baccarat').on('click', function() {
                $('#tabs-baccarat').css('color', '#fb923c');
                $('#tabs-sabong').css('color', '#fffbeb');
            });
        });


        jQuery('#user').on('click', function() {
            $('#logout').toggle();
        });

        jQuery('#menu').on('click', function() {
            $('#nav-menu').toggle();
        });

        $(document).click(function() {})

        var options = {
            muted: true,
            controls: false,
            autoplay: false,
            width: '100%',
            height: 280,
            channel: 'Kyedae',
            parent: ["localhost", "online-casino.test"]
        };
        var player = new Twitch.Player("stream-sm", options);
    </script>

    <!--scripts ends here-->
</body>
</html>
