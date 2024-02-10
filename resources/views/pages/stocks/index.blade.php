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
                    <h2 class="mb-10">Stocks</h2>
                </div>
                <div class="table-wrapper table-responsive pt-3 px-1">
                    <table class="table table-bordered border-bottom" id="myTable">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Product</h6>
                                </th>
                                <th>
                                    <h6>Unit</h6>
                                </th>
                                <th>
                                    <h6>Category</h6>
                                </th>
                                <th>
                                    <h6>In Stock</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($stocks as $index => $stock)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $stock->product->product_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $stock->unit->unit_shortform }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $stock->category->category_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $stock->remaining_quantity }}</p>
                                    </td>
                                    <td class="min-width text-center">
                                        <div class="action d-flex justify-content-center">
                                            <a href="{{ route("stocks.destroy", $stock->id) }}"
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
                    "zeroRecords": "No Stocks Found",
                    "infoEmpty": "No Stocks Found",
                }
            });
        });
    </script>
@endpush

@push("custom-scripts")
    <!-- Custom js here -->
@endpush
