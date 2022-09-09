@component('mail::message')
# {{$user->email}}　様

OneLook.jpをご利用いただきありがとうございます。<br>
<br>
{{$user->name}} 様へのご連絡です。<br>
<hr>
{!!$content!!} <br>
<br>
投稿日時：{{date('Y-m-d H:i:s')}} <br>
<hr>
このメールは送信専用です。 <br>
ご不明点等は当社WEBサイトよりお問い合わせください。 <br>
<br>
◆ OneLook.jp ◆<br>
百聞は一見に如かず<br>
https://onelook.jp/ <br>
@endcomponent
