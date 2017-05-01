@component('mail::message')
# @lang('app.confirmation_mail.title', ['name' => $name])

@lang('app.confirmation_mail.message')

@component('mail::button', ['url' => $url])
@lang('app.confirmation_mail.action')
@endcomponent
@lang('app.confirmation_mail.button_not_working')<br>
@component('mail::panel')
{{ $url }}
@endcomponent
@lang('app.confirmation_mail.footer')<br>
{{ config('app.name') }}
@endcomponent