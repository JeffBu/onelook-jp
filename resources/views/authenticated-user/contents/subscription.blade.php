@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Subcriptions</title>
@endsection
@section('css')
    <style>
        .active-cell {
            background: #fef9c3;
            color: #0284c7;
            border: 1px solid;
            border-color: #0284c7;
            property: inherit;
        }

    </style>
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div>
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-8 pt-20">会員プラン</h1>
    </div>
    <div class="flex justify-center items-center w-full">

        <table class="text-center w-11/12 md:w-3/5 border border-sky-700" id="membership-info-table">
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
                    <td class="px-3 py-3 active-cell">無料</td>
                    <td class="px-3 py-3 border border-cyan-600">300円</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">最大録画時間</td>
                    <td class="px-3 py-3 active-cell">5分</td>
                    <td class="px-3 py-3 border border-cyan-600">15分</td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border border-cyan-600">月間の作成件数</td>
                    <td class="px-3 py-3 active-cell">5件</td>
                    <td class="px-3 py-3 border border-cyan-600">100件</td>
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
        </table>

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