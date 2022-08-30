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
            <div class="grid lg:grid-cols-3 justify-center items-center scroll-mt-24 gap-6 w-3/4 h-1/2" id="home">
                <!-- free plan -->
                <div class="flex flex-col items-center text-left text-sm gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                    <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">フリープラン</span>
                    
                    <div class="flex flex-row w-full justify-between items-center px-4">
                        <span>現在のプラン</span>
                        <div class="text-sky-600">
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
                        <div class="hidden text-sky-600">
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

            Swal.fire({
                title: 'ビジネスプランのご相談',
                text: '申請検討ありがとうございます。こちらを送信いただけましたらご登録者様宛に当社担当よりご連絡を申し上げます。貴社のご希望の使用イメージなどございましたらご記入いただけますとスムーズです。よろしくお願いいたします。',
                input: 'email',
                inputPlaceholder: 'ご連絡先のメールアドレス',
                showCancelButton: true,
                confirmButtonText: '送信',
                cancelButtonText: 'キャンセル',
            })
        }

        $('table#membership-info-table tbody td:nth-child(1)').addClass('px-8 font-semibold text-left text-neutral-600')

    </script>
    <!--script ends here-->
@endsection