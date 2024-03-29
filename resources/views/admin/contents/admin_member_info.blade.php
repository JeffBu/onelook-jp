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
            <button id="menu-button" onclick="toggleSidebar()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
            <h1 class="text-lg font-semibold text-theme-white">会員詳細</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div class="flex justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center mt-8 w-11/12 z-10">
            <div class="flex justify-between items-center text-left w-full">
                <div>
                    <h1 class="text-xl font-semibold text-lime-600">会員詳細</h1>
                </div>
                <div>
                    <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500" onclick="deleteUser({{$target->id}})">強制退会</button>
                </div>

            </div>

            <table class="text-center mt-6 border border-lime-600 w-full">
                <tbody>
                    <tr>
                        <th class="px-4 py-1 border border-lime-700">事業者名</th>
                        <td class="px-4 py-1 border border-lime-700">@if($target->account){{$target->account->company}}@endif</td>
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
                        <td class="px-4 py-1 border border-lime-700">{{$subscription_type}}</td>
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
            <form method="post" class="justify-center items-center w-full" id="send-notif-form">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{$target->id}}">
                <div class="justify-center items-center w-full">
                    <textarea rows="10" type="text" id="comment" class="w-full border-2 font-semibold rounded-md border-lime-600 text-justify focus:ring-0 focus:outline-0 focus:border-lime-500" placeholder="コメント欄" id="comment"></textarea>
                </div>

                <div class="flex justify-between pt-3 text-left w-full">
                    <div></div>
                    <div>
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500" type="submit">登録</button>
                    </div>

                </div>
            </form>

            <div class="grid grid-rows-1 lg:grid-cols-1 justify-center items-start gap-8 pt-8 w-full text-left">


                <div class="w-full">
                    <h2 class="flex justify-center items-center px-4 py-2 border-t border-x border-lime-600 font-bold bg-lime-600 text-white text-xl pb-2">お知らせ</h2>
                    <div class="border-b border-x border-lime-600 px-2 py-2 h-64 overflow-auto">
                        <table class="w-full text-base">
                            <tbody>
                                @forelse($messages as $msg)
                                    <tr>
                                        <td rowspan="2"><input type="checkbox" name="msg_id" id="" class="mr-2 focus:ring-0 text-lime-600" value="{{$msg->id}}"></td>
                                        <td id="news-date" class="text-xs pt-2">{{$msg->created_at->format('Y年m月d日')}}</td>
                                    </tr>
                                    <tr class="border-b border-lime-600">
                                        <td id="news-label" class="pb-2 break-all">{!!$msg->content!!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="2"></td>
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
                        <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-neutral-600 hover:bg-neutral-500" onclick="deleteMessage()">消去</button>
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
    $('#member-list').css('background-color', '#65a30d')
    $('#member-list').css('opacity', '1')

    $('#send-notif-form').on('submit', function(e)
    {
        e.preventDefault()

        var user_id = $('#user_id').val()
        var news = $('#comment').val()
        var url = "{{route('send-notif')}}"
        axios.post(url, {
            target : user_id,
            comment : news,
        }).then(function (response) {
            switch(response.data) {
                case 0:
                    Swal.fire({
                        icon: 'danger',
                        title: 'エラー',
                        text: '続行するには、コメント欄に入力してください。',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false,
                    })
                    break
                case 1:
                    Swal.fire({
                        icon: 'success',
                        title: '成功',
                        text: '通知がユーザーに送信されました',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false,
                    }).then(function(response) {
                        window.location.reload()
                    })
                    break;
                default:
                    console.log('An unexpected error occured')
                    break
            }

            $('#comment').val('')
        }).catch(function(error) {
            console.log(error.response.data)
        })

    })

    function deleteMessage() {
        var msg_ids = []
        $.each($("input[name=msg_id]:checked"), function () {
            msg_ids.push($(this).val());
        })

        if(msg_ids.length > 0)
        {
            var url = "{{route('delete-news')}}"
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
                        }).then(function(response) {
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
            }).then(function (response) {
                window.location.reload()
            })
        }

    }

    function deleteUser(id)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Danger!',
            text: 'You are about to delete this user and all related data. Are you sure you want to continue?',
            showCancelButton: true,
            confirmButtonText: 'yes',
            cancleButtonText: 'no',
            preConfirm: function () {
                var url = "{{route('delete-user')}}"

                return axios.post(url, {
                    user: id,
                }).catch(function (error) {
                    console.log(error.response.data)
                })
            },
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
                if(result.isConfirmed)
                {
                    if(result.value === "error") {
                        Swal.fire({
                            icon: 'error',
                            text: 'Failed to remove user data.'
                        })
                    }else{
                        Swal.fire({
                            icon: 'success',
                            text: 'Successfully removed user data. Redirecting back to home.'
                        }).then(function (result) {
                            window.location.replace("{{route('admin-home')}}");
                        })
                    }
                }
            })
    }
</script>
<!--script ends here-->
@endsection
