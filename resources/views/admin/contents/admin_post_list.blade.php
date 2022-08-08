@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Post List</title>
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
            <h1 class="text-lg font-semibold text-theme-white">動画リスト</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div onclick="hideMenu()" class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10">
            <div class="text-left w-full">
                <h1 class="text-xl font-semibold text-lime-600">投稿一覧</h1>
            </div>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">選択</th>
                        <th class="px-4 py-1 border border-lime-700">動画名</th>
                        <th class="px-4 py-1 border border-lime-700">投稿者ID</th>
                        <th class="px-4 py-1 border border-lime-700">招待メール</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧数</th>
                        <th class="px-4 py-1 border border-lime-700">投稿日</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧期限</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧URL</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月1日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月4日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">
                            <div class="flex flex-col justify-center items-center gap-3">
                                <a href="{{route('admin-viewer')}}" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">https://www.OneLook.com/Dkakanak123/</a>

                                <div class="flex flex-col sm:flex-row gap-3 w-full">
                                    <button class="container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">詳細</button>
                                    <button class="container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">ダウンロード</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月1日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月4日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">
                            <a href="#" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">https://www.OneLook.com/Dkakanak123/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月1日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">2020年4月4日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">
                            <a href="#" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">https://www.OneLook.com/Dkakanak123/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">ちょっとイリーガルなもの</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700">2021年4月1日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">2020年4月4日10:00</td>
                        <td class="px-4 py-1 border border-lime-700">
                            <a href="#" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">運営により削除されました</a>
                        </td>
                    </tr>
                </tbody>
            </table>

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