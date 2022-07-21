<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="justify-center items-center">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center text-center pt-11 w-full">
        <div class="flex flex-col justify-center items-center text-center w-full">
            <div class="flex flex-col justify-center items-center text-center text-white bg-sky-600 w-11/12 sm:w-3/5 px-8 py-8 mt-4 gap-2 border-b-4 border-r-4 border-sky-700 rounded-lg">
                <div>
                    <h1 class="font-bold text-xl mb-4"><span class="font-bold">{{$record->uploader->username}}</span>さんの届出</h1>
                </div>

                <div class="flex flex-col justify-center items-center text-center gap-2 w-full">
                    <div class="flex flex-row justify-between items-center text-center w-full">
                        <div class="flex flex-row justify-center items-center text-center text-sm gap-2">
                            <span>投稿日:</span>
                            <span id="dl-deadline">{{$record->created_at->format('Y年m月d日H:i')}}</span>
                        </div>
                        <div class="flex flex-row justify-center items-center text-center text-sm gap-2">
                            <span>閲覧期限:</span>
                            <span id="dl-deadline">{{$record->created_at->modify('+7 days')->format('Y年m月d日H:i')}}</span>
                        </div>
                    </div>
                </div>

                <div class="border border-white w-full">
                    <video class="video-js w-full vjs-theme-fantasy" id="playback-video" controls type="video/mp4">
                        <source src="https://storage.googleapis.com/onelook-bucket/{{str_replace(' ', '%20', $record->video_path)}}">
                    </video>
                </div>

                <div class="flex flex-col justify-center items-center text-center gap-2 w-full">
                    <div class="flex flex-row justify-between items-center text-center w-full">
                        <div class="flex flex-row justify-center items-center text-center text-sm gap-2">
                            <span class="text-sm">以下のファイルをダウンロードできます。</span>
                        </div>
                        <div class="flex flex-row justify-center items-center text-center text-sm gap-2">
                            <span>ファイルサイズ:</span>
                            <div class="flex flex-row justify-center items-center text-center text-sm gap-1">
                                <span id="file-size">{{round($record->size/1024/1024, 2, PHP_ROUND_HALF_UP)}}</span>
                                <span id="file-size">MB</span>
                            </div>
                            <a onclick="downloadVideo({{$record->id}}, this)" class="px-2 py-1 bg-yellow-300 hover:bg-yellow-200 font-semibold text-sky-600 hover:text-blue-400 rounded-md border-b-2 border-r-2 border-neutral-400">ダウンロード</a>
                        </div>
                    </div>
                    <span class="text-sm mt-4">ウイルスチェックにより脅威なしと診断されました。</span>
                    <div class="flex flex-row justify-center items-center text-center text-sm gap-1">
                        <span>ダウンロードが開始されない場合は、から画面をリロードしてください</span>
                        <a class="hover:text-yellow-300 underline underline-offset-1" onclick="window.location.reload()" >ここ</a>
                        <span>。</span>
                    </div>
                </div>
            </div>

            <div class="mb-20"></div>

        </div>
    </div>
    <!--content ends here-->

    <!--footer-->
    <!--footer ends here-->

    <!--scripts-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

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
                    'theme-orange': '#ed5b2d',
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

        $(document).scroll(function() {})

        const player = videojs('playback-video', {});

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
      </script>

    <!--scripts ends here-->

</body>
</html>
