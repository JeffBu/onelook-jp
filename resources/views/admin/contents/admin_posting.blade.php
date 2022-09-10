@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Posting</title>
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
            <h1 class="text-lg font-semibold text-theme-white">お知らせ</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-11/12 z-10 gap-14">
            <div class="flex flex-col justify-center items-center w-full z-10 gap-4">
                <div class="text-left w-full">
                    <h1 class="text-xl font-semibold text-lime-600">お知らせ</h1>
                </div>


                <div class="justify-center items-center w-full">
                <form action="{{route('add-announcement')}}" method="post">
                    @csrf
                    <textarea name="news" id="news" class="w-full h-48 border-2 px-4 py-4 font-semibold rounded-md border-lime-600 text-left focus:ring-0 focus:outline-0 focus:border-lime-500" cols="30" rows="10" placeholder="ここにメッセージを入力"></textarea>
                </div>

                <div class="flex justify-between text-left w-full">
                    <div></div>
                    <div>
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">公開</button>
                    </div>
                </form>
                </div>
            </div>

            <div class="grid grid-rows-1 lg:grid-cols-1 justify-center items-start gap-8 w-full text-left">
                <div class="w-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-lime-600 font-bold bg-lime-600 text-white text-xl pb-2">お知らせ</h2>
                    <div class="border-b border-x border-lime-600 px-2 py-2 h-64 overflow-auto">
                        <table class="w-full text-base">
                            <tbody>
                                @forelse($news as $item)
                                    <tr>
                                        <td rowspan="2"><input type="checkbox" name="notif_id" class="notif mr-2 focus:ring-0 text-lime-600" value="{{$item->id}}"></td>
                                        <td id="news-date" class="text-xs pt-2">{{$item->created_at->format('Y年m月d日')}}</td>
                                    </tr>
                                    <tr class="border-b border-lime-600">
                                        <td id="news-label" class="pb-2 break-all">{!!$item->content!!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="news-date" class="text-xs"></td>
                                    </tr>
                                    <tr class="border-b border-lime-600">
                                        <td id="news-label" class="pb-2">新しいお知らせはまだありません。</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-row justify-end items-center gap-2 w-full pt-4">
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-neutral-600 hover:bg-neutral-500" onclick="deleteNotifs()">消去</button>
                    </div>
                </div>
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
    $('#posting').css('background-color', '#65a30d');
    $('#posting').css('opacity', '1');

    function deleteNotifs()
    {
        var msg_ids = []
        $.each($("input[name=notif_id]:checked"), function () {
            msg_ids.push($(this).val());
        })

        if(msg_ids.length > 0)
        {
            var url = "{{route('delete-notifs')}}"
            Swal.fire({
                icon: 'warning',
                title: 'Notice',
                text: 'Are you sure you want to delete these notifications?',
                showCancelButton: true,
                confirmButtonText: 'confirm',
                cancleButtonText: 'cancel',
            }).then(function(response) {
                if(response.isConfirmed)
                {
                    axios.post(url, {
                        ids: msg_ids,
                    }).then(function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Notification Deleted',
                            showConfirmButton: false,
                            showCancelButton: false,
                        }).then(function(result) {
                            window.location.reload()
                        })
                    }).catch(function(error) {
                        console.log(error.response.data)
                    })
                }
            })
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Notice',
                text: 'Please select a notification and try again.',
            })
        }

    }
</script>
<!--script ends here-->
@endsection
