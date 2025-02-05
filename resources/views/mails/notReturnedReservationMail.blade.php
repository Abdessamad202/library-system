<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder: You Have Not Returned the Book</title>
</head>
<body>
    <h1>Dear {{ $reservation->user->name }}</h1>

    <p>This is a reminder that you have not yet returned the book <strong>{{ $reservation->book->title }}</strong> that was due on {{ $reservation->date_emprunt }} at {{ $reservation->hour_emprunt }}.</p>

    <p><strong>Reservation Details:</strong></p>
    <ul>
        <li><strong>Book Title:</strong> {{ $reservation->book->title }}</li>
        <li><strong>Due Date:</strong> {{ $reservation->date_retour }} at {{ $reservation->hour_retour }}</li>
    </ul>

    <p>Please return the book as soon as possible to avoid any late fees or penalties. We appreciate your prompt attention to this matter!</p>

    <p>If you have any questions, feel free to contact us. Thank you for using our library services!</p>

    <p>Best regards,</p>
    <p>Your Library Team</p>
</body>
</html>
