<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket</title>
</head>
<body>
<h1>{{ $event->titre }}</h1>
<p>Hello {{ $user->name }},</p>
<p>Your reservation for the event "{{ $event->titre }}" has been approved.</p>
<p>Event Details:</p>
<ul>
    <li>Date: {{ $event->date }}</li>
    <li>Location: {{ $event->lieu }}</li>
</ul>
<p>Thank you for your reservation.</p>
</body>
</html>
