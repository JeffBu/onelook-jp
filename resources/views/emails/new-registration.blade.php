@component('mail::message')
# 【OneLook】ユーザー登録のお知らせ

{{$target_name}} 様

OneLook.jpにご登録いただきありがとうございます。<br>
以下のURLからアクセスしてログイン情報を設定してください。<br>
<hr>
{{$url}} <br><br>
ログインIDは本メールアドレスです。<br>
（ログイン時にパスワードの設定をお願いしております）
<hr>
<br>
このメールは送信専用です。<br>
ご不明点等は当社WEBサイトよりお問い合わせください。<br>
<br>
◆ OneLook.jp ◆<br>
百聞は一見に如かず<br>
https://onelook.jp/ <br>
@endcomponent
