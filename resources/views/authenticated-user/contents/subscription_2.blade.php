@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Subcriptions</title>
@endsection
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex flex-col justify-center items-center gap-8 w-full">
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-10 pt-20">会員プラン</h1>

        <div class="flex justify-left items-center gap-8 mx-auto w-11/12 sm:w-1/3 lg:w-1/4">
            <span>変更前：</span>
            <span>フリープラン</span>
        </div>

        <div class="flex justify-left items-center gap-8 mx-auto w-11/12 sm:w-1/3 lg:w-1/4">
            <span>変更後：</span>
            <div class="relative inline-block text-left">
                <div>
                  <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 " id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <span id="select_button_text">選択してください</span>
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>

                <div class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" style="display:none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="menu-dropdown">
                  <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-0" onclick="changePlan()">パーソナルプランの申込</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-1" onclick="cancelPlan()">パーソナルプランの解約</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-600 hover:bg-opacity-30" role="menuitem" tabindex="-1" id="menu-item-2" onclick="cancelService()">本サービスの解約</a>
                  </div>
                </div>
            </div>
        </div>

        <!--upgrade plan-->
        <div id="upgrade_plan" class="hidden flex-col justify-center w-11/12 md:w-1/2">
            <div class="flex justify-center items-center mx-auto w-32">
                <a href="{{route('checkout')}}" class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">変更する</a>
            </div>

            <div class="flex flex-col justify-center items-center text-left mt-10">
                <p class="px-4 py-4 text-center">留意点</p>
                <ol class="list-decimal text-left px-4 py-4">
                    <li class="px-4 py-4">
                        パーソナルプランの申込の場合、変更申込日の翌月から料金が課金されます。
                    </li>
                    <li class="px-4 py-4">
                        変更申込以後はパーソナルプランの機能のご利用が可能です。<br>
                        パーソナルプランの解約は、申込日の翌月２日以後から可能です。
                    </li>
                </ol>
            </div>
        </div>

        <!--cancel plan-->
        <div id="cancel_plan" class="hidden flex-col justify-center w-11/12 md:w-1/3">
            <div class="flex justify-center items-center mx-auto w-32">
                <button class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">変更する</button>
            </div>

            <div class="flex flex-col justify-center items-center text-left mt-10">
                <p class="px-4 py-4 text-center">留意点</p>
                <ol class="list-decimal text-left px-4 py-4">
                    <li class="px-4 py-4">
                        パーソナルプランの解約は、パーソナルプランの申込日の翌月２日以降から可能です。
                    </li>
                    <li class="px-4 py-4">
                        パーソナルプランの解約時の料金変更は、パーソナルプランの解約の申込日の翌月以後の請求から反映されます。<br />
                        なお、変更日以後は、新規の動画作成についてのパーソナルプランの機能のご利用はできなくなります。
                    </li>
                </ol>
            </div>
        </div>

        <!--cancel service-->
        <div id="cancel_service" class="hidden flex-col justify-center w-11/12 md:w-1/3">
            <div class="flex justify-center items-center mx-auto w-32">
                <button class="container mt-10 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="planAlert()">変更する</button>
            </div>

            <div class="flex flex-col justify-center items-center text-left mt-10">
                <p class="px-4 py-4 text-center">留意点</p>
                <ol class="list-decimal text-left px-4 py-4">
                    <li class="px-4 py-4">
                        本サービスを解約した場合、すべてのデータおよび情報は、申込時に本サーバーから削除されます。<br />
                        なお、解約日以後は本サービスの機能のご利用はできなくなります。
                    </li>
                    <li class="px-4 py-4">
                        パーソナルプランのご利用者の方は、パーソナルプランの解約後でなければ本サービスの解約できません。
                    </li>
                </ol>
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

        $('#menu-button').click( function () {
            var display = $('#menu-dropdown').css('display')
            if(display === 'none')
            {
                $('#menu-dropdown').css('display', 'block')
            }
            else{
                $('#menu-dropdown').css('display', 'none')
            }
        })

        function changePlan() {
            $('#upgrade_plan').css('display', 'block')
            $('#select_button_text').html('パーソナルプランの申込')
            $('#cancel_service').css('display', 'none')
            $('#cancel_plan').css('display', 'none');
            $('#menu-dropdown').css('display', 'none')
        }

        function cancelPlan() {
            $('#cancel_plan').css('display', 'block')
            $('#select_button_text').html('パーソナルプランの解約')
            $('#cancel_service').css('display', 'none')
            $('#upgrade_plan').css('display', 'none')
            $('#menu-dropdown').css('display', 'none')
        }

        function cancelService() {
            $('#cancel_plan').css('display', 'none')
            $('#select_button_text').html('本サービスの解約')
            $('#upgrade_plan').css('display', 'none')
            $('#cancel_service').css('display', 'block')
            $('#menu-dropdown').css('display', 'none')
        }
    </script>
    <!--script ends here-->
@endsection
