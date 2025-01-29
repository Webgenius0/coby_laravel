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
            <form class="form-horizontal" method="post" action="{{ route('insurance.booking.update', $booking->id) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row" id="user-profile">
                    <div class="col-lg-8">

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">

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
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="mm/dd/yyyy" id="" value="{{ $booking->start_date ?? old('start_date') }}">
                                        @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date" class="form-label">End Date:</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="mm/dd/yyyy" id="" value="{{ $booking->end_date ?? old('end_date') }}">
                                        @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="form-group">
                                        <label for="travel_type" class="form-label">Travel Type:</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mr-3">
                                                <input type="checkbox" class="form-check-input @error('travel_type') is-invalid @enderror" name="travel_type[]" value="adventure" {{ is_array(old('travel_type', json_decode($booking->travel_type))) && in_array('adventure', old('travel_type', json_decode($booking->travel_type))) ? 'checked' : '' }}>
                                            </div>
                                            <label class="form-check-label">Winter Sports?</label>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check mr-3">
                                                <input type="checkbox" class="form-check-input @error('travel_type') is-invalid @enderror" name="travel_type[]" value="leisure" {{ is_array(old('travel_type', json_decode($booking->travel_type))) && in_array('leisure', old('travel_type', json_decode($booking->travel_type))) ? 'checked' : '' }}>
                                            </div>
                                            <label class="form-check-label">Adventure Sports?</label>
                                        </div>
                                        @error('travel_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address_one" class="form-label">Address One:</label>
                                        <input type="text" class="form-control @error('address_one') is-invalid @enderror" name="address_one" placeholder="address" id="address_one" value="{{ $booking->address_one ?? old('address_one') }}">
                                        @error('address_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address_two" class="form-label">Address Two:</label>
                                        <input type="text" class="form-control @error('address_two') is-invalid @enderror" name="address_two" placeholder="address" id="address_two" value="{{ $booking->address_two ?? old('address_two') }}">
                                        @error('address_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="city" class="form-label">City:</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="city" id="city" value="{{ $booking->city ?? old('city') }}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="zip_code" class="form-label">Zip Code:</label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="zip_code" id="zip_code" value="{{ $booking->zip_code ?? old('zip_code') }}">
                                        @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone" class="form-label">Telephone:</label>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="telephone" id="telephone" value="{{ $booking->telephone ?? old('telephone') }}">
                                        @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone" class="form-label">Email:</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" id="email" value="{{ $booking->email ?? old('email') }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="form-label">Country:</label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="country" id="country" value="{{ $booking->country ?? old('country') }}">
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="how_know" class="form-label">How to Know:</label>
                                        <input type="text" class="form-control @error('how_know') is-invalid @enderror" name="how_know" placeholder="How know" id="how_know" value="{{ $booking->how_know ?? old('how_know') }}">
                                        @error('how_know')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="comment" class="form-label">Comment:</label>
                                                <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment" placeholder="Comment" rows="3">{{ old('comment', $booking->comment) }}</textarea>
                                                @error('comment')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="currency" class="form-label">Currency:</label>
                                        <select class="form-control @error('currency') is-invalid @enderror" name="currency" id="currency">
                                            <option value="" selected disabled hidden>Select</option>
                                            <option value="GBP" {{ old('currency', $booking->currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                                            <option value="USD" {{ old('currency', $booking->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                                        </select>
                                        @error('currency')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="total_price" class="form-label">Total Price:</label>
                                        <input type="number" class="form-control @error('total_price') is-invalid @enderror" name="total_price" placeholder="0" id="total_price" value="{{ $booking->total_price ?? old('total_price') }}">
                                        @error('total_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">


                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Adult Information</h2>
                                <div class="form-group">
                                    <label for="number_of_adults" class="form-label">Number of Adults:</label>
                                    <input type="number" class="form-control @error('number_of_adults') is-invalid @enderror" name="number_of_adults" placeholder="1" id="" value="{{ $booking->number_of_adults ?? old('number_of_adults') }}" min="1">
                                    @error('number_of_adults')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Children Information</h2>
                                <div class="form-group">
                                    <label for="number_of_children" class="form-label">Number of Children:</label>
                                    <input type="number" class="form-control @error('number_of_children') is-invalid @enderror" name="number_of_children" placeholder="1" id="" value="{{ $booking->number_of_children ?? old('number_of_children') }}" min="1">
                                    @error('number_of_children')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('scripts')

@endpush