<div style="text-align: center; background-color: #f4f4f4; padding: 30px;">
    <img src="{{$message->embed(asset('storage/settings/'.config('app.settings.app_logo')))}}" alt="{{ config('app.name') }}" style="height: 100px; max-width: 150px;">
</div>
<h2 style="text-align: center; margin-top: 30px; margin-bottom: 0;">Invitation to {{ ucwords($event->title) }}</h2>
<h3 style="text-align: center; margin-top: 5px; margin-bottom: 30px;">Organized by {{ ucwords($event->club->name) }}</h3>

<div style="padding: 20px; background-color: #ffffff; border-radius: 5px;">
<p style="margin-bottom: 20px;">Dear {{  ucwords($user->first_name." ".$user->last_name) }},</p>

<p style="margin-bottom: 20px;">You have been invited to perform at the {{ ucwords($event->title) }} event organized by {{ ucwords($event->club->name) }}.</p>

<ul style="list-style: none; margin-bottom: 20px; padding-left: 0;">
    <li style="margin-bottom: 10px; margin-left: 0"><strong>Event title:</strong> {{ ucwords($event->title) }}</li>
    <li style="margin-bottom: 10px; margin-left: 0"><strong>Description:</strong> {!! $event->description !!}</li>
    <li style="margin-left: 0"><strong>Event date:</strong> {{ \App\Helpers\AppHelper::formatDate($event->event_date) }}</li>
</ul>

<p style="margin-bottom: 20px;">We hope you can join us for this exciting event.</p>

<p>Best regards,<br>{{ucwords($event->club->name)}}</p>
</div>

<div style="text-align: center; background-color: #f4f4f4; padding: 30px;">
<p>{{ config('app.name') }}</p>
</div>

