@component('mail::message')
# {{$user->name}}　様

パスワードをリセットするため、仮パスワードを発行いたしました。<br>
以下のURLからアクセスして新しいパスワードを設定してください。<br>
<br>
<hr>
https://onelook.jp/first-time-login?token={{$user->email_verification_token}} <br>
<br>
仮パスワード： uW1AVzzh <br>
<hr>
<br>
このメールは送信専用です。<br>
ご不明点等は当社WEBサイトよりお問い合わせください。<br>
<br>
<hr>
◆ OneLook.jp ◆ <br>
百聞は一見に如かず <br>
https://onelook.jp/ <br>
@endcomponent
