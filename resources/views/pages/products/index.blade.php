@extends("layouts.app")

@section("title", "Products")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="mb-10">Products</h2>
                    <a href="{{ route("products.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add Product
                    </a>
                </div>
                <div class="table-wrapper table-responsive pt-3 px-1">
                    <table id="productsTable" class="table table-bordered border-bottom">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Cost</h6>
                                </th>
                                <th>
                                    <h6>Price</h6>
                                </th>
                                <th>
                                    <h6>Category</h6>
                                </th>
                                <th>
                                    <h6>Brand</h6>
                                </th>
                                <th>
                                    <h6>Unit</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->product_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->product_cost }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->product_price }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->category->category_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->brand->brand_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $product->unit->unit_shortform }}</p>
                                    </td>
                                    <td class="min-width ">
                                        <div class="action d-flex justify-content-center">
                                            <a href="{{ route("products.edit", $product->id) }}"
                                                class="main-btn btn-sm btn-warning btn-hover mx-2">
                                                Edit
                                            </a>
                                            <a href="{{ route("products.destroy", $product->id) }}"
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
    <!-- Include jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                "language": {
                    "emptyTable": "No products found."
                }
            });
        });
    </script>
@endpush
