<!--header-->
<header class="flex bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50 shadow"
id="header-frame">

    <button onclick="openSidebar()" class="flex md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white hover:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="hidden md:flex items-center w-32">
        <a href="{{route('dashboard')}}" class="font-semibold text-theme-white text-xl">{{config('app.name')}}</a>
    </div>

    <div class="hidden md:flex justify-center items-start gap-8 py-6 font-small text-sm font-bold text-theme-white w-full">
        <a href="{{route('dashboard')}}" id="home-tab">ホーム</a>
        <a href="{{route('video-creation')}}" onclick="window.open('{{route('video-creation')}}', 'newwindow', 'width=883, height=584, top=40, left=80'); return false;" id="video-maker-tab">ムービー作成</a>
        <a href="{{route('post-list')}}" id="post-list-tab">投稿リスト</a>
        <a href="{{route('membership-info')}}" id="membership-info-tab">会員情報</a>
        <a href="{{route('faq')}}" id="faq-tab">FAQ</a>
    </div>

    <!-- logout -->
    <div class="flex justify-end items-center w-32">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="font-semibold text-sm text-white hover:text-yellow-300">
            ログアウト
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
    <!-- /logout -->
</header>

<aside class="hidden md:invisible flex-col justify-center items-center bg-black bg-opacity-20 min-h-screen tracking-widest fixed left-0 top-0 z-20 w-full shadow"
id="bg-sidebar" onclick="openSidebar()">
    <div class="bg-sky-600 min-h-screen w-0" id="sidebar">
        <div class="justify-center items-center text-center px-4 py-2 mt-11 w-full">
            <div class="font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

        <div class="flex flex-col justify-center items-center py-2 font-small text-center text-sm font-bold text-theme-white w-full divide-y divide-opacity-25 divide-white">
            <a href="{{route('dashboard')}}" id="home-tab" class="px-4 py-2 w-full hover:text-yellow-300 hover:bg-neutral-600 hover:bg-opacity-10">ホーム</a>
            <a href="{{route('video-creation')}}" id="video-maker-tab" class="px-4 py-2 w-full hover:text-yellow-300 hover:bg-neutral-600 hover:bg-opacity-10">ムービー作成</a>
            <a href="{{route('post-list')}}" id="post-list-tab" class="px-4 py-2 w-full hover:text-yellow-300 hover:bg-neutral-600 hover:bg-opacity-10">投稿リスト</a>
            <a href="{{route('membership-info')}}" id="membership-info-tab" class="px-4 py-2 w-full hover:text-yellow-300 hover:bg-neutral-600 hover:bg-opacity-10">会員情報</a>
            <a href="#" id="faq-tab" class="px-4 py-2 w-full hover:text-yellow-300 hover:bg-neutral-600 hover:bg-opacity-10">FAQ</a>
        </div>
    </div>
</aside>

<script>
    function openSidebar() {
        jQuery('#bg-sidebar').toggle();
        jQuery('#sidebar').css('width', '65%');
        jQuery('#sidebar').css('transition', 'width 1s');
    }
</script>
<!--header ends here-->
