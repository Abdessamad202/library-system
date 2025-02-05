<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Returning the Book</title>
</head>
<body>
    <h1>Dear {{ $reservation->user->name }}</h1>

    <p>Thank you for returning the book <strong>{{ $reservation->book->title }}</strong> on time!</p>

    <p><strong>Return Details:</strong></p>
    <ul>
        <li><strong>Book Title:</strong> {{ $reservation->book->title }}</li>
        <li><strong>Returned On:</strong> {{ now()->format('Y-m-d H:i:s') }}</li>
    </ul>

    <p>We hope you enjoyed reading the book. Your prompt return helps other users to enjoy the book as well!</p>

    <p>If you need to reserve more books, feel free to explore our collection and reserve your next read. Thank you for being a part of our library community!</p>

    <p>Best regards,</p>
    <p>Your Library Team</p>
</body>
</html>
