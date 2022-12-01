    @inject('carbon', 'Carbon\Carbon')
    @extends('authenticated-user.components.layout')
    @section('page-title')
        <title>{{config('app.name')}} - Records</title>
    @endsection
    @section('css')
    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 1px;
        }
        #tbl_id tbody tr td{
            border: solid 1px;
        }
    </style>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0; border: 1px solid; border-color: #0080ff;}
        .tg td{border-color:#0080ff;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px; overflow:hidden;padding:10px 20px;word-break:normal;}
        .tg th{border-color:#0080ff;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 20px;word-break:normal; border: 1px solid; border-color: #0080ff;}
        .tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle; border: 1px solid; border-color: #0080ff;}
        .tg .tg-exfh{border-color:inherit;color:#2A221B;font-weight:bold;text-align:center;vertical-align:middle; border: 1px solid; border-color: #0080ff;}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top; border: 1px solid; border-color: #0080ff;}
        .tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top; border: 1px solid; border-color: #0080ff;}
        .tg .tg-7hcj{border-color:inherit;color:#2A221B;text-align:right;vertical-align:middle; border: 1px solid; border-color: #0080ff; }
        .tg .tg-dcdw{border-color:inherit;color:#2A221B;text-align:center;vertical-align:middle; border: 1px solid; border-color: #0080ff;}
        .tg .tg-yz93{border-color:inherit;text-align:right;vertical-align:middle; border: 1px solid; border-color: #0080ff;}
        .tg .tg-eyrm{border-color:inherit;color:#2A221B;text-align:left;vertical-align:middle; border: 1px solid; border-color: #0080ff;}
    </style>
    @endsection
    @section('head')
        @include('authenticated-user.components.head')
    @endsection
    @section('content')

    <!--content-->
    <div  id="divPrintPDF" class="flex justify-center items-center pt-20" >
        <div class="flex justify-center items-center" id="divPrint" style="width: fit-content; background-color:white;"  >
              <table class="tg" style="undefined;table-layout: fixed; width: 1007px">
                <colgroup>
                <col style="width: 366px">
                <col style="width: 219px">
                <col style="width: 165px">
                <col style="width: 257px">
                </colgroup>
                <thead>
                  <tr>
                    <th class="tg-0pky" rowspan="4">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <img src="{{asset('media/logos/2.png')}}" alt="onelook_logo" class="h-30 w-60 mt-8" id="onelook_logo">
                        </div>
                        <div class="text-center">
                            <h3><b>請求書　兼　領収書</b></h3>
                        </div>
                        
                    </th>
                    <th class="tg-dvpl" colspan="2">発行日：</th>
                    <th class="tg-dvpl">{{$carbon::now()->format('Y年m月d日')}}</th>
                  </tr>
                  <tr>
                    <th class="tg-dvpl" colspan="3">株式会社モアジョブ</th>
                  </tr>
                  <tr>
                    <th class="tg-dvpl" colspan="3">---</th>
                  </tr>
                  <tr>
                    <th class="tg-7hcj" colspan="3">〒530-0044<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;大阪府大阪市北区東天満2－6－7<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;南森町東一号館8階</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="tg-7hcj">支払日</td>
                    <td class="tg-dcdw" colspan="3">{{$subscriptionList->created_at->format('Y年m月d日')}}</td>
                  </tr>
                  <tr>
                    <td class="tg-yz93">会社名</td>
                    <td class="tg-dcdw" colspan="3">@if(!empty($subscriber->company)) {{$subscriber->company}} @else -- @endif</td>
                  </tr>
                  <tr>
                    <td class="tg-yz93">氏名</td>
                    <td class="tg-dcdw" colspan="3">{{$user->name}}</td>
                  </tr>
                  <tr>
                    <td class="tg-7hcj">サービス種別</td>
                    <td class="tg-dcdw" colspan="3">パーソナルプラン（{{$_subs_type}}）</td>
                  </tr>
                  <tr>
                    <td class="tg-yz93">サービス内容</td>
                    <td class="tg-dcdw" colspan="3">支払日から１ヶ月または１年</td>
                  </tr>
                  <tr>
                    <td class="tg-eyrm" rowspan="4" style="text-align: center">領収金額の内訳</td>
                    <td class="tg-exfh">税率</td>
                    <td class="tg-exfh">税込価格</td>
                    <td class="tg-exfh">消費税額</td>
                  </tr>
                  <tr>
                    <td class="tg-dcdw">8％部分</td>
                    <td class="tg-eyrm"> ---</td>
                    <td class="tg-lboi">---</td>
                  </tr>
                  <tr>
                    <td class="tg-dcdw">10％部分</td>
                    <td class="tg-eyrm"> ---</td>
                    <td class="tg-lboi"> ---</td>
                  </tr>
                  <tr>
                    <td class="tg-dcdw">合計</td>
                    <td class="tg-eyrm">¥{{$subscription_price}}</td>
                    <td class="tg-lboi"> ---</td>
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
    @endsection
    @section('foot')
        @include('authenticated-user.components.foot')
    @endsection
    @section('js')
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
    @endsection
