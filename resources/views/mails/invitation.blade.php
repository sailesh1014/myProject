@component('mail::message')
    <h2>Hello ,</h2>
    <p>You have been invited {{$event->description}}  for the  himusician event.</p>
    <ul>
        <li>Event title: {{$event->title}}</li>
        <li>Event date: {{\App\Helpers\AppHelper::formatDate($event->event_date)}}</li>
        <a href="http://himusician.test/dashboard/invitations/{{$event->id}}/{{$user->id}}/accept">Accept</a>
    </ul>



    {{ config('app.name') }}
@endcomponent
