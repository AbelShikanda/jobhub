@component('mail::message')
# {{ $jobs->job_title }}

Hi there, a new job has been posted that looks like your match.

you can click the button below to see the details
@component('mail::button', ['url' => url('/job/details/' . $jobs->id)])
See Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
