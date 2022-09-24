@component('mail::message')

# {{$user->email}}（メールアドレス）　様
<br>
OneLook.jpをご利用いただきありがとうございます。 <br>
以下の通りプランの変更申込みを承りました。 <br>
<br>
<hr>
変更前：{{$old_plan}} <br>
変更後：{{$updated_plan}} <br>
申込日時：{{$date}} <br>
<hr>
<br>
このメールは送信専用です。 <br>
ご不明点等は当社WEBサイトよりお問い合わせください。 <br>
<br>
<hr>
◆ OneLook.jp ◆ <br>
百聞は一見に如かず <br>
https://onelook.jp/ <br>
@endcomponent
