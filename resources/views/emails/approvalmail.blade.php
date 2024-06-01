@component('mail::message')
# Your job application has been approved

Hi {{ $firstname }} {{ $lastemail }}
your application has been approved. <br>
we wiil reach out to you on {{ $phone }}. <br><br><br>
If you would like to change your phone number <br>
please click the button below <br>

@component('mail::button', ['url' => url('/profile/' . $id . '/edit')])
Change contact information
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
