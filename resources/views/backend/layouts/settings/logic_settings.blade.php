@extends('backend.app', ['title' => 'General Logic'])

@section('content')
<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            {{-- PAGE-HEADER --}}
            <div class="page-header">
                <div>
                    <h1 class="page-title">General Logic</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Logic</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Logic</li>
                    </ol>
                </div>
            </div>
            {{-- PAGE-HEADER --}}


            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card box-shadow-0">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('setting.logic.update') }}">
                                @csrf
                                @method('POST')

                                <div class="row mb-4">

                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="multi_trip_standard" class="form-label">Multi Trip Standard:</label>
                                                <input type="number" class="form-control @error('multi_trip_standard') is-invalid @enderror"
                                                    name="multi_trip_standard" placeholder="Multi Trip Standard" id="multi_trip_standard"
                                                    value="{{ $logic->multi_trip_standard ?? old('multi_trip_standard') ?? '' }}"
                                                    min="1">
                                                @error('multi_trip_standard')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="multi_trip_extended" class="form-label">Multi Trip Extended:</label>
                                                <input type="number" class="form-control @error('multi_trip_extended') is-invalid @enderror"
                                                    name="multi_trip_extended" placeholder="Multi Trip Extended" id="multi_trip_extended"
                                                    value="{{ $logic->multi_trip_extended ?? old('multi_trip_extended') ?? '' }}"
                                                    min="1">
                                                @error('multi_trip_extended')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cancellation_coverage_standard" class="form-label">Cancellation Coverage Standard:</label>
                                                <input type="number" class="form-control @error('cancellation_coverage_standard') is-invalid @enderror"
                                                    name="cancellation_coverage_standard" placeholder="Cancellation Coverage Standard" id="cancellation_coverage_standard"
                                                    value="{{ $logic->cancellation_coverage_standard ?? old('cancellation_coverage_standard') ?? '' }}"
                                                    min="1">
                                                @error('cancellation_coverage_standard')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cancellation_coverage_increased" class="form-label">Cancellation Coverage Increased:</label>
                                                <input type="number" class="form-control @error('cancellation_coverage_increased') is-invalid @enderror"
                                                    name="cancellation_coverage_increased" placeholder="Cancellation Coverage Increased" id="cancellation_coverage_increased"
                                                    value="{{ $logic->cancellation_coverage_increased ?? old('cancellation_coverage_increased') ?? '' }}"
                                                    min="1">
                                                @error('cancellation_coverage_increased')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                
                                
                                    <div class="form-group">
                                        <label for="winter_sprots" class="form-label">Winter Sprots:</label>
                                        <input type="number" class="form-control @error('winter_sprots') is-invalid @enderror"
                                            name="winter_sprots" placeholder="Winter Sprots" id="winter_sprots"
                                            value="{{ $logic->winter_sprots ?? old('winter_sprots') ?? '' }}"
                                            min="1">
                                        @error('winter_sprots')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="adventure_sprots_multi" class="form-label">Adventure Sprots Multi:</label>
                                        <input type="number" class="form-control @error('adventure_sprots_multi') is-invalid @enderror"
                                            name="adventure_sprots_multi" placeholder="Winter Sprots" id="adventure_sprots_multi"
                                            value="{{ $logic->adventure_sprots_multi ?? old('adventure_sprots_multi') ?? '' }}"
                                            min="1">
                                        @error('adventure_sprots_multi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="adventure_sprots_single" class="form-label">Adventure Sprots Single:</label>
                                        <input type="number" class="form-control @error('adventure_sprots_single') is-invalid @enderror"
                                            name="adventure_sprots_single" placeholder="Adventure Sprots Single" id="adventure_sprots_single"
                                            value="{{ $logic->adventure_sprots_single ?? old('adventure_sprots_single') ?? '' }}"
                                            min="1">
                                        @error('adventure_sprots_single')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="charge" class="form-label">Administrator Charge:</label>
                                        <input type="number" class="form-control @error('charge') is-invalid @enderror"
                                            name="charge" placeholder="Administrator Charge" id="charge"
                                            value="{{ $logic->charge ?? old('charge') ?? '' }}"
                                            min="1"
                                            step="0.01">
                                        @error('charge')
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