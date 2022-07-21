@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Home</title>
@endsection
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-start text-lg w-full">
        <div class="flex flex-col w-3/5">
            <div class="flex-1 justify-center items-center pt-16 mt-3">
                <div class="grid sm:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-full h-1/2" id="home">
                    <a href="{{route('video-creation')}}" onclick="window.open('{{route('video-creation')}}', 'newwindow', 'width=883, height=584, top=40, left=80'); return false;" class="flex flex-col items-center text-left gap-10 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">ムービーの作成</span>
                        <img src="{{asset('media/video-editing.png')}}" alt="Video Creation Icon" data-tooltip-target="create-toolbar" class="h-32 w-32">
                        <div id="create-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                            ムービーの作成
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <p class="px-4 py-2">簡単に対象ファイルの説明動画を作成することができます。</p>
                    </a>

                    <a href="{{route('post-list')}}" class="flex flex-col items-center text-left gap-10 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">投稿リスト</span>
                        <img src="{{asset('media/video-list.png')}}" alt="Video List Icon" data-tooltip-target="post-list-toolbar" class="h-32 w-32">
                        <div id="post-list-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                            投稿リスト
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <p class="px-4 py-2">過去に作成した動画の一覧です。ここから招待リンクをコピーしたり、閲覧招待メールを直接送ったりすることができます。</p>
                    </a>

                    <button onclick="inquiryAlert()" class="flex flex-col items-center text-left gap-10 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">問合せ</span>
                        <img src="{{asset('media/q&a.png')}}" alt="" data-tooltip-target="inquiry-toolbar" class="h-32 w-32">
                        <div id="inquiry-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                            問合せ
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <p class="px-4 py-2">FAQで対応できないご質問はこちらからお問い合わせください。</p>
                    </a>
                </div>
            </div>

            <div class="grid :sm-grid-rows-2 md:grid-cols-2 justify-center items-center gap-8 w-full pt-14 text-left">
                <div class="w-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-sky-800 font-bold bg-sky-600 text-white text-xl pb-2">お知らせ</h2>
                    <div class="border-b border-x border-sky-800 px-2 py-2">
                        <table class="w-full h-full text-base">
                            <tbody>
                                <tr>
                                    <td class="text-xs">2021/10/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-sky-800 pb-2">メンテナンスのお知らせ</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2021/01/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-sky-800 pb-2">あけましておめでとうございます。</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2020/12/24</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-sky-800 pb-2">メリークリスマス</td>
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
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-sky-800 font-bold bg-sky-600 text-white text-xl pb-2">投稿履歴</h2>
                    <div class="border-b border-x border-sky-800 px-2 py-2">
                        <table class="w-full text-base">
                            <tbody>
                                <tr>
                                    <td class="text-xs">2021/10/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-sky-800 pb-2">テストが投稿されました。</td>
                                </tr>
                                <tr>
                                    <td class="text-xs pt-2">2021/01/01</td>
                                </tr>
                                <tr>
                                    <td class="border-b border-sky-800 pb-2">ちょっとイリーガルが運営により削除されました。</td>
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

    function inquiryAlert() {
        Swal.fire({
            title: 'お問合せ',
            text: '登録されたメールアドレスにご連絡いたします。',
            input: 'email',
            inputPlaceholder: '問合せ内容をご記入ください',
            showCancelButton: true,
            confirmButtonText: '問合せ',
            cancelButtonText: 'キャンセル',
        }).then((result) => {
            if(result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: '送信完了しました。後日担当からメールします。',
                })
            }
        })
    }

    </script>

    <!--scripts ends here-->
@endsection
