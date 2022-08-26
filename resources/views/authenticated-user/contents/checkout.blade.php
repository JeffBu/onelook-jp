<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <a href="{{route('dashboard')}}">
            <img src="{{asset('media/logos/2.png')}}" alt="onelook_logo" class="h-11 mt-1">
        </a>

        <!--<div class="flex justify-center items-center gap-5 py-6 text-sm">
            <div class="font-semibold text-theme-white hover:text-yellow-300">
                <a href="{{route('login')}}">ログイン</a>
            </div>
            <div class="font-semibold px-2 py-1 rounded-sm bg-theme-yellow text-theme-black hover:bg-yellow-400 hover:text-theme-white">
                <a href="{{route('registration')}}">無料会員登録</a>
            </div>
        </div>-->

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex flex-col justify-center items-center pt-20">
        <!--card details-->
        <div class="flex justify-center items-center w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!--modal content-->
                <div class="relative bg-white rounded-lg shadow border border-sky-600">
                    <!--modal header-->
                    <div class="flex justify-between items-center p-5 rounded-t bg-sky-600">
                        <h3 class="font-semibold text-white">
                            クレジットカードの詳細
                        </h3>

                    </div>
                    <!--modal body-->
                    <div class="px-8 py-4">
                        <form action="{{route('checkout')}}" method="POST" data-parsley-validate id="payment-form">
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="relative flex flex-row justify-between z-0 w-full px-8 py-6 group">
                                <span class="text-xs sm:text-sm text-neutral-500">小計</span>
                                <span class="text-neutral-900">¥450</span>
                            </div>
                            <div class="relative flex flex-row justify-between z-0 w-full px-8 pb-6 group border-b-2 border-gray-300">
                                <span class="text-xs sm:text-sm text-neutral-500">税</span>
                                <span class="text-neutral-900">¥45</span>
                            </div>
                            <div class="relative flex flex-row justify-between z-0 w-full px-8 pt-6 group">
                                <span class="text-xs sm:text-sm text-neutral-500">合計</span>
                                <span class="text-neutral-900">¥495</span>
                            </div>

                            <div class="relative z-0 w-full mb-4 group">
                                <x-jet-validation-errors class="mb-4" />
                            </div>

                    </div>
                    <!--modal footer-->
                    <div class="flex flex-row justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 gap-6">
                        <div class="flex flex-row gap-2">

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--billing summary-->
        <div class="flex justify-center items-center w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!--modal content-->
                <div class="relative bg-white rounded-lg shadow  border border-sky-600">
                    <!--modal header-->
                    <div class="flex justify-between items-center p-5 rounded-t bg-sky-600">
                        <h3 class="font-semibold text-white">
                            請求概要
                        </h3>

                    </div>
                    <!--modal body-->
                    <div class="px-8 py-4">
                        <form action="{{route('checkout')}}" method="POST" id="payment-form">
                            @csrf
                            <div class="relative z-0 w-full my-6 group">
                                <input type="text" name="cc_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" placeholder=" " required value="{{auth()->user()->name}}" />
                                <label for="cc_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">クレジットカード名義</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group" id="cc-group">
                                <input type="text" name="cc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="**** **** **** ****" required data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-triger="change focusout" data-parsley-class-handler="#cc-group" />
                                <label for="cc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">クレジットカード番号</label>
                            </div>
                            <div class="flex flex-row justify-center items-center gap-4">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" name="cc_expiry" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 text-opacity-0 focus:text-opacity-100" placeholder="MM/YY " required />
                                    <label for="cc_expiry" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">カードの有効期限</label>
                                </div>
                                <div class="relative z-0 w-full mb-6 group" id="ccv-group">
                                    <input type="text" name="cc_ccv" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="***" required data-stripe="cvc" data-parsley-type="number" data-parsley-triger="change focusout" maxlength="4" data-parsley-class-handler="#ccv-group" />
                                    <label for="cc_ccv" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CVV</label>
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-2 group">
                                <input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="user@example.com" required value="{{auth()->user()->email}}" />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                            </div>

                            <div class="relative z-0 w-full mb-4 group">
                                <x-jet-validation-errors class="mb-4" />
                            </div>

                            <div class="flex flex-col items-center py-4 gap-2 w-full">
                                <button type="submit" class="text-white bg-sky-600 hover:bg-sky-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">チェックアウト</button>
                            </div>

                    </div>
                    <!--modal footer-->
                    <div class="flex flex-row justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 gap-6">
                        <div class="flex flex-row gap-2">
                            <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20"></div>

    <!--content ends here-->

    <!--script-->
    <script src="https://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
    <!-- SweetAlerts CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <!-- -->

    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };


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

        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });

        jQuery(document).ready(function() {
            $('#member-tab').addClass('active');
        });

        $(document).scroll(function() {})

        Stripe.setPublishableKey("<?php echo env('STRIPE_SECRET') ?>");
        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    alert();
                    return false;
                });
                $form.find('#submitBtn').prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
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
                $form.get(0).submit();
            }
        };
    </script>
    <!--script ends here-->
</body>
</html>
