@extends('authenticated-user.components.layout')
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')

    <!--content-->
    <div class="flex justify-center items-center pt-20">
        <table class="text-center w-4/5 border border-sky-700">
            <thead class="bg-cyan-600 text-theme-white">
                <tr>
                    <th class="px-3 py-3 border-x border-sky-700">No.</th>
                    <th class="px-3 py-3 border-x border-sky-700">動画名</th>
                    <th class="px-3 py-3 border-x border-sky-700">パスコード</th>
                    <th class="px-3 py-3 border-x border-sky-700">投稿日</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧期限</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧数</th>
                    <th class="px-3 py-3 border-x border-sky-700">閲覧URL</th>
                </tr>
            </thead>
            <tbody>
                @forelse($video_records as $record)
                <?php $url = "https://storage.googleapis.com/onelook-storage/".$record->video_path; ?>
                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">{{$record->id}}</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <video src="{{$url}}" alt="thumbnail" class="h-32 w-48 object-cover" ></video>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md"  data-modal-toggle="previewModal" onclick="previewVideo('{{$url}}')">下見</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>
                                @if($record->access)
                                    {{$record->access->access_code}}
                                @else
                                    なし
                                @endif
                            </p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md" onclick="changeAccessCode('{{$record->key}}')">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        {{date_format($record->created_at, 'Y年 m月 d日 H:i')}}
                        {{-- 2021年 4月1日 10:00 --}}
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        {{date_format($record->created_at->modify('+7 days'), 'Y年 m月 d日 H:i')}}
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        @if($record->views)
                            {{$record->views->count()}}
                        @else
                            0
                        @endif
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>{{route('access-video-record', ['video_key' => $record->key])}}</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" @if($record->access) onclick="copyLink('{{$record->key}}', '{{$record->access->access_code}}', '{{$user->name}}')" @endif>リンクコピー</button>
                                <a href="{{$url}}" class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" download>ダウンロード</a>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <a class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="downloadVideo({{$record->id}}, this)">招待メール</a>
                                <button class="container px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md" onclick="deleteVideo({{$record->id}}, this)">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="px-3 py-3 border-x border-y border-cyan-600 text-cyan-400" colspan="7">
                            表示するレコードがありません
                        </td>
                    </tr>
                @endforelse

                {{-- <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">1</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>123456</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">5</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>https://onelook.jp/access-record-verification?access_id=4openRe7Az</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>567890</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">3</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span></span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container hidden px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">3</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>098765</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>閲覧期限が経過しました</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">4</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <!--<img src="{{asset('media/video-playback.png')}}" alt="thumbnail" class="h-32 w-48 object-cover">-->
                            <button class="container hidden mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                            <span>ちょっとイリーガルなもの</span>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center gap-3">
                            <p>654321</p>
                            <button class="container mt-3 px-4 py-2 bg-theme-yellow text-theme-white hover:bg-yellow-300 rounded-md">編集</button>
                        </div>
                    </td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">2021年 4月1日 10:00</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">6</td>
                    <td class="px-3 py-3 border-x border-y border-cyan-600">
                        <div class="flex-1 justify-center items-center">
                            <span>運営により削除されました</span>
                            <div class="flex justify-center items-center px-3 py-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="copyLink()">リンクコピー</button>
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">ダウンロード</button>
                            </div>
                            <div class="flex justify-center items-center px-3 gap-3">
                                <button class="container hidden px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">招待メール</button>
                                <button class="container hidden px-4 py-2 bg-red-600 hover:bg-red-500 text-theme-white rounded-md">削除</button>
                            </div>
                        </div>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="pt-40"></div>

    <!-- Video Playback Modal -->
    <div class="hidden fixed top-0 justify-center items-center w-screen h-screen outline-none overflow-x-hidden overflow-y-auto z-50" id="previewModal">
        <div class="w-3/5 h-3/4">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLgLabel">
                プレビュー
              </h5>
              <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-modal-toggle="previewModal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });

        jQuery(document).ready(function() {
            $('#post-list-tab').addClass('active');
        });

        $(document).scroll(function() {})

        function copyLink(key, code, name){
            var base_url = "{{config('app.url')}}";
            Swal.fire({
            title: '下記の招待状をコピーし、メール等で共有いただければ動画閲覧が可能です',
            html:
                name + ' さんが、あなたを動画閲覧に招待しています。<br /><br />' +
                '動画名： ' + base_url +'/access-video-record?video_key='+key+' <br />' +
                'パスコード: ' + code,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                '招待状をコピー',
            cancelButtonText:
                'キャンセル',
            })
        }

        function changeAccessCode(key)
        {
            var html = '<div class="md:flex md:items-center mb-6 gap-1">'
                html += '<div class="md:w-2/3">'
                html += '<input class="text-center bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="codeField" type="text">'
                html += '</div>'
                html += '<div class="md:w-1/3">'
                html += '<button class="container px-4 py-2 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md" onclick="generateCode(8)">ランダム化</button>'
                html += '</div>'
                html += '</div>'
            Swal.fire({
                title: 'アクセスコードを生成する',
                html: html,
                showCancelButton: true,
                confirmButtonText: '確認',
                cancelButtonText: 'キャンセル',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    var access_code = $('#codeField').val()
                    var url = "{{route('save-access-code')}}"
                    return axios.post(url, {
                        code : access_code,
                        key : key
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

        function downloadVideo(id, button)
        {
            button.preventDefault()
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
    </script>
    <!--script ends here-->
@endsection
