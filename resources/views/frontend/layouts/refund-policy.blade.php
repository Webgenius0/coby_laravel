@php
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
@endphp

@extends('frontend.app', ['title' => 'Refund Policy'])
@section('content')
<section class="banner-common">
    <div class="my-container">
        <div class="banner-common-header-title">
            <h2>Refund Policy</h2>
        </div>
    </div>
</section>

<section class="policy">
    <div class="my-container">
        <h3 class="policy-title">Refund Policy</h3>
        <div class="policy-wrapper">
            <div class="policy-item">
                <h4>1. Introduction</h4>
                <p>
                    This Refund Policy outlines the conditions under which refunds
                    may be issued for bookings made through the Signage Booking
                    Website ShaShh. 
                </p>
            </div>
            <div class="policy-item">
                <h4>2. Cancellations</h4>
                <p>
                    Bookings can be canceled up to 48 hours before the scheduled
                    display time for a full refund. Cancellations made less than 48
                    hours before the scheduled display time are not eligible for a
                    refund.
                </p>
            </div>
            <div class="policy-item">
                <h4>3. Refund Process</h4>
                <p>
                    To request a refund, please contact our customer support team
                    at support@shashh.sa.com Refunds will be processed within14
                    business days of receiving your request.
                </p>
            </div>
            <div class="policy-item">
                <h4>4. Non-Refundable Services</h4>
                <p>
                    Certain services, such as artwork and video production, are
                    non-refundable once they have been delivered.
                </p>
            </div>
            <div class="policy-item">
                <h4>5. Changes to Refund Policy</h4>
                <p>
                    We reserve the right to modify this Refund Policy at any time.
                    Any changes will be posted on the Website, and your continued
                    use of the Website after such changes have been posted will
                    constitute your acceptance of the changes.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection