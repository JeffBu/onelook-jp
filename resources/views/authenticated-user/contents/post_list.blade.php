@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Records</title>
@endsection
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex flex-col justify-center items-center pt-20 w-full gap-8">
        <div class="flex flex-col justify-center items-center scroll-mt-24 gap-6 w-11/12 md:w-4/5 h-1/2">
            @forelse($video_records as $record)
            <?php $url = "https://storage.googleapis.com/onelook-bucket/".$record->video_path; ?>
            <div class="flex flex-col items-center text-left gap-4 w-full h-full border border-sky-600 rounded-lg shadow hover:opacity-80 duration-300">
                <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                <div class="flex flex-col md:flex-row items-center px-4 gap-4">
                    <!--video thumbnail-->
                    <div class="flex flex-col justify-center items-start gap-4 w-9/12 pb-4">
                        <div class="flex justify-center items-center">
                            <div data-modal-toggle="previewModal" onclick="previewVideo('{{$url}}')" class="flex justify-center items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 absolute opacity-50 text-neutral-800"
                                viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                                <video src="{{$url}}" alt="thumbnail" class="object-cover border-2 hover:border-yellow-400"></video>
                            </div>
                            <button class="hidden container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md"  data-modal-toggle="previewModal" onclick="previewVideo('{{$url}}')">プレビュー</button>
                        </div>

                        <!-- code generator -->
                        <div class="flex-1 justify-center items-center text-center gap-3 w-full">
                            <p>
                                パスコード:&nbsp
                                @if($record->access)
                                    {{$record->access->access_code}}
                                @else
                                    なし
                                @endif
                            </p>
                            <button class="mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md w-40" onclick="changeAccessCode('{{$record->key}}', @if($record->access) '{{$record->access->access_code}}' @else '12345678'@endif)">パスコード変更</button>
                        </div>
                    </div>

                    <!--video details-->
                    <div class="flex flex-col justify-center items-start gap-4 w-full pb-4">
                        <!--posted-->
                        <span>
                            <b>投稿日</b>:&nbsp

                            {{date_format($record->created_at, 'Y年 m月 d日 H:i')}}
                            {{-- 2021年 4月1日 10:00 --}}
                        </span>

                        <!--expiration-->
                        <span>
                            <b>閲覧期限</b>:&nbsp
                            {{date_format($record->created_at->modify('+7 days'), 'Y年 m月 d日 H:i')}}
                        </span>

                        <!--views-->
                        <span>
                            @if($record->views)
                                {{$record->views->count()}}
                                @else
                                    0
                                @endif

                            <b>閲覧数</b>
                        </span>

                        <!--url-->
                        <span id="video-link-{{$record->id}}">
                            <b>閲覧URL</b>:&nbsp
                            {{route('access-video-record', ['video_key' => $record->key])}}
                        </span>
                    </div>

                    <div class="flex flex-col md:flex-row gap-3 pb-4">
                        <div class="flex flex-col justify-center items-center py-2 gap-3 w-full">
                            <button class="w-36 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" @if($record->access) onclick="copyLink('{{$record->key}}', '{{$record->access->access_code}}', '{{$user->name}}', '{{date_format($record->created_at->modify('+7 days'), 'Y年 m月 d日 H:i')}}')" @endif>リンクコピー</button>
                            @if($user->subscription)
                                <button class="w-36 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="downloadVideo({{$record->id}}, this)">ダウンロード</a>
                            @else
                                <button class="w-36 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="downloadMessage({{$record->id}}, this)">ダウンロード</button>
                            @endif
                        </div>
                        <div class="flex flex-col justify-center items-center gap-3 w-full">
                            <button class="w-36 px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="sendInvitationMail({{$record->id}})">招待メール</button>
                            <button class="w-36 px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md"  onclick="deleteVideo({{$record->id}})">削除</button>
                        </div>
                    </div>
                </div>
            </div>

            @empty
                <div>
                    <span class="text-center">表示するレコードがありません</span>
                </div>
            @endforelse
        </div>


    </div>
    <div class="pt-40"></div>

    <!-- Video Playback Modal -->
    <div class="hidden fixed top-0 justify-center items-center w-screen h-screen outline-none overflow-x-hidden overflow-y-auto z-50" id="previewModal">
        <div class="w-11/12 md:w-3/5 md:h-3/4">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLgLabel">
                プレビュー
              </h5>
              <button type="button"
                class="flex items-center btn-close box-content rounded-full opacity-60 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-neutral-900 hover:opacity-75 hover:no-underline"
                data-modal-toggle="previewModal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                  </svg></button>
            </div>
            <div class="modal-body relative p-4">
                <video width="100%" height="400" id="video" controls>
                    <source src="" type="video/mp4">
                </video>
            </div>
          </div>
        </div>
        </div>
    </div>
    <!-- End Video Playback Modal -->
    <!--content ends here-->

@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')
    <!--scripts-->
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
    </script>

    <script>
        $(document).ready(function() {
            $('#post-list-tab').addClass('active');
            $('#m-post-list-tab').addClass('active');
        });

        function copyLink(key, code, name, exp_date){
            var base_url = "{{config('app.url')}}";
            var html = '<h1 class="text-center font-semibold text-base sm:text-lg">下記の招待状をコピーし、メール等で共有いただければ動画閲覧が可能です</h1>' + '<br /><br />' +
                '<p class="text-justify">'+ name + ' さんが、あなたを動画閲覧に招待しています。<br /><br />' +
                '<span class="font-bold">動画名: </span> ' + base_url +'/access-video-record?video_key='+key+' <br />' +
                '<span class="font-bold">パスコード: </span> ' + code +'<br />'+
                '<span class="font-bold">動画の有効期限：</span> ' + exp_date +
                '</p>'
            Swal.fire({
            html: html,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                '招待状をコピー',
            cancelButtonText:
                'キャンセル',
            }).then((result) => {
                if(result.isConfirmed) {
                    copyMessage =   name+ ' さんが、あなたを動画閲覧に招待しています。\n\n' +
                                    '動画名: '+ base_url +'/access-video-record?video_key='+key+ '\n' +
                                    'パスコード: ' + code + '\n' +
                                    '動画の有効期限：' + exp_date + ''
                    navigator.clipboard.writeText(copyMessage)
                }
            })
        }

        function changeAccessCode(key, code)
        {
            var html = '<div class="md:flex md:items-center mb-6 gap-1">'
                html += '<div class="md:w-2/3">'
                html += '<input class="text-center bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="codeField" type="text" value="'+code+'" readonly>'
                html += '</div>'
                html += '<div class="md:w-1/3">'
                html += '<button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="generateCode(8)">ランダム化</button>'
                html += '</div>'
                html += '</div>'
            Swal.fire({
                title: 'パスコードを変更する',
                html: html,
                showCancelButton: true,
                confirmButtonText: '変更する',
                cancelButtonText: 'キャンセル',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    var access_code = $('#codeField').val()

                    var url = "{{route('save-access-code')}}"
                    return axios.post(url, {
                        code : access_code,
                        key : key
                    }).catch((error) => {
                        console.log(error.response.data)
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.reload()
                }
            })
        }

        function generateCode(length){
            var result           = ''
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
            var charactersLength = characters.length
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() *
            charactersLength))
            }

            $('#codeField').val(result)
        }

        function previewVideo(path)
        {
            var video = document.querySelector('#video')
            video.src = path
        }

        function sendInvitationMail(id)
        {
            Swal.fire({
                html: '<b>電子メールを介して招待リンクを送信します。</b>',
                input: 'email',
                inputLabel: '電子メールアドレス',
                confirmButtonText: '招待状を送る',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    var url = "{{route('send-invitation')}}"
                    return axios.post(url, {
                        record_id: id,
                        target: email
                    }).then((response) => {
                        if(response.data != 1) {
                            return 2
                        }
                        return 1
                    }).catch((error) => {
                        Swal.showValidationMessage(
                            'Request failed: ' + error.response.data
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if(result.value == 1) {
                    Swal.fire({
                        icon: 'success',
                        html: '<b>招待状が正常に送信されました。</b>',
                        timer: 2000,
                        showConfirmButton: false
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        html: '<b>予期せぬエラーが発生した。</b>',
                        text: '後でもう一度やり直してください。',
                        timer: 3000,
                        showConfirmButton: false
                    })
                }
            })
        }

        function downloadMessage(id, button)
        {
            Swal.fire({
                icon: 'warning',
                html: '<b>ダウンロード機能は、フリープランの会員様はご利用できません。パーソナルプランへの変更は会員情報をご覧ください。</b>',
            })


        }

        function downloadVideo(id, button)
        {
            var url = "{{route('download')}}"

            axios.post(url, {
                id: id
            }).then((response) => {
                const link = document.createElement('a')
                link.href = response.data[0]
                link.setAttribute('download', response.data[1]);
                link.click();
                button.disabled = 'disabled'
            }).catch((error) => {
                Swal.fire({
                    title: "ERROR",
                    text: error.response.data['message'],
                    icon: 'danger',
                    showCancelButton: false
                })
            })
        }

        function deleteVideo(record_id) {
            var url = "{{route('delete-video')}}";
            Swal.fire({
                icon: 'warning',
                title: '本当に動画を削除しますか？',
                confirmButtonText: 'はい',
                cancelButtonText: 'いいえ',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: (deleteVid) => {
                    return axios.post(url, {
                        id : record_id
                    }).then((response) => {
                        return response.data
                    }).catch((error) => {
                        Swal.showValidationMessage(
                            'ERROR: '+error.response.data
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading
            }).then((result) => {
                if(result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: '動画削除完了しました',
                        timer: 3000
                    }).then((result) => {
                        location.reload()
                    })
                }
            })

        }
    </script>
    <!--script ends here-->
@endsection
