@extends('backend.app', ['title' => 'Update Core Values'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">CMS : Update Core Values</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Core Values</li>
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
                                    <form method="POST" action="{{ route('cms.about.corevalue.update', $corevalues->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title:</label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter here title" id="title" value="{{ $corevalues->title ?? '' }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description" class="form-label">Description:</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter here description" rows="3">{{ $corevalues->description ?? '' }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">Side Image:</label>
                                                    <input type="file" class="dropify @error('image') is-invalid @enderror" name="image"
                                                        id="image"
                                                        data-default-file="{{ isset($corevalues->image) ? asset($corevalues->image) : '' }}">
                                                    @error('image')
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