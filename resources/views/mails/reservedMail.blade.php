<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservation is Confirmed</title>
</head>
<body>
    <h1>Dear {{ $reservation->user->name }}</h1>

    <p>We are pleased to inform you that your reservation for the book <strong>{{ $reservation->book->title }}</strong> has been confirmed.</p>

    <p><strong>Reservation Details:</strong></p>
    <ul>
        <li><strong>Book Title:</strong> {{ $reservation->book->title }}</li>
        <li><strong>Reserved On:</strong> {{ $reservation->created_at->format('Y-m-d H:i:s') }}</li>
        <li><strong>Reservation Date:</strong> {{ $reservation->date_emprunt }} at {{ $reservation->hour_emprunt }}</li>
    </ul>

    <p>Thank you for using our service! You can pick up the book on the reserved date and time. Please let us know if you need any further assistance.</p>

    <p>Best regards,</p>
    <p>Your Library Team</p>
</body>
</html>
