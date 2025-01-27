@extends('backend.app', ['title' => 'Update Pricing'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Pricing</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pricing</a></li>
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
                                    <form class="form-horizontal" method="post" action="{{ route('pricing.update', $pricing->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="is_annual" class="form-label">Is Annual:</label>
                                                <select name="is_annual" id="is_annual" class="form-control @error('is_annual') is-invalid @enderror">
                                                    <option value="1" {{ $pricing->is_annual == 1 ? 'selected' : '' }}>Multi</option>
                                                    <option value="0" {{ $pricing->is_annual == 0 ? 'selected' : '' }}>Single</option>
                                                </select>
                                                @error('is_annual')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="destination" class="form-label">Name:</label>
                                                <select class="form-control @error('destination') is-invalid @enderror" name="destination" id="destination">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="ex_usa" {{ old('destination', $pricing->destination) == 'ex_usa' ? 'selected' : '' }}>ex_usa</option>
                                                    <option value="europe" {{ old('destination', $pricing->destination) == 'europe' ? 'selected' : '' }}>europe</option>
                                                    <option value="worldwide" {{ old('destination', $pricing->destination) == 'worldwide' ? 'selected' : '' }}>worldwide</option>
                                                </select>
                                                @error('destination')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="max_duration" class="form-label">Max Duration:</label>
                                                <select class="form-control @error('max_duration') is-invalid @enderror" name="max_duration" id="max_duration">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="0" {{ old('max_duration', $pricing->max_duration) == 0 ? 'selected' : '' }}>0</option>
                                                    <option value="10" {{ old('max_duration', $pricing->max_duration) == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="18" {{ old('max_duration', $pricing->max_duration) == 18 ? 'selected' : '' }}>18</option>
                                                    <option value="24" {{ old('max_duration', $pricing->max_duration) == 24 ? 'selected' : '' }}>24</option>
                                                    <option value="30" {{ old('max_duration', $pricing->max_duration) == 30 ? 'selected' : '' }}>30</option>
                                                </select>
                                                @error('max_duration')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="age_group" class="form-label">Age Group:</label>
                                                <select class="form-control @error('age_group') is-invalid @enderror" name="age_group" id="age_group">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="49" {{ old('age_group', $pricing->age_group) == '49' ? 'selected' : '' }}>49</option>
                                                    <option value="50-59" {{ old('age_group', $pricing->age_group) == '50-59' ? 'selected' : '' }}>50-59</option>
                                                    <option value="60-64" {{ old('age_group', $pricing->age_group) == '60-64' ? 'selected' : '' }}>60-64</option>
                                                    <option value="65-69" {{ old('age_group', $pricing->age_group) == '65-69' ? 'selected' : '' }}>65-69</option>
                                                    <option value="70-74" {{ old('age_group', $pricing->age_group) == '70-74' ? 'selected' : '' }}>70-74</option>
                                                    <option value="80-84" {{ old('age_group', $pricing->age_group) == '80-84' ? 'selected' : '' }}>80-84</option>
                                                </select>
                                                @error('age_group')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="party_type" class="form-label">Party Type:</label>
                                                <select class="form-control @error('party_type') is-invalid @enderror" name="party_type" id="party_type">
                                                    <option value="" selected disabled hidden>Select</option>
                                                    <option value="individual" {{ old('party_type', $pricing->party_type) == "individual" ? 'selected' : '' }}>Individual</option>
                                                    <option value="couple" {{ old('party_type', $pricing->party_type) == 'couple' ? 'selected' : '' }}>Couple</option>
                                                    <option value="family" {{ old('party_type', $pricing->party_type) == 'family' ? 'selected' : '' }}>Family</option>
                                                </select>
                                                @error('party_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="base_premium" class="form-label">Base Premium:</label>
                                                <input type="text" class="form-control @error('base_premium') is-invalid @enderror" name="base_premium" placeholder="base_premium" id="base_premium" value="{{ old('base_premium', $pricing->base_premium) }}" step="0.01">
                                                @error('base_premium')
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