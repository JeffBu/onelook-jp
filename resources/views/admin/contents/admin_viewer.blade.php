@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Video Viewer</title>
@endsection
@section('extra-styles')
@endsection
@section('content')
<!--content-->
<div class="flex flex-col justify-center items-center w-full">
    <div class="flex justify-between items-center px-4 header-bg h-11 w-full sticky top-0 z-30">
        <div class="flex justify-start items-center gap-8">
            <button id="menu-button" onclick="toggleMenu()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
            <h1 class="text-lg font-semibold text-theme-white">個別投稿</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div onclick="hideMenu()" class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10">
            <div class="text-center text-4xl font-bold text-lime-600 pb-4">山田さんの届出</div>

            <div>
                <img src="{{asset('media/video-playback.png')}}" alt="" class="rounded-lg border border-lime-800 mb-1">
            </div>

            <div class="py-3">
                <span class="text-lime-700 text-lg font-semibold">共有用のURL：https://www.OneLook.com/Dkakanak123</span>
            </div>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">動画名</th>
                        <th class="px-4 py-1 border border-lime-700">投稿者ID</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧数</th>
                        <th class="px-4 py-1 border border-lime-700">タグ</th>
                        <th class="px-4 py-1 border border-lime-700">投稿日</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧期限</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">山田さんの届出</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">チェック,動画</td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月1日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月4日10:00</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-between items-center mt-3 text-left w-full">
                <div></div>

                <div class="flex flex-row gap-3">
                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">月間</button>
                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">累計</button>
                </div>
            </div>

            <div class="pt-32"></div>
        </div>
    </div>
</div>
<!--content ends here-->
@endsection

@section('extra-scripts')
<!--script-->
<script>
    $('#video-list').css('background-color', '#65a30d');
    $('#video-list').css('opacity', '1');

</script>
<!--script ends here-->
@endsection