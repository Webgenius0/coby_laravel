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
        margin: 40px;
        padding: 40px;
        line-height: 1.6;
        max-width: 900px;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 40px;
        margin: 0 auto;
        border: 10px solid #003366;
        padding: 30px;
        background: #f9f9f9;
      }
      .header {
        text-align: center;
        border-bottom: 3px solid #003366;
        padding-bottom: 20px;
        margin-bottom: 30px;
      }
      .header img {
        width: 200px;
      }
      .header h1 {
        font-size: 24px;
        font-weight: 700;
        margin: 10px 0;
        color: #003366;
      }
      .header p {
        font-size: 14px;
        margin: 5px 0;
      }
      .certificate-title {
        text-align: center;
        font-weight: bold;
        font-size: 22px;
        text-transform: uppercase;
        margin-bottom: 20px;
        color: #003366;
      }
      .important-note {
        font-size: 14px;
        background: #fff3cd;
        padding: 15px;
        border-left: 4px solid #ffa000;
        margin-bottom: 25px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background: #fff;
      }
      table, th, td {
        border: 1px solid black;
      }
      th, td {
        padding: 12px;
        text-align: left;
      }
      th {
        background: #003366;
        color: white;
      }
      .footer {
        font-size: 12px;
        margin-top: 30px;
        text-align: center;
      }
      .footer .contact {
        font-size: 14px;
      }
      .arranged {
        margin-top: 20px;
        font-size: 12px;
        border-top: 2px solid black;
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <img src="{{ asset('frontend') }}/images/logo.png" alt="Logo" />
      <h1>JOURNEYMAN SERVICES</h1>
      <p>International Medical and Travel Insurance Specialists</p>
      <p>3 The Laurels Business Park, Park End Walk, Sling, Gloucestershire, GL16 8JJ</p>
      <p>Phone: +44(0)1594 839333 | Fax: +44(0)1594 839444</p>
      <p>Email: sales@journeymanservices.com | Website: www.journeymanservices.com</p>
    </div>
    <div class="certificate-title">Validation Certificate - Single Trip</div>
    <p style="text-align: center; font-weight: 600;">Certificate No. JSL/SS12402</p>
    <div class="important-note">
      <strong>IMPORTANT:</strong> Please keep this Validation Certificate as evidence of your insurance. You will be required to produce it in the event of a claim. We recommend that you print and carry this certificate and the policy details with you on your trip.
    </div>
    <table>
      <tr>
        <th>Primary Insured</th>
        <th>Cover Details</th>
      </tr>
      <tr>
        <td>
          Mr Shawn Kuizema<br />
          Address: 49 Schweid Court<br />
          Fair Lawn<br />
          Bergen<br />
          07410<br />
          United States of America
        </td>
        <td>
          Issue Date: 29th January 2025<br />
          Start Date: 18th March 2025<br />
          End Date: 23rd March 2025<br />
          Adventure sports: Yes<br />
          Coverage: Worldwide excluding USA<br />
          Policy currency: USD ($)
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>DoB</th>
        <th>Nationality</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Mr Shawn Kuizema</td>
        <td>6th October 1992</td>
        <td>United States of America</td>
      </tr>
    </table>
    <p><strong>Premium:</strong> $240.00 | <strong>Admin Fee:</strong> $8.64 | <strong>Total:</strong> $248.64</p>
    <div class="footer">
      <div class="contact">
        For assistance worldwide:<br />
        <strong>Healthcare Services</strong><br />
        <span>Phone: +1 305 893 9433 | Email: assistance@healthcareservices.com</span>
      </div>
      <br />
      For Claims:<br />
      <strong>Journeyman Services Ltd</strong><br />
      <span>Phone: +44 (0)1594 839333 | Email: claims@journeyman-services.com</span>
      <div class="arranged">
        Arranged by Journeyman Services Ltd | Registered No: 3269804<br />
        Underwritten by Optimum Global Insurance Company Limited, registered in Guernsey under No: 63433.
      </div>
    </div>
  </body>
</html>