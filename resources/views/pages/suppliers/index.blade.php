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
                    <h2 class="mb-10">Supplier List</h2>
                    <a href="{{ route("suppliers.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add New Supplier
                    </a>
                </div>
                <div class="table-wrapper table-responsive pt-3 px-1">
                    <table id="suppliersTable" class="table table-bordered border-bottom">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Supplier Name</h6>
                                </th>
                                <th>
                                    <h6>Supplier Phone</h6>
                                </th>
                                <th>
                                    <h6>Supplier Address</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($suppliers as $index => $supplier)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $supplier->supplier_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $supplier->supplier_phone }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $supplier->supplier_address }}</p>
                                    </td>
                                    <td class="min-width text-center">
                                        <a href="{{ route("suppliers.edit", $supplier->id) }}"
                                            class="main-btn btn-sm btn-warning btn-hover mx-2">
                                            Edit
                                        </a>
                                        <a href="{{ route("suppliers.destroy", $supplier->id) }}"
                                            class="main-btn btn-sm danger-btn btn-hover mx-2"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
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
            $('#suppliersTable').DataTable({
                "language": {
                    "emptyTable": "No suppliers found."
                }
            });
        });
    </script>
@endpush
