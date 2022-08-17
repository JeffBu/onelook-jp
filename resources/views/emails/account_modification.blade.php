@component('mail::message')
# （{{$user->email}}）　様
<br>
OneLook.jpをご利用いただきありがとうございます。<br>
会員情報に変更がありましたのでお知らせいたします。<br>
<br>
<hr>
変更後の会員情報は以下です。<br>
・会社名：{{$user->name}} <br>
・氏名：{{$user->account->company}} <br>
・メールアドレス：{{$user->email_address}} <br>
・閲覧期限の通知：あり <br>
{{-- orなし <br> --}}
・変更日時：{{$user->updated_at->format('Y/m/d H:i')}} <br>
<hr>
このメールは送信専用です。 <br>
ご不明点等は当社WEBサイトよりお問い合わせください。 <br>
<br>
◆ OneLook.jp ◆ <br>
百聞は一見に如かず <br>
https://onelook.jp/ <br>
@endcomponent
