@component('mail::message')
# {{$sender->name}} has sent you an inquiry.

{!! nl2br($content)!!}

<hr>
Reply to: {{$sender->email}}

@endcomponent
