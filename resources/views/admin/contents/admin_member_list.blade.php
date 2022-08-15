@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Member List</title>
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
            <h1 class="text-lg font-semibold text-theme-white">会員一覧</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div onclick="hideMenu()" class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10">
            <div class="text-left w-full">
                <h1 class="text-xl font-semibold text-lime-600">会員一覧</h1>
            </div>

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
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-1 border border-lime-700">
                                <a href="{{route('admin-member-info', ['user_id' => $user->id])}}" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">{{$user->name}}</a>
                            </td>
                            <td class="px-4 py-1 border border-lime-700">{{$user->created_at->format('Y年m月d日')}}</td>
                            <td class="px-4 py-1 border border-lime-700">パーソナル</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                            <td class="px-4 py-1 border border-lime-700">10</td>
                            <td class="px-4 py-1 border border-lime-700">{{$user->email}}</td>
                            <td class="px-4 py-1 border border-lime-700"></td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>

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
