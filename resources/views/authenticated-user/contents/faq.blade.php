@extends('authenticated-user.components.layout')@section('page-title')
<title>{{config('app.name')}} - FAQ</title>
@endsection
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-start text-lg w-full">
        <!--<div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>-->
        <div class="flex flex-col w-11/12 md:w-3/5">

            <div class="flex-1 justify-center items-center pt-16 mt-3">
                <div class="flex flex-col justify-center items-center scroll-mt-24 gap-8 w-full" id="home">
                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>OneLookはどういうサービスですか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>OneLookは、PDFなどのファイルについての説明動画を作成、共有することができるクラウドサービスです。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>説明動画はどうやって作りますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>ログイン後、ムービー作成から簡単につくることができます。 資料を表示してポイントしながら言葉でコメントした動画作成が簡単にできます。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>共有はどうやってしたらいいですか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>動画リストで、閲覧URLのリンクをコピーして共有するか、閲覧者に動画への招待メールを直接送ることができます。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>どうやって閲覧しますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>作成者から、動画URLとパスコードの共有を受けてください。 動画URLでパスコードを入力すると、閲覧することができます。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>動画の保存期間はどうなっていますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>フリープランで3日、パーソナルプランで7日間、保存されます。 期間を過ぎた動画は自動的に削除されます。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>動画のダウンロードはできますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>パーソナルプランを選択されている場合にはダウンロードすることができます。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>動画の作成の制限はありますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <div>
                                <span>フリープランで最大</span>
                                <span class="text-red-600 font-semibold">3</span>
                                <span>分（月間5件まで）、パーソナルプランで最大</span>
                                <span class="text-red-600 font-semibold">10</span>
                                <span>分（月間100件まで）の作成が可能です。</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>フリープランとパーソナルプランの違いは何ですか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>こちらの会員表でご確認ください。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>ビジネスプランとは何ですか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>ビジネスプランは、自社専用のOneLookを構築するプランです。 自社用の管理者画面やセキュリティの強化、保管期限、会員の管理などのカスタムプランになります。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>どんな動画も作成・共有できるのですか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>利用規約に従った利用をお願いしております。 利用規約に違反した動画については、運営にて削除される場合があります。 また警告に従っていただけない場合にはアカウントを停止する場合もあります。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>パーソナルプランの申込時の注意点を教えてください。</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <div>
                                <span>パーソナルプランの申込の場合、変更申込日の翌月から料金が課金されます。 なお、変更申込以後はパーソナルプランの機能のご利用が可能です。 パーソナルプランの解約は、申込日の翌月</span>
                                <span class="text-red-600 font-semibold">2</span>
                                <span>日以後から可能です。</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>パーソナルプランの解約時の注意点を教えてください。</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>パーソナルプランの解約時の料金変更は、パーソナルプランの解約の申込日の翌月以後の請求から反映されます。 なお、変更日以後は、新規の動画作成にあたっては、パーソナルプランの機能のご利用はできなくなります。</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-6 gap-6 w-full border border-sky-700 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-700 rounded-t-md"></span>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-12 w-12">
                            <span>動画のアップロード機能はありますか？</span>
                        </div>
                        <div class="flex flex-row items-start px-6 gap-4 w-full">
                            <img src="{{asset('media/yellow-a.png')}}" alt="" class="h-12 w-12">
                            <span>現在はアップロード機能はありません。作成した動画のみを閲覧対象としています。</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-32"></div>
    <!--content ends here-->
@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#faq-tab').addClass('active');
            $('#m-faq-tab').addClass('active');
        });

    </script>
    <!--scripts ends here-->
@endsection
