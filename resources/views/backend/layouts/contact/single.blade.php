@extends('backend.app', ['title' => 'Update Contact'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            
            <!-- Page Header -->
            <div class="page-header d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="page-title text-primary fw-bold">Contact Details</h1>
                    <p class="text-muted">View and manage contact information.</p>
                </div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Header -->
            
            <!-- Contact Information Section -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-4">
                        <div class="card-header bg-gradient-primary text-white text-center py-3">
                            <h3 class="mb-0">Contact Information</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="contact-info">
                                @php
                                    $fields = [
                                        'Name' => ['icon' => 'user', 'value' => $contact->name ?? 'N/A'],
                                        'Email' => ['icon' => 'envelope', 'value' => $contact->email ?? 'N/A'],
                                        'Phone' => ['icon' => 'phone', 'value' => $contact->phone ?? 'N/A'],
                                        'Message' => ['icon' => 'comment', 'value' => $contact->message ?? 'N/A']
                                    ];
                                @endphp
                                
                                @foreach ($fields as $label => $data)
                                <div class="contact-info__item d-flex align-items-center p-3 rounded mb-3">
                                    <div class="contact-info__icon d-flex align-items-center justify-content-center me-3 bg-primary text-white rounded-circle" style="width: 50px; height: 50px;">
                                        <i class="fas fa-{{ $data['icon'] }} fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="contact-info__label text-muted mb-1 fw-semibold">{{ $label }}</p>
                                        <p class="contact-info__text fw-bold text-dark">{{ $data['value'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Information Section -->
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection

@push('scripts')
<!-- Custom Scripts (if needed) -->
@endpush
