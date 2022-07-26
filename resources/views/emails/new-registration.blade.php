@component('mail::message')
# Your account has been registered!

Dear {{$target_name}},

Welcome to Onelook.jp - an online video sharing platform. In order to continue with your account, you need to verify your email address and update your password. <br />
Click this button below or copy this link to proceed:
{{$url}}

@component('mail::button', ['url' => $url])
Update Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
