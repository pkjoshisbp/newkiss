<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            background: #469EDE;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .field {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .field:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #469EDE;
            margin-bottom: 5px;
        }
        .value {
            color: #555;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #469EDE;
            text-align: center;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>

        <div class="field">
            <div class="label">Name:</div>
            <div class="value">{{ $firstName }} {{ $lastName }}</div>
        </div>

        <div class="field">
            <div class="label">Email:</div>
            <div class="value">
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
        </div>

        @if($phone)
        <div class="field">
            <div class="label">Phone:</div>
            <div class="value">
                <a href="tel:{{ $phone }}">{{ $phone }}</a>
            </div>
        </div>
        @endif

        @if($childAge)
        <div class="field">
            <div class="label">Child's Age:</div>
            <div class="value">{{ $childAge }}</div>
        </div>
        @endif

        @if($location)
        <div class="field">
            <div class="label">Preferred Location:</div>
            <div class="value">{{ $location }}</div>
        </div>
        @endif

        <div class="field">
            <div class="label">Message:</div>
            <div class="value" style="white-space: pre-wrap;">{{ $message }}</div>
        </div>

        <div class="footer">
            <p>This email was sent from the KISS Aquatics contact form at {{ config('app.url') }}</p>
            <p>Submitted at: {{ now()->format('F j, Y g:i A') }}</p>
        </div>
    </div>
</body>
</html>
