@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Subcriptions</title>
@endsection
@section('css')
<style>
    select option:disabled {
    background-color: rgb(233, 233, 233);
}
</style>
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')

    <!--content-->
    <div class="flex flex-col justify-center items-center gap-8 w-full">
        <h1 class="text-center text-2xl font-bold text-cyan-600 pb-10 pt-20">会員プラン</h1>

        <div class="grid grid-cols-1 gap-4">
            <div class="grid grid-cols-2 gap-4">
                <div>変更前：</div>
             
                <div>@if(auth()->user()->subscription) パーソナルプラン @else フリープラン @endif</div>
            </div>
            <div class="grid grid-cols-2 gap-1">
                <div>変更後：</div>
                <div>
                    <select id="select_plan" class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option value="_defaul" selected>選択する...</option>
                            <option value="personal_application" @if(auth()->user()->subscription) disabled @endif>パーソナルプランの申込</option>
                            <option value="cancel_personal_plan" @if(!auth()->user()->subscription) disabled @endif>パーソナルプランの解約</option>
                            <option value="cancel_service">本サービスの解約</option>
                    </select>
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
            Swal.fire({
                html: `<div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
                        <h4 class="text-2xl font-medium leading-tight mb-2">留意点</h4>
                            <p class="mb-4 text-left">
                                1. パーソナルプランの申込の場合、変更申込日の翌月から料金が課金されます。
                            </p>
                            <p class="mb-4 text-left">
                                2. 変更申込以後はパーソナルプランの機能のご利用が可能です。 パーソナルプランの解約は、申込日の翌月２日以後から可能です。
                            </p>
                        </div>`,  
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmation'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "checkout";
                }else{
                    changeSelected();
                }
            });
        }

        function cancelPlan() {

            Swal.fire({
                html: `<div class="bg-red-100 rounded-lg py-5 px-3 text-base text-red-700" role="alert">
                        <h4 class="text-2xl font-medium leading-tight text-center">留意点 </h4>
                            <ol class="list-decimal text-left px-4 py-4">
                                <li>
                                    現在のサブスクリプションは <b>(パーソナルプラン)</b>. <br>
                                    あなたが持っている `+ {{$noOfDaysLeft}} + ` 現在の有料プランの有効期限が切れるまであと 1 日です。
                                </li>
                                <li>
                                    パーソナルプランの解約は、パーソナルプランの申込日の翌月２日以降から可能です。
                                </li>
                                <li>
                                    パーソナルプランの解約時の料金変更は、パーソナルプランの解約の申込日の翌月以後の請求から反映されます。 なお、変更日以後は、新規の動画作成についてのパーソナルプランの機能のご利用はできなくなります。
                                </li>
                            </ol>
                        </div>`,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Confirm'
                }).then((result) => {
                if (result.isConfirmed) {
                    cancelSubscription({{$user->id}});
                }else{
                    changeSelected();
                }
            });
        }

        const changeSelected = (e) => {
            const $select = document.querySelector('#select_plan');
            $select.value = '_defaul';
        };

        function cancelService() {

            Swal.fire({
                html: `<div class="bg-red-100 rounded-lg py-5 px-3 text-base text-red-700" role="alert">
                        <h4 class="text-2xl font-medium leading-tight text-center">留意点 </h4>
                            <ol class="list-decimal text-left px-4 py-4">
                                <li>
                                    本サービスを解約した場合、すべてのデータおよび情報は、申込時に本サーバーから削除されます。 なお、解約日以後は本サービスの機能のご利用はできなくなります。
                                </li>
                                <li>
                                    パーソナルプランのご利用者の方は、パーソナルプランの解約後でなければ本サービスの解約できません。
                                </li>
                            </ol>
                        </div>`,  
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmation'
                }).then((result) => {
                if (result.isConfirmed) {
                    planAlert();
                }else{
                    changeSelected();
                }
            });
        }

        function cancelSubscription(id)
        {
            var url = "{{route('cancel-subscription')}}"
            axios.post(url, {
                user_id: id
            }).then(function (response) {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: 'パーソナルプランの解約を致しました'
                }).then((result) => {
                    window.location.reload();
                })
            }).catch(function (error) {
                Swal.fire({
                    icon: 'warning',
                    title: 'エラー',
                    text: 'パーソナルプラン解約処理が規定時間に完了しませんでした。お時間をおいて、もう一度解約お手続をOKお願い致します。',
                })
            })
        }
        $('#select_plan').on('change', function() {
            if($(this).find(":selected").val() == 'personal_application'){
                changePlan();
            }else if($(this).find(":selected").val() == 'cancel_personal_plan'){
                cancelPlan();
            }else if($(this).find(":selected").val() == 'cancel_service'){
                cancelService();
            }
        });
    </script>
    <!--script ends here-->
@endsection
