@extends("layouts.app")

@section("title", "Products")

@push("plugin-styles")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section("content")
    @include("layouts.breadcrumbs")
    <div class="container">
        <div class="form-elements-wrapper">
            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card-style">
                        <div class="d-flex align-items-center justify-content-between mb-30">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $purchases[0]->purchase_no }}
                            </h6>
                            <h6 class="m-0 font-weight-bold text-primary">Date : {{ $purchases[0]->date }}
                            </h6>
                            @php
                                $totalPrice = $purchases->sum("buying_price");
                            @endphp
                            <h6 class="m-0 font-weight-bold text-primary">Price: {{ $totalPrice }}</h6>
                        </div>
                        <div class="text-end mb-3">
                            <a href="{{ route("purchases.approveAll", $purchases[0]->purchase_no) }}"
                                class="main-btn success-btn btn-sm btn-hover">Approve All</a>
                        </div>
                        <div class="table-responsive pt-3 px-1">
                            <table class="table table-bordered border-bottom" id="myTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>#</h6>
                                        </th>
                                        <th>
                                            <h6>Product Name</h6>
                                        </th>
                                        <th>
                                            <h6>Supplier</h6>
                                        </th>
                                        <th>
                                            <h6>Quantity</h6>
                                        </th>
                                        <th>
                                            <h6>Actions</h6>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($purchases as $index => $purchase)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $purchase->product->product_name }}</td>
                                            <td>{{ $purchase->supplier->supplier_name }}</td>
                                            <td>{{ $purchase->buying_quantity }}</td>
                                            <td class="d-flex justify-content-evenly">
                                                @if ($purchase->status == "0")
                                                    <a class="btn btn-sm btn-danger mx-2 py-2"
                                                        href="{{ route("purchases.destroy", $purchase->id) }}"
                                                        onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </a>
                                                    <a class="btn btn-sm btn-success mx-2 py-2" type="button"
                                                        href="{{ route("purchases.approve", $purchase->id) }}"
                                                        onclick="return confirm('Sure you want Approve this Purchase ?')">
                                                        <i
                                                            class="fa-regular fa-circle-check pt-0 pb-0 pr-0 pl-0 mr-0 ml-0"></i>
                                                    </a>
                                                @elseif ($purchase->status == "1")
                                                    <span class="btn btn-sm btn-success mx-2 py-2"
                                                        style="pointer-events: none;">Approved</span>
                                                @endif

                                            </td>
                                            {{-- <td>
                                            @if ($purchase->status == "0")
                                            <a class="btn btn-danger"
                                                href="{{ route('purchases.destroy', $purchase->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                <span class="glyphicon glyphicon-trash">Delete</span>
                                            </a>
                                            @endif
                                            <a class="btn btn-primary"
                                                href="{{ route('purchases.view', $purchase->purchase_no) }}">
                                                <span class="glyphicon glyphicon-trash">View</span>
                                            </a>
                                        </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push("plugin-scripts")
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush

@push("custom-scripts")
    <!-- Custom js here -->
@endpush
