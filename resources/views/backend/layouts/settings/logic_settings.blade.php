@extends('backend.app', ['title' => 'General Loading'])

@section('content')
<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            {{-- PAGE-HEADER --}}
            <div class="page-header">
                <div>
                    <h1 class="page-title">General Loading</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Loading</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Loading</li>
                    </ol>
                </div>
            </div>
            {{-- PAGE-HEADER --}}


            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card box-shadow-0">
                        <div class="card-body">
                            <form class="form-horizontal pt-4" method="post" action="{{ route('setting.logic.update') }}">
                                @csrf
                                @method('POST')

                                <div class="row mb-4">


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <label for="multi_trip_standard" class="input-group-text">Multi Trip Standard:</label>
                                                    <input type="number" class="form-control @error('multi_trip_standard') is-invalid @enderror"
                                                        name="multi_trip_standard" placeholder="Multi Trip Standard" id="multi_trip_standard"
                                                        value="{{ $logic->multi_trip_standard ?? old('multi_trip_standard') ?? '' }}"
                                                        min="1">
                                                </div>
                                                @error('multi_trip_standard')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <label for="multi_trip_extended" class="input-group-text">Multi Trip Extended:</label>
                                                    <input type="number" class="form-control @error('multi_trip_extended') is-invalid @enderror"
                                                        name="multi_trip_extended" placeholder="Multi Trip Extended" id="multi_trip_extended"
                                                        value="{{ $logic->multi_trip_extended ?? old('multi_trip_extended') ?? '' }}"
                                                        min="1">
                                                </div>
                                                @error('multi_trip_extended')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <label for="cancellation_coverage_standard" class="input-group-text">Cancellation Coverage Standard:</label>
                                                    <input type="number" class="form-control @error('cancellation_coverage_standard') is-invalid @enderror"
                                                        name="cancellation_coverage_standard" placeholder="Cancellation Coverage Standard" id="cancellation_coverage_standard"
                                                        value="{{ $logic->cancellation_coverage_standard ?? old('cancellation_coverage_standard') ?? '' }}"
                                                        min="1">
                                                </div>
                                                @error('cancellation_coverage_standard')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <label for="cancellation_coverage_increased" class="input-group-text">Cancellation Coverage Increased:</label>
                                                    <input type="number" class="form-control @error('cancellation_coverage_increased') is-invalid @enderror"
                                                        name="cancellation_coverage_increased" placeholder="Cancellation Coverage Increased" id="cancellation_coverage_increased"
                                                        value="{{ $logic->cancellation_coverage_increased ?? old('cancellation_coverage_increased') ?? '' }}"
                                                        min="1">
                                                </div>
                                                @error('cancellation_coverage_increased')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="winter_sprots" class="input-group-text">Winter Sprots:</label>
                                            <input type="number" class="form-control @error('winter_sprots') is-invalid @enderror"
                                                name="winter_sprots" placeholder="Winter Sprots" id="winter_sprots"
                                                value="{{ $logic->winter_sprots ?? old('winter_sprots') ?? '' }}"
                                                min="1">
                                        </div>
                                        @error('winter_sprots')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="adventure_sprots_multi" class="input-group-text">Adventure Sprots Multi:</label>
                                            <input type="number" class="form-control @error('adventure_sprots_multi') is-invalid @enderror"
                                                name="adventure_sprots_multi" placeholder="Winter Sprots" id="adventure_sprots_multi"
                                                value="{{ $logic->adventure_sprots_multi ?? old('adventure_sprots_multi') ?? '' }}"
                                                min="1">
                                        </div>
                                        @error('adventure_sprots_multi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="adventure_sprots_single" class="input-group-text">Adventure Sprots Single:</label>
                                            <input type="number" class="form-control @error('adventure_sprots_single') is-invalid @enderror"
                                                name="adventure_sprots_single" placeholder="Adventure Sprots Single" id="adventure_sprots_single"
                                                value="{{ $logic->adventure_sprots_single ?? old('adventure_sprots_single') ?? '' }}"
                                                min="1">
                                        </div>
                                        @error('adventure_sprots_single')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="charge" class="input-group-text">Administrator Charge:</label>
                                            <input type="number" class="form-control @error('charge') is-invalid @enderror"
                                                name="charge" placeholder="Administrator Charge" id="charge"
                                                value="{{ $logic->charge ?? old('charge') ?? '' }}"
                                                min="1"
                                                step="0.01">
                                        </div>
                                        @error('charge')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="tax" class="input-group-text">Tax:</label>
                                            <input type="number" class="form-control @error('tax') is-invalid @enderror"
                                                name="tax" placeholder="tax" id="tax"
                                                value="{{ $logic->tax ?? old('tax') ?? '' }}"
                                                min="1"
                                                step="0.01">
                                        </div>
                                        <span class="text-muted">Insurance premium tax</span>
                                        @error('tax')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label for="usd" class="input-group-text">GDP = 1 to USD = :</label>
                                            <input type="number" class="form-control @error('usd') is-invalid @enderror"
                                                name="usd" placeholder="usd to gbp" id="usd_to_gbp"
                                                value="{{ $logic->usd ?? old('usd') ?? '' }}"
                                                min="1"
                                                step="0.01">
                                        </div>
                                        @error('usd')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
<!-- CONTAINER CLOSED -->
@endsection



@push('scripts')
@endpush