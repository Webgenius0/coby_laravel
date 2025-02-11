<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Validation Certificate</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

        body {
            font-family: Poppins, sans-serif;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.4;
            max-width: 600px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 20px;
            border: 5px solid #003366;
            background: #f9f9f9;
            font-size: 14px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #003366;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
        }

        .header h1 {
            font-size: 14px;
            font-weight: 700;
            margin: 5px 0;
            color: #003366;
        }

        .header p {
            font-size: 12px;
            margin: 2px 0;
        }

        .certificate-title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 15px;
            color: #003366;
        }

        .important-note {
            font-size: 12px;
            background: #fff3cd;
            padding: 20px;
            border-left: 3px solid #ffa000;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            background: #fff;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background: #003366;
            color: white;
        }

        .footer {
            font-size: 10px;
            margin-top: 20px;
            text-align: center;
        }

        .footer .contact {
            font-size: 12px;
        }

        .arranged {
            margin-top: 20px;
            font-size: 10px;
            border-top: 1px solid black;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="data:image/png;base64,{{ $icon }}" alt="Logo" />
        <h1>JOURNEYMAN SERVICES</h1>
        <p>International Medical and Travel Insurance Specialists</p>
        <p>3 The Laurels Business Park, Park End Walk, Sling, Gloucestershire, GL16 8JJ</p>
        <p>Phone: +44(0)1594 839333 | Fax: +44(0)1594 839444</p>
        <p>Email: <a href="mailto:sales@journeymanservices.com">sales@journeymanservices.com</a> | Website: <a href="https://www.journeymanservices.com">journeymanservices.com</a></p>
    </div>
    <div class="certificate-title">Validation Certificate - Single Trip</div>
    <p style="text-align: center; font-weight: 600">Certificate No. {{ $data->unique_id }}</p>
    <div class="important-note">
        <strong>IMPORTANT:</strong> Please keep this Validation Certificate as evidence of your insurance. You will be required to produce it in the event of a claim. We recommend that you print and carry this certificate and the policy details with you on your trip.
    </div>
    <table>
        <tr>
            <th>Primary Insured</th>
            <th>Cover Details</th>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <ul style="list-style-type: none; margin: 0; padding: 0;">
                    <li>{{ json_decode($data->adults)[0]->name ?? 'N/A' }}</li>
                    <li>{{ $data->address_one ?? 'N/A' }}</li>
                    <li>{{ $data->city ?? 'N/A' }}</li>
                    <li>{{ $data->zip_code ?? 'N/A' }}</li>
                </ul>
            </td>
            <td style="vertical-align: top;">
                <ul style="list-style-type: none; margin: 0; padding: 0;">
                    <li>Issue Date: {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') ?? 'N/A' }}</li>
                    <li>Start Date: {{ \Carbon\Carbon::parse($data->start_date)->format('jS F Y') ?? 'N/A' }}</li>
                    <li>End Date: {{ \Carbon\Carbon::parse($data->end_date)->format('jS F Y') ?? 'N/A' }}</li>
                    <li>Travel Type:
                        @forelse (json_decode($data->travel_type) as $type)
                        {{ $type }}{{ !$loop->last ? ', ' : '' }}
                        @empty
                        N/A
                        @endforelse
                    </li>
                    <li>Coverage: {{ $data->coverage_type ?? 'N/A' }}</li>
                    <li>Policy currency: {{ $data->currency ?? 'N/A' }}</li>
                </ul>
        </tr>
    </table>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <tr style="background-color: #005050; color: white;">
            <th colspan="4" style="text-align: center; padding: 8px;">Adults</th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">No</th>
            <th style="border: 1px solid black; padding: 8px;">Name</th>
            <th style="border: 1px solid black; padding: 8px;">DoB</th>
            <th style="border: 1px solid black; padding: 8px;">Nationality</th>
        </tr>
        @if(json_decode($data->adults))
        @foreach (json_decode($data->adults) as $adult)
        <tr>
            <td style="border: 1px solid black; padding: 8px;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $adult->name ?? 'N/A' }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $adult->birth_day ?? 'N/A' }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $adult->nationality ?? 'N/A' }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <tr style="background-color: #005050; color: white;">
            <th colspan="4" style="text-align: center; padding: 8px;">Children</th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">No</th>
            <th style="border: 1px solid black; padding: 8px;">Name</th>
            <th style="border: 1px solid black; padding: 8px;">DoB</th>
            <th style="border: 1px solid black; padding: 8px;">Nationality</th>
        </tr>
        @if(json_decode($data->children))
        @foreach (json_decode($data->children) as $child)
        <tr>
            <td style="border: 1px solid black; padding: 8px;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $child->name ?? 'N/A' }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $child->birth_day ?? 'N/A' }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $child->nationality ?? 'N/A' }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    @php
        $currency_symble = $data->currency == 'USD' ? '$' : '£'; 
    @endphp
    <p><strong>Premium:</strong> {{ $currency_symble }}{{ $total_price = $data->total_price }} | <strong>Admin Fee:</strong> {{ $currency_symble }}{{ $total_charge = ($data->total_price * $charge)/100 }} | <strong>Total:</strong> {{ $currency_symble }}{{ $total_price + $total_charge }}</p>
    <div class="footer">
        <div class="contact">
            For assistance worldwide:<br />
            <strong>Healthcare Services</strong><br />
            <span>Phone: +1 305 893 9433 | Email: <a href="mailto:assistance@healthcareservices.com">assistance@healthcareservices.com</a></span>
        </div>
        <br />
        For Claims:<br />
        <strong>Journeyman Services Ltd</strong><br />
        <span>Phone: +44 (0)1594 839333 | Email: <a href="mailto:claims@journeyman-services.com">claims@journeyman-services.com</a></span>
        <div class="arranged">
            Arranged by Journeyman Services Ltd | Registered No: 3269804<br />
            Underwritten by Optimum Global Insurance Company Limited, registered in Guernsey under No: 63433.
        </div>
    </div>
</body>

</html>