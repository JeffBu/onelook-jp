@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Settings</title>
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
            <h1 class="text-lg font-semibold text-theme-white">設定</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-3/4 z-10">
            <div class="text-left w-full">
                <h1 class="text-xl font-semibold text-lime-600">設定</h1>
            </div>

            <div class="pt-32"></div>
        </div>
    </div>
</div>
<!--content ends here-->
@endsection

@section('extra-scripts')
<!--script-->
<script>
    $('#settings').css('background-color', '#65a30d');
    $('#setting').css('opacity', '1');

</script>
<!--script ends here-->
@endsection