<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservation Has Expired</title>
</head>
<body>
    <h1>Hello, {{ $reservation->user->name }}</h1>

    <p>We regret to inform you that your reservation for the book <strong>{{ $reservation->book->title }}</strong> has expired.</p>

    <p><strong>Reservation Details:</strong></p>
    <ul>
        <li><strong>Book Title:</strong> {{ $reservation->book->title }}</li>
        <li><strong>Reserved On:</strong> {{ $reservation->created_at->format('Y-m-d H:i:s') }}</li>
        <li><strong>Expiration Date:</strong> {{ $reservation->date_emprunt }} at {{ $reservation->hour_emprunt }}</li>
    </ul>

    <p>Unfortunately, we were unable to process your reservation in time. Please feel free to make a new reservation or contact us for further assistance.</p>

    <p>Thank you for using our service!</p>
</body>
</html>
