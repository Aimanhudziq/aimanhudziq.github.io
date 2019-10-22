
<p>Hi, {{$first_name}} </p>
<p>Welcome to Picture Card System!</p>
<p>Your account has been created! Please click on the below link to reset your password account before login into our system.
<br/>
<a href="{{ route('password-reset',[$token]) }}">Click Here!</a>
<p>Thank you!</p>