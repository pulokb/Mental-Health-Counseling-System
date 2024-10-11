@component('mail::message')
# Hello

{!! $body !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
