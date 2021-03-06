<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="items-center w-32">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>

        <div class="flex justify-center items-start gap-7 py-6 font-medium text-lg text-theme-white w-full">
            <a href="#" id="home-tab">Home</a>
            <a href="#" id="video-maker-tab">Video Maker</a>
            <a href="#" id="post-list-tab">Post List</a>
            <a href="#" id="member-tab">Member</a>
            <a href="#" id="info-tab">Information</a>
            <a href="#" id="faq-tab">FAQ</a>
        </div>

        <div class="items-center w-32">
            <div class="flex items-center justify-center font-medium text-right text-theme-white text-lg hover:text-theme-yellow gap-2 cursor-pointer">user <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-start text-lg pt-5 w-full">
        <div class="flex-1 justify-center items-center px-8 pt-20 mt-3" data-name="pdf-canvas">
            <div class="flex justify-center items-center gap-8 pb-8">
                <button class="flex items-center text-lg text-cyan-600 font-semibold hover:text-theme-yellow gap-2" id="prev"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg> Previous</button>

                <div class="text-lg text-cyan-800 font-semibold">
                    Page: <span id="page-num" class="px-2"></span> / <span id="page-count" class="px-2"></span>
                </div>

                <button class="flex items-center text-lg text-cyan-600 font-semibold hover:text-theme-yellow gap-2" id="next">Next <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg></button>
            </div>

            <canvas id="pdf-canvas" style="width: 100%; height: auto; margin:0 auto;"></canvas>
        </div>
        <div class="flex flex-col justify-center items-center gap-8 w-80 pt-14 px-2 ml-2 text-left" data-name="toolbox">
            <div class="mb-3 xl:w-96">
                <div>
                    <form action="" method="post" id="pdfsourceform" enctype="multipart/form-data">
                    @csrf
                    <label for="pdfSource" class="form-label inline-block mb-2 text-gray-700">PDF Source</label>
                    <input
                    type="file"
                    name="pdfSource"
                    id="pdfSource"
                    accept=".pdf"
                    class="
                        form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    "/>
                    </form>
                </div>
                <div class="mt-3">
                    <div class="mb-3 xl:w-96">
                    <label for="video_title" class="form-label inline-block mb-2 text-gray-700"
                      >???????????????</label
                    >
                    <input
                      type="text"
                      class="
                        form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                      "
                      id="video_title"
                      name="video_title"
                      placeholder="???????????????"
                    />
                  </div>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="start">?????????????????????????????????????????????</button>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="mute">
                        ????????????
                    </button>
                </div>
                <div class="mt-3">
                    <label for="tools" class="form-label inline-block mb-2 text-gray-700">???????????????</label>
                </div>
                <div class="mt-1">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" onclick="setPointer()" id="pointerBtn"><i
                        class="fas fa-circle text-danger"></i> ????????????</button>
                </div>
                <div class="mt-1">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" onclick="setPencil()" type="button"
                        id="pencilBtn"><i class="fas fa-pencil-alt"></i> ??????</button>
                </div>
                <div class="mt-1">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" onclick="setMarker()" type="button"
                        id="markerBtn"><i class="fas fa-marker text-warning"></i> ????????????</button>
                </div>
                <div class="mt-2">
                    <div class="row">
                        <div class="col-3">
                            <label>Color</label>
                        </div>
                        <div class="col-9">
                            <input type="color" oninput="stroke_color = this.value" list="presetColors">
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
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded button-block" onclick="undo_last()">
                        <i class="fas fa-undo"></i>
                        ????????????
                    </button>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="pause">
                        ????????????</button>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="stop"><i class="fa fas-circle-stop"></i>
                        ????????????</button>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="preview" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                </div>
                <input type="hidden" id="file_url" name="file_url" class="form-control" placeholder="?????????URL?????????"
                    readonly>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" id="completion">??????</button>
                </div>
                <div class="mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block" onclick='cancelButton()'>???????????????</button>
                </div>
            </div>
        </div>
    </div>

    <!--toolbar-->
    <nav class="flex shadow bg-sky-600 bg-opacity-80 justify-center items-center py-5 px-5 h-11 rounded-t-md tracking-widest fixed left-1/2 -translate-x-1/2 bottom-0 w-8/12 z-50"
    id="nav-toolbar">

        <div class="items-center w-32"></div>

        <div class="flex justify-center items-center py-6 font-medium text-lg text-theme-white divide-x divide-x-theme-orange w-full">
            <div class="flex px-8 justify-center items-center gap-3">

                <button data-tooltip-target="pdf-source" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg></button>
                <div id="pdf-source" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Upload PDF File
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <input type="text" placeholder="?????????" class="h-8 text-theme-black border-2 border-transparent focus:border-theme-yellow">

                <button data-tooltip-target="start-recording" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg></button>
                <div id="start-recording" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Start Recording
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="mute-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                </svg></button>
                <div id="mute-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Mute
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div class="flex px-8 justify-center items-center gap-3">
                <button data-tooltip-target="pointer-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 01M20 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></button>
                <div id="pointer-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Pointer
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="pencil-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg></button>
                <div id="pencil-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Pencil
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="marker-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg></button>
                <div id="marker-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Marker
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button class="border-2 border-theme-white bg-theme-yellow h-5 w-5"></button>

            </div>

            <div class="flex px-8 justify-center items-center gap-3">
                <button data-tooltip-target="undo-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg></button>
                <div id="undo-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Undo
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="pause-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></button>
                <div id="pause-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Pause
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="view-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg></button>
                <div id="view-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    View
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="stop-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                </svg></button>
                <div id="stop-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Stop
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="save-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></button>
                <div id="save-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Save
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="cancel-toolbar" class="hover:text-theme-yellow"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></button>
                <div id="cancel-toolbar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs text-theme-white bg-neutral-700 rounded-md shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Cancel
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>

        <div class="items-center w-32"></div>

    </nav>
    <!--toolbar ends here-->

    <!-- Video Playback Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLgLabel">
                Preview
              </h5>
              <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <video width="100%" height="400" id="video" controls>
                    <source src="" type="video/mp4">
                </video>
            </div>
          </div>
        </div>
      </div>
      <!-- End Video Playback Modal -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
    <!-- SweetAlerts CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

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
            scale = 1.5,
            canvas = document.getElementById('pdf-canvas');
        ctx = canvas.getContext('2d')
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        let mediaRecorder;
        let recordedBlobs;
        var isRecording = false;
        const stopButton = document.querySelector('button#stop');
        const recordedVideo = document.querySelector('video#video');
        const downloadButton = document.querySelector('button#download');
        const pause_play = document.querySelector('button#pause');
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
                title: "??????????????????????????????",
                text: 'upfiling.jp????????????????????????????????????????????????????????????1. Chrome?????? 2.upfiling.jp????????? 3. ??????????????????????????????????????????4. ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????'
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
                        muteButton.innerHTML = '??????????????????';
                    } else {
                        muteButton.innerHTML = '??????????????????';
                    }
                });
            }
        }

        completion.addEventListener('click', () => {
            // var vid_url = $('#file_url').val();
            // var video_title = $("#video_title").val();
            // if (vid_url != '') {
            //     var url = "{{ route('save-url-to-database') }}"
            //     axios.post(url, {
            //         video_url: vid_url,
            //         client: client_id,
            //         name: video_title
            //     }).then(function(response) {
            //         Swal.fire({
            //             icon: 'success',
            //             title: "?????????????????????????????????",
            //             showConfirmButton: false,
            //             timer: 1000
            //         }).then((result) => {
            //             var target = response.data
            //             window.location = target;
            //         })
            //     }).catch(function(error) {
            //         console.log(error)
            //     })
            // }
        })

        stopButton.addEventListener('click', () => {
            stopRecording();
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
                        $("#file_url").val(response.data);
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                    });
            }, 100);
        })

        function stopRecording() {
            mediaRecorder.stop();
            isRecording = false;
            Swal.fire({
                icon: 'warning',
                title: '????????????',
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
                            title: '??????????????????!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        muteButton.innerHTML = '??????????????????';
                        track.muted = false;
                        track.enabled = false;
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: '??????????????????!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        muteButton.innerHTML = '??????????????????';
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
            var video = document.getElementById("video");
            video.src = window.URL.createObjectURL(blob);

        });

        pause_play.addEventListener('click', function() {
            if (isRecording) {
                mediaRecorder.pause();
                isRecording = false;
                pause_play.innerHTML = '??????';

                Swal.fire({
                    icon: 'info',
                    title: '???????????????!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else {
                Swal.fire({
                    icon: 'info',
                    title: '???????????????!',
                    showConfirmButton: false,
                    timer: 1000
                }).then((result) => {
                    mediaRecorder.resume();
                    isRecording = true;
                    pause_play.innerHTML = "????????????";
                })
            }
        })

        function cancelButton(id) {
            Swal.fire({
                icon: 'info',
                title: '??????????????????????????????????????????????????????',
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

        function undo_last() {
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

    </script>

    <script>
        jQuery(document).ready(function(){
            $('#video-maker-tab').addClass('active');

            jQuery('#home-tab').on('click', function() {
                $('#home-tab').addClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#video-maker-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').addClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#post-list-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').addClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#member-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').addClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#info-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').addClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#faq-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').addClass('active');
            });
        });

        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });

        $(document).scroll(function() {})
    </script>
</body>
</html>
