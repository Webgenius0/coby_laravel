@extends('backend.app', ['title' => 'Update pdf'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">CMS : Update pdf</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">pdf</li>
                        <li class="breadcrumb-item">update</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form method="POST" action="{{ route('cms.form.pdf.update', $pdf->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pdf" class="form-label">Form PDF:</label>
                                                    <input type="file" class="dropify @error('pdf') is-invalid @enderror" name="pdf"
                                                        id="pdf"
                                                        data-default-file="{{ isset($pdf->metadata) && isset(json_decode($pdf->metadata)->pdf) && !empty(json_decode($pdf->metadata)->pdf) ? asset(json_decode($pdf->metadata)->pdf) : '' }}">
                                                    @error('pdf')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12 text-center">
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