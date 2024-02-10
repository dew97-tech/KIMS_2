@extends("layouts.app")

@section("title", "Orders")

@push("plugin-styles")
    <!-- Include any additional stylesheets for Order Index here -->
    <link rel="stylesheet" type="text/css" href="path/to/your/custom/style.css">
@endpush

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="mb-10">Orders</h2>
                    <a href="{{ route("orders.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add New Order
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
                                    <h6>Order Date</h6>
                                </th>
                                <th>
                                    <h6>Order No</h6>
                                </th>
                                <th>
                                    <h6>Product Name</h6>
                                </th>
                                <th>
                                    <h6>Customer Name</h6>
                                </th>
                                <th>
                                    <h6>Total Amount</h6>
                                </th>
                                <th>
                                    <h6>Quantity</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->order_date }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->order_no }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->product->product_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->customer_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->total_amount }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $order->quantity }}</p>
                                    </td>
                                    <td class="min-width text-center">
                                        <a href="{{ route("orders.show", $order->order_no) }}"
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
                    "zeroRecords": "No Orders Available",
                }
            });
        });
    </script>
@endpush

@push("custom-scripts")
    <!-- Custom js here -->
@endpush
