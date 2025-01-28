@extends('backend.app', ['title' => 'Update Contact'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Contact</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Contact</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <div class="contact-info">
                                        <h2 class="contact-info__title">Contact Information</h2>
                                        <div class="contact-info__item">
                                            <div>
                                                <p class="contact-info__label">Name:</p>
                                                <p class="contact-info__text">{{ $contact->name ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="contact-info__item">
                                            <div>
                                                <p class="contact-info__label">Email:</p>
                                                <p class="contact-info__text">{{ $contact->email ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="contact-info__item">
                                            <div>
                                                <p class="contact-info__label">Phone:</p>
                                                <p class="contact-info__text">{{ $contact->phone ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="contact-info__item">
                                            <div>
                                                <p class="contact-info__label">Message:</p>
                                                <p class="contact-info__text">{{ $contact->message ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('scripts')
    
@endpush