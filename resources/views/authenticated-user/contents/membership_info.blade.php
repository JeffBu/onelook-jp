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
            <span class="font-semibold text-sky-600">投稿動画：{{$user->records->count()}} 件（うち閲覧期限内の動画：●件）投稿可能件数：●件/5件（月末まで）</span>
        </div>

        <div class="grid lg:grid-cols-1 justify-center items-center scroll-mt-24 gap-6 w-11/12 md:w-3/5 h-1/2" id="home">
            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-4 py-2 w-40">現在のプラン</span>
                        <span class="px-4 py-2">パーソナルプラン</span>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <a  href="{{route('change-membership-plan')}}" class="px-4 py-2">
                            <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                        </a>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-col justify-center items-start text-left gap-4">
                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">会社名等（任意）</span>
                            <span class="px-4 py-2">@if($user->account){{$user->account->company}} @else -- @endif</span>
                        </div>

                        <div class="flex flex-row justify-start items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">氏名</span>
                            <span class="px-4 py-2">{{$user->name}}</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">メールアドレス</span>
                            <span class="px-4 py-2">{{$user->email}}</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <button data-modal-toggle="edit-member-info" class="container mx-4 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-4 py-2 w-40">パスワード</span>
                        <span class="px-4 py-2">********</span>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <button data-modal-toggle="change-password" class="container mx-4 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md"></span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-4 py-2 w-40">閲覧期限の通知</span>

                        <div class="flex justify-center items-center px-4 py-2 gap-6">
                            <input type="radio" name="available" id="avail-radio" disabled @if($user->account) @if($user->account->notification_on == 1) checked @endif @endif>
                            <label for="avail-radio">あり</label>
                            <input type="radio" name="not" id="not-radio" disabled @if($user->account) @if($user->account->notification_on == 0) checked @endif @endif>
                            <label for="not-radio">なし</label>
                        </div>
                    </div>

                    <div></div>

                </div>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">
                    <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                        <span class="px-4 py-2 w-40">支払履歴</span>

                        <div class="flex flex-row justify-center items-center text-left px-4 py-2 gap-2">
                            <span>支払履歴</span>
                            <a href="{{route('payment-history')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">こちら</a>
                        </div>
                    </div>

                    <div></div>

                </div>
            </div>

            <div class="flex flex-col items-center text-left gap-2 w-full h-full border border-sky-600 rounded-lg shadow">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-base sm:text-lg text-white bg-sky-600 rounded-t-md">支払情報</span>

                <div class="flex flex-row justify-between items-center px-4 pb-2 gap-2 w-full">

                    <div class="flex flex-col justify-center items-start text-left gap-4">
                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">カード番号</span>
                            <span class="px-4 py-2">********5555</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">カード名義</span>
                            <span class="px-4 py-2">KINICHICIHIKA</span>
                        </div>

                        <div class="flex flex-row justify-center items-center text-left divide-x divide-sky-700 gap-2">
                            <span class="px-4 py-2 w-40">有効期限</span>
                            <span class="px-4 py-2">03/2022</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-center items-center gap-2">
                        <button data-modal-toggle="edit-card" class="container mx-4 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
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
                            <input type="text" name="modal-input-company-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="@if($user->account){{$user->account->company}} @else -- @endif" required />
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
                    <form>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cp_username" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{$user->login_id}}" required readonly />
                            <label for="cp_username" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ログインID（変更できません）</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="old_password" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="********（変更日：{{$user->updated_at->format('Y/m/d')}}）" required readonly />
                            <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">旧パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="change_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="change_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="confirm_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="confirm_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワードを認証する</label>
                        </div>
                    </form>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">変更する</button>
                </div>
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
                    <form>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cc_number" class="block py-2.5 px-0 w-full text-left text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="cc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">カード番号</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cc_name" class="block py-2.5 px-0 w-full text-left text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="cc_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">カード名義</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cc_expiration" class="block py-2.5 px-0 w-full text-left text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="cc_expiration" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">有効期限</label>
                        </div>
                    </form>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">参加する</button>
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
    <script>
        jQuery(document).ready(function() {
            $('#membership-info-tab').addClass('active');
            $('#m-membership-info-tab').addClass('active');
        });

        $('#change-registration-info-form').on('submit', function(event) {
            event.preventDefault()

            var url = "{{route('modify-account')}}"
            var formData = new FormData()

            formData.append('company_name', $('input[name="modal-input-company-name"]').val())
            formData.append('full_name', $('input[name="modal-input-full-name"]').val())
            formData.append('address', $('input[name="modal-input-address"]').val())
            formData.append('phone_number', $('input[name="modal-input-phone-number"]').val())
            formData.append('username', $('input[name="modal-input-username"]').val())
            formData.append('email', $('input[name="modal-input-email-address"]').val())
            formData.append('notification_status', $('input[name="modal-input-notification"]:checked').val())
            axios({
                method: 'POST',
                url: url,
                data: formData,
            }).then((response) => {
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
