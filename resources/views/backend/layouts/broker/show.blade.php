@php
use App\Enums\AffiliateEnum;
@endphp


@extends('backend.app', ['title' => 'Show Broker'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title"><button data-clipboard-text="{{ $broker->slug ? AffiliateEnum::URL->value . $broker->slug : '' }}" class="btn btn-success copy-btn" {{ $broker->slug ? '' : 'disabled' }}><i class="fa-regular fa-copy"></i></button> {{ $broker->slug ? AffiliateEnum::URL->value . $broker->slug : '' }} </h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Broker</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">

                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <table class="table table-bordered text-nowrap border-bottom" id="datatable">
                                        <thead>
                                            <tr>
                                                <th class="bg-transparent border-bottom-0 wp-15">ID</th>
                                                <th class="bg-transparent border-bottom-0 wp-15">Telephone</th>
                                                <th class="bg-transparent border-bottom-0">Email</th>
                                                <th class="bg-transparent border-bottom-0">Policy ID</th>
                                                <th class="bg-transparent border-bottom-0">Total Price</th>
                                                <th class="bg-transparent border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Company:</b> {{ $broker->company_name ?? '' }}</li>
                                        <li class="list-group-item"><b>Name:</b> {{ $broker->broker_name ?? '' }}</li>
                                        <li class="list-group-item"><b>Code:</b> {{ $broker->slug ?? '' }}</li>
                                        <li class="list-group-item"><b>Phone:</b> {{ $broker->phone ?? '' }}</li>
                                        <li class="list-group-item"><b>Email:</b> {{ $broker->email ?? '' }}</li>
                                        <li class="list-group-item"><b>Website:</b> {{ $broker->website ?? '' }}</li>
                                        <li class="list-group-item"><b>Address:</b> {{ $broker->address ?? '' }}</li>
                                        <li class="list-group-item"><b>Status:</b> {{ $broker->status ? 'Active' : 'Inactive' }}</li>
                                    </ul>
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
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
        });
        if (!$.fn.DataTable.isDataTable('#datatable')) {
            let dTable = $('#datatable').DataTable({
                order: [],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                processing: true,
                responsive: true,
                serverSide: true,

                language: {
                    processing: `<div class="text-center">
                <img src="{{ asset('default/loader.gif') }}" alt="Loader" style="width: 50px;">
                </div>`
                },

                scroller: {
                    loadingIndicator: false
                },
                pagingType: "full_numbers",
                dom: "<'row justify-content-between table-topbar'<'col-md-4 col-sm-3'l><'col-md-5 col-sm-5 px-0'f>>tipr",
                ajax: {
                    url: "{{ route('broker.show', $broker->id) }}",
                    type: "GET",
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'telephone',
                        name: 'telephone',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'unique_id',
                        name: 'unique_id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'dt-center text-center'
                    },
                ],
            });
        }
    });

    function goToOpen(id) {
        let url = "{{ route('insurance.booking.show', ':id') }}";
        window.location.href = url.replace(':id', id);
    }
</script>
<script type="text/javascript">
    const copyBtns = document.querySelectorAll(".copy-btn");

    if (copyBtns.length > 0) {
        copyBtns.forEach(copyBtn => {
            copyBtn.addEventListener("click", async function() {
                try {
                    const copyText = this.dataset.clipboardText;

                    // Await the writeText call directly instead of using .then
                    await navigator.clipboard.writeText(copyText);

                    alert("Copied to clipboard!");
                } catch (error) {
                    // Handling errors properly
                    console.error("Error copying text: ", error);
                }
            });
        });
    }
</script>
@endpush