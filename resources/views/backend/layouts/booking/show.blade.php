@extends('backend.app', ['title' => 'Single Booking'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Booking</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Booking</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <table class="table table-bordered table-striped table-vcenter text-nowrap mb-0">
                                        <tr>
                                            <th>Booking Id</th>
                                            <td>{{ $booking->unique_id ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Policy Currency</th>
                                            <td>{{ $booking->policy_currency ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country Of Residence</th>
                                            <td>{{ $booking->country_of_residence ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Insurance Type</th>
                                            <td>{{ $booking->insurance_type ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Policy Type</th>
                                            <td>{{ $booking->policy_type ?? "N/A"}}</td>
                                        </tr>
                                        <tr>
                                            <th>Coverage Type</th>
                                            <td>{{ $booking->coverage_type ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Area Of Travel</th>
                                            <td>{{ $booking->area_of_travel ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td>{{ $booking->start_date ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td>{{ $booking->end_date ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Age</th>
                                            <td>{{ $booking->age ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number Of Adults</th>
                                            <td>{{ $booking->number_of_adults ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number Of Children</th>
                                            <td>{{ $booking->number_of_children ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Travel Type</th>
                                            <td>
                                                @if(json_decode($booking->travel_type))
                                                {{ json_decode($booking->travel_type)[0] ?? "N/A" }}
                                                @else
                                                {{ $booking->travel_type ?? "N/A" }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address One</th>
                                            <td>{{ $booking->address_one ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address Two</th>
                                            <td>{{ $booking->address_two ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $booking->city ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip Code</th>
                                            <td>{{ $booking->zip_code ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telephone</th>
                                            <td>{{ $booking->telephone ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $booking->email ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $booking->country ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>How Know</th>
                                            <td>{{ $booking->how_know ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Comments</th>
                                            <td>{{ $booking->comments ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Price</th>
                                            <td>{{ $booking->total_price ? floatval($booking->total_price) : "N/A" }} {{ $booking->currency ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $booking->status ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <td>{{ $booking->transaction_id ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td>{{ $booking->payment_status ?? "N/A" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $booking->created_at ? Carbon\Carbon::parse($booking->created_at)->format('d-m-Y'): "N/A" }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <h2>Adults - {{ $booking->number_of_adults ?? "N/A" }}</h2>
                                </div>
                            </div>

                            @if(isset(json_decode($booking->adults)[0]))
                            @foreach(json_decode($booking->adults) as $adult)
                            <div class="card shadow-sm">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $adult->name ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Fore-name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $adult->forename ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Sur-name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $adult->surname ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Birth Day:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $adult->birth_day ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Nationality:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $adult->nationality ?? "N/A" }}</span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @else
                            <div class="card">
                                <h3 class="text-center p-3">N/A</h3>
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-body border-0">
                                    <h2>Children - {{ $booking->number_of_children ?? "N/A" }}</h2>
                                </div>
                            </div>
                            @if(isset(json_decode($booking->children)[0]))
                            @foreach(json_decode($booking->children) as $child)
                            <div class="card shadow-sm">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $child->name ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Fore-name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $child->forename ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Sur-name:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $child->surname ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Birth Day:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $child->birth_day ?? "N/A" }}</span>
                                    </li>
                                    <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <span class="d-block d-sm-inline-block">Nationality:</span>
                                        <span class="ms-auto ms-sm-0 d-block d-sm-inline-block">{{ $child->nationality ?? "N/A" }}</span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @else
                            <div class="card">
                                <h3 class="text-center p-3">N/A</h3>
                            </div>
                            @endif
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