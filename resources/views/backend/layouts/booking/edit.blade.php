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
                                                <label for="country_of_residence" class="form-label">Country of Residence:</label>
                                                <input type="text" class="form-control @error('country_of_residence') is-invalid @enderror" name="country_of_residence" placeholder="Country of Residence" id="" value="{{ $booking->country_of_residence }}">
                                                @error('country_of_residence')
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