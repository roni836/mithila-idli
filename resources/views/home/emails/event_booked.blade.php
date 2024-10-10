<!DOCTYPE html>
<html>
<head>
    <title>New Event Booking</title>
</head>
<body>
    <h1>New Event Booking</h1>
    <p>Name: {{ $event->name }}</p>
    <p>Mobile: {{ $event->mobile }}</p>
    <p>Event Type: {{ $event->event_type }}</p>
    <p>Booking Date: {{ $event->booking_date }}</p>
    <p>Address: {{ $event->address }}</p>
    <p>Quantity: {{ $event->quantity }}</p>
</body>
</html>
