<!--header-->
<header class="flex bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50 shadow"
id="header-frame">

    <button onclick="toggleSidebar()" class="flex md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white hover:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="hidden md:flex items-center w-32">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('media/logos/2.png')}}" alt="onelook_logo" class="h-11 mt-1">
        </a>
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
<!--header ends here-->

<!--aside-->
<div class="hidden md:invisible bg-black bg-opacity-20 w-full min-h-screen fixed top-0 bottom-0 left-0 right-0" id="bg-sidebar" onclick="toggleSidebar()"></div>

<aside class="hidden md:invisible flex-col justify-center items-center min-h-screen tracking-widest fixed left-0 top-0 z-20 w-72 shadow"
id="sidebar">
    <div class="bg-sky-600 min-h-screen w-72">
        <div class="justify-center items-center text-center px-4 py-2 mt-11 w-full">
            <div class="font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

        <div class="flex flex-col justify-center items-center py-2 font-small text-center text-sm font-bold text-theme-white w-full divide-y divide-opacity-25 divide-white">
            <a href="{{route('dashboard')}}" id="m-home-tab" class="px-4 py-2 w-full  hover:bg-neutral-600 hover:bg-opacity-10">ホーム</a>
            <a href="{{route('video-creation')}}" onclick="window.open('{{route('video-creation')}}', 'newwindow', 'width=883, height=584, top=40, left=80'); return false;" id="m-video-maker-tab" class="px-4 py-2 w-full  hover:bg-neutral-600 hover:bg-opacity-10">ムービー作成</a>
            <a href="{{route('post-list')}}" id="m-post-list-tab" class="px-4 py-2 w-full  hover:bg-neutral-600 hover:bg-opacity-10">投稿リスト</a>
            <a href="{{route('membership-info')}}" id="m-membership-info-tab" class="px-4 py-2 w-full  hover:bg-neutral-600 hover:bg-opacity-10">会員情報</a>
            <a href="{{route('faq')}}" id="m-faq-tab" class="px-4 py-2 w-full  hover:bg-neutral-600 hover:bg-opacity-10">FAQ</a>
        </div>
    </div>
</aside>
<!--aside ends here-->

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

    function toggleSidebar() {
        jQuery('#sidebar').animate({
            width: 'toggle'
        });

        jQuery('#bg-sidebar').fadeToggle();
    }
</script>
<!--header ends here-->
