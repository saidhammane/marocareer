<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    
    <p><strong>Name:</strong> {{ $mailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $mailData['email'] }}</p>
    
    <p><strong>Message:</strong></p>
    <p>{{ $mailData['message'] }}</p>
    
    <p>Thank you for using our contact form.</p>
</body>
</html>
