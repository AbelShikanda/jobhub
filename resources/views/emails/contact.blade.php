@component('mail::message')
# {{$subject}}

{{$message}}.

Please reach out to me via {{$email}}.

Thanks,<br>
{{$name}}

<br>
{{ config('app.name') }}
@endcomponent
