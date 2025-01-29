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
                <div class="col-lg-4">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="contact-info">
                                        <h2 class="contact-info__title text-center mb-4">Contact Information</h2>
                                        <div class="contact-info__item d-flex align-items-center mb-3">
                                            <div class="contact-info__icon me-3">
                                                <i class="fas fa-user fa-lg text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="contact-info__label text-muted mb-1">Name:</p>
                                                <p class="contact-info__text fw-bold">{{ $contact->name ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="contact-info__item d-flex align-items-center mb-3">
                                            <div class="contact-info__icon me-3">
                                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="contact-info__label text-muted mb-1">Email:</p>
                                                <p class="contact-info__text fw-bold">{{ $contact->email ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="contact-info__item d-flex align-items-center mb-3">
                                            <div class="contact-info__icon me-3">
                                                <i class="fas fa-phone fa-lg text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="contact-info__label text-muted mb-1">Phone:</p>
                                                <p class="contact-info__text fw-bold">{{ $contact->phone ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="contact-info__item d-flex align-items-start mb-3">
                                            <div class="contact-info__icon me-3">
                                                <i class="fas fa-comment fa-lg text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="contact-info__label text-muted mb-1">Message:</p>
                                                <p class="contact-info__text fw-bold">{{ $contact->message ?? 'N/A' }}</p>
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