@extends("layouts.app")

@section("title", "Customers")

@push("plugin-styles")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="mb-10">Customer List</h2>
                    <a href="{{ route("customers.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add New Customer
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
                                    <h6>Customer Name</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Phone</h6>
                                </th>
                                <th>
                                    <h6>Address</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $index => $customer)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $customer->customer_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $customer->customer_email }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $customer->customer_phone }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $customer->customer_address }}</p>
                                    </td>
                                    <td class="min-width text-center">
                                        <div class="action d-flex justify-content-center">
                                            <a href="{{ route("customers.edit", $customer->id) }}"
                                                class="main-btn btn-sm btn-warning btn-hover mx-2">
                                                Edit
                                            </a>
                                            <a href="{{ route("customers.destroy", $customer->id) }}"
                                                onclick="return confirm('Are you sure?')"
                                                class="main-btn btn-sm danger-btn btn-hover mx-2">
                                                Delete
                                            </a>
                                        </div>
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
                    "zeroRecords": "No Customers Found",
                    "infoEmpty": "No Customers Found",
                },
            });
        });
    </script>
@endpush

@push("custom-scripts")
    <!-- Custom js here -->
@endpush
