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
                                    <button class="container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500"
                                    data-modal-toggle="previewModal">詳細</button>
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

<!-- Video Playback Modal -->
<div class="hidden fixed top-0 bottom-0 left-0 right-0 justify-center items-center outline-none overflow-x-hidden overflow-y-auto z-50" id="previewModal">
    <div class="w-11/12 md:w-10/12 lg:w-9/12 xl:w-3/5 h-3/4">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLgLabel">
                    プレビュー
                    </h5>
                    <button type="button"
                    class="flex items-center btn-close box-content rounded-full opacity-60 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-neutral-900 hover:opacity-75 hover:no-underline"
                    data-modal-toggle="previewModal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg></button>
                </div>

                <div class="modal-body relative p-4">
                    <video width="100%" height="400" id="video" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between p-4 border-t border-gray-200 rounded-t-md gap-2">
                    <input type="text" id="comment" class="w-full border-2 px-4 py-2 font-semibold rounded-md border-lime-600 text-left focus:ring-0 focus:outline-0 focus:border-lime-500" cols="30" rows="10" placeholder="コメント">
                    <div class="flex flex-row items-center gap-2 w-2/3">
                        <button class="container px-4 py-2 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">承認</button>
                        <button class="container px-4 py-2 text-theme-white font-medium rounded-md bg-neutral-600 hover:bg-neutral-500">拒否</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Video Playback Modal -->
@endsection

@section('extra-scripts')
<!--script-->
<script>
    $('#video-list').css('background-color', '#65a30d');
    $('#video-list').css('opacity', '1');

    function previewVideo(path) {
        var video = document.querySelector('#video')
        video.src = path
    }

</script>
<!--script ends here-->
@endsection