@extends('authenticated-user.components.layout')
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-start text-lg pt-4 w-full">
        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>

        <div class="flex-1 justify-center items-center px-8 pt-20 mt-3">
            <div class="scroll-mt-24" id="home">
                <div class="flex items-center text-left gap-10 px-10 w-full border border-cyan-800 h-28 rounded-md">
                    <a href="{{route('video-creation')}}"><img src="{{asset('media/3.png')}}" alt="" class="h-14 cursor-pointer" data-tooltip-target="create-toolbar"></a>
                    <div id="create-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        ムービーの作成
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <p>簡単に対象ファイルの説明動画を作成することができます。</p>
                </div>

                <div class="flex items-center text-left gap-10 px-10 mt-8 border border-cyan-800 h-28 rounded-md">
                    <a href="{{route('post-list')}}"><img src="{{asset('media/4.png')}}" alt="" class="h-14 cursor-pointer" data-tooltip-target="post-list-toolbar"></a>
                    <div id="post-list-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        投稿リスト
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <p>過去に作成した動画の一覧です。ここから招待リンクをコピーしたり、閲覧招待メールを直接送ったりすることができます。</p>
                </div>

                <div class="flex items-center text-left gap-10 px-10 mt-8 w-full border border-cyan-800 h-28 rounded-md">
                    <div>
                        <img src="{{asset('media/5.png')}}" alt="" class="h-14 cursor-pointer" data-tooltip-target="inquiry-toolbar">
                        <div id="inquiry-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                            問合せ
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <p>FAQで対応できないご質問はこちらからお問い合わせください。</p>
                </div>
            </div>
            <div>
                <div class="mt-96"></div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left">
            <div class="w-full">
                <div class="font-bold text-cyan-600 text-center text-xl pb-2">お知らせ</div>
                <div class="border border-cyan-800 rounded-md px-2 py-2">
                    <table class="w-full text-base">
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

            <div class="w-full">
                <div class="font-bold text-cyan-600 text-center text-xl pb-2">投稿履歴</div>
                <div class="border border-cyan-800 rounded-md px-2 py-2">
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
                    'theme-white': '#f6f6e9',
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
