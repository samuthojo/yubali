@component('mail::message')
# Hello

{{ $message }}

Thanks,<br>
{{ $sender_name }}<br>
{{ $sender_email }}
@endcomponent
