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
        <a href="{{route('membership-info')}}" id="membership-info-tab">会員情報</a>
        <a href="#" id="faq-tab">FAQ</a>
    </div>

    <!-- logout -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
    <!-- /logout -->
</header>
<!--header ends here-->
