
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
    <div>
        <h1 class="text-center text-3xl font-bold text-cyan-600 pb-10 pt-20">領収リスト</h1>
    </div>
    
    <div class="flex justify-center items-center">
        <table class="text-center w-1/2 border border-sky-700">
            <thead>
                <tr>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">ご購入日</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">領収日</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">説明</th>
                    <th class="px-1 py-1 border-x border-y border-cyan-600">ご請求金額</th>
                </tr>
            </thead>
            <tbody>
                @inject('carbon', 'Carbon\Carbon')
                @forelse($billingStatementList as $billingStatement)
                <tr>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->created_at->format('Y-m-d')}}</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->created_at->format('Y-m-d')}}</td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">
                        <a href="/payment-history-2/{{$billingStatement->id}}" class="text-cyan-600 underline underline-offset-1 hover:text-theme-yellow">有料サービス ( {{$billingStatement->created_at->format('Y年m月d日H:i')}} - {{$carbon::parse($billingStatement->ends_at)->format('Y年m月d日H:i')}} )</a>
                    </td>
                    <td class="px-1 py-1 border-x border-y border-cyan-600">{{$billingStatement->stripe_price}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                            表示するレコードがありません
                    </td>
                   
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-center items-center w-screen">
        <div class="justify-end items-center w-1/2">
            <div class="float-right w-1/5 mr-3 mb-4">
                <button class="container px-4 py-2 mt-4 bg-theme-yellow hover:bg-yellow-300 text-theme-white rounded-md">変更</button>
            </div>
        </div>
    </div>

    <div class="pt-40"></div>
@endsection
    <!--content ends here-->
@section('foot')
    @include('authenticated-user.components.foot')
@endsection


@section('js')
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
<!--script ends here-->

@endsection

