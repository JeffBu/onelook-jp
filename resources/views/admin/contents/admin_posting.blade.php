@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Posting</title>
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
            <h1 class="text-lg font-semibold text-theme-white">お知らせと投稿履歴</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div onclick="hideMenu()" class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10 gap-8">
            <div class="flex flex-col justify-center items-center w-full z-10 gap-4">
                <div class="text-left w-full">
                    <h1 class="text-xl font-semibold text-lime-600">お知らせ</h1>
                </div>

                <div class="justify-center items-center w-full">
                    <textarea name="news" id="news" class="w-full h-48 border-2 px-4 py-4 font-semibold rounded-md border-lime-600 text-left focus:ring-0 focus:outline-0 focus:border-lime-500" cols="30" rows="10" placeholder="ここにメッセージを入力"></textarea>
                </div>

                <div class="flex justify-between text-left w-full">
                    <div></div>
                    <div>
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">公開</button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center items-center w-full z-10 gap-4">
                <div class="text-left w-full">
                    <h1 class="text-xl font-semibold text-lime-600">投稿履歴</h1>
                </div>

                <div class="justify-center items-center w-full">
                    <textarea name="announcement" id="announcement" class="w-full h-48 border-2 px-4 py-4 font-semibold rounded-md border-lime-600 text-left focus:ring-0 focus:outline-0 focus:border-lime-500" cols="30" rows="10" placeholder="ここにメッセージを入力"></textarea>
                </div>

                <div class="flex justify-between text-left w-full">
                    <div></div>
                    <div>
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">公開</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-rows-2 lg:grid-cols-2 justify-center items-start gap-8 w-full pt-14 text-left">
                <div class="w-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-lime-600 font-bold bg-lime-600 text-white text-xl pb-2">お知らせ</h2>
                    <div class="border-b border-x border-lime-600 px-2 py-2">
                        <table class="w-full h-full text-base">
                            <tbody>
                                <tr>
                                    <td class="text-xs">2021/10/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-lime-600 pb-2">メンテナンスのお知らせ</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2021/01/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-lime-600 pb-2">あけましておめでとうございます。</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2020/12/24</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-lime-600 pb-2">メリークリスマス</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2020/10/31</td>
                                </tr>
                                <tr>
                                    <td>ハッピーハロウィン</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full h-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-lime-600 font-bold bg-lime-600 text-white text-xl pb-2">投稿履歴</h2>
                    <div class="border-b border-x border-lime-600 px-2 py-2">
                        <table class="w-full text-base">
                            <tbody>
                                <tr>
                                    <td class="text-xs">2021/10/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-lime-600 pb-2">テストが投稿されました。</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2021/01/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-lime-600 pb-2">ちょっとイリーガルが運営により削除されました。</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2020/12/30</td>
                                </tr>
                                <tr>
                                    <td>ちょっとイリーガルについて、お知らせがありますので、メールをご確認ください。</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    $('#posting').css('background-color', '#65a30d');
    $('#posting').css('opacity', '1');

</script>
<!--script ends here-->
@endsection