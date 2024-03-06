<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Reservation Confirmation</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Event Reservation Confirmation</h1>
    </div>
    <div class="content">
        <p>Hello, <strong>{{ $userName }}</strong>!</p>
        <p>Thank you for reserving a spot at <strong>{{ $eventName }}</strong>. Here are the details of your reservation:</p>
        <ul>
            <li><strong>Event:</strong> {{ $eventName }}</li>
            <li><strong>Reserved by:</strong> {{ $userName }}</li>
            <li><strong>Date:</strong> {{ now()->toFormattedDateString() }}</li>
        </ul>
        <p>We look forward to seeing you at the event!</p>
    </div>
</div>
</body>
</html>
