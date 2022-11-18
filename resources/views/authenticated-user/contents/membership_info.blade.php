@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Profile</title>
@endsection
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')

    <!--content-->
    <div class="flex flex-col justify-center items-center pt-20 w-full gap-8">
        <div class="flex flex-row justify-center items-center w-11/12 md:w-3/5 gap-4">
            <span class="font-semibold text-sky-600 text-right">使用状況</span>
            <span class="font-semibold text-sky-600">投稿動画：{{$user->records->count()}} 件（うち閲覧期限内の動画：{{$user->records->count()}}件）投稿可能件数：{{$user->records->count()}}件/@if($user->subscription) 100 @else 5 @endif 件（月末まで）</span>
        </div>


        
        @if(Session::has('message'))
        <div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center md:w-3/5 h-1/2 px-4" role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
            </svg>
            {{Session::get('message')}}
        </div>
        @endif

        <div class="flex flex-col justify-center items-center scroll-mt-24 gap-6 w-full md:w-3/5 h-1/2 px-4" id="home">
            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-col sm:flex-row justify-between items-center px-4 pb-2 gap-6 sm:gap-2 w-full">
                    <div class="flex flex-row justify-start items-center text-left divide-x divide-sky-700 gap-2 w-full">
                        <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">現在のプラン</span>
                        <span class="pr-2 sm:pr-4 pl-4 py-2">@if($user->subscription) パーソナルプラン @else フリープラン @endif</span>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <a  href="{{route('change-membership-plan')}}">
                            <button class="w-32 sm:w-16 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white text-xs rounded-md">変更</button>
                        </a>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-col sm:flex-row justify-between items-center px-4 pb-2 gap-6 sm:gap-2 w-full">
                    <div class="flex flex-col justify-center items-start text-left gap-2 w-full">
                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">会社名等（任意）</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">@if($user->account){{$user->account->company}} @else -- @endif</span>
                        </div>

                        <div class="flex flex-row justify-start items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">氏名</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">{{$user->name}}</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">メールアドレス</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">{{$user->email}}</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <button data-modal-toggle="edit-member-info" class="w-32 sm:w-16 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-xs text-theme-white rounded-md">変更</button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-col sm:flex-row justify-between items-center px-4 pb-2 gap-6 sm:gap-2 w-full">
                    <div class="flex flex-row justify-start items-center text-left divide-x divide-sky-700 gap-2 w-full">
                        <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">パスワード</span>
                        <span class="pr-2 sm:pr-4 pl-4 py-2">********</span>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <button data-modal-toggle="change-password" class="w-32 sm:w-16 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-xs text-theme-white rounded-md">変更</button>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">閲覧期限の通知</span>

                        <div class="flex justify-center items-center px-4 py-2 gap-4">
                            <div class="flex gap-2">
                                <input type="radio" name="available" id="avail-radio" disabled @if($user->account) @if($user->account->notification_on == 1) checked @endif @endif>
                                <label for="avail-radio">あり</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="radio" name="not" id="not-radio" disabled @if($user->account) @if($user->account->notification_on == 0) checked @endif @endif>
                                <label for="not-radio">なし</label>
                            </div>
                        </div>
                    </div>

                    <div></div>

                </div>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">支払履歴</span>

                        <div class="flex flex-row justify-center items-center text-left px-4 py-2 gap-2">
                            <span>支払履歴</span>
                            <a href="{{route('payment-history')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">こちら</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md">支払情報</span>

                <div class="flex flex-col sm:flex-row justify-between items-center px-4 pb-2 gap-6 sm:gap-2 w-full">
                    <div class="flex flex-col justify-center items-start text-left gap-2 w-full">
                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">カード番号</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">@if($card) ********{{$card->last_4}}@else -- @endif</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">カード名義</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">@if($card) {{strtoupper($user->name)}}@else -- @endif</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-2 sm:px-4 py-2 w-[7.5rem] sm:w-40 font-semibold">有効期限</span>
                            <span class="pr-2 sm:pr-4 pl-4 py-2">@if($card) {{$card->exp_month.'/'.$card->exp_year}}  @else -- @endif</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        @if (auth()->user()->subscription)
                             <button data-modal-toggle="edit-card" class="w-32 sm:w-16 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-xs text-theme-white rounded-md">変更</button>
                        @endif
                       
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--edit member info modal-->
    <div id="edit-member-info" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!--modal content-->
            <div class="relative bg-white rounded-lg shadow">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b">
                    <h3 class="text-xl font-bold text-cyan-600">
                        会員情報を変更
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-member-info">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    <form id="change-registration-info-form">
                        @csrf
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-company-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="@if($user->account){{$user->account->company}} @else -- @endif" />
                            <label for="modal-input-company-name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">会社名</label>
                        </div>
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-full-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->name}}" required />
                            <label for="modal-input-full-name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">氏名</label>
                        </div>
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="email" name="modal-input-email-address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->email}}" required />
                            <label for="modal-input-email-address" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                        </div>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">変更する</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--edit member info modal ends here-->

    <!--change password modal-->
    <div id="change-password" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!--modal content-->
            <div class="relative bg-white rounded-lg shadow">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b">
                    <h3 class="text-xl font-bold text-cyan-600">
                        ログインパスワードを変更
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="change-password">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    <form action="{{route('update-password')}}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{$user->email_verification_token}}">
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="old_password" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="********（変更日：{{$user->updated_at->format('Y/m/d')}}）" required />
                            <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">旧パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワードを認証する</label>
                        </div>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">変更する</button>
                </div>

            </form>
            </div>
        </div>
    </div>
    <!--change password modal ends here-->

    <!--edit card modal-->
    <div id="edit-card" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!--modal content-->
            <div class="relative bg-white rounded-lg shadow">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b">
                    <h3 class="text-xl font-bold text-cyan-600">
                        お支払い情報の編集
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-card">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    {!! Form::open(['url' => route('update-card'), 'data-parsley-validate', 'id' => 'payment-form']) !!}
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
                    
                    <div class="frelative mt-1 rounded-md text-left pb-3" id="cc-group">
                        {!! Form::label(null, 'カード番号を入力してください:') !!}
                        {!! Form::text(null, null, [
                            'class'                         => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                            'required'                      => 'required',
                            'data-stripe'                   => 'number',
                            'data-parsley-type'             => 'number',
                            'maxlength'                     => '16',
                            'data-parsley-trigger'          => 'change focusout',
                            'data-parsley-class-handler'    => '#cc-group',
                            'name'                          => 'cardNo'
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
                        {!! Form::button('カードを更新する', ['class' => 'inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;','type' => 'submit']) !!}
                    </div>
                    <div class="grid grid-cols-1 bg-slate-100">
                        <span class="payment-errors justify-between" style="color: red;margin-top:10px;"></span>
                    </div>
                {!! Form::close() !!}
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    {{-- <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">参加する</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!--edit card modal ends here-->

    <div class="py-20"></div>

@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')
    <!--script-->
    <script src="https://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        jQuery(document).ready(function() {
            $('#membership-info-tab').addClass('active');
            $('#m-membership-info-tab').addClass('active');
        });
       
    Stripe.setPublishableKey("<?php echo env('STRIPE_KEY') ?>");
    
    jQuery(function($) {
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
                    text: "Successfully updated!",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = "/membership-info";
                }); 
                event.preventDefault();
            });
        }
    };

        $('#change-registration-info-form').on('submit', function(event) {
            event.preventDefault()

            var url = "{{route('modify-account')}}"
            var formData = new FormData()
            Swal.showLoading()
            formData.append('company_name', $('input[name="modal-input-company-name"]').val())
            formData.append('full_name', $('input[name="modal-input-full-name"]').val())
            formData.append('email', $('input[name="modal-input-email-address"]').val())
            formData.append('notification_status', $('input[name="modal-input-notification"]:checked').val())
            axios({
                method: 'POST',
                url: url,
                data: formData,
            }).then((response) => {
                Swal.hideLoading()
                if(response.data != 1){
                    Swal.fire({
                        icon: 'error',
                        title: 'エラー',
                        text: 'アカウントの変更は失敗しました。',
                        html: "<span class='text-red-200 text-sm'>"+response.data+"</span>",
                        showCancelButton: false
                    })
                }

                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: 'アカウントへの変更は正常に公開されました。',
                    showCancelButton: false,
                }).then((result)=> {
                    if(result) {
                        window.location.reload()
                    }
                })
            }).catch((error) => {
                console.log(error.response.data)
            })
        })
    </script>
    <!--script ends here-->
@endsection
