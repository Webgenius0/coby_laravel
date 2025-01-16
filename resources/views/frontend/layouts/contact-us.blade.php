@php
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
@endphp

@extends('frontend.app', ['title' => 'contact us'])
@section('content')
<section class="banner-common">
    <div class="my-container">
        <div class="banner-common-header-title">
            <h2>Contact Us</h2>
        </div>
    </div>
</section>

<section class="contact-us">
    <div class="my-container">
        <div class="contact-us-page-wrapper">
            <div class="contact-info">
                <h2 class="contact-info__title">Contact Us</h2>
                <div class="contact-info__item-wraper">
                    <div class="contact-info__item">
                        <span class="contact-info__icon email-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="25"
                                viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M4 7.5L10.2 12.15C11.2667 12.95 12.7333 12.95 13.8 12.15L20 7.49995M5 19.5H19C20.1046 19.5 21 18.6046 21 17.5V7.5C21 6.39543 20.1046 5.5 19 5.5H5C3.89543 5.5 3 6.39543 3 7.5V17.5C3 18.6046 3.89543 19.5 5 19.5Z"
                                    stroke="#245214"
                                    stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </span>
                        <div>
                            <p class="contact-info__label">Email:</p>
                            <p class="contact-info__text">sales@shashh.com</p>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <span class="contact-info__icon phone-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="25"
                                viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M12.8432 18.6571C14.556 19.5191 16.5724 20.1407 18.9376 20.4066C19.5116 20.4712 20.0001 20.0113 20.0001 19.4337V17.2811C20.0001 16.8222 19.6878 16.4222 19.2426 16.3109L16.5494 15.6376C16.2086 15.5524 15.8481 15.6523 15.5997 15.9007L12.8432 18.6571ZM12.8432 18.6571C9.72758 17.0891 7.61714 14.7253 6.24125 12.2591M6.24125 12.2591C4.93041 9.90955 4.28631 7.46704 4.07489 5.53114C4.01352 4.96913 4.46863 4.5003 5.03398 4.5003H7.18028C7.65696 4.5003 8.06738 4.83676 8.16086 5.30418L8.89513 8.97551C8.9607 9.30337 8.85808 9.64231 8.62165 9.87873L6.24125 12.2591ZM12.9541 7.59221C13.938 7.78345 14.8417 8.26598 15.5479 8.97717C16.2542 9.68837 16.7304 10.5954 16.9148 11.5806M13.0969 3.56738C15.0794 3.8108 16.9245 4.70676 18.3418 6.11416C19.7591 7.52156 20.6679 9.36043 20.9251 11.3411"
                                    stroke="#245214"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <div>
                            <p class="contact-info__label">Phone:</p>
                            <p class="contact-info__text">+966 54 873 0002</p>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <span class="contact-info__icon address-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="25"
                                viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M15 10.5C15 12.1569 13.6569 13.5 12 13.5C10.3431 13.5 9 12.1569 9 10.5C9 8.84315 10.3431 7.5 12 7.5C13.6569 7.5 15 8.84315 15 10.5Z"
                                    stroke="#245214"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M19 10.25C19 15.875 12 21.5 12 21.5C12 21.5 5 15.875 5 10.25C5 6.52208 8.13401 3.5 12 3.5C15.866 3.5 19 6.52208 19 10.25Z"
                                    stroke="#245214"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <div>
                            <p class="contact-info__label">Address:</p>
                            <p class="contact-info__text">
                                Dammam - Eastern Province, Saudi Arabia
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="send-message">
                <h2 class="send-message__title">Send Message</h2>
                <form class="send-message__form">
                    <div class="send-message-input-wrapper">
                        <label for="name">Full Name <span>*</span></label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Adam Smith"
                            required />
                    </div>
                    <div class="send-message-input-wrapper">
                        <label for="email">Email <span>*</span></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="adam_smith@Email.com"
                            required />
                    </div>
                    <div class="send-message-input-wrapper">
                        <label for="phone">Phone Number <span>*</span></label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="+988-2786223"
                            required />
                    </div>
                    <div class="send-message-input-wrapper">
                        <label for="message">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="btn-common">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection