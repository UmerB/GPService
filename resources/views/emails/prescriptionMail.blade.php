<html>
    <head>
        <title>Prescription Request</title>
    </head>
    <body>
        <h1>Dear {{ $mail_data->user->name }}</h1>
        <h2>Your Prescription has been sent for {{ $mail_data->user->condition }}</h2>
    </body>
</html>