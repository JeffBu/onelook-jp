<nav id="sidebar" class="hidden lg:flex flex-col px-2 justify-left items-center text-center w-72 nav-bg shadow divide-y divide-theme-white min-h-screen fixed md:sticky top-0 left-0 z-50">
    <div class="flex justify-left px-4 py-6 pt-16 md:pt-6 items-center text-xl font-semibold text-theme-white gap-3 w-full"
    id="sb-app-name">
        {{config('app.name')}}
    </div>

    <div class="py-4 w-full">
        <a href="#" class="flex px-4  py-2 justify-left items-center text-base font-semibold text-theme-white gap-3 w-full" id="user"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
        </svg> ユーザー</a>
    </div>

    <div class="flex flex-col pt-2 gap-2 w-full">
        <a href="{{route('admin-home')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="home"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg> ホーム</a>

        <a href="{{route('admin-member-list')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="member-list"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
        </svg> 会員一覧</a>

        <a href="{{route('admin-post-list')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="video-list"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
        </svg> 動画リスト</a>

        <a href="{{route('admin-posting')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="posting"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
        </svg> お知らせと投稿履歴</a>

        <a href="{{route('admin-settings')}}" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="settings"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
        </svg> 各種設定</a>

        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex px-4 py-2 justify-left items-center text-base font-semibold text-theme-white hover:bg-slate-500 hover:bg-opacity-20 rounded-md gap-3 w-full" id="logout"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg> ログアウト</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</nav>