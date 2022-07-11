@extends('authenticated-user.components.layout')
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-start text-lg w-full">
        <!--<div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>-->
        <div class="flex flex-col w-3/5">

        <div class="flex-1 justify-center items-center pt-16 mt-3">
            <div class="grid :sm:grid-rows-3 md:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-full h-1/2" id="home">
                <div class="flex flex-col items-center text-left gap-10 w-full h-full border border-cyan-600 shadow">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-cyan-600">ムービーの作成</span>
                    <a href="{{route('video-creation')}}" data-tooltip-target="create-toolbar"><svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-theme-orange hover:text-opacity-80" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                    </svg></a>
                    <div id="create-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        ムービーの作成
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <p class="px-4 py-2">簡単に対象ファイルの説明動画を作成することができます。</p>
                </div>

                <div class="flex flex-col items-center text-left gap-10 w-full h-full border border-cyan-600 shadow">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-cyan-600">投稿リスト</span>
                    <a href="{{route('post-list')}}" data-tooltip-target="post-list-toolbar"><svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-theme-orange hover:text-opacity-80" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg></a>
                    <div id="post-list-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        投稿リスト
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <p class="px-4 py-2">過去に作成した動画の一覧です。ここから招待リンクをコピーしたり、閲覧招待メールを直接送ったりすることができます。</p>
                </div>

                <div class="flex flex-col items-center text-left gap-10 w-full h-full border border-cyan-600 shadow">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-cyan-600">問合せ</span>
                    <a href="{{route('post-list')}}" data-tooltip-target="inquiry-toolbar"><svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-theme-orange hover:text-opacity-80" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg></a>
                    <div id="inquiry-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        問合せ
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <p class="px-4 py-2">FAQで対応できないご質問はこちらからお問い合わせください。</p>
                </div>
            </div>
        </div>

        <div class="grid :sm-grid-rows-2 md:grid-cols-2 justify-center items-center gap-8 w-full pt-14 text-left">
            <div class="w-full">
                <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-cyan-800 font-bold bg-cyan-600 text-white text-xl pb-2">お知らせ</h2>
                <div class="border-b border-x border-cyan-800 px-2 py-2">
                    <table class="w-full h-full text-base">
                        <tbody>
                            <tr>
                                <td class="text-xs">2021/10/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">メンテナンスのお知らせ</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2021/01/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">あけましておめでとうございます。</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2020/12/24</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">メリークリスマス</td>
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
                <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-cyan-800 font-bold bg-cyan-600 text-white text-xl pb-2">投稿履歴</h2>
                <div class="border-b border-x border-cyan-800 px-2 py-2">
                    <table class="w-full text-base">
                        <tbody>
                            <tr>
                                <td class="text-xs">2021/10/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">テストが投稿されました。</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2021/01/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">ちょっとイリーガルが運営により削除されました。</td>
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

        </div>
    </div>

    <div class="h-32"></div>
    <!--content ends here-->
@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')
    <script>
        tailwind.config = {
          theme: {
            extend: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'theme-white': '#ffffff',
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
        $(document).ready(function(){
            $('#home-tab').addClass('active');
        });

    </script>

    <!--scripts ends here-->
@endsection
