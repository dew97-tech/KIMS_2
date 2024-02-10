@extends("layouts.app")

@section("title", "Categories")

@push("plugin-styles")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="mb-10">Category List</h2>
                    <a href="{{ route("categories.create") }}" class="main-btn btn-sm primary-btn btn-hover">
                        Add New Category
                    </a>
                </div>
                <div class="table-wrapper table-responsive pt-3 px-1">
                    <table class="table table-bordered border-bottom" id="categoriesTable">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Category Name</h6>
                                </th>
                                <th>
                                    <h6>Parent Category</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td class="min-width text-center">
                                        <p>{{ $index + 1 }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $category->category_name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $category->parentCategory ? $category->parentCategory->category_name : "No Parent Category" }}
                                        </p>
                                    </td>
                                    <td class="min-width text-center">
                                        <div class="action d-flex justify-content-center">
                                            <a href="{{ route("categories.edit", $category->id) }}"
                                                class="main-btn btn-sm btn-warning btn-hover mx-2">
                                                Edit
                                            </a>
                                            <a href="{{ route("categories.destroy", $category->id) }}"
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
            $('#categoriesTable').DataTable({
                "language": {
                    "emptyTable": "No Categories found."
                }
            });
        });
    </script>
@endpush


@push("custom-scripts")
    <!-- Custom js here -->
@endpush
