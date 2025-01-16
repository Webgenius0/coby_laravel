@php
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
@endphp

@extends('frontend.app', ['title' => 'Privacy Policy'])
@section('content')
<section class="banner-common">
    <div class="my-container">
        <div class="banner-common-header-title">
            <h2>Privacy Policy</h2>
        </div>
    </div>
</section>

<section class="policy">
    <div class="my-container">
        <h3 class="policy-title">Privacy Policy</h3>
        <div class="policy-wrapper">
            <div class="policy-item">
                <h4>1. Introduction</h4>
                <p>
                    This Privacy Policy explains how we collect, use, disclose, and
                    protect your personal information when you use the Signage
                    Booking Website ShaShh.
                </p>
            </div>
            <div class="policy-item">
                <h4>​2. Information We Collect</h4>
                <p>
                    We collect information that you provide to us when you create an
                    account, make a booking, or upload content. This may include
                    your name, email address, payment information, and any other
                    information you choose to provide.
                </p>
            </div>
            <div class="policy-item">
                <h4>3. Use of Information</h4>
                <p>
                    We use the information we collect to provide and improve our
                    services, process payments, communicate with you, and for other
                    customer service purposes. We may also use your information for
                    marketing and promotional purposes.
                </p>
            </div>
            <div class="policy-item">
                <h4>​4. Disclosure of Information</h4>
                <p>
                    We may disclose your information to third parties in the
                    following circumstances:
                </p>
                <ul>
                    <li>
                        To service providers who perform services on our behalf.
                    </li>
                    <li>To comply with legal obligations.</li>
                    <li>To protect our rights and property.</li>
                </ul>
            </div>
            <div class="policy-item">
                <h4>5. Security</h4>
                <p>
                    We take reasonable measures to protect your personal information
                    from unauthorized access, use, or disclosure. However, no
                    internet-based service can be completely secure, and we cannot
                    guarantee the absolute security of your information.
                </p>
            </div>
            <div class="policy-item">
                <h4>6. Your Rights</h4>
                <p>
                    You have the right to access, correct, or delete your personal
                    information. You can exercise these rights by contacting us
                    at support@shashh.com
                </p>
            </div>
            <div class="policy-item">
                <h4>7. Changes to Privacy Policy</h4>
                <p>
                    We may update this Privacy Policy from time to time. Any changes
                    will be posted on the App, and your continued use of the App
                    after such changes have been posted will constitute your
                    acceptance of the changes.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection