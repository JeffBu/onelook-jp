@extends('authenticated-user.components.layout')
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-center pt-20">
        <table class="text-center w-[60%] border border-sky-700">
            <thead class="bg-cyan-600 text-theme-white">
                <tr>
                    <th class="px-1 py-1 border-x border-sky-700">使用状況</th>
                    <th colspan="3" class="px-1 py-1 border-x border-sky-700">投稿動画：●件（うち閲覧期限内の動画：●件）<br>投稿可能件数：●件/50件（月末まで）</th>
                    <th class="px-1 py-1 border-x border-sky-700"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">現在のプラン</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">パーソナルプラン</td>
                    <td class="px-8 py-1 border-x border-y border-cyan-600">
                        <a  href="{{route('change-membership-plan')}}">
                            <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">会社名等（任意）</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->account->company}}</td>
                    <td rowspan="8" class="px-8 py-1 border-x border-y border-cyan-600">
                        <button data-modal-toggle="edit-member-info" class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">氏名</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->name}}</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">住所</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">〒550-0044</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->account->address}}</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">電話番号</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->account->phone_number}}</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ユーザー名</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->username}}</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">メールアドレス</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->email}}</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">閲覧期限の通知</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex justify-center items-center gap-6">
                            <input type="radio" name="available" id="avail-radio" disabled @if($user->account->notification_on == 1) checked @endif>
                            <label for="avail-radio">あり</label>
                            <input type="radio" name="not" id="not-radio" disabled @if($user->account->notification_on == 0) checked @endif>
                            <label for="not-radio">なし</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">ログインID</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">{{$user->login_id}}</td>
                    <td rowspan="2" class="items-center px-8 py-1 border-x border-y border-cyan-600">
                        <button data-modal-toggle="change-password" class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">パスワード</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">********</td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">支払履歴</td>
                    <td colspan="3" class="px-1 py-1 border-x border-y border-cyan-600">
                        <div class="flex justify-center items-center gap-3">
                        <span>支払履歴は</span>
                        <a href="{{route('payment-history')}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">こちら</a>
                        </div>
                    </td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                </tr>

                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">支払情報</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">カード番号<br>********5555</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">カード名義<br>KINICHICIHIKA</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">有効期限<br>03/2022</td>
                    <td class="px-8 py-1 border-x border-y border-cyan-600">
                        <button data-modal-toggle="edit-card" class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--edit member info modal-->
    <div id="edit-member-info" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
            <!--modal content-->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-bold text-cyan-600 dark:text-white">
                        会員情報を変更します。
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-member-info">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    <form id="change-registration-info-form">
                        @csrf
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-company-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->account->company}}" required />
                            <label for="modal-input-company-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">会社名</label>
                        </div>
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-full-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->name}}" required />
                            <label for="modal-input-full-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">氏名</label>
                        </div>
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->account->address}}" required />
                            <label for="modal-input-address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">住所</label>
                        </div>
                        <div class="relative z-0 w-full px-4 mb-4 group">
                            <input type="text" name="modal-input-phone-number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->account->phone_number}}" required />
                            <label for="modal-input-phone-number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">電話番号</label>
                        </div>
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <div class="relative z-0 w-full pl-4 mb-4 group">
                                <input type="text" name="modal-input-username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->username}}" required />
                                <label for="modal-input-username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ユーザー名</label>
                            </div>
                            <div class="relative z-0 w-full pr-4 mb-4 group">
                                <input type="email" name="modal-input-email-address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$user->email}}" required />
                                <label for="modal-input-email-address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                            </div>
                        </div>
                        <div class="relative z-0 w-full group">
                            <div class="flex-1 py-2 justify-center items-center">
                                <div class="flex flex-row justify-center items-center gap-24">
                                    <div class="flex py-2 justify-center items-center text-gray-500">閲覧期限の通知</div>

                                    <div class="flex justify-center items-center gap-4">
                                        <input type="radio" name="modal-input-notification" id="cb1" data-tooltip-target="marker-toolbar" @if($user->account->notification_on == 1) checked @endif value="1">
                                        <div id="marker-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            閲覧期限の３６時間前に、メールで閲覧期限の終了をお知らせする機能です。通知が不要な方は、なしにチェックしてください。（デフォルトはありにチェック）
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <label for="cb1" class="text-gray-500">あり</label>
                                        <input type="radio" name="modal-input-notification" id="cb2" @if($user->account->notification_on == 0) checked @endif value="0">
                                        <label for="cb2" class="text-gray-500">なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400">変更する</button>
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
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-bold text-cyan-600 dark:text-white">
                        ログインパスワードを変更します。
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="change-password">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    <form>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cp_username" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{$user->login_id}}" required readonly />
                            <label for="cp_username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ログインID（変更できません）</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="old_password" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="********（変更日：{{$user->updated_at->format('Y/m/d')}}）" required readonly />
                            <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">旧パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="change_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="change_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="confirm_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="confirm_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワードを認証する</label>
                        </div>
                    </form>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400">変更する</button>
                </div>
            </div>
        </div>
    </div>
    <!--change password modal ends here-->

    <!--edit card modal-->
    <div id="edit-card" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!--modal content-->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!--modal header-->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-bold text-cyan-600 dark:text-white">
                        ログインパスワードを変更します。
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-card">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!--modal body-->
                <div class="p-4 space-y-4">
                    <form>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="cp_username" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="dad123" required readonly />
                            <label for="cp_username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ログインID（変更できません）</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="text" name="old_password" class="block py-2.5 px-0 w-full text-center text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="********（変更日：2021/09/30）" required readonly />
                            <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">旧パスワード</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="change_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="change_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">住所</label>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <input type="password" name="confirm_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="confirm_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">電話番号</label>
                        </div>
                    </form>
                </div>
                <!--modal footer-->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400">参加する</button>
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
<script>
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
        $('#membership-info-tab').addClass('active');
    });

    $(document).scroll(function() {})

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
@endsection
