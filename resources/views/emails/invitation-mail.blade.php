@component('mail::message')
#  {{$user->name}} さんが、あなたを動画閲覧に招待しています。

<p>
    <span class="font-bold">動画URL :</span> {{$url}} <br />
    <span class="font-bold">パスコード: </span> {{$access_code}} <br />
    <span class="font-bold">有効期限：</span> {{$record->created_at->modify('+7 days')->format('Y/m/d　H:i')}} <br />
    <span class="text-slate-800">上記URLをクイックして、パスコードを入力すると、動画を閲覧することができます。</span>
</p>
<br />
<hr>
<br />
<p>
    {{$user->name}} 様が入力したEメールアドレスに、OneLook送信専用アドレスより送信しています。
</p>

Thanks,<br>
{{ config('app.name') }} サポート
@endcomponent
