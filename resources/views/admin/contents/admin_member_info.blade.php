@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Membership Info</title>
@endsection
@section('extra-styles')
@endsection
@section('content')
<!--content-->
<div class="flex flex-col justify-center items-center w-full">
    <div class="flex justify-between items-center px-4 header-bg h-11 w-full sticky top-0 z-30">
        <div class="flex justify-start items-center gap-8">
            <button id="menu-button" onclick="toggleMenu()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
            <h1 class="text-lg font-semibold text-theme-white">会員詳細</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div onclick="hideMenu()" class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10">
            <div class="flex justify-between items-center text-left w-full">
                <div>
                    <h1 class="text-xl font-semibold text-lime-600">会員詳細</h1>
                </div>
                <div>
                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">強制退会</button>
                </div>

            </div>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <tbody>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">事業者名</th>
                        <td class="px-4 py-1 border border-lime-700">{{$target->account->company}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">代表者</th>
                        <td class="px-4 py-1 border border-lime-700">{{$target->name}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">メールアドレス</th>
                        <td class="px-4 py-1 border border-lime-700">{{$target->email}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">閲覧期限の通知</th>
                        <td class="px-4 py-1 border border-lime-700">
                            <div class="flex justify-center items-center gap-8">
                                <div class="flex justify-center items-center gap-3">
                                    <input type="radio" name="view-select" id="cb1" checked readonly>
                                    <label for="cb1">あり</label>
                                </div>
                                <div class="flex justify-center items-center gap-3">
                                    <input type="radio" name="view-select" id="cb2" disabled>
                                    <label for="cb2">なし</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">会員名</th>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">登録日</th>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">会員タイプ</th>
                        <th colspan="4" class="px-4 py-1 border border-lime-700">
                            <div class="flex flex-row justify-between items-center text-left">
                                <div>
                                    <span>動画数</span>
                                </div>

                                <div class="flex flex-row gap-3">
                                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">月間</button>
                                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">累計</button>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">作成動画</th>
                        <th class="px-4 py-1 border border-lime-700">期限内動画</th>
                        <th class="px-4 py-1 border border-lime-700">招待メール</th>
                        <th class="px-4 py-1 border border-lime-700">閲覧数</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">>{{$target->name}}</td>
                        <td class="px-4 py-1 border border-lime-700">{{$target->created_at->format('Y/m/d')}}</td>
                        <td class="px-4 py-1 border border-lime-700">パーソナル</td>
                        <td class="px-4 py-1 border border-lime-700">{{$video_records->count()}}</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-between items-center pt-6 pb-3 w-full sticky top-0">
                <h1 class="text-xl font-semibold text-lime-600">対象顧客への連絡</h1>
            </div>
            <form action="send-notif" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$target->id}}">
                <div class="justify-center items-center w-full">
                    <input type="text" id="comment"  class="w-full border-2 font-semibold rounded-md border-lime-600 text-center focus:ring-0 focus:outline-0 focus:border-lime-500" placeholder="コメント欄" id="comment">
                </div>

                <div class="flex justify-between pt-3 text-left w-full">
                    <div></div>
                    <div>
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">登録</button>
                    </div>

                </div>
            </form>
            <div class="pt-32"></div>
        </div>
    </div>
</div>
<!--content ends here-->
@endsection

@section('extra-scripts')
<!--script-->
<script>
    $('#member-list').css('background-color', '#65a30d');
    $('#member-list').css('opacity', '1');

</script>
<!--script ends here-->
@endsection
