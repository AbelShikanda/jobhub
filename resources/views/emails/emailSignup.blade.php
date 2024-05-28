@component('mail::message')
# Hi {{ $email }}

Thank you for subscribing to our updates.
We will keep you updated on our latest news and events.

We can also keep you updated on job listings.
Fill in application form to get listings.
@component('mail::button', ['url' => url('/applications/')])
Fill Application Form
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
