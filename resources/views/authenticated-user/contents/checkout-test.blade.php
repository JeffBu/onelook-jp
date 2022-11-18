@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Subcriptions</title>
@endsection
@section('css')

<style>
    .alert.parsley {
        margin-top: 5px;
        margin-bottom: 0px;
        padding: 10px 15px 10px 15px;
    }
    .check .alert {
        margin-top: 20px;
    }
    .credit-card-box .panel-title {
        display: inline;
        font-weight: bold;
    }
    .credit-card-box .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
    }
    .credit-card-box .display-tr {
        display: table-row;
    }

    [type=button], [type=reset], [type=submit], button {
        background-color: #007bff !important;
    }
    a:hover {
 cursor:pointer;
}
    </style>
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection

@section('content')
    <!--content-->
    <div class="flex flex-col justify-center items-center gap-8 w-full">
    
    <div class="container mx-auto px-10">
        <div class="grid grid-cols-1 bg-slate-100 pt-20" >
            <div class="flex justify-center">
                <div class="block rounded-lg shadow-lg bg-white w-1/2 text-center">
                <div class="py-3 px-6 border-b border-gray-300">パーソナルプランへのお申し込み</div>
                
                    <div class="grid grid-cols-1 p-4 bg-slate-100" >
                        
                        {!! Form::open(['url' => route('pay-for-subscription'), 'data-parsley-validate', 'id' => 'payment-form']) !!}
                            @if ($message = Session::get('success'))
                            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">

                                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3">
                                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-red-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="frelative mt-1 rounded-md text-left pb-3" id="product-group">
                                {!! Form::label('plane', 'プラン選択:') !!}
                                {!! Form::select('plane', [ env('STRIPE_PRICE_MONTHLY_KEY') => '月額お申し込み', env('STRIPE_PRICE_ANNUAL_KEY') => '年間お申し込み' ], null, [
                                    'class'                       => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                                    'required'                    => 'required',
                                    'data-parsley-class-handler'  => '#product-group'
                                    ]) !!}
                            </div>
                            <div class="frelative mt-1 rounded-md text-left pb-3" id="cc-group">
                                {!! Form::label(null, 'カード番号を入力してください:') !!}
                                {!! Form::text(null, null, [
                                    'class'                         => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                                    'required'                      => 'required',
                                    'data-stripe'                   => 'number',
                                    'data-parsley-type'             => 'number',
                                    'maxlength'                     => '16',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-class-handler'    => '#cc-group'
                                    ]) !!}
                            </div>
                            <div class="frelative mt-1 rounded-md text-left pb-3" id="ccv-group">
                                {!! Form::label(null, 'C V C番号を入力してください:') !!}
                                {!! Form::text(null, null, [
                                    'class'                         => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                                    'required'                      => 'required',
                                    'data-stripe'                   => 'cvc',
                                    'data-parsley-type'             => 'number',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'maxlength'                     => '4',
                                    'data-parsley-class-handler'    => '#ccv-group'
                                    ]) !!}
                            </div>
                            <div class="grid grid-cols-2 bg-slate-100">
                                <div class="frelative mt-1 rounded-md text-left pb-3" id="exp-m-group">
                                    {!! Form::label(null, 'カード有効月') !!}
                                    {!! Form::selectMonth(null, null, [
                                        'class'                 => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                                        'required'              => 'required',
                                        'data-stripe'           => 'exp-month'
                                    ], '%m') !!}
                                </div>
                                <div class="frelative mt-1 rounded-md text-left pb-3" id="exp-y-group">
                                    {!! Form::label(null, 'カード有効年') !!}
                                    {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                                        'class'             => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                                        'required'          => 'required',
                                        'data-stripe'       => 'exp-year'
                                        ]) !!}
                                </div>
                            </div>
                            <div class="grid grid-cols-1 bg-slate-100">
                                {!! Form::button('お申し込み開始', ['class' => 'inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;', 'type' => 'submit']) !!}
                            </div>
                            <div class="grid grid-cols-1 bg-slate-100">
                                <span class="payment-errors justify-between" style="color: red;margin-top:10px;"></span>
                            </div>
                        {!! Form::close() !!}

                      
                <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                    <div class="grid grid-cols-1 bg-slate-100" style="display: flex; justify-content: center;">
                        <h4><b><a class="text-purple-600 hover:text-purple-700 transition duration-300 ease-in-out mb-4" onclick="history.back()">戻る</a></b></h4>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>

    <div class="pt-40">
    </div>
    <!--content ends here-->
@endsection

@section('js')
<script>

jQuery(document).ready(function() {
            $('#membership-info-tab').addClass('active');
            $('#m-membership-info-tab').addClass('active');
        });
    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
<script src="https://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey("<?php echo env('STRIPE_KEY') ?>");
    jQuery(function($) {
        // $('#payment-form').submit(function(event) {
        //     var $form = $(this);
        //     $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
        //         formInstance.submitEvent.preventDefault();
        //         alert();
        //         return false;
        //     });
        //     $form.find('#submitBtn').prop('disabled', true);
        //     Stripe.card.createToken($form, stripeResponseHandler);
        //     return false;
        // });

        $('#payment-form button').on('click',function(event) {
            var $form =  $('#payment-form');
            var submit = $form.find('button');
            var submitInitialText = submit.text();
            submit.attr('disabled','disabled').text('作成中ですのでお待ちください......');
            Stripe.card.createToken($form, function(status,response){
                if(response.error){
                    $form.find('.payment-errors').text(response.error.message).show();
                    submit.removeAttr('disabled');
                    submit.text(submitInitialText);
                }else{
                    var token = response.id;
                    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                    $form.submit();
                }
            });
            return false;
        });
    });
    function stripeResponseHandler(status, response) {
        var $form = $('#payment-form');
        if (response.error) {
            $form.find('.payment-errors').text(response.error.message);
            $form.find('.payment-errors').addClass('alert alert-danger');
            $form.find('#submitBtn').prop('disabled', false);
            $('#submitBtn').button('reset');
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // - old
            // $form.get(0).submit();
            $form.get(0).submit(function( event ){
                Swal.fire({
                    title: "Success!",
                    text: "Successfully subscribed!",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = "/membership-info";
                }); 
                event.preventDefault();
            });
        }
    };
 
    var url_string = window.location;
    var url = new URL(url_string);
    var subscription_type = url.searchParams.get("subs");
    var anual = "<?php echo env('STRIPE_PRICE_ANNUAL_KEY') ?>";
    var monthly = "<?php echo env('STRIPE_PRICE_MONTHLY_KEY') ?>";
    $( document ).ready(function() {
       
       // alert(subscription_type);

        if(subscription_type == 'annual'){
            $("#plane option[value='" + anual + "']").attr("selected","selected");
            $("#plane option[value='" + monthly + "']").attr("disabled", true); 
        }else if(subscription_type == 'monthly'){
            $("#plane option[value='" + monthly + "']").attr("selected","selected");
            $("#plane option[value='" + anual + "']").attr("disabled", true); 
        }
    });
</script>
   <!--script ends here-->
@endsection
