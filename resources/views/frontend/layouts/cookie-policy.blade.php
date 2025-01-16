@php
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
@endphp

@extends('frontend.app', ['title' => 'Home'])
@section('content')
<section class="banner-common">
    <div class="my-container">
        <div class="banner-common-header-title">
            <h2>Cookie Policy</h2>
        </div>
    </div>
</section>

<section class="policy">
    <div class="my-container">
        <h3 class="policy-title">Cookie Policy</h3>
        <div class="policy-wrapper">
            <div class="policy-item">
                <h4>1. Introduction</h4>
                <p>
                    This Cookie Policy explains how the Signage Booking platform
                    Shashh uses cookies and similar technologies to recognize you
                    when you visit our website and use our services.
                </p>
            </div>
            <div class="policy-item">
                <h4>2. What are Cookies?</h4>
                <p>
                    Cookies are small data files that are placed on your device when
                    you visit a website. Cookies are widely used by online service
                    providers to facilitate and improve the functionality of
                    websites and to track usage.
                </p>
            </div>
            <div class="policy-item">
                <h4>3. How We Use Cookies</h4>
                <p>We use cookies to:</p>
                <ul>
                    <li>
                        Authenticate users and prevent fraudulent use of user
                        accounts.
                    </li>
                    <li>Remember your preferences and settings.</li>
                    <li>Analyze traffic and usage patterns on the App.</li>
                </ul>
            </div>
            <div class="policy-item">
                <h4>4. Your Choices</h4>
                <p>
                    You can control and manage cookies in various ways. Most
                    browsers allow you to block or delete cookies. However, if you
                    choose to block cookies, some features of the App may not
                    function properly.
                </p>
            </div>
            <div class="policy-item">
                <h4>​5. Changes to Cookie Policy</h4>
                <p>
                    We may update this Cookie Policy from time to time. Any changes
                    will be posted on the App, and your continued use of the App
                    after such changes have been posted will constitute your
                    acceptance of the changes.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection