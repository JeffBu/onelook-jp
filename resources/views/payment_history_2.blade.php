<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css" />


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
    @inject('carbon', 'Carbon\Carbon')
    <!--header-->
    <header class="flex shadow bg-sky-600 justify-between items-center py-5 px-5 h-11 tracking-widest fixed w-full z-50"
    id="header-frame">

        <div class="items-center w-32">
            <div class="font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

        <div class="flex justify-center items-start gap-7 py-6 font-small text-sm font-bold text-theme-white w-full">
            <a href="{{route('dashboard')}}" id="home-tab">ホーム</a>
            <a href="{{route('video-creation')}}" id="video-maker-tab">ムービー作成</a>
            <a href="{{route('post-list')}}" id="post-list-tab">投稿リスト</a>
            <a href="{{route('membership-info')}}" id="member-tab">会員情報</a>
            <a href="#" id="faq-tab">FAQ</a>
        </div>

        <div class="items-center w-32">
            <div class="hidden font-semibold text-theme-white text-xl">{{config('app.name')}}</div>
        </div>

    </header>
    <!--header ends here-->

    <!--content-->
    <div  id="divPrintPDF" style="background-color: white;" class="flex justify-center items-center pt-20" >
        <div class="flex justify-center items-center" id="divPrint" style="width: fit-content; background-color:white;"  >
            <table class="text-center border border-sky-700 border-2">
                <thead>
                    <tr>
                        <th colspan="2" class="px-1 py-1 border-x border-y border-cyan-600" style="">
                            <div class="" style="display: flex; align-items: center; justify-content: center;">
                                <img src="{{asset('media/logos/2.png')}}" alt="onelook_logo" class="h-11 mt-1" id="onelook_logo">
                            </div>
                            <h2>請求書　兼　領収書</h2>
                        </th>
                        <th rowspan="4" class="px-1 py-1 border-x border-y border-cyan-600 w-2/5">
                            <div class="font-medium">
                                <p>株式会社モアジョブ<br></p>
                                <p>〒530-0044　<br></p>
                                <p>大阪府大阪市北区東天満2－6－7<br></p>
                                <p>南森町東一号館8階<br></p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">宛先</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">支払日</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    </tr>

                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$subscriber->address}}</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$subscriptionList->created_at->format('Y-m-d')}}</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    </tr>
                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$subscriber->company}}</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    </tr>

                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$user->name}}</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                    </tr>

                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">製品</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">種別</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">金額（税込）</td>
                    </tr>

                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">有料サービス ( {{$subscriptionList->created_at->format('Y年m月d日H:i')}} - {{$carbon::parse($subscriptionList->ends_at)->format('Y年m月d日H:i')}} )</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">ダウンロード会員</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$subscriptionList->stripe_price}}</td>
                    </tr>

                    <tr>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">合計</td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600"></td>
                        <td class="px-1 py-1 border-x border-y border-cyan-600">{{$subscriptionList->stripe_price}}</td>
                    </tr>
                </tbody>
            </table>
        </div><br>
    </div>
    <div class="flex space-x-2 justify-center pt-2" >
        <div>
          <button id="btnprint" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                印刷する
          </button>
          <button id="btnDownloadPDF" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
              ダウンロード
          </button>

        </div>
      </div>
    <div class="pt-40"></div>
    <!--content ends here-->

    <!--script-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
    <!-- SweetAlerts CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    
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
            $('#member-tab').addClass('active');
        });

        $(document).scroll(function() {})

    </script>
    <script>
        document.getElementById("btnprint").addEventListener("click", function() {
            var printContents = document.getElementById('divPrint').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            document.location.reload();
        });

        document.getElementById("btnDownloadPDF").addEventListener("click", function() {

            var HTML_Width = 520;
            var HTML_Height = 300;
            var top_left_margin = 50;
            var PDF_Width = HTML_Width;
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($("#divPrint")[0]).then(function (canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', 'letter');
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) { 
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', canvas_image_width, canvas_image_height);
                }
                pdf.save("Invoice-onelook.pdf");
            });

        });
    </script>
    <!--script ends here-->
</body>
</html>
