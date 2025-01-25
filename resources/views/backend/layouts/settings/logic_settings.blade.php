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
                                            name="adventure_sprots_multi" placeholder="Winter Sprots" id="winter_sprots"
                                            value="{{ $logic->adventure_sprots_multi ?? old('adventure_sprots_multi') ?? '' }}"
                                            min="1">
                                        @error('adventure_sprots_multi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="adventure_sprots_single" class="form-label">Adventure Sprots Single:</label>
                                        <input type="number" class="form-control @error('adventure_sprots_single') is-invalid @enderror"
                                            name="adventure_sprots_single" placeholder="Adventure Sprots Single" id="winter_sprots"
                                            value="{{ $logic->adventure_sprots_single ?? old('adventure_sprots_single') ?? '' }}"
                                            min="1">
                                        @error('adventure_sprots_single')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cancel_cost" class="form-label">Cancel Cost:</label>
                                        <input type="number" class="form-control @error('cancel_cost') is-invalid @enderror"
                                            name="cancel_cost" placeholder="Cancel Cost" id="cancel_cost"
                                            value="{{ $logic->cancel_cost ?? old('cancel_cost') ?? '' }}"
                                            min="1">
                                        @error('cancel_cost')
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