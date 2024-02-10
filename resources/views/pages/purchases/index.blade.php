@extends("layouts.app")

@section("title", "Products")

@push("plugin-styles")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="mb-10">Purchase Orders</h2>
                    <a href="{{ route("purchases.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add New Purchase
                    </a>
                </div>
                <div class="table-wrapper table-responsive pt-3 px-1">
                    <table class="table table-bordered border-bottom" id="myTable">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Purchase No</h6>
                                </th>
                                <th>
                                    <h6>Date</h6>
                                </th>
                                <th>
                                    <h6>Price</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Status</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Action</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($purchases as $index => $purchase)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $purchase->purchase_no }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $purchase->date }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $purchase->buying_price }}</p>
                                    </td>
                                    <td class="min-width text-center">
                                        @if ($purchase->status == "0")
                                            <span class="btn btn-sm btn-warning mx-2 py-2"
                                                style="pointer-events: none;">Pending</span>
                                        @elseif ($purchase->status == "1")
                                            <span class="main-btn success-btn btn-sm"
                                                style="pointer-events: none;">Approved</span>
                                        @endif
                                    </td>
                                    <td class="min-width text-center">
                                        <a href="{{ route("purchases.show", $purchase->purchase_no) }}"
                                            class="main-btn btn-sm btn-info btn-hover mx-2">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("plugin-scripts")
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "zeroRecords": "No Purchases Available",
                }
            });
        });
    </script>
@endpush

@push("custom-scripts")
    <!-- Custom js here -->
@endpush
