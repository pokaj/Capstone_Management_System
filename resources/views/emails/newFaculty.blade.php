@component('mail::message')
# Introduction

Your account has just been created. login with the button below:

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
