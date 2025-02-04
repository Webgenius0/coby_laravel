@extends('backend.app')

@section('content')
<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            {{-- PAGE-HEADER --}}
            <div class="page-header">
                <div>
                    <h1 class="page-title">Sftp Settings <i class="fa-solid fa-triangle-exclamation text-danger" title="Warning"></i></h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sftp</li>
                    </ol>
                </div>
            </div>
            {{-- PAGE-HEADER --}}


            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card box-shadow-0">
                        <div class="card-body">
                            <form method="post" action="{{ route('setting.sftp.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-4">
                                    <label for="sftp_host" class="col-md-3 form-label">SFTP Host</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('sftp_host') is-invalid @enderror" id="sftp_host"
                                            name="sftp_host" placeholder="Enter your sftp host" type="text"
                                            value="{{ env('SFTP_HOST') ?? old('sftp_host') }}">
                                        @error('sftp_host')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sftp_port" class="col-md-3 form-label">SFTP port</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('sftp_port') is-invalid @enderror" id="sftp_port"
                                            name="sftp_port" placeholder="Enter your sftp port" type="text"
                                            value="{{ env('SFTP_PORT') ?? old('sftp_port') }}">
                                        @error('sftp_port')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sftp_user" class="col-md-3 form-label">SFTP user</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('sftp_user') is-invalid @enderror" id="sftp_user"
                                            name="sftp_user" placeholder="Enter your sftp user" type="text"
                                            value="{{ env('SFTP_USER') ?? old('sftp_user') }}">
                                        @error('sftp_user')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sftp_pass" class="col-md-3 form-label">SFTP pass</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('sftp_pass') is-invalid @enderror" id="sftp_pass"
                                            name="sftp_pass" placeholder="Enter your sftp pass" type="text"
                                            value="{{ env('SFTP_PASS') ?? old('sftp_pass') }}">
                                        @error('sftp_pass')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sftp_path" class="col-md-3 form-label">SFTP path</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('sftp_path') is-invalid @enderror" id="sftp_path"
                                            name="sftp_path" placeholder="Enter your sftp path" type="text"
                                            value="{{ env('SFTP_PATH') ?? old('sftp_path') }}">
                                        @error('sftp_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
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