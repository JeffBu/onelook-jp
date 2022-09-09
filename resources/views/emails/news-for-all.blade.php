@component('mail::message')
# {{$user->name}}　様

OneLook.jpをご利用いただきありがとうございます。 <br>
<br>
会員みなさんへのお知らせです。<br>
<hr>
{!!$content!!}
<br>
投稿日時：{{date('Y-m-d H:i:s')}}
<hr>
<br>
このメールは送信専用です。<br>
ご不明点等は当社WEBサイトよりお問い合わせください。<br>
<br>
◆ OneLook.jp ◆ <br>
百聞は一見に如かず <br>
https://onelook.jp/
@endcomponent
