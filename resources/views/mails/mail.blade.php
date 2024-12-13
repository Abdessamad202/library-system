<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Your Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f9f9f9;
            padding: 20px 0;
        }

        .content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header img {
            height: 50px;
        }

        .body {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        .content-cell {
            padding: 10px;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #999;
        }

        .subcopy {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <a href="https://yourwebsite.com" target="_blank" rel="noopener noreferrer">
                                <img src="https://yourwebsite.com/logo.png" alt="Your Brand Logo">
                            </a>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body">
                            <table class="inner-body" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell">
                                        <h3>Hello! {{ $user->name  }}</h3>
                                        <p>You are receiving this email because we received a email confirmation request for your account.</p>
                                        <a href="{{route('mail.verify', $href)}}" class="button" target="_blank" rel="noopener noreferrer" aria-label="Click to reset your password">
                                            Confirm Your Email
                                        </a>
                                        <p>This password reset link will expire in 60 minutes.</p>
                                        <p>If you did not request a password reset, no further action is required.</p>
                                        <p>Best regards,<br>Your Company Team</p>

                                        <!-- Subcopy -->
                                        <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td>
                                                    <p>If you're having trouble clicking the "Reset Your Password" button, copy and paste the URL below into your web browser:</p>
                                                    <p><a href="https://yourwebsite.com/reset-password/token" style="color: #4CAF50;">https://yourwebsite.com/reset-password/token</a></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table class="footer" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <p>&copy; 2024 Your Company. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
