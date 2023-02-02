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
        <table>
            <tr>
                <td>
                    変更前：
                </td>
                <td>
                    <input hidden id="txtSubscribed" type="text" value="@if(auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") personal_plan @else free_plan @endif">
                <div>@if((auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") && auth()->user()->subscription->stripe_price ==  env('STRIPE_PRICE_MONTHLY_KEY')) パーソナルプラン (毎月) @elseif(auth()->user()->subscription && auth()->user()->subscription->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')) パーソナルプラン (通年) @else フリープラン @endif</div>
                 </td>
            </tr>
            <tr>
                <td>
                    変更後：
                </td>
                <td>
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
                            {{-- <option value="personal_application" @if(auth()->user()->subscription) disabled @endif>パーソナルプランの申込</option> --}}
                            <option value="personal_application_monthly" @if((auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") && auth()->user()->subscription->stripe_price ==  env('STRIPE_PRICE_MONTHLY_KEY')) disabled @endif>パーソナルプラン申し込み（月額）</option>
                            <option value="personal_application_annual" @if((auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") && auth()->user()->subscription->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')) disabled @endif>パーソナルプランのお申し込み（年間）</option> 
                            <option value="cancel_personal_plan" @if(!auth()->user()->subscription || auth()->user()->subscription->stripe_status == "inactive") disabled @endif>パーソナルプランの解約</option>
                            <option value="cancel_service" @if(auth()->user()->subscription && auth()->user()->subscription->stripe_status == "active") disabled @endif>本サービスの解約</option>
                    </select>
                 </td>
            </tr>
        </table>
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

        function cancelServiceEvent(id){
            var url = "{{route('cancel-service')}}"
            axios.post(url, {
                user_id: id
            }).then(function (response) {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: 'このサービスをキャンセルしました。'
                }).then((result) => {
                    // Inertia.post(route('logout'));
                    location.reload();
                })
            }).catch(function (error) {
                Swal.fire({
                    icon: 'warning',
                    title: 'エラー',
                    text: 'パーソナルプラン解約処理が規定時間に完了しませんでした。お時間をおいて、もう一度解約お手続をOKお願い致します。',
                })
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


        function changePlan(subs_type) {

            Swal.fire({
                html:checkSubscription(subs_type),  
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '確認',
                cancelButtonText: 'キャンセル'
                
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "checkout?subs=" + subs_type;
                    //window.location = "checkout";
                }else{
                    changeSelected();
                }
            });
        }


        function cancelPlan(subs_type) {

            var subscription_type = {{$subscription_type}};
            var _subscription_type = "";
            if(subscription_type == 1){
                _subscription_type = "月次";
            }else{
                _subscription_type = "年次";
            }

            Swal.fire({
                html: `<div class="bg-red-100 rounded-lg py-5 px-3 text-base text-red-700" role="alert">
                        <h4 class="text-2xl font-medium leading-tight text-center">留意点 </h4>
                            <ol class="list-decimal text-left px-4 py-4">
                                <li>
                                    現在のプランはパーソナルプラン(`+ _subscription_type + `) (有効期限 `+ {{$noOfDaysLeft}} +` 日）です。
                                    パーソナルプランの解約した場合は、以後の請求は発生しません。
                                    なお、変更以後はパーソナルプランの機能のご利用はできなくなります。
                                </li>
                                
                            </ol>
                        </div>`,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'はい',
                cancelButtonText: 'いいえ'
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
                                    本サービスを解約した場合、解約以後は本サービスの機能のご利用はできなくなります。また、すべてのデータおよび情報は本サーバーから削除されます。
                                    なお、パーソナルプランのご利用者の方は、パーソナルプランの解約後でなければ本サービスの解約ができません。
                                </li>
                            </ol>
                        </div>`,  
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'はい',
                cancelButtonText: 'いいえ'
                }).then((result) => {
                if (result.isConfirmed) {
                    cancelServiceEvent({{$user->id}});
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
            var subscripstion = '';
            if($(this).find(":selected").val() == 'personal_application_monthly'){
                changePlan('monthly');
                subscripstion = '月次';
            }else if($(this).find(":selected").val() == 'personal_application_annual'){
                changePlan('annual');
                subscripstion = '通年';
            }else if($(this).find(":selected").val() == 'cancel_personal_plan'){
                if($(this).find(":selected").val() == 'personal_application_monthly'){
                    subscripstion = '月次'
                }else{
                    subscripstion = '通年'
                }
                cancelPlan(subscripstion);
            }else if($(this).find(":selected").val() == 'cancel_service'){
                cancelService();
            }
        });

        const checkSubscription = (subsType) => {
            var txtSubscribed = $('#txtSubscribed').val().replace(/\s/g, "");
            var msgs = "";
            var subscription_type = {{$subscription_type}};
            var _subscription_type = "";
            if(subscription_type == 1){
                _subscription_type = "月次";
            }else{
                _subscription_type = "年次";
            }
            if(txtSubscribed == 'personal_plan'){
                msgs =  `<div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
                            <h4 class="text-2xl font-medium leading-tight mb-2">留意点</h4>
                            <p class="mb-4 text-left">
                                現在のプランはパーソナルプラン（`+ _subscription_type + `）（有効期限 `+ {{$noOfDaysLeft}} +` 日）です。
                                新しいパーソナルプランへの変更申込時には、変更申込日に料金が発生し、以後は新プランが適用になります。
                            </p>
                        </div>`;
            }else{
                msgs = `<div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
                        <h4 class="text-2xl font-medium leading-tight mb-2">留意点</h4>
                            <p class="mb-4 text-left">
                                1. パーソナルプランの申込み時には、変更申込日から料金が発生します。
                            </p>
                            <p class="mb-4 text-left">
                                2.  変更申込以後はパーソナルプランの機能のご利用が可能です。
                            </p>
                        </div>`;
            }
            return msgs;
        }
    </script>
    <!--script ends here-->
@endsection
