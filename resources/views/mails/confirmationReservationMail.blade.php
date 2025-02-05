<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmation</title>
</head>
<body>
    <h1>Reservation Confirmed</h1>
    <p>Dear {{ $reservation->user->name }},</p>
    <p>Your reservation has been confirmed successfully. Here are the details:</p>
    <ul>
        <li><strong>Book:</strong> {{ $reservation->book->title }}</li>
        <li><strong>Date:</strong> {{ $reservation->date_emprunt }}</li>
        <li><strong>Time:</strong> {{ $reservation->hour_emprunt }}</li>
    </ul>
    <p>Thank you for using our library system. We hope you enjoy your book!</p>
    <p>Best regards,<br>The Library Team</p>
</body>
</html>