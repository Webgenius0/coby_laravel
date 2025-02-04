@extends('backend.app', ['title' => 'Update Broker'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Broker</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Broker</a></li>
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
                                    <form class="form-horizontal" method="post" action="{{ route('broker.update', $broker->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="company_name" class="form-label">Company Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="company name" id="company_name" value="{{ $broker->company_name ?? old('company_name') ?? '' }}">
                                                @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="broker_name" class="form-label">Broker Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('broker_name') is-invalid @enderror" name="broker_name" placeholder="broker name" id="broker_name" value="{{ $broker->broker_name ?? old('broker_name') ?? '' }}">
                                                @error('broker_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="slug" class="form-label">Code: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="code" id="slug" value="{{ $broker->slug ?? old('slug') ?? '' }}">
                                                @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone:</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="phone" id="phone" value="{{ $broker->phone ?? old('phone') ?? '' }}">
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" id="email" value="{{ $broker->email ?? old('email') ?? '' }}">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="website" class="form-label">Website: <span class="text-danger">*</span></label>
                                                <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="website" id="website" value="{{ $broker->website ?? old('website') ?? '' }}">
                                                @error('website')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="address" id="address" value="{{ $broker->address ?? old('address') ?? '' }}">
                                                @error('address')
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