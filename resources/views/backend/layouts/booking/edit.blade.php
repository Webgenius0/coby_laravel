@extends('backend.app', ['title' => 'Update Booking'])

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
                                    <form class="form-horizontal" method="post" action="{{ route('insurance.booking.update', $booking->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="policy_currency" class="form-label">Policy Currency:</label>
                                                <select class="form-control @error('policy_currency') is-invalid @enderror" name="policy_currency" id="policy_currency">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="British Pounds" {{ old('policy_currency', $booking->policy_currency) == 'British Pounds' ? 'selected' : '' }}>British Pounds</option>
                                                    <option value="USA Dollers" {{ old('policy_currency', $booking->policy_currency) == 'USA Dollers' ? 'selected' : '' }}>USA Dollers</option>
                                                </select>
                                                @error('policy_currency')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="country_of_residence" class="form-label">Country of Residence:</label>
                                                <select class="form-control @error('country_of_residence') is-invalid @enderror" name="country_of_residence" id="country_of_residence">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}" {{ old('country_of_residence', $booking->country_of_residence) == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country_of_residence')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="insurance_type" class="form-label">Insurance Type:</label>
                                                <select class="form-control @error('insurance_type') is-invalid @enderror" name="insurance_type" id="insurance_type">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="multi-trip" {{ old('insurance_type', $booking->insurance_type) == 'multi-trip' ? 'selected' : '' }}>multi-trip</option>
                                                    <option value="single-trip" {{ old('insurance_type', $booking->insurance_type) == 'single-trip' ? 'selected' : '' }}>single-trip</option>
                                                </select>
                                                @error('insurance_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="policy_type" class="form-label">Multi Trip Policy Type:</label>
                                                <select class="form-control @error('policy_type') is-invalid @enderror" name="policy_type" id="policy_type">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="standard" {{ old('policy_type', $booking->policy_type) == 'standard' ? 'selected' : '' }}>standard</option>
                                                    <option value="extended" {{ old('policy_type', $booking->policy_type) == 'extended' ? 'selected' : '' }}>extended</option>
                                                </select>
                                                @error('policy_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="coverage_type" class="form-label">Multi Trip Coverage Type:</label>
                                                <select class="form-control @error('coverage_type') is-invalid @enderror" name="coverage_type" id="coverage_type">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="standard" {{ old('coverage_type', $booking->coverage_type) == 'standard' ? 'selected' : '' }}>standard</option>
                                                    <option value="increased" {{ old('coverage_type', $booking->coverage_type) == 'increased' ? 'selected' : '' }}>increased</option>
                                                </select>
                                                @error('coverage_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="area_of_travel" class="form-label">Area of Travel:</label>
                                                <select class="form-control @error('area_of_travel') is-invalid @enderror" name="area_of_travel" id="area_of_travel">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="worldwide" {{ old('area_of_travel', $booking->area_of_travel) == 'worldwide' ? 'selected' : '' }}>worldwide</option>
                                                    <option value="ex_usa" {{ old('area_of_travel', $booking->area_of_travel) == 'ex_usa' ? 'selected' : '' }}>ex_usa</option>
                                                    <option value="europe" {{ old('area_of_travel', $booking->area_of_travel) == 'europe' ? 'selected' : '' }}>europe</option>
                                                </select>
                                                @error('area_of_travel')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="start_date" class="form-label">Start Date:</label>
                                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="mm/dd/yyyy" id="" value="{{ $booking->start_date }}">
                                                @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="end_date" class="form-label">End Date:</label>
                                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="mm/dd/yyyy" id="" value="{{ $booking->end_date }}">
                                                @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="number_of_adults" class="form-label">Number of Adults:</label>
                                                <input type="number" class="form-control @error('number_of_adults') is-invalid @enderror" name="number_of_adults" placeholder="1" id="" value="{{ $booking->number_of_adults }}" min="1">
                                                @error('number_of_adults')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>

                                        </div>
                                    </form>
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