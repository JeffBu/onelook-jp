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
                <div class="grid lg:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-full h-1/2" id="home">
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

            <div class="grid grid-rows-2 lg:grid-cols-2 justify-center items-start gap-8 w-full pt-14 text-left">
                <div class="w-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-sky-800 font-bold bg-sky-600 text-white text-xl pb-2">お知らせ</h2>
                    <div class="border-b border-x border-sky-800 px-2 py-2 h-64 overflow-auto">
                        <table class="min-w-max w-full text-base">
                            <tbody>
                                @forelse($news as $item)
                                    <tr>
                                        <td id="news-date" class="text-xs">{{$item->created_at->format('Y年m月d日')}}</td>
                                    </tr>
                                    <tr>
                                        <td id="news-label" class="border-b border-sky-800 pb-2">{!!$item->content!!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="news-date" class="text-xs"></td>
                                    </tr>
                                    <tr>
                                        <td id="news-label" class="border-b border-sky-800 pb-2">新しいお知らせはまだありません。</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full h-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-sky-800 font-bold bg-sky-600 text-white text-xl pb-2">投稿履歴</h2>
                    <div class="border-b border-x border-sky-800 px-2 py-2 h-64 overflow-auto">
                        <table class="min-w-max w-full text-base">
                            <tbody>
                                @forelse($history as $item)
                                    <tr>
                                        <td id="news-date" class="text-xs">{{$item->created_at->format('Y年m月d日')}}</td>
                                    </tr>
                                    <tr>
                                        <td id="news-label" class="border-b border-sky-800 pb-2">{!!$item->content!!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="news-date" class="text-xs"></td>
                                    </tr>
                                    <tr>
                                        <td id="news-label" class="border-b border-sky-800 pb-2">新しいお知らせはまだありません。</td>
                                    </tr>
                                @endforelse

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
        $(document).ready(function(){
            $('#home-tab').addClass('active');
            $('#m-home-tab').addClass('active');
        });

        function inquiryAlert() {
            var user_email = "{{auth()->user()->email}}"
            Swal.fire({
                width: '75%',
                title: '登録されたメールアドレスにご連絡いたします。',
                html:
                        '<div class="text-justify">' +
                            '<div class="mb-6">'+
                                '<label for="inquiry-email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">電子メールアドレス</label>'+
                                '<input type="email" id="inquiry-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="'+user_email+'" readonly>'+
                            '</div>'+
                            '<div class="mb-6">'+
                                '<label for="inquiry-content" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">お問い合わせ内容</label>'+
                                '<textarea rows="5" type="text" id="inquiry-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>'+
                            '</div>'+
                        '</div>',
                showCancelButton: true,
                confirmButtonText: '問合せ',
                cancelButtonText: 'キャンセル',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    var reply_to = $('#inquiry-email').val()
                    var inquiry = $('#inquiry-content').val()
                    var url = "{{route('send-inquiry')}}"

                    if(inquiry === null || inquiry === '')
                    {
                        return "error"
                    } else {
                        return axios.post(url, {
                            sender: reply_to,
                            content: inquiry,
                        }).catch((error) => {
                            console.log(error.response.data)
                        })
                    }

                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if(result.isConfirmed)
                {
                    if(result.value === "error") {
                        Swal.fire({
                            icon: 'error',
                            title: '不明なエラーが発生しました。 後でもう一度試してください。'
                        })
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: 'お問い合わせは管理者に送信されました。 ご登録のメールアドレスへの返信をお待ちください。'
                        })
                    }
                }
            })
        }

    </script>
    <!--scripts ends here-->
@endsection
