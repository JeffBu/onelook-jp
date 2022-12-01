@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Subcriptions</title>
@endsection
@section('css')
    <style>
        .active-plan {
            background: #fef9c3;
        }
    </style>
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div>
        <h1 class="text-center text-2xl font-bold text-sky-600 pb-8 pt-20">会員プラン</h1>
    </div>

    <div class="flex flex-col justify-center items-center w-full gap-8">
        <div class="flex flex-col justify-center items-center w-full gap-8">
            <div class="grid lg:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-3/4 h-1/2">
                <!-- free plan -->
                <div class="flex flex-col items-center text-left text-sm gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">フリープラン</span>
                    
                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>現在のプラン</span>
                        <div class="text-sky-600 @if(auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") hidden @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>月額料金</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>最大録画時間</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>月間の作成件数</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>ダウンロード<br>（mp4ファイル）</span>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>ストレージサービス<br>（クラウドでの保管・閲覧）</span>
                        <span class="text-sky-600">3日</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>広告</span>
                        <span class="text-sky-600">あり</span>
                    </div>

                    <a href="{{route('update-cancel-plan')}}" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">プラン変更</a>
                </div>

                <!-- personal plan -->
                <div class="flex flex-col items-center text-left text-sm gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">パーソナルプラン</span>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>現在のプラン</span>
                        <div class="@if((auth()->user()->subscription) && (auth()->user()->subscription->stripe_status == "active")) @else hidden @endif text-sky-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>月額料金</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>最大録画時間</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>月間の作成件数</span>
                        <span class="text-sky-600">-</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>ダウンロード<br>（mp4ファイル）</span>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 01M12 01M16 01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>ストレージサービス<br>（クラウドでの保管・閲覧）</span>
                        <span class="text-sky-600">7日</span>
                    </div>

                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>広告</span>
                        <span class="text-sky-600">なし</span>
                    </div>

                    <a href="{{route('update-cancel-plan')}}" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">プラン変更</a>
                </div>

                <!-- custom plan -->
                <div class="flex flex-col justify-between items-center text-left gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">ビジネスプラン</span>
                    <div class="flex flex-col w-full items-center px-4">
                        <span>自社専用OneLookの構築プランです。 自社管理者用の画面の追加、セキュリティ強化、保管期限の延長などのカスタムプランもご相談ください</span>
                    </div>
                    <a href="#" class="my-4 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">ビジネスプラン ご相談</a>
                </div>
            </div>
        </div>

        <!-- <table class="text-center w-11/12 md:w-3/5 border border-sky-700" id="membership-info-table">
            <thead class="bg-cyan-600 text-theme-white">
                <tr>
                    <th class="px-3 py-3 border-x border-sky-700"></th>
                    <th class="px-3 py-3 active-header">フリープラン</th>
                    <th class="px-3 py-3 border-x border-sky-700">パーソナルプラン</th>
                    <th class="px-3 py-3 border-x border-sky-700">ビジネスプラン</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-3 border border-cyan-600 text-left">現在のプラン</td>
                    <td class="px-3 py-3 active-cell">
                        <div class="flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </td>
                    <td class="px-3 py-3 border border-cyan-600"></td>
                    <td rowspan="7" class="px-3 py-3 border border-cyan-600 w-1/4">
                        <div class="flex-1 justify-center items-center text-center">
                            <span>自社専用OneLookの構築プランです。 自社管理者用の画面の追加、セキュリティ強化、保管期限の延長などのカスタムプランもご相談ください</span>
                            <button class="container mt-16 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">ビジネスプラン ご相談</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">月額料金</td>
                    <td class="px-3 py-3 active-cell"><span class="hidden">無料</span></td>
                    <td class="px-3 py-3 border border-cyan-600"><span class="hidden">300円</span></td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">最大録画時間</td>
                    <td class="px-3 py-3 active-cell"><span class="hidden">5分</span></td>
                    <td class="px-3 py-3 border border-cyan-600"><span class="hidden">15分</span></td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">月間の作成件数</td>
                    <td class="px-3 py-3 active-cell"><span class="hidden">5件</span></td>
                    <td class="px-3 py-3 border border-cyan-600"><span class="hidden">100件</span></td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">ダウンロード<br>（mp4ファイル）</td>
                    <td class="px-3 py-3 active-cell"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg></td>
                    <td class="px-3 py-3 border border-cyan-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 01M12 01M16 01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg></td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">ストレージサービス<br>（クラウドでの保管・閲覧）</td>
                    <td class="px-3 py-3 active-cell">3日</td>
                    <td class="px-3 py-3 border border-cyan-600">7日</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">広告</td>
                    <td class="px-3 py-3 active-cell">あり</td>
                    <td class="px-3 py-3 border border-cyan-600">なし</td>
                </tr>

                <tr>
                    <td colspan="4" class="border border-theme-white">
                        <div class="flex justify-center items-center text-center mt-8">
                            <a href="{{route('update-cancel-plan')}}" class="px-4 py-2 bg-theme-yellow font-semibold text-theme-white hover:bg-yellow-300 rounded-md w-32">プラン変更</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> -->

    </div>

    <div class="pt-40"></div>
    <!--content ends here-->
@endsection

@section('js')
    <!--script-->
    <script>
        jQuery(document).ready(function() {
            $('#membership-info-tab').addClass('active');
            $('#m-membership-info-tab').addClass('active');
        });

        function planAlert(){
            var user_email = "{{auth()->user()->email}}"
            Swal.fire({
                width: '70%',
                title: '<div style="display: flex; justify-content: center;" class="p-4 mb-4 text-base rounded-lg " role="alert"><span style="display: block; text-align: left; width: fit-content;" class="font-medium"><b>ご希望される使い方などをお送りください。<br>担当者からご連絡いたします。<b></span></div>',
                html:   '<div class="text-justify mt-8">' +
                            '<div class="mb-6">'+
                                '<label for="inquiry-email" class="block mb-2 text-sm font-medium text-gray-900">電子メールアドレス</label>'+
                                '<input type="email" id="inquiry-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="'+user_email+'" readonly>'+
                            '</div>'+
                            '<div class="mb-6">'+
                                '<label for="inquiry-content" class="block mb-2 text-sm font-medium text-gray-900">お問い合わせ内容</label>'+
                                '<textarea rows="5" type="text" id="inquiry-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>'+
                            '</div>'+
                        '</div>',
                showCancelButton: true,
                confirmButtonText: '送信',
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
            })
        }

        $('table#membership-info-table tbody td:nth-child(1)').addClass('px-8 font-semibold text-left text-neutral-600')

    </script>
    <!--script ends here-->
@endsection
