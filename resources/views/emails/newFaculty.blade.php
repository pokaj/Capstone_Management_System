@component('mail::message')
# Hello {{$first}} {{$last}},

<p>Your account has just been created with the following credentials:</p>
    <ul>
        <li><span class="text-primary">E-mail: </span>{{$email}}</li>
        <li><span class="text-primary">Password: </span>{{$password}}</li>
    </ul>

<h5 class="text-danger">Please change your password after logging in!</h5>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
