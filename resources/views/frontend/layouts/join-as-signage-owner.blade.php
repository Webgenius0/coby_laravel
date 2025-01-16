@php
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
@endphp

@extends('frontend.app', ['title' => 'Home'])
@section('content')
<!-- banner starts -->
<section class="signage-banner">
    <div class="my-container">
        <div class="signage-banner-content">
            <h1 class="signage-banner-title">
                Start Adding Your Screen on Shashh
            </h1>
            <p class="signage-banner-desc">
                Reach a real and local engagead audience on Shashh. Drive results
                on one platform for better connections.
            </p>
            <a href="./register.html" class="btn-common">
                Sign up now
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M4 12L20 12M20 12L14 18M20 12L14 6"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- banner ends -->

<!-- engagements starts -->
<section class="engagements">
    <div class="my-container">
        <h2 class="contact-info__title">Why Shashh?</h2>
        <div class="choose-card-wrapper">
            <div class="engagement-item">
                <div class="engagement-item-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="51"
                        height="51"
                        viewBox="0 0 51 51"
                        fill="none">
                        <path
                            d="M25.5 47.375C29.2679 47.3749 32.9719 46.4016 36.2531 44.5494C39.5343 42.6971 42.2815 40.0287 44.2283 36.8027C46.1752 33.5768 47.2558 29.9026 47.3654 26.1363C47.475 22.37 46.6099 18.6392 44.8539 15.3055C44.7545 15.1265 44.5889 14.9938 44.3927 14.9357C44.1964 14.8776 43.9852 14.8988 43.8044 14.9948C43.6237 15.0908 43.4878 15.2539 43.4261 15.4491C43.3643 15.6442 43.3816 15.8558 43.4742 16.0383C45.0121 18.9549 45.8148 22.2028 45.8125 25.5C44.6992 52.443 6.30078 52.443 5.1875 25.5C5 10.4359 21.75 0.339067 34.9625 7.52657C35.0531 7.57463 35.1524 7.60437 35.2545 7.61409C35.3566 7.62381 35.4597 7.61332 35.5578 7.58321C35.6559 7.55311 35.747 7.50398 35.8261 7.43863C35.9052 7.37328 35.9707 7.29299 36.0187 7.20235C36.0668 7.11171 36.0966 7.01248 36.1063 6.91034C36.116 6.80821 36.1055 6.70516 36.0754 6.60707C36.0453 6.50899 35.9962 6.4178 35.9308 6.33871C35.8655 6.25961 35.7852 6.19416 35.6945 6.1461C32.5523 4.48834 29.0527 3.62291 25.5 3.625C-3.51562 4.82422 -3.51562 46.1766 25.5 47.375Z"
                            fill="#34B26F" />
                        <path
                            d="M25.5 19.25C26.1763 19.2495 26.848 19.3618 27.4874 19.582C27.6834 19.6495 27.898 19.6363 28.0842 19.5455C28.2705 19.4546 28.413 19.2936 28.4804 19.0977C28.8242 17.7172 26.3906 17.7719 25.5 17.6875C15.1367 18.1156 15.1375 32.8844 25.5 33.3125C27.5713 33.3102 29.5571 32.4864 31.0217 31.0218C32.4863 29.5571 33.3102 27.5713 33.3125 25.5C33.2328 24.5938 33.2851 22.1852 31.9093 22.5273C31.7136 22.5948 31.5527 22.7372 31.4618 22.9232C31.371 23.1092 31.3578 23.3237 31.425 23.5195C31.6426 24.157 31.7524 24.8264 31.75 25.5C31.4367 33.7789 19.5625 33.7789 19.25 25.5C19.252 23.843 19.9112 22.2545 21.0828 21.0829C22.2545 19.9112 23.843 19.2521 25.5 19.25Z"
                            fill="#34B26F" />
                        <path
                            d="M32.9804 13.5742C33.0302 13.4845 33.0618 13.3858 33.0735 13.2838C33.0851 13.1818 33.0766 13.0785 33.0483 12.9798C33.02 12.8812 32.9725 12.789 32.9086 12.7087C32.8447 12.6284 32.7655 12.5614 32.6757 12.5117C30.4793 11.2961 28.0103 10.6577 25.5 10.6562C5.81089 11.4703 5.81089 39.5305 25.5 40.3438C28.0821 40.3453 30.6199 39.6728 32.8625 38.3929C35.1051 37.1129 36.9748 35.2697 38.2867 33.0457C39.5985 30.8216 40.3072 28.2936 40.3425 25.7117C40.3779 23.1298 39.7387 20.5834 38.4882 18.3242C38.3877 18.1429 38.2193 18.009 38.0201 17.9518C37.8208 17.8947 37.607 17.919 37.4257 18.0195C37.2444 18.12 37.1105 18.2884 37.0533 18.4877C36.9962 18.6869 37.0206 18.9007 37.121 19.082C42.0742 27.6695 35.4218 38.9531 25.5 38.7812C21.9788 38.7773 18.6029 37.3768 16.113 34.8869C13.6232 32.3971 12.2226 29.0212 12.2187 25.5C12.0484 15.5789 23.3289 8.92578 31.9179 13.8789C32.0076 13.9289 32.1063 13.9607 32.2084 13.9725C32.3104 13.9842 32.4138 13.9757 32.5125 13.9474C32.6112 13.9191 32.7034 13.8715 32.7837 13.8075C32.864 13.7434 32.9308 13.6642 32.9804 13.5742Z"
                            fill="#34B26F" />
                        <path
                            d="M34.503 11.3577L34.7898 15.1053L24.9476 24.9475C24.8053 25.0949 24.7265 25.2922 24.7283 25.497C24.7301 25.7019 24.8122 25.8978 24.9571 26.0427C25.1019 26.1875 25.2979 26.2697 25.5027 26.2715C25.7076 26.2733 25.9049 26.1945 26.0523 26.0522L35.8945 16.21L39.6421 16.4967C39.7544 16.5053 39.8672 16.4895 39.9727 16.4504C40.0783 16.4113 40.1742 16.3498 40.2538 16.2702L45.9398 10.5842C46.0431 10.4777 46.1142 10.3441 46.1449 10.1989C46.1756 10.0537 46.1645 9.90276 46.1131 9.76355C46.0616 9.62434 45.9718 9.50252 45.854 9.41218C45.7363 9.32184 45.5954 9.26665 45.4476 9.25299L42.0101 8.9897L41.7468 5.5522C41.7331 5.40441 41.6779 5.2635 41.5876 5.14574C41.4973 5.02798 41.3754 4.93818 41.2362 4.88671C41.097 4.83524 40.9461 4.8242 40.8009 4.85487C40.6556 4.88553 40.5221 4.95666 40.4155 5.06002L34.7296 10.746C34.6499 10.8255 34.5884 10.9214 34.5493 11.027C34.5102 11.1326 34.4944 11.2454 34.503 11.3577ZM40.3187 7.36627C40.6312 11.0045 40.0155 10.3639 43.6335 10.6811L39.403 14.9116L36.3241 14.6756L36.0882 11.5975L40.3187 7.36627Z"
                            fill="#34B26F" />
                    </svg>
                </div>

                <h3 class="engagement-item-title">Objectives and Goals</h3>
                <p class="engagement-item-desc">
                    Find the optimal location for your signage to meet your business
                    needs.
                </p>
            </div>
            <div class="engagement-item">
                <div class="engagement-item-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="51"
                        height="51"
                        viewBox="0 0 51 51"
                        fill="none">
                        <path
                            d="M25.5 46.3337C37.0059 46.3337 46.3333 37.0063 46.3333 25.5003C46.3333 13.9944 37.0059 4.66699 25.5 4.66699C13.994 4.66699 4.66663 13.9944 4.66663 25.5003C4.66663 37.0063 13.994 46.3337 25.5 46.3337Z"
                            stroke="#34B26F"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M17.1666 29.667C17.1666 29.667 20.2916 33.8337 25.5 33.8337C30.7083 33.8337 33.8333 29.667 33.8333 29.667"
                            stroke="#34B26F"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M19.25 19.25H19.2708"
                            stroke="#34B26F"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M31.75 19.25H31.7708"
                            stroke="#34B26F"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>

                <h3 class="engagement-item-title">Keep It Simple and Clear</h3>
                <p class="engagement-item-desc">
                    Plan and schedule your content to align with your campaign
                    timeline.
                </p>
            </div>
            <div class="engagement-item">
                <div class="engagement-item-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="51"
                        height="51"
                        viewBox="0 0 51 51"
                        fill="none">
                        <path
                            d="M6.75 23.417L46.3333 4.66699L27.5833 44.2503L23.4167 27.5837L6.75 23.417Z"
                            stroke="#34B26F"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>

                <h3 class="engagement-item-title">Location fits your brand</h3>
                <p class="engagement-item-desc">
                    Complete your final payment securely online.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- engagements ends -->

<!-- how it works starts -->
<section class="video-section">
    <div class="my-container">
        <h2 class="contact-info__title">See how it works</h2>
        <div class="video-container">
            <img
                src="{{ asset('frontend') }}/images/works-thumbnail.png"
                alt="Video Thumbnail"
                class="video-thumbnail"
                id="videoThumbnail" />
            <div class="play-button" id="playButton">
                <div class="circle pulse"></div>
                <div class="circle"></div>
                <span class="play-icon">&#9654;</span>
            </div>
        </div>
    </div>
</section>
@endsection