<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quote Page</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    body {
      font-family: Poppins, sans-serif;
      background-color: #f9f9f9;
      padding: 20px;
    }

    .quote-container {
      max-width: 595px;
      background-color: #ffffff;
      border-radius: 8px;
      padding: 20px;
      margin: 0 auto;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h3 {
      color: #242a33;
      font-size: 14px;
      margin-bottom: 10px;
    }

    p {
      color: #555;
      font-size: 12px;
      line-height: 1.5;
    }

    .quote-details {
      background-color: #f0f0f0;
      border-radius: 5px;
      padding: 15px;
      margin-top: 20px;
    }

    .quote-summary {
      color: #333;
      font-weight: bold;
    }

    .payment-details {
      margin-top: 20px;
      background-color: #ffffff;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .payment-details p:first-child {
      font-size: 14px;
    }

    .retrieve-quote-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #05355d;
      color: white;
      text-decoration: none;
      border-radius: 20px;
      font-size: 14px;
    }

    .policy-heading {
      font-weight: 700;
      font-size: 14px;
    }

    .policy-details {
      margin-top: 20px;
      border-radius: 5px;
    }

    .policy-row {
      padding: 10px;
      display: flex;
      justify-content: space-between;
    }

    .policy-row span {
      font-size: 12px;
    }

    .policy-row span:first-child {
      font-weight: bold;
      color: #05355d;
    }

    .policy-row:nth-child(odd) {
      background-color: #f5f5f5;
    }

    .payment-details p:not(:first-child) {
      font-size: 12px;
      color: #333;
      margin: 5px 0;
    }

    .policy-row:nth-child(even) {
      background-color: #ffffff;
    }

    .footer p {
      margin-top: 30px;
      font-size: 12px;
      color: #008484;
    }

    .logo {
      display: flex;
      justify-content: center;
    }

    .quote-container img {
      max-width: 200px;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="quote-container">
    <!-- Logo -->
    <div class="logo">
      <img src="data:image/png;base64,{{ $icon }}" alt="Company Logo" />
    </div>

    <h3>Your Quote from Journeyman Services</h3>
    <p>Thank you for saving your quote from Journeyman Services.</p>

    <div class="payment-details">
      <p><strong>Payment Details:</strong></p>
      <p>The Basic Premium {{ $total_price = $data->total_price }} ({{ $data->currency }})</p>
      <p>Administration Charge: {{ $total_charge = ($data->total_price * $charge)/100 }} ({{ $data->currency }})</p>
      <p><strong>Total Price {{ $total_price + $total_charge }} ({{ $data->currency }})</strong></p>
      <a href="{{ $link }}" class="retrieve-quote-btn">Retrieve Quote</a>
    </div>

    <div class="policy-details">
      <p class="policy-heading">Policy Details:</p>
      <div class="policy-row">
        <span>Full Name:</span>
        <span>{{ $data->name ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>Country of Residence:</span>
        <span>{{ $data->country_of_residence ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>Insurance Type:</span>
        <span>{{ $data->insurance_type ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>Are of travel:</span>
        <span>{{ $data->area_of_travel ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>Start Date:</span>
        <span>{{ $data->start_date ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>End Date:</span>
        <span>{{ $data->end_date ?? 'N/A' }}</span>
      </div>
      <div class="policy-row">
        <span>Adults:</span>
        <span>1</span>
      </div>
    </div>

    <div class="footer">
      <p>
        This quote was generated on Friday 31 January 2025 and is valid until
        the end of January 2025
      </p>
    </div>
  </div>
</body>

</html>