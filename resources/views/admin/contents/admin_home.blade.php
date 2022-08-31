@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Home</title>
@endsection
@section('extra-styles')
@endsection
@section('content')
<!--content-->
<div class="flex flex-col justify-center items-center w-full">
    <div class="flex justify-between items-center px-4 header-bg h-11 w-full sticky top-0 z-30">
        <div class="flex justify-start items-center gap-8">
            <button id="menu-button" onclick="toggleSidebar()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
            <h1 class="text-lg font-semibold text-theme-white">ホーム</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-11/12 z-10">
            <div class="text-left w-full">
                <h1 class="text-xl font-semibold text-lime-600">登録状況</h1>
            </div>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">{{$currentMonth.'月'}}</th>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">会員数合計</th>
                        <th colspan="4" class="px-4 py-1 border border-lime-700">動画数</th>
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
                        <td class="px-4 py-1 border border-lime-700">フリープラン</td>
                        <td class="px-4 py-1 border border-lime-700">{{$recentSubs->count()}}</td>
                        <td class="px-4 py-1 border border-lime-700">{{$recentRecords->count()}}</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">パーソナルプラン</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">ビジネスプラン</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr class="header-bg text-theme-white">
                        <td class="px-4 py-1 border border-lime-700">合計</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                </tbody>
            </table>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">{{$lastMonth.'月'}}</th>
                        <th rowspan="2" class="px-4 py-1 border border-lime-700">会員数合計</th>
                        <th colspan="4" class="px-4 py-1 border border-lime-700">動画数</th>
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
                        <td class="px-4 py-1 border border-lime-700">フリープラン</td>
                        <td class="px-4 py-1 border border-lime-700">{{$lastMonthSubs->count()}}</td>
                        <td class="px-4 py-1 border border-lime-700">{{$lastMonthRecords->count()}}</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">パーソナルプラン</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-1 border border-lime-700">ビジネスプラン</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
                    <tr class="header-bg text-theme-white">
                        <td class="px-4 py-1 border border-lime-700">合計</td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                        <td class="px-4 py-1 border border-lime-700"></td>
                    </tr>
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
    $('#home').css('background-color', '#65a30d');
    $('#home').css('opacity', '1');

</script>
<!--script ends here-->
@endsection
