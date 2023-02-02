@extends('authenticated-user.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - 録画画面はこちらを選択</title>
@endsection
@section('css')
<style>
    #loader {
        border: 12px solid #f3f3f3;
        border-radius: 50%;
        border-top: 12px solid #0d6efd;
        width: 70px;
        height: 70px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }
    .center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>
@endsection
@section('content')
<div id="loader" class="center"></div>
@if(!$video_creation_status)
 <!--content-->
 <div class="flex justify-center items-start text-lg pt-5 w-full">
    <div class="flex flex-col justify-center items-center pt-20 w-full sm:w-3/5 h-full" data-name="pdf-canvas">
        <div class="flex justify-center items-center gap-8">
            <!--<button class="flex items-center text-lg text-cyan-600 font-semibold hover:text-theme-yellow gap-2" id="prev"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg> 前</button>

            <div class="text-lg text-cyan-800 font-semibold">
                ページ: <span id="page-num" class="px-2">0</span> of <span id="page-count" class="px-2">0</span>
            </div>

            <button class="flex items-center text-lg text-cyan-600 font-semibold hover:text-theme-yellow gap-2" id="next">次 <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg></button>-->
        </div>

        <div class="flex justify-center items-center mt-5 text-white w-full">
            <canvas id="pdf-canvas"></canvas>
        </div>
    </div>
    <input type="hidden" id="file_url" name="file_url" class="form-control" placeholder="動画のURLを表示" readonly>

    {{-- <div class="flex flex-col justify-center items-center gap-8 w-80 pt-14 px-2 ml-2 text-left" data-name="toolbox">
        <div class="mb-3 xl:w-96">
            </div>


        </div>
    </div> --}}
</div>

<div class="flex justify-center items-start w-full">
    <!--toolbar-->
    <div class="flex flex-col justify-center items-center fixed left-1/2 -translate-x-1/2 top-0 w-full">
        <nav class="flex shadow text-white bg-sky-400 bg-opacity-80 justify-center items-center px-4 py-2 h-2/5 sm:rounded-b-md tracking-widest w-full z-10"
        id="nav-toolbar-1">
            <div class="flex justify-center items-center gap-4 sm:gap-8">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="pdfSource" data-tooltip-target="pdf-source" data-tooltip-placement="bottom" class="hover:text-theme-yellow">
                        <div class="flex justify-center items-center h-8 w-8">
                            <img src="{{asset('media/button-upload.png')}}"alt="upload-button">
                        </div>
                    </label>
                    <input type="file" id="pdfSource" name="pdfSource" accept=".pdf" hidden/>
                </form>
                <div id="pdf-source" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    録画画面にPDFファイルを表示
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="start" data-tooltip-target="start-recording" data-tooltip-placement="bottom" class="h-8 w-8 hover:text-theme-yellow">
                    <img src="{{asset('media/button-record.png')}}" alt="record-button">
                </button>
                <div id="start-recording" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    録画する画面をえらんでスタート
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="stop" data-tooltip-target="stop-toolbar" data-tooltip-placement="bottom" class="hidden h-8 w-8 hover:text-theme-yellow">
                    <img src="{{asset('media/button-sto.png')}}" alt="record-button">
                </button>
                <div id="stop-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    収録終了
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="preview" data-tooltip-target="preview-toolbar" data-tooltip-placement="bottom" data-modal-toggle="previewModal" class="hidden h-8 w-8 hover:text-theme-yellow">
                    <img src="{{asset('media/button-preview.png')}}" alt="preview-button">
                </button>
                <div id="preview-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    プレビュー
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="completion" data-tooltip-target="save-toolbar" data-tooltip-placement="bottom" class="hidden h-7 w-7 hover:text-theme-yellow">
                    <img src="{{asset('media/button-sav.png')}}" alt="save-button">
                </button>
                <div id="save-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    完了
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="cancel" data-tooltip-target="cancel-toolbar" data-tooltip-placement="bottom" class="hidden h-8 w-8 hover:text-theme-yellow">
                    <img src="{{asset('media/button-cancel.png')}}" alt="cancel-button">
                </button>
                <div id="cancel-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    キャンセル
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="previous-toolbar" class="flex items-center text-base text-sky-800 font-semibold hover:text-theme-yellow gap-2" id="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:flex">前</span>
                </button>
                <div id="previous-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    前
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <div class="flex flex-row text-base text-sky-800 font-semibold">
                    <span class="hidden sm:flex">ページ:</span>
                    <span id="page-num" class="px-2">0</span> of <span id="page-count" class="px-2">0</span>
                </div>

                <button data-tooltip-target="next-toolbar" class="flex items-center text-base text-sky-800 font-semibold hover:text-theme-yellow gap-2" id="next">
                    <span class="hidden sm:flex">次</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div id="next-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    次
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </nav>

        <button onclick="toggleNav1()" class="flex justify-center items-center w-14 bg-theme-orange bg-opacity-80 rounded-b-md">
            <svg id="nav-up" xmlns="http://www.w3.org/2000/svg" class="flex h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
            <svg id="nav-down" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>

    <div class="flex flex-col justify-center items-center fixed left-1/2 -translate-x-1/2 bottom-0 w-full">
        <button onclick="toggleNav2()" class="flex justify-center items-center w-14 bg-theme-orange bg-opacity-80 rounded-t-md">
            <svg id="nav2-up" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
            <svg id="nav2-down" xmlns="http://www.w3.org/2000/svg" class="flex h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <nav class="flex shadow text-white bg-sky-400 bg-opacity-80 justify-center items-center px-4 py-2 h-2/5 sm:rounded-t-md tracking-widest w-full z-10"
        id="nav-toolbar-2">
        <!--sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-1/3-->
            <div class="flex justify-center items-center font-medium text-lg w-full">
                <div class="flex px-8 justify-center items-center gap-4 sm:gap-6">
                    <button id="pointerBtn" onclick="setPointer()" data-tooltip-target="pointer-toolbar" class="h-5 w-5 hover:text-theme-yellow">
                        <img src="{{asset('media/button-pointer.png')}}" alt="pointer-button">
                    </button>
                    <div id="pointer-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        ポインタ
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button id="pencilBtn" onclick="setPencil()" data-tooltip-target="pencil-toolbar" class="h-7 w-7 hover:text-theme-yellow">
                        <img src="{{asset('media/button-pencil.png')}}" alt="pencil-button">
                    </button>
                    <div id="pencil-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        鉛筆
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button id="markerBtn" onclick="setMarker()" data-tooltip-target="marker-toolbar" class="h-7 w-7 hover:text-theme-yellow">
                        <img src="{{asset('media/button-marker.png')}}" alt="marker-button">
                    </button>
                    <div id="marker-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        マーカー
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <input type="color" class="h-8 w-14 bg-sky-400 bg-opacity-0 hover:text-theme-yellow" data-tooltip-target="palette-toolbar" oninput="stroke_color = this.value" list="presetColors" />
                    <datalist id="presetColors">
                        <option>#FFFFFF</option>
                        <option>#FF0000</option>
                        <option>#00FF00</option>
                        <option>#0000FF</option>
                        <option>#FFFF00</option>
                        <option>#FF00FF</option>
                        <option>#00FFFF</option>
                        <option>#800000</option>
                        <option>#FFFFCC</option>
                        <option>#00FFFF</option>
                        <option>#FF9900</option>
                    </datalist>
                    <div id="palette-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        カラーパレット
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button onclick="undoLast()" data-tooltip-target="undo-toolbar" class="h-8 w-8 hover:text-theme-yellow">
                        <img src="{{asset('media/button-undo.png')}}" alt="undo-button">
                    </button>
                    <div id="undo-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        元に戻す
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button id="mute" data-tooltip-target="mute-toolbar" data-tooltip-placement="bottom" class="h-7 w-7 hover:text-theme-yellow">
                        <img id="mute-icon" src="{{asset('media/button-mute.png')}}" alt="mute-button" class="flex">
                        <img id="unmute-icon" src="{{asset('media/button-unmute.png')}}" alt="unmute-button" class="hidden">
                    </button>
                    <div id="mute-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        <span id="mute-label" class="block">ミュート</span>
                        <span id="unmute-label" class="hidden">ミュートを解除する</span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button onclick="zoominBtn()" data-tooltip-target="zoomin-toolbar" class="h-8 w-8 hover:text-theme-yellow">
                        <img src="{{asset('media/button-zoom-in.png')}}" alt="undo-button">
                    </button>
                    <div id="zoomin-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        ズームイン
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <button onclick="zoomOutBtn()" data-tooltip-target="zoomout-toolbar" class="h-8 w-8 hover:text-theme-yellow">
                        <img src="{{asset('media/button-zoom-out.png')}}" alt="undo-button">
                    </button>
                    <div id="zoomout-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        ズームアウトする
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!--toolbar ends here-->
</div>

@else
<div class="flex justify-center items-start text-lg pt-5 w-full">
    <div class="flex flex-col justify-center items-center pt-20 w-full sm:w-3/5 h-full" data-name="pdf-canvas">
        <div class="flex justify-center items-center gap-8">

            <div role="alert">
                {{-- <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2">
                    おっとっと！何かがうまくいかなかった
                </div> --}}
                <div class="border border-t-0 border-yellow-400 rounded-b bg-yellow-100 px-4 py-3 text-yellow-700">
                <p>動画作成の上限に達しています。現在ご利用のプランの確認をお願いします。</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endif
   

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
@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')

    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                "body").style.visibility = "hidden";
                document.querySelector(
                "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                "#loader").style.display = "none";
                document.querySelector(
                "body").style.visibility = "visible";
            }
        };
    </script>

    <script>
        var curr_time = 0;
        var pdf_file = '';
        var imageData_store = [];
        let restore_array = [];
        const prev = document.querySelector('#prev'),
            next = document.querySelector('#next'),
            zoomIn = document.querySelector('#zoomIn'),
            zoomOut = document.querySelector('#zoomOut'),
            page = document.querySelector('#page-num'),
            total_page = document.querySelector('#page-count')
        var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1,
            canvas = document.getElementById('pdf-canvas');
        ctx = canvas.getContext('2d')
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        let mediaRecorder;
        let recordedBlobs;
        var isRecording = false;
        const stopButton = document.querySelector('button#stop');
        const preview = document.querySelector('button#preview');
        const recordedVideo = document.querySelector('video#video');
        const downloadButton = document.querySelector('button#download');

        const completion = document.querySelector('button#completion');
        const muteButton = document.querySelector('button#mute');

        function renderPage(num, result = []) {
            pageRendering = true;
            pdfDoc.getPage(num).then((page) => {
                var viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = viewport.height
                canvas.width = viewport.width
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                }
                if (result.length != 0) {}
                imageData_store.forEach(function(i, key) {
                    ctx.putImageData(imageData_store[key], 0, 0)
                })
                var renderTask = page.render(renderContext)
                renderTask.promise.then(() => {
                    pageRendering = false
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending)
                        pageNumPending = null
                    }
                })
            })
            page.textContent = num
        }

        function zoominBtn() {
            scale = scale + 0.25;
            queueRenderPage(pageNum)
        }

        function zoomOutBtn() {
            scale = scale - 0.25;
            queueRenderPage(pageNum);
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num
            } else {
                renderPage(num)
            }
        }

        function onPrevPage() {
            if (pageNum <= 1) {
                return
            }
            pageNum--
            queueRenderPage(pageNum)
        }

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return
            }
            pageNum++
            var result = imageData_store.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
            queueRenderPage(pageNum, result)
        }
        prev.addEventListener('click', onPrevPage)
        next.addEventListener('click', onNextPage)

        var formData = new FormData()
        const fileInput = document.querySelector('#pdfSource')
        fileInput.onchange = () => {
            formData.append('file', fileInput.files[0])
            var url = "{{ route('get-pdf-source') }}"
            axios.post(url, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    var path = response.data
                    var base_url = "<?php echo env('APP_URL'); ?>"
                    var file_path = base_url + path
                    pdf_file = path
                    pdfjsLib.getDocument(file_path).promise.then((doc) => {
                        pdfDoc = doc
                        total_page.textContent = doc.numPages
                        renderPage(pageNum)
                    })
                })
                .catch(function(error) {
                    console.log(error);
                })
        }

        document.querySelector('button#start').addEventListener('click', async () => {
            Swal.fire({
                title: "OneLookでの録画方法",
                html: '<ol class="text-justify">'+
                    '<li> 1. 共有する内容を選択で「Chromeタブ」を選択 </li>' +
                    '<li> 2.「OneLook（録画画面はこちらを選択）」を選択 </li>' +
                    '<li> 3.「共有ボタン」を押すと録画スタート </li>' +
                    '<li> ★音声ありで録画する場合、左下の「システムの音声を共有」のチェックを外してください。</li>' +
                    '</ol>',
            }).then((result) => {
                const constraints = {
                    video: {
                        width: 1280,
                        height: 720
                    },
                    audio: {
                        echoCancellation: true,
                        noiseSuppression: true,
                        sampleRate: 44100
                    }
                };
                init(constraints);
            })
        })

        async function init(constraints) {
            try {
                const displayStream = await navigator.mediaDevices.getDisplayMedia(constraints);
                const voiceStream = await navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: false
                });
                let tracks = [...displayStream.getTracks(), ...voiceStream.getAudioTracks()]
                const stream = new MediaStream(tracks);
                handleSuccess(stream);

            } catch (e) {
                console.log(e)
            }
        }

        function handleSuccess(stream) {
            window.stream = stream;
            startRecording();
        }

        function startRecording() {
            recordedBlobs = [];
            let options = {
                mimeType: 'video/webm;codecs=vp9,opus'
            };
            try {
                mediaRecorder = new MediaRecorder(window.stream, options);
            } catch (e) {
                console.error('Exception while creating MediaRecorder:', e);
                return;
            }
            stopButton.disabled = false;
            mediaRecorder.onstop = (event) => {
                console.log('Recorder stopped: ', event);
                console.log('Recorded Blobs: ', recordedBlobs);
            };
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
            isRecording = true;
            console.log(window.stream.getAudioTracks());
            if (window.stream.getAudioTracks()) {
                window.stream.getAudioTracks().forEach(function(track) {
                    console.log(track);
                    if (track.enabled) {
                        muteButton.innerHTML = 'ミュートオン';
                    } else {
                        muteButton.innerHTML = 'ミュートオフ';
                    }
                });
            }

            startTimer();
        }


        function startTimer() {
           const timer = setInterval(function () {
                curr_time ++
                console.log(curr_time)
                if(curr_time == 300)
                {
                    stopRecording()
                    clearInterval(timer)
                }
            }, 1000)
        }
        completion.addEventListener('click', () => {
            //TODO : convert 1 sec ad from mp4 to blob
            const blob = new Blob(recordedBlobs, {
                type: 'video/mp4',
            });
            const blobUrl = window.URL.createObjectURL(blob);
            fetch(blobUrl).then(response => response.blob())
            .then(blobs => {
                var form = $('form')[0]; // You need to use standard javascript object here
                const fd = new FormData(form);
                fd.append("file", blobs); // where `.ext` matches file `MIME` type
                var url = "{{ route('save-video-to-database') }}"
                return axios.post(url, fd, {
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
            })
            .then((response) => {
                Swal.fire({
                    title: '成功',
                    text: 'ビデオ録画がストレージに保存されました。 これで、投稿リストページにリダイレクトされます。',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                }).then((result) => {
                    quitBox('quit');
                })
           })
            .catch((error) => {
                console.log(error.response.data);
            });
        })

        stopButton.addEventListener('click', () => {
            stopRecording();

        })

        function stopRecording() {
            curr_time = 0
            window.stream = null;
            setTimeout(() => {
                $("#overlay").fadeIn(300);
                const blob = new Blob(recordedBlobs, {
                    type: 'video/mp4'
                });
                const blobUrl = window.URL.createObjectURL(blob);
                fetch(blobUrl).then(response => response.blob())
                    .then(blobs => {
                        const name = $("#video_title").val();
                        var form = $('form')[0]; // You need to use standard javascript object here
                        const fd = new FormData(form);
                        fd.append("file", blobs); // where `.ext` matches file `MIME` type
                        fd.append('fileName', name);
                        var url = "{{ route('save-video') }}"
                        return axios.post(url, fd, {
                            headers: {
                                "Content-Type": "application/json"
                            }
                        })
                    })
                    .then((response) => {
                        setTimeout(function() {
                            $("#overlay").fadeOut(300);
                        }, 3000);
                        var base_url = "<?php echo env('APP_URL'); ?>"
                        var link = base_url+response.data
                        $("#file_url").val(link);
                        console.log(link);

                    })
                    .catch((error) => {
                        console.log(error.response.data);
                    });
            }, 100);

            mediaRecorder.stop();
            isRecording = false;
            Swal.fire({
                icon: 'warning',
                title: '録画完了',
                showConfirmButton: false,
                timer: 1000
            })
        }

        muteButton.addEventListener('click', () => {
            if (window.stream) {
                window.stream.getAudioTracks().forEach(function(track) {
                    console.log(track)
                    console.log(track.enabled)
                    if (track.enabled) {
                        Swal.fire({
                            icon: 'info',
                            title: 'ミュートオン!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        muteButton.innerHTML = 'ミュートオン';
                        track.muted = false;
                        track.enabled = false;
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'ミュートオフ!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        muteButton.innerHTML = 'ミュートオフ';
                        track.muted = true;
                        track.enabled = true;
                    }
                });
            }
        });
        preview.addEventListener('click', () => {
            const blob = new Blob(recordedBlobs, {
                type: 'video/mp4'
            });
            var video = document.getElementById("video")
            video.src = window.URL.createObjectURL(blob);
            const modal = document.querySelector('#previewModal')

            console.log(video.src)
        });

        // pause_play.addEventListener('click', function() {
        //     if (isRecording) {
        //         mediaRecorder.pause();
        //         isRecording = false;
        //         pause_play.innerHTML = '再開';

        //         Swal.fire({
        //             icon: 'info',
        //             title: '一時停止中!',
        //             showConfirmButton: false,
        //             timer: 1000
        //         })
        //     } else {
        //         Swal.fire({
        //             icon: 'info',
        //             title: '録画再開中!',
        //             showConfirmButton: false,
        //             timer: 1000
        //         }).then((result) => {
        //             mediaRecorder.resume();
        //             isRecording = true;
        //             pause_play.innerHTML = "一旦停止";
        //         })
        //     }
        // })

        function cancelButton(id) {
            Swal.fire({
                icon: 'info',
                title: '録画をキャンセルしてよろしいですか？',
            }).then((result) => {
                var current_url = "{{ dirname(url()->current()) }}";
                var url = current_url + "/dashboard?client_id=" + id;
                window.location = url;
            })
        }

        function handleDataAvailable(event) {
            console.log('handleDataAvailable', event);
            if (event.data && event.data.size > 0) {
                recordedBlobs.push(event.data);
            }
        }

        var context = ctx
        let start_index = -1
        let stroke_color = 'black'
        let stroke_width = "2"
        let is_drawing = false

        function change_color(element) {
            stroke_color = element.style.background;
        }

        function change_width(element) {
            stroke_width = element.innerHTML
        }

        function setPointer() {
            stroke_color = 'transparent'
            if (canvas.classList.contains('change-cursor')) {
                canvas.classList.remove('change-cursor');
            } else {
                canvas.classList.add('change-cursor');
            }

        }

        function setPencil() {
            canvas.classList.remove('change-cursor');
            stroke_color = 'black'
            stroke_width = "2"
        }

        function setMarker() {
            canvas.classList.remove('change-cursor');
            stroke_color = 'yellow'
            stroke_width = "10"
            context.globalCompositeOperation = "multiply";
            context.fillStyle = '#ff0'
        }

        $('button').click(function() {
            $('button').removeClass('active')
            $(this).addClass('active')
        })

        function start(event) {
            is_drawing = true;
            context.beginPath();
            context.moveTo(getX(event), getY(event));
            event.preventDefault();
        }

        function draw(event) {
            if (is_drawing) {
                context.lineTo(getX(event), getY(event));
                context.strokeStyle = stroke_color;
                context.lineWidth = stroke_width;
                context.lineCap = "round";
                context.lineJoin = "round";
                context.stroke();
            }
            event.preventDefault();
        }

        function stop(event) {
            if (is_drawing) {
                context.stroke();
                context.closePath();
                is_drawing = false;
            }
            event.preventDefault();
            restore_array.push(context.getImageData(0, 0, canvas.width, canvas.height));
            start_index += 1;
        }

        function getX(event) {
            if (event.pageX == undefined) {
                return event.targetTouches[0].pageX - canvas.offsetLeft
            } else {
                return event.pageX - canvas.offsetLeft
            }
        }

        function getY(event) {
            if (event.pageY == undefined) {
                return event.targetTouches[0].pageY - canvas.offsetTop
            } else {
                return event.pageY - canvas.offsetTop
            }
        }
        canvas.addEventListener("touchstart", start, false);
        canvas.addEventListener("touchmove", draw, false);
        canvas.addEventListener("touchend", stop, false);
        canvas.addEventListener("mousedown", start, false);
        canvas.addEventListener("mousemove", draw, false);
        canvas.addEventListener("mouseup", stop, false);
        canvas.addEventListener("mouseout", stop, false);

        function clearCanvas() {
            queueRenderPage(pageNum)
            restore_array = []
            start_index = -1
        }

        function undoLast() {
            if (start_index <= 0) {
                clearCanvas()
            } else {
                start_index -= 1
                restore_array.pop()
                context.putImageData(restore_array[start_index], 0, 0)
            }
        }

        function Clear() {
            context.fillStyle = "white";
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.fillRect(0, 0, canvas.width, canvas.height);
            restore_array = [];
            start_index = -1;
        }

        $(document).ready(function() {
            $('#video-maker-tab').addClass('active');
            $('#m-video-maker-tab').addClass('active');
        });

        $('#mute').on('click', function() {
            $('#mute-icon').toggle();
            $('#unmute-icon').toggle();
            $('#mute-label').toggle();
            $('#unmute-label').toggle();
        });

        $('#mute').on('click', function() {
            $('#mute-icon').toggle();
            $('#unmute-icon').toggle();
            $('#mute-label').toggle();
            $('#unmute-label').toggle();
        });

        $('#start').on('click', function() {
            $('#stop').fadeIn();
        });

        $('#stop').on('click', function() {
            $('#preview').fadeIn();
            $('#completion').fadeIn();
            $('#cancel').fadeIn();
        });

        $('#cancel').on('click', function() {
            $('#stop').fadeOut();
            $('#preview').fadeOut();
            $('#completion').fadeOut();
            $('#cancel').fadeOut();
        });

        function toggleNav1() {
            $('#nav-toolbar-1').slideToggle();
            $('#nav-up').toggle();
            $('#nav-down').toggle();
        }

        function toggleNav2() {
            $('#nav-toolbar-2').slideToggle();
            $('#nav2-up').toggle();
            $('#nav2-down').toggle();
        }

        $('#pointerBtn').on('click', function() {
            //$('#pdf-canvas').css('cursor', 'wait');
        });


    function quitBox(cmd) 
    {      
        if (cmd=='quit')    
        {   
            window.opener.location.href="{{route('post-list')}}";
            window.open(location, '_self').close();    
        }     
        return false;   
    }
    </script>
    <!--scripts ends here-->
@endsection
