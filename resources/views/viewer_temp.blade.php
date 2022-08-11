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

    <style>
        .video-js .vjs-menu-button-inline.vjs-slider-active,.video-js .vjs-menu-button-inline:focus,.video-js .vjs-menu-button-inline:hover,.video-js.vjs-no-flex .vjs-menu-button-inline {
            width: 10em
        }

        .video-js .vjs-controls-disabled .vjs-big-play-button {
            display: none!important
        }

        .video-js .vjs-control {
            width: 3em
        }

        .video-js .vjs-menu-button-inline:before {
            width: 1.5em
        }

        .vjs-menu-button-inline .vjs-menu {
            left: 3em
        }

        .vjs-paused.vjs-has-started.video-js .vjs-big-play-button,.video-js.vjs-ended .vjs-big-play-button,.video-js.vjs-paused .vjs-big-play-button {
            display: block
        }

        .video-js .vjs-load-progress div,.vjs-seeking .vjs-big-play-button,.vjs-waiting .vjs-big-play-button {
            display: none!important
        }

        .video-js .vjs-mouse-display:after,.video-js .vjs-play-progress:after {
            padding: 0 .4em .3em !important
        }

        .video-js.vjs-ended .vjs-loading-spinner {
            display: none;
        }

        .video-js.vjs-ended .vjs-big-play-button {
            display: block !important;
        }

        .video-js *,.video-js:after,.video-js:before {
            box-sizing: inherit;
            font-size: inherit;
            color: inherit;
            line-height: inherit
        }

        .video-js.vjs-fullscreen,.video-js.vjs-fullscreen .vjs-tech {
            width: 100%!important;
            height: 100%!important
        }

        .video-js {
            font-size: 14px;
            overflow: hidden
        }

        .video-js .vjs-control {
            color: inherit
        }

        .video-js .vjs-menu-button-inline:hover,.video-js.vjs-no-flex .vjs-menu-button-inline {
            width: 8.35em
        }

        .video-js .vjs-volume-menu-button.vjs-volume-menu-button-horizontal:hover .vjs-menu .vjs-menu-content {
            height: 3em;
            width: 6.35em
        }

        .video-js .vjs-control:focus:before,.video-js .vjs-control:hover:before {
            text-shadow: 0 0 1em #fff,0 0 1em #fff,0 0 1em #fff
        }

        .video-js .vjs-spacer,.video-js .vjs-time-control {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-flex: 1 1 auto;
            -moz-box-flex: 1 1 auto;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        .video-js .vjs-time-control {
            -webkit-box-flex: 0 1 auto;
            -moz-box-flex: 0 1 auto;
            -webkit-flex: 0 1 auto;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            width: auto
        }

        .video-js .vjs-time-control.vjs-time-divider {
            width: 14px
        }

        .video-js .vjs-time-control.vjs-time-divider div {
            width: 100%;
            text-align: center
        }

        .video-js .vjs-time-control.vjs-current-time {
            margin-left: 1em
        }

        .video-js .vjs-time-control .vjs-current-time-display,.video-js .vjs-time-control .vjs-duration-display {
            width: 100%
        }

        .video-js .vjs-time-control .vjs-current-time-display {
            text-align: right
        }

        .video-js .vjs-time-control .vjs-duration-display {
            text-align: left
        }

        .video-js .vjs-play-progress:before,.video-js .vjs-progress-control .vjs-play-progress:before,.video-js .vjs-remaining-time,.video-js .vjs-volume-level:after,.video-js .vjs-volume-level:before,.video-js.vjs-live .vjs-time-control.vjs-current-time,.video-js.vjs-live .vjs-time-control.vjs-duration,.video-js.vjs-live .vjs-time-control.vjs-time-divider,.video-js.vjs-no-flex .vjs-time-control.vjs-remaining-time {
            display: none
        }

        .video-js.vjs-no-flex .vjs-time-control {
            display: table-cell;
            width: 4em
        }

        .video-js .vjs-progress-control {
            position: absolute;
            left: 0;
            right: 0;
            width: 100%;
            height: .5em;
            top: -.5em
        }

        .video-js .vjs-progress-control .vjs-load-progress,.video-js .vjs-progress-control .vjs-play-progress,.video-js .vjs-progress-control .vjs-progress-holder {
            height: 100%
        }

        .video-js .vjs-progress-control .vjs-progress-holder {
            margin: 0
        }

        .video-js .vjs-progress-control:hover {
            height: 1.5em;
            top: -1.5em
        }

        .video-js .vjs-control-bar {
            -webkit-transition: -webkit-transform .1s ease 0s;
            -moz-transition: -moz-transform .1s ease 0s;
            -ms-transition: -ms-transform .1s ease 0s;
            -o-transition: -o-transform .1s ease 0s;
            transition: transform .1s ease 0s
        }

        .video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-active .vjs-control-bar,.video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-inactive .vjs-control-bar,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-active .vjs-control-bar,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-inactive .vjs-control-bar,.video-js.vjs-has-started.vjs-playing.vjs-user-inactive .vjs-control-bar {
            visibility: visible;
            opacity: 1;
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateY(3em);
            -moz-transform: translateY(3em);
            -ms-transform: translateY(3em);
            -o-transform: translateY(3em);
            transform: translateY(3em);
            -webkit-transition: -webkit-transform 1s ease 0s;
            -moz-transition: -moz-transform 1s ease 0s;
            -ms-transition: -ms-transform 1s ease 0s;
            -o-transition: -o-transform 1s ease 0s;
            transition: transform 1s ease 0s
        }

        .video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-active .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-inactive .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-active .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-inactive .vjs-progress-control,.video-js.vjs-has-started.vjs-playing.vjs-user-inactive .vjs-progress-control {
            height: .25em;
            top: -.25em;
            pointer-events: none;
            -webkit-transition: height 1s,top 1s;
            -moz-transition: height 1s,top 1s;
            -ms-transition: height 1s,top 1s;
            -o-transition: height 1s,top 1s;
            transition: height 1s,top 1s
        }

        .video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-active.vjs-fullscreen .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-paused.vjs-user-inactive.vjs-fullscreen .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-active.vjs-fullscreen .vjs-progress-control,.video-js.not-hover.vjs-has-started.vjs-playing.vjs-user-inactive.vjs-fullscreen .vjs-progress-control,.video-js.vjs-has-started.vjs-playing.vjs-user-inactive.vjs-fullscreen .vjs-progress-control {
            opacity: 0;
            -webkit-transition: opacity 1s ease 1s;
            -moz-transition: opacity 1s ease 1s;
            -ms-transition: opacity 1s ease 1s;
            -o-transition: opacity 1s ease 1s;
            transition: opacity 1s ease 1s
        }

        .video-js.vjs-live .vjs-live-control {
            margin-left: 1em
        }

        .video-js .vjs-big-play-button {
            top: 50%;
            left: 50%;
            margin-left: -1em;
            margin-top: -1em;
            width: 2em;
            height: 2em;
            line-height: 2em;
            border: none;
            border-radius: 50%;
            font-size: 3.5em;
            background-color: rgba(0,0,0,.45);
            color: #fff;
            -webkit-transition: border-color .4s,outline .4s,background-color .4s;
            -moz-transition: border-color .4s,outline .4s,background-color .4s;
            -ms-transition: border-color .4s,outline .4s,background-color .4s;
            -o-transition: border-color .4s,outline .4s,background-color .4s;
            transition: border-color .4s,outline .4s,background-color .4s
        }

        .video-js .vjs-menu-button-popup .vjs-menu {
            left: -3em
        }

        .video-js .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
            background-color: transparent;
            width: 12em;
            left: -1.5em;
            padding-bottom: .5em
        }

        .video-js .vjs-menu-button-popup .vjs-menu .vjs-menu-item,.video-js .vjs-menu-button-popup .vjs-menu .vjs-menu-title {
            background-color: #151b17;
            margin: .3em 0;
            padding: .5em;
            border-radius: .3em
        }

        .video-js .vjs-menu-button-popup .vjs-menu .vjs-menu-item.vjs-selected {
            background-color: #2483d5
        }

        .video-js .vjs-big-play-button {
            background-color: rgba(255,130,16,1);
            font-size: 3.5em;
            border-radius: 50%;
            height: 2em !important;
            line-height: 2em !important;
            margin-top: -1em !important
        }

        .video-js:hover .vjs-big-play-button,.video-js .vjs-big-play-button:focus,.video-js .vjs-big-play-button:active {
            background-color: rgba(255,130,16,1)
        }

        .video-js .vjs-loading-spinner {
            border-color: #000000
        }

        .video-js .vjs-control-bar2 {
            background-color: #ff8210
        }

        .video-js .vjs-control-bar {
            background-color: rgba(255,130,16,1) !important;
            color: #ffffff;
            font-size: 14px
        }

        .video-js .vjs-play-progress,.video-js  .vjs-volume-level {
            background-color: #FFFFFF
        }
    </style>
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
                    <!--<h1 class="font-bold text-xl mb-4"><span class="font-bold">{{$record->uploader->username}}</span>さんの届出</h1>-->
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
                    <video class="video-js w-full vjs-fluid" id="ad-video" type="video/mp4">
                        <source src="{{URL::asset("/media/videos/ichikawa-ad.mp4")}}">
                    </video>
                    <video class="video-js w-full vjs-fluid hidden" id="playback-video" controls type="video/mp4">
                        <source src="https://storage.googleapis.com/onelook-bucket/{{str_replace(' ', '%20', $record->video_path)}}">
                    </video>
                </div>

                <div class="flex flex-col justify-center items-center gap-2 w-full">
                    <div class="flex flex-row justify-between items-start text-center w-full">
                        <div class="flex flex-col justify-start items-start text-sm gap-2">
                            <div class="flex flex-row items-center text-left text-sm gap-2">
                                <span id="contributor-label">投稿者：</span>
                                <span id="contributor"></span>
                            </div>
                            
                            <div class="flex flex-row items-center text-left text-sm gap-2">
                                <span id="email-label">メールアドレス：</span>
                                <span id="email"></span>
                            </div>
                        </div>
                        <div class="flex flex-row justify-center items-center text-center text-sm gap-2">
                            <span>ファイルサイズ:</span>
                            <div class="flex flex-row justify-center items-center text-center text-sm gap-1">
                                <span id="file-size">{{round($record->size/1024/1024, 2, PHP_ROUND_HALF_UP)}}</span>
                                <span id="file-size">MB</span>
                            </div>
                            {{-- <a onclick="downloadVideo({{$record->id}}, this)" class="px-2 py-1 bg-yellow-300 hover:bg-yellow-200 font-semibold text-sky-600 hover:text-blue-400 rounded-md border-b-2 border-r-2 border-neutral-400">ダウンロード</a> --}}
                        </div>
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

        const player = videojs('playback-video', {})
        const advert = videojs('ad-video', {})

        advert.on('ended', function() {
            $('#playback-video').toggle()
            $('#ad-video').toggle()
        })

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
